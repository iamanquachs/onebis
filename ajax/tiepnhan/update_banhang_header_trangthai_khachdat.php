<?php
include('__include_connect.php');
require("../../modules/tiepnhanClass.php");
require("../../modules/banhangClass.php");

$db_bh = new banhang();
$db = new tiepnhan();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$sodienthoai = $_POST['sodienthoai'];
$soct = $_POST['soct'];


$db->update_henkhach($mshs, $msdv, $sodienthoai, $soct);
$db_bh->update_ngaysinh_diachi($msdn, $mshs, $msdv, $sodienthoai, $diachi, $ngaysinh);
$db->update_ngaykham_benhnhan($mshs, $msdv, $sodienthoai, $soct);
