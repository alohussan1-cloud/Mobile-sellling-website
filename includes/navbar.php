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
<style>
    .user-menu {
    position: relative;
    display: inline-block;
}

.user-name {
    cursor: pointer;
    color: white;
}

.dropdown {
    position: absolute;
    top: 100%;
    right: 0;

    background: white;
    min-width: 150px;

    border-radius: 8px;
    overflow: hidden;

    display: none;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.dropdown a {
    display: block;
    padding: 12px;
    color: #333;
    text-decoration: none;
}

.dropdown a:hover {
    background: #f5f5f5;
}

/* Show dropdown on hover */
.user-menu:hover .dropdown {
    display: block;
}
</style>
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
            <li><a href="#brands" class="<?= ($page == 'brand.php') ? 'active' : '' ?>">Brands</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

        <div class="nav-icons">
            <?php if(isset($_SESSION['name'])){ ?>
            <div class="user-menu">
                <span class="user-name">👤 <?php echo $_SESSION['name']; ?> ▼</span>
                <div class="dropdown">
                    <a href="profile.php">Profile</a>
                    <a href="orders.php">Orders</a>
                    <a href="logout.php">Logout</a>
                </div>
            </div>

           <?php } else{
               echo '<a href="register.php" class="register"><i class="fa-solid fa-user"></i> Register </a> | 
                     <a href="login.php" class="register"><i class="fa-solid fa-user"></i> Log In </a> ';

            } ?>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu">
             <ul class="toggle-links">
            <li><a href="index.php" class="<?= ($page == 'index.php') ? 'active' : '' ?>">Home</a></li>
            <li><a href="shop.php" class="<?= ($page == 'shop.php') ? 'active' : '' ?>"> Products </a></li>
            <li><a href="#brands" class="<?= ($page == 'brand.php') ? 'active' : '' ?>">Brands</a></li>
            <li><a href="#contact">Contact</a></li>
            
           <li> <a href="register.php"><i class="fa-solid fa-user"></i> Register </a> </li>
        </ul>
        </div>

    </div>
</nav>

</body>
</html>