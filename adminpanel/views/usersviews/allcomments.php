<!doctype html>
<html lang="en">

<?php require "./../partials/head.php" ?>
<script src="./../../controllers/comments.js"></script>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require "./../partials/sidebar.php"; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                    <h1 class="h2">All Comments : </h1>
                    <?php require "./../partials/searchform.html"; ?>
                    <a href="./allnews" class="d-flex flex-column justify-content-center">

                        <span aria-hidden="true">Back</span> </a>

                </div>

                <?php

                if (!isset($_GET['id'])) {
                    echo "he";
                } ?>
                <input id="newId" hidden value="<?php echo $_GET['id']; ?>">
                <div class="table-responsive" id="content">
                    <?php

                    $limit = 8;
                    if (isset($_GET['page']))
                        $page = $_GET['page'];
                    else $page = 1;

                    $start = ($page - 1) * $limit;

                    $id = $_GET['id'];
                    $allDocsQuery = "SELECT * FROM newscomments WHERE newId=$id ORDER BY date DESC";
                    $query = "SELECT * FROM newscomments WHERE newId=$id ORDER BY date DESC LIMIT $start , $limit";

                    $result = mysqli_query($connection, $query);
                    $resultAllDocs = mysqli_query($connection, $allDocsQuery);

                    $totalDocs = mysqli_num_rows($resultAllDocs);
                    $pages = ceil($totalDocs / $limit);

                    $count = 0 + (($page - 1) * $limit);
                    if ($pages > 0) {
                    ?>

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
                                while ($row = mysqli_fetch_array($result)) {
                                    $count++;
                                ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td> <?php echo $row['comment']; ?></td>
                                        <td> <?php echo $row['date']; ?></td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>

                    <?php
                        require "./../partials/pages.php";
                    } else { ?>
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 ">
                            <div class="d-flex">
                                <h1 class="h5">No Comments .</h1>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </main>
        </div>
    </div>
</body>

</html>