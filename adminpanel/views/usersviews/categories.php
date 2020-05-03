<!doctype html>
<html lang="en">

<?php require "./../../services/connection.php"; ?>
<?php require "./../partials/head.php" ?>

<script src="./../../controllers/categories.js"></script>
<script src="./../../controllers/index.js"></script>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require "./../partials/sidebar.php"; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Categories : </h1>
                    <div class="d-flex">
                        <?php require "./../partials/searchform.html"; ?>
                        <?php if ($roleId == 0) { ?>
                            <a class="add" data-toggle="modal" data-target="#addModal">
                                <img src="./../../assets/icons/signs.png" />
                            </a>
                        <?php  } ?>
                    </div>
                </div>
                <div class="table-responsive" id="content">
                    <table class="table text-center table-dark table-hover table-bordered table-striped table-sm ">
                        <thead class="thead-dark">
                            <tr>
                                <th>Number</th>
                                <th>name</th>
                                <?php if ($roleId == 0) { ?>
                                    <th>Options</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $limit = 8;

                            $allDocsQuery = "SELECT * FROM categories";

                            $resultAllDocs = mysqli_query($connection, $allDocsQuery);
                            $totalDocs = mysqli_num_rows($resultAllDocs);
                            $pages = ceil($totalDocs / $limit);
                            $page = isset($_GET['page']) ? $_GET['page'] : $page = 1;

                            if ($page > $pages || $page <= 0 || !is_numeric($page))
                                $page = 1;

                            $start = ($page - 1) * $limit;

                            $query = "SELECT * FROM categories LIMIT $start , $limit";
                            $result = mysqli_query($connection, $query);
                            $count = (($page - 1) * $limit);

                            if ($totalDocs > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    $count++;
                            ?>
                                    <tr>
                                        <td style="display: none;"> <?php echo $row['id']; ?></td>
                                        <td><?php echo $count; ?></td>
                                        <td> <?php echo $row['name']; ?></td>
                                        <?php if ($roleId == 0) { ?>
                                            <td>
                                                <a class="getEditId" data-toggle="modal" data-target="#editModal">
                                                    <img src="./../../assets/icons/pencil.png" />
                                                </a>
                                                <a class="getId" data-toggle="modal" data-target="#deleteModal">
                                                    <img src="./../../assets/icons/rubbish.png" />
                                                </a>
                                            </td>
                                        <?php } ?>

                                    </tr>
                                <?php
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="">No Records .</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php if ($pages > 0) { ?>
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
                                        <a class="page-link" href="./categories.php?page=<?php echo $i + 1 ?>">
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
                    <?php } ?>
                </div>

            </main>
        </div>
    </div>
</body>

</html>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fontweight-bold" id="exampleModalLabel">Add category :</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="modal-title">
                    Enter category name :
                </div>
                <br>
                <div>
                    <form action="./../../usersfunctionality/addcategory.php" method="post">
                        <input class="form-control" name="name" />
                        <br>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                        <br>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fontweight-bold" id="exampleModalLabel">Edit </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="modal-title">
                    Enter new category name :
                </div>
                <br>
                <div>
                    <form action="./../../usersfunctionality/updatecategory.php" method="post">
                        <input type="text" hidden name="id" id="idEditInput">
                        <input class="form-control" name="name" id="oldname" />
                        <br>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save </button>
                        <br>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do you want to delete this record?
            </div>
            <div class="modal-footer">
                <form action="./../../usersfunctionality/deletecategory.php" method="post">
                    <input type="text" hidden name="id" id="idInput">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>