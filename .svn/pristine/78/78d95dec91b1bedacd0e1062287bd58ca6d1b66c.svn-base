<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");

$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$sodienthoai = $_POST['sodienthoai'];
$list = $db->load_voucher($mshs, $msdv, $sodienthoai);

header('Content-Type: application/json');
echo json_encode($list);
