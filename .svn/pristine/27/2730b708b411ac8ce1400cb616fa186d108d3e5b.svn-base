<?php
include('__include_connect.php');
require("../../modules/baocaoClass.php");

$db = new baocao();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$msctkm = 'KM' . date("dmyHis", time()) . rand(1000, 9999);
$tenctkm = $_POST['tenctkm'];
$ptgiam = $_POST['ptgiam'];
$handung_tungay = date('Y/m/d', strtotime(str_replace('/', '-', $_POST['handung_tungay'])));
$handung_denngay = date('Y/m/d', strtotime(str_replace('/', '-', $_POST['handung_denngay'])));
$tungay = date('Y/m/d', strtotime(str_replace('/', '-', $_POST['tungay'])));
$denngay = date('Y/m/d', strtotime(str_replace('/', '-', $_POST['denngay'])));
$db->add_ctkm($mshs, $msdv, $msdn, $msctkm, $tenctkm, $ptgiam, $handung_tungay, $handung_denngay, $tungay, $denngay);

