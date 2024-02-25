<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");
require("../../modules/khachhangClass.php");
require("../../modules/tiepnhanClass.php");

$db_tn = new tiepnhan();
$db_kh = new khachhang();
$db = new banhang();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$tennv = $_COOKIE['hoten'];
$mskh = $_POST['mskh'];
$tenkh = $_POST['tenkh'];
$ngaysinh = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['ngaysinh'])));
$ngaydat = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['ngaydat'])));
$diachi = $_POST['diachi'];
$gioitinh = $_POST['gioitinh'];
$sodienthoai = $_POST['sodienthoai'];
$giodat = $_POST['giodat'];
$ghichu = $_POST['ghichu'];
$msnguoithan = $_POST['msnguoithan'];
$soct = 'DH' . date("dmyHis", time()) . rand(1000, 9999);
$ngayhientai = date('Y-m-d');

if ($mskh == '') {
    $ktra_sdt = $db->find_khachhang($mshs, $sodienthoai);
    if (count($ktra_sdt) == 0) {
        $mskh = 'KH' . date("dmyHis", time()) . rand(1000, 9999);
        $db->add_khachhang($msdn, $msdv, $mshs, $mskh, $tenkh, $sodienthoai, $ngaysinh, $diachi, $gioitinh, $nghenghiep);
    }
} 
$ngayhen = $ngaydat . ' ' . $giodat;
$db_tn->add_banhang_header_khachdat($ngayhen, 0, $msdn, $mshs, $msdv, $soct, '', $mskh, $tenkh, $sodienthoai, 0, 0, 1, $ngaydat, $ghichu, $msnguoithan);
$db_tn->update_ngaykham_benhnhan($mshs, $msdv, $sodienthoai, $ngayhientai, $soct);

