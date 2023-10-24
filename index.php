<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="description" content="GeiSushi"/>
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




		<!-- HEADER-1
		============================================= -->
		<header id="header-1" class="header navik-header header-shadow center-menu-1 header-transparent">
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


					<!-- MAIifN MENU -->
	                <nav class="navik-menu menu-caret navik-salmon">
	                	<ul class="top-list">

	                		<!-- DROPDOWN MENU -->
	                		<li><a href="about.php">About Gei</a></li>

                            <li><a href="menu.php">Our Menu</a></li>

                            <li><a href="booking.php">Book A Table</a></li>


						</ul>
						<ul>

                            
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
		</header>	<!-- END HEADER-1 -->




		<!-- PAGE CONTENT
		============================================= -->	
		<div id="page" class="page">




			<!-- HERO-12
			============================================= -->	
			<section id="hero-12" class="bg-02 hero-section division">
				<div class="container">							
					<div class="row d-flex align-items-center">


						<!-- HERO TEXT -->
						<div class="col-lg-10 offset-lg-1">
							<div class="hero-12-txt white-color text-center">

								<!-- Title -->
								<h3>Natural & Fresh</h3>
								<h2 class="salmon-color">Gei Sushi</h2>

								<!-- Text -->
								<p class="p-xl lightgrey-color">Feugiat primis ligula risus auctor laoreet augue egestas mauris tortor 
								   and iaculis pretium undo viverra mauris ipsum magna posuere ligula
								</p>



							</div>  
						</div>	 <!-- END HERO TEXT -->


					</div>	  <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END HERO-12 -->




			<!-- ABOUT-3
			============================================= -->
			<section id="about-3" class="wide-60 about-section division">
				<div class="container">
					<div class="row d-flex align-items-center">


						<!-- ABOUT IMAGE -->
						<div class="col-md-5 col-lg-6">
							<div class="about-3-img text-center mb-40">
								<img class="img-fluid" src="images/about-03-img.png" alt="about-image">
							</div>
						</div>


						<!-- ABOUT TEXT -->
						<div class="col-md-7 col-lg-6">
							<div class="about-3-txt mb-40">

								<!-- Title -->	
								<h2 class="h2-sm">Gei Sushi: Elevate Your Taste Buds to New Heights</h2>

								<!-- Text -->
								<p class="p-md">Embark on a culinary journey like no other with Gei Sushi, where every bite is a symphony of flavor and artistry. We invite you to indulge in an exquisite sushi experience that transcends the ordinary, elevating your taste buds to new heights of delight.

								Gei Sushi, a name synonymous with innovation and excellence in the world of sushi, has been redefining the sushi landscape for years. Our commitment to freshness, quality, and tradition is unwavering, and our skilled chefs craft each piece of sushi with precision, passion, and an unwavering dedication to the art of Japanese cuisine.

								At Gei Sushi, we believe that the true essence of sushi lies in the harmonious blend of the finest ingredients, expert craftsmanship, and the pursuit of perfection. Our menu boasts an array of culinary delights, from classic sashimi and nigiri to innovative rolls that push the boundaries of creativity. Our commitment to sourcing the highest quality fish and ingredients means every bite is a celebration of flavor.
								</p>

							</div>
						</div>	<!-- END ABOUT TEXT -->	


					</div>	   <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END ABOUT-3 -->




			<!-- ABOUT-7
			============================================= -->
			<section id="about-7" class="bg-05 about-section division">
				<div class="container">
					<div class="abox-4-wrapper ico-80">
			 			<div class="row">


				 			<!-- ABOUT BOX #1 -->
							<div class="col-md-4 col-lg-4">
								<div class="abox-4 text-center mb-40 white-color">		
									
									<!-- Icon -->
									<div class="abox-4-ico"><span class="flaticon-sushi"></span></div>

									<!-- Title -->
									<h5 class="h5-lg">Original Recipes</h5>
										
									<!-- Text -->
									<p>At Gei Sushi, we're thrilled to present our exclusive original recipes, crafted by our talented chefs. These unique dishes embody our passion for culinary innovation and are sure to delight your taste buds. Join us to savor the extraordinary flavors that can only be found at Gei Sushi.
									</p>				
										
								</div>							
							</div>


							<!-- ABOUT BOX #2 -->
							<div class="col-md-4 col-lg-4">
								<div class="abox-4 text-center mb-40 white-color">			
									
									<!-- Icon -->
									<div class="abox-4-ico"><span class="flaticon-salad"></span></div>

									<!-- Title -->
									<h5 class="h5-lg">Qualty Foods</h5>

									<!-- Text -->
									<p>At Quality Foods, we're dedicated to delivering the finest in culinary excellence. Our commitment to quality is evident in every dish we create. Whether you're indulging in our signature creations or savoring our classic favorites, you can always expect a dining experience that exceeds your expectations. Join us and discover the art of quality cuisine.
									</p>

								</div>							
							</div>	
									
									
							<!-- ABOUT BOX #3 -->
							<div class="col-md-4 col-lg-4">
								<div class="abox-4 text-center mb-40 white-color">				
									
									<!-- Icon -->
									<div class="abox-4-ico"><span class="flaticon-moped"></span></div>
		
									<!-- Title -->
									<h5 class="h5-lg">Fastest Delivery</h5>

									<!-- Text -->
									<p>Experience lightning-fast delivery with us at Gei Sushi. We're dedicated to delivering your favorite dishes to your doorstep with unparalleled speed. Your satisfaction is our top priority, and we're committed to ensuring your meal reaches you swiftly, so you can enjoy your favorite flavors in no time. Order now for the quickest culinary connection you've ever experienced!
									</p>							
								
								</div>							
							</div>


			 			</div>	   <!-- End row -->
			 		</div>
				</div>	   <!-- End container -->
			</section>	<!-- END ABOUT-7 -->	




			<!-- MENU-3
			============================================= -->
			<section id="menu-3" class="wide-100 menu-section division">
				<div class="container">

			<!-- MENU-3 WRAPPER -->
			<div class="menu-3-wrapper item-data-salmon-hover">
				<!-- Title -->
				<div class="row">
					<div class="col-md-12">
						<div class="menu-3-title"><h3 class="h3-md">Sushi Rolls</h3></div>
					</div>
				</div>

				<div class="row">
					<?php
					include('function.php');

					// Fetch data from the database for the "SUSHI" category
					$sql = "SELECT name, price, quantity, description FROM products WHERE category = 'SUSHI'";
					$result = mysqli_query($koneksi, $sql);

					if (mysqli_num_rows($result) > 0) {
						$counter = 0; // Initialize the counter

						while ($row = mysqli_fetch_assoc($result)) {
							$itemName = $row['name'];
							$itemPrice = 'IDR ' . number_format($row['price'], 2);
							$itemQuantity = $row['quantity'];
							$itemDescription = $row['description'];
					?>
					<?php if ($counter % 2 == 0) { ?>
					<div class="col-lg-6">
						<div class="menu-3-txt">
							<ul class="menu-3-list">
					<?php } ?>

							<!-- MENU ITEM (Dynamic) -->
							<li class="menu-3-item" style="margin-bottom: 20px;">
								<a href="product-single.php">
									<!-- Title & Price -->
									<div class="menu-title-wrapper rel">
										<div class="menu-item-title"><h5 class="h5-sm"><?php echo $itemName; ?></h5></div>
										<div class="menu-item-dots"></div>
										<div class="menu-item-price"><h5 class="h5-sm"><?php echo $itemPrice; ?></h5></div>
										<div class="menu-3-item-data bg-grey"><h6 class="h6-xs"><?php echo $itemQuantity; ?> Pcs</h6></div>
									</div>
									<!-- Description (Fetched from the database) -->
									<div class="menu-item-desc">
										<p><?php echo $itemDescription; ?></p>
									</div>
								</a>
							</li>

					<?php if ($counter % 2 == 1 || $counter == mysqli_num_rows($result) - 1) { ?>
							</ul>
						</div>
					</div>
					<?php } ?>

					<?php
							$counter++;
						}
					} else {
						echo "No menu items found.";
					}
					mysqli_close($koneksi);
					?>
				</div> <!-- End row -->
			</div> <!-- END MENU-3 WRAPPER -->



					<!-- MENU-3 IMAGE -->
			 		<div class="menu-3-img mb-60">
						<div class="row">
							<div class="col-md-12">
								<img class="img-fluid" src="images/menu-3-2-img.jpg" alt="menu-image">
							</div>
						</div>
					</div>


			<!-- MENU-3
			============================================= -->
			<section id="menu-3" class="wide-100 menu-section division">
				<div class="container">

			<!-- MENU-3 WRAPPER -->
			<div class="menu-3-wrapper item-data-salmon-hover">
				<!-- Title -->
				<div class="row">
					<div class="col-md-12">
						<div class="menu-3-title"><h3 class="h3-md">DESSERTS</h3></div>
					</div>
				</div>

				<div class="row">
					<?php
					include('function.php');

					// Fetch data from the database for the "SUSHI" category
					$sql = "SELECT name, price, quantity, description FROM products WHERE category = 'desert'";
					$result = mysqli_query($koneksi, $sql);

					if (mysqli_num_rows($result) > 0) {
						$counter = 0; // Initialize the counter

						while ($row = mysqli_fetch_assoc($result)) {
							$itemName = $row['name'];
							$itemPrice = 'IDR ' . number_format($row['price'], 2);
							$itemQuantity = $row['quantity'];
							$itemDescription = $row['description'];
					?>
					<?php if ($counter % 2 == 0) { ?>
					<div class="col-lg-6">
						<div class="menu-3-txt">
							<ul class="menu-3-list">
					<?php } ?>

							<!-- MENU ITEM (Dynamic) -->
							<li class="menu-3-item" style="margin-bottom: 20px;">
								<a href="product-single.php">
									<!-- Title & Price -->
									<div class="menu-title-wrapper rel">
										<div class="menu-item-title"><h5 class="h5-sm"><?php echo $itemName; ?></h5></div>
										<div class="menu-item-dots"></div>
										<div class="menu-item-price"><h5 class="h5-sm"><?php echo $itemPrice; ?></h5></div>
										<div class="menu-3-item-data bg-grey"><h6 class="h6-xs"><?php echo $itemQuantity; ?> Pcs</h6></div>
									</div>
									<!-- Description (Fetched from the database) -->
									<div class="menu-item-desc">
										<p><?php echo $itemDescription; ?></p>
									</div>
								</a>
							</li>

					<?php if ($counter % 2 == 1 || $counter == mysqli_num_rows($result) - 1) { ?>
							</ul>
						</div>
					</div>
					<?php } ?>

					<?php
							$counter++;
						}
					} else {
						echo "No menu items found.";
					}
					mysqli_close($koneksi);
					?>
				</div> <!-- End row -->
			</div> <!-- END MENU-3 WRAPPER -->




				</div>	   <!-- End container -->
			</section>	<!-- END MENU-3 -->


			<!-- MENU-3
			============================================= -->
			<section id="menu-3" class="wide-100 menu-section division">
				<div class="container">

			<!-- MENU-3 WRAPPER -->
			<div class="menu-3-wrapper item-data-salmon-hover">
				<!-- Title -->
				<div class="row">
					<div class="col-md-12">
						<div class="menu-3-title"><h3 class="h3-md">SALADS</h3></div>
					</div>
				</div>

				<div class="row">
					<?php
					include('function.php');

					// Fetch data from the database for the "SUSHI" category
					$sql = "SELECT name, price, quantity, description FROM products WHERE category = 'salad'";
					$result = mysqli_query($koneksi, $sql);

					if (mysqli_num_rows($result) > 0) {
						$counter = 0; // Initialize the counter

						while ($row = mysqli_fetch_assoc($result)) {
							$itemName = $row['name'];
							$itemPrice = 'IDR ' . number_format($row['price'], 2);
							$itemQuantity = $row['quantity'];
							$itemDescription = $row['description'];
					?>
					<?php if ($counter % 2 == 0) { ?>
					<div class="col-lg-6">
						<div class="menu-3-txt">
							<ul class="menu-3-list">
					<?php } ?>

							<!-- MENU ITEM (Dynamic) -->
							<li class="menu-3-item" style="margin-bottom: 20px;">
								<a href="product-single.php">
									<!-- Title & Price -->
									<div class="menu-title-wrapper rel">
										<div class="menu-item-title"><h5 class="h5-sm"><?php echo $itemName; ?></h5></div>
										<div class="menu-item-dots"></div>
										<div class="menu-item-price"><h5 class="h5-sm"><?php echo $itemPrice; ?></h5></div>
										<div class="menu-3-item-data bg-grey"><h6 class="h6-xs"><?php echo $itemQuantity; ?> Pcs</h6></div>
									</div>
									<!-- Description (Fetched from the database) -->
									<div class="menu-item-desc">
										<p><?php echo $itemDescription; ?></p>
									</div>
								</a>
							</li>

					<?php if ($counter % 2 == 1 || $counter == mysqli_num_rows($result) - 1) { ?>
							</ul>
						</div>
					</div>
					<?php } ?>

					<?php
							$counter++;
						}
					} else {
						echo "No menu items found.";
					}
					mysqli_close($koneksi);
					?>
				</div> <!-- End row -->
			</div> <!-- END MENU-3 WRAPPER -->




			<!-- PROMO-13
			============================================= -->
			<section id="promo-13" class="bg-dark wide-60 promo-section division">
				<div class="container">


					<!-- SECTION TITLE -->	
					<div class="row">	
						<div class="col-lg-10 offset-lg-1">
							<div class="section-title mb-60 text-center">	

								<!-- Title 	-->	
								<h2 class="h2-xl white-color">Made Fresh Always</h2>	

								<!-- Text -->	
								<p class="p-xl lightgrey">At Gei Sushi, we pride ourselves on our unwavering commitment to quality and freshness. Our culinary philosophy can be summed up in three simple words: 'MADE FRESH ALWAYS.'
								</p>
									
							</div>	
						</div>
					</div>


					<div class="row d-flex align-items-center">


						<!-- PROMO BOX #1 -->
						<div class="col-md-4">
							<a href="menu.php">
								<div id="pb-13-1" class="pbox-13-item">
									<!-- Image -->
									<div class="pbox-13-img text-center mb-25">	
										<img class="img-fluid" src="images/saladBanner.jpg" alt="promo-image" />
									</div>
									<!-- Text -->
									<div class="pbox-13-txt">
										<h5 class="h5-lg white-color">Salads</h5>
										<p class="lightgrey-color">A salad is a refreshing dish made primarily of fresh vegetables, often accompanied by various ingredients like greens, fruits, nuts, or proteins.
										</p>
									</div>

								</div>
							</a>
						</div>	<!-- END PROMO BOX #2 -->


						<!-- PROMO BOX #2 -->
						<div class="col-md-4">
							<a href="menu.php">
								<div id="pb-13-2" class="pbox-13-item bg-lightdark">
									
									<!-- Image -->
									<div class="pbox-13-img text-center mb-25">	
										<img class="img-fluid" src="images/sushiBanner.jpg" alt="promo-image" />
									</div>

									<!-- Text -->
									<div class="pbox-13-txt">
										<h5 class="h5-lg white-color">Sushi & Rolls</h5>
										<p class="lightgrey-color">Sushi is a popular Japanese dish that typically consists of vinegared rice combined with various ingredients like fresh seafood, vegetables, and occasionally tropical fruits.
										</p>
									</div>

								</div>
							</a>
						</div>	<!-- END PROMO BOX #2 -->


						<!-- PROMO BOX #3 -->
						<div class="col-md-4">
							<a href="menu">
								<div id="pb-13-3" class="pbox-13-item">
									
									<!-- Image -->
									<div class="pbox-13-img text-center mb-25 rel">	
										<img class="img-fluid" src="images/desertBanner.jpg" alt="promo-image" />
									</div>

									<!-- Text -->
									<div class="pbox-13-txt">
										<h5 class="h5-lg white-color">Desserts</h5>
										<p class="lightgrey-color">A dessert is a sweet, indulgent course typically enjoyed after a meal. It comes in various forms, including cakes, pastries, ice cream, fruit, or puddings
										</p>
									</div>

								</div>
							</a>
						</div>	<!-- END PROMO BOX #3 -->


					</div>    <!-- End row -->		
				</div>	   <!-- End container -->	
			</section>	<!-- END PROMO-13 -->

			
			
			


			<!-- PROMO-4
			============================================= -->
			<div id="promo-4" class="wide-100 promo-section division">
				<div class="container">
					<div class="row d-flex align-items-center">


						<!-- PROMO IMAGE-1 -->
						<div class="col-md-4">
							<a href="menu.php">
								<div class="pbox-4">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="images/offer-5.jpg" alt="promo-image" />
									</div> 
								</div>
							</a>
						</div>


						<!-- PROMO IMAGE-2 -->
						<div class="col-md-4">
							<a href="menu">
								<div class="pbox-4">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="images/offer-6.jpg" alt="promo-image" />
									</div> 
								</div>
							</a>
						</div>


						<!-- PROMO IMAGE-3 -->
						<div class="col-md-4">
							<a href="menu">
								<div class="pbox-4 pbox-4-last">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="images/offer-7.jpg" alt="promo-image" />
									</div> 
								</div>
							</a>
						</div>


					</div> <!-- End row -->		
				</div>  <!-- End container -->	
			</div>	<!-- END PROMO-4 -->


			<!-- BANNER-3
			============================================= -->
			<section id="banner-3" class="bg-salmon banner-section division">
				<div class="container">
			 		<div class="row d-flex align-items-center">


			 			<!-- BANNER TEXT -->
						<div class="col-md-7 col-lg-6">
							<div class="banner-3-txt white-color">

								<!-- Title  -->
								<h4 class="h4-xl">Download mobile App and</h4>
								<h2>save up to 20%</h2>
								
							   <!-- Text -->	
								<p class="p-md">Discover the exquisite world of sushi at your fingertips with the Gei Sushi app. Download now and embark on a culinary journey like no other.
								</p>

								<!-- Store Badges -->
								<div class="stores-badge">

									<!-- AppStore -->
									<a href="#" class="store">
										<img class="appstore-original" src="images/appstore.png" alt="appstore-logo" />
									</a>
													
									<!-- Google Play -->
									<a href="#" class="store">
										<img class="googleplay-original" src="images/googleplay.png" alt="googleplay-logo" />
									</a>
												
								</div>

							</div>
						</div>


						<!-- BANNER IMAGE -->
						<div class="col-md-5 col-lg-6">
							<div class="banner-3-img">
								<img class="img-fluid" src="images/e-shop.png" alt="banner-image">
							</div>
						</div>


			 		</div>      <!-- End row -->
				</div>	    <!-- End container -->		
			</section>	<!-- END BANNER-3 -->


			<!-- GOOGLE MAP
			============================================= -->
	 		<div id="gmap">
				<div class="google-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5298936384575!2d106.81937187578059!3d-6.19359236068055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f42108e6d503%3A0x7d7fe17ad64a053f!2sPlaza%20Indonesia!5e0!3m2!1sen!2sid!4v1698157617101!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>	 			</div>
	 		</div>	<!-- END GOOGLE MAP -->




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