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
								<h2 class="h2-xl">Contact Us</h2>

							</div>
						</div>	
					</div>	  <!-- End row -->
				</div>	   <!-- End container --> 
			</div>	<!-- END PAGE HERO -->	




			<!-- CONTACTS-5
			============================================= -->
			<section id="contacts-5" class="wide-80 contacts-section division">	
				<div class="container">


					<!-- CONTACT INFO
					============================================= -->
					<div class="row">
						<div class="col-xl-10 offset-xl-1">
							<div class="row">	


								<!-- LOCATION -->
								<div class="col-md-4">
									<div class="cbox-5">
									
										<!-- Title -->
										<h5 class="h5-lg">Location</h5>

										<!-- Address -->
										<p class="p-md">Jl. Letjen S. Parman.</p>
										<p class="p-md">Duren Utara Daerah Khusus Ibukota Jakarta 11470</p>  
										<p class="p-md">Indonesia</p>

									</div>
								</div>


								<!-- QUICK CONTACTS -->
								<div class="col-md-4">
									<div class="cbox-5">
									
										<!-- Title -->
										<h5 class="h5-lg">Working Hours</h5>

										<!-- Text -->
										<p class="p-md">Mon-Fri: 9:00AM - 10:00PM</p>
										<p class="p-md">Saturday: 10:00AM - 8:30PM</p>
										<p class="p-md">Sunday: 12:00PM - 5:00PM</p>

									</div>
								</div>


								<!-- WORKING HOURS -->
								<div class="col-md-4">
									<div class="cbox-5">
									
										<!-- Title -->	
										<h5 class="h5-lg">Working Hours</h5>

										<!-- Title -->	
										<p class="p-md">P: +62 3456 7890</p>
										<p class="p-md">F: +62 8765 4321</p>
										<p class="p-md">E: <a href="mailto:yourdomain@mail.com" class="yellow-color">hi@geisushi.pesocreative.com</a></p>

									</div>
								</div>


							</div>
			 			</div>
				 	</div>	<!-- END CONTACT INFO -->



					<!-- GOOGLE MAP
					============================================= -->
					<div class="row">
				 		<div class="col-md-12">
					 		<div id="gmap">
								<div class="google-map">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5298936384575!2d106.81937187578059!3d-6.19359236068055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f42108e6d503%3A0x7d7fe17ad64a053f!2sPlaza%20Indonesia!5e0!3m2!1sen!2sid!4v1698157617101!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						 		</div>
						 	</div>
					 	</div>
					 </div>	<!-- END GOOGLE MAP -->


					<!-- SECTION TITLE -->	
					<div class="row">	
						<div class="col-lg-10 offset-lg-1">
							<div class="section-title mb-40 text-center">	

								<!-- Title 	-->	
								<h2 class="h2-xl">Get in Touch</h2>	

								<!-- Text -->	
								<p class="p-xl">Getting in touch with us is easy and hassle-free! Whether you have questions, feedback, or need assistance, we're here to help.
								</p>
									
							</div>	
						</div>
					</div>


					<!-- CONTACT FORM -->	
				 	<div class="row">
				 		<div class="col-lg-10 offset-lg-1">
				 			<div class="form-holder">
								<form name="contactform" class="row contact-form">
																						
									<!-- Form Input -->
					                <div class="col-md-12 col-lg-6">
					                	<input type="text" name="name" class="form-control name" placeholder="Your Name*"> 
					                </div>
					                  
					                <!-- Form Input -->        
					               <div class="col-md-12 col-lg-6">
					                	<input type="email" name="email" class="form-control email" placeholder="Email Address*"> 
					                </div>

					                <!-- Form Input -->   
									<div class="col-md-12">
										<input type="text" name="subject" class="form-control subject" placeholder="What's this about?"> 
									</div>
	
									<!-- Form Textarea -->	        
					                <div class="col-md-12">
					                	<textarea name="message" class="form-control message" rows="6" placeholder="Your Message ..."></textarea>
					                </div> 
					                                            
					                <!-- Form Button -->
					                <div class="col-md-12 mt-5 text-right">  
					                	<button type="submit" class="btn btn-md btn-red tra-red-hover submit">Send Message</button> 
					                </div>
					                                                              
					                <!-- Form Message -->
					                <div class="col-md-12 contact-form-msg text-center">
					                	<div class="sending-msg"><span class="loading"></span></div>
					                </div>	
																							
								</form>	

				 			</div>	
				 		</div>	
				 	</div>  <!-- END CONTACT FORM -->	


				</div>	   <!-- End container -->		
			</section>	<!-- END CONTACTS-5 -->




			<!-- BANNER-3
			============================================= -->
			<section id="banner-3" class="bg-yellow banner-section division">
				<div class="container">
			 		<div class="row d-flex align-items-center">


			 			<!-- BANNER TEXT -->
						<div class="col-md-7 col-lg-6">
							<div class="banner-3-txt coffee-color">

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