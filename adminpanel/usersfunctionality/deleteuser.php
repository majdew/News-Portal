<?php

require "./../services/connection.php";

if (!isset($_GET['id'])) {
    header("location:./../views/usersviews/allusers.php");
}

$id = $_GET['id'];
$query = "DELETE FROM users WHERE id=$id";
$result = mysqli_query($connection, $query);




if ($result) {
    header("location:./../views/usersviews/allusers.php");
}