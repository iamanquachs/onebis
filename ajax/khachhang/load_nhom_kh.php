<?php
include('__include_connect.php');
require("../../modules/khachhangClass.php");

$db = new khachhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$list = $db->load_nhom_kh($mshs, $msdv);
header('Content-Type: application/json');
echo json_encode($list);
