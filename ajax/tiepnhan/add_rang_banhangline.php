<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");
require("../../modules/nhatkyClass.php");
require("../../modules/dathenClass.php");

$db_nk = new nhatky();
$db = new banhang();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$dienthoai = $_POST['dienthoai'];
$soct = $_POST['soct'];
$nhom_hh = $_POST['nhom_hh'];
$msnguoithan = $_POST['msnguoithan'];
$colieutrinh = $_POST['colieutrinh'];
$nhom_kh = $_POST['nhom_kh'];
$msctkm = $_POST['msctkm'];
$ptgiam = $_POST['ptgiam'];
$mshh = $_POST['mshh'];
$msrang = $_POST['msrang'];
$ngayhen = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['ngayhen'])));
$giohen = $_POST['giohen'];
$idchidinh = 'RG' . date("dmyHis", time()) . rand(1000, 9999);
$db->add_banhang_line($mshs, $msdv, $msdn, $dienthoai, $soct, $idchidinh, $nhom_hh, $colieutrinh, $nhom_kh, $msctkm, $ptgiam, $mshh, $msnguoithan);
$db_nk->update_dichvu_rang($mshs, $msdv, $soct, $idchidinh, $msrang, $colieutrinh, $ngayhen, $giohen, '');
