<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <style>
        /* Define a custom class for the button */
        .btn-custom {
            background-color: #000;
            color: #fff;
        }

        /* Change the button style on hover */
        .btn-custom:hover {
            background-color: #000 !important;
            color: #fff !important;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Welcome to My Account</h1>
        <p>You can manage your account settings here.</p>

        <form method="post" action="logout.php">
            <!-- Add the custom class to the button -->
            <button type="submit" name="logout" class="btn btn-custom">Logout</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
