<?php

session_start();

unset($_SESSION['name']);
unset( $_SESSION['google_id'] );
unset( $_SESSION['email']);
unset( $_SESSION['picture']);

header('location: ../Mobile-Store/index.php');
exit();


?>