<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");

$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$list = $db->load_soluong_trangthai($msdv, $mshs);
header('Content-Type: application/json');
echo json_encode($list);
