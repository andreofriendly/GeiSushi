<?php
session_start();
require_once('function.php');

$userId = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the items array from the POST request
    $items = $_POST['items'];
    var_dump($items);
    // Process the items and update the cart as needed
    foreach ($items as $item) {
        // Update the cart, e.g., in a session or database
        // You should validate and sanitize the input
        $itemId = $item['id'];
        $newQuantity = $item['quantity'];

        // Perform the update operation, for example, update the cart in a database
        $sql = "UPDATE cart SET quantity = ? WHERE pid = ? AND user_id = ?";
        $stmt = mysqli_prepare($koneksi, $sql);
        
        // Note that the order of parameters should match the order in the SQL statement
        mysqli_stmt_bind_param($stmt, 'iii', $newQuantity, $itemId, $userId);
        $result = mysqli_stmt_execute($stmt);

    }
} else {
    // header('Location: cart.php');
}

// header('Location: cart.php');
exit();

