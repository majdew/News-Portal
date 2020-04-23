<?php


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
