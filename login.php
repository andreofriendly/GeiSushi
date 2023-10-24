<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    	<!-- FAVICON AND TOUCH ICONS -->
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="152x152" href="images/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="120x120" href="images/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="images/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
		<link rel="icon" href="images/apple-touch-icon.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

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
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="images/login.jpg"
                        class="img-fluid ml-5 w-75" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    
                    <!-- Add a form to submit the login information -->
                    <form action="login_process.php" method="post">
                        <div class="role">
                            <label>Login as</label>
                            <br>
                            <input type="radio" class="btn-check" name="role" id="customer-role" value="customer" autocomplete="off" checked>
                            <label class="btn" for="customer-role">Customer</label>
                            <input type="radio" class="btn-check" name="role" id="admin-role" value="admin" autocomplete="off">
                            <label class="btn" for="admin-role">Admin</label>
    
                        </div>
                        <br>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter a valid email address" />
                            <label class="form-label" for="form3Example3">Email address</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter password" />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>

                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" name="remember_me" value="1" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">Remember me</label>
                        </div>

                        <!-- Add the reCAPTCHA widget -->
                        <div class="g-recaptcha" data-sitekey="6Lcv7scoAAAAAEnucFzmSEhYBI_jOuy3vITlzSVX"></div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php" class="link-danger">Register</a></p>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>