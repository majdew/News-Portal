<!doctype html>
<html lang="en">

<?php require "./../partials/head.php" ?>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require "./../partials/sidebar.php"; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
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

                            $limit = 8;
                            if (isset($_GET['page']))
                                $page = $_GET['page'];
                            else $page = 1;

                            $start = ($page - 1) * $limit;

                            if ($roleId == 2) {
                                $query = "SELECT * FROM news WHERE writerId =$id ORDER BY dateposted DESC LIMIT $start , $limit";
                                $allDocsQuery = "SELECT * FROM news WHERE writerId =$id ORDER BY dateposted DESC";
                            } else {
                                $query = "SELECT * FROM news ORDER BY dateposted DESC LIMIT $start , $limit";
                                $allDocsQuery = "SELECT * FROM news ORDER BY dateposted DESC";
                            }

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
                                            <a href="./addnews.php?id=<?php echo $row['id']; ?>"> <img src="./../../assets/icons/pencil.png" /></a>
                                        <?php } ?>
                                        <a href="./newsdetails.php?id=<?php echo $row['id']; ?>"> <img src="./../../assets/icons/eye.png" /></a>
                                        <?php if ($roleId == 0 || $roleId == 2) { ?>
                                            <a href="./../../usersfunctionality/deletenews.php?id=<?php echo $row['id']; ?>">
                                                <img src="./../../assets/icons/rubbish.png" /></a>
                                        <?php } ?>
                                        <a href="./allcomments.php?id=<?php echo $row['id']; ?>">
                                            <img src="./../../assets/icons/comment.png" /></a>

                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation d-flex justify-content-end example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="./allnews?page=<?php if ($page <= 1) echo  1;
                                                                            else echo $page - 1 ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <?php
                            for ($i = 0; $i < $pages; $i++) {
                            ?>
                                <li class="page-item">
                                    <a class="page-link" href="./../usersviews/allnews?page=<?php echo $i + 1 ?>">
                                        <?php echo $i + 1 ?>
                                    </a>
                                </li>
                            <?php } ?>
                            <li class="page-item ">
                                <a class="page-link" href="./allnews?page=<?php if ($page >= $pages) echo  1;
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