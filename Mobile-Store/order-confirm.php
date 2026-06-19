<?php

require_once "../includes/conn.php";

$id = $_GET['id'];

$sql = "SELECT * FROM orders where id = '$id'";

$result = mysqli_query($conn, $sql);

if($result){
    $row = mysqli_fetch_assoc($result);
} else{
    echo "failed";
}

$product_id = $row['product_id'];

$sql1 = "SELECT * FROM mobiles where ID = '$product_id'";

$result1 = mysqli_query($conn, $sql1);

if($result1){
    $row1 = mysqli_fetch_assoc($result1);
} else{
    echo "failed";
}






?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Order Confirmed - MobileZone</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="order.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<style>
        /* ========================
    ORDER PAGE LAYOUT
    ======================== */
    .order-layout {
    display: grid;
    grid-template-columns: 1.4fr 1fr;
    gap: 30px;
    align-items: flex-start;
    }

    /* ========================
    ORDER FORM BOX
    ======================== */
    .order-form-box {
    background: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    padding: 28px;
    }

    .order-form-box h3 {
    font-size: 17px;
    font-weight: 700;
    color: #1a1a2e;
    margin-bottom: 20px;
    }

    .form-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
    margin-bottom: 16px;
    }

    .form-group label {
    font-size: 13px;
    font-weight: 600;
    color: #1a1a2e;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
    padding: 10px 14px;
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    font-size: 13px;
    font-family: 'Poppins', sans-serif;
    color: #333;
    outline: none;
    transition: border-color 0.2s;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
    border-color: #f5a623;
    }

    .form-group textarea {
    resize: vertical;
    }

    .btn-order {
    width: 100%;
    padding: 13px;
    font-size: 15px;
    font-weight: 600;
    margin-top: 6px;
    }

    /* ========================
    ORDER SUMMARY BOX
    ======================== */
    .order-summary {
    background: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    padding: 28px;
    position: sticky;
    top: 80px;
    }

    .order-summary h3 {
    font-size: 17px;
    font-weight: 700;
    color: #1a1a2e;
    margin-bottom: 20px;
    }

    .summary-product {
    display: flex;
    gap: 14px;
    align-items: center;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid #e0e0e0;
    }

    .summary-product img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #e0e0e0;
    }

    .summary-info h4 {
    font-size: 14px;
    font-weight: 600;
    color: #1a1a2e;
    margin-bottom: 4px;
    }

    .summary-brand {
    font-size: 12px;
    color: #777;
    margin-bottom: 6px;
    }

    .summary-price {
    font-size: 16px;
    font-weight: 700;
    color: #f5a623;
    }

    .summary-row {
    display: flex;
    justify-content: space-between;
    font-size: 13px;
    color: #555;
    padding: 8px 0;
    border-bottom: 1px solid #f0f0f0;
    }

    .summary-row.total {
    font-size: 15px;
    font-weight: 700;
    color: #1a1a2e;
    border-bottom: none;
    margin-top: 6px;
    }

    /* ========================
    CONFIRMATION PAGE
    ======================== */
    .confirm-box {
    max-width: 520px;
    margin: 0 auto;
    background: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 12px;
    padding: 40px;
    text-align: center;
    }

    .confirm-icon {
    font-size: 64px;
    color: #34a853;
    margin-bottom: 16px;
    }

    .confirm-box h2 {
    font-size: 24px;
    font-weight: 700;
    color: #1a1a2e;
    margin-bottom: 8px;
    }

    .confirm-msg {
    font-size: 13px;
    color: #777;
    margin-bottom: 28px;
    }

    .confirm-details {
    background: #f9f9f9;
    border-radius: 8px;
    padding: 16px 20px;
    margin-bottom: 24px;
    text-align: left;
    }

    .confirm-row {
    display: flex;
    justify-content: space-between;
    font-size: 13px;
    color: #555;
    padding: 8px 0;
    border-bottom: 1px solid #e0e0e0;
    }

    .confirm-row:last-child {
    border-bottom: none;
    }

    .confirm-row.total {
    font-size: 15px;
    font-weight: 700;
    color: #1a1a2e;
    margin-top: 4px;
    }

    .confirm-btns {
    display: flex;
    gap: 12px;
    justify-content: center;
    }

    /* ========================
    RESPONSIVE
    ======================== */
    @media (max-width: 768px) {
    .order-layout {
        grid-template-columns: 1fr;
    }
    .order-summary {
        position: static;
    }
    }

    @media (max-width: 600px) {
    .confirm-box {
        padding: 24px 16px;
    }
    .confirm-btns {
        flex-direction: column;
    }
    .confirm-btns .btn {
        width: 100%;
        text-align: center;
    }
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
        <a href="register.php"><i class="fa-solid fa-user"></i></a>
      </div>
    </div>
  </nav>

  <!-- CONFIRMATION BOX -->
  <section class="section">
    <div class="container">
      <div class="confirm-box">

        <!-- Green check icon -->
        <div class="confirm-icon">
          <i class="fa-solid fa-circle-check"></i>
        </div>

        <h2>Order Confirmed!</h2>
        <p class="confirm-msg">Thank you for your order. We will contact you shortly to confirm delivery.</p>

        <!-- Order Details -->
        <div class="confirm-details">

          <div class="confirm-row">
            <span>Order ID</span>
            <!-- PHP: echo $order_id -->
            <span><?php echo "#". $row['id'];   ?></span>
          </div>

          <div class="confirm-row">
            <span>Product</span>
            <!-- PHP: echo $product_name -->
            <span><?php echo $row1['Model']; ?> </span>
          </div>

          <div class="confirm-row">
            <span>Customer</span>
            <!-- PHP: echo $_POST['name'] -->
            <span><?php echo $row['name']; ?> </span>
          </div>

          <div class="confirm-row">
            <span>Phone</span>
            <!-- PHP: echo $_POST['phone'] -->
            <span><?php echo $row['phone']; ?> </span>
          </div>

          <div class="confirm-row">
            <span>City</span>
            <!-- PHP: echo $_POST['city'] -->
            <span><?php echo $row['city']; ?> </span>
          </div>

          <div class="confirm-row total">
            <span>Total Amount</span>
            <!-- PHP: echo $product_price -->
            <span><?php echo $row1['Price']. "/="; ?> </span>
          </div>

        </div>

        <!-- Buttons -->
        <div class="confirm-btns">
          <a href="shop.php" class="btn btn-primary">Continue Shopping</a>
          <a href="index.php" class="btn btn-outline">Back to Home</a>
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
          <li><a href="index.php">Home</a></li>
          <li><a href="shop.php">Products</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Contact</h4>
        <p><i class="fa-solid fa-envelope"></i> info@mobilezone.com</p>
        <p><i class="fa-solid fa-phone"></i> +92 300 1234567</p>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2024 MobileZone. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>