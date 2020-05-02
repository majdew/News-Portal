<nav aria-label="Page navigation d-flex justify-content-end example">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="./allnews?page=<?php if ($page <= 1) echo  1;
                                                        else echo $page - 1 ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <?php
        for ($i = 0; $i < $pages; $i++) {
        ?>
            <li class="page-item">
                <a class="page-link" href="./../usersviews/allnews?page=<?php echo $i + 1 ?>">
                    <?php echo $i + 1 ?>
                </a>
            </li>
        <?php } ?>
        <li class="page-item ">
            <a class="page-link" href="./allnews?page=<?php if ($page >= $pages) echo  1;
                                                        else echo $page + 1 ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>