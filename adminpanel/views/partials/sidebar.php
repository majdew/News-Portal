<?php

session_start();
$username = $_SESSION['username'];
$name = $_SESSION['name'];
$image = $_SESSION['image'];

?>
<nav class="col-md-2 d-none d-md-block bg-light sidebar" style="height: 100vh;">
    <div class="border user  bg-dark rounded border-light p-2 mt-2">
        <div class="text-center ">
            <img class=" align-middle" src="./../../assets/icons/<?php echo $image; ?>" />
            <p class="card-title"><?php echo $name ?></p>
            <h6 class="card-text email"><?php echo $username ?></h6>
            <p>
                <a href="./../../services/logout.php">
                    <span class="logout">logout</span>
                    <img src="./../../assets/icons/logout.png" width="20px" height="20px" />
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
                    <img class="search align-middle" src="./../../assets/icons/main.png" width="20px" height="20px" />
                    Home
                </a>
            </li>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>News</span>
            </h6>
            <li class="nav-item">
                <a class="nav-link" href="./../usersviews/allnews.php">
                    <img class="search align-middle" src="./../../assets/icons/news.png" width="20px" height="20px" />
                    All News
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./../usersviews/categories.php">
                    <img class="search align-middle" src="./../../assets/icons/categories.png" width="20px" height="20px" />
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./../usersviews/addnews.php">
                    <img class="search align-middle" src="./../../assets/icons/draw.png" width="20px" height="20px" />
                    Add News
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./../usersviews/approvenews.php">
                    <img class="search align-middle" src="./../../assets/icons/like.png" width="20px" height="20px" />
                    Approve News
                </a>
            </li>

        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Users</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="./../usersviews/allusers.php">
                    <img class="search align-middle" src="./../../assets/icons/team.png" width="20px" height="20px" />
                    All User
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./../usersviews/adduser.php">
                    <img class="search align-middle" src="./../../assets/icons/add.png" width="20px" height="20px" />
                    Add User
                </a>
            </li>
        </ul>
    </div>
</nav>