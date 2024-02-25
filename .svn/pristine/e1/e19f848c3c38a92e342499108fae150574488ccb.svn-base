<?php
include('__include_connect.php');
require("../../modules/khachhangClass.php");

$db = new khachhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$sodienthoai = $_POST['sodienthoai'];
$list = $db->load_ms_nguoithan_new($mshs, $msdv, $sodienthoai);
header('Content-Type: application/json');
echo json_encode($list);
