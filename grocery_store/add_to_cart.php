<?php
session_start();
include("config.php");

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$product = mysqli_fetch_assoc($result);

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

// if already in cart → increase qty
if(isset($_SESSION['cart'][$id])){
    $_SESSION['cart'][$id]['qty']++;
} else {
    $_SESSION['cart'][$id] = [
        "name" => $product['name'],
        "price" => $product['price'],
        "qty" => 1
    ];
}

header("Location: cart.php");
?>