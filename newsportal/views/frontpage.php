<!DOCTYPE html>
<html lang="en">
<?php require "./partials/head.php"; ?>

<body>
    <?php require "./../services/connection.php"; ?>
    <?php require "./partials/navbar.php"; ?>
    <?php require "./partials/breakingnews.php"; ?>
    <div class="d-flex flex-row p-2" style=" width: 100vw">
        <div class="flex-column d-flex" style="width: 20rem;">
            <?php require "./partials/mostcommented.php"; ?>
            <?php require "./partials/mostviewed.php"; ?>
        </div>
        <?php
        $query = "SELECT * FROM news WHERE published = 1 ORDER BY dateposted DESC LIMIT 9 ";
        $result = mysqli_query($connection, $query);
        for ($i = 0; $i < 9; $i++) {
            $new[$i] = mysqli_fetch_array($result);
        }
        ?>
        <div class="d-flex border border-danger flex-column"">
            <div class=" d-flex">
            <div class="flex-column">
                <div class="p-2 d-flex border-bottom border-dark">
                    <p class="p-2 text-center overflow-hidden" style="width: 15rem; height: 5rem;">
                        <a href='./detailspage.php?id=<?php echo $new[1][0]; ?>'>
                            <?php echo $new[1]['title']; ?>...
                        </a>
                    </p>
                    <img class="ml-auto" style="width: 5rem; height: 5rem;" src="./../../images/news/<?php echo $new[1][4]; ?>" alt="new" />
                </div>
                <div class="p-2 d-flex border-bottom border-dark">
                    <p class="p-2 text-center overflow-hidden" style="width: 15rem; height: 5rem;">
                        <a href='./detailspage.php?id=<?php echo $new[2][0]; ?>'>
                            <?php echo $new[2]['title']; ?> ...
                        </a>
                    </p>
                    <img class="ml-auto" style="width: 5rem; height: 5rem;" src="./../../images/news/<?php echo $new[2][4]; ?>" alt="new" />
                </div>
                <div class="p-2 d-flex border-bottom border-dark">
                    <p class="p-2 text-center overflow-hidden" style="width: 15rem; height: 5rem;">
                        <a href='./detailspage.php?id=<?php echo $new[3][0]; ?>'>
                            <?php echo $new[3]['title']; ?>...
                        </a>
                    </p>
                    <img class="ml-auto" style="width: 5rem; height: 5rem;" src="./../../images/news/<?php echo $new[3][4]; ?>" alt="new" />
                </div>
                <div class="p-2 d-flex border-bottom border-dark">
                    <p class="p-2 text-center overflow-hidden" style="width: 15rem;">
                        <a href='./detailspage.php?id=<?php echo $new[4][0]; ?>'>
                            <?php echo $new[4]['title']; ?>...
                        </a>
                    </p>
                    <img class="ml-auto" style="width: 5rem; height : 5rem;" src="./../../images/news/<?php echo $new[4][4]; ?>" alt="new" />
                </div>
            </div>
            <div class="flex-column p-2 " style="width: 35rem;">
                <img class="card-img-top" src="./../../images/news/<?php echo $new[0][4]; ?>" alt="new" />
                <p class="card-text text-center overflow-hidden p-2">
                    <a href='./detailspage.php?id=<?php echo $new[0][0]; ?>'>
                        <?php echo $new[0]['title']; ?> ...
                    </a>
                </p>
            </div>

        </div>
        <div class="d-flex flex-row m-auto">
            <div class="flex-column p-2" style="width: 13rem; ">
                <img style="width: 13rem;" class="p-2" src="./../../images/news/<?php echo $new[5][4]; ?>" alt="new" />
                <p class="card-text text-center overflow-hidden p-2">
                    <a href='./detailspage.php?id=<?php echo $new[5][0]; ?>'>
                        <?php echo $new[5]['title']; ?> ...
                    </a>
                </p>
            </div>
            <div class="flex-column p-2" style="width: 13rem; ">
                <img style="width: 13rem;" class="p-2" src="./../../images/news/<?php echo $new[6][4]; ?>" alt="new" />
                <p class="card-text text-center overflow-hidden p-2">
                    <a href='./detailspage.php?id=<?php echo $new[6][0]; ?>'>
                        <?php echo $new[6]['title']; ?> ...
                    </a>
                </p>
            </div>
            <div class="flex-column p-2" style="width: 13rem; ">
                <img style="width: 13rem;" class="p-2" src="./../../images/news/<?php echo $new[7][4]; ?>" alt="new" />
                <p class="card-text text-center overflow-hidden p-2">
                    <a href='./detailspage.php?id=<?php echo $new[7][0]; ?>'>
                        <?php echo $new[7]['title']; ?> ...
                    </a>
                </p>
            </div>
            <div class="flex-column p-2" style="width: 13rem; ">
                <img style="width: 13rem;" class="p-2" src="./../../images/news/<?php echo $new[8][4]; ?>" alt="new" />
                <p class="card-text text-center overflow-hidden p-2">
                    <a href='./detailspage.php?id=<?php echo $new[8][0]; ?>'>
                        <?php echo $new[8]['title']; ?> ...
                    </a>
                </p>
            </div>

        </div>
        <?php
        $query = "SELECT * FROM advertisement  WHERE position = 0  AND isActive=1";
        $result = mysqli_query($connection, $query);
        $numberOfAds = mysqli_num_rows($result);

        if ($numberOfAds == 1) {
            $ad = mysqli_fetch_array($result);
        ?>
            <div class="d-flex justify-content-center">
                <img class=" p-2 align-center" src="./../../images/ads/<?php echo $ad['image']; ?>" width="800px" height="100px">
            </div>
        <?php } ?>
    </div>
    </div>
</body>

</html>