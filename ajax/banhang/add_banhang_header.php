<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = 'DH' . date("dmyHis", time()) . rand(1000, 9999);
$socttc = '';
$mskh = '';
$tenkh = '';
$sodienthoai = '';
$tongcong = '0';
$trangthai = '0';
$loaiphieu = '0';
$dathen = $_POST['dathen'];
$db->add_banhang_header($loaiphieu, $msdn, $mshs, $msdv, $soct, $socttc, $mskh, $tenkh, $sodienthoai, $tongcong, $trangthai, $dathen);

header('Content-Type: application/json');
echo json_encode($soct, $dathen);
