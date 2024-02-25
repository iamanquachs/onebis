<?php
include('__include_connect.php');
require("../../modules/nhapkhoClass.php");
require("../../modules/xuatkhoClass.php");

$db_xk = new xuatkho();
$db = new NhapKho();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$sohoadon = $_POST['sohoadon'];
$ngayhd = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['ngayhd'])));


$msncc = $_POST['msncc'];
$tenncc = $_POST['tenncc'];
if ($msncc == '') {
    $tenncc = 'Chưa chọn';
}
$tongcong = $_POST['tongcong'];
$db->update_nhapkho_header($mshs, $msdv, $soct, $sohoadon, $ngayhd, $msncc, $tenncc, $tongcong);
$db_xk->lay_tonkho_baocao($mshs, $msdv, date('Y-m-d'), date('Y-m-d'), 'CN');
