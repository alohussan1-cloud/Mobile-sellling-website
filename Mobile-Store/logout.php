<?php

session_start();

unset($_SESSION['user_name']);

header('location: ../Mobile-Store/index.php');
exit();


?>