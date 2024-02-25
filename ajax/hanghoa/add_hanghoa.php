<?php
include('__include_connect.php');
require("../../modules/hanghoaClass.php");

$db = new hanghoa();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$mshh = 'HH' . date("dmyHis", time()) . rand(1000, 9999);
$tenhanghoa = $_POST['tenhanghoa'];
$gianhap = $_POST['gianhap'];
$giaban = $_POST['giaban'];
$mavach = $_POST['mavach'];
$mshhncc = $_POST['mshhncc'];
$thuesuat = $_POST['thuesuat'];
$pttichluy = $_POST['pttichluy'];
$ptthuchien = $_POST['ptthuchien'];
$sothang_khauhao = $_POST['sothang_khauhao'];
$loai_hh = $_POST['loai_hh'];
$nhom = $_POST['nhom'];
$hangsx = $_POST['hangsx'];
$dvt = $_POST['dvt'];
$dvt_quydoi = $_POST['dvt_quydoi'];
$soluong_quydoi = $_POST['soluong_quydoi'];
$quycach = '';
$mota = $_POST['mota_hanghoa'];
$file_image_length = $_POST['file_image_length'];
$trangthai = $_POST['trangthai'];
$tonkho_tt = $_POST['tonkho_tt'];
$all_path_image = '';
for ($i = 0; $i < $file_image_length; $i++) {
    ${"file_image$i"} = $_FILES["file_image$i"];
    if (${"file_image$i"} != '') {
        $duoi = explode('.', ${"file_image$i"}['name']);
        $duoi = $duoi[(count($duoi) - 1)];
        $path_image = $mshh . rand(1000, 9999) . '.' . $duoi;
        $all_path_image .= $path_image . '|';
        move_uploaded_file(${"file_image$i"}['tmp_name'], '../../upload/anhhanghoa/' . $mshs . '/' . $path_image);
    }
}

$list = $db->add_hanghoa($trangthai, $msdn, $mshs, $msdv, $mshh, $tenhanghoa, $loai_hh,  $hangsx, $quycach, $gianhap, $giaban, $thuesuat, $nhom, $dvt, $pttichluy, $ptthuchien, $all_path_image, $mota, $tonkho_tt, $mavach, $mshhncc, $dvt_quydoi, $soluong_quydoi, $sothang_khauhao);
