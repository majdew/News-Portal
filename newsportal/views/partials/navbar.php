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
		<ul class="navbar-nav ml-auto">
			<form class="form-inline mr-auto">
				<input class="form-control mr-sm-2 border border-danger" type="search" placeholder="Search for news ..." aria-label="Search" />
				<button class="btn my-2 my-sm-0" type="submit">
					<i>
						<img class="search" src="./../assets/icons/pinpng.com-searchicon-png-773069.png" alt="new" width="20px" height="20px" />
					</i>
				</button>

			</form>


		</ul>

	</div>
</nav>
<div class="dropdown">
	<!-- <div class="d-flex flex-column search-result dropdown-menu " id="searchResult">
		<!-- <p><a class="dropdown-item" href=""> majd </a> </p>
		<p><a class="dropdown-item" href=""> zaid </a> </p> -->
	</div> -->
</div>