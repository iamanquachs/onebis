<?php
include('__include_connect.php');
require("../../modules/baocaoClass.php");

$db = new baocao();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$soct = 'TT' . date("dmyHis", time()) . rand(1000, 9999);
$mskh = '';
$tenkh = '';
$tien_tamung = $_POST['tien_tamung'];
$msnv = $_POST['msnv'];
$tennv = $_POST['tennv'];
$socttc = '';
$sohd = '';
$nganquy = $_POST['nganquy'];
$loaichungtu = $_POST['loaichungtu'];
$noidung = '';
$makhoanmuc_chi =  $_POST['makhoanmuc_chi'];
$makhoanmuc_thu =  $_POST['makhoanmuc_thu'];
if ($loaichungtu == 0) {
    $noidung = 'Thu tiền tạm ứng';
    $db->add_thuchi_bangluong($msdn, $mshs, $msdv, $soct, $socttc, $sohd, $mskh, $tenkh, $tien_tamung, $noidung, $msnv, $tennv, $loaichungtu, $nganquy,  $makhoanmuc_thu);
}
$noidung = 'Chi lương nhân viên';
$soct = 'TC' . date("dmyHis", time()) . rand(1000, 9999);
$tienluong = -$_POST['tienluong'];
$db->add_thuchi_bangluong($msdn, $mshs, $msdv, $soct, $socttc, $sohd, $mskh, $tenkh, $tienluong, $noidung, $msnv, $tennv, '1', $nganquy,  $makhoanmuc_chi);
