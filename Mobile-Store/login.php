<?php

require_once "../includes/conn.php";
session_start();

$error = "";

if(isset($_POST["submit"])){

    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result)>0){
      $user = mysqli_fetch_assoc($result);
      
      IF(password_verify($password, $user['password'])){
        $_SESSION['user_name'] = $user['name'];
        header('location: ../Mobile-Store/index.php');
        exit();
        } else{
          $error = "Invalid Password";
        }
    } else{
        $error = "Invalid Email";
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - MobileZone</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <style>

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f0f2f5;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    a {
      text-decoration: none;
    }

    /* ---- NAVBAR ---- */
    .navbar {
      background-color: #1a1a2e;
      padding: 14px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .logo {
      color: #ffffff;
      font-size: 20px;
      font-weight: 700;
    }

    .logo i {
      color: #f5a623;
      margin-right: 6px;
    }

    .nav-register {
      color: #ccc;
      font-size: 14px;
      transition: color 0.2s;
    }

    .nav-register:hover {
      color: #f5a623;
    }

    /* ---- PAGE CONTENT ---- */
    .page-content {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
    }

    /* ---- LOGIN BOX ---- */
    .login-box {
      background: #ffffff;
      border: 1px solid #e0e0e0;
      border-radius: 12px;
      padding: 36px;
      width: 100%;
      max-width: 420px;
    }

    .login-box h2 {
      font-size: 22px;
      font-weight: 700;
      color: #1a1a2e;
      margin-bottom: 6px;
    }

    .login-box p {
      font-size: 13px;
      color: #777;
      margin-bottom: 24px;
    }

    /* ---- FORM ---- */
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

    .input-wrapper {
      display: flex;
      align-items: center;
      border: 1px solid #e0e0e0;
      border-radius: 6px;
      overflow: hidden;
      transition: border-color 0.2s;
    }

    .input-wrapper:focus-within {
      border-color: #f5a623;
    }

    .input-wrapper i {
      padding: 0 12px;
      color: #aaa;
      font-size: 14px;
    }

    .input-wrapper input {
      flex: 1;
      border: none;
      outline: none;
      padding: 11px 12px 11px 0;
      font-size: 13px;
      font-family: 'Poppins', sans-serif;
      color: #333;
    }

    /* ---- ERROR MESSAGE ---- */
     .error-msg {
    display: flex;
    align-items: center;
    gap: 8px;
    background-color: #fdecea;
    border: 1px solid #f5c6cb;
    border-radius: 6px;
    padding: 10px 14px;
    color: #e74c3c;
    font-size: 13px;
    }

    .error-msg i {
    font-size: 14px;
    }

    /* ---- SUBMIT BUTTON ---- */
    input[type="submit"] {
      width: 100%;
      padding: 12px;
      background-color: #f5a623;
      color: #ffffff;
      border: none;
      border-radius: 6px;
      font-size: 15px;
      font-weight: 600;
      font-family: 'Poppins', sans-serif;
      cursor: pointer;
      transition: opacity 0.2s;
      margin-top: 4px;
    }

    input[type="submit"]:hover {
      opacity: 0.88;
    }

    /* ---- REGISTER LINK ---- */
    .register-link {
      text-align: center;
      font-size: 13px;
      color: #777;
      margin-top: 18px;
    }

    .register-link a {
      color: #f5a623;
      font-weight: 600;
    }

    /* ---- FOOTER ---- */
    .footer-bottom {
      text-align: center;
      padding: 16px;
      font-size: 12px;
      color: #999;
      background-color: #1a1a2e;
    }

    /* ---- RESPONSIVE ---- */
    @media (max-width: 500px) {
      .login-box {
        padding: 24px 16px;
      }
    }

  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar">
    <a href="index.php" class="logo">
      <i class="fa-solid fa-mobile-screen"></i> MobileZone
    </a>
    <a href="register.php" class="nav-register">
      Don't have an account? <strong>Register</strong>
    </a>
  </nav>


  <!-- PAGE CONTENT -->
  <div class="page-content">
    <div class="login-box">

      <h2>Welcome Back</h2>
      <p>Login to your MobileZone account</p>

      <form  method="POST">
        <?php  if(!empty($error)){  ?>
         <div class="error-msg" id="errorMsg" >
            <i class="fa-solid fa-circle-exclamation"></i>
            <span> <?php echo $error; ?> <span>
          </div>
         <?php } ?>

        <div class="form-group">
          <label>Email Address</label>
          <div class="input-wrapper">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" name="email" placeholder="Enter your email" required />
          </div>
        </div>

        <div class="form-group">
          <label>Password</label>
          <div class="input-wrapper">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" placeholder="Enter your password" required />
          </div>
        </div>

        <input type="submit" name="submit" value="Login" />

      </form>

      <p class="register-link">
        Don't have an account? <a href="register.php">Register here</a>
      </p>

    </div>
  </div>


  <!-- FOOTER -->
  <div class="footer-bottom">
    &copy; 2024 MobileZone. All rights reserved.
  </div>

</body>
</html>