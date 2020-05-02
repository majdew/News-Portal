<table class="table text-center table-dark table-hover table-bordered table-striped table-sm ">
    <thead class="thead-dark">
        <tr>
            <th>Number</th>
            <th>Title</th>
            <th>Status</th>
            <th>options</th>
        </tr>
    </thead>
    <tbody id="tablebody">
        <?php
        require "./../connection.php";
        session_start();
        $roleId = $_SESSION['roleId'];
        $id = $_SESSION['id'];

        if (isset($_POST['query'])) {
            $limit = 8;
            if (isset($_GET['page']))
                $page = $_GET['page'];
            else $page = 1;

            $start = ($page - 1) * $limit;

            $searchText = $_POST['query'];
            if ($roleId == 2) {
                $query = "SELECT * FROM news WHERE writerId=$id AND ( title LIKE '%$searchText%' )
                                            ORDER BY dateposted DESC LIMIT $start , $limit ";
                $allDocsQuery = "SELECT * FROM news WHERE writerId=$id AND ( title LIKE '%$searchText%')  ";
            } else {
                $query = "SELECT * FROM news WHERE ( title LIKE '%$searchText%' ) 
                                            ORDER BY dateposted DESC LIMIT $start , $limit  ";
                $allDocsQuery = "SELECT * FROM news WHERE ( title LIKE '%$searchText%' )";
            }

            $result = mysqli_query($connection, $query);
            $resultAllDocs = mysqli_query($connection, $allDocsQuery);

            $totalDocs = mysqli_num_rows($resultAllDocs);
            $pages = ceil($totalDocs / $limit);

            $count = 0;
            if (mysqli_num_rows($result) > 0) {
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
                <?php    } ?>
    </tbody>
</table>
<?php
                require "./../../views/partials/pages.php";
            }
        }
?>