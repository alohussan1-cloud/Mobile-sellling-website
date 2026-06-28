<?php
session_start();
require_once "../includes/conn.php";
$name = $_SESSION['name'] ;
$email = $_SESSION['email'] ;
$password = $_SESSION['password'] ;
$stored_otp = $_SESSION['otp'];

$error = "";

if(isset($_POST['submit'])){
    $user_otp = implode('', $_POST['otp']);
    $user_otp = trim($user_otp);

    if(time() -  $_SESSION['otp_generated_at'] > 300){

    if($user_otp == $stored_otp){
        $stmt = mysqli_prepare($conn, "INSERT INTO users (name, email, password)Values(?,?,?)");
        mysqli_stmt_bind_param($stmt,"sss", $name, $email, $password);
        $result = mysqli_stmt_execute($stmt);

        if($result){

            $_SESSION['user_id'] = mysqli_insert_id($conn);

            unset($_SESSION['otp']);
            unset($_SESSION['password']);

            header('location: ../Mobile-Store/index.php');
            exit();
        } else{
             $error = "error occured";
             }
    } else{
        $error = "OTP has expired";

    }

    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP - MobileZone</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<style>
            *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Poppins,sans-serif;
        }

        body{
            background:#f5f5f7;
        }

        /* Navbar */

        .auth-navbar{
            background:#1a1a2e;
            padding:20px 8%;
        }

        .logo{
            color:#fff;
            font-size:32px;
            font-weight:700;
            text-decoration:none;
        }

        .logo i{
            color:#f9a826;
            margin-right:8px;
        }

        /* Auth Section */

    .auth-section{
        min-height: calc(100vh - 5rem);
        display:flex;
        justify-content:center;
        align-items:center;
        padding:4% 5%;
    }

    /* Card */

    .auth-card{
        width:35%;
        min-width:20rem;
        max-width:28rem;

        background:#fff;
        padding:6%;
        border-radius:1rem;
        text-align:center;

        box-shadow:0 0.8rem 2rem rgba(0,0,0,.08);
    }

    /* Icon */

    .otp-icon{
        width:22%;
        aspect-ratio:1;
        margin:auto;

        display:flex;
        justify-content:center;
        align-items:center;

        border-radius:50%;
        background:#fff4dd;
        color:#f9a826;

        font-size:clamp(1.3rem,2vw,2rem);
        margin-bottom:5%;
    }

    /* Heading */

    .auth-card h1{
        font-size:clamp(1.8rem,2.5vw,2.6rem);
        color:#1a1a2e;
        margin-bottom:3%;
    }

    .subtitle{
        font-size:clamp(.9rem,1vw,1rem);
        color:#666;
        line-height:1.6;
        margin-bottom:8%;
    }

    /* OTP Boxes */

    .otp-container{
        display:flex;
        justify-content:space-between;
        gap:2%;
        margin-bottom:8%;
    }

    .otp-input{
        width:15%;
        aspect-ratio:1;

        border:.12rem solid #ddd;
        border-radius:.7rem;

        text-align:center;
        font-size:clamp(1.1rem,2vw,1.6rem);
        font-weight:600;

        outline:none;
        transition:.3s;
    }

    .otp-input:focus{
        border-color:#f9a826;
        box-shadow:0 0 .6rem rgba(249,168,38,.3);
    }

    /* Button */

    .verify-btn{
        width:100%;
        padding:4%;

        border:none;
        border-radius:.7rem;

        background:#f9a826;
        color:#fff;

        font-size:clamp(1rem,1.2vw,1.15rem);
        font-weight:600;
        cursor:pointer;
        transition:.3s;
    }

    .verify-btn:hover{
        background:#ea9808;
    }

    .resend{
        margin-top:6%;
        font-size:clamp(.9rem,1vw,1rem);
    }

    .resend a{
        color:#f9a826;
        text-decoration:none;
        font-weight:600;
    }

    /* Tablets */

    @media (max-width:992px){

        .auth-card{
            width:55%;
        }

    }

    /* Phones */

    @media (max-width:768px){

        .auth-card{
            width:80%;
        }

    }

    /* Small Phones */

    @media (max-width:480px){

        .auth-card{
            width:95%;
            padding:8%;
        }

        .otp-container{
            gap:1.5%;
        }

    }
</style>
<body>

<!-- Navbar -->
<header class="auth-navbar">
    <a href="index.php" class="logo">
        <i class="fa-solid fa-mobile-screen-button"></i>
        <span>MobileZone</span>
    </a>
</header>

<!-- OTP Section -->
<section class="auth-section">

    <div class="auth-card otp-card">

        <div class="otp-icon">
            <i class="fa-solid fa-envelope-open-text"></i>
        </div>

        <h1>Verify Your Email</h1>

        <p class="subtitle">
            We've sent a 6-digit verification code to
            <strong><?php echo $_SESSION['email'] ; ?></strong>
        </p>

        <form action="" method="POST">

            <div class="otp-container">
                <input type="text" maxlength="1" inputmode="numeric" class="otp-input" name="otp[]">
                <input type="text" maxlength="1" inputmode="numeric" class="otp-input" name="otp[]">
                <input type="text" maxlength="1" inputmode="numeric" class="otp-input" name="otp[]">
                <input type="text" maxlength="1" inputmode="numeric" class="otp-input" name="otp[]">
                <input type="text" maxlength="1" inputmode="numeric" class="otp-input" name="otp[]">
                <input type="text" maxlength="1" inputmode="numeric" class="otp-input" name="otp[]">
            </div>

            <button type="submit" name="submit" class="verify-btn">
                Verify OTP
            </button>
        </form>

        <div class="resend">
            Didn't receive the code?
            <a href="#">Resend OTP</a>
        </div>
    </div>
</section>

<script>
    const inputs = document.querySelectorAll(".otp-input");
    inputs.forEach((input, index) => {
        input.addEventListener("input", () => {
            if (input.value.length > 0 && index < inputs.length - 1) {
            inputs[index + 1].focus();
            }
        });
        input.addEventListener("keydown", (e) => {
            if (e.key === "Backspace" && input.value === "" && index > 0) {
            inputs[index - 1].focus();
            }
        });

    });

</script>
</body>
</html>