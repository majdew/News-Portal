<!doctype html>
<html lang="en">

<?php require "./../partials/head.php" ?>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require "./../partials/sidebar.php"; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">All Users : </h1>
                </div>
                <div class="table-responsive">
                    <table class="table text-center table-dark table-hover table-bordered table-striped table-sm ">
                        <thead class="thead-dark">
                            <tr>
                                <th>Number</th>
                                <th>Name</th>
                                <th>Email </th>
                                <th>Image</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM users WHERE roleId = 1 OR roleId=2";
                            $result = mysqli_query($connection, $query);
                            $count = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $count++;
                            ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td> <?php echo $row['name']; ?></td>
                                <td> <?php echo $row['email']; ?></td>
                                <td>
                                    <img class=" align-middle"
                                        src="./../../../images/users/<?php echo $row['image']; ?>" width="30px"
                                        height="30px" />
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
                </div>

            </main>
        </div>
    </div>
</body>

</html>