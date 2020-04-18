<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">

    <title>Admin Panel</title>
    <!-- Custom styles for this template -->
    <link href="./../assets/style/dashboard.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar second-nav bg-dark  navbar-expand-lg border border-light ">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link " href="./frontpage.php">
                        Home
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <form class="form-inline mr-auto">
                    <input class="form-control mr-sm-2 border border-light" type="search" placeholder="Search for news ..." aria-label="Search" />
                    <button class="btn my-2 my-sm-0" type="submit">
                        <i>
                            <img class="search" src="./../assets/icons/pinpng.com-searchicon-png-773069.png" alt="new" width="20px" height="20px" />
                        </i>
                    </button>
                </form>
            </ul>
        </div>
    </nav>
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
                    <div class="borde bg-light rounded border-dark p-2 " style="width: 15rem;">
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