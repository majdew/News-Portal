<?php
if (isset($_POST['query'])) {
    require "./../connection.php";

    $limit = 8;
    if (isset($_GET['page']))
        $page = $_GET['page'];
    else $page = 1;

    $start = ($page - 1) * $limit;
    $searchText = $_POST['query'];

    $id = $_POST['id'];


    $allDocsQuery = "SELECT * FROM newscomments WHERE newId=$id 
                    AND ( comment LIKE '%$searchText%' OR date LIKE '%$searchText%') ORDER BY date DESC";
    $query = "SELECT * FROM newscomments WHERE newId=$id
                 AND ( comment LIKE '%$searchText%' OR date LIKE '%$searchText%') ORDER BY date DESC LIMIT $start , $limit";

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
        <nav aria-label="Page navigation d-flex justify-content-end example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="./allcomments.php?id=<?php echo $id; ?>&page=<?php if ($page <= 1) echo  1;
                                                                                            else echo $page - 1 ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <?php
                for ($i = 0; $i < $pages; $i++) {
                ?>
                    <li class="page-item">
                        <a class="page-link" href="./../usersviews/allcomments.php?id=<?php echo $id; ?>&page=<?php echo $i + 1 ?>">
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
    <?php } else { ?>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 ">
            <div class="d-flex">
                <h1 class="h5">No Such Comments .</h1>
            </div>
        </div>
<?php
    }
} ?>