<?php
include('__include_connect.php');
require("../../modules/dichvuClass.php");

$db = new dichvu();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdichvu = $_POST['msdichvu'];
$tendichvu = $_POST['tendichvu'];
$nhom_dichvu = $_POST['nhom'];
$sotien = $_POST['sotien'];
$giavon = $_POST['giavon'];
$thoigian = $_POST['thoigian'];
$mota = $_POST['mota_dichvu'];
$file_video = $_FILES['file_video'];
$pttichluy = $_POST['pttichluy'];
$ptthuchien = $_POST['ptthuchien'];
$ngaybaohanh = $_POST['ngaybaohanh'];
$thuesuat = $_POST['thuesuat'];
$lieutrinh = $_POST['lieutrinh'];
$trangthai = $_POST['trangthai'];

if ($file_video != '') {
    $duoi = explode('.', $file_video['name']);
    $duoi = $duoi[(count($duoi) - 1)];
    $path_video = $msdichvu . rand(1000, 9999) . '.' . $duoi;
    move_uploaded_file($file_video['tmp_name'], '../../upload/videodichvu/' . $mshs . '/' . $path_video);
}
$list = $db->edit_dichvu($trangthai, $mshs, $msdv, $msdichvu, $tendichvu, $nhom_dichvu, $lieutrinh, $sotien, $thoigian, $mota, $path_video, $pttichluy, $ptthuchien, $thuesuat, $ngaybaohanh, $giavon);
$db->update_sotien_chitiet_dichvu($mshs, $msdv, $msdichvu, '', 'Luu');
