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
        require "./../connection.php";

        $limit = 4;

        if ($_POST['query'])
            $searchText = mysqli_escape_string($connection, $_POST['query']);
        else
            $searchText = '';


        $allDocsQuery = "SELECT * FROM users WHERE (roleId = 1 OR roleId=2)
                                AND ( name LIKE '%$searchText%' OR email LIKE '%$searchText%')";

        $resultAllDocs = mysqli_query($connection, $allDocsQuery);
        $totalDocs = mysqli_num_rows($resultAllDocs);
        $pages = ceil($totalDocs / $limit);
        $page = isset($_GET['page']) ? $_GET['page'] : $page = 1;

        if ($page > $pages || $page <= 0 || !is_numeric($page))
            $page = 1;

        $start = ($page - 1) * $limit;

        $query = "SELECT * FROM users WHERE (roleId = 1 OR roleId=2 )
                        AND ( name LIKE '%$searchText%' OR email LIKE '%$searchText%') LIMIT $start , $limit";

        $result = mysqli_query($connection, $query);
        $count = (($page - 1) * $limit);

        if ($totalDocs > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $count++;
        ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td> <?php echo $row['name']; ?></td>
                    <td> <?php echo $row['email']; ?></td>
                    <td>
                        <img class="align-middle" src="./../../../images/users/<?php echo $row['image']; ?>" width="30px" height="30px" />
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
                    <a class="page-link" href="./allusers?page=<?php echo $i + 1 ?>">
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
<?php } ?>