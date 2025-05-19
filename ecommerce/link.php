<?php
$action = $_GET['action'] ?? '';

if ($action == 'pages') {
    include 'login.php';
} elseif ($action == 'admin') {
    include 'add_product.php';
} else {
    echo "Invalid action or no action specified.";
}
?>
