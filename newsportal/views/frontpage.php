<!DOCTYPE html>
<html lang="en">
<?php require "./partials/head.php"; ?>

<body>
	<?php require "./../services/connection.php"; ?>
	<?php require "./partials/navbar.php"; ?>
	<div class="d-flex flex-row p-2">
		<div class="flex-column d-flex" style="width: 25rem;">
			<div class="border border-danger p-2 flex-column" style="width: 18rem;">
				<h6 class="card-title text-center p-2">Most Commented</h6>
				<img src="./../assets/images/200401135051-hong-kong-farm-large-tease.jpeg" class="card-img-top" alt="..." />
				<div class="card-body">
					<p class="card-text">
						Some quick example text to build on the card
					</p>
				</div>
			</div>
			<div class="border border-danger mt-2 flex-column" style="width: 18rem;">
				<h6 class="card-title text-center p-2">Most Viewed</h6>
				<img src="./../assets/images/http___cdn.cnn.com_cnnnext_dam_assets_200413151653-01-france-ejection-investigation" class="card-img-top" alt="..." />
				<div class="card-body">
					<p class="card-text">
						Some quick example text to build on the card
					</p>
				</div>
			</div>
		</div>
		<?php
		$query = "SELECT * FROM news ORDER BY dateposted DESC LIMIT 9 ";
		$result = mysqli_query($connection, $query);
		$row = mysqli_fetch_array($result);
		?>
		<div class="d-flex border border-danger flex-column">
			<div class="d-flex">
				<div class="flex-column border-bottom border-danger md-2">
					<div class="p-2 d-flex border-bottom border-light">
						<p class="p-2" style="width: 15rem; height: 5rem;">
							<?php echo $row['title']; ?>
							<a href='./detailspage.php?id=<?php echo $row[0]; ?>'>...</a>
						</p>
						<img class="ml-auto" style="width: 5rem; height: 5rem;" src="./../assets/images/<?php echo $row[4]; ?>" alt="Card image cap" />
					</div>
					<?php
					$row = mysqli_fetch_array($result);
					?>
					<div class="p-2 d-flex border-bottom border-light">
						<p class="p-2" style="width: 15rem; height: 5rem;">
							<?php echo $row['title']; ?>
							<a href='./detailspage.php?id=<?php echo $row[0]; ?>'>...</a>
						</p>
						<img class="ml-auto" style="width: 5rem; height: 5rem;" src="./../assets/images/<?php echo $row[4]; ?>" alt="Card image cap" />
					</div>
					<?php
					$row = mysqli_fetch_array($result);

					?>
					<div class="p-2 d-flex border-bottom border-light">
						<p class="p-2" style="width: 15rem; height: 5rem;">
							<?php echo $row['title']; ?>
							<a href='./detailspage.php?id=<?php echo $row[0]; ?>'>...</a>
						</p>
						<img class="ml-auto" style="width: 5rem; height: 5rem;" src="./../assets/images/<?php echo $row[4]; ?>" alt="Card image cap" />
					</div>
					<?php
					$row = mysqli_fetch_array($result);
					?>
					<div class="p-2 d-flex border-bottom border-light">
						<p class="p-2" style="width: 15rem;">
							<?php echo $row['title']; ?>
							<a href='./detailspage.php?id=<?php echo $row[0]; ?>'>...</a>
						</p>
						<img class="ml-auto" style="width: 5rem;" src="./../assets/images/<?php echo $row[4]; ?>" alt="Card image cap" />
					</div>
				</div>
				<?php
				$row = mysqli_fetch_array($result);
				?>
				<div class="flex-column p-2 " style="width: 35rem;">
					<img class="card-img-top" src="./../assets/images/<?php echo $row[4]; ?>" alt="Card image cap" />
					<p class="card-text p-2">
						<?php echo $row['title']; ?>
						<a href='./detailspage.php?id=<?php echo $row[0]; ?>'>...</a>
					</p>
				</div>

			</div>
			<div class="d-flex flex-row m-auto">
				<?php
				$row = mysqli_fetch_array($result);
				?>

				<img style="width: 14rem;" class="p-2" src="./../assets/images/<?php echo $row[4]; ?>" alt="Card image cap" />

				<?php
				$row = mysqli_fetch_array($result);
				?>

				<img style="width: 14rem;" class="p-2" src="./../assets/images/<?php echo $row[4]; ?>" alt="Card image cap" />
				<?php
				$row = mysqli_fetch_array($result);
				?>

				<img style="width: 14rem;" class="p-2" src="./../assets/images/<?php echo $row[4]; ?>" alt="Card image cap" />
				<?php
				$row = mysqli_fetch_array($result);
				?>

				<img style="width: 14rem;" class="p-2" src="./../assets/images/<?php echo $row[4]; ?>" alt="Card image cap" />
			</div>
		</div>
	</div>
</body>

</html>