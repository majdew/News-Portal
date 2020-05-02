<!doctype html>
<html lang="en">

<?php

require "./../../services/connection.php";
require "./../partials/head.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("location:./ads.php");
}

$id = $_GET['id'];
$query = "SELECT * FROM advertisement WHERE id=$id";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);

if (mysqli_num_rows($result) != 1)
    header("location:./ads.php");

$website = $row['website'];
$imageTitle = $row['image'];

?>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require "./../partials/sidebar.php"; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Ad details : </h1>
                </div>
                <?php

                ?>
                <div class="flex-column p-3 mt-3 mb-3  ml-auto mr-auto " style="width: 20rem;">
                    <h5 class="card-text p-2 font-weight-bold text-center">
                        <?php echo $website; ?> .
                    </h5>
                    <a href="<?php echo $website; ?>">
                        <img class="card-img-top" src="./../../../images/ads/<?php echo $imageTitle; ?>" alt="new" />
                    </a>
                </div>
            </main>
        </div>
    </div>
</body>

</html>