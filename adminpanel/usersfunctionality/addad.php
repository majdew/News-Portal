<?php
require "./../services/connection.php";


if (isset($_POST['submit'])) {

   
    $website = mysqli_escape_string($connection, $_POST['website']);
    $isActive = $_POST['isActive'];

    if (isset($_FILES['ad'])) {
        $image = $_FILES['ad']['name'];


        $query = "INSERT INTO advertisement (website, isActive , image) VALUES ('$website', $isActive,'$image')";

        $result = mysqli_query($connection, $query);

        if ($result) {

            move_uploaded_file($_FILES['ad']['tmp_name'], "./../../images/ads/$image");
            header("location:./../views/usersviews/ads.php");
        } else {
            header("location:./../views/usersviews/addad.php?error=1");
        }
    }
} else {

    header("location:./../views/usersviews/addad.php?error=1");
}
