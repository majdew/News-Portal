<!doctype html>
<html lang="en">

<?php require "./../partials/head.php" ?>
<?php require "./../../services/connection.php"; ?>

<script src="./../../controllers/comments.js"></script>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require "./../partials/sidebar.php"; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">All Comments : </h1>
                    <?php require "./../partials/searchform.html"; ?>
                </div>

                <div id="content">
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
                            $limit = 8;

                            if (!isset($_GET['id']) || !is_numeric($_GET['id']))
                                header("location:./allnews.php");
                            else
                                $id = $_GET['id'];

                            $allDocsQuery = "SELECT * FROM newscomments WHERE newId=$id ORDER BY date DESC";

                            $page = isset($_GET['page']) ? $_GET['page'] : $page = 1;
                            $resultAllDocs = mysqli_query($connection, $allDocsQuery);
                            $totalDocs = mysqli_num_rows($resultAllDocs);
                            $pages = ceil($totalDocs / $limit);

                            if ($page > $pages || $page < 0 || !is_numeric($page))
                                $page = 1;

                            $start = ($page - 1) * $limit;

                            $query = "SELECT * FROM newscomments WHERE newId=$id ORDER BY date DESC LIMIT $start , $limit";
                            $result = mysqli_query($connection, $query);

                            $count = (($page - 1) * $limit);

                            if ($totalDocs > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    $count++;
                            ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td> <?php echo $row['comment']; ?></td>
                                        <td> <?php echo $row['date']; ?></td>
                                    </tr>
                                <?php
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="3">No Records .</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <?php if ($pages > 0) { ?>
                        <nav aria-label="Page navigation d-flex justify-content-end example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="./allcomments?id=<?php echo $id; ?>&page=<?php if ($page <= 1) echo  1;
                                                                                                        else echo $page - 1 ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <?php
                                for ($i = 0; $i < $pages; $i++) {
                                ?>
                                    <li class="page-item">
                                        <a class="page-link" href="./allcomments.php?id=<?php echo $id; ?>&page=<?php echo $i + 1 ?>">
                                            <?php echo $i + 1 ?>
                                        </a>
                                    </li>
                                <?php } ?>
                                <li class="page-item ">
                                    <a class="page-link" href="./allcomments.php?id=<?php echo $id; ?>&page=<?php if ($page >= $pages) echo  1;
                                                                                                            else echo $page + 1 ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    <?php } ?>
                </div>
                <input id="newId" hidden value="<?php echo $_GET['id']; ?>">
            </main>
        </div>
    </div>

</body>

</html>