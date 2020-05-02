<?php

require "./../../services/connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM advertisement WHERE id=$id";

    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
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
                            Update Ads:
                        <?php } else { ?>
                            Add Ads:
                        <?php } ?>
                    </h1>
                </div>
                <div style="height:70vh" class="d-flex flex-column  justify-content-center">

                    <form class="form-signin d-flex flex-column  justify-content-between" <?php if (isset($_GET['id'])) { ?> action="./../../usersfunctionality/updatead.php" <?php } else { ?> action="./../../usersfunctionality/addad.php" <?php } ?> method="post" style="height:100vh" enctype="multipart/form-data">

                        <?php if (isset($_GET['id'])) { ?> <input type="text" name="id" hidden value="<?php echo $_GET['id'] ?>"><?php } ?>

                        <div class="form-label-group row text-center d-flex justify-content-center">
                            <label for="website" class="col-2">Website</label>
                            <input class="form-control col-4" name="website" <?php if (isset($_GET['id'])) { ?> value="<?php echo $row['website']; ?> " <?php } ?> required autofocus>
                        </div>

                        <div class="form-label-group row text-center d-flex justify-content-center">
                            <label for="image" class="col-2">Image</label>
                            <input <?php if (!isset($_GET['id'])) echo "required"; ?>type="file" class="form-control-file col-4" name="ad" <?php if (isset($_GET['id'])) { ?> value="./../../../images/ads/<?php echo $row['image']; ?>" <?php } ?>>
                        </div>
                        <div class="form-label-group text-center row d-flex justify-content-center">
                            <label for="role" class="col-2">Status</label>
                            <div class=" form-check col-4 d-flex justify-content-between ">
                                <div class="text-center d-flex justify-content-between">
                                    <label for="active" class="col-4">Active</label>
                                    <input class="form-check-input" name="isActive" value="1" <?php if (isset($_GET['id'])) {
                                                                                                    if ($row['isActive'] == 1) echo "checked";
                                                                                                } else { ?> checked <?php }  ?> type="radio">

                                </div>

                                <div class="text-center d-flex justify-content-between">
                                    <label for="notactive" class="col-5">Not Active</label>
                                    <input class="form-check-input" name="isActive" value="0" type="radio" <?php if (isset($_GET['id'])) {
                                                                                                                if ($row['isActive'] == 0) echo "checked";
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