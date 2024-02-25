<?php
include('__include_connect.php');
require("../../modules/danhmucClass.php");

$db = new danhmuc();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$phanloai =  $_POST['phanloai'];
$dieukien =  '';
$list = $db->load_danhmuc($mshs, $msdv, $phanloai, $dieukien);
header('Content-Type: application/json');
echo json_encode($list);
