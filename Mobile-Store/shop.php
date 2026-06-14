<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Shop - MobileZone</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<style>
        /* ========================
    GLOBAL RESET & BASE
    ======================== */
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }

    body {
    font-family: 'Poppins', sans-serif;
    color: #333;
    background-color: #fff;
    }

    a {
    text-decoration: none;
    color: inherit;
    }

    ul {
    list-style: none;
    }

    img {
    width: 100%;
    display: block;
    }

    /* ========================
    CSS VARIABLES
    ======================== */
    :root {
    --primary: #1a1a2e;
    --accent: #f5a623;
    --light-bg: #f9f9f9;
    --border: #e0e0e0;
    --text-muted: #777;
    --white: #ffffff;
    }

    /* ========================
    CONTAINER
    ======================== */
    .container {
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 20px;
    }

    /* ========================
    BUTTONS
    ======================== */
    .btn {
    display: inline-block;
    padding: 10px 22px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    border: none;
    transition: opacity 0.2s;
    }

    .btn:hover {
    opacity: 0.85;
    }

    .btn-primary {
    background-color: var(--accent);
    color: var(--white);
    }

    .btn-outline {
    background-color: transparent;
    border: 2px solid #aaa;
    color: #aaa;
    }

    .btn-white {
    background-color: var(--white);
    color: var(--primary);
    font-weight: 600;
    }

    .btn-small {
    padding: 7px 14px;
    font-size: 13px;
    width: 100%;
    margin-top: 10px;
    }

    /* ========================
    SECTION COMMON
    ======================== */
    .section {
    padding: 60px 0;
    }

    .section-title {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 30px;
    color: var(--primary);
    text-align: center;
    }

    .center-btn {
    text-align: center;
    margin-top: 30px;
    }

    /* ========================
    NAVBAR
    ======================== */
    .navbar {
    background-color: var(--primary);
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
    color: var(--white);
    font-size: 20px;
    font-weight: 700;
    }

    .logo i {
    color: var(--accent);
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
    color: var(--accent);
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
    color: var(--accent);
    }

    .cart-count {
    background-color: var(--accent);
    color: white;
    font-size: 10px;
    border-radius: 50%;
    padding: 1px 5px;
    position: absolute;
    top: -6px;
    right: -8px;
    }

    /* ========================
    HERO SLIDER
    ======================== */
    .hero-slider {
    position: relative;
    overflow: hidden;
    }

    /* Track holds all slides in a single row */
    .slider-track {
    display: flex;
    transition: transform 0.5s ease-in-out;
    }

    /* Each slide takes full width */
    .slide {
    min-width: 100%;
    padding: 60px 0;
    }

    .slide-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 40px;
    }

    .slide-text {
    flex: 1;
    color: var(--white);
    }

    .hero-tag {
    color: var(--accent);
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    margin-bottom: 10px;
    }

    .slide-text h1 {
    font-size: 40px;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 14px;
    }

    .slide-text h1 span {
    color: var(--accent);
    }

    .hero-desc {
    color: #aaa;
    font-size: 15px;
    margin-bottom: 24px;
    }

    .slide-text .btn {
    margin-right: 10px;
    }

    .slide-image {
    flex: 1;
    max-width: 380px;
    }

    .slide-image img {
    border-radius: 12px;
    height: 300px;
    object-fit: contain;
    }

    /* Prev / Next Buttons */
    .slider-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(255,255,255,0.15);
    color: white;
    border: none;
    font-size: 20px;
    padding: 10px 14px;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.2s;
    z-index: 10;
    }

    .slider-btn:hover {
    background-color: rgba(255,255,255,0.3);
    }

    .prev { left: 12px; }
    .next { right: 12px; }

    /* Dot Indicators */
    .slider-dots {
    text-align: center;
    padding: 12px 0 20px;
    background-color: var(--primary);
    }

    .dot {
    display: inline-block;
    width: 10px;
    height: 10px;
    margin: 0 4px;
    background-color: rgba(255,255,255,0.3);
    border-radius: 50%;
    cursor: pointer;
    transition: background-color 0.2s;
    }

    .dot.active {
    background-color: var(--accent);
    }

    /* ========================
    CATEGORIES
    ======================== */
    .categories {
    background-color: var(--light-bg);
    }

    .category-grid {
    display: flex;
    gap: 16px;
    justify-content: center;
    flex-wrap: wrap;
    }

    .category-card {
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 10px;
    padding: 24px 30px;
    text-align: center;
    width: 140px;
    transition: border-color 0.2s, box-shadow 0.2s;
    }

    .category-card:hover {
    border-color: var(--accent);
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }

    .category-card i {
    font-size: 30px;
    color: var(--primary);
    margin-bottom: 10px;
    }

    .category-card p {
    font-size: 13px;
    font-weight: 500;
    color: #444;
    }

    /* ========================
    PRODUCT CARDS
    ======================== */
    .product-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    }

    .product-card {
    border: 1px solid var(--border);
    border-radius: 10px;
    overflow: hidden;
    background: var(--white);
    transition: box-shadow 0.2s;
    }

    .product-card:hover {
    box-shadow: 0 4px 16px rgba(0,0,0,0.1);
    }

    .product-img {
    position: relative;
    height: 200px;
    overflow: hidden;
    background: var(--light-bg);
    }

    .product-img img {
    height: 100%;
    object-fit: cover;
    }

    .badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background-color: var(--primary);
    color: var(--white);
    font-size: 11px;
    padding: 3px 8px;
    border-radius: 4px;
    }

    .badge-sale {
    background-color: red;
    }

    .product-info {
    padding: 14px;
    }

    .product-brand {
    font-size: 11px;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 4px;
    }

    .product-name {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 6px;
    color: var(--primary);
    }

    .product-price {
    font-size: 16px;
    font-weight: 700;
    color: var(--accent);
    }

    .old-price {
    font-size: 13px;
    color: var(--text-muted);
    text-decoration: line-through;
    font-weight: 400;
    margin-left: 4px;
    }

    /* ========================
    PROMO BANNER
    ======================== */
    .promo-banner {
    background-color: var(--accent);
    padding: 40px 0;
    }

    .promo-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    }

    .promo-inner h2 {
    font-size: 22px;
    color: var(--white);
    font-weight: 700;
    }

    .promo-inner p {
    color: rgba(255,255,255,0.85);
    font-size: 14px;
    margin-top: 4px;
    }

    /* ========================
    FEATURES / WHY US
    ======================== */
    .features {
    background-color: var(--light-bg);
    }

    .features-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    }

    .feature-card {
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 10px;
    padding: 24px;
    text-align: center;
    }

    .feature-card i {
    font-size: 28px;
    color: var(--accent);
    margin-bottom: 12px;
    }

    .feature-card h4 {
    font-size: 15px;
    font-weight: 600;
    margin-bottom: 8px;
    color: var(--primary);
    }

    .feature-card p {
    font-size: 13px;
    color: var(--text-muted);
    line-height: 1.5;
    }

    /* ========================
    FOOTER
    ======================== */
    .footer {
    background-color: var(--primary);
    color: #ccc;
    padding: 50px 0 0;
    }

    .footer-inner {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1.5fr;
    gap: 30px;
    padding-bottom: 40px;
    }

    .footer-col h3 {
    color: var(--white);
    font-size: 18px;
    margin-bottom: 12px;
    }

    .footer-col h3 i {
    color: var(--accent);
    }

    .footer-col h4 {
    color: var(--white);
    font-size: 15px;
    margin-bottom: 12px;
    }

    .footer-col p {
    font-size: 13px;
    line-height: 1.8;
    }

    .footer-col ul li {
    margin-bottom: 8px;
    }

    .footer-col ul a {
    font-size: 13px;
    color: #aaa;
    transition: color 0.2s;
    }

    .footer-col ul a:hover {
    color: var(--accent);
    }

    .footer-col p i {
    color: var(--accent);
    margin-right: 6px;
    }

    .social-icons {
    display: flex;
    gap: 12px;
    margin-top: 14px;
    }

    .social-icons a {
    color: #aaa;
    font-size: 18px;
    transition: color 0.2s;
    }

    .social-icons a:hover {
    color: var(--accent);
    }

    .footer-bottom {
    border-top: 1px solid #2a2a4a;
    text-align: center;
    padding: 16px;
    font-size: 13px;
    color: #666;
    }

    /* ========================
    RESPONSIVE - TABLET
    ======================== */
    @media (max-width: 900px) {
    .product-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .features-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .footer-inner {
        grid-template-columns: repeat(2, 1fr);
    }
    .slide-inner {
        flex-direction: column;
        text-align: center;
    }
    .slide-image {
        max-width: 100%;
    }
    }

    /* ========================
    RESPONSIVE - MOBILE
    ======================== */
    @media (max-width: 600px) {
    .nav-links {
        display: none;
    }

    /* Slider on mobile */
    .slide {
        padding: 30px 0;
    }
    .slide-text h1 {
        font-size: 22px;
    }
    .hero-desc {
        font-size: 13px;
    }
    .slide-image {
        max-width: 220px;
        margin: 0 auto;
    }
    .slide-image img {
        height: 180px;
    }
    .slider-btn {
        font-size: 14px;
        padding: 7px 10px;
    }

    /* Products - 2 per row */
    .product-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
    }
    .product-img {
        height: 140px;
    }
    .product-name {
        font-size: 12px;
    }
    .product-price {
        font-size: 14px;
    }

    /* Why Choose Us - 2 per row */
    .features-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
    }
    .feature-card {
        padding: 16px 12px;
    }
    .feature-card h4 {
        font-size: 13px;
    }
    .feature-card p {
        font-size: 11px;
    }

    /* Footer - single column */
    .footer-inner {
        grid-template-columns: 1fr;
    }

    .promo-inner {
        flex-direction: column;
        text-align: center;
    }

    .category-grid {
        gap: 10px;
    }
    .category-card {
        width: 90px;
        padding: 14px 10px;
    }
    .category-card i {
        font-size: 22px;
    }
    }


    /* ========================
    PAGE HEADER
    ======================== */
    .page-header {
    background-color: #1a1a2e;
    padding: 24px 0;
    }

    .page-header h1 {
    color: #ffffff;
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 4px;
    }

    .page-header p {
    color: #aaa;
    font-size: 13px;
    }

    /* ========================
    SHOP LAYOUT
    Sidebar + Products side by side
    ======================== */



    .shop-products {
    flex: 1;
    }

    /* ========================
    RESPONSIVE - SHOP
    ======================== */
    @media (max-width: 768px) {
    
    .filter-sidebar {
        width: 100%;
    }
    }

    @media (max-width: 600px) {
    
    
    }
</style>
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


  <!-- SHOP SECTION -->
  <section class="section">
    <div class="container">


      <!-- PRODUCTS GRID -->
      

        <div class="product-grid">

      

    </div>
    <!-- end shop-layout -->
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