<?php

require_once "../includes/conn.php";

$id = $_GET['id'];

$stmt = mysqli_prepare($conn,"SELECT * FROM mobiles where ID = ? ");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
if(mysqli_num_rows($result)>0){
   $row = mysqli_fetch_assoc($result);
}

$upload = "../uploads/";
?>

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
      padding: 12px 0;
    }

    .page-header p {
      color: #aaa;
      font-size: 12px;
    }

    .page-header p a {
      color: #f5a623;
      text-decoration: none;
    }

    /* ---- DETAIL LAYOUT ---- */
    .detail-layout {
      display: grid;
      grid-template-columns: 1fr 1.2fr;
      gap: 28px;
      align-items: flex-start;
    }

    /* ---- LEFT COLUMN (image + description) ---- */
    .detail-left {
      position: sticky;
      top: 70px;
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    /* ---- IMAGE BOX ---- */
    .detail-image-box {
      background: #f9f9f9;
      border: 1px solid #e0e0e0;
      border-radius: 10px;
      overflow: hidden;
    }

    .detail-image-box img {
      width: 100%;
      height: 260px;
      object-fit: contain;
      padding: 14px;
    }

    /* ---- DESCRIPTION (below image) ---- */
    .detail-desc {
      font-size: 12.5px;
      color: #666;
      line-height: 1.6;
      background: #f9f9f9;
      border: 1px solid #e0e0e0;
      border-radius: 10px;
      padding: 12px 14px;
    }

    /* ---- DETAIL INFO (right column) ---- */
    .detail-info {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .detail-brand {
      font-size: 22px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1.2px;
      color: #f5a623;
    }

    .detail-name {
      font-size: 16px;
      font-weight: 700;
      color: #1a1a2e;
      line-height: 1.2;
      padding-bottom: 10px;
      border-bottom: 1px solid #e0e0e0;
    }

    .price-box {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: #fff8ee;
      border: 1px solid #f0d9ad;
      border-left: 4px solid #f5a623;
      border-radius: 10px;
      padding: 8px 10px;
    }

    .price-label {
      font-size: 12px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: #b98a2e;
    }

    .detail-price {
      font-size: 14px;
      font-weight: 700;
      color: #1a1a2e;
    }

    /* ---- SPECS GRID ---- */
    .specs-title {
      font-size: 13px;
      font-weight: 700;
      color: #1a1a2e;
    }

    .specs-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 8px;
    }

    .spec-card {
      background: #f9f9f9;
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      padding: 9px 12px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .spec-card i {
      font-size: 14px;
      color: #f5a623;
      width: 16px;
      text-align: center;
      flex-shrink: 0;
    }

    .spec-label {
      font-size: 10px;
      color: #999;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 1px;
    }

    .spec-value {
      font-size: 12px;
      font-weight: 600;
      color: #1a1a2e;
    }

    /* ---- ORDER BUTTON ---- */
    .detail-actions {
      display: flex;
      gap: 10px;
      padding-top: 2px;
    }

    .btn-order-now {
      flex: 1;
      padding: 10px;
      background-color: #f5a623;
      color: #ffffff;
      border: none;
      border-radius: 8px;
      font-size: 13px;
      font-weight: 600;
      font-family: 'Poppins', sans-serif;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
      transition: opacity 0.2s;
    }

    .btn-order-now:hover {
      opacity: 0.88;
    }

    .btn-back {
      padding: 10px 16px;
      background-color: transparent;
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      font-size: 12.5px;
      font-weight: 500;
      color: #777;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 6px;
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

      .detail-left {
        position: static;
      }

      .detail-image-box img {
        height: 220px;
      }

      .detail-name {
        font-size: 18px;
      }

      .detail-price {
        font-size: 18px;
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
        <?php echo $row['Model'] ?>
      </p>
    </div>
  </div>

  <!-- DETAIL SECTION -->
  <section class="section">
    <div class="container">
      <div class="detail-layout">

        <!-- LEFT: Product Image + Description -->
        <div class="detail-left">

          <div class="detail-image-box">
            <img
              src=" <?php echo $upload . $row['Image']; ?>"
              alt=" <?php echo $row['Model']; ?>"
            />
          </div>

          <!-- Description -->
          <p class="detail-desc">
            <?php echo $row['Description']; ?>
          </p>

        </div>

        <!-- RIGHT: Product Info -->
        <div class="detail-info">

          <!-- Brand -->
          <p class="detail-brand">
           <?php echo $row['Brand']; ?>
          </p>

          <!-- Name -->
          <h1 class="detail-name">
              <?php echo $row['Model']; ?>
          </h1>

          <!-- Specs -->
          <p class="specs-title">Specifications</p>

          <div class="specs-grid">

            <div class="spec-card">
              <i class="fa-solid fa-memory"></i>
              <div>
                <p class="spec-label">RAM</p>
                <p class="spec-value">   <?php echo $row['RAM']; ?></p>
              </div>
            </div>

            <div class="spec-card">
              <i class="fa-solid fa-hard-drive"></i>
              <div>
                <p class="spec-label">Storage</p>
                <p class="spec-value">   <?php echo $row['ROM']; ?></p>
              </div>
            </div>

            <div class="spec-card">
              <i class="fa-solid fa-battery-full"></i>
              <div>
                <p class="spec-label">Battery</p>
                <p class="spec-value">   <?php echo $row['Battery']; ?></p>
              </div>
            </div>

            <div class="spec-card">
              <i class="fa-solid fa-camera"></i>
              <div>
                <p class="spec-label">Camera</p>
                <p class="spec-value">   <?php echo $row['Camera']; ?></p>
              </div>
            </div>

            <div class="spec-card">
              <i class="fa-solid fa-tv"></i>
              <div>
                <p class="spec-label">Display</p>
                <p class="spec-value">   <?php echo $row['Display']; ?></p>
              </div>
            </div>

            <div class="spec-card">
              <i class="fa-brands fa-android"></i>
              <div>
                <p class="spec-label">OS</p>
                <p class="spec-value">   <?php echo $row['OS']; ?></p>
              </div>
            </div>

          </div>

          <!-- Price -->
          <div class="price-box">
            <span class="price-label">Price</span>
            <span class="detail-price"><?php echo "Rs. ". $row['Price'] . " /="; ?></span>
          </div>

          <!-- Action Buttons -->
          <div class="detail-actions">
            <a href="order.php?id=<?php echo $row['ID']; ?>" class="btn-order-now">
              <i class="fa-solid fa-bag-shopping"></i> Order Now
            </a>
            <a href="shop.php" class="btn-back">
              <i class="fa-solid fa-arrow-left"></i> Back
            </a>
          </div>

        </div>

      </div>
    </div>
  </section>

  <?php include "../includes/footer.php"; ?>

</body>
</html>