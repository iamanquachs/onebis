<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");
require("../../modules/khachhangClass.php");

$db_kh = new khachhang();
$db = new banhang();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$tennv = $_COOKIE['hoten'];
$mskh = $_POST['mskh'];
$tenkh = $_POST['tenkh'];
$ngaysinh = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['ngaysinh'])));
$diachi = $_POST['diachi'];
$gioitinh = $_POST['gioitinh'];
$sodienthoai = $_POST['sodienthoai'];
$nghenghiep = $_POST['nghenghiep'];
$loai = $_POST['loai'];

if ($loai == 'add') {

    if ($mskh == '') {
        $ktra_sdt = $db->find_khachhang($mshs, $sodienthoai);
        if (count($ktra_sdt) == 0) {
            $mskh = 'KH' . date("dmyHis", time()) . rand(1000, 9999);
            $db->add_khachhang($msdn, $msdv, $mshs, $mskh, $tenkh, $sodienthoai, $ngaysinh, $diachi, $gioitinh, $nghenghiep);
        }
    } else {
        $db_kh->edit_khachhang($msdn, $mshs, $msdv, $mskh, $tenkh, $diachi, $ngaysinh, $gioitinh, $nghenghiep);
    }
}
if ($loai == 'edit') {
    $db_kh->edit_khachhang($msdn, $mshs, $msdv, $mskh, $tenkh, $diachi, $ngaysinh, $gioitinh, $nghenghiep);
}
