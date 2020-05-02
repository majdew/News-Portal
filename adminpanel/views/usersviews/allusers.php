<!doctype html>
<html lang="en">

<?php require "./../partials/head.php" ?>
<script src="./../../controllers/allusers"></script>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require "./../partials/sidebar.php"; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">All Users : </h1>
                    <?php require "./../partials/searchform.html"; ?>
                </div>
                <div class="table-responsive" id="content">
                    <table class="table text-center table-dark table-hover table-bordered table-striped table-sm ">
                        <thead class="thead-dark">
                            <tr>
                                <th>Number</th>
                                <th>Name</th>
                                <th>Email </th>
                                <th>Image</th>
                                <th>Role</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $limit = 4;
                            if (isset($_GET['page']))
                                $page = $_GET['page'];
                            else $page = 1;

                            $start = ($page - 1) * $limit;
                            $query = "SELECT * FROM users WHERE roleId = 1 OR roleId=2 LIMIT $start , $limit";
                            $allDocsQuery = "SELECT * FROM users WHERE roleId = 1 OR roleId=2";

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
                                    <td> <?php echo $row['email']; ?></td>
                                    <td>
                                        <img class=" align-middle" src="./../../../images/users/<?php echo $row['image']; ?>" width="30px" height="30px" />
                                    </td>
                                    <td>
                                        <?php if ($row['roleId'] == 2) echo "Writer"; ?>
                                        <?php if ($row['roleId'] == 1) echo "Editor"; ?>
                                    </td>
                                    <td>
                                        <a href="./adduser.php?id=<?php echo $row['id']; ?>">
                                            <img src="./../../assets/icons/pencil.png" /></a>

                                        <a href="./../../usersfunctionality/deleteuser.php?id=<?php echo $row['id']; ?>">
                                            <img src="./../../assets/icons/rubbish.png" />
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation d-flex justify-content-end example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="./allusers?page=<?php if ($page <= 1) echo  1;
                                                                            else echo $page - 1 ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <?php
                            for ($i = 0; $i < $pages; $i++) {
                            ?>
                                <li class="page-item">
                                    <a class="page-link" href="./../usersviews/allusers?page=<?php echo $i + 1 ?>">
                                        <?php echo $i + 1 ?>
                                    </a>
                                </li>
                            <?php } ?>
                            <li class="page-item ">
                                <a class="page-link" href="./allusers?page=<?php if ($page >= $pages) echo  1;
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