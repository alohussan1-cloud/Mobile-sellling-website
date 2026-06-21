<?php
$page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Mobile-Store/style.css">
</head>
<body>

<nav class="navbar">
    <div class="container nav-inner">
        <a href="index.php" class="logo">
            <i class="fa-solid fa-mobile-screen"></i> MobileZone
        </a>

        <!-- Hamburger -->
        <button class="menu-toggle">
            <i class="fa-solid fa-bars"></i>
        </button>

        <!-- Desktop Navigation -->
        <ul class="nav-links">
            <li><a href="index.php" class="<?= ($page == 'index.php') ? 'active' : '' ?>">Home</a></li>
            <li><a href="shop.php" class="<?= ($page == 'shop.php') ? 'active' : '' ?>"> Products </a></li>
            <li><a href="#brands">Brands</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

        <div class="nav-icons">
            <a href="register.php"><i class="fa-solid fa-user"></i> Register </a>
            <a href="../admin/admin-login.php"><i class="fa-solid fa-user"></i> Admin Login</a>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu">
            <!-- <a href="index.php" class="<?= ($page == 'index.php') ? 'active' : '' ?>">
                Home
            </a>

            <a href="shop.php" class="<?= ($page == 'shop.php') ? 'active' : '' ?>">
                Products
            </a>

            <a href="#brands">Brands</a>

            <a href="#contact">Contact</a>

            <a href="register.php">
                Register
            </a>

            <a href="../admin/admin-login.php">
                Admin Login
            </a> -->
             <ul class="toggle-links">
            <li><a href="index.php" class="<?= ($page == 'index.php') ? 'active' : '' ?>">Home</a></li>
            <li><a href="shop.php" class="<?= ($page == 'shop.php') ? 'active' : '' ?>"> Products </a></li>
            <li><a href="#brands">Brands</a></li>
            <li><a href="#contact">Contact</a></li>
            
           <li> <a href="register.php"><i class="fa-solid fa-user"></i> Register </a> </li>
          <li> <a href="../admin/admin-login.php"><i class="fa-solid fa-user"></i> Admin Login</a> </li>
        </ul>
        </div>

    </div>
</nav>

</body>
</html>