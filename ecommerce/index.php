<?php
session_start();

if (isset($_POST['logout'])) {
    $_SESSION = [];
    session_destroy();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    header("Location: pages/login.php");
    exit();
}

include 'includes/db.php';

$products = [];
if (isset($conn)) {
    try {
        $stmt = $conn->query("SELECT * FROM products");
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<p style='color:red;'>Failed to fetch products: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Online Store</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <header>
        <h1>Welcome to Our Store</h1>
        <nav>
            <a href="pages/login.php">Login</a>
            <a href="pages/register.php">Register</a>
            <a href="pages/cart.php"><img src="images/cart-icon.png" alt="Cart" /> Cart</a>
            <form method="POST" style="display:inline;">
                <button type="submit" name="logout">Logout</button>
            </form>
        </nav>
    </header>

    <main>
        <h2>Products</h2>
        <div class="product-list">
        <?php if (empty($products)): ?>
            <p>No products available.</p>
        <?php else: ?>
            <?php foreach ($products as $product): ?>
                <div class="product">
                    <h3><?= htmlspecialchars($product['name']); ?></h3>
                    <p>Price: $<?= number_format($product['price'], 2); ?></p>
                    <p><?= htmlspecialchars($product['description']); ?></p>
                    <?php if (!empty($product['image'])): ?>
                        <img src="images/<?= htmlspecialchars($product['image']); ?>" alt="<?= htmlspecialchars($product['name']); ?>" />
                    <?php endif; ?>
                    <form method="POST" action="pages/cart.php">
                        <input type="hidden" name="product_id" value="<?= $product['id']; ?>" />
                        <button type="submit" name="add_to_cart">Add to Cart</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
    </main>

    <footer>
        <p>&copy; <?= date('Y'); ?> Online Store</p>
    </footer>
</body>
</html>
