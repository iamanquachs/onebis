<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$sdt = $_POST['sdt'];
$nhanvien = $_POST['nhanvien'];
$dichvu = $_POST['dichvu'];
$danhgia = $_POST['danhgia'];
$db->post_danhgia($mshs, $msdv, $soct, $sdt, $nhanvien, $dichvu, $danhgia);
