<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* ========================
   NAVBAR
======================== */
.navbar {
  background-color: #1a1a2e;
  padding: 14px 0;
  position: sticky;
  top: 0;
  z-index: 100;
}

.nav-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.logo {
  color: #ffffff;
  font-size: 20px;
  font-weight: 700;
}

.logo i {
  color: #f5a623;
}

.nav-links {
  display: flex;
  gap: 24px;
}

.nav-links a {
  color: #ccc;
  font-size: 14px;
  transition: color 0.2s;
}

.nav-links a:hover {
  color: #f5a623;
}

.nav-icons {
  display: flex;
  gap: 16px;
  align-items: center;
}

.nav-icons a {
  color: #ccc;
  font-size: 16px;
  position: relative;
}

.nav-icons a:hover {
  color: #f5a623;
}

.cart-count {
  background-color: #f5a623;
  color: white;
  font-size: 10px;
  border-radius: 50%;
  padding: 1px 5px;
  position: absolute;
  top: -6px;
  right: -8px;
}

</style>
<body>
   
  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="container nav-inner">
      <a href="index.html" class="logo">
        <i class="fa-solid fa-mobile-screen"></i> MobileZone
      </a>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="shop.php">Products</a></li>
        <li><a href="#brands">Brands</a></li>
        <li><a href="#contact"> Contact</a></li>
      </ul>
      <div class="nav-icons">
        <a href="register.php"><i class="fa-solid fa-user"></i> Register</a>
      </div>
    </div>
  </nav> 
</body>
</html>