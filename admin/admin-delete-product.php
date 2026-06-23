<?php

require_once "../includes/conn.php";

$id = $_GET['id'];

$sql = "DELETE FROM mobiles WHERE ID = '$id'";

$result = mysqli_query($conn, $sql);

if($result){
    header('location: ../admin/admin-products.php');
}



?>