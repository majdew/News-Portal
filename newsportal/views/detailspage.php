<?php
    require "./../services/connection.php";
    if (!isset($_GET['id'])){
        header("location:./frontpage.php");
    }

    $id = $_GET['id'];
    $query = "SELECT * FROM NEWS WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if ($result){
  
    }  
    else{
        echo "ERROR " . mysqli_error($conn);
    }
?>