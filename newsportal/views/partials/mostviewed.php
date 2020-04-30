<div class="container border border-danger mt-4 " style="width: 20rem;">
    <h5 class="text-center h6 pt-2 ">Most Viewed News :</h5>
    <div class="row">
        <?php
        
        $query = "SELECT * FROM news ORDER BY views DESC LIMIT 4";
        $result = mysqli_query($connection, $query);

        while ($new = mysqli_fetch_array($result)) {
            $newImage = $new['image'];
            $newTitle = $new['title']

        ?>
            <div class=" col p-2 flex-column" style="width: 8rem;">

                <img style="width: 8rem;" class="text-center" src="./../assets/images/<?php echo $newImage; ?>" alt="new" />
                <p class="card-text text-center overflow-hidden" style="height : 3rem;">
                    <a href='./detailspage.php?id=<?php echo $new['id']; ?>'>
                        <?php echo $newTitle; ?> ...
                    </a>
                </p>

            </div>
        <?php } ?>
    </div>
</div>