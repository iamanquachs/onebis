<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");

$db = new banhang();
$mshs = $_COOKIE['mshs'];
$value = $_POST['value'];
$list = $db->find_khachhang($mshs, $value);
header('Content-Type: application/json');
echo json_encode($list);
