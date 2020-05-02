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
        if (isset($_POST['query'])) {
            require "./../connection.php";
            $limit = 4;
            if (isset($_GET['page']))
                $page = $_GET['page'];
            else $page = 1;

            $start = ($page - 1) * $limit;
            $searchText = $_POST['query'];

            $query = "SELECT * FROM users WHERE (roleId = 1 OR roleId=2 )
                        AND ( name LIKE '%$searchText%' OR email LIKE '%$searchText%') LIMIT $start , $limit";
            $allDocsQuery = "SELECT * FROM users WHERE (roleId = 1 OR roleId=2)
                                AND ( name LIKE '%$searchText%' OR email LIKE '%$searchText%')";

            $result = mysqli_query($connection, $query);
            $resultAllDocs = mysqli_query($connection, $allDocsQuery);

            $totalDocs = mysqli_num_rows($resultAllDocs);
            $pages = ceil($totalDocs / $limit);

            $count = 0 + (($page - 1) * $limit);
            if (mysqli_num_rows($result) > 0) {
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
        <?php }
            }
        } ?>
    </tbody>
</table>
<?php require "./../../views/partials/pages.php"; ?>