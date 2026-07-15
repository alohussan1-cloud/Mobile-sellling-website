<?php
session_start();
require_once "../includes/conn.php";

$error = "";
$success = "";

// Make sure the user has verified their OTP
if (!isset($_SESSION['reset_email'])) {
    header("Location: forgot-password.php");
    exit();
}

if (isset($_POST['submit'])) {

    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        $error = "Passwords do not match.";
    } elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters long.";
    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = mysqli_prepare($conn, "UPDATE users SET password = ? WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "ss", $hashedPassword, $_SESSION['reset_email']);

        if (mysqli_stmt_execute($stmt)) {

            unset($_SESSION['reset_email']);

            header("Location: login.php");
            exit();

        } else {
            $error = "Something went wrong. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset Password - MobileZone</title>

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
        color:#777;
        font-size:13px;
        margin-bottom:22px;
    }

    .form-group{
        margin-bottom:18px;
    }

    label{
        display:block;
        margin-bottom:6px;
        font-size:13px;
        font-weight:600;
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
    }

    input[type=submit]{
        width:100%;
        padding:12px;
        background:#f5a623;
        color:#fff;
        border:none;
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
        margin-bottom:18px;
        font-size:13px;
    }

</style>
</head>

<body>

<div class="container">

    <h2>Create New Password</h2>
    <p>Your identity has been verified. Please choose a new password.</p>

    <?php if(!empty($error)){ ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form method="POST">

        <div class="form-group">
            <label>New Password</label>
            <div class="input-wrapper">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Enter new password"  required>
            </div>
        </div>

        <div class="form-group">
            <label>Confirm Password</label>
            <div class="input-wrapper">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="confirm_password" placeholder="Confirm new password" required>
            </div>
        </div>

        <input  type="submit" name="submit"  value="Reset Password">
    </form>

</div>

</body>
</html>
```
