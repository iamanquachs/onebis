<?php
include('__include_connect.php');
require("../../modules/danhmucClass.php");

$db = new danhmuc();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$id_danhmuc = $_POST['id_danhmuc'];
$msloai = $id_danhmuc . date("dmyHis", time()) . rand(1000, 9999);
$tenloai = $_POST['tendanhmuc'];
$phanloai =  $_POST['phanloai'];
$tenphanloai =  $_POST['tenphanloai'];
$dieukien1 =  $_POST['loai'];
$dieukien0 =  $_POST['dieukien0'];

$list = $db->add_danhmuc($mshs, $msdv, $msloai, $tenloai, $phanloai, $tenphanloai, $dieukien1, $dieukien0);
