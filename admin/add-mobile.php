<?php

session_start();
require_once "../includes/conn.php";

if(!isset($_SESSION['admin_username'])){
  header('location: ../admin/admin-login.php');
  exit();
}

if(isset($_POST["submit"])){
    $model    = $_POST['model'];
    $brand    = $_POST['brand'];
    $ram      = $_POST['ram'];
    $rom      = $_POST['rom'];
    $price    = $_POST['price'];
    $descrip  = $_POST['description'];
    $battery  = $_POST['battery'];
    $camera   = $_POST['camera'];
    $display  = $_POST['display'];
    $os       = $_POST['os'];

    $imageName = $_FILES['image']['name'];
    $tmpName   = $_FILES['image']['tmp_name'];
    $dirUpload = "../uploads/";
    move_uploaded_file($tmpName, $dirUpload . $imageName);

    $sql = "INSERT INTO mobiles(Brand, Model, Image, Price, Description, ROM, RAM, Battery, Camera, Display, OS)
            VALUES ('$brand', '$model', '$imageName', '$price', '$descrip', '$rom', '$ram', '$battery', '$camera', '$display', '$os')";

    $result = mysqli_query($conn, $sql);
    if($result){
      header('location: ../admin/admin-products.php');
      exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Product - MobileZone Admin</title>
  <link rel="stylesheet" href="../includes/admin-pages.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<style>
    .form-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
      margin-bottom: 16px;
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

    .input-hint {
      font-size: 11px;
      color: #999;
      margin-top: 4px;
    }

    /* Section divider label */
    .form-section-title {
      font-size: 13px;
      font-weight: 700;
      color: #1a1a2e;
      padding: 6px 0 10px;
      border-bottom: 1px solid #e0e0e0;
      margin-bottom: 16px;
    }

    .form-btns {
      display: flex;
      align-items: center;
      gap: 14px;
      margin-top: 6px;
    }

    .btn-save {
      background-color: #f5a623;
      color: #fff;
      border: none;
      padding: 11px 24px;
      border-radius: 6px;
      font-size: 14px;
      font-weight: 600;
      font-family: 'Poppins', sans-serif;
      cursor: pointer;
      transition: opacity 0.2s;
    }

    .btn-save:hover {
      opacity: 0.85;
    }

    .btn-cancel {
      font-size: 13px;
      color: #777;
      text-decoration: none;
      transition: color 0.2s;
    }

    .btn-cancel:hover {
      color: #e74c3c;
    }

    .back-btn {
      font-size: 13px;
      color: #777;
      text-decoration: none;
      transition: color 0.2s;
    }

    .back-btn:hover {
      color: #f5a623;
    }

    @media (max-width: 600px) {
      .form-row {
        grid-template-columns: 1fr;
      }
    }
</style>
<body>

  <?php include "../includes/sidebar.php"; ?>

  <div class="main">
    <div class="topbar">
      <h2>Add New Product</h2>
      <a href="admin-products.php" class="back-btn">
        <i class="fa-solid fa-arrow-left"></i> Back to Products
      </a>
    </div>

    <div class="card">
      <form method="POST" enctype="multipart/form-data">

        <!-- BASIC INFO -->
        <p class="form-section-title">Basic Information</p>

        <div class="form-row">
          <div class="form-group">
            <label for="model">Phone Model</label>
            <input type="text" id="model" name="model" placeholder="e.g. iPhone 15 Pro" required />
          </div>
          <div class="form-group">
            <label for="brand">Brand</label>
            <select id="brand" name="brand" required>
              <option value="">-- Select Brand --</option>
              <option value="Apple">Apple</option>
              <option value="Samsung">Samsung</option>
              <option value="Xiaomi">Xiaomi</option>
              <option value="OnePlus">OnePlus</option>
              <option value="Oppo">Oppo</option>
              <option value="Vivo">Vivo</option>
              <option value="Other">Other</option>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="price">Price (/=)</label>
            <input type="number" id="price" name="price" placeholder="e.g. 85000" required />
          </div>
          <div class="form-group">
            <label for="os">Operating System</label>
            <select id="os" name="os">
              <option value="">-- Select OS --</option>
              <option value="Android 14">Android 14</option>
              <option value="Android 13">Android 13</option>
              <option value="Android 12">Android 12</option>
              <option value="iOS 17">iOS 17</option>
              <option value="iOS 16">iOS 16</option>
              <option value="iOS 15">iOS 15</option>
            </select>
          </div>
        </div>

        <!-- SPECS -->
        <p class="form-section-title">Specifications</p>

        <div class="form-row">
          <div class="form-group">
            <label for="ram">RAM</label>
            <select id="ram" name="ram">
              <option value="">-- Select RAM --</option>
              <option value="4GB">4GB</option>
              <option value="6GB">6GB</option>
              <option value="8GB">8GB</option>
              <option value="12GB">12GB</option>
              <option value="16GB">16GB</option>
            </select>
          </div>
          <div class="form-group">
            <label for="storage">Storage</label>
            <select id="storage" name="rom">
              <option value="">-- Select Storage --</option>
              <option value="64GB">64GB</option>
              <option value="128GB">128GB</option>
              <option value="256GB">256GB</option>
              <option value="512GB">512GB</option>
              <option value="1TB">1TB</option>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="battery">Battery</label>
            <input type="text" id="battery" name="battery" placeholder="e.g. 5000 mAh" />
          </div>
          <div class="form-group">
            <label for="camera">Camera</label>
            <input type="text" id="camera" name="camera" placeholder="e.g. 108 MP" />
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="display">Display</label>
            <input type="text" id="display" name="display" placeholder="e.g. 6.7 inch AMOLED" />
          </div>
        </div>

        <!-- DESCRIPTION & IMAGE -->
        <p class="form-section-title">Description & Image</p>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea id="description" name="description" rows="4" placeholder="Write a short product description..."></textarea>
        </div>

        <div class="form-group">
          <label for="image">Product Image</label>
          <input type="file" id="image" name="image" accept="image/*" />
          <p class="input-hint">Accepted: JPG, PNG, WEBP. Max size: 2MB</p>
        </div>

        <div class="form-btns">
          <input type="submit" value="Save Product" name="submit" class="btn-save" />
          <a href="admin-products.php" class="btn-cancel">Cancel</a>
        </div>

      </form>
    </div>

  </div>

</body>
</html>