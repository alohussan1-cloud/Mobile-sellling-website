<?php

require_once "../includes/conn.php";

$id = $_GET['id'];

$sql = "SELECT * FROM mobiles where ID = '$id'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$upload = "../uploads/";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $phoneNum = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];

    $sql = "INSERT INTO orders(product_id, name, phone, city, address) Values(
            '$id', '$name', '$phoneNum', '$city', '$address' )";
    
    $run = mysqli_query($conn, $sql);
    if($run){
        $orderID= mysqli_insert_id($conn);
        header('location: ../Mobile-Store/order-confirm.php?id='. $orderID);
    }else{
        echo "failed";
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Place Order - MobileZone</title>
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
        <a href="login.php"><i class="fa-solid fa-user"></i></a>
      </div>
    </div>
  </nav>


  <!-- PAGE HEADER -->
  <div class="page-header">
    <div class="container">
      <h1>Place Order</h1>
      <p>Home &rsaquo; Order</p>
    </div>
  </div>


  <!-- ORDER SECTION -->
  <section class="section">
    <div class="container order-layout">

      <!-- LEFT: Order Form -->
      <div class="order-form-box">
        <h3>Your Information</h3>

        <!-- PHP: action="place-order.php" -->
        <form  method="POST">

          <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" placeholder="Enter your full name" required />
          </div>

          <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone" placeholder="e.g. 0300-1234567" required />
          </div>

          <div class="form-group">
            <label>City</label>
            <input type="text" name="city" placeholder="e.g. Karachi" required />
          </div>

          <div class="form-group">
            <label>Delivery Address</label>
            <textarea name="address" rows="1" placeholder="Enter your full delivery address" required></textarea>
          </div>

          <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary btn-order">

        </form>
      </div>

      <!-- RIGHT: Product Summary -->
      <div class="order-summary">
        <h3>Order Summary</h3>

        <div class="summary-product">
          <img src="<?php echo $upload. $row['Image']; ?>" alt="Product"/>
          <div class="summary-info">
            <h4><?php echo $row["Model"];  ?></h4>
            <p class="summary-brand"><?php echo $row["Brand"];  ?></p>
            <p class="summary-price"><?php echo $row["Price"];  ?></p>
          </div>
        </div>

        <div class="summary-row">
          <span>Product Price</span>
          <span><?php echo $row["Price"];  ?></span>
        </div>
        <div class="summary-row">
          <span>Delivery Fee</span>
          <span>Free</span>
        </div>
        <div class="summary-row total">
          <span>Total</span>
          <span><?php echo $row["Price"];  ?></span>
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