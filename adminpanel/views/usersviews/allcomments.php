<!doctype html>
<html lang="en">

<?php require "./../partials/head.php" ?>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require "./../partials/sidebar.php"; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div class="d-flex">
                        <a href="./allnews" class="d-flex flex-column justify-content-center">
                            <img src="./../../assets/icons/back.png" /></a>
                        <h1 class="h2">All Comments : </h1>
                    </div>

                </div>

                <div class="table-responsive">
                    <table class="table text-center table-dark table-hover table-bordered table-striped table-sm ">
                        <thead class="thead-dark">
                            <tr>
                                <th>Number</th>
                                <th>Comment</th>
                                <th>date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (!isset($_GET['id'])) {
                                header("location:./allnews.php");
                            }

                            $id = $_GET['id'];
                            $query = "SELECT * FROM newscomments WHERE newId=$id ORDER BY date DESC";
                            $result = mysqli_query($connection, $query);
                            $count = 0;
                            if ($result) {
                                while ($row = mysqli_fetch_array($result)) {
                                    $count++;
                            ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td> <?php echo $row['comment']; ?></td>
                                <td> <?php echo $row['date']; ?></td>
                            </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>

            </main>
        </div>
    </div>
</body>

</html>