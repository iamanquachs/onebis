<?php
include('__include_connect.php');
require("../../modules/baocaoClass.php");

$db = new baocao();
$mshs = $_COOKIE['mshs'];
$msdv = $_POST['msdv'];
$khachhang = $_POST['khachhang'];
$nhanvien = $_POST['nhanvien'];
$danhgia = $_POST['danhgia'];
$tungay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['tungay'])));
$denngay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['denngay'])));
$loai = $_POST['loai'];
$select = "date_format(a.lastmodify,'%d/%m/%Y %H:%i')ngay, a.sodienthoai, b.tenkh, c.tennv, c.msnv,a.mshh";
if ($loai == 'chart') {
    $list = $db->chart_baocao_hieuqua_nhanvien($mshs, $msdv, $khachhang, $nhanvien, $danhgia, $tungay, $denngay);
}if($loai=='list'){
    $list = $db->baocao_hieuqua_nhanvien($mshs, $msdv, $khachhang, $nhanvien, $danhgia, $tungay, $denngay);
}
header('Content-Type: application/json');
echo json_encode($list);
