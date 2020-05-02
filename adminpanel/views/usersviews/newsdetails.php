<!doctype html>
<html lang="en">

<?php require "./../../services/connection.php"; ?>
<?php require "./../partials/head.php" ?>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require "./../partials/sidebar.php"; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">News details : </h1>
                </div>
                <?php

                if (!isset($_GET['id'])) {
                    header("location:./allnews.php");
                }

                $id = $_GET['id'];
                $query = "SELECT * FROM news WHERE id=$id";
                $result = mysqli_query($connection, $query);
                $new = mysqli_fetch_array($result);



                if ($result) {
                    $title = $new[1];
                    $imageTitle = $new[4];
                    $body = $new[2];
                    $category = $new[3];
                    $isUrgent = $new[7];
                    $isGlobal = $new[9];
                    $writerId = $new[8];

                    $queryWriter = "SELECT * FROM users WHERE id=$writerId";
                    $resultWriter = mysqli_query($connection, $queryWriter);
                    $writer = mysqli_fetch_array($resultWriter);

                    

                ?>
                    <div class="flex-column p-3 mt-3 mb-3 border border-dark ml-auto mr-auto " style="width: 40rem;" >
                        <h5 class="card-text p-2 font-weight-bold text-center">
                            <?php echo $title; ?> .
                        </h5>
                        <img class="card-img-top" src="./../../../images/news/<?php echo $imageTitle; ?>" alt="new" />
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
                    </div>
                <?php

                } else {
                    echo "ERROR " . mysqli_error($connection);
                }
                ?>


            </main>
        </div>
    </div>
</body>

</html>