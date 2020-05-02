<?php

require "./../../services/connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM users WHERE id=$id";

    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
}
?>

<!doctype html>
<html lang="en">

<?php require "./../partials/head.php" ?>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require "./../partials/sidebar.php"; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">
                        <?php if (isset($_GET['id'])) { ?>
                            Update User:
                        <?php } else { ?>
                            Add User:
                        <?php } ?>
                    </h1>
                </div>
                <div style="height:80vh" class="d-flex flex-column  justify-content-center">

                    <form class="form-signin d-flex flex-column  justify-content-between" <?php if (isset($_GET['id'])) { ?> action="./../../usersfunctionality/updateuser.php" <?php } else { ?> action="./../../usersfunctionality/adduser.php" <?php } ?> method="post" style="height:100vh" enctype="multipart/form-data">

                        <?php if (isset($_GET['id'])) { ?> <input type="text" name="id" hidden value="<?php echo $_GET['id'] ?>"><?php } ?>

                        <div class="form-label-group row text-center d-flex justify-content-center">
                            <label for="name" class="col-2">Name</label>
                            <input class="form-control col-4" name="name" <?php if (isset($_GET['id'])) { ?> value="<?php echo $user['name']; ?> " <?php } ?> required autofocus>
                        </div>

                        <div class="form-label-group row text-center d-flex justify-content-center">
                            <label for="email" class="col-2">Email</label>
                            <input class="form-control col-4" name="email" <?php if (isset($_GET['id'])) { ?> value="<?php echo $user['email']; ?> " <?php } ?> required autofocus>
                        </div>

                        <div class="form-label-group row text-center d-flex justify-content-center">
                            <label for="inputPassword" class="col-2">Password</label>
                            <input type="password" class="form-control col-4" <?php if (isset($_GET['id'])) { ?> value="<?php echo $user['password']; ?> " <?php } ?> placeholder="Password" name="password" required>
                        </div>

                        <div class="form-label-group row text-center d-flex justify-content-center">
                            <label for="image" class="col-2">Image</label>
                            <input <?php if (!isset($_GET['id'])) echo "required"; ?> type="file" class="form-control-file col-4" name="user" id="user" <?php if (isset($_GET['id'])) { ?> value="./../../../images/users/<?php echo $user['image']; ?>" <?php } ?>>
                        </div>

                        <div class="form-label-group text-center row d-flex justify-content-center">
                            <label for="role" class="col-2">Role</label>
                            <div class=" form-check col-4 d-flex justify-content-between ">
                                <div class="text-center d-flex justify-content-between">
                                    <label for="writer" class="col-4">Writer</label>
                                    <input class="form-check-input" name="roleId" value="2" <?php if (isset($_GET['id'])) {
                                                                                                if ($user['roleId'] == 2) echo "checked";
                                                                                            } else { ?> checked <?php }  ?> type="radio">

                                </div>

                                <div class="text-center d-flex justify-content-between">
                                    <label for="editor" class="col-4">Editor</label>
                                    <input class="form-check-input" name="roleId" value="1" type="radio" <?php if (isset($_GET['id'])) {
                                                                                                                if ($user['roleId'] == 1) echo "checked";
                                                                                                            } ?>>
                                </div>
                            </div>
                        </div>

                        <div class=" row text-center d-flex text-danger justify-content-center">
                            <?php
                            if (isset($_GET['error'])) {
                                if ($_GET['error'] == 1) {
                                    echo "Invalid User Information !";
                                }
                            }
                            ?>
                        </div>
                        <div class="d-flex row justify-content-center">
                            <button class="btn btn-lg btn-primary btn-block col-3 text-center" name="submit" value="Submit" type="submit">
                                <?php if (isset($_GET['id'])) { ?>
                                    Update
                                <?php } else { ?>
                                    Add
                                <?php } ?>
                            </button>
                        </div>
                    </form>
                </div>


            </main>
        </div>
    </div>
</body>

</html>