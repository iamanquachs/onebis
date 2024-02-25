<?php
include('__include_connect.php');
require("../../modules/baocaoClass.php");

$db = new baocao();
$mshs = $_COOKIE['mshs'];
$msdv = $_POST['msdv'];
$nam = $_POST['nam'];
$loai = $_POST['loai'];
if ($loai == 'theonam') {
    $list = $db->baocao_hoatdong_theonam($mshs, $msdv, $nam);
}
if ($loai == 'cautruc') {
    $list = $db->chart_baocao_hoatdong_cautruc_chiphi($mshs, $msdv, $nam);
}
header('Content-Type: application/json');
echo json_encode($list);
