<?php
include('function.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $role = 'customer';

    // Validate the password length
    if (strlen($password) < 8) {
        echo "Password must be at least 8 characters long.";
    } else {
        // Hash the password
        $password = password_hash($password, PASSWORD_BCRYPT);

        // Make sure $koneksi is a valid database connection
        if (!$koneksi) {
            die("Database connection failed.");
        }

        // Use a prepared statement to insert data into the database
        $stmt = mysqli_prepare($koneksi, "INSERT INTO users (name, email, number, password, address, role) VALUES (?, ?, ?, ?, ?, ?)");

        if ($stmt) {
            // Bind parameters and execute the statement
            mysqli_stmt_bind_param($stmt, 'ssssss', $name, $email, $number, $password, $address, $role);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                header('Location: login.php');
                exit();
            } else {
                echo "Registration failed. Please try again.";
            }
        } else {
            echo "Error in the prepared statement.";
        }
    }
}
?>




<html lang="en">
<head>
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
</head>
<body>
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="images/login.jpg" class="img-fluid w-75" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <h1>Register</h1>
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="number">Phone Number</label>
                        <input type="text" class="form-control" name="number" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" name="address" required></textarea>
                    </div>
                    <button type="submit" class="btn">Register</button>
                </form>
            </div>
        </div>


    </div>

</section>

</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const registrationForm = document.querySelector("form");

        registrationForm.addEventListener("submit", function(event) {
            const passwordInput = document.querySelector('input[name="password"]');
            const password = passwordInput.value;

            if (password.length < 8) {
                alert("Password must be at least 8 characters long.");
                event.preventDefault(); // Prevent form submission
            }
        });
    });
</script>
