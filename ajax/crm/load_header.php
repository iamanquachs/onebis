<?php
include('__include_connect.php');
require("../../modules/crmClass.php");
$db = new crm();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$trangthai = $_POST['trangthai'];
$nhanvien = $_POST['nhanvien'];
$dht = $db->load_danhmuc($mshs, $msdv, 'DHT')[0]->msloai;
$list = $db->load_header($msdv, $trangthai, $nhanvien,$dht);
header('Content-Type: application/json');
echo json_encode($list);
