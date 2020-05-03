<?php
require "./../services/connection.php";


$id = $_POST['id'];
$name = $_POST['name'];
$query = "UPDATE categories SET name = '$name' WHERE id=$id";


$result = mysqli_query($connection, $query);

if ($result) {
  header("location:./../views/usersviews/categories.php");
} else {
   header("location:./../views/usersviews/categories.php?id=$id?error=1");
}
