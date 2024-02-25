<?php
include('__include_connect.php');
require("../../modules/quanlytaisanClass.php");

$db = new quanlytaisan();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$soct = 'TS' . date("dmyHis", time()) . rand(1000, 9999);
$msdonvi_quanly = $_POST['msdonvi_quanly'];
$msdonvi_nhan = $_POST['msdonvi_nhan'];
$mshh = $_POST['mshh'];
$tenhh = $_POST['tenhh'];
$soluong = $_POST['soluong'];
$loaixuat = $_POST['loai'];
if ($loaixuat == 'XSD') {
    $db->add_xuat_taisan($msdn, $mshs, $msdv, $loaixuat, $msdonvi_quanly, $soct, $mshh, $tenhh, -$soluong);
    $db->add_xuat_taisan($msdn, $mshs, $msdv, $loaixuat, $msdonvi_nhan, $soct, $mshh, $tenhh, $soluong);
} else {
    $db->add_xuat_taisan($msdn, $mshs, $msdv, $loaixuat, $msdonvi_nhan, $soct, $mshh, $tenhh, -$soluong);
    $db->add_xuat_taisan($msdn, $mshs, $msdv, $loaixuat, $msdonvi_quanly, $soct, $mshh, $tenhh, $soluong);
}
