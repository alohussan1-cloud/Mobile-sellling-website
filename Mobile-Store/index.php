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
  <nav class="navbar">
    <div class="container nav-inner">
      <a href="index.html" class="logo">
        <i class="fa-solid fa-mobile-screen"></i> MobileZone
      </a>
      <ul class="nav-links">
        <li><a href="index.html">Home</a></li>
        <li><a href="products.html">Products</a></li>
        <li><a href="#">Brands</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <div class="nav-icons">
        <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
        <a href="cart.html"><i class="fa-solid fa-cart-shopping"></i><span class="cart-count">0</span></a>
        <a href="login.html"><i class="fa-solid fa-user"></i></a>
      </div>
    </div>
  </nav>


  <!-- HERO SLIDER -->
  <section class="hero-slider">

    <!-- Slider Track — all slides sit inside this row -->
    <div class="slider-track">

      <!-- Slide 1 - iPhone -->
      <div class="slide" style="background-color: #1a1a2e;">
        <div class="container slide-inner">
          <div class="slide-text">
            <p class="hero-tag">New Arrival</p>
            <h1>iPhone 15 Pro <span>Max</span></h1>
            <p class="hero-desc">Titanium design. A17 Pro chip. The most powerful iPhone ever.</p>
            <a href="products.html" class="btn btn-primary">Shop Now</a>
          </div>
          <div class="slide-image">
            <img src="https://images.unsplash.com/photo-1510557880182-3d4d3cba35a5?w=400&q=80" alt="iPhone 15 Pro"/>
          </div>
        </div>
      </div>

      <!-- Slide 2 - Samsung -->
      <div class="slide" style="background-color: #0f3460;">
        <div class="container slide-inner">
          <div class="slide-text">
            <p class="hero-tag">Just Launched</p>
            <h1>Samsung <span>Galaxy S24</span></h1>
            <p class="hero-desc">Galaxy AI is here. Redefine what a phone can do.</p>
            <a href="products.html" class="btn btn-primary">Shop Now</a>
          </div>
          <div class="slide-image">
            <img src="https://images.unsplash.com/photo-1581993192873-ca10a2900cb6?w=400&q=80" alt="Samsung S24"/>
          </div>
        </div>
      </div>

      <!-- Slide 3 - Xiaomi -->
      <div class="slide" style="background-color: #16213e;">
        <div class="container slide-inner">
          <div class="slide-text">
            <p class="hero-tag">Best Seller</p>
            <h1>Xiaomi 14 <span>Ultra</span></h1>
            <p class="hero-desc">Leica cameras. Snapdragon 8 Gen 3. Premium at its best.</p>
            <a href="products.html" class="btn btn-primary">Shop Now</a>
          </div>
          <div class="slide-image">
            <img src="https://images.unsplash.com/photo-1598327105666-5b89351aff97?w=400&q=80" alt="Xiaomi 14"/>
          </div>
        </div>
      </div>

    </div><!-- end slider-track -->

    <!-- Arrow Buttons -->
    <button class="slider-btn prev" onclick="changeSlide(-1)">&#10094;</button>
    <button class="slider-btn next" onclick="changeSlide(1)">&#10095;</button>

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

        <div class="product-card">
          <div class="product-img">
            <img src="https://images.unsplash.com/photo-1510557880182-3d4d3cba35a5?w=300&q=80" alt="iPhone 15"/>
            <span class="badge">New</span>
          </div>
          <div class="product-info">
            <p class="product-brand">Apple</p>
            <h3 class="product-name">iPhone 15 Pro</h3>
            <p class="product-price">$999</p>
            <button class="btn btn-primary btn-small">Add to Cart</button>
          </div>
        </div>

        <div class="product-card">
          <div class="product-img">
            <img src="https://images.unsplash.com/photo-1581993192873-ca10a2900cb6?w=300&q=80" alt="Samsung S24"/>
            <span class="badge badge-sale">Sale</span>
          </div>
          <div class="product-info">
            <p class="product-brand">Samsung</p>
            <h3 class="product-name">Galaxy S24 Ultra</h3>
            <p class="product-price">$849 <span class="old-price">$999</span></p>
            <button class="btn btn-primary btn-small">Add to Cart</button>
          </div>
        </div>

        <div class="product-card">
          <div class="product-img">
            <img src="https://images.unsplash.com/photo-1598327105666-5b89351aff97?w=300&q=80" alt="Xiaomi 14"/>
          </div>
          <div class="product-info">
            <p class="product-brand">Xiaomi</p>
            <h3 class="product-name">Xiaomi 14 Ultra</h3>
            <p class="product-price">$699</p>
            <button class="btn btn-primary btn-small">Add to Cart</button>
          </div>
        </div>

        <div class="product-card">
          <div class="product-img">
            <img src="https://images.unsplash.com/photo-1592899677977-9c10ca588bbd?w=300&q=80" alt="OnePlus 12"/>
            <span class="badge">Hot</span>
          </div>
          <div class="product-info">
            <p class="product-brand">OnePlus</p>
            <h3 class="product-name">OnePlus 12</h3>
            <p class="product-price">$599</p>
            <button class="btn btn-primary btn-small">Add to Cart</button>
          </div>
        </div>

      </div>
      <div class="center-btn">
        <a href="products.html" class="btn btn-outline">View All Products</a>
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
  <footer class="footer">
    <div class="container footer-inner">
      <div class="footer-col">
        <h3><i class="fa-solid fa-mobile-screen"></i> MobileZone</h3>
        <p>Your trusted online store for the latest smartphones at the best prices.</p>
      </div>
      <div class="footer-col">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="products.html">Products</a></li>
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

  <script src="script.js"></script>
</body>
</html>