<?php
require "./../services/connection.php";


if (isset($_POST['submit'])) {

    $website = mysqli_escape_string($connection, $_POST['website']);
    $position = $_POST['position'];


    if (isset($_FILES['ad'])) {
        $image = $_FILES['ad']['name'];

        $query = "INSERT INTO advertisement (website, image , position) VALUES ('$website','$image'  , '$position')";

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
