<?php

include 'connect.php';

session_start();
unset($_SESSION['admin']);
header('location: ../../pages/login.php');
exit;


?>