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

        if ($_POST['query'])
            $searchText = mysqli_escape_string($connection, $_POST['query']);
        else
            $searchText = '';

        $allDocsQuery = "SELECT * FROM categories  WHERE 
                    name LIKE '%$searchText%'";

        $resultAllDocs = mysqli_query($connection, $allDocsQuery);
        $totalDocs = mysqli_num_rows($resultAllDocs);
        $pages = ceil($totalDocs / $limit);
        $page = isset($_GET['page']) ? $_GET['page'] : $page = 1;

        if ($page > $pages || $page <= 0 || !is_numeric($page))
            $page = 1;

        $start = ($page - 1) * $limit;

        $query = "SELECT * FROM categories WHERE 
                    name LIKE '%$searchText%' LIMIT $start , $limit";

        $result = mysqli_query($connection, $query);
        $count = (($page - 1) * $limit);

        if ($totalDocs > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $count++;
        ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td> <?php echo $row['name']; ?></td>

                </tr>
            <?php
            }
        } else { ?>
            <tr>
                <td colspan="2">No Records .</td>
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