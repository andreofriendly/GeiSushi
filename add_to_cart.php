<?php
session_start();
require_once('function.php');

$userId = $_SESSION['user_id'];

$p_id = $_POST['id'];
$p_name = $_POST['name'];
$p_desc = $_POST['desc'];
$p_price = $_POST['price'];
$p_img = $_POST['img'];

$select_sql = "SELECT *
        FROM cart
        WHERE pid = ? AND user_id = ?";

$select_stmt = mysqli_prepare($koneksi, $select_sql);
mysqli_stmt_bind_param($select_stmt, 'ii', $p_id , $userId);
$result = mysqli_stmt_execute($select_stmt);

$result_set = mysqli_stmt_get_result($select_stmt);
$row = mysqli_fetch_assoc($result_set);

if ($row) {
    $sql = "UPDATE cart
            SET quantity = ?
            WHERE pid = ? AND user_id = ?";

    $p_qty = $row['quantity'] + 1;

    $stmt = $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, 'iii', $p_qty, $p_id , $userId);
    mysqli_stmt_execute($stmt);

}  else {
    $sql = "INSERT INTO cart (user_id, pid, name, description, price, quantity, image)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $p_qty = 1;

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, 'iissiis', $userId, $p_id, $p_name, $p_desc, $p_price, $p_qty, $p_img);
    mysqli_stmt_execute($stmt);
    
}

header('Location: menu.php');
