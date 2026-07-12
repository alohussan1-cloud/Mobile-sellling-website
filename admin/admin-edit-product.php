<?php

session_start();
require_once "../includes/conn.php";

if(!isset($_SESSION['admin_username'])){
  header('location: ../admin/admin-login.php');
  exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM mobiles WHERE ID = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$upload = "../uploads/";

if(isset($_POST["submit"])){
    $model   = $_POST['model'];
    $brand   = $_POST['brand'];
    $ram     = $_POST['ram'];
    $rom     = $_POST['rom'];
    $price   = $_POST['price'];
    $descrip = $_POST['description'];
    $battery = $_POST['battery'];
    $camera  = $_POST['camera'];
    $display = $_POST['display'];
    $os      = $_POST['os'];

    $imageName = $row['Image'];

    if(!empty($_FILES['image']['name'])){
        $imageName = $_FILES['image']['name'];
        $tmpName   = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmpName, "../uploads/" . $imageName);
    }

    $stmt = mysqli_prepare($conn, "UPDATE mobiles SET Brand=?, Model=?, Image=?, Price=?,
            Description=?, ROM=?, RAM=?, Battery=?, Camera=?, Display=?, OS=? WHERE ID=?");

    if(!$stmt){
        die(mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "sssisssssssi",
        $brand, $model, $imageName, $price,
        $descrip, $rom, $ram, $battery, $camera, $display, $os, $id
    );

    $result1 = mysqli_stmt_execute($stmt);

    if($result1){
        header('location: ../admin/admin-products.php');
        exit();
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Product - MobileZone Admin</title>
  <link rel="stylesheet" href="../includes/admin-pages.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<style>

    .current-image {
      margin-bottom: 24px;
    }

    .current-image p {
      font-size: 13px;
      font-weight: 600;
      color: #1a1a2e;
      margin-bottom: 8px;
    }

    .current-image img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 8px;
      border: 1px solid #e0e0e0;
    }

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

    .form-group label span {
      font-weight: 400;
      color: #777;
      font-size: 12px;
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
      color: #ffffff;
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
      <h2>Edit Product</h2>
      <a href="admin-products.php" class="back-btn">
        <i class="fa-solid fa-arrow-left"></i> Back to Products
      </a>
    </div>

    <div class="card">

      <!-- Current Image Preview -->
      <div class="current-image">
        <p>Current Image</p>
        <img id="preview" src="<?php echo $upload . $row['Image']; ?>" alt="Current Product Image"/>
      </div>

      <form method="POST" enctype="multipart/form-data">

        <!-- BASIC INFO -->
        <p class="form-section-title">Basic Information</p>

        <div class="form-row">
          <div class="form-group">
            <label for="model">Phone Model</label>
            <input type="text" id="model" name="model" value="<?php echo $row['Model']; ?>" required />
          </div>
          <div class="form-group">
            <label for="brand">Brand</label>
            <select id="brand" name="brand" required>
              <option value="">-- Select Brand --</option>
              <option value="Apple"   <?php echo ($row['Brand'] == 'Apple')   ? 'selected' : ''; ?>>Apple</option>
              <option value="Samsung" <?php echo ($row['Brand'] == 'Samsung') ? 'selected' : ''; ?>>Samsung</option>
              <option value="Xiaomi"  <?php echo ($row['Brand'] == 'Xiaomi')  ? 'selected' : ''; ?>>Xiaomi</option>
              <option value="OnePlus" <?php echo ($row['Brand'] == 'OnePlus') ? 'selected' : ''; ?>>OnePlus</option>
              <option value="Oppo"    <?php echo ($row['Brand'] == 'Oppo')    ? 'selected' : ''; ?>>Oppo</option>
              <option value="Vivo"    <?php echo ($row['Brand'] == 'Vivo')    ? 'selected' : ''; ?>>Vivo</option>
              <option value="Other"   <?php echo ($row['Brand'] == 'Other')   ? 'selected' : ''; ?>>Other</option>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="price">Price (/=)</label>
            <input type="number" id="price" name="price" value="<?php echo $row['Price']; ?>" required />
          </div>
          <div class="form-group">
            <label for="os">Operating System</label>
            <select id="os" name="os">
              <option value="">-- Select OS --</option>
              <option value="Android 14" <?php echo ($row['OS'] == 'Android 14') ? 'selected' : ''; ?>>Android 14</option>
              <option value="Android 13" <?php echo ($row['OS'] == 'Android 13') ? 'selected' : ''; ?>>Android 13</option>
              <option value="Android 12" <?php echo ($row['OS'] == 'Android 12') ? 'selected' : ''; ?>>Android 12</option>
              <option value="iOS 17"     <?php echo ($row['OS'] == 'iOS 17')     ? 'selected' : ''; ?>>iOS 17</option>
              <option value="iOS 16"     <?php echo ($row['OS'] == 'iOS 16')     ? 'selected' : ''; ?>>iOS 16</option>
              <option value="iOS 15"     <?php echo ($row['OS'] == 'iOS 15')     ? 'selected' : ''; ?>>iOS 15</option>
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
              <option value="4GB"  <?php echo ($row['RAM'] == '4GB')  ? 'selected' : ''; ?>>4GB</option>
              <option value="6GB"  <?php echo ($row['RAM'] == '6GB')  ? 'selected' : ''; ?>>6GB</option>
              <option value="8GB"  <?php echo ($row['RAM'] == '8GB')  ? 'selected' : ''; ?>>8GB</option>
              <option value="12GB" <?php echo ($row['RAM'] == '12GB') ? 'selected' : ''; ?>>12GB</option>
              <option value="16GB" <?php echo ($row['RAM'] == '16GB') ? 'selected' : ''; ?>>16GB</option>
            </select>
          </div>
          <div class="form-group">
            <label for="storage">Storage</label>
            <select id="storage" name="rom">
              <option value="">-- Select Storage --</option>
              <option value="64GB"  <?php echo ($row['ROM'] == '64GB')  ? 'selected' : ''; ?>>64GB</option>
              <option value="128GB" <?php echo ($row['ROM'] == '128GB') ? 'selected' : ''; ?>>128GB</option>
              <option value="256GB" <?php echo ($row['ROM'] == '256GB') ? 'selected' : ''; ?>>256GB</option>
              <option value="512GB" <?php echo ($row['ROM'] == '512GB') ? 'selected' : ''; ?>>512GB</option>
              <option value="1TB"   <?php echo ($row['ROM'] == '1TB')   ? 'selected' : ''; ?>>1TB</option>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="battery">Battery</label>
            <input type="text" id="battery" name="battery" value="<?php echo $row['Battery']; ?>" placeholder="e.g. 5000 mAh" />
          </div>
          <div class="form-group">
            <label for="camera">Camera</label>
            <input type="text" id="camera" name="camera" value="<?php echo $row['Camera']; ?>" placeholder="e.g. 108 MP" />
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="display">Display</label>
            <input type="text" id="display" name="display" value="<?php echo $row['Display']; ?>" placeholder="e.g. 6.7 inch AMOLED" />
          </div>
        </div>

        <!-- DESCRIPTION & IMAGE -->
        <p class="form-section-title">Description & Image</p>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea id="description" name="description" rows="4"><?php echo $row['Description']; ?></textarea>
        </div>

        <div class="form-group">
          <label for="image">Change Image <span>(leave empty to keep current)</span></label>
          <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(this)" />
          <p class="input-hint">Accepted: JPG, PNG, WEBP. Max size: 2MB</p>
        </div>

        <div class="form-btns">
          <input type="submit" name="submit" value="Update Product" class="btn-save" />
          <a href="admin-products.php" class="btn-cancel">Cancel</a>
        </div>

      </form>
    </div>

  </div>

</body>
</html>