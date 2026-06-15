
<?php
$page = basename($_SERVER['PHP_SELF']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* ---- SIDEBAR ---- */
.sidebar {
width: 220px;
min-height: 100vh;
background-color: #1a1a2e;
position: fixed;
top: 0;
left: 0;
}

.sidebar-logo {
padding: 20px;
color: #ffffff;
font-size: 18px;
font-weight: 700;
border-bottom: 1px solid rgba(255,255,255,0.08);
}

.sidebar-logo i {
color:#f5a623;
margin-right: 8px;
}

.nav-item {
display: flex;
align-items: center;
gap: 10px;
padding: 13px 20px;
color: #aaa;
font-size: 14px;
transition: background-color 0.2s, color 0.2s;
}

.nav-item:hover {
background-color: rgba(255,255,255,0.06);
color: #ffffff;
}

.nav-item.active {
color:#f5a623;
background-color: rgba(245,166,35,0.1);
border-left: 3px solid #f5a623;
}

.nav-item.logout {
color: #e74c3c;
margin-top: 20px;
}
</style>
<body>
    <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="sidebar-logo">
      <i class="fa-solid fa-mobile-screen"></i>
      <span>MobileZone</span>
    </div>
    <nav>
      <a href="admin-dashboard.php" class="nav-item <?= ($page == 'admin-dashboard.php') ? 'active' : '' ?>"><i class="fa-solid fa-gauge"></i> Dashboard</a>
      <a href="admin-products.php" class="nav-item <?= ($page == 'admin-products.php') ? 'active' : '' ?>"><i class="fa-solid fa-mobile-screen"></i> Products</a>
      <a href="admin-orders.php" class="nav-item <?= ($page == 'admin-orders.php') ? 'active' : '' ?>"><i class="fa-solid fa-bag-shopping"></i> Orders</a>
    
      <a href="admin-login.php" class="nav-item logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </nav>
  </aside>
</body>
</html>