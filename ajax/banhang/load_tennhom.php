<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$phanloai = $_POST['phanloai'];
$lieutrinh = '0';
if ($phanloai == 'lieutrinh') {
    $lieutrinh = '1';
    $list = $db->load_tennhom_dichvu($mshs, $msdv, $lieutrinh);
}
if ($phanloai == 'dichvu') {
    $list = $db->load_tennhom_dichvu($mshs, $msdv, $lieutrinh);
}
if ($phanloai == 'loai_hh') {
    $list = $db->load_tennhom_hanghoa($mshs, $msdv, $lieutrinh);
}
header('Content-Type: application/json');
echo json_encode($list);
