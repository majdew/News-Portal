<?php
session_start();

require './connection.php';


$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email='$username' AND password='$password'";
$result = mysqli_query($connection, $query);
$user = mysqli_fetch_array($result);


if ($user) {
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $user['roleId'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['image'] = $user['image'];
    header("location:./../views/mainviews/dashboard.php");
} else {
    header("location:./../views/mainviews/signin.php?error=1");
}
