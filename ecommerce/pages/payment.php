<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Replace with your DB credentials
$servername = "localhost";
$username = "root";
$password = ""; // If using XAMPP, usually empty
$dbname = "ecommerce";

$message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerName = $_POST['customerName'] ?? '';
    $paymentType = $_POST['paymentType'] ?? '';

    if (!empty($customerName) && !empty($paymentType)) {
        // Connect to DB
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare insert query
        $stmt = $conn->prepare("INSERT INTO payments (customer_name, payment_type) VALUES (?, ?)");
        $stmt->bind_param("ss", $customerName, $paymentType);

        if ($stmt->execute()) {
            $message = "Payment method saved successfully!";
        } else {
            $message = "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        $message = "Please enter your name and select a payment method.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Checkout - Payment</title>
</head>
<body>
  <h2>Checkout - Select Payment Method</h2>

  <?php if (!empty($message)): ?>
    <p><strong><?php echo htmlspecialchars($message); ?></strong></p>
  <?php endif; ?>

  <form method="POST" action="">
    <label for="customerName">Your Name:</label><br>
    <input type="text" name="customerName" id="customerName" required><br><br>

    <label>Select Payment Method:</label><br>
    <input type="radio" id="creditCard" name="paymentType" value="Credit Card" required>
    <label for="creditCard">Credit Card</label><br>

    <input type="radio" id="paypal" name="paymentType" value="PayPal">
    <label for="paypal">PayPal</label><br>

    <input type="radio" id="cod" name="paymentType" value="Cash on Delivery">
    <label for="cod">Cash on Delivery</label><br><br>

    <button type="submit">Confirm Payment</button>
  </form>
</body>
</html>
