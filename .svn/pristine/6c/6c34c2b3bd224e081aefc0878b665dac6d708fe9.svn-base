<?php
include('__include_connect.php');
require("../../modules/hanghoaClass.php");

$db = new hanghoa();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$loai = $_POST['loai'];
$thamso = $_POST['thamso'];
if ($loai == 'hethan') {
    $list = $db->load_hanghoa_hethan($mshs, $msdv, $thamso);
}
if ($loai == 'vuotdinhmuc') {
    $list = $db->load_hanghoa_vuotdinhmuc($mshs, $msdv);
}
header('Content-Type: application/json');
echo json_encode($list);
