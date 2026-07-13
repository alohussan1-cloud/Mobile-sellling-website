<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Product Detail - MobileZone</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <style>

    /* ---- PAGE HEADER ---- */
    .page-header {
      background-color: #1a1a2e;
      padding: 20px 0;
    }

    .page-header p {
      color: #aaa;
      font-size: 13px;
    }

    .page-header p a {
      color: #f5a623;
      text-decoration: none;
    }

    /* ---- DETAIL LAYOUT ---- */
    .detail-layout {
      display: grid;
      grid-template-columns: 1fr 1.2fr;
      gap: 40px;
      align-items: flex-start;
    }

    /* ---- IMAGE BOX ---- */
    .detail-image-box {
      background: #f9f9f9;
      border: 1px solid #e0e0e0;
      border-radius: 12px;
      overflow: hidden;
      position: sticky;
      top: 80px;
    }

    .detail-image-box img {
      width: 100%;
      height: 400px;
      object-fit: contain;
      padding: 20px;
    }

    /* ---- DETAIL INFO ---- */
    .detail-info {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .detail-brand {
      font-size: 12px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      color: #f5a623;
    }

    .detail-name {
      font-size: 28px;
      font-weight: 700;
      color: #1a1a2e;
      line-height: 1.2;
    }

    .detail-price {
      font-size: 26px;
      font-weight: 700;
      color: #f5a623;
    }

    .detail-desc {
      font-size: 14px;
      color: #666;
      line-height: 1.8;
      padding-bottom: 16px;
      border-bottom: 1px solid #e0e0e0;
    }

    /* ---- SPECS GRID ---- */
    .specs-title {
      font-size: 16px;
      font-weight: 700;
      color: #1a1a2e;
    }

    .specs-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 12px;
    }

    .spec-card {
      background: #f9f9f9;
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      padding: 14px 16px;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .spec-card i {
      font-size: 18px;
      color: #f5a623;
      width: 20px;
      text-align: center;
      flex-shrink: 0;
    }

    .spec-label {
      font-size: 11px;
      color: #999;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 2px;
    }

    .spec-value {
      font-size: 13px;
      font-weight: 600;
      color: #1a1a2e;
    }

    /* ---- ORDER BUTTON ---- */
    .detail-actions {
      display: flex;
      gap: 12px;
      padding-top: 4px;
    }

    .btn-order-now {
      flex: 1;
      padding: 13px;
      background-color: #f5a623;
      color: #ffffff;
      border: none;
      border-radius: 8px;
      font-size: 15px;
      font-weight: 600;
      font-family: 'Poppins', sans-serif;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      transition: opacity 0.2s;
    }

    .btn-order-now:hover {
      opacity: 0.88;
    }

    .btn-back {
      padding: 13px 20px;
      background-color: transparent;
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 500;
      color: #777;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 8px;
      transition: border-color 0.2s, color 0.2s;
    }

    .btn-back:hover {
      border-color: #1a1a2e;
      color: #1a1a2e;
    }

    /* ---- RESPONSIVE ---- */
    @media (max-width: 768px) {
      .detail-layout {
        grid-template-columns: 1fr;
        gap: 24px;
      }

      .detail-image-box {
        position: static;
      }

      .detail-image-box img {
        height: 280px;
      }

      .detail-name {
        font-size: 22px;
      }

      .detail-price {
        font-size: 22px;
      }
    }

    @media (max-width: 500px) {
      .specs-grid {
        grid-template-columns: 1fr;
      }

      .detail-actions {
        flex-direction: column;
      }
    }

  </style>
</head>
<body>

  <?php $page = 'shop.php'; include "../includes/navbar.php"; ?>

  <!-- PAGE HEADER -->
  <div class="page-header">
    <div class="container">
      <p>
        <a href="index.php">Home</a> &rsaquo;
        <a href="shop.php">Products</a> &rsaquo;
        <!-- PHP: echo $product['Model'] -->
        Galaxy S24 Ultra
      </p>
    </div>
  </div>

  <!-- DETAIL SECTION -->
  <section class="section">
    <div class="container">
      <div class="detail-layout">

        <!-- LEFT: Product Image -->
        <div class="detail-image-box">
          <!--
            PHP: src="uploads/<?php echo $product['Image']; ?>"
          -->
          <img
            src="https://images.unsplash.com/photo-1581993192873-ca10a2900cb6?w=600&q=80"
            alt="Galaxy S24 Ultra"
          />
        </div>

        <!-- RIGHT: Product Info -->
        <div class="detail-info">

          <!-- Brand -->
          <p class="detail-brand">
            <!-- PHP: echo $product['Brand'] -->
            Samsung
          </p>

          <!-- Name -->
          <h1 class="detail-name">
            <!-- PHP: echo $product['Model'] -->
            Galaxy S24 Ultra
          </h1>

          <!-- Price -->
          <p class="detail-price">
            <!-- PHP: echo '$' . $product['Price'] -->
            $849
          </p>

          <!-- Description -->
          <p class="detail-desc">
            <!-- PHP: echo $product['Description'] -->
            The Galaxy S24 Ultra redefines what a smartphone can do. Featuring
            Galaxy AI, a built-in S Pen, and a stunning 6.8-inch display,
            it combines power and elegance in one device.
          </p>

          <!-- Specs -->
          <p class="specs-title">Specifications</p>

          <div class="specs-grid">

            <div class="spec-card">
              <i class="fa-solid fa-memory"></i>
              <div>
                <p class="spec-label">RAM</p>
                <!-- PHP: echo $product['RAM'] -->
                <p class="spec-value">12GB</p>
              </div>
            </div>

            <div class="spec-card">
              <i class="fa-solid fa-hard-drive"></i>
              <div>
                <p class="spec-label">Storage</p>
                <!-- PHP: echo $product['ROM'] -->
                <p class="spec-value">256GB</p>
              </div>
            </div>

            <div class="spec-card">
              <i class="fa-solid fa-battery-full"></i>
              <div>
                <p class="spec-label">Battery</p>
                <!-- PHP: echo $product['Battery'] -->
                <p class="spec-value">5000 mAh</p>
              </div>
            </div>

            <div class="spec-card">
              <i class="fa-solid fa-camera"></i>
              <div>
                <p class="spec-label">Camera</p>
                <!-- PHP: echo $product['Camera'] -->
                <p class="spec-value">200 MP</p>
              </div>
            </div>

            <div class="spec-card">
              <i class="fa-solid fa-tv"></i>
              <div>
                <p class="spec-label">Display</p>
                <!-- PHP: echo $product['Display'] -->
                <p class="spec-value">6.8" AMOLED</p>
              </div>
            </div>

            <div class="spec-card">
              <i class="fa-brands fa-android"></i>
              <div>
                <p class="spec-label">OS</p>
                <!-- PHP: echo $product['OS'] -->
                <p class="spec-value">Android 14</p>
              </div>
            </div>

          </div>

          <!-- Action Buttons -->
          <div class="detail-actions">
            <a href="order.php?id=<?php echo $product['ID']; ?>" class="btn-order-now">
              <i class="fa-solid fa-bag-shopping"></i> Order Now
            </a>
            <a href="shop.php" class="btn-back">
              <i class="fa-solid fa-arrow-left"></i> Back
            </a>
          </div>

        </div>
        <!-- end detail-info -->

      </div>
    </div>
  </section>

  <?php include "../includes/footer.php"; ?>

  <!-- <script src="main.js"></script> -->
</body>
</html>