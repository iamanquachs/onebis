<?php
include('__include_connect.php');
require("../../modules/nhapkhoClass.php");
require("../../modules/thuchiClass.php");

$thuchidb = new thuchi();
$db = new NhapKho();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$tennv = $_COOKIE['hoten'];
$soct = 'TC' . date("dmyHis", time()) . rand(1000, 9999);
$mskh = $_POST['maso'];
$tenkh = $_POST['tenmaso'];
$socttc = $_POST['soct_donhang'];
$sohd = $_POST['sohd'];
$sotien = $_POST['sotienthu'];
$noidung = 'Chi mua hàng ' . $tenmaso;

$nganquy = $_POST['nganquythu'];
$makhoanmuc = $_POST['makhoanmuc'];
$loaichungtu = '1';
$dathanhtoan = $_POST['dathanhtoan'] + $sotien;
$ngay = date("Y-m-d");

$thuchidb->add_thuchi($msdn, $mshs, $msdv, $soct, $socttc, $sohd, $ngay, $mskh, $tenkh, -$sotien, $noidung, $msdn, $tennv, $loaichungtu, $nganquy, $makhoanmuc);

$db->nhapkho_post_thuchi($mshs,$msdv, $soct, $socttc, $nganquy, $dathanhtoan);
