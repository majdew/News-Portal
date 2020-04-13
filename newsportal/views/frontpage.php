<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link
			rel="stylesheet"
			href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
			integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
			crossorigin="anonymous"
		/>
		<script
			src="https://kit.fontawesome.com/67107e9e71.js"
			crossorigin="anonymous"
		></script>
		<script
			src="https://code.jquery.com/jquery-3.4.1.min.js"
			integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			crossorigin="anonymous"
		></script>
		<link rel="stylesheet" href="./../assets/style/frontpage.css" />
		<title>News</title>
	</head>
	<body>
		<?php require "./../services/connection.php" ; ?>
		<nav class="navbar navbar-expand-lg">
			<a class="navbar-brand" href="#">
				<img
					src="./../assets/images/sky-news-logo.png"
					alt=""
					width="200px"
					height="50px"
				/>
			</a>
		</nav>
		<nav
			class="navbar second-nav navbar-expand-lg border-bottom border-danger"
		>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link font-weight-bold" href="#"
						>Home <span class="sr-only">(current)</span></a
					>
				</li>
				<li class="nav-item">
					<a class="nav-link font-weight-bold" href="#"
						>Important news</a
					>
				</li>
				<li class="nav-item">
					<a class="nav-link font-weight-bold" href="#">Global</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<form class="form-inline mr-auto">
					<input
						class="form-control mr-sm-2 border border-danger"
						type="search"
						placeholder="Search"
						aria-label="Search"
					/>
					<button
						class="btn my-2 my-sm-0 border border-danger"
						type="submit"
					>
						<i class="fas fa-search"></i>
					</button>
				</form>
			</ul>
		</nav>
		<div class="d-flex flex-row p-2">
			<div class="flex-column d-flex" style="width: 25rem;">
				<div
					class="border border-danger p-2 flex-column"
					style="width: 18rem;"
				>
					<h6 class="card-title text-center p-2">Most Commented</h6>
					<img
						src="./../assets/images/200401135051-hong-kong-farm-large-tease.jpeg"
						class="card-img-top"
						alt="..."
					/>
					<div class="card-body">
						<p class="card-text">
							Some quick example text to build on the card
						</p>
					</div>
				</div>
				<div
					class="border border-danger mt-2 flex-column"
					style="width: 18rem;"
				>
					<h6 class="card-title text-center p-2">Most Viewed</h6>
					<img
						src="./../assets/images/200401135051-hong-kong-farm-large-tease.jpeg"
						class="card-img-top"
						alt="..."
					/>
					<div class="card-body">
						<p class="card-text">
							Some quick example text to build on the card
						</p>
					</div>
				</div>
			</div>
			<div class="d-flex border border-danger flex-column">
				<div class="d-flex">
					<div class="flex-column border-bottom border-danger md-2">
						<div class="p-2 d-flex border-bottom border-light">
							<p class="p-2">
								The world's drastic measures in response to
								coronavirus
							</p>
							<img
								style="width: 5rem;"
								src="./../assets/images/200401135051-hong-kong-farm-large-tease.jpeg"
								alt="Card image cap"
							/>
						</div>
						<div class="p-2 d-flex border-bottom border-light">
							<p class="p-2">
								The world's drastic measures in response to
								coronavirus
							</p>
							<img
								style="width: 5rem;"
								src="./../assets/images/200401135051-hong-kong-farm-large-tease.jpeg"
								alt="Card image cap"
							/>
						</div>
						<div class="p-2 d-flex border-bottom border-light">
							<p class="p-2">
								The world's drastic measures in response to
								coronavirus
							</p>
							<img
								style="width: 5rem;"
								src="./../assets/images/200401135051-hong-kong-farm-large-tease.jpeg"
								alt="Card image cap"
							/>
						</div>
						<div class="p-2 d-flex border-bottom border-light">
							<p class="p-2">
								The world's drastic measures in response to
								coronavirus
							</p>
							<img
								style="width: 5rem;"
								src="./../assets/images/200401135051-hong-kong-farm-large-tease.jpeg"
								alt="Card image cap"
							/>
						</div>
					</div>
					<div class="flex-column p-2 " style="width: 35rem;">
						<img
							class="card-img-top"
							src="./../assets/images/200401135051-hong-kong-farm-large-tease.jpeg"
							alt="Card image cap"
						/>
						<p class="card-text p-2">
							The world's drastic measures in response to
							coronavirus The world's drastic
						</p>
					</div>
				</div>
				<div class="d-flex flex-row m-auto">
					<img
						style="width: 14rem;"
						class="p-2"
						src="./../assets/images/200401135051-hong-kong-farm-large-tease.jpeg"
						alt="Card image cap"
					/>
					<img
						style="width: 14rem;"
						class="p-2"
						src="./../assets/images/200401135051-hong-kong-farm-large-tease.jpeg"
						alt="Card image cap"
					/>
					<img
						style="width: 14rem;"
						class="p-2"
						src="./../assets/images/200401135051-hong-kong-farm-large-tease.jpeg"
						alt="Card image cap"
					/>
					<img
						style="width: 14rem;"
						class="p-2"
						src="./../assets/images/200401135051-hong-kong-farm-large-tease.jpeg"
						alt="Card image cap"
					/>
				</div>
			</div>
		</div>
	</body>
</html>
