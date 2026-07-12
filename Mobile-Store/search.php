<?php
require_once "../includes/conn.php";

if(!isset($_GET['keyword'])){
    exit("No Keyword Provided");
}

$keyword = $_GET['keyword'];

$stmt = mysqli_prepare($conn, "SELECT Brand, Model FROM mobiles where Brand LIKE ? OR Model LIKE ?");
$search = "%$keyword%";
mysqli_stmt_bind_param($stmt, "ss", $search, $search);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$data = [];

while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}

echo json_encode($data);




?>