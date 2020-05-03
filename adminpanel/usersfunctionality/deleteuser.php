<?php

require "./../services/connection.php";

echo $_POST['id'];

if (!isset($_POST['id'])) {
    header("location:./../views/usersviews/allusers.php");
}

$id = $_POST['id'];
$query = "DELETE FROM users WHERE id=$id";
$result = mysqli_query($connection, $query);

if ($result) {

    header("location:./../views/usersviews/allusers.php");
}
