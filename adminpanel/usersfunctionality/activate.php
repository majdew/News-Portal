<?php
require "./../services/connection.php";

$adId = $_POST['id'];

$query = "UPDATE advertisement SET isActive =1 WHERE id=$adId";


$result = mysqli_query($connection, $query);

if ($result) {
    header("location:./../views/usersviews/ads.php");
} else {
    header("location:./../views/usersviews/ads.php?error=1");
}
