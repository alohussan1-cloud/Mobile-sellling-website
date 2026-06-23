<?php

require_once "../includes/conn.php";

$sql = "SELECT * FROM mobiles";
$result = mysqli_query($conn, $sql);

$upload = "../uploads/";



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Products - MobileZone Admin</title>
  <link rel="stylesheet" href="../includes/admin-pages.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<style>
    .btn-add {
      background-color: #f5a623;
      color: #fff;
      padding: 9px 18px;
      border-radius: 6px;
      font-size: 13px;
      font-weight: 600;
      text-decoration: none;
      transition: opacity 0.2s;
    }
    .btn-add:hover { opacity: 0.85; }

    .product-img {
      width: 46px;
      height: 46px;
      object-fit: cover;
      border-radius: 6px;
      border: 1px solid #e0e0e0;
    }

    .actions { display: flex; gap: 10px; }

    .btn-edit {
      font-size: 12px;
      color: #4285f4;
      text-decoration: none;
    }
    .btn-edit:hover { opacity: 0.75; }

    .btn-delete {
      font-size: 12px;
      color: #e74c3c;
      text-decoration: none;
    }
    .btn-delete:hover { opacity: 0.75; }
</style>
<body>

    <?php  include "../includes/sidebar.php" ; ?>

  <!-- MAIN -->
  <div class="main">

    <!-- Topbar -->
    <div class="topbar">
      <h2>Products</h2>
      <a href="add-mobile.php" class="btn-add">
        <i class="fa-solid fa-plus"></i> Add New Product
      </a>
    </div>

    <!-- Products Table -->
    <div class="card">
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
           <?php 
           $count = 0;
           while ($row = mysqli_fetch_assoc($result)){ 
           $count++
            ?>
          <tr>
            <td><?php echo $count ?></td>
            <td><img src="<?php echo $upload . $row['Image']; ?>" alt="iPhone" class="product-img"/></td>
            <td><?php echo $row['Model'] ?></td>
            <td><?php echo $row['Brand'] ?></td>
            <td><?php echo $row['Price'] ?></td>
            <td class="actions">
              <a href="admin-edit-product.php?id=<?=$row['ID'] ?>"  class="btn-edit"><i class="fa-solid fa-pen"></i> Edit</a>
              <a href="admin-delete-product.php?id=<?=$row['ID'] ?>" class="btn-delete"><i class="fa-solid fa-trash"></i> Delete</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  </div>

</body>
</html>