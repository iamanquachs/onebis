<?php
include('__include_connect.php');
require("../../modules/dathangClass.php");


$db = new dathang();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$mskh = '';
$tenkh = '';
$sodienthoai = '';
$tongcong = '0';
$trangthai = '0';
$db->add_dathang_header($msdn, $mshs, $msdv, $soct, $mskh, $tenkh, $sodienthoai, $tongcong, $trangthai);
$db->delete_dathang_xoatam($mshs, $msdv);
