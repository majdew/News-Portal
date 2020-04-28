<!doctype html>
<html lang="en">

<?php require "./../partials/head.php" ?>

<body style="height:100vh" class="d-flex flex-column  justify-content-center">

    <form class="form-signin d-flex flex-column   justify-content-around" action="./../../services/auth.php"
        method="post" style="height:65vh">
        <div class="text-center mb-4">
            <img class="mb-4" src="./../../assets/icons/sky-news-logo.png" width="300" height="100">
            <h1 class="h3 mb-3 font-weight-normal"> Admin Panel</h1>
        </div>

        <div class="form-label-group row text-center d-flex justify-content-center">
            <label for="inputEmail" class="col-2">Email address</label>
            <input type="email" class="form-control col-4" name="username" required autofocus>

        </div>

        <div class="form-label-group row text-center d-flex justify-content-center">
            <label for="inputPassword" class="col-2">Password</label>
            <input type="password" class="form-control col-4" name="password" required>

        </div>
        <div class=" row text-center text-danger d-flex justify-content-center">
            <?php

			if (isset($_GET['error'])) {
				if ($_GET['error'] == 1) {
					echo "Invalid username or password!";
				}
			}

			?>
        </div>
        <div class="d-flex row justify-content-center">
            <button class="btn btn-lg btn-primary btn-block col-3 text-center" type="submit">Sign in</button>
        </div>
    </form>
</body>

</html>