<?php
include('__include_connect.php');
require("../../modules/nhapkhoClass.php");

$db = new NhapKho();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$mshh = $_POST['mshh'];
$tenthuoc = $_POST['tenhh'];
$dvt = $_POST['dvt'];
$solo = $_POST['solo'];
$handung =   date('Y-m-d', strtotime(str_replace('/', '-', $_POST['handung'])));;
$gianhap = $_POST['gianhap'];
$chietkhau = $_POST['chietkhau'];
$tienchietkhau = $_POST['tienchietkhau'];
$gianhapchuathue = $_POST['gianhapchuathue'];
$vat = $_POST['vat'];
$tienthue = $_POST['tienthue'];
$soluong = $_POST['soluong'];
$gianhapcothue = $_POST['gianhapvat'];
$tienthue = $_POST['tienthue'];
$ptgiaban = $_POST['ptgiaban'];
$giaban = $_POST['giaban'];
$thanhtiencothue = $_POST['thanhtien'];
$db->edit_nhapkho_line($mshs, $msdv,$soct, $mshh, $tenthuoc, $dvt, $solo, $handung, $gianhap, $chietkhau, $tienchietkhau, $gianhapchuathue, $vat, $tienthue, $gianhapcothue, $soluong,  $thanhtiencothue, $ptgiaban, $giaban);
