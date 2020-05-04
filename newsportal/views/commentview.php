<div class="d-flex justify-content-around p-3">
    <div>
        <h5 class="h5 form-label-group text-center"> All comments : </h5>
        <div class="mb-4">
            <div id="showcomments">
                <?php
                $newId = $_GET['id'];
                $query = "SELECT * FROM newscomments WHERE newId =$newId ORDER BY date DESC LIMIT 3 ";
                $allDocs = "SELECT * FROM newscomments WHERE newId =$newId ORDER BY date DESC";
                $result = mysqli_query($connection, $query);
                $resultAllDocs = mysqli_query($connection, $allDocs);


                while ($new = mysqli_fetch_array($result)) {
                    $comment = $new['comment'];
                    $date = $new['date'];

                ?>

                    <p class="text-center"><?php echo $comment; ?>
                        <span class="text-secondary">
                            <?php echo "  " . $date; ?>
                        </span>
                    </p>
                <?php }
                if (mysqli_num_rows($resultAllDocs) > 3) { ?>
                    <input hidden id="newIdComment" hidden value="<?php echo $newId; ?>" type="text">
                    <button class="btn btn-sm  border-1 text-center" id="showall"><a>show more ...</a></button>
                <?php } ?>
            </div>
            <form class="mt-3 form-signin d-flex flex-column justify-content-around" style="height:15vh;" action="./../services/comment.php" method="post" style="height:100vh" enctype="multipart/form-data">
                <?php if (isset($_GET['id'])) { ?>
                    <input type="text" name="newid" hidden value="<?php echo $_GET['id'] ?>">
                <?php } ?>
                <div class="form-label-group row text-center">
                    <input class="form-control" name="comment" placeholder="Your comment ..." required>
                </div>

                <div class=" row text-center text-danger">
                    <?php

                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == 1) {
                            echo "Invalid information !!!";
                        }
                    }
                    ?>
                </div>
                <button class="btn  btn-sm btn-primary btn-block text-center" name="submit" type="submit">
                    comment
                </button>
            </form>
        </div>
    </div>
</div>
<div>

</div>
</div>