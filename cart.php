<?php
session_start();

require_once('function.php');

if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit;
}

$sql = "SELECT *
		FROM cart
		WHERE user_id = ?";

$stmt = mysqli_prepare($koneksi, $sql);
mysqli_stmt_bind_param($stmt, 'i', $_SESSION['user_id']);
$check = mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$cart_items = array();
while ($row = mysqli_fetch_assoc($result)) {
    $cart_items[] = $row;
}

$sum_sql = "SELECT SUM(quantity * price) AS total_cost FROM cart WHERE user_id = ?";
$sum_stmt = mysqli_prepare($koneksi, $sum_sql);

if ($sum_stmt) {
    mysqli_stmt_bind_param($sum_stmt, 'i', $_SESSION['user_id']);
    mysqli_stmt_execute($sum_stmt);

    // Bind the result
    mysqli_stmt_bind_result($sum_stmt, $total_cost);

    // Fetch the result
    mysqli_stmt_fetch($sum_stmt);

    mysqli_stmt_close($sum_stmt);
}

$total_quantity = 0;

foreach ($cart_items as $row) {
	$total_quantity += $row['quantity'];
}

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

								<!-- Breadcrumb -->
								<div id="breadcrumb">
									<div class="row">						
										<div class="col">
											<div class="breadcrumb-nav">
												<nav aria-label="breadcrumb">
												  	<ol class="breadcrumb">
												    	<li class="breadcrumb-item"><a href="/">Home</a></li>
												    	<li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
												  	</ol>
												</nav>
											</div>
										</div>
									</div> 
								</div>

								<!-- Title -->
								<h2 class="h2-xl">Shopping Cart</h2>

							</div>
						</div>	
					</div>	  <!-- End row -->
				</div>	   <!-- End container --> 
			</div>	<!-- END PAGE HERO -->	




			<!-- CART PAGE
			============================================= -->
			<section id="cart-1" class="wide-100 cart-page division">
				<div class="container">


					<!-- CART TABLE -->	
					<div class="row">
						<div class="col-md-12">
							<div class="cart-table mb-70">
								<table id="myTable">
									<thead>
									    <tr>
									      	<th scope="col">Product</th>
									      	<th scope="col">Price</th>
									      	<th scope="col">Quantity</th>
									      	<th scope="col">Total</th>
									      	<th scope="col">Delete</th>
									    </tr>
									 </thead>

									<tbody>

										<!-- CART ITEM #1 -->
										<?php
										foreach($cart_items as $row) {?>
											
									    <tr>
									      	<td data-label="Product" class="product-name">

									      		<!-- Preview -->
												<div class="cart-product-img"><img src="<?= $row['image']?>" alt="cart-preview"></div>

												<!-- Description -->
												<div class="cart-product-desc">
										      		<h5 class="h5-sm"><?= $row['name']?></h5>
										      		<p class="p-sm"><?= substr($row['description'], 1, 75)?>...</p>
													<p class="product-id d-none "><?= $row['id']?></p>
										      	</div>

									      	</td>

									      	<td data-label="Price" class="product-price"><h5 class="h5-md">RP. <?= number_format($row['price'])?></h5></td>
									      	<td data-label="Quantity" class="product-qty">
									      		<input id="item-qty" class="qty" type="number" min="1" max="20" value="<?= $row['quantity']?>">
									      	</td>
									      	<td data-label="Total" class="product-price-total"><h5 class="h5-md">Rp. <?= number_format($row['quantity'] * $row['price'])?></h5></td>
									      	<td data-label="Delete" class="td-trash"><i class="far fa-trash-alt"></i></td>

									    </tr>
										<?php
										}
										?>
									</tbody>

								</table>
							</div>
						</div>
					</div>	<!-- END CART TABLE -->


					<!-- CART CHECKOUT -->
					<div class="row">

						<!-- DISCOUNT COUPON -->
						<div class="col-lg-8">
							<div class="discount-coupon row pt-15">

								<!-- Form -->
								<div class="col-md-8 col-lg-7">
									<form class="discount-form">
												
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Coupon Code" id="discount-code">
											<span class="input-group-btn">
												<button type="submit" class="btn btn-salmon tra-salmon-hover">Apply Coupon</button>
											</span>
										</div>
													
									</form>
								</div>


								<!-- Button -->
								<div class="col-md-4 col-lg-5 text-right">
									<a id="update-cart" class="btn btn-md btn-salmon tra-salmon-hover" onclick="updateCart()">Update Cart</a>
								</div>

							</div>
						</div>


						<!-- CHECKOUT -->
						<div class="col-lg-4">
							<div class="cart-checkout bg-lightgrey">

								<!-- Title -->
								<h5 class="h5-lg">Cart Total</h5>

								<!-- Table -->
								<table>
									<tbody>
									    <tr>
									      	<td>Subtotal</td>
									      	<td> </td>
									      	<td class="text-right">Rp. <?= number_format($total_cost)?></td>
									    </tr>
									    <tr class="last-tr">
									      	<td>Total</td>
									      	<td> </td>
									      	<td class="text-right">Rp. <?= number_format($total_cost)?></td>
									    </tr>
									  </tbody>
								</table>

								<!-- Button -->
								<form action="checkout.php" method="post">
									<input type="hidden" name="total_cost" value="<?=$total_cost?>">
									<input type="hidden" name="total_qty" value="<?=$total_quantity?>">
									<button type="submit" class="btn btn-md btn-salmon tra-salmon-hover">Proceed To Checkout</button>
								</form>
							</div>
						</div>	<!-- END CHECKOUT -->


					</div>	  <!-- END CART CHECKOUT -->


				</div>	   <!-- End container -->
			</section>	<!-- END CART PAGE -->




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
								<p class="p-md">Aliquam a augue suscipit, luctus neque purus ipsum and neque dolor primis libero tempus, 
									blandit varius
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

		
		<script>
			function updateCart() {
				var items = [];

				$('.cart-item').each(function() {
					var item = {
						id: $(this).find('.product-id').text(),
						quantity: $(this).find('.qty').val()
					};
					items.push(item);
				});

				$.post('update_cart.php', { items: items });
				
				window.location.href = 'update_cart.php'
			}

		</script>

	</body>



</html>	