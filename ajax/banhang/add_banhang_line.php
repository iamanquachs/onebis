<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");

$db = new banhang();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$dienthoai = $_POST['dienthoai'];
$soct = $_POST['soct'];
$idchidinh = 'CD' . date("dmyHis", time()) . rand(1000, 9999);
$nhom_hh = $_POST['nhom_hh'];
$colieutrinh = $_POST['colieutrinh'];
$nhom_kh = $_POST['nhom_kh'];
$msctkm = $_POST['msctkm'];
$ptgiam = $_POST['ptgiam'];
$mshh = $_POST['mshh'];
$msnguoithan = $_POST['msnguoithan'];
$at_dieutour = $_POST['at_dieutour'];

$db->add_banhang_line($mshs, $msdv, $msdn, $dienthoai, $soct, $idchidinh, $nhom_hh, $colieutrinh, $nhom_kh, $msctkm, $ptgiam, $mshh, $msnguoithan);
    