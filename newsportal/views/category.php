<!DOCTYPE html>
<html lang="en">

<?php require "./partials/head.php"; ?>

<body>
    <?php require "./../services/connection.php"; ?>
    <?php require "./partials/navbar.php"; ?>
    <?php require "./partials/breakingnews.php"; ?>
    <div class="d-flex flex-column justify-content-around" style="height:70vh;">
        <div class="d-flex justify-content-around">
            <?php
            if (!isset($_GET['category']))
                header("location:./frontpage.php");
            else {
                $category = $_GET['category'];
                $limit = 4;

                $allDocsQuery = "SELECT * FROM news WHERE published = 1 AND category='$category' ";

                $resultAllDocs = mysqli_query($connection, $allDocsQuery);
                $totalDocs = mysqli_num_rows($resultAllDocs);
                $pages = ceil($totalDocs / $limit);
                $page = isset($_GET['page']) ? $_GET['page'] : $page = 1;

                if ($page > $pages || $page <= 0 || !is_numeric($page))
                    $page = 1;

                $start = ($page - 1) * $limit;

                $query = "SELECT * FROM news WHERE published = 1 AND category='$category' ORDER BY dateposted DESC LIMIT $start , $limit  ";

                $result = mysqli_query($connection, $query);
                $count = (($page - 1) * $limit);

                if ($totalDocs > 0) {
                    while ($new = mysqli_fetch_array($result)) {

            ?>
                        <div class="p-2 border border-danger">
                            <div class=" flex-column" style="width: 14rem; ">
                                <img style="width: 13rem;" class="p-2" src="./../../images/news/<?php echo $new[4]; ?>" alt="new" />
                                <p class="card-text text-center p-2">
                                    <a href='./detailspage.php?id=<?php echo $new['id']; ?>'>
                                        <?php echo $new['title']; ?> ...
                                    </a>
                                </p>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <div class="p-2 border border-danger">
                        <div class=" flex-column" style="width: 14rem; ">
                            <p class="card-text text-center p-2">
                                No Results
                            </p>
                        </div>
                    </div>
                <?php } ?>
        </div>
        <?php
                if ($pages > 0) { ?>
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="./category?category=<?php echo $category ?>&page=<?php if ($page <= 1) echo  1;
                                                                                                        else echo $page - 1 ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <?php
                        for ($i = 0; $i < $pages; $i++) {
                        ?>
                            <li class="page-item">
                                <a class="page-link" href="./category?category=<?php echo $category ?>&page=<?php echo $i + 1 ?>">
                                    <?php echo $i + 1 ?>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="page-item ">
                            <a class="page-link" href="./category?category=<?php echo $category ?>&page=<?php if ($page >= $pages) echo  1;
                                                                                                        else echo $page + 1 ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
    <?php }
            } ?>

</body>

</html>