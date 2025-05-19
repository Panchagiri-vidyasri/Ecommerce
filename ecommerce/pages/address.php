<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION['product'] = $_POST['product'];
    $_SESSION['total'] = $_POST['total'];
    $_SESSION['pay_method'] = $_POST['pay_method'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Address & Payment</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="checkout-container">
    <h2>ADDRESS & PAYMENT</h2>
    <form action="confirmation.php" method="post">
      <h3>Address Book</h3>
      <div class="section-box">
        <p><strong>Li Juan</strong><br>123 LIBERTY ST<br>SEATTLE, WA, 98765-4321</p>
      </div>

      <h3>Payment Method</h3>
      <div class="section-box">
        <p><strong>Discover</strong> **** 9424</p>
      </div>

      <input type="hidden" name="address" value="123 LIBERTY ST, SEATTLE, WA 98765-4321">
      <input type="hidden" name="card" value="Discover ...9424">
      <button type="submit" class="submit-btn">Confirm Order</button>
    </form>
  </div>
</body>
</html>
