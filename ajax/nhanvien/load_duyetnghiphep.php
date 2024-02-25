<?php
include('__include_connect.php');
require("../../modules/nhanvienClass.php");

$db = new nhanvien();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$list = $db->load_duyetnghiphep($mshs, $msdv);
header('Content-Type: application/json');
echo json_encode($list);
