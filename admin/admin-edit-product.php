<?php

include "../includes/conn.php" ; 

$id = $_GET['id'];

$sql = "SELECT *  FROM mobiles WHERE ID = '$id'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$upload = "../uploads/";

if(isset($_POST["submit"])){
    $model = $_POST['model'];
    $brand = $_POST['brand'];
    $ram = $_POST['ram'];
    $rom = $_POST['rom'];
    $price = $_POST['price'];
    $descrip = $_POST['description'];


    $imageName = $row['Image'];

  if(!empty($_FILES['image']['name'])){
      $imageName = $_FILES['image']['name'];
      $tmpName = $_FILES['image']['tmp_name'];

      move_uploaded_file($tmpName, "../uploads/" . $imageName);
  }

    $stmt = mysqli_prepare($conn, "UPDATE mobiles SET Brand = ? , Model=? , Image = ? , Price=?, 
            Description = ? , ROM=? , RAM = ?  where ID= ? ");

    if(!$stmt){
        die(mysqli_error($conn));
    }

            mysqli_stmt_bind_param($stmt, "sssisssi", $brand , $model , $imageName , $price
            , $descrip , $rom , $ram , $id );

    $result1 = mysqli_stmt_execute($stmt);

    if($result1){
      header('location: ../admin/admin-products.php');
      exit();
    } else{
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
        /* Current image preview */
    .current-image {
    margin-bottom: 24px;
    }

    .current-image p {
    font-size: 13px;
    font-weight: 600;
    color: rgb(26, 26, 46);
    margin-bottom: 8px;
    }

    .current-image img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid rgb(224, 224, 224);
    }

    /* Form rows - two columns */
    .form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 16px;
    }

    /* Single form group */
    .form-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
    margin-bottom: 16px;
    }

    .form-group label {
    font-size: 13px;
    font-weight: 600;
    color: rgb(26, 26, 46);
    }

    .form-group label span {
    font-weight: 400;
    color: rgb(119, 119, 119);
    font-size: 12px;
    }

    /* Inputs, selects, textarea */
    .form-group input,
    .form-group select,
    .form-group textarea {
    padding: 10px 14px;
    border: 1px solid rgb(224, 224, 224);
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
    border-color: rgb(245, 166, 35);
    }

    .form-group textarea {
    resize: vertical;
    }

    /* Hint text */
    .input-hint {
    font-size: 11px;
    color: #999;
    margin-top: 4px;
    }

    /* Buttons */
    .form-btns {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-top: 6px;
    }

    .btn-save {
    background-color: rgb(245, 166, 35);
    color: rgb(255, 255, 255);
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
    color: rgb(119, 119, 119);
    text-decoration: none;
    transition: color 0.2s;
    }

    .btn-cancel:hover {
    color: #e74c3c;
    }

    /* Back button */
    .back-btn {
    font-size: 13px;
    color: rgb(119, 119, 119);
    text-decoration: none;
    transition: color 0.2s;
    }

    .back-btn:hover {
    color: rgb(245, 166, 35);
    }

    /* Responsive */
    @media (max-width: 600px) {
    .form-row {
        grid-template-columns: 1fr;
    }
    }
</style>
<body>


  <!-- MAIN -->
  <div class="main">

    <!-- Topbar -->
    <div class="topbar">
      <h2>Edit Product</h2>
      <a href="admin-products.php" class="back-btn">
        <i class="fa-solid fa-arrow-left"></i> Back to Products
      </a>
    </div>

    <!-- Edit Form -->
    <div class="card">

      <!-- Current Image Preview -->
      <div class="current-image">
        <p>Current Image</p>
        <img id="preview" src="<?php echo $upload . $row['Image']; ?>" alt="Current Product Image"/>
      </div>

      <form action="" method="POST" enctype="multipart/form-data">



        <!-- Row 1: Name + Brand -->
        <div class="form-row">
          <div class="form-group">
            <label for="name">Phone Model</label>
            <input type="text" id="model" name="model" value="<?php echo $row['Model']; ?>" required />
          </div>
          <div class="form-group">
            <label for="brand">Brand</label>
            <select id="brand" name="brand" required>
              <option value="">-- Select Brand --</option>
              <option value="Apple">Apple</option>
              <option value="Samsung" selected>Samsung</option>
              <option value="Xiaomi">Xiaomi</option>
              <option value="OnePlus">OnePlus</option>
              <option value="Oppo">Oppo</option>
              <option value="Vivo">Vivo</option>
              <option value="Other">Other</option>
            </select>
          </div>
        </div>

        <!-- Row 2: RAM + Storage -->
        <div class="form-row">
          <div class="form-group">
            <label for="ram">RAM</label>
            <select id="ram" name="ram">
              <option value="">-- Select RAM --</option>
              <option value="4GB">4GB</option>
              <option value="6GB">6GB</option>
              <option value="8GB">8GB</option>
              <option value="12GB" selected>12GB</option>
              <option value="16GB">16GB</option>
            </select>
          </div>
          <div class="form-group">
            <label for="storage">Storage</label>
            <select id="storage" name="rom">
              <option value="">-- Select Storage --</option>
              <option value="64GB">64GB</option>
              <option value="128GB">128GB</option>
              <option value="256GB" selected>256GB</option>
              <option value="512GB">512GB</option>
              <option value="1TB">1TB</option>
            </select>
          </div>
        </div>

         <!-- Row 3: Price  -->
        <div class="form-row">
          <div class="form-group">
            <label for="price">Price (/=)</label>
            <input type="number" id="price" name="price" value="<?php echo $row['Price']; ?>" required />
          </div>
        </div>

        <!-- Description -->
        <div class="form-group">
          <label for="description">Description</label>
          <textarea id="description" name="description" rows="4"><?php echo $row['Description']; ?>.</textarea>
        </div>

        <!-- New Image Upload -->
        <div class="form-group">
          <label for="image">Change Image</label>
          <input type="file" id="image" name="image" accept="image/*" />
          <p class="input-hint">Accepted: JPG, PNG. Max size: 2MB</p>
        </div>

        <!-- Buttons -->
        <div class="form-btns">
          <input type="submit" name= "submit" class="btn-save">
            <i class="fa-solid fa-floppy-disk"></i> 
          <a href="admin-products.php" class="btn-cancel">Cancel</a>
        </div>

      </form>
    </div>

  </div>

</body>
</html>