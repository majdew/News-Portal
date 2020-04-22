<!doctype html>
<html lang="en">

<?php require "./partials/head.php" ?>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require "./partials/sidebar.php"; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button>
                    </div>

                </div>
                <div class="dflex row justify-content-around mt-4">
                    <div class="borde bg-light rounded border-dark p-2" style="width: 15rem;">
                        <div class="text-center ">
                            <h2 class="card-title font-italic">All news</h2>
                            <h2>100</h2>
                            <p class="font-italic">
                                <i><img src="./../assets/icons/news.png" width="50px" height="50px" /></i>
                            </p>
                        </div>
                    </div>
                    <div class="border bg-light rounded border-dark p-2 " style="width: 15rem;">
                        <div class="text-center ">
                            <h2 class="card-title font-italic">All users</h2>
                            <h2>5</h2>
                            <p class="font-italic">
                                <i><img src="./../assets/icons/team.png" width="50px" height="50px" /></i>
                            </p>
                        </div>
                    </div>
                    <div class="borde bg-light rounded border-dark p-2" style="width: 15rem;">
                        <div class="text-center ">
                            <h2 class="card-title font-italic">Views</h2>
                            <h2>1000</h2>
                            <p class="font-italic">
                                <i><img src="./../assets/icons/news.png" width="50px" height="50px" /></i>
                            </p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>