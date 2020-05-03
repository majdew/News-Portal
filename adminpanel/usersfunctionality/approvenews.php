<?php
require "./../services/connection.php";

$newId = $_POST['id'];
$query = "UPDATE news SET published = 1 WHERE id=$newId";


$result = mysqli_query($connection, $query);

if ($result) {
    header("location:./../views/usersviews/allnews.php");
} else {
    header("location:./../views/usersviews/approvenews.php?id=$id?error=1");
}