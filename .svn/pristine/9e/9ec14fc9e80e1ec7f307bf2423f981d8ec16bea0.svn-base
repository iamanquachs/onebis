<?php
include('__include_connect.php');
require("../../modules/nhanvienClass.php");

$db = new nhanvien();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$loai = $_POST['loai'];
$thang = $_POST['thang'];
if ($loai == 'list_thang') {
    $list = $db->load_lichsu_thangnghi($mshs, $msdv, $msdn);
}
if ($loai == 'list_chitiet') {
    $list = $db->load_lichsu__chitiet_thangnghi($mshs, $msdv, $msdn, $thang);
}
header('Content-Type: application/json');
echo json_encode($list);
