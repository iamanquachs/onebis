<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");
//dùng để add đơn thuốc và chọn răng 
$db = new banhang();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$sodienthoai = $_POST['sodienthoai'];
$msnguoithan = $_POST['msnguoithan'];
$pttichluy = $_POST['pttichluy'];
$soct = $_POST['soct'];
$mshh = $_POST['mshh'];
$tenhh = $_POST['tenhh'];
$mslieutrinh = $_POST['mslieutrinh'];
$tenlieutrinh = $_POST['tenlieutrinh'];
$nhom_kh = $_POST['nhom_kh'];
$nhom_hh = $_POST['nhom_hh'];
$loai_hh = $_POST['loai_hh'];
$dvt = $_POST['dvt'];
$soluong = $_POST['soluong'];
$gianhap = $_POST['gianhap'];
$giaban = $_POST['giaban'];
$msctkm = $_POST['msctkm'];
$ptgiam = $_POST['ptgiam'];
$giathu = round($giaban - ($giaban * $ptgiam / 100));
$thuesuat = $_POST['thuesuat'];
$giathuvat = round($giathu + ($giathu * $thuesuat / 100));
$thuchien = $_POST['thuchien'];
$ptthuchien = $_POST['ptthuchien'];
$songay_bh = $_POST['songay_bh'];
$dathu = $_POST['dathu'];
$idtuvan = $_POST['idtuvan'];
$ms_rang = $_POST['vitri_rang'];
$idchidinh = 'DT' . date("dmyHis", time()) . rand(1000, 9999);
if ($ms_rang != '') {
    $idchidinh = 'RG' . date("dmyHis", time()) . rand(1000, 9999);
}

// $db->add_banhang_line($mshs, $msdv, $msdn, $sodienthoai, $soct, $idchidinh, 'DT', '0', $nhom_kh, $msctkm, $ptgiam, $mshh, $msnguoithan);
$db->add_donthuoc($sodienthoai, $pttichluy, $msdn, $mshs, $msdv,  $soct, $idchidinh, $mshh, $tenhh, $mslieutrinh, $tenlieutrinh, $nhom_kh, $nhom_hh, $loai_hh, $dvt, $soluong, $gianhap, $giaban, $msctkm, $ptgiam, $giathu, $thuesuat, $giathuvat, $msdn, $thuchien,  $ptthuchien, $songay_bh, $dathu, $idtuvan, $ms_rang);
