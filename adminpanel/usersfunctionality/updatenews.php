<?php
require "./../services/connection.php";

if (isset($_POST['submit'])) {

    $newId = $_POST['id'];
    $title = $_POST['title'];
    $body = $_POST['body'];
    $isUrgent = $_POST['isUrgent'];
    $isGlobal = $_POST['isGlobal'];
    $category = $_POST['category'];
    $image = $_FILES['news']['name'];

    $newtitle = mysqli_escape_string($connection, $title);
    $newbody = mysqli_escape_string($connection, $body);

    if ($image) {

        $query = "UPDATE news SET
        title='$newtitle', body='$newbody',image='$image', category='$category', isUrgent=$isUrgent , isGlobal=$isGlobal 
        WHERE id=$newId";
    } else {

        $query = "UPDATE news SET
        title='$newtitle', body='$newbody', category='$category' ,  isUrgent=$isUrgent , isGlobal=$isGlobal 
        WHERE id=$newId";
    }

    $result = mysqli_query($connection, $query);

    if ($result) {
        header("location:./../views/usersviews/allnews.php");
    } else {
        header("location:./../views/usersviews/addnews.php?id=$newId?error=1");
    }
} else {
    header("location:./../views/usersviews/addnews.php?id=$newId?error=1");
}