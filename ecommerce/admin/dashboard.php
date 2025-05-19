<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Admin Dashboard</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #6dd5fa, #2980b9);
        margin: 0;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .container {
        width: 60%;
        max-width: 800px;
        margin: 0;
        background-color: #fff;
        padding: 40px 50px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        border-radius: 12px;
        text-align: center;
    }
    h2 {
        color: #222;
        margin-bottom: 30px;
        font-weight: 700;
    }
    nav {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
    }
    nav a {
        text-decoration: none;
        padding: 14px 30px;
        background-color: #4CAF50;
        color: white;
        font-size: 18px;
        border-radius: 6px;
        box-shadow: 0 4px 6px rgba(76, 175, 80, 0.4);
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        min-width: 140px;
        text-align: center;
    }
    nav a:hover {
        background-color: #45a049;
        box-shadow: 0 6px 10px rgba(69, 160, 73, 0.6);
    }
    .logout {
        background-color: #f44336;
        box-shadow: 0 4px 6px rgba(244, 67, 54, 0.4);
    }
    .logout:hover {
        background-color: #e53935;
        box-shadow: 0 6px 10px rgba(229, 57, 53, 0.6);
    }
    footer {
        margin-top: 20px;
        color: #eee;
        font-weight: 300;
        letter-spacing: 0.5px;
        font-size: 14px;
    }
</style>
</head>
<body>
    <div class="container">
        <h2>Admin Dashboard</h2>
        <nav>
            <a href="add_product.php">Add Product</a>
            <a href="manage_products.php">Manage Products</a>
            <a href="logout.php" class="logout">Logout</a>
        </nav>
    </div>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Admin Dashboard</p>
    </footer>
</body>
</html>
