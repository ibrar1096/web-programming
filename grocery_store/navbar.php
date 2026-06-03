<?php
$base = "/grocery_store/";
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="<?= $base ?>index.php">🛒 Grocery Store</a>

    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="<?= $base ?>index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= $base ?>about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= $base ?>contact.php">Contact</a></li>

        <?php if(isset($_SESSION['user'])){ ?>
            <li class="nav-item"><a class="nav-link" href="<?= $base ?>admin/dashboard.php">Dashboard</a></li>
                  <li class="nav-item">
  <a class="nav-link" href="<?= $base ?>cart.php">🛒 Cart</a>
</li>
            <li class="nav-item"><a class="nav-link text-danger" href="<?= $base ?>logout.php">Logout</a></li>
        <?php } else { ?>
            <li class="nav-item"><a class="nav-link" href="<?= $base ?>login.php">Admin</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>