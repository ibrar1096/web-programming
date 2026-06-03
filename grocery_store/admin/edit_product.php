<?php
include("../config.php");

$id = $_GET['id'];

// get existing data
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id=$id"));

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    mysqli_query($conn, "UPDATE products SET 
    name='$name', price='$price', quantity='$quantity' 
    WHERE id=$id");

    header("Location: dashboard.php");
}
?>

<h2>Edit Product</h2>

<form method="POST">
    Name: <input type="text" name="name" value="<?= $data['name']; ?>"><br><br>
    Price: <input type="number" name="price" value="<?= $data['price']; ?>"><br><br>
    Quantity: <input type="number" name="quantity" value="<?= $data['quantity']; ?>"><br><br>
    <button name="update">Update</button>
</form>