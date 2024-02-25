<?php
include('__include_connect.php');
require("../../modules/voucherClass.php");


$db = new voucher();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$value = $_POST['value'];
$list = $db->tim_khachhang($mshs, $msdv, $value);
header('Content-Type: application/json');
echo json_encode($list);
