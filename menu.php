<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">


	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="author" content="Jthemes"/>	
		<meta name="description" content="Gei Sushi"/>
		<meta name="keywords" content="Jthemes, Food, Fast Food, Restaurant, Pizzeria, Restaurant Menu, Pizza, Burger, Sushi, Steak, Grill, Snack">	
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				
  		<!-- SITE TITLE -->
		<title>Gei Sushi</title>
							
		<!-- FAVICON AND TOUCH ICONS -->
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="152x152" href="images/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="120x120" href="images/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="images/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
		<link rel="icon" href="images/apple-touch-icon.png" type="image/x-icon">

		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">

		<!-- BOOTSTRAP CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
				
		<!-- FONT ICONS -->
		<link href="https://use.fontawesome.com/releases/v5.11.0/css/all.css" rel="stylesheet" crossorigin="anonymous">		
		<link href="css/flaticon.css" rel="stylesheet">

		<!-- PLUGINS STYLESHEET -->
		<link href="css/menu.css" rel="stylesheet">
		<link href="css/magnific-popup.css" rel="stylesheet">	
		<link href="css/flexslider.css" rel="stylesheet">
		<link href="css/owl.carousel.min.css" rel="stylesheet">
		<link href="css/owl.theme.default.min.css" rel="stylesheet">
		<link href="css/jquery.datetimepicker.min.css" rel="stylesheet">
	
		<!-- TEMPLATE CSS -->
		<link href="css/style.css" rel="stylesheet">

		<!-- RESPONSIVE CSS -->
		<link href="css/responsive.css" rel="stylesheet">
	
	</head>




	<body>




		<!-- PRELOADER SPINNER
		============================================= -->
		<div id="loader-wrapper">
			<div id="loader">
				<div class="cssload-spinner">
					<div class="cssload-ball cssload-ball-1"></div>
					<div class="cssload-ball cssload-ball-2"></div>
					<div class="cssload-ball cssload-ball-3"></div>
					<div class="cssload-ball cssload-ball-4"></div>
				</div>
			</div>
		</div>




		<!-- HEADER-3
		============================================= -->
		<header id="header-3" class="header navik-header header-transparent header-shadow">
			<div class="container">


				<!-- NAVIGATION MENU -->
				<div class="navik-header-container">


					<!-- CALL BUTTON -->
				    <div class="callusbtn"><a href="tel:123456789"><i class="fas fa-phone"></i></a></div>

					
					<!-- LOGO IMAGE -->
	                <div class="logo" data-mobile-logo="images/logo2.png" data-sticky-logo="images/logo2.png">
	                	<a href="/"><img src="images/logo.png" alt="header-logo"/></a>
					</div>

					
					<!-- BURGER MENU -->
					<div class="burger-menu">
						<div class="line-menu line-half first-line"></div>
						<div class="line-menu"></div>
						<div class="line-menu line-half last-line"></div>
					</div>


					<!-- MAIN MENU -->
                    <nav class="navik-menu menu-caret navik-yellow">
	                	<ul class="top-list">
							<li><a href="about.php">About Gei</a></li>

                            <li><a href="menu.php">Our Menu</a></li>

                            <li><a href="booking.php">Book A Table</a></li>

                            <li><a href="locations.php">Our Locations</a></li>
							
                            <li><a href="contacts.php">Contact Us</a></li>

                            <?php
							include('function.php'); // Include the database connection with $koneksi

							if (isset($_SESSION['role'])) {
								if ($_SESSION['role'] == 'admin') {
									echo '<li><a href="dashboard.php">Dashboard</a></li>';
								} elseif ($_SESSION['role'] == 'customer') {
									$user_id = $_SESSION['user_id'];
									
									// Query to get the cart quantity for the user
									$query = "SELECT COUNT(*) AS cart_quantity FROM cart WHERE user_id = $user_id";
									$result = mysqli_query($koneksi, $query);

									if ($result) {
										$row = mysqli_fetch_assoc($result);
										$cart_quantity = $row['cart_quantity'];
									} else {
										// Handle the query error, if any
										$cart_quantity = 0; // Set a default value
									}

									echo '<li><a href="myaccount.php">My Account</a></li>';
									echo '<!-- BASKET ICON -->
									<li class="basket-ico ico-30">
										<a href="cart.php">
											<span class="ico-holder"><span class="flaticon-shopping-bag"></span> <em class="roundpoint">' . $cart_quantity . '</em></span>
										</a>
									</li>';
								}
							} else {
								echo '<li><a href="login.php">Login</a></li>';
								echo '<!-- BASKET ICON -->
								<li class="basket-ico ico-30">
									<a href="cart.php">
										<span class="ico-holder"><span class="flaticon-shopping-bag"></span> <em class="roundpoint"></em></span>
									</a>
								</li>';
							}
							?>

	                    </ul>
	                </nav>	<!-- END MAIN MENU -->


				</div>	<!-- END NAVIGATION MENU -->


			</div>     <!-- End container -->
		</header>	<!-- END HEADER-3 -->




		<!-- PAGE CONTENT
		============================================= -->	
		<div id="page" class="page">




			<!-- PAGE HERO
			============================================= -->	
			<div class="page-hero-section division bg-02">
				<div class="container">	
					<div class="row">	
						<div class="col-lg-10 offset-lg-1">
							<div class="hero-txt text-center white-color">

								<!-- Title -->
								<h2 class="h2-xl">Our Menu</h2>

							</div>
						</div>	
					</div>	  <!-- End row -->
				</div>	   <!-- End container --> 
			</div>	<!-- END PAGE HERO -->	




			<!-- MENU-8
			============================================= -->
			<section id="menu-8" class="wide-70 menu-section division">
				<div class="container">


					<!-- TABS NAVIGATION -->
					<div id="tabs-nav">
					 	<div class="row">
							<div class="col-lg-12 text-center">
						 		<ul class="tabs-1 ico-55 red-tabs clearfix">

						 			<!-- TAB-1 LINK -->
									<li class="tab-link current" data-tab="tab-1">
										<span class="flaticon-sushi"></span> 
										<h5 class="h5-sm">Sushi</h5>
									</li>

									<!-- TAB-3 LINK -->
									<li class="tab-link" data-tab="tab-3">
										<span class="flaticon-salad-1"></span> 
										<h5 class="h5-sm">Salads</h5>
									</li>

									<!-- TAB-3 LINK -->
									<li class="tab-link" data-tab="tab-4">
										<span class="flaticon-doughnut"></span> 
										<h5 class="h5-sm">Desserts</h5>
									</li>

								</ul>
							</div>
						</div>	
				 	</div> <!-- END TABS NAVIGATION -->


				 	<!-- TABS CONTENT -->
				 	<div id="tabs-content">

					<!-- TAB-1 CONTENT -->
					<div id="tab-1" class="tab-content current">
						<div class="row">
							<?php
							include('function.php');

							// Modify your SQL query to select products with the category "sushi"
							$sql = "SELECT * FROM products WHERE category = 'sushi'";
							$result = mysqli_query($koneksi, $sql);

							while ($row = mysqli_fetch_assoc($result)) {
								$productName = $row['name'];
								$productDescription = $row['description'];
								$productPrice = $row['price'];
								$productImage = $row['image'];
								$productId = $row['id'];
							?>
							<!-- MENU ITEM -->
							<div class="col-sm-6 col-lg-3">
								<div class="menu-7-item">
									<!-- IMAGE -->
									<div class="menu-7-img rel">
										<!-- Image -->
										<img class="img-fluid" src="<?php echo $productImage; ?>" alt="menu-image" />
										<!-- Price -->
										<div class="menu-7-price bg-coffee">
											<h5 class="h5-xs yellow-color">IDR <?php echo number_format($productPrice, 2); ?></h5>
										</div>
										<!-- Like Icon (if needed) -->
									</div>
									<!-- TEXT -->
									<div class="menu-7-txt rel">
										<!-- Title -->
										<h5 class="h5-sm"><?php echo $productName; ?></h5>
										<!-- Description -->
										<p class="grey-color"><?php echo $productDescription; ?></p>
										<!-- Button -->
										<form action="add_to_cart.php" method="post">
											<a class="btn btn-sm btn-tra-grey yellow-hover">
												<input type="hidden" name="id" value="<?= $productId?>">
												<input type="hidden" name="name" value="<?= $productName?>">
												<input type="hidden" name="desc" value="<?= $productDescription?>">
												<input type="hidden" name="price" value="<?= $productPrice?>">
												<input type="hidden" name="img" value="<?= $productImage?>">
												<button class="flaticon-shopping-bag border-0 bg-transparent">Add to Cart</button>
											</a>
										</form>
									</div>
								</div>
							</div> <!-- END MENU ITEM -->
							<?php
							}

							// Close the database connection (if not needed elsewhere)
							mysqli_close($koneksi);
							?>
						</div> <!-- End row -->
					</div> <!-- END TAB-1 CONTENT -->




					<!-- TAB-3 CONTENT -->
					<div id="tab-3" class="tab-content current">
						<div class="row">
							<?php
							include('function.php');

							// Modify your SQL query to select products with the category "sushi"
							$sql = "SELECT * FROM products WHERE category = 'salad'";
							$result = mysqli_query($koneksi, $sql);

							while ($row = mysqli_fetch_assoc($result)) {
								$productName = $row['name'];
								$productDescription = $row['description'];
								$productPrice = $row['price'];
								$productImage = $row['image'];
								$productId = $row['id'];
							?>
							<!-- MENU ITEM -->
							<div class="col-sm-6 col-lg-3">
								<div class="menu-7-item">
									<!-- IMAGE -->
									<div class="menu-7-img rel">
										<!-- Image -->
										<img class="img-fluid" src="<?php echo $productImage; ?>" alt="menu-image" />
										<!-- Price -->
										<div class="menu-7-price bg-coffee">
											<h5 class="h5-xs yellow-color">IDR <?php echo number_format($productPrice, 2); ?></h5>
										</div>
										<!-- Like Icon (if needed) -->
									</div>
									<!-- TEXT -->
									<div class="menu-7-txt rel">
										<!-- Title -->
										<h5 class="h5-sm"><?php echo $productName; ?></h5>
										<!-- Description -->
										<p class="grey-color"><?php echo $productDescription; ?></p>
										<!-- Button -->
										<form action="add_to_cart.php" method="post">
											<a class="btn btn-sm btn-tra-grey yellow-hover">
												<input type="hidden" name="id" value="<?= $productId?>">
												<input type="hidden" name="name" value="<?= $productName?>">
												<input type="hidden" name="desc" value="<?= $productDescription?>">
												<input type="hidden" name="price" value="<?= $productPrice?>">
												<input type="hidden" name="img" value="<?= $productImage?>">
												<button class="flaticon-shopping-bag border-0 bg-transparent">Add to Cart</button>
											</a>
										</form>
									</div>
								</div>
							</div> <!-- END MENU ITEM -->
							<?php
							}

							// Close the database connection (if not needed elsewhere)
							mysqli_close($koneksi);
							?>
						</div> <!-- End row -->
					</div> <!-- END TAB-1 CONTENT -->


					<!-- TAB-1 CONTENT -->
					<div id="tab-4" class="tab-content current">
						<div class="row">
							<?php
							include('function.php');

							// Modify your SQL query to select products with the category "sushi"
							$sql = "SELECT * FROM products WHERE category = 'desert'";
							$result = mysqli_query($koneksi, $sql);

							while ($row = mysqli_fetch_assoc($result)) {
								$productName = $row['name'];
								$productDescription = $row['description'];
								$productPrice = $row['price'];
								$productImage = $row['image'];
								$productId = $row['id'];
							?>
							<!-- MENU ITEM -->
							<div class="col-sm-6 col-lg-3">
								<div class="menu-7-item">
									<!-- IMAGE -->
									<div class="menu-7-img rel">
										<!-- Image -->
										<img class="img-fluid" src="<?php echo $productImage; ?>" alt="menu-image" />
										<!-- Price -->
										<div class="menu-7-price bg-coffee">
											<h5 class="h5-xs yellow-color">IDR <?php echo number_format($productPrice, 2); ?></h5>
										</div>
										<!-- Like Icon (if needed) -->
									</div>
									<!-- TEXT -->
									<div class="menu-7-txt rel">
										<!-- Title -->
										<h5 class="h5-sm"><?php echo $productName; ?></h5>
										<!-- Description -->
										<p class="grey-color"><?php echo $productDescription; ?></p>
										<!-- Button -->
										<form action="add_to_cart.php" method="post">
											<a class="btn btn-sm btn-tra-grey yellow-hover">
												<input type="hidden" name="id" value="<?= $productId?>">
												<input type="hidden" name="name" value="<?= $productName?>">
												<input type="hidden" name="desc" value="<?= $productDescription?>">
												<input type="hidden" name="price" value="<?= $productPrice?>">
												<input type="hidden" name="img" value="<?= $productImage?>">
												<button class="flaticon-shopping-bag border-0 bg-transparent">Add to Cart</button>
											</a>
										</form>
									</div>
								</div>
							</div> <!-- END MENU ITEM -->
							<?php
							}

							// Close the database connection (if not needed elsewhere)
							mysqli_close($koneksi);
							?>
						</div> <!-- End row -->
					</div> <!-- END TAB-1 CONTENT -->


				 	</div>	<!-- END TABS CONTENT -->


				</div>	   <!-- End container -->
			</section>	<!-- END MENU-8 -->




			<!-- BANNER-4
			============================================= -->
			<section id="banner-4" class="bg-fixed wide-100 banner-section division">
				<div class="container">
			 		<div class="row">


			 			<!-- BANNER TEXT -->
						<div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
							<div class="banner-4-txt text-center">

								<!-- Title  -->
								<h4 class="h4-xl">We Guarantee</h4>
								
								<!-- Title  -->
							    <h2>30 Minutes Delivery!</h2>

							    <!-- Text -->	
								<p class="p-lg"> we're committed to bringing your favorite dishes to your doorstep within just half an hour of placing your order. Our goal is to ensure that you receive your meal hot, fresh, and right on time, no matter where you are.
								</p>

								<!-- Call Button -->
								<a href="tel:123456789" class="btn btn-lg btn-red tra-red-hover">Call: 08211223344</a>

							</div>
						</div>


			 		</div>      <!-- End row -->
				</div>	    <!-- End container -->		
			</section>	<!-- END BANNER-4 -->




            <!-- FOOTER-1 ============================================= -->
            <footer id="footer-1" class="footer division">
                <div class="container">
                    <div class="row">

                        <!-- FOOTER INFO -->
                        <div class="col-md-5 col-lg-4 col-xl-4">
                            <div class="footer-info mb-40">
                                <!-- Footer Logo -->
                                <div class="footer-logo"><img src="images/logo2.png" alt="footer-logo"/></div>
                                <!-- Footer Copyright -->
                                <p>&copy; 2023 Gei Sushi. All Rights Reserved</p>
                            </div>	
                        </div>

                        <!-- FOOTER CONTACTS -->
                        <div class="col-md-7 col-lg-4 col-xl-5">
                            <div class="footer-contacts mb-40">
                                <!-- Address -->
                                <p class="p-xl mt-10">Indonesia,</p>
                                <p class="p-xl">2211 Mall Plaza Indonesia, ID 90036</p> 
                                <!-- Contacts -->
                                <p class="p-lg foo-email">Email: <a href="mailto:yourdomain@mail.com">hello@geiplaza.com</a></p>
                                <p class="p-lg">Call Now: <span class="salmon-color"><a href="tel:123456789">08211223344</a></span></p>
                            </div>
                        </div>

                        <!-- FOOTER LINKS -->
                        <div class="col-md-12 col-lg-4 col-xl-3">
                            <div class="footer-links mb-40">
                                <ul class="text-left">
                                <li><a href="about.php" style="font-weight: bold;">About Gei</a></li>
                                    <li><a href="menu.php" style="font-weight: bold;">Our Menu</a></li>
                                    <li><a href="booking.php" style="font-weight: bold;">Book A Table</a></li>
                                    <li><a href="locations.php" style="font-weight: bold;">Our Locations</a></li>
                                    <li><a href="contacts.php" style="font-weight: bold;">Contact Us</a></li>
									<?php
									include('function.php'); // Include the database connection with $koneksi

									if (isset($_SESSION['role'])) {
										if ($_SESSION['role'] == 'admin') {
											echo '<li><a href="dashboard.php" style="font-weight: bold;">Dashboard</a></li>';
										} elseif ($_SESSION['role'] == 'customer') {
											$user_id = $_SESSION['user_id'];
											echo '<li><a href="myaccount.php" style="font-weight: bold;">My Account</a></li>';
										}
									} else {
										echo '<li><a href="login.php" style="font-weight: bold;">Login</a></li>';
									}
									?>
                                </ul>
                            </div>
                        </div>	<!-- END FOOTER LINKS -->
                    </div>	  <!-- End row -->
                </div>	   <!-- End container -->										
            </footer>	<!-- END FOOTER-1 -->




		</div>	<!-- END PAGE CONTENT -->




		<!-- EXTERNAL SCRIPTS
		============================================= -->	
		<script src="js/jquery-3.5.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		<script src="js/modernizr.custom.js"></script>
		<script src="js/jquery.easing.js"></script>
		<script src="js/jquery.appear.js"></script>
		<script src="js/jquery.scrollto.js"></script>
		<script src="js/menu.js"></script>		
		<script src="js/materialize.js"></script>
		<script src="js/jquery.flexslider.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/contact-form.js"></script>
		<script src="js/comment-form.js"></script>	
		<script src="js/booking-form.js"></script>
		<script src="js/jquery.datetimepicker.full.js"></script>	
		<script src="js/jquery.validate.min.js"></script>
		<script src="js/jquery.ajaxchimp.min.js"></script>	
				
		<!-- Custom Script -->		
		<script src="js/custom.js"></script>



	</body>



</html>	