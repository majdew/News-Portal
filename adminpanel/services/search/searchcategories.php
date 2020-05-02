<?php
if (isset($_POST['query'])) {
?>

    <table class="table text-center table-dark table-hover table-bordered table-striped table-sm ">
        <thead class="thead-dark">
            <tr>
                <th>Number</th>
                <th>name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require "./../connection.php";
            $limit = 8;
            if (isset($_GET['page']))
                $page = $_GET['page'];
            else $page = 1;

            $start = ($page - 1) * $limit;
            $searchText = $_POST['query'];

            $query = "SELECT * FROM categories WHERE 
                    name LIKE '%$searchText%' LIMIT $start , $limit";
            $allDocsQuery = "SELECT * FROM categories  WHERE 
                    name LIKE '%$searchText%'";

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

<?php } ?>