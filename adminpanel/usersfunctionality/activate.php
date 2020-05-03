<?php
require "./../services/connection.php";

$adId = $_POST['id'];

$get = "SELECT * FROM advertisement WHERE id=$adId";
$getResult = mysqli_query($connection, $get);
$ad = mysqli_fetch_array($getResult);

$position = $ad['position'];

if ($ad['isActive'] == 1) {
    header("location:./../views/usersviews/ads.php");
} else {


    $getAllRecordsInPosition = "SELECT * FROM advertisement WHERE position= $position AND isActive=1";

    $allRecordsInPositionResults = mysqli_query($connection, $getAllRecordsInPosition);

    if (mysqli_num_rows($allRecordsInPositionResults) != 0) {
        header("location:./../views/usersviews/ads.php?error=2");
    } else {


        $query = "UPDATE advertisement SET isActive =1 WHERE id=$adId";


        $result = mysqli_query($connection, $query);

        if ($result) {
            header("location:./../views/usersviews/ads.php");
        } else {
            header("location:./../views/usersviews/ads.php?error=1");
        }
    }
}
