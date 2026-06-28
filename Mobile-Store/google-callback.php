<?php
session_start();

require_once "../includes/conn.php";

require_once "../includes/google-config.php";

if(isset($_GET['code'])){
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if(isset($token['error'])){
        echo "<prev>";
        print_r($token);
        echo "<prev>"; 
    }
    $client->setAccessToken($token);

    $google_oauth = new Google_Service_Oauth2($client);

    $google_account_info = $google_oauth->userinfo->get();

    $_SESSION['google_id'] =  $google_account_info['id'];
    $_SESSION['name'] =  $google_account_info['name'];
    $_SESSION['email'] =  $google_account_info['email'];
    $_SESSION['picture'] =  $google_account_info['picture'];

    $sql = mysqli_prepare($conn, "SELECT email FROM users where email = ? ");
     if(!$sql){
        die(mysqli_error($conn));
    }

    mysqli_stmt_bind_param($sql, "s", $_SESSION['email'] );
    mysqli_stmt_execute($sql);
     $result = mysqli_stmt_get_result($sql);
  if(mysqli_num_rows($result)>0){
    header('location: ../Mobile-Store/index.php');
   } else{
    echo "query failed";
   }


    $stmt = mysqli_prepare($conn, "INSERT INTO users (google_id, name, email) values(?,?,?)" );

    if(!$stmt){
        die(mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "iss", $_SESSION['google_id'], $_SESSION['name'], $_SESSION['email']);

   $result2 =  mysqli_stmt_execute($stmt);

   if($result2){
    header('location: ../Mobile-Store/index.php');
   } else{
    echo "query failed";
   }

}
?>