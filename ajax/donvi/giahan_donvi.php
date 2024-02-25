<?php
include('__include_connect.php');
require("../../modules/donviClass.php");

$db = new donvi_control();
$mshs = $_POST['mshs'];
if ($mshs == '') {
    $mshs = $_COOKIE['mshs'];
}
$msdv = $_POST['msdv'];
if ($msdv == '') {
    $msdv = $_COOKIE['msdv'];
}
$msdn = $_COOKIE['msdn'];
$giahopdong = $_POST['thanhtien'];
$sonam = $_POST['sonam'];
$khuyenmai = $_POST['khuyenmai'];
$list = $db->active_donvi($mshs, $msdv, '', '', '', '', '', '', '', $giahopdong, $khuyenmai, '', '', '', $sonam, '', '2', $msdn);
