<?php

require_once "../includes/conn.php";

$sql = "SELECT * FROM mobiles";
$result = mysqli_query($conn, $sql);

$upload = "../uploads/";




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Shop - MobileZone</title>
  <link rel="stylesheet" href="shop-style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="container nav-inner">
      <a href="index.php" class="logo">
        <i class="fa-solid fa-mobile-screen"></i> MobileZone
      </a>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="shop.php">Products</a></li>
        <li><a href="#">Brands</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <div class="nav-icons">
        <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
        <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i><span class="cart-count">0</span></a>
        <a href="login.php"><i class="fa-solid fa-user"></i></a>
      </div>
    </div>
  </nav>


  <!-- PAGE HEADER -->
  <div class="page-header">
    <div class="container">
      <h1>All Products</h1>
      <p>Home &rsaquo; Products</p>
    </div>
  </div>

  <!-- PRODUCTS -->
  <section class="section">
    <div class="container">
      <div class="product-grid">

        <!-- Replace with PHP while loop -->

          <?php while ($row = mysqli_fetch_assoc($result)){ ?>
        <div class="product-card">
          <div class="product-img">
            <img src="<?php echo $upload . $row['Image']; ?>" alt="iPhone 15"/>
            <span class="badge">New</span>
          </div>
          <div class="product-info">
            <p class="product-brand"><?php echo $row['Brand'] ?></p>
            <h3 class="product-name"><?php echo $row['Model'] ?></h3>
            <p class="product-price"><?php echo $row['Price'] ?></p>
            <a href="order.php?id= <?php echo $row['ID']; ?>" class="btn btn-primary btn-small">Shop Now</a>
          </div>
        </div>
         <?php } ?>

      </div>
    </div>
  </section>


  <!-- FOOTER -->
  <footer class="footer">
    <div class="container footer-inner">
      <div class="footer-col">
        <h3><i class="fa-solid fa-mobile-screen"></i> MobileZone</h3>
        <p>Your trusted online store for the latest smartphones at the best prices.</p>
      </div>
      <div class="footer-col">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="shop.php">Products</a></li>
          <li><a href="#">Brands</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Brands</h4>
        <ul>
          <li><a href="#">Apple</a></li>
          <li><a href="#">Samsung</a></li>
          <li><a href="#">Xiaomi</a></li>
          <li><a href="#">OnePlus</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Contact</h4>
        <p><i class="fa-solid fa-envelope"></i> info@mobilezone.com</p>
        <p><i class="fa-solid fa-phone"></i> +92 300 1234567</p>
        <div class="social-icons">
          <a href="#"><i class="fa-brands fa-facebook"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
          <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2024 MobileZone. All rights reserved.</p>
    </div>
  </footer>

  <script src="main.js"></script>

</body>
</html>