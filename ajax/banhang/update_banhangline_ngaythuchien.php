<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");

$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdn = $_COOKIE['msdn'];
$msdv = $_COOKIE['msdv'];
$loaihinh = $_COOKIE['loaihinh'];
$soct = $_POST['soct'];
$sodienthoai = $_POST['sodienthoai'];
$diachi = $_POST['diachi'];
$loai = $_POST['loai'];
$at_dieutour = $_POST['at_dieutour'];
$ngaysinh = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['ngaysinh'])));
$list = '';
if ($at_dieutour == '1') {
    $list = $db->get_tour_tudong($msdv)[0]->msnv;
}
$db->update_banhangline_ngaythuchien($msdv, $soct, $list);
if ($loai == 'khachdat') {
    $db->update_dotuoi_banhang_line($msdv, $mshs, $sodienthoai, $ngaysinh);
    $db->update_ngaysinh_diachi($msdn, $mshs, $msdv, $sodienthoai, $diachi, $ngaysinh);
}
