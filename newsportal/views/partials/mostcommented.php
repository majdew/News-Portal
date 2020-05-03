<div class="container border border-danger " style="width: 18rem;">
    <h5 class="text-center h6 pt-2 ">Most Commented News :</h5>
    <div class="row">
        <?php

        $query = "SELECT newid , COUNT(comment) FROM newscomments GROUP BY newid ORDER BY COUNT(comment) DESC  LIMIT 4 ";
        $result = mysqli_query($connection, $query);

        while ($mostCommentedNew = mysqli_fetch_array($result)) {

            $newQuery = "SELECT * FROM news WHERE id = $mostCommentedNew[0]";
            $newResult = mysqli_query($connection, $newQuery);
            $new = mysqli_fetch_array($newResult);
            $newImage = $new['image'];
            $newTitle = $new['title']

        ?>
            <div class=" col p-2 flex-column" style="width: 8rem;">

                <img style="width: 8rem;" class="" src="./../../images/news/<?php echo $newImage; ?>" alt="new" />
                <p class="card-text text-center overflow-hidden" style="height : 3rem;">
                    <a href='./detailspage.php?id=<?php echo $new['id']; ?>'>
                        <?php echo $newTitle; ?> ...
                    </a>
                </p>

            </div>
        <?php }
        $query = "SELECT * FROM advertisement  WHERE position = 1 AND isActive=1 ";
        $result = mysqli_query($connection, $query);
        $numberOfAds = mysqli_num_rows($result);
        if ($numberOfAds == 1) {
            $ad = mysqli_fetch_array($result);
        ?>
            <br>
            <div class="p-2">
                <img src="./../../images/ads/<?php echo $ad['image'] ; ?>" width="270px" height="200px" >
            </div>
        <?php } ?>


    </div>

</div>