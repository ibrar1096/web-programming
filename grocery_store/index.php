<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Grocery Store</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f8f9fa;
}

/* Hero Section */
.hero {
    background: url('https://images.unsplash.com/photo-1606787366850-de6330128bfc');
    background-size: cover;
    background-position: center;
    height: 300px;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
}

.hero h1 {
    background: rgba(0,0,0,0.6);
    padding: 15px 30px;
    border-radius: 10px;
}

/* Cards */
.card {
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    transition: 0.3s;
}
.card:hover {
    transform: scale(1.05);
}
</style>

</head>

<body>

<?php include("navbar.php"); ?>

<!-- HERO SECTION -->
<div class="hero">
    <h1>Fresh Grocery Delivered 🛒</h1>
</div>

<div class="container mt-5">

<h2 class="text-center mb-4">🛍️ Our Products</h2>

<div class="row">

<?php
include("config.php");

$result = mysqli_query($conn, "SELECT * FROM products");

while($row = mysqli_fetch_assoc($result)){
?>

<div class="col-md-3 col-sm-6 mb-4">
    <div class="card p-2">

        <img src="images/<?= $row['image']; ?>" height="180" style="object-fit:cover;">

        <h5 class="mt-2"><?= $row['name']; ?></h5>
        <p><b>Rs <?= $row['price']; ?></b></p>

        <a href="add_to_cart.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">
Add to Cart
</a>

    </div>
</div>

<?php } ?>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>