<!doctype html>
<html lang="en">

<?php require "./../partials/head.php" ?>
<script src="./../../controllers/categories.js"></script>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require "./../partials/sidebar.php"; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Categories : </h1>
                    <?php require "./../partials/searchform.html"; ?>
                </div>
                <div class="table-responsive" id="content">
                    <table class="table text-center table-dark table-hover table-bordered table-striped table-sm ">
                        <thead class="thead-dark">
                            <tr>
                                <th>Number</th>
                                <th>name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $limit = 8;
                            if (isset($_GET['page']))
                                $page = $_GET['page'];
                            else $page = 1;

                            $start = ($page - 1) * $limit;

                            $query = "SELECT * FROM categories LIMIT $start , $limit";
                            $allDocsQuery = "SELECT * FROM categories";
                            $result = mysqli_query($connection, $query);
                            $resultAllDocs = mysqli_query($connection, $allDocsQuery);

                            $totalDocs = mysqli_num_rows($resultAllDocs);
                            $pages = ceil($totalDocs / $limit);

                            $count = 0 + (($page - 1) * $limit);
                            while ($row = mysqli_fetch_array($result)) {
                                $count++;
                            ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td> <?php echo $row['name']; ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation d-flex justify-content-end example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="./categories.php?page=<?php if ($page <= 1) echo  1;
                                                                                    else echo $page - 1 ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <?php
                            for ($i = 0; $i < $pages; $i++) {
                            ?>
                                <li class="page-item">
                                    <a class="page-link" href="./../usersviews/categories.php?page=<?php echo $i + 1 ?>">
                                        <?php echo $i + 1 ?>
                                    </a>
                                </li>
                            <?php } ?>
                            <li class="page-item ">
                                <a class="page-link" href="./categories.php?page=<?php if ($page >= $pages) echo  1;
                                                                                    else echo $page + 1 ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </main>
        </div>
    </div>
</body>

</html>