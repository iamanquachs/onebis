<?php
include('__include_connect.php');
require("../../modules/baocaoClass.php");

$db = new baocao();
$mshs = $_COOKIE['mshs'];
$msdv = $_POST['msdv'];
$loai = $_POST['loai'];
$tungay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['tungay'])));
$denngay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['denngay'])));
$stt = 1;
$list = $db->baocao_hoatdong($mshs, $msdv, $loai, $tungay, $denngay);

header('Content-Type: application/json');
echo json_encode($list);
