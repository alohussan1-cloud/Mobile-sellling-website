<?php
session_Start();

require_once "../includes/conn.php";

$error = "";

 if(isset($_POST["submit"])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM admins where Username = '$username'" ;
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
      $row =  mysqli_fetch_assoc($result);
      if(password_verify($password, $row['Password'])){
          $_SESSION['admin_username'] = $row['Username'];
        header('location: ../admin/admin-dashboard.php');
        exit();
      } else{
            $error = "Invalid password.";
      } 
    } else{
        $error = "Invalid username.";
    }
 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Login - MobileZone</title>
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
    }

    :root {
    --primary: #1a1a2e;
    --accent: #f5a623;
    --white: #ffffff;
    --light-bg: #f9f9f9;
    --border: #e0e0e0;
    --text-muted: #777;
    --error: #e74c3c;
    }

    .login-page {
    display: flex;
    min-height: 100vh;
    }


    .login-left {
    width: 45%;
    background-color: var(--primary);
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 60px 50px;
    }

    /* Brand / Logo area */
    .brand {
    margin-bottom: 50px;
    }

    .brand i {
    font-size: 48px;
    color: var(--accent);
    margin-bottom: 16px;
    display: block;
    }

    .brand h1 {
    font-size: 32px;
    font-weight: 700;
    color: var(--white);
    margin-bottom: 6px;
    }

    .brand p {
    font-size: 14px;
    color: #aaa;
    text-transform: uppercase;
    letter-spacing: 2px;
    }

    /* Feature list */
    .feature-list {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 16px;
    }

    .feature-list li {
    display: flex;
    align-items: center;
    gap: 12px;
    color: #ccc;
    font-size: 14px;
    }

    .feature-list li i {
    color: var(--accent);
    font-size: 13px;
    width: 20px;
    }

    .login-right {
    width: 55%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
    background-color: #f0f2f5;
    }

    /* The white login card */
    .login-box {
    background-color: var(--white);
    border-radius: 12px;
    padding: 40px;
    width: 100%;
    max-width: 420px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .login-header {
    margin-bottom: 28px;
    }

    .login-header h2 {
    font-size: 24px;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 6px;
    }

    .login-header p {
    font-size: 13px;
    color: var(--text-muted);
    }

    .login-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
    }

    .form-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
    }

    .form-group label {
    font-size: 13px;
    font-weight: 600;
    color: var(--primary);
    }

    /* Input with icon */
    .input-wrapper {
    display: flex;
    align-items: center;
    border: 1px solid var(--border);
    border-radius: 8px;
    overflow: hidden;
    transition: border-color 0.2s;
    }

    .input-wrapper:focus-within {
    border-color: var(--accent);
    }

    .input-wrapper i {
    padding: 0 14px;
    color: var(--text-muted);
    font-size: 14px;
    }

    .input-wrapper input {
    flex: 1;
    border: none;
    outline: none;
    padding: 12px 12px 12px 0;
    font-size: 14px;
    font-family: 'Poppins', sans-serif;
    color: #333;
    background: transparent;
    }

    .input-wrapper input::placeholder {
    color: #bbb;
    }

    .error-msg {
    display: flex;
    align-items: center;
    gap: 8px;
    background-color: #fdecea;
    border: 1px solid #f5c6cb;
    border-radius: 6px;
    padding: 10px 14px;
    color: var(--error);
    font-size: 13px;
    }

    .error-msg i {
    font-size: 14px;
    }

    .btn-login {
    width: 100%;
    padding: 13px;
    background-color: var(--accent);
    color: var(--white);
    font-size: 15px;
    font-weight: 600;
    font-family: 'Poppins', sans-serif;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: opacity 0.2s;
    }

    .btn-login:hover {
    opacity: 0.88;
    }

    .btn-login i {
    margin-right: 6px;
    }

    .back-link {
    text-align: center;
    margin-top: 20px;
    font-size: 13px;
    }

    .back-link a {
    color: var(--text-muted);
    text-decoration: none;
    transition: color 0.2s;
    }

    .back-link a:hover {
    color: var(--accent);
    }

    .back-link a i {
    margin-right: 4px;
    }

  
    @media (max-width: 768px) {
    .login-page {
        flex-direction: column;
    }

    .login-left {
        width: 100%;
        padding: 40px 30px;
        align-items: center;
        text-align: center;
    }

    .feature-list {
        display: none;
    }

    .brand {
        margin-bottom: 0;
    }

    .login-right {
        width: 100%;
        padding: 30px 20px;
    }
    }
</style>
<body>

  <div class="login-page">

    <!-- Left Panel - Branding -->
    <div class="login-left">
      <div class="brand">
        <i class="fa-solid fa-mobile-screen"></i>
        <h1>MobileZone</h1>
        <p>Admin Control Panel</p>
      </div>
      <ul class="feature-list">
        <li><i class="fa-solid fa-check"></i> Manage Products & Inventory</li>
        <li><i class="fa-solid fa-check"></i> View & Process Orders</li>
        <li><i class="fa-solid fa-check"></i> Manage Customers</li>
        <li><i class="fa-solid fa-check"></i> Track Sales & Revenue</li>
      </ul>
    </div>

    <!-- Right Panel - Login Form -->
    <div class="login-right">
      <div class="login-box">

        <div class="login-header">
          <h2>Welcome Admin</h2>
          <p>Sign in to your admin account</p>
        </div>

        <form class="login-form" method="POST">

          <!-- Username -->
          <div class="form-group">
            <label for="username">Username</label>
            <div class="input-wrapper">
              <i class="fa-solid fa-user"></i>
              <input type="text" id="username" name="username" placeholder="Enter your username" required />
            </div>
          </div>

          <!-- Password -->
          <div class="form-group">
            <label for="password">Password</label>
            <div class="input-wrapper">
              <i class="fa-solid fa-lock"></i>
              <input type="password" id="password" name="password" placeholder="Enter your password" required />
            </div>
          </div>

           <?php  if(!empty($error)){  ?>
         <div class="error-msg" id="errorMsg" >
            <i class="fa-solid fa-circle-exclamation"></i>
            <span> <?php echo $error; ?> <span>
          </div>
         <?php } ?>

          <!-- Submit -->
          <input type="submit" name="submit" value="Sign In" class="btn-login"> 
        </form>

        <p class="back-link">
          <a href="../Mobile-Store/index.php"><i class="fa-solid fa-arrow-left"></i> Back to Website</a>
        </p>

      </div>
    </div>

  </div>

</body>
</html>