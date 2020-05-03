<table class="table text-center table-dark table-hover table-bordered table-striped table-sm ">
    <thead class="thead-dark">
        <tr>
            <th>Number</th>
            <th>Title</th>
            <th>options</th>
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

        $allDocsQuery = "SELECT * FROM news  WHERE published=0 AND ( title LIKE '%$searchText%')  ORDER BY dateposted DESC";

        $resultAllDocs = mysqli_query($connection, $allDocsQuery);
        $totalDocs = mysqli_num_rows($resultAllDocs);
        $pages = ceil($totalDocs / $limit);
        $page = isset($_GET['page']) ? $_GET['page'] : $page = 1;

        if ($page > $pages || $page <= 0 || !is_numeric($page))
            $page = 1;

        $start = ($page - 1) * $limit;

        $query = "SELECT * FROM news  WHERE published=0 AND ( title LIKE '%$searchText%')  ORDER BY dateposted DESC LIMIT $start , $limit";

        $result = mysqli_query($connection, $query);
        $count = (($page - 1) * $limit);

        if ($totalDocs > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $count++;
        ?>
                <tr>
                    <td style="display: none;"> <?php echo $row['id']; ?></td>
                    <td><?php echo $count; ?></td>
                    <td> <?php echo $row['title']; ?></td>
                    <td>

                        <a class="getId" data-toggle="modal" data-target="#deleteModal">
                            <img src="./../../assets/icons/done.png" />
                        </a>
                        <a href="./newsdetails.php?id=<?php echo $row['id']; ?>"> <img src="./../../assets/icons/eye.png" /></a>
                    </td>
                </tr>
            <?php
            }
        } else { ?>
            <tr>
                <td colspan="6">No Records .</td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php if ($pages > 0) { ?>
    <nav aria-label="Page navigation d-flex justify-content-end example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="./approvenews.php?page=<?php if ($page <= 1) echo  1;
                                                                    else echo $page - 1 ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php
            for ($i = 0; $i < $pages; $i++) {
            ?>
                <li class="page-item">
                    <a class="page-link" href="./../usersviews/approvenews.php?page=<?php echo $i + 1 ?>">
                        <?php echo $i + 1 ?>
                    </a>
                </li>
            <?php } ?>
            <li class="page-item ">
                <a class="page-link" href="./approvenews.php?page=<?php if ($page >= $pages) echo  1;
                                                                    else echo $page + 1 ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
<?php } ?>