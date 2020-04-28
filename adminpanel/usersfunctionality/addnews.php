<?php
require "./../services/connection.php";
session_start();
$id = $_SESSION['id'];


if (isset($_POST['submit'])) {


    $title = $_POST['title'];
    $body = $_POST['body'];
    $isUrgent = $_POST['isUrgent'];
    $isGlobal = $_POST['isGlobal'];
    $category = $_POST['category'];

    $newtitle = mysqli_escape_string($connection, $title);
    $newbody = mysqli_escape_string($connection, $body);

    if (isset($_FILES['news'])) {
        $image = $_FILES['news']['name'];


        $query = "INSERT INTO news (title, body, category , image , isUrgent , isGlobal ,writerId) 
                    VALUES ('$newtitle', '$newbody','$category', '$image', $isUrgent , $isGlobal , $id )";

        $result = mysqli_query($connection, $query);

        if ($result) {
            move_uploaded_file($_FILES['news']['tmp_name'], "./../../images/news/$image");
            header("location:./../views/usersviews/allnews.php");
        } else {
            header("location:./../views/usersviews/addnews.php?error=1");
        }
    }
} else {
    header("location:./../views/usersviews/addnews.php?error=1");
}
