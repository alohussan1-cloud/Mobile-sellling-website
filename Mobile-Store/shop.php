<?php

require_once "../includes/conn.php";

$sql = "SELECT * FROM mobiles order by ID desc ";
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
  <link rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>

  <!-- NAVBAR -->
   <?php include "../includes/navbar.php"; ?>


  <!-- PAGE HEADER -->
  <div class="page-header">
    <div class="container">
      <h1>All Products</h1>
      <p>Home &rsaquo; Products</p>
    </div>
  </div>

  <!-- CATEGORIES -->
  <section class="section categories" id="brands">
    <div class="container">
      <h2 class="section-title">Shop by Brand</h2>
      <div class="category-grid">
        <a href="../Mobile-Store/brand.php?brand=<?php echo "Apple" ?>" class="category-card">
          <i class="fa-brands fa-apple"></i>
          <p>Apple</p>
        </a>
        <a href="../Mobile-Store/brand.php?brand=<?php echo "Samsung" ?>" class="category-card">
          <i class="fa-solid fa-mobile-button"></i>
          <p>Samsung</p>
        </a>
        <a href="../Mobile-Store/brand.php?brand=<?php echo "Xiaomi" ?>"class="category-card">
          <i class="fa-solid fa-mobile-screen"></i>
          <p>Xiaomi</p>
        </a>
        <a href="../Mobile-Store/brand.php?brand=<?php echo "vivo" ?>" class="category-card">
          <i class="fa-solid fa-mobile"></i>
          <p>Vivo</p>
        </a>
        <a href="../Mobile-Store/brand.php?brand=<?php echo "Oppo" ?>" class="category-card">
          <i class="fa-solid fa-mobile-retro"></i>
          <p>Oppo</p>
        </a>
      </div>
    </div>
  </section>


  <!-- PRODUCTS -->
  <section class="section">
    <div class="container">
      <div class="product-grid">

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


  <?php include "../includes/footer.php"; ?>


</body>
</html>