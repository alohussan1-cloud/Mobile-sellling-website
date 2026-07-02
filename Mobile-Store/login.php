<?php

session_start();
require_once "../includes/conn.php";

$error = "";

if(isset($_POST["submit"])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
      $user = mysqli_fetch_assoc($result);
      
      if(password_verify($password, $user['password'])){
        $_SESSION['user_name'] = $user['name'];
        header('location: index.php');
        exit();
      } else {
        $error = "Invalid Password";
      }
    } else {
        $error = "Invalid Email";
    }
}

require_once "../includes/google-config.php";
$login_url = $client->createAuthUrl();

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
      box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    }

    .login-box h2 {
      font-size: 22px;
      font-weight: 700;
      color: #1a1a2e;
      margin-bottom: 6px;
    }

    .login-box > p {
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
      margin-bottom: 16px;
    }

    .error-msg i {
      font-size: 14px;
    }

    /* ---- FORGOT PASSWORD ---- */
    .forgot-password {
      text-align: right;
      margin: -6px 0 16px;
    }

    .forgot-password a {
      font-size: 13px;
      color: #f5a623;
      font-weight: 500;
      transition: opacity 0.2s;
    }

    .forgot-password a:hover {
      opacity: 0.8;
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

    /* ---- DIVIDER ---- */
    .divider {
      display: flex;
      align-items: center;
      gap: 10px;
      margin: 18px 0;
    }

    .divider::before,
    .divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background-color: #e0e0e0;
    }

    .divider span {
      font-size: 12px;
      color: #aaa;
      white-space: nowrap;
    }

    /* ---- GOOGLE BUTTON ---- */
    .btn-google {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      width: 100%;
      padding: 11px;
      background-color: #ffffff;
      border: 1px solid #e0e0e0;
      border-radius: 6px;
      font-size: 14px;
      font-weight: 600;
      font-family: 'Poppins', sans-serif;
      color: #333;
      cursor: pointer;
      transition: background-color 0.2s, box-shadow 0.2s;
    }

    .btn-google:hover {
      background-color: #f8f8f8;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    /* Google G icon using colored letters */
    .google-icon {
      width: 20px;
      height: 20px;
      flex-shrink: 0;
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
        .nav-register{
            display:none;
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

      <form method="POST">

        <?php if(!empty($error)) { ?>
        <div class="error-msg">
          <i class="fa-solid fa-circle-exclamation"></i>
          <span><?php echo $error; ?></span>
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

    <div class="forgot-password">
      <a href="forgot-password.php">Forgot Password?</a>
    </div>

    <input type="submit" name="submit" value="Login" />

      </form>

      <!-- Divider -->
      <div class="divider">
        <span>or continue with</span>
      </div>

      <!-- Google Login Button -->
      <a href="<?php echo $login_url; ?>" class="btn-google">
        <!-- Google SVG Icon -->
        <svg class="google-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
          <path fill="#EA4335" d="M24 9.5c3.14 0 5.95 1.08 8.17 2.85l6.09-6.09C34.46 3.09 29.5 1 24 1 14.82 1 7.07 6.48 3.64 14.22l7.08 5.5C12.43 13.72 17.74 9.5 24 9.5z"/>
          <path fill="#4285F4" d="M46.5 24.5c0-1.64-.15-3.22-.42-4.75H24v9h12.68c-.55 2.96-2.2 5.47-4.68 7.15l7.19 5.58C43.26 37.27 46.5 31.36 46.5 24.5z"/>
          <path fill="#FBBC05" d="M10.72 28.28A14.6 14.6 0 0 1 9.5 24c0-1.49.26-2.93.72-4.28l-7.08-5.5A23.93 23.93 0 0 0 .5 24c0 3.86.92 7.5 2.54 10.72l7.68-6.44z"/>
          <path fill="#34A853" d="M24 46.5c5.5 0 10.12-1.82 13.5-4.95l-7.19-5.58c-1.82 1.22-4.15 1.94-6.31 1.94-6.26 0-11.57-4.22-13.28-9.92l-7.68 6.44C7.07 41.52 14.82 46.5 24 46.5z"/>
        </svg>
        Continue with Google
      </a>

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