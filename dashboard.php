<?php
session_start();

require_once('function.php');

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        $sql = "SELECT U.name AS user_name,
                U.email AS user_email,
                U.number AS user_number,
                U.address AS user_address,
                O.total_products AS total_products,
                O.total_price AS total_price
        FROM orders AS O
        JOIN users  AS U ON O.user_id = U.id";

        $result_order = mysqli_query($koneksi, $sql);
    }else {
        header('Location: /'); 
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="description" content="Gei Sushi"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


  		<!-- SITE TITLE -->
		<title>Gei Pizza</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-auto bg-light sticky-top">
                <div class="d-flex flex-sm-column flex-row flex-nowrap bg-light align-items-center sticky-top">
                    <a href="/" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                        <img width="70px" src="images/logo2.png" alt="header-logo"/>
                    </a>
                    <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center justify-content-between w-100 px-3 align-items-center">

  
                        <li class="py-3">
                            <a href="#" class="py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                                <i class="bi-plus-circle fs-1"></i>
                            </a>
                        </li>
                        <li class="py-3">
                            <a href="#" class="py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Products">
                                <i class="bi-shop-window fs-1"></i>
                            </a>
                        </li>

                    </ul>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-person-circle h2"></i>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                        <form method="post" action="logout.php">
                            <button class="dropdown-item" type="submit" name="logout">Sign Out</button>
                        </form>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm p-3 min-vh-100">
                <div id="plusContent">
                    <h2>Managing Product</h2>
                    <p>Manage the Menu</p>
                    <h2>Add Product</h2>
                    <form id="addProductForm" action="insert_product.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Product Name:</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" name="description" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" class="form-control" name="quantity" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Category:</label>
                            <input type="text" class="form-control" name="category" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" class="form-control" name="price" required>
                        </div>

                        <div class="form-group">
                            <label for="image">Product Image:</label>
                            <input type="file" class="form-control" name="image" accept="image/*" required>
                        </div>

                        <input type="submit" class="btn btn-dark" value="Add Product">
                    </form>

                    <div id="messageDiv"></div>

                    <br>

                    <h2>Product List</h2>

                    <?php
                    include('function.php');

                    $sql = "SELECT * FROM products";
                    $result = mysqli_query($koneksi, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        echo "<table>";
                        echo "<tr><th>ID</th><th>Name</th><th>Description</th><th>Quantity</th><th>Category</th><th>Price</th><th>Image</th></tr>";
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["description"] . "</td>"; 
                            echo "<td>" . $row["quantity"] . "</td>";
                            echo "<td>" . $row["category"] . "</td>";
                            echo "<td>" . $row["price"] . "</td>";
                            echo '<td><img src="' . $row["image"] . '" width="100"></td>';
                            echo '<td><a href="delete_product.php?id=' . $row["id"] . '">Delete</a></td>';
                            echo "</tr>";
                        }
                        
                        

                        echo "</table>";
                    } else {
                        echo "No products found.";
                    }

                    mysqli_close($koneksi);
                    ?>
                </div>

                <br>
                <div id="shopContent" style="display: none;">
                    <h2>Your Order</h2>
                    <p>This is the content for the shop-window icon.</p>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Address</th>
                            <th>Total Product</th>
                            <th>Total Price</th>
                        </tr>
                        <?php
                        if($result_order) {
                        while($row_order = mysqli_fetch_assoc($result_order)) {
                        ?>
                        <tr>
                            <td><?= $row_order['user_name']?></td>
                            <td><?= $row_order['user_email']?></td>
                            <td><?= $row_order['user_number']?></td>
                            <td><?= $row_order['user_address']?></td>
                            <td><?= $row_order['total_products']?></td>
                            <td><?= $row_order['total_price']?></td>
                        </tr>
                        <?php
                        } }
                        ?>
                    </table>
                </div>
            </div>

    </div>
</body>
</html>

<script>
$(document).ready(function () {
    // Click event for plus-circle icon
    $(".bi-plus-circle").click(function () {
        $("#plusContent").show();
        $("#shopContent").hide();
    });

    // Click event for shop-window icon
    $(".bi-shop-window").click(function () {
        $("#plusContent").hide();
        $("#shopContent").show();
    });
});
</script>
