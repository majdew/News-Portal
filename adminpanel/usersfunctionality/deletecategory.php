<?php
require "./../services/connection.php";


$id = $_POST['id'];

$query = "DELETE FROM categories WHERE id=$id";


$result = mysqli_query($connection, $query);


if ($result) {
    header("location:./../views/usersviews/categories.php");
} else {
    header("location:./../views/usersviews/categories.php?error=1");
}
