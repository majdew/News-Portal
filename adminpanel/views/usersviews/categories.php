<!doctype html>
<html lang="en">

<?php require "./../partials/head.php" ?>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require "./../partials/sidebar.php"; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Categories : </h1>
                </div>
                <div class="table-responsive">
                    <table class="table text-center table-dark table-hover table-bordered table-striped table-sm ">
                        <thead class="thead-dark">
                            <tr>
                                <th>Number</th>
                                <th>name</th>
                                <?php if ($roleId == 0) { ?>
                                    <th>options</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM categories";
                            $result = mysqli_query($connection, $query);
                            $count = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $count++;
                            ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td> <?php echo $row['name']; ?></td>
                                    <td>
                                        <?php if ($roleId == 0) { ?>
                                            <a href="./editnews.php"> <img src="./../../assets/icons/pencil.png" /></a>
                                            <a href="./deletenews.php"> <img src="./../../assets/icons/rubbish.png" /></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </main>
        </div>
    </div>
</body>

</html>