<?php

session_start();
$email = $_SESSION['username'];
$name = $_SESSION['name'];
$image = $_SESSION['image'];
$roleId = $_SESSION['roleId'];

require "./../../services/connection.php";

?>
<nav class="col-md-2 d-none d-md-block bg-light sidebar fixed-top" style="height: 100vh;">
    <div class="border user  bg-dark rounded border-light p-2 mt-2">
        <div class="text-center ">
            <img class=" align-middle" src="./../../assets/icons/<?php echo $image; ?>" />
            <p class="card-title"><?php echo $name ;?></p>
            <h6 class="card-text email"><?php echo $email;?></h6>
            <p>
                <a href="./../../services/logout.php">
                    <span class="logout">logout</span>
                    <img src="./../../assets/icons/logout.png" />
                </a>
            </p>
        </div>
    </div>
    <div class="sidebar-sticky text-center">

        <ul class="nav flex-column">
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>General</span>
            </h6>
            <li class="nav-item">
                <a class="nav-link" href="./../mainviews/dashboard.php">
                    <img class="search align-middle" src="./../../assets/icons/home.png" />
                    Home
                </a>
            </li>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>News</span>
            </h6>
            <li class="nav-item">
                <a class="nav-link" href="./../usersviews/allnews.php">
                    <img class="search align-middle" src="./../../assets/icons/news.png" />
                    All News
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./../usersviews/categories.php">
                    <img class="search align-middle" src="./../../assets/icons/categories.png" />
                    Categories
                </a>
            </li>
            <?php if ($roleId == 2) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="./../usersviews/addnews.php">
                        <img class="search align-middle" src="./../../assets/icons/write.png" />
                        Add News
                    </a>
                </li>
            <?php } ?>

            <?php if ($roleId == 1) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="./../usersviews/approvenews.php">
                        <img class="search align-middle" src="./../../assets/icons/like.png" />
                        Approve News
                    </a>
                </li>
            <?php } ?>
        </ul>
        <?php if ($roleId == 0) { ?>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Users</span>
            </h6>
            <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link" href="./../usersviews/allusers.php">
                        <img class="search align-middle" src="./../../assets/icons/team.png" />
                        All Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./../usersviews/adduser.php">
                        <img class="search align-middle" src="./../../assets/icons/add.png" />
                        Add User
                    </a>
                </li>
            <?php } ?>
            </ul>
    </div>
</nav>