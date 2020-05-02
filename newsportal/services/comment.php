<?php
require "./connection.php";
if (isset($_POST['submit'])) {


    $newId = $_POST['newid'];
    $comment = $_POST['comment'];
    $escapedComment = mysqli_escape_string($comment , $connection);

    $query = "INSERT INTO newscomments (newid, comment) VALUES ($newId, '$escapedComment' )";

    $result = mysqli_query($connection, $query);

    if ($result) {
        header("location:./../views/detailspage.php?id=$newId");
    } else {
        header("location:./../views/detailspage.php?id=$newId?error=1");
    }
} else {
    header("location:./../views/detailspage.php?id=$newId?error=1");
}
