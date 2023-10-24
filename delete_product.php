<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: /'); // Redirect to the homepage if not an admin
    exit();
}

include('function.php'); 

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $delete_query = "DELETE FROM products WHERE id = $product_id";

    if (mysqli_query($koneksi, $delete_query)) {
    } else {
    }

    mysqli_close($koneksi);
}

header('Location: dashboard.php'); 
?>
