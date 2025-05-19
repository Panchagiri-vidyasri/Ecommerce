<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../includes/db.php';

$user_id = $_SESSION['user_id'];
$total_cost = $_POST['total_cost'] ?? 0;

// Example DB insert (if you want to enable later)
// $stmt = $conn->prepare("INSERT INTO orders (user_id, total_cost, created_at) VALUES (?, ?, NOW())");
// $stmt->execute([$user_id, $total_cost]);
// $order_id = $conn->lastInsertId();

// Clear cart
$stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
$stmt->execute([$user_id]);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmed</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('../images/thank you.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.6); /* dark transparent overlay */
            padding: 60px 20px;
            text-align: center;
            min-height: 100vh;
        }
        h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2rem;
        }
        a {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 24px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <h2>Order Confirmed!</h2>
        <p>Thank you for your purchase. Your order total was <strong>$<?= number_format($total_cost, 2) ?></strong>.</p>
        <a href="../index.php">Back to Shop</a>
    </div>
</body>
</html>
