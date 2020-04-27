<div style="height:40vh" class="d-flex flex-column  justify-content-center">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-3  mb-3 border-bottom">

    </div>
    <form class="form-signin d-flex flex-column  justify-content-between" action="./../services/comment.php"
        method="post" style="height:100vh" enctype="multipart/form-data">
        <h5 class="h5 form-label-group row text-center d-flex justify-content-center"> Add comments : </h5>

        <?php if (isset($_GET['id'])) { ?>
        <input type="text" name="newid" hidden value="<?php echo $_GET['id'] ?>">
        <?php } ?>
        <div class="form-label-group row text-center d-flex justify-content-center">
            <input class="form-control col-4" name="comment" placeholder="Your comment ..." required autofocus>
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
            <button class="btn btn-lg btn-primary btn-block col-2 text-center" name="submit" value="Submit"
                type="submit">
                post comment
            </button>
        </div>
    </form>
</div>