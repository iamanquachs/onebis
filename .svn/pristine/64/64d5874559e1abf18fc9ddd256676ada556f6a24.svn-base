<?php
include('__include_connect.php');
require("../../modules/hanghoaClass.php");

$db = new hanghoa();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$mshh = $_POST['mshh'];
$tenhanghoa = $_POST['tenhanghoa'];
$giaban = $_POST['giaban'];
$thuesuat = $_POST['thuesuat'];
$mavach = $_POST['mavach'];
$mshhncc = $_POST['mshhncc'];
$pttichluy = $_POST['pttichluy'];
$ptthuchien = $_POST['ptthuchien'];
$sothang_khauhao = $_POST['sothang_khauhao'];
$loai_hh = $_POST['loai_hh'];
$nhom = $_POST['nhom'];
$hangsx = $_POST['hangsx'];
$dvt = $_POST['dvt'];
$quycach = '';
$mota = $_POST['mota_hanghoa'];
$trangthai = $_POST['trangthai'];
$tonkho_tt = $_POST['tonkho_tt'];
$dvt_quydoi = $_POST['dvt_quydoi'];
$soluong_quydoi = $_POST['soluong_quydoi'];


$list = $db->edit_hanghoa($trangthai, $msdn, $mshs, $msdv, $mshh, $tenhanghoa, $loai_hh, $hangsx, $quycach,  $giaban, $thuesuat, $nhom, $dvt, $pttichluy, $ptthuchien, $mota, $tonkho_tt, $mavach, $mshhncc, $dvt_quydoi, $soluong_quydoi, $sothang_khauhao);
