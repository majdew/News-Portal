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
$totalDocs = mysqli_num_rows($result);

$new = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<?php require "./partials/head.php"; ?>


<body>
    <?php
    require "./partials/navbar.php";
    require "./partials/breakingnews.php";


    if ($totalDocs == 1) {
        $title = $new[1];
        $imageTitle = $new[4];
        $body = $new[2];
        $category = $new[3];
        $isUrgent = $new[7];
        $isGlobal = $new[9];
        $writerId = $new[8];

        $queryWriter = "SELECT * FROM users WHERE id=$writerId";
        $resultWriter = mysqli_query($connection, $queryWriter);

        if (mysqli_num_rows($resultWriter) == 1)
            $writer = mysqli_fetch_array($resultWriter);
        else
            $writer = "unknown";

    ?>

        <div class="flex-column p-3 mt-3 mb-3 border border-dark ml-auto mr-auto " style="width: 40rem;">
            <h5 class="card-text p-2 font-weight-bold text-center">
                <?php echo $title; ?> .
            </h5>
            <img class="card-img-top" src="./../../images/news/<?php echo $imageTitle; ?>" alt="new" />
            <p class="card-text font-italic p-2">
                Writen By : <?php echo $writer[1] . " "; ?>
                [<?php echo $new['dateposted']; ?>]
            </p>
            <p class="card-text font-italic p-2">
                Category :
                <?php echo $category; ?>
                <?php if ($isUrgent) echo " , Urgent"; ?>
                <?php if ($isGlobal) echo " , Global"; ?>

            </p>
            <p class="card-text p-2">
                <?php echo $body; ?>
            </p>
            <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&layout=button_count&size=large&appId=660454011357008&width=110&height=28" width="110" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
        </div>
    <?php
        require "./commentview.php";
    } else {
        header("location:./frontpage.php");
    } ?>

</body>

</html>