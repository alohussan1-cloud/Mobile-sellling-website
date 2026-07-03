<?php
session_Start();
require_once "../includes/conn.php";

$error = '';
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $stmt = mysqli_prepare($conn, "SELECT email, name FROM users where email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result)> 0){
        $otp = random_int(100000,999999);
       $rows = mysqli_fetch_assoc($result);
       $_SESSION['reset_email'] = $rows['email'];
       $_SESSION['reset_name'] = $rows['name'];
       $_SESSION['reset_otp'] = $otp;
       $_SESSION['reset_otp_generated_at'] = time();
       header('location: send-reset-otp.php');
    } else{
        $error = "Sorry! Email does not exist"; 
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password - MobileZone</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }

    body{
        font-family:'Poppins',sans-serif;
        background:#f0f2f5;
        min-height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
    }

    .container{
        width:100%;
        max-width:420px;
        background:#fff;
        padding:35px;
        border-radius:12px;
        box-shadow:0 4px 20px rgba(0,0,0,.06);
    }

    h2{
        color:#1a1a2e;
        margin-bottom:8px;
    }

    p{
        font-size:13px;
        color:#777;
        margin-bottom:22px;
    }

    .form-group{
        margin-bottom:18px;
    }

    label{
        display:block;
        font-size:13px;
        font-weight:600;
        margin-bottom:6px;
    }

    .input-wrapper{
        display:flex;
        align-items:center;
        border:1px solid #ddd;
        border-radius:6px;
    }

    .input-wrapper:focus-within{
        border-color:#f5a623;
    }

    .input-wrapper i{
        padding:0 12px;
        color:#999;
    }

    .input-wrapper input{
        width:100%;
        border:none;
        outline:none;
        padding:12px 12px 12px 0;
        font-family:'Poppins',sans-serif;
        font-size:14px;
    }

    input[type=submit]{
        width:100%;
        border:none;
        background:#f5a623;
        color:#fff;
        padding:12px;
        border-radius:6px;
        cursor:pointer;
        font-size:15px;
        font-weight:600;
    }

    input[type=submit]:hover{
        opacity:.9;
    }

    .error{
        background:#fdecea;
        border:1px solid #f5c6cb;
        color:#e74c3c;
        padding:10px;
        border-radius:6px;
        font-size:13px;
        margin-bottom:16px;
    }

    .success{
        background:#eafaf1;
        border:1px solid #b7ebc6;
        color:#2e7d32;
        padding:10px;
        border-radius:6px;
        font-size:13px;
        margin-bottom:16px;
    }

    .back{
        text-align:center;
        margin-top:18px;
        font-size:13px;
    }

    .back a{
        color:#f5a623;
        text-decoration:none;
        font-weight:600;
    }

</style>
</head>
<body>

<div class="container">

    <h2>Forgot Password</h2>
    <p>Enter the email address associated with your account.</p>

    <?php if(!empty($error)){ ?>
     <div class="error"><?php echo $error; ?></div>
      <?php } ?>

    <form method="POST">

        <div class="form-group">
            <label>Email Address</label>

            <div class="input-wrapper">
                <i class="fa-solid fa-envelope"></i>
                <input
                    type="email"
                    name="email"
                    placeholder="Enter your email"
                    required>
            </div>

        </div>

        <input type="submit" name="submit" value="Send Reset Code">

    </form>

    <div class="back">
        <a href="login.php">
            <i class="fa-solid fa-arrow-left"></i> Back to Login
        </a>
    </div>

</div>

</body>
</html>
