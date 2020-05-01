<nav class="navbar navbar-expand-lg">
	<a class="navbar-brand" href="#">
		<img src="./../assets/images/sky-news-logo.png" alt="new" width="200px" height="50px" />
	</a>
</nav>
<nav class="navbar second-nav  navbar-expand-lg ">
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link " href="./frontpage.php">
					Home
					<span class="sr-only">(current)</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Urgent news</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Global</a>
			</li>
			<?php require "./../services/connection.php"; ?>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Categories
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<?php
					$query = "SELECT * FROM categories";
					$result = mysqli_query($connection, $query);
					while ($category = mysqli_fetch_array($result)) {
					?>
						<a class="dropdown-item" href=""><?php echo $category[1]; ?></a>
					<?php } ?>
				</div>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto row">
			<form class="form-inline mr-auto" autocomplete="off" action="detailspage.php" method="post">
				<input class="form-control mr-sm-2 termText rounded-0" id="search" placeholder="Search for news ..." aria-label="Search" />
				<button class="btn my-2 my-sm-0 Search" type="submit" name="submit" value="Search">
					<i>
						<img class="search" src="./../assets/icons/pinpng.com-searchicon-png-773069.png" alt="new" width="20px" height="20px" />
					</i>
				</button>
			</form>
			<div class="col-md-2" style="position: absolute; z-index:10; margin-top:39px; margin-left:-15.5px;">
				<div class="list-group" id="showlist">
				</div>
			</div>
		</ul>

	</div>
</nav>