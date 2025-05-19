<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../includes/db.php';

$user_id = $_SESSION['user_id'];

// Fetch cart items from DB
$stmt = $conn->prepare("SELECT c.product_id, c.quantity, p.name, p.price, p.image 
                        FROM cart c 
                        JOIN products p ON c.product_id = p.id 
                        WHERE c.user_id = ?");
$stmt->execute([$user_id]);
$cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($cart_items)) {
    echo "<h2>Your cart is empty.</h2>";
    echo "<a href='../index.php'>Return to Shop</a>";
    exit();
}

$total_cost = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <style>
        body { font-family: Arial; background: #f5f5f5; padding: 20px; }
        .container { max-width: 800px; margin: auto; background: #fff; padding: 20px; border-radius: 10px; }
        h2 { text-align: center; margin-bottom: 20px; }
        .item { display: flex; margin-bottom: 15px; border-bottom: 1px solid #ccc; padding-bottom: 10px; }
        .item img { width: 100px; margin-right: 20px; border-radius: 8px; }
        .item-details { flex: 1; }
        .item-details h4, .item-details p { margin: 5px 0; }
        .total { font-size: 1.4em; font-weight: bold; text-align: right; margin-top: 20px; }
        .confirm-btn {
            display: block;
            width: 100%;
            padding: 12px;
            font-size: 1.1em;
            background-color: #28a745;
            border: none;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 30px;
        }
        .confirm-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Checkout</h2>
    <?php foreach ($cart_items as $item): 
        $item_total = $item['price'] * $item['quantity'];
        $total_cost += $item_total;
    ?>
        <div class="item">
            <img src="../images/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
            <div class="item-details">
                <h4><?= htmlspecialchars($item['name']) ?></h4>
                <p>Quantity: <?= $item['quantity'] ?></p>
                <p>Price: $<?= number_format($item['price'], 2) ?> each</p>
                <p>Subtotal: $<?= number_format($item_total, 2) ?></p>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="total">
        Total Amount: $<?= number_format($total_cost, 2) ?>
    </div>

    <form action="confirm_order.php" method="post">
        <input type="hidden" name="total_cost" value="<?= $total_cost ?>">
        <button type="submit" class="confirm-btn">Confirm and Place Order</button>
    </form>
</div>
</body>
</html>
