<?php
session_Start();
require_once "../includes/conn.php";

$error = '';

if(isset($_POST["submit"])){

    $stmt = mysqli_prepare($conn,"SELECT email FROM users where email = ?");
    mysqli_stmt_bind_param($stmt, "s", $_POST['email']);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result)>0){
      echo $error =  "email already exists";
      exit();
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $otp = random_int(100000,999999);

    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $hashed_password;
    $_SESSION['otp'] = $otp;
    $_SESSION['otp_generated_at'] = time();

    header('location: ../Mobile-Store/send-otp.php');
    exit();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register - MobileZone</title>
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

    .nav-login {
      color: #ccc;
      font-size: 14px;
      transition: color 0.2s;
    }

    .nav-login:hover {
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

    /* ---- REGISTER BOX ---- */
    .register-box {
      background: #ffffff;
      border: 1px solid #e0e0e0;
      border-radius: 12px;
      padding: 36px;
      width: 100%;
      max-width: 480px;
    }

    .register-box h2 {
      font-size: 22px;
      font-weight: 700;
      color: #1a1a2e;
      margin-bottom: 6px;
    }

    .register-box p {
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
      background-color: #fdecea;
      border: 1px solid #f5c6cb;
      color: #e74c3c;
      font-size: 13px;
      padding: 10px 14px;
      border-radius: 6px;
      margin-bottom: 16px;
      display: none;
    }

    /* ---- SUBMIT BUTTON ---- */
    .btn-register {
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

    .btn-register:hover {
      opacity: 0.88;
    }

    /* ---- LOGIN LINK ---- */
    .login-link {
      text-align: center;
      font-size: 13px;
      color: #777;
      margin-top: 18px;
    }

    .login-link a {
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
      .register-box {
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
    <a href="login.php" class="nav-login">
      Already have an account? <strong>Login</strong>
    </a>
  </nav>


  <!-- PAGE CONTENT -->
  <div class="page-content">
    <div class="register-box">

      <h2>Create Account</h2>
      <p>Fill in the details below to register</p>

      <form action="" method="POST">

        <!-- Error box — show with PHP if needed -->
        <div class="error-msg" id="errorMsg">
          <!-- PHP: echo $error_message -->
          This email is already registered.
        </div>

        <div class="form-group">
          <label>Full Name</label>
          <div class="input-wrapper">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="name" placeholder="Enter your full name" required />
          </div>
        </div>

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
            <input type="password" name="password" placeholder="Create a password" required />
          </div>
        </div>

        <input type="submit" name= "submit" value=" Create Account" class="btn-register">

      </form>

      <p class="login-link">
        Already have an account? <a href="login.php">Login here</a>
      </p>

    </div>
  </div>


  <!-- FOOTER -->
  <div class="footer-bottom">
    &copy; 2024 MobileZone. All rights reserved.
  </div>

</body>
</html>
