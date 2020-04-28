<nav aria-label="Page navigation d-flex justify-content-end example">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <?php 
        for($i=0 ; $i<$pages ; $i++){
        ?>
        <li class="page-item">
            <a class="page-link" href="./allnews?page=<?php echo $page ?>" >
                <?php echo $page ?>
            </a>
        </li>
        <?php } ?>
        <li class="page-item">
            <a class="page-link" href="./allnews?page=<?php echo $page ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>