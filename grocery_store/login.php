<?php
session_start();
include("config.php");

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['user'] = $username;
        header("Location: admin/dashboard.php");
    } else {
        $error = "Wrong username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f8f9fa;
}

.login-box {
    width: 350px;
    margin: 100px auto;
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}
</style>

</head>

<body>

<?php include("navbar.php"); ?>

<div class="login-box">

<h3 class="text-center mb-3">🔐 Admin Login</h3>

<?php if(isset($error)){ ?>
<div class="alert alert-danger"><?= $error ?></div>
<?php } ?>

<form method="POST">

<input type="text" name="username" class="form-control mb-2" placeholder="Username" required>

<input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

<button class="btn btn-primary w-100" name="login">Login</button>

</form>

</div>

</body>
</html>