<?php
    require "./../services/connection.php";
    require "./partials/navbar.php" ;

    if (!isset($_GET['id'])){
        header("location:./frontpage.php");
    }

    $id = $_GET['id'];
    $query = "SELECT * FROM news WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $new = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
    <?php require "./partials/head.php" ; ?>
    <body>
        <?php 
            if ($result){
                $title = $new[1];
                $imageTitle = $new[4];
                $body = $new[2];
                $category = $new[3];
        ?>
        <div class="flex-column p-2 m-auto " style="width: 35rem;">
            <p class="card-text p-2">
		        <?php echo $title ; ?>
            </p>
	        <img
		        class="card-img-top"
		        src="./../assets/images/<?php echo $imageTitle ; ?>"
		        alt="Card image cap"
            />
            <p class="card-text p-2">
		        <?php echo $body ; ?>
            </p>
        </div>
        <?php 
            }
            else {
                echo "ERROR " . mysqli_error($conn);
            }
        ?>
    </body>
</html>

