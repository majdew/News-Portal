<?php
require "./../services/connection.php";
if (isset($_POST['query'])) {
    $searchText = $_POST['query'];
    $query = "SELECT * FROM news WHERE published=1 AND ( title LIKE '%$searchText%' )  ";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
?>

            <a href='./detailspage.php?id=<?php echo $row['id']; ?>' class="list-group-item list-group-item-action border-1 text-center"><?php echo $row['title']; ?> </a>        <?php    }
    } else { ?>
        <p class="list-group-item list-group-item-action border-1 text-center"> No Record </p>
<?php
    }
}
?>