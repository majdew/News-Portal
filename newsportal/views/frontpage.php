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
		$new1 = mysqli_fetch_array($result);
		$new2 = mysqli_fetch_array($result);
		$new3 = mysqli_fetch_array($result);
		$new4 = mysqli_fetch_array($result);
		$new5 = mysqli_fetch_array($result);
		$new6 = mysqli_fetch_array($result);
		$new7 = mysqli_fetch_array($result);
		$new8 = mysqli_fetch_array($result);
		$new9 = mysqli_fetch_array($result);
		?>
		<div class="d-flex border border-danger flex-column">
			<div class="d-flex">
				<div class="flex-column border-bottom border-danger md-2">
					<div class="p-2 d-flex border-bottom border-light">
						<p class="p-2" style="width: 15rem; height: 5rem;">
							<?php echo $new2['title']; ?>
							<a href='./detailspage.php?id=<?php echo $new2[0]; ?>'>...</a>
						</p>
						<img class="ml-auto" style="width: 5rem; height: 5rem;" src="./../assets/images/<?php echo $new2[4]; ?>" alt="" />
					</div>
					<div class="p-2 d-flex border-bottom border-light">
						<p class="p-2" style="width: 15rem; height: 5rem;">
							<?php echo $new3['title']; ?>
							<a href='./detailspage.php?id=<?php echo $new3[0]; ?>'>...</a>
						</p>
						<img class="ml-auto" style="width: 5rem; height: 5rem;" src="./../assets/images/<?php echo $new3[4]; ?>" alt="" />
					</div>
					<div class="p-2 d-flex border-bottom border-light">
						<p class="p-2" style="width: 15rem; height: 5rem;">
							<?php echo $new4['title']; ?>
							<a href='./detailspage.php?id=<?php echo $new4[0]; ?>'>...</a>
						</p>
						<img class="ml-auto" style="width: 5rem; height: 5rem;" src="./../assets/images/<?php echo $new4[4]; ?>" alt="" />
					</div>
					<div class="p-2 d-flex border-bottom border-light">
						<p class="p-2" style="width: 15rem;">
							<?php echo $new5['title']; ?>
							<a href='./detailspage.php?id=<?php echo $new5[0]; ?>'>...</a>
						</p>
						<img class="ml-auto" style="width: 5rem;" src="./../assets/images/<?php echo $new5[4]; ?>" alt="" />
					</div>
				</div>
				<div class="flex-column p-2 " style="width: 35rem;">
					<img class="card-img-top" src="./../assets/images/<?php echo $new1[4]; ?>" alt="" />
					<p class="card-text p-2">
						<?php echo $new1['title']; ?>
						<a href='./detailspage.php?id=<?php echo $new1[0]; ?>'>...</a>
					</p>
				</div>

			</div>
			<div class="d-flex flex-row m-auto">
				<img style="width: 14rem;" class="p-2" src="./../assets/images/<?php echo $new6[4]; ?>" alt="" />
				<img style="width: 14rem;" class="p-2" src="./../assets/images/<?php echo $new7[4]; ?>" alt="" />
				<img style="width: 14rem;" class="p-2" src="./../assets/images/<?php echo $new8[4]; ?>" alt="" />
				<img style="width: 14rem;" class="p-2" src="./../assets/images/<?php echo $new9[4]; ?>" alt="" />
			</div>
		</div>
	</div>
</body>

</html>