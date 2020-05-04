<?php
require "./connection.php";
$newId = $_POST['id'];

$allDocs = "SELECT * FROM newscomments WHERE newId =$newId ORDER BY date DESC";
$resultAllDocs = mysqli_query($connection, $allDocs);


while ($row = mysqli_fetch_array($resultAllDocs)) {
    $comment = $row['comment'];
    $date = $row['date'];

?>

    <p class="text-center"><?php echo $comment; ?>
        <span class="text-secondary">
            <?php echo "  " . $date; ?>
        </span>
    </p>
<?php } ?>