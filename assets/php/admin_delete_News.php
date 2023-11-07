<?php

// require "connect.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);


require "admin_add_news_code.php";
$obj = new News();

$id = $_GET['id'];

$obj->delete($id);
header("location: ../../pages/admin/admin_dashboard.php");


?>