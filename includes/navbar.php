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
.mobile-sidebar{
    padding:20px;
    background:#1a1a2e;
    position: fixed;
    top: 0;
    right:-100%;
    width: 100%;
    height: 100vh;
    transition: .8s ease;
}
.mobile-sidebar.active{
    right:0;
}
.close-btn{
    margin-left:95%;
}
/* ---- HAMBURGER BUTTON ---- */
.menu-toggle {
  display: none;
  align-items: center;
  justify-content: center;
  width: 36px;
  height: 36px;
  background-color: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.15);
  border-radius: 8px;
  color: #ffffff;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.2s;
}

.menu-toggle:hover {
  background-color: #f5a623;
  border-color: #f5a623;
}

.menu-toggle i {
  background-color: transparent;
  color: #ffffff;
}

@media (max-width: 768px) {
  .menu-toggle {
    display: flex;
  }
}
/* ---- NAV LINKS ---- */
.toggle-links {
  list-style: none;
  margin-top: 30px;
}

.toggle-links li a {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 13px 10px;
  color: #aaa;
  font-size: 15px;
  text-decoration: none;
  border-bottom: 1px solid rgba(255, 255, 255, 0.06);
  transition: color 0.2s;
}

.toggle-links li a i {
  color: #f5a623;
  width: 16px;
}

.toggle-links li a:hover {
  color: #ffffff;
}

.toggle-links li a.active {
  color: #f5a623;
}

/* ---- DIVIDER ---- */
.sidebar-divider {
  border-top: 1px solid rgba(255, 255, 255, 0.08);
  margin: 20px 0;
}

/* ---- USER LINKS ---- */
.sidebar-user {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.sidebar-user a {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 10px;
  color: #aaa;
  font-size: 15px;
  text-decoration: none;
  border-radius: 6px;
  transition: background-color 0.2s, color 0.2s;
}

.sidebar-user a i {
  color: #f5a623;
  width: 16px;
}

.sidebar-user a:hover {
  background-color: rgba(255, 255, 255, 0.06);
  color: #ffffff;
}

.sidebar-logout {
  color: #e74c3c !important;
}

.sidebar-logout i {
  color: #e74c3c !important;
}
/* ---- CLOSE BUTTON ---- */
.close-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 32px;
  height: 32px;
  background-color: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.15);
  border-radius: 50%;
  color: #ffffff;
  font-size: 13px;
  cursor: pointer;
  margin-left: auto;
  transition: background-color 0.2s;
}

.close-btn:hover {
  background-color: #e74c3c;
  border-color: #e74c3c;
}

/* ---- NAV LINKS ---- */
.toggle-links {
  list-style: none;
  margin-top: 30px;
}

.toggle-links li a {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 13px 10px;
  color: #aaa;
  font-size: 15px;
  text-decoration: none;
  border-bottom: 1px solid rgba(255, 255, 255, 0.06);
  transition: color 0.2s;
}

.toggle-links li a i {
  color: #f5a623;
  width: 16px;
}

.toggle-links li a:hover {
  color: #ffffff;
}

.toggle-links li a.active {
  color: #f5a623;
}

/* ---- DIVIDER ---- */
.sidebar-divider {
  border-top: 1px solid rgba(255, 255, 255, 0.08);
  margin: 28px 0 20px;
}

/* ---- USER SECTION LABEL ---- */
.sidebar-user-label {
  font-size: 11px;
  text-transform: uppercase;
  letter-spacing: 1.5px;
  color: #555;
  padding: 0 10px;
  margin-bottom: 10px;
}

/* ---- USER LINKS ---- */
.sidebar-user {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.sidebar-user a {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 13px 16px;
  font-size: 14px;
  font-weight: 500;
  text-decoration: none;
  border-radius: 8px;
  transition: background-color 0.2s, color 0.2s;
}

/* Login - outlined style */
.sidebar-user a.btn-login-side {
  background-color: transparent;
  border: 1px solid rgba(255, 255, 255, 0.2);
  color: #ffffff;
}

.sidebar-user a.btn-login-side i {
  color: #ffffff;
}

.sidebar-user a.btn-login-side:hover {
  background-color: rgba(255, 255, 255, 0.08);
}

/* Register - filled orange style */
.sidebar-user a.btn-register-side {
  background-color: #f5a623;
  color: #ffffff;
}

.sidebar-user a.btn-register-side i {
  color: #ffffff;
}

.sidebar-user a.btn-register-side:hover {
  opacity: 0.88;
}

/* Profile link */
.sidebar-user a.btn-profile-side {
  background-color: rgba(255, 255, 255, 0.06);
  color: #ffffff;
}

.sidebar-user a.btn-profile-side i {
  color: #f5a623;
}

/* Logout link */
.sidebar-logout {
  background-color: rgba(231, 76, 60, 0.1) !important;
  color: #e74c3c !important;
}

.sidebar-logout i {
  color: #e74c3c !important;
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
        <div class="mobile-sidebar">
            <button class="close-btn">
                <i class="fa-solid fa-x"></i>
            </button>
            <div class="links">
            <ul class="toggle-links">
                <li><a href="index.php" class="<?= ($page == 'index.php') ? 'active' : '' ?>">Home</a></li>
                <li><a href="shop.php" class="<?= ($page == 'shop.php') ? 'active' : '' ?>"> Products </a></li>
                <li><a href="#brands" class="<?= ($page == 'brand.php') ? 'active' : '' ?>">Brands</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            </div>
  
            <div class="sidebar-divider"></div>

            <p class="sidebar-user-label">Account</p>

            <div class="sidebar-user">
            <?php if (isset($_SESSION['name'])) { ?>
                <a href="profile.php" class="btn-profile-side">
                <i class="fa-solid fa-user"></i> Profile
                </a>
                <a href="logout.php" class="sidebar-logout">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
                </a>
            <?php } else { ?>
                <a href="login.php" class="btn-login-side">
                <i class="fa-solid fa-right-to-bracket"></i> Login
                </a>
                <a href="register.php" class="btn-register-side">
                <i class="fa-solid fa-user-plus"></i> Register
                </a>
            <?php } ?>
            </div>
        </div>
    </div>
</nav>

</body>
</html>

