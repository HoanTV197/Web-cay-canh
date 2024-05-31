<?php
session_start();
header('Content-Type: application/json');
echo json_encode(['count' => isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0]);
?>
