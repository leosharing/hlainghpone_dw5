<?php 
	require('./admin/dbconfig.php');

	$id = $_GET['id'];
	$sql = "SELECT * FROM products WHERE id=".$id;

	$result = mysqli_query($connection, $sql);

	$sidesql = "SELECT * FROM products WHERE id = ".rand(1, 4);
	$sidesql1 = "SELECT * FROM products WHERE id = ".rand(1, 4);
	$sidesql2 = "SELECT * FROM products WHERE id = ".rand(1, 4);

	$sideresult = mysqli_query($connection,$sidesql);
	$sideresult1 = mysqli_query($connection,$sidesql1);
	$sideresult2 = mysqli_query($connection,$sidesql2);


require("./header.php");
?>

    <div class="banner" id="featurebanner">
		<h1 class="fs-1">Featured</h1>
		<p>Home / Pages / Featured</p>
	</div>

	<div class="container-fluid mybg-dark">
            
		<div class="row d-flex justify-content-center">
			<div class="col-lg-8">
				<div class="container-fluid">
					<?php
						if($result->num_rows > 0){
					?>
						<?php
							while($row = mysqli_fetch_assoc($result)){
						?>
					<div class="row">
						<div class="card p-0">
							<div class="row w-100 m-0">
								<div class="col-xl-6 col-lg-12">
									<div class="images p-3">
										<div class="text-center p-4">
											<img id="main-image" src="admin/product/f_img/<?php echo $row['f_img'] ?>" alt="this is product_image">
										</div>
										<div class="thumbnail text-center d-flex justify-content-center">
											<img onclick="change_image(this)" class="w-25" src="admin/product/f_img/<?php echo $row['f_img'] ?>" alt="this is product_image">
											<img onclick="change_image(this)" class="w-25" src="admin/product/s_img/<?php echo $row['s_img'] ?>" alt="this is product_image">
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-12 product">
									<div class="p-4">
										<div class="d-flex justify-content-between align-items-center">
											<div class="d-flex align-items-center">
												
												<a href="./product.php" class="text-decoration-none text-dark"><i class="fa fa-long-arrow-left"></i> <span class="ms-2">Back</span> </a>
											</div> 
										</div>
										<div class="mt-4 mb-3">
											<h5 class="text-uppercase"><?php echo $row['name']; ?></h5>
											<div class="price d-flex flex-row align-items-center"> 		<span class="act-price"><?php echo "$ ".$row['price']; ?></span>
											</div>
										</div>
										<ul class="list-inline small">
											<li class="list-inline-item m-0">
												(4.05)
											</li>
											<li class="list-inline-item m-0">
												<i class="fa fa-star mypricolor"></i>
											</li>
											<li class="list-inline-item m-0">
												<i class="fa fa-star mypricolor"></i>
											</li>
											<li class="list-inline-item m-0">
												<i class="fa fa-star mypricolor"></i>
											</li>
											<li class="list-inline-item m-0">
												<i class="fa fa-star mypricolor"></i>
											</li>
											<li class="list-inline-item m-0">
												<i class="far fa-star mypricolor"></i>
											</li>
										</ul>
										<p class="about"><?php echo $row['description']; ?></p>
										
										<div class="cart mt-4 align-items-center">
											<a class="btn btn-danger text-uppercase me-3 px-4 " href="./payment.php">Buy Now</a> 
											<i class="fa fa-heart text-muted"></i>
											<i class="fa fa-share-alt text-muted"></i> 
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<div class="row text-white bg-danger rounded-3 mt-5 p-2">
						<div class="col-md-12">
							<h1 class="fs-1 text-center">Review</h1>
							<p><?php echo $row['review']; ?></p>
						</div>
					</div>
					<?php
							}
						?>
					<?php
						}
					?>
				</div>
			</div>

			<div class="col-lg-4 d-none d-lg-block">
				<?php
					if($sideresult->num_rows > 0){
				?>
					
				<div class="row mb-5">
					<?php
						while($siderow = mysqli_fetch_assoc($sideresult)){
					?>
					<div class="card p-0">
						<div class="row w-100 m-0">
							<div class="col-xl-6 col-lg-12 p-0">
								<div class="images">
									<div class="text-center">
										<img id="main-image w-100" src="admin/product/f_img/<?php echo $siderow['f_img']; ?>" alt="this is product_image">
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-lg-12 product">
								<div class=" p-2 h-100">
									<div class="mt-3 mb-1">
										<h5 class="text-uppercase"><?php echo $siderow['name']; ?></h5>
										<div class="price d-flex flex-row align-items-center"> <span class="act-price"><?php echo "$ ".$siderow['price']; ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
						}
					?>
				</div>
				<div class="row mb-5">
					<?php
						while($siderow1 = mysqli_fetch_assoc($sideresult1)){
					?>
					<div class="card p-0">
						<div class="row w-100 m-0">
							<div class="col-xl-6 col-lg-12 p-0">
								<div class="images">
									<div class="text-center">
										<img id="main-image w-100" src="admin/product/f_img/<?php echo $siderow1['f_img']; ?>" alt="this is product_image">
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-lg-12 product">
								<div class=" p-2 h-100">
									<div class="mt-3 mb-1">
										<h5 class="text-uppercase"><?php echo $siderow1['name']; ?></h5>
										<div class="price d-flex flex-row align-items-center"> <span class="act-price"><?php echo "$ ".$siderow1['price']; ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
						}
					?>
				</div>
				<div class="row mb-5">
					<?php
						while($siderow2 = mysqli_fetch_assoc($sideresult2)){
					?>
					<div class="card p-0">
						<div class="row w-100 m-0">
							<div class="col-xl-6 col-lg-12 p-0">
								<div class="images">
									<div class="text-center">
										<img id="main-image w-100" src="admin/product/f_img/<?php echo $siderow2['f_img']; ?>" alt="this is product_image">
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-lg-12 product">
								<div class=" p-2 h-100">
									<div class="mt-3 mb-1">
										<h5 class="text-uppercase"><?php echo "$ ".$siderow2['name']; ?></h5>
										<div class="price d-flex flex-row align-items-center"> <span class="act-price"><?php echo "$ ".$siderow2['price']; ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
						}
					?>
				</div>
					
					<?php
						}
					?>
			</div>
		</div>
	</div>

<script type="text/javascript">
		function change_image(image){
		var container = document.getElementById("main-image");
		container.src = image.src;
		}
		document.addEventListener("DOMContentLoaded", function(event) {
		});
</script>

<?php require_once("./footer.php"); ?>