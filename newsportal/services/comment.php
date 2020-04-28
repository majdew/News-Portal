<?php
require "./connection.php";
if (isset($_POST['submit'])) {


    $newId = $_POST['newid'];
    $comment = $_POST['comment'];

    $query = "INSERT INTO newscomments (newid, comment) VALUES ($newId, '$comment' )";

    $result = mysqli_query($connection, $query);

    if ($result) {
        header("location:./../views/detailspage.php?id=$newId");
    } else {
        header("location:./../views/detailspage.php?id=$newId?error=1");
    }
} else {
    header("location:./../views/detailspage.php?id=$newId?error=1");
}