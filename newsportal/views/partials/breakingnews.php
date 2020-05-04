<nav class="navbar second-nav carousel slide  navbar-expand-lg " data-ride="carousel" style="background-color: #b30000; width:100vw;">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class=" carousel-inner navbar-nav mr-auto">
            <?php

            $queryBreakingNews = "SELECT * FROM news WHERE isUrgent = 1 AND published =1 ORDER BY dateposted DESC ";
            $resultBreakingNews = mysqli_query($connection, $queryBreakingNews);
            $counter = 0;

            while ($breakingNew = mysqli_fetch_array($resultBreakingNews)) {
                $newTitle = $breakingNew['title'];
                $newId = $breakingNew['id'];
                $counter++;

                if ($counter == 1) {
            ?>
                    <li class=" carousel-item nav-item active">
                        <a class="nav-link" href='./detailspage.php?id=<?php echo $newId ?>'>
                            <p class="text-white text-center" style="width : 100vw;"><?php echo $newTitle ?></p>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class=" carousel-item nav-item">
                        <a class="nav-link" href='./detailspage.php?id=<?php echo $newId ?>'>
                            <p class="text-white text-center" style="width : 100vw;"><?php echo $newTitle ?></p>
                        </a>
                    </li>
            <?php }
            }
            ?>
        </ul>
    </div>
</nav>