<?php

require_once "../includes/conn.php";

$sql = "SELECT COUNT(*) AS totalOrders FROM orders";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);


$sql1 = "SELECT COUNT(*) AS totalUsers FROM users";
$result1 = mysqli_query($conn, $sql1);

$row1 = mysqli_fetch_assoc($result1);

$sql2 = "SELECT COUNT(*) AS totalMobiles FROM mobiles";
$result2 = mysqli_query($conn, $sql2);

$row2 = mysqli_fetch_assoc($result2);

// Fetching order data

$query = "SELECT * FROM orders ORDER BY id DESC LIMIT 5";
$run = mysqli_query($conn, $query);


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard - MobileZone Admin</title>
  <link rel="stylesheet" href="../includes/admin-pages.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: 'Poppins', sans-serif;
    background-color: #f0f2f5;
    display: flex;
  }

  a {
    text-decoration: none;
  }

  /* ---- SIDEBAR ---- */
  .sidebar {
    width: 220px;
    min-height: 100vh;
    background-color: rgb(26, 26, 46);
    position: fixed;
    top: 0;
    left: 0;
  }

  .sidebar-logo {
    padding: 20px;
    color: rgb(255, 255, 255);
    font-size: 18px;
    font-weight: 700;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
  }

  .sidebar-logo i {
    color: rgb(245, 166, 35);
    margin-right: 8px;
  }

  .nav-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 13px 20px;
    color: #aaa;
    font-size: 14px;
    transition: background-color 0.2s, color 0.2s;
  }

  .nav-item:hover {
    background-color: rgba(255, 255, 255, 0.06);
    color: rgb(255, 255, 255);
  }

  .nav-item.active {
    color: rgb(245, 166, 35);
    background-color: rgba(245, 166, 35, 0.1);
    border-left: 3px solid rgb(245, 166, 35);
  }

  .nav-item.logout {
    color: #e74c3c;
    margin-top: 20px;
  }

  /* ---- MAIN ---- */
  .main {
    margin-left: 220px;
    padding: 24px;
    width: 100%;
  }

  /* ---- TOPBAR ---- */
  .topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: rgb(255, 255, 255);
    padding: 16px 20px;
    border-radius: 8px;
    margin-bottom: 24px;
    border: 1px solid rgb(224, 224, 224);
  }

  .topbar h2 {
    font-size: 18px;
    color: rgb(26, 26, 46);
  }

  .topbar span {
    font-size: 13px;
    color: rgb(119, 119, 119);
  }

  /* ---- STATS ---- */
  .stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 24px;
  }

  .stat-card {
    background-color: rgb(255, 255, 255);
    border: 1px solid rgb(224, 224, 224);
    border-radius: 8px;
    padding: 20px;
    text-align: center;
  }

  .stat-card p {
    font-size: 13px;
    color: rgb(119, 119, 119);
    margin-bottom: 8px;
  }

  .stat-card h3 {
    font-size: 24px;
    font-weight: 700;
    color: rgb(26, 26, 46);
  }

  /* ---- CARD ---- */
  .card {
    background-color: rgb(255, 255, 255);
    border: 1px solid rgb(224, 224, 224);
    border-radius: 8px;
    padding: 20px;
  }

  .card h3 {
    font-size: 16px;
    color: rgb(26, 26, 46);
    margin-bottom: 16px;
  }

  /* ---- TABLE ---- */
  table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
  }

  th {
    text-align: left;
    padding: 10px 12px;
    background-color: #f8f9fa;
    color: rgb(119, 119, 119);
    font-weight: 600;
    border-bottom: 1px solid rgb(224, 224, 224);
  }

  td {
    padding: 12px;
    color: #444;
    border-bottom: 1px solid #f0f0f0;
  }

  tr:last-child td {
    border-bottom: none;
  }

  /* ---- STATUS BADGES ---- */
  .status {
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
  }

  .status.pending    { background-color: #fff3cd; color: #856404; }
  .status.delivered  { background-color: #d4edda; color: #155724; }
  .status.processing { background-color: #cce5ff; color: #004085; }
  .status.cancelled  { background-color: #f8d7da; color: #721c24; }

  /* ---- RESPONSIVE ---- */
  @media (max-width: 900px) {
    .stats {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  @media (max-width: 600px) {
    .sidebar {
      display: none;
    }
    .main {
      margin-left: 0;
      padding: 16px;
    }
    .stats {
      grid-template-columns: repeat(2, 1fr);
    }
  }

</style>
<body>

  <?php  include "../includes/sidebar.php" ; ?>

  <!-- MAIN -->
  <div class="main">
    <div class="topbar">
      <h2>Dashboard</h2>
      <span>Welcome, Admin</span>
    </div>

    <!-- Stats -->
    <div class="stats">
      <div class="stat-card">
        <p>Total Orders</p>
        <h3><?php echo $row['totalOrders']; ?></h3>
      </div>
      <div class="stat-card">
        <p>Total Products</p>
        <h3><?php echo $row2['totalMobiles']; ?></h3>
      </div>
      <div class="stat-card">
        <p>Total Customers</p>
        <h3><?php echo $row1['totalUsers']; ?></h3>
      </div>
    </div>

    <!-- Recent Orders Table -->
    <div class="card">
      <h3>Recent Orders</h3>
      <table>
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Product</th>
            <th>Amount</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <!-- Replace with PHP loop -->
           <?php while($orders = mysqli_fetch_assoc($run)){ 
            $productID = $orders['product_id'];
            $select = "SELECT * FROM mobiles where id = '$productID'";
            $run2 = mysqli_query($conn, $select);
            
            if($run2){
              $product = mysqli_fetch_assoc($run2);
            } else{
              echo "query failed";
            }
            ?>
          <tr>
            <td><?php  echo $orders['id']; ?></td>
            <td><?php  echo $orders['name']; ?></td>
            <td><?php  echo $orders['product_name']; ?></td>
            <td><?php  echo $product['Price']; ?></td>
            <td><span class="status pending"><?php  echo $orders['status']; ?></span></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>