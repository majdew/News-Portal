<?php
require "./../services/connection.php";

if (isset($_POST['submit'])) {

    echo $_POST['id'];
    $adId = $_POST['id'];
    $website = mysqli_escape_string($connection, $_POST['website']);
    $isActive = $_POST['isActive'];
    $image = $_FILES['ad']['name'];


    if ($image) {

        $query = "UPDATE advertisement SET
        website='$website', image='$image', isActive =$isActive
        WHERE id=$adId";
    } else {
        $query = "UPDATE advertisement SET
        website='$website', isActive =$isActive
        WHERE id=$adId";
    }

    $result = mysqli_query($connection, $query);

    if ($result) {
        header("location:./../views/usersviews/ads.php");
    } else {
        header("location:./../views/usersviews/addad.php?id=$adId?error=1");
    }
} else {
    header("location:./../views/usersviews/addad.php?id=$adId?error=1");
}
