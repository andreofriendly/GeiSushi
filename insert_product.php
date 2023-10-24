<?php
include 'function.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Handle image upload
    $imageFolder = "uploaded_image/";
    $imagePath = $imageFolder . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

    // Insert product into the database
    $sql = "INSERT INTO products (name , quantity, description, category, price, image) VALUES ('$name', $quantity, '$description','$category', $price, '$imagePath')";
    
    if (mysqli_query($koneksi, $sql)) {
        // Product added successfully
        header('Location: dashboard.php'); // Redirect back to dashboard
        exit(); // Make sure to exit to prevent further execution
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
?>
