<?php
session_start();
include('function.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role = $_POST['role'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($role === 'customer') {
        $query = "SELECT * FROM users WHERE role = 'customer' AND email = ?";
    } elseif ($role === 'admin') {
        $query = "SELECT * FROM users WHERE role = 'admin' AND email = ?";
    } else {
        echo "Invalid role selection.";
        exit;
    }

    $stmt = mysqli_prepare($koneksi, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 's', $email);
        $result = mysqli_stmt_execute($stmt);
        $user = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($user) == 1) {
            $userData = mysqli_fetch_assoc($user);

            if (password_verify($password, $userData['password'])) {
                // Successful login
                $_SESSION['role'] = $role;
                $_SESSION['user_id'] = $userData['id'];
                header("Location: /"); // Redirect to the desired page after successful login.
                exit;
            } else {
                echo "Login failed. Please check your credentials.";
            }
        } else {
            echo "Login failed. Please check your credentials.";
        }
    } else {
        echo "Login failed. Please try again.";
    }
}
?>
