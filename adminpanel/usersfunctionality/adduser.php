<?php
require "./../services/connection.php";


if (isset($_POST['submit'])) {


    $name = $_POST['name'];
    $email = $_POST['email'];
    $roleId = $_POST['roleId'];
   
    if (isset($_FILES['user'])) {
        $image = $_FILES['user']['name'];
        $password = $_POST['password'];

        $query = "INSERT INTO users (name, email , password  ,roleId , image) VALUES ('$name', '$email','$password', $roleId , '$image')";

        $result = mysqli_query($connection, $query);

        if ($result) {
            echo $image;
            move_uploaded_file($_FILES['user']['tmp_name'], "./../../images/users/$image");
            header("location:./../views/usersviews/allusers.php");
        } else {
            header("location:./../views/usersviews/adduser.php?error=1");
        }
    }
} else {
    header("location:./../views/usersviews/adduser.php?error=1");
}
