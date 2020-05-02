 <?php
    $newId = $_GET['id'];
    $query = "SELECT * FROM newscomments WHERE newId =$newId ORDER BY date DESC LIMIT 3 ";
    $result = mysqli_query($connection, $query);


    while ($new = mysqli_fetch_array($result)) {
        $comment = $new['comment'];
        $date = $new['date'];

    ?>
     <p class="border-bottom border-dark text-center"><?php echo $comment; ?><?php echo " " . $date ?></p>
 <?php } ?>