<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($temp, "../images/".$image);

    mysqli_query($conn, "INSERT INTO products(name,price,quantity,image)
    VALUES('$name','$price','$quantity','$image')");

    header("Location: dashboard.php");
}
?>

<h2>Add Product</h2>

<form method="POST" enctype="multipart/form-data">

Name: <input type="text" name="name"><br><br>
Price: <input type="number" name="price"><br><br>
Quantity: <input type="number" name="quantity"><br><br>

Image: <input type="file" name="image"><br><br>

<button name="submit">Add Product</button>

</form>

