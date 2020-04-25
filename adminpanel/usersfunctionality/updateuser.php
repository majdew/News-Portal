<?php

require "./../services/connection.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $roleId = $_POST['roleId'];
    $image = $_FILES['user']['name'];

    if ($image) {
        $query = "UPDATE users SET
        name='$name', email='$email', password='$password' , roleId=$roleId ,image = '$image'
        WHERE id=$id";
    } else {
        $query = "UPDATE users SET
        name='$name', email='$email', password='$password' , roleId=$roleId 
        WHERE id=$id";
    }
    $result = mysqli_query($connection, $query);

    if ($result) {
        header("location:./../views/usersviews/allusers.php");
    } else {
        header("location:./../views/usersviews/adduser.php?id=$id?error=1");
    }
} else {
    header("location:./../views/usersviews/adduser.php?id=$id?error=1");
}