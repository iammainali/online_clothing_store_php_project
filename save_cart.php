<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_sushil";

$cartData = json_decode($_POST['cartData'], true);

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO cart_items (product_name, price, quantity, subtotal) VALUES (?, ?, ?, ?)");

foreach ($cartData as $item) {
    $productName = $item['name'];
    $price = $item['price'];
    $quantity = $item['quantity'];
    $subtotal = $item['price'] * $item['quantity'];

    $stmt->bind_param("ssdd", $productName, $price, $quantity, $subtotal);
    $stmt->execute();
}

$stmt->close();
$conn->close();
?>
