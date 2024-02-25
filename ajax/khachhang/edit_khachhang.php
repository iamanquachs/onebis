<?php
include('__include_connect.php');
require("../../modules/khachhangClass.php");

$db = new khachhang();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$mskh = $_POST['mskh'];
$tenkh = $_POST['tenkh'];
$diachi = $_POST['diachi'];
$ngaysinh = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['ngaysinh'])));;

$list = $db->edit_khachhang($msdn, $mshs, $msdv, $mskh, $tenkh, $diachi, $ngaysinh, '', '');
