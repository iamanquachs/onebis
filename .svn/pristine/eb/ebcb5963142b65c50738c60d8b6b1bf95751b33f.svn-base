<?php
include('__include_connect.php');
require("../../modules/dichvuClass.php");

$db = new dichvu();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$lieutrinh = $_POST['lieutrinh'];
$msdichvu = $_POST['msdichvu'];
if ($msdichvu == '') {
    if ($lieutrinh == 2) {
        $msdichvu = 'GD' . date("dmyHis", time()) . rand(1000, 9999);
    } else {
        $msdichvu = 'DV' . date("dmyHis", time()) . rand(1000, 9999);
    }
}
$tendichvu = $_POST['tendichvu'];
$nhom_dichvu = $_POST['nhom'];
$sotien = $_POST['sotien'];
$giavon = $_POST['giavon'];
$thoigian = $_POST['thoigian'];
$mota = $_POST['mota_dichvu'];
$file_image_length = $_POST['file_image_length'];
$file_video = $_FILES['file_video'];
$pttichluy = $_POST['pttichluy'];
$ptthuchien = $_POST['ptthuchien'];
$ngaybaohanh = $_POST['ngaybaohanh'];
$thuesuat = $_POST['thuesuat'];
$trangthai = $_POST['trangthai'];
$path_image = '';
$path_video = '';
for ($i = 0; $i < $file_image_length; $i++) {
    ${"file_image$i"} = $_FILES["file_image$i"];
    if (${"file_image$i"} != '') {
        $duoi = explode('.', ${"file_image$i"}['name']);
        $duoi = $duoi[(count($duoi) - 1)];
        $path_image = $msdichvu . rand(1000, 9999) . '.' . $duoi;
        $all_path_image .= $path_image . '|';
        move_uploaded_file(${"file_image$i"}['tmp_name'], '../../upload/anhdichvu/' . $mshs . '/' . $path_image);
    }
}
if ($file_video != '') {
    $duoi = explode('.', $file_video['name']);
    $duoi = $duoi[(count($duoi) - 1)];
    $path_video = $msdichvu . rand(1000, 9999) . '.' . $duoi;
    move_uploaded_file($file_video['tmp_name'], '../../upload/videodichvu/' . $mshs . '/' . $path_video);
}
$list = $db->add_dichvu($trangthai, $msdn, $mshs, $msdv, $msdichvu, $tendichvu, $nhom_dichvu, $lieutrinh, $sotien, $thoigian, $mota, $all_path_image, $path_video, $pttichluy, $ptthuchien, $thuesuat, $ngaybaohanh, $giavon);
