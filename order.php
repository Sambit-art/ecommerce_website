<?php
require_once('./db.php');
session_start();
$userId = $_SESSION['user_id'];
$productId = htmlspecialchars($_GET['product_id']);
$stmt = $connection->prepare("INSERT INTO  cart VALUES (?,?)");
$stmt->execute([(int)$userId, (int)$productId]);
$product = $stmt->errorCode();
if ((int)$product === 0) {
    header("Location: http://localhost/e_commerce/cart.php");
}
