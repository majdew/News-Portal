<?php

if (isset($_SESSION['username'])){
    unset($_SESSION['username']);
}
if (isset($_SESSION['name'])) {
    unset($_SESSION['name']);
}
if (isset($_SESSION['image'])) {
    unset($_SESSION['image']);
}
if (isset($_SESSION['roleId'])) {
    unset($_SESSION['roleId']);
}

header("location:./../views/mainviews/signin.php");
?>