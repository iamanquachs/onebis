<?php
include('__include_connect.php');
require("../../modules/baocaoClass.php");

$db = new baocao();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];

$list = $db->load_khachhang($mshs, $msdv);
header('Content-Type: application/json');
echo json_encode($list);
