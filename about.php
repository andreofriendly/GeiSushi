<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">


	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
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
								<h2 class="h2-xl">About Gei Sushi</h2>

							</div>
						</div>	
					</div>	  <!-- End row -->
				</div>	   <!-- End container --> 
			</div>	<!-- END PAGE HERO -->	




			<!-- ABOUT-3
			============================================= -->
			<section id="about-3" class="wide-60 about-section division">
				<div class="container">
					<div class="row d-flex align-items-center">


						<!-- ABOUT IMAGE -->
						<div class="col-md-5 col-lg-6 ">
							<div class="about-3-img text-center mb-40">
								<img class="img-fluid" src="images/about-03-img.png" alt="about-image">
							</div>
						</div>


						<!-- ABOUT TEXT -->
						<div class="col-md-7 col-lg-6">
							<div class="about-3-txt mb-40">

								<!-- Title -->	
								<h2 class="h2-sm">About Gei Sushi: Culinary Journey</h2>

								<!-- Text -->
								<p class="p-md">Welcome to Gei Sushi, where passion for Japanese cuisine and culinary artistry unite to create an extraordinary dining experience.
								</p>

								<!-- List -->	
								<ul class="txt-list">

									<li class="list-item">
										<p class="p-md"> Crafted with Care: At Gei Sushi, we believe that sushi is more than just food; it's an art form. Our dedicated chefs meticulously select the finest ingredients, from pristine seafood to fresh, locally-sourced vegetables.
										</p>
									</li>

									<li class="list-item">
										<p class="p-md">Tradition Meets Innovation: We honor the traditions of Japanese cuisine while also embracing creativity. Our menu features a blend of classic sushi rolls and innovative, contemporary creations that push the boundaries of flavor and presentation.</p>
									</li>

									<li class="list-item">
										<p class="p-md"> A Global Palate: Gei Sushi is a place where flavors from Japan meet global influences. Our menu reflects a diverse range of tastes and inspirations, ensuring that there's something to please every discerning palate.
										</p>
									</li>

								</ul>

							</div>
						</div>	<!-- END ABOUT TEXT -->	


					</div>	   <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END ABOUT-3 -->


			<!-- ABOUT-4
			============================================= -->
			<section id="about-4" class="wide-60 about-section division">
				<div class="container">
					<div class="row">


						<!-- ABOUT TEXT -->
						<div class="col-md-7 col-lg-6">
							<div class="about-4-txt mb-40">

								<!-- Title -->	
								<h2 class="h2-sm">Discover the new taste of the sushi</h2>

								<!-- Text -->
								<p class="p-md grey-color">Prepare to embark on a delectable journey and discover the new taste of sushi at its finest. Our innovative culinary team at Gei Sushi has redefined the art of sushi, introducing a symphony of flavors that will tantalize your taste buds like never before.
								</p>

								<!-- Image -->
								<img class="img-fluid" src="images/img-10.jpg" alt="about-image">

							</div>
						</div>	<!-- END ABOUT TEXT -->	


						<!-- ABOUT IMAGE -->
						<div class="col-md-5 col-lg-6">
							<div class="about-4-img mb-40">

								<!-- Image -->
								<img class="img-fluid" src="images/img-15.jpg" alt="about-image">

								<!-- Text -->
								<p class="p-md grey-color">Prepare to be amazed as you embark on a journey to discover the new taste of sushi at Gei Sushi. It's a dining experience that will challenge your expectations and leave you craving more. Come and indulge in a world of flavors you never knew existed in sushi. It's time to savor the extraordinary!"
								</p>

							</div>
						</div>


					</div>	   <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END ABOUT-4 -->


			<!-- NEWSLETTER-1
			============================================= -->
			<section id="newsletter-1" class="mb-20 newsletter-section division">
				<div class="container">
					<div class="inner-bg bg-lightgrey">
						<div class="row">


							<!-- NEWSLETTER FORM -->
							<div class="col-md-10 col-xl-8 offset-md-1 offset-xl-2">
								<div class="newsletter-txt text-center">

									<!-- Title -->
									<h3 class="h3-sm">Subscribe To Newsletter</h3>

									<!-- Text -->
									<p class="p-md grey-color">Subscribe to the weekly newsletter for all the latest updates</p>

									<!-- Form -->
									<form class="newsletter-form">
												
										<div class="input-group">
											<input type="email" class="form-control" placeholder="Your email address" required id="s-email">								
											<span class="input-group-btn">
												<button type="submit" class="btn btn-red tra-red-hover">Sign Up</button>
											</span>										
										</div>

										<!-- Newsletter Form Notification -->	
										<label for="s-email" class="form-notification"></label>
													
									</form>	

								</div>
							</div>	  <!-- END NEWSLETTER FORM -->


						</div>	 <!-- End row -->
					</div>    <!-- End Inner Bg -->	   
				</div>	   <!-- End container -->
			</section>	<!-- END NEWSLETTER-1 -->




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

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
		<!-- [if lt IE 9]>
			<script src="js/html5shiv.js" type="text/javascript"></script>
			<script src="js/respond.min.js" type="text/javascript"></script>
		<![endif] -->
									
		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->															
		<!--
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-XXXXX-X']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
		-->



	</body>



</html>	