<?php
include('../includes/db.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Delete product by ID
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$id]);
}

// Redirect after 2 seconds
header("refresh:2;url=manage_products.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deleting...</title>
    <style>
        body {
            background-color: #ffdddd;
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 100px;
            color: #333;
        }
        .message {
            background-color: #fff;
            padding: 20px 40px;
            border: 2px solid #dc3545;
            border-radius: 8px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="message">
        <h2>Deleting Product...</h2>
        <p>You will be redirected shortly.</p>
    </div>
</body>
</html>
