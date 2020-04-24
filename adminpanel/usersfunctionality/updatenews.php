<?php
require "./../services/connection.php";

session_start();
$id = $_SESSION['id'];

if (isset($_POST['submit'])) {
    
    $newId = $_POST['id'];
    $title = $_POST['title'];
    $body = $_POST['body'];
    // $isUrgent = $_POST['isUrgent'];
    // $isGlobal = $_POST['isGlobal'];
    $category = $_POST['category'];
    print_r($_POST);
    if (isset($_FILES['news'])) {
        echo "enter";
        $image = $_FILES['news']['name'];
        // isUrgent=$isUrgent , isGlobal=$isGlobal , 
        $query = "UPDATE news SET
        title='$title', body='$body', category='$category' , image= '$image' 
        WHERE id=$newId";


        $result = mysqli_query($connection, $query);

        if ($result) {
            move_uploaded_file($_FILES['news']['tmp_name'], "./../../images/news/$image");
            //header("location:./../views/usersviews/allnews.php");
        } else {
            //header("location:./../views/usersviews/addnews.php?id=$id?error=1");
        }
    }
} else {
    //header("location:./../views/usersviews/addnews.php?id=$id?error=1");
}