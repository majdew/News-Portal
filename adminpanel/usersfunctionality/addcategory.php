<?php
require "./../services/connection.php";



$name = $_POST['name'];



$query = "INSERT INTO categories (name) VALUES ('$name')";

$result = mysqli_query($connection, $query);

if ($result) {
    header("location:./../views/usersviews/categories.php");
} else {
    header("location:./../views/usersviews/categories.php?error=1");
}
