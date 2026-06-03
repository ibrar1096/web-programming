<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<title>Contact</title>

<!-- ✅ Bootstrap REQUIRED -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<?php include("navbar.php"); ?>

<div class="container mt-4">
<h2>Contact Us</h2>

<form>
    <input type="text" class="form-control mb-2" placeholder="Your Name">
    <input type="email" class="form-control mb-2" placeholder="Your Email">
    <textarea class="form-control mb-2" placeholder="Message"></textarea>
    <button class="btn btn-primary">Send</button>
</form>

</div>

<!-- ✅ Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>