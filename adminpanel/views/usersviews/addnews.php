<?php

require "./../../services/connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM news WHERE id=$id";

    $result = mysqli_query($connection, $query);
    $new = mysqli_fetch_assoc($result);
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
                            Update New :
                        <?php } else { ?>
                            Add News :
                        <?php } ?>

                    </h1>
                </div>

                <div style="height:80vh" class="d-flex flex-column  justify-content-center">

                    <form class="form-signin d-flex flex-column  justify-content-between" <?php if (isset($_GET['id'])) { ?> action="./../../usersfunctionality/updatenews.php" <?php } else { ?> action="./../../usersfunctionality/addnews.php" <?php } ?>method="post" style="height:100vh" enctype="multipart/form-data">

                        <?php if (isset($_GET['id'])) { ?> <input type="text" name="id" hidden value="<?php echo $_GET['id'] ?>"><?php } ?>
                        <div class="form-label-group row text-center d-flex justify-content-center">
                            <label for="title" class="col-2">Title</label>
                            <input class="form-control col-4" name="title" <?php if (isset($_GET['id'])) { ?> value=" <?php echo $new['title']; ?> " <?php } ?> required autofocus>
                        </div>

                        <div class=" form-label-group row text-center d-flex justify-content-center">
                            <label for="body" class="col-2">Body</label>
                            <textarea class="form-control col-4" name="body" required>
                                <?php if (isset($_GET['id'])) {
                                    echo $new['body'];
                                } ?>
                            </textarea>
                        </div>

                        <div class="form-label-group row text-center d-flex justify-content-center">
                            <label for="image" class="col-2">Image</label>
                            <input <?php if (!isset($_GET['id'])) echo "required"; ?> type="file" multiple class="form-control-file col-4" accept="image/*" name="news">
                        </div>

                        <div class="form-label-group row text-center d-flex justify-content-center">
                            <label for="body" class="col-2">Category</label>
                            <select class="form-control col-4" name="category">
                                <?php
                                $query = "SELECT * FROM categories";
                                $result = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <option <?php if (isset($_GET['id'])) {
                                                if ($row['name'] == $new['category']) echo "selected";
                                            } ?> value="<?php echo $row['name']; ?>">
                                        <?php echo $row['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-label-group text-center row d-flex justify-content-center">
                            <label for="isUrgent" class="col-2">Is Urgent</label>
                            <div class=" form-check col-4 d-flex justify-content-between ">
                                <div class="text-center d-flex justify-content-between">
                                    <label for="writer" class="col-4">Yes</label>
                                    <input class="form-check-input" name="isUrgent" value="1" <?php if (isset($_GET['id'])) {
                                                                                                    if ($new['isUrgent'] == 1) echo "checked";
                                                                                                } else { ?> checked <?php }  ?> type="radio">

                                </div>

                                <div class="text-center d-flex justify-content-between">
                                    <label for="editor" class="col-4">No</label>
                                    <input class="form-check-input" name="isUrgent" value="0" <?php if (isset($_GET['id'])) {
                                                                                                    if ($new['isUrgent'] == 0) echo "checked";
                                                                                                } else { ?> checked <?php }  ?> type="radio">
                                </div>
                            </div>
                        </div>
                        <div class="form-label-group text-center row d-flex justify-content-center">
                            <label for="isUrgent" class="col-2">Is Global</label>
                            <div class=" form-check col-4 d-flex justify-content-between ">
                                <div class="text-center d-flex justify-content-between">
                                    <label for="isGlobal" class="col-4">Yes</label>
                                    <input class="form-check-input" name="isGlobal" value="1" <?php if (isset($_GET['id'])) {
                                                                                                    if ($new['isGlobal'] == 1) echo "checked";
                                                                                                } else { ?> checked <?php }  ?> type="radio">

                                </div>

                                <div class="text-center d-flex justify-content-between">
                                    <label for="editor" class="col-4">No</label>
                                    <input class="form-check-input" name="isGlobal" value="0" <?php if (isset($_GET['id'])) {
                                                                                                    if ($new['isGlobal'] == 0) echo "checked";
                                                                                                } else { ?> checked <?php }  ?> type="radio">
                                </div>
                            </div>
                        </div>

                        <div class=" row text-center text-danger d-flex justify-content-center">
                            <?php

                            if (isset($_GET['error'])) {
                                if ($_GET['error'] == 1) {
                                    echo "Invalid information !!!";
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