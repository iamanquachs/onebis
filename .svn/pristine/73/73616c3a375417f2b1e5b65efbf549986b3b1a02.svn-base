<?php
include('__include_connect.php');
require("../../modules/thuchiClass.php");

$db = new thuchi();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = 'TC' . date("dmyHis", time()) . rand(1000, 9999);
$ngay = date("Y-m-d");
$makhoanmuc = $_POST['khoanmuc'];
$mskh = '';
$tenkh = '';
$sotien = $_POST['sotien'];
$noidung = $_POST['noidung'];
$msnv = $_POST['maso'];
$tennv = $_POST['tenmaso'];
$socttc = $_POST['soct_donhang'];
$sohd = '';
$nganquy = $_POST['nganquy'];
$loaichungtu = $_POST['loaichungtu'];
if ($loaichungtu == 1) {
    $sotien = -$sotien;
}
if ($makhoanmuc == 'CCC') {
    $socttc =  $_POST['soct'];
    $sohd =  $_POST['sohd'];
    $db->chi_thanhtoan_nhacungcap($msdv, $soct, $socttc, $nganquy, $sotien);
}
$db->add_thuchi($msdn, $mshs, $msdv, $soct, $socttc, $sohd, $ngay, $mskh, $tenkh, $sotien, $noidung, $msnv, $tennv, $loaichungtu, $nganquy, $makhoanmuc);
