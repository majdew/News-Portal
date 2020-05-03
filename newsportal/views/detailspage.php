<?php
require "./../services/connection.php";


if (!isset($_GET['id'])) {
    header("location:./frontpage.php");
}

$id = $_GET['id'];

$query = "SELECT * FROM news WHERE id=$id";
$result = mysqli_query($connection, $query);

$updateViewsQuery = "UPDATE news SET views= views + 1 WHERE id = $id ";
$updateResult = mysqli_query($connection, $updateViewsQuery);

$new = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<?php require "./partials/head.php"; ?>


<body>

    <?php
    require "./partials/navbar.php";

    if ($result) {
        $title = $new[1];
        $imageTitle = $new[4];
        $body = $new[2];
        $category = $new[3];

    ?>

        <div class="flex-column p-3 mt-3 mb-3 border border-dark ml-auto mr-auto " style="width: 40rem;">
            <h5 class="card-text p-2 font-weight-bold text-center">
                <?php echo $title; ?> .
            </h5>
            <img class="card-img-top" src="./../../images/news/<?php echo $imageTitle; ?>" alt="new" />
            <p class="card-text p-2">
                <?php echo $body; ?>
            </p>
        </div>
    <?php

    } else {
        echo "ERROR " . mysqli_error($connection);
    }
    ?>
    <?php require "./commentview.php" ?>
</body>

</html>