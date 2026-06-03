<?php
session_start();

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

// REMOVE ITEM
if(isset($_GET['remove'])){
    $id = $_GET['remove'];
    unset($_SESSION['cart'][$id]);
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Cart</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include("navbar.php"); ?>

<div class="container mt-4">
<h2>🛒 Your Cart</h2>

<table class="table">
<tr>
    <th>Name</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Total</th>
    <th>Action</th>
</tr>

<?php
$total = 0;

foreach($_SESSION['cart'] as $id => $item){
    $sub = $item['price'] * $item['qty'];
    $total += $sub;
?>

<tr>
    <td><?= $item['name']; ?></td>
    <td><?= $item['price']; ?></td>
    <td><?= $item['qty']; ?></td>
    <td><?= $sub; ?></td>
    <td>
        <a href="cart.php?remove=<?= $id ?>" class="btn btn-danger btn-sm">Remove</a>
    </td>
</tr>

<?php } ?>

<tr>
    <td colspan="3"><b>Total</b></td>
    <td colspan="2"><b>Rs <?= $total ?></b></td>
</tr>

</table>

</div>

</body>
</html>