<?php
session_start();
require_once "../includes/conn.php";

$sql = "SELECT * FROM mobiles order by ID desc limit 8";
$result = mysqli_query($conn, $sql);

$upload = "../uploads/";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>MobileZone - Buy Smartphones Online</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>

  <!-- NAVBAR -->
     <?php include "../includes/navbar.php"; ?>

  <!-- HERO SLIDER -->
  <section class="hero-slider">
    <div class="slider-track">

      <!-- Slide 1 -->
      <div class="slide" style="background-color: #1a1a2e;">
        <div class="container slide-inner">
          <div class="slide-text">
            <p class="hero-tag">New Arrival</p>
            <h1>iPhone 15 Pro <span>Max</span></h1>
            <p class="hero-desc">Titanium design. A17 Pro chip. The most powerful iPhone ever.</p>
            <a href="shop.php" class="btn btn-primary">Shop Now</a>
          </div>
          <div class="slide-image">
            <img src="https://images.unsplash.com/photo-1510557880182-3d4d3cba35a5?w=400&q=80" alt="iPhone 15 Pro"/>
          </div>
        </div>
      </div>

      <!-- Slide 2-->
      <div class="slide" style="background-color: #0f3460;">
        <div class="container slide-inner">
          <div class="slide-text">
            <p class="hero-tag">Just Launched</p>
            <h1>Samsung <span>Galaxy S24</span></h1>
            <p class="hero-desc">Galaxy AI is here. Redefine what a phone can do.</p>
            <a href="shop.php" class="btn btn-primary">Shop Now</a>
          </div>
          <div class="slide-image">
            <img src="../uploads/samGalaxyS26.jpg" alt="Samsung S24"/>
          </div>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="slide" style="background-color: #16213e;">
        <div class="container slide-inner">
          <div class="slide-text">
            <p class="hero-tag">Best Seller</p>
            <h1>Xiaomi 14 <span>Ultra</span></h1>
            <p class="hero-desc">Leica cameras. Snapdragon 8 Gen 3. Premium at its best.</p>
            <a href="shop.php" class="btn btn-primary">Shop Now</a>
          </div>
          <div class="slide-image">
            <img src="https://images.unsplash.com/photo-1598327105666-5b89351aff97?w=400&q=80" alt="Xiaomi 14"/>
          </div>
        </div>
      </div>

    </div>

    <!-- Arrow Buttons -->
    <button class="slider-btn prev" onclick="prevBtn()">&#10094;</button>
    <button class="slider-btn next" onclick="nextBtn()">&#10095;</button>

    <!-- Dots -->
    <div class="slider-dots">
      <span class="dot active" onclick="goToSlide(0)"></span>
      <span class="dot" onclick="goToSlide(1)"></span>
      <span class="dot" onclick="goToSlide(2)"></span>
    </div>

  </section>


  <!-- CATEGORIES -->
  <section class="section categories">
    <div class="container">
      <h2 class="section-title">Shop by Brand</h2>
      <div class="category-grid">
        <a href="#" class="category-card">
          <i class="fa-brands fa-apple"></i>
          <p>Apple</p>
        </a>
        <a href="#" class="category-card">
          <i class="fa-brands fa-samsung"></i>
          <p>Samsung</p>
        </a>
        <a href="#" class="category-card">
          <i class="fa-solid fa-mobile-screen"></i>
          <p>Xiaomi</p>
        </a>
        <a href="#" class="category-card">
          <i class="fa-solid fa-mobile"></i>
          <p>OnePlus</p>
        </a>
        <a href="#" class="category-card">
          <i class="fa-solid fa-mobile-retro"></i>
          <p>Oppo</p>
        </a>
      </div>
    </div>
  </section>


  <!-- FEATURED PRODUCTS -->
  <section class="section featured">
    <div class="container">
      <h2 class="section-title">Featured Products</h2>
      <div class="product-grid">

      <?php while ($row = mysqli_fetch_assoc($result)){ ?>
        <div class="product-card">
          <div class="product-img">
            <img src="<?php echo $upload . $row['Image']; ?> " alt="iPhone 15"/>
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
      <div class="center-btn">
        <a href="shop.php" class="btn btn-outline">View All Products</a>
      </div>
    </div>
  </section>


  <!-- PROMO BANNER -->
  <section class="promo-banner">
    <div class="container promo-inner">
      <div>
        <h2>Up to 30% Off on Selected Models</h2>
        <p>Limited time offer. Don't miss out!</p>
      </div>
      <a href="products.html" class="btn btn-white">Grab the Deal</a>
    </div>
  </section>


  <!-- WHY CHOOSE US -->
  <section class="section features">
    <div class="container">
      <h2 class="section-title">Why Choose Us</h2>
      <div class="features-grid">
        <div class="feature-card">
          <i class="fa-solid fa-truck-fast"></i>
          <h4>Fast Delivery</h4>
          <p>Get your phone delivered within 2-3 business days.</p>
        </div>
        <div class="feature-card">
          <i class="fa-solid fa-shield-halved"></i>
          <h4>1 Year Warranty</h4>
          <p>All products come with official manufacturer warranty.</p>
        </div>
        <div class="feature-card">
          <i class="fa-solid fa-rotate-left"></i>
          <h4>Easy Returns</h4>
          <p>Not happy? Return within 7 days, no questions asked.</p>
        </div>
        <div class="feature-card">
          <i class="fa-solid fa-headset"></i>
          <h4>24/7 Support</h4>
          <p>Our support team is always here to help you.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
   <?php include "../includes/footer.php"; ?>

  <script src="script.js"></script>
</body>
</html>