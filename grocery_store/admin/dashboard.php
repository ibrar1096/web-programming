<?php
session_start();
include("../config.php");

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f8f9fa;
}

.card {
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    border-radius: 10px;
    transition: 0.3s;
}

.card:hover {
    transform: scale(1.03);
}

img {
    border-radius: 10px;
}

.header {
    text-align: center;
    margin-bottom: 20px;
}
</style>

</head>

<body class="container mt-4">

<?php include("../navbar.php"); ?>

<!-- <a href="../logout.php" class="btn btn-danger mb-3">Logout</a> -->

<div class="header">
    <h1>🛒 Grocery Store</h1>
    <h4>Admin Dashboard</h4>
</div>

<a href="add_product.php" class="btn btn-primary mb-3">➕ Add Product</a>

<form method="GET" class="mb-4">
    <input type="text" name="search" class="form-control" placeholder="🔍 Search product...">
</form>

<div class="row">

<?php
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $result = mysqli_query($conn, "SELECT * FROM products WHERE name LIKE '%$search%'");
} else {
    $result = mysqli_query($conn, "SELECT * FROM products");
}

while($row = mysqli_fetch_assoc($result)){
?>

<div class="col-md-4 col-sm-6 mb-4">
    <div class="card p-3">

        <img src="../images/<?= $row['image']; ?>" height="200" style="object-fit:cover;">

        <h5 class="mt-3"><?= $row['name']; ?></h5>
        <p><b>Price:</b> Rs <?= $row['price']; ?></p>
        <p><b>Stock:</b> <?= $row['quantity']; ?></p>

        <div class="d-flex justify-content-between">
            <a href="edit_product.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="delete_product.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
        </div>

    </div>
</div>

<?php } ?>

</div>

</body>
</html>