<?php

session_Start();
$name = $_SESSION['name'] ;
$email = $_SESSION['email'] ;
$otp = $_SESSION['otp'];
require_once "../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->AuthType = 'LOGIN';
$mail->Username = "GMAIL_ADDRESS_OF_SENDER";
$mail->Password = "16_CHARACTER_APP_PASSWORD";
$mail->SMTPSecure = PHPMailer :: ENCRYPTION_SMTPS ;
$mail->Port = 465 ;

$mail->setFrom("GMAIL_ADDRESS_OF_SENDER", "NAME_OF_SENDER/BRAND");
$mail->addAddress($email, $name);
$mail->isHTML(true);
$mail->Subject = "Your OTP Verification code";
$mail->Body = "  <h2>Email Verification</h2>
<p>Hello <b>$name</b>,</p>
<p>Your OTP is : </p>
<h1>$otp</h1>
<p>This OTP is valid for 5 minutes.</p>";


try{
    $mail->send();
    header('location: ../Mobile-Store/verify-otp.php');
    exit();
}catch(Exception $e){
    echo  "Failed to send email.";
    echo $mail->ErrorInfo;
}



?>
