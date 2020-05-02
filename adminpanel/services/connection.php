<?php

session_start();
$email = $_SESSION['username'];
$name = $_SESSION['name'];
$image = $_SESSION['image'];
$roleId = $_SESSION['roleId'];
$id = $_SESSION['id'];

$servername = "localhost";
$username = "root";
$password = "phpmyadmin";
$dbname = "newsportal";



// create connnection 
$connection = mysqli_connect($servername, $username, $password, $dbname);

// check connection 
if (!$connection) {
    die("Connection Failed: " . mysqli_connect_error());
}
