<?php

session_start();
require_once "../includes/conn.php";

if(!isset($_SESSION['admin_username'])){
  header('location: ../admin/admin-login.php');
  exit();
}
$sql = "SELECT * FROM orders";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Orders - MobileZone Admin</title>
  <link rel="stylesheet" href="../includes/admin-pages.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<style>
    .btn-view {
      font-size: 12px;
      color: rgb(245, 166, 35);
      font-weight: 600;
      text-decoration: none;
      transition: opacity 0.2s;
    }
    .btn-view:hover { opacity: 0.75; }
  </style>
<body>

  <!-- SIDEBAR -->
    <?php  include "../includes/sidebar.php" ; ?>

  <!-- MAIN -->
  <div class="main">

    <!-- Topbar -->
    <div class="topbar">
      <h2>Orders</h2>
      <span>Total: 4 orders</span>
    </div>

    <!-- Orders Table -->
    <div class="card">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Product</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
           <?php while ($orders = mysqli_fetch_assoc($result)){ 
            $product_id = $orders['product_id'];

            $sql2 = "SELECT * FROM mobiles where ID = '$product_id'";
            $result2 = mysqli_query($conn, $sql2);

            if($result2){
              $product = mysqli_fetch_assoc($result2);
            } else{
              echo "query failed";
            }
            ?>
          <tr>
            <td><?php echo $orders['id']; ?></td>
            <td><?php echo $orders['name']; ?></</td>
            <td><?php echo $product['Model']; ?></</td>
            <td><?php echo $product['Price']; ?></td>
            <td><?php echo $orders['created_at']; ?></td>
            <td><span class="status pending"><?php echo $orders['status']; ?></span></td>
          </tr>
          <?php }  ?>
        </tbody>
      </table>
    </div>

  </div>

</body>
</html>