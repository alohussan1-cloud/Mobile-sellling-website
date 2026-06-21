<?php

require_once "../includes/conn.php";

$brand = $_GET['brand'];

$stmt = mysqli_prepare($conn, "SELECT * FROM mobiles WHERE Brand = ?");
if(!$stmt){
     die(mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt, 's', $brand);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$upload = "../uploads/";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?php echo htmlspecialchars($brand); ?> Phones - MobileZone</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<style>
        /* ========================
    RESET
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
    background-color: #f5a623;
    color: #ffffff;
    }

    .btn-outline {
    background-color: transparent;
    border: 2px solid #aaa;
    color: #aaa;
    }

    .btn-white {
    background-color: #ffffff;
    color: #1a1a2e;
    font-weight: 600;
    }

    .btn-small {
    padding: 7px 14px;
    font-size: 13px;
    width: 100%;
    margin-top: 10px;
    }

    /* ========================
    SECTIONS
    ======================== */
    .section {
    padding: 60px 0;
    }

    .section-title {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 30px;
    color: #1a1a2e;
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

    /* ========================
    HERO SLIDER
    ======================== */
    .hero-slider {
    position: relative;
    overflow: hidden;
    }

    .slider-track {
    display: flex;
    transition: transform 0.5s ease-in-out;
    }

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
    color: #ffffff;
    }

    .hero-tag {
    color: #f5a623;
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
    color: #f5a623;
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

    .slider-dots {
    text-align: center;
    padding: 12px 0 20px;
    background-color: #1a1a2e;
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
    background-color: #f5a623;
    }

    /* ========================
    CATEGORIES
    ======================== */
    .categories {
    background-color: #f9f9f9;
    }

    .category-grid {
    display: flex;
    gap: 16px;
    justify-content: center;
    flex-wrap: wrap;
    }

    .category-card {
    background: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    padding: 24px 30px;
    text-align: center;
    width: 140px;
    transition: border-color 0.2s, box-shadow 0.2s;
    }

    .category-card:hover {
    border-color: #f5a623;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }

    .category-card i {
    font-size: 30px;
    color: #1a1a2e;
    margin-bottom: 10px;
    }

    .category-card p {
    font-size: 13px;
    font-weight: 500;
    color: #444;
    }

    /* ========================
    PRODUCT GRID & CARDS
    ======================== */
    .product-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    }

    .product-card {
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    overflow: hidden;
    background: #ffffff;
    transition: box-shadow 0.2s;
    }

    .product-card:hover {
    box-shadow: 0 4px 16px rgba(0,0,0,0.1);
    }

    .product-img {
    position: relative;
    height: 180px;
    overflow: hidden;
    background: #f9f9f9;
    }

    .product-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    }

    .badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background-color: #1a1a2e;
    color: #ffffff;
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
    color: #777;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 4px;
    }

    .product-name {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 6px;
    color: #1a1a2e;
    }

    .product-price {
    font-size: 16px;
    font-weight: 700;
    color: #f5a623;
    }

    .old-price {
    font-size: 13px;
    color: #777;
    text-decoration: line-through;
    font-weight: 400;
    margin-left: 4px;
    }

    /* ========================
    PROMO BANNER
    ======================== */
    .promo-banner {
    background-color: #f5a623;
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
    color: #ffffff;
    font-weight: 700;
    }

    .promo-inner p {
    color: rgba(255,255,255,0.85);
    font-size: 14px;
    margin-top: 4px;
    }

    /* ========================
    WHY CHOOSE US
    ======================== */
    .features {
    background-color: #f9f9f9;
    }

    .features-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    }

    .feature-card {
    background: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    padding: 24px;
    text-align: center;
    }

    .feature-card i {
    font-size: 28px;
    color: #f5a623;
    margin-bottom: 12px;
    }

    .feature-card h4 {
    font-size: 15px;
    font-weight: 600;
    margin-bottom: 8px;
    color: #1a1a2e;
    }

    .feature-card p {
    font-size: 13px;
    color: #777;
    line-height: 1.5;
    }

    /* ========================
    FOOTER
    ======================== */
    .footer {
    background-color: #1a1a2e;
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
    color: #ffffff;
    font-size: 18px;
    margin-bottom: 12px;
    }

    .footer-col h3 i {
    color: #f5a623;
    }

    .footer-col h4 {
    color: #ffffff;
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
    color: #f5a623;
    }

    .footer-col p i {
    color: #f5a623;
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
    color: #f5a623;
    }

    .footer-bottom {
    border-top: 1px solid #2a2a4a;
    text-align: center;
    padding: 16px;
    font-size: 13px;
    color: #666;
    }

    /* ========================
    PAGE HEADER (shop page)
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

    /* NO RESULTS (Brand page)*/
    .no-results {
    text-align: center;
    padding: 60px 20px;
    }

    .no-results i {
    font-size: 48px;
    color: #ccc;
    margin-bottom: 16px;
    }

    .no-results p {
    font-size: 14px;
    color: #777;
    margin-bottom: 20px;
    }
</style>
<body>

  <?php $page = 'brand.php'; include "../includes/navbar.php"; ?>

  <!-- PAGE HEADER -->
  <div class="page-header">
    <div class="container">
      <h1><?php echo htmlspecialchars($brand); ?> Phones</h1>
      <p>Home &rsaquo; Brands &rsaquo; <?php echo htmlspecialchars($brand); ?></p>
    </div>
  </div>

  <!-- PRODUCTS -->
  <section class="section">
    <div class="container">

      <?php if (mysqli_num_rows($result) > 0) { ?>

        <div class="product-grid">

          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <div class="product-card">
            <div class="product-img">
              <img src="<?php echo $upload . $row['Image']; ?>" alt="<?php echo htmlspecialchars($row['Model']); ?>"/>
            </div>
            <div class="product-info">
              <p class="product-brand"><?php echo htmlspecialchars($row['Brand']); ?></p>
              <h3 class="product-name"><?php echo htmlspecialchars($row['Model']); ?></h3>
              <p class="product-price">$<?php echo htmlspecialchars($row['Price']); ?></p>
              <a href="order.php?id=<?php echo $row['ID']; ?>" class="btn btn-primary btn-small">Shop Now</a>
            </div>
          </div>
          <?php } ?>

        </div>

      <?php } else { ?>

        <div class="no-results">
          <i class="fa-solid fa-mobile-screen"></i>
          <p>No phones found for "<?php echo htmlspecialchars($brand); ?>" right now.</p>
          <a href="shop.php" class="btn btn-primary">View All Products</a>
        </div>

      <?php } ?>

    </div>
  </section>

  <?php include "../includes/footer.php"; ?>

  <script src="main.js"></script>
</body>
</html>