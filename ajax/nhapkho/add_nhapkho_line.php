<?php
include('__include_connect.php');
require("../../modules/nhapkhoClass.php");

$db = new NhapKho();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$mshh = $_POST['mshh'];
$tenthuoc = $_POST['tenthuoc'];
$dvt = $_POST['dvt'];
$solo = $_POST['solo'];
$handung =  date('Y-m-d', strtotime(str_replace('/', '-', $_POST['handung'])));
$gianhap = $_POST['gianhap'];
$chietkhau = $_POST['chietkhau'];
$tienchietkhau = $_POST['tienchietkhau'];
$gianhapchuathue = '';
$vat = $_POST['vat'];
$tienthue = $_POST['tienthue'];
$soluong = $_POST['soluong'];
$gianhapchuathue = $_POST['gianhapchuathue'];
$gianhapcothue = $_POST['gianhapcothue'];
$tienthue = $_POST['tienthue'];
$ptgiaban = $_POST['ptgiaban'];
$giaban = $_POST['giaban'];
$thanhtiencothue = $_POST['thanhtiencothue'];
$db->add_nhapkho_line($msdn, $mshs, $msdv, $soct, $mshh, $tenthuoc, $dvt, $solo, $handung, $gianhap, $chietkhau, $tienchietkhau, $gianhapchuathue, $vat, $tienthue, $gianhapcothue, $soluong,  $thanhtiencothue, $ptgiaban, $giaban);
