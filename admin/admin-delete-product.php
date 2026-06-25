<?php

session_start();
require_once "../includes/conn.php";

if(!isset($_SESSION['admin_username'])){
  header('location: ../admin/admin-login.php');
  exit();
}

$id = $_GET['id'];

$sql = "DELETE FROM mobiles WHERE ID = '$id'";

$result = mysqli_query($conn, $sql);

if($result){
    header('location: ../admin/admin-products.php');
    exit();
}

?>