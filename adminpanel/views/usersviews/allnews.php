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
                    <h1 class="h2">All News : </h1>
                </div>

                <div class="table-responsive">
                    <table class="table text-center table-dark table-hover table-bordered table-striped table-sm ">
                        <thead class="thead-dark">
                            <tr>
                                <th>Number</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM news ORDER BY dateposted DESC";
                            $result = mysqli_query($connection, $query);
                            $count = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $count++;
                            ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td> <?php echo $row['title']; ?></td>
                                <td>
                                    <?php if ($row['published'] == 0) { ?>
                                    Unapproved
                                    <?php } else { ?>
                                    approved
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($roleId == 2) { ?>
                                    <a href="./addnews.php?id=<?php echo $row['id']; ?>"> <img
                                            src="./../../assets/icons/pencil.png" /></a>
                                    <?php } ?>
                                    <a href="./newsdetails.php?id=<?php echo $row['id']; ?>"> <img
                                            src="./../../assets/icons/eye.png" /></a>
                                    <?php if (!$roleId == 1) { ?>
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