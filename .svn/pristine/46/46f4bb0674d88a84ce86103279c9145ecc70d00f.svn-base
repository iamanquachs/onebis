<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");
require("../../modules/tiepnhanClass.php");

$db = new banhang();
$db_tiepnhan = new tiepnhan();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$tennv = $_COOKIE['hoten'];
$soct = 'DH' . date("dmyHis", time()) . rand(1000, 9999);
$mskh = $_POST['mskh'];
$tenkh = $_POST['tenkh'];
$sodienthoai = $_POST['sodienthoai'];
$msnguoithan = $_POST['msnguoithan'];
$tongcong = 0;
$trangthai = '1';
$ngayhientai = date('Y-m-d');

$db->add_banhang_header(0, $msdn, $mshs, $msdv, $soct, '', $mskh, $tenkh, $sodienthoai, $tongcong, $trangthai, '0');
$db_tiepnhan->update_ngaykham_benhnhan($mshs, $msdv, $sodienthoai, $ngayhientai, $soct);
$db_tiepnhan->update_nguoithan($mshs, $msdv, $sodienthoai, $msnguoithan, $soct);
