<?php
session_start();

include('function.php'); 

$userId = $_SESSION['user_id'];
$total_price = $_POST['total_cost'];
$total_qty = $_POST['total_qty'];
 
$sql = 'INSERT INTO orders (user_id, total_products, total_price)
        VALUES (?, ?, ?)';

$stmt = mysqli_prepare($koneksi, $sql);
mysqli_stmt_bind_param($stmt, "iii", $userId, $total_qty, $total_price);
$result = mysqli_stmt_execute($stmt);

if($result) {
    $del_from_cart_sql = "DELETE FROM cart
                            WHERE user_id = ?";
    $del_stmt = mysqli_prepare($koneksi, $del_from_cart_sql);
    mysqli_stmt_bind_param($del_stmt, "i", $userId);
    mysqli_stmt_execute($del_stmt);
}

header("Location: cart.php");