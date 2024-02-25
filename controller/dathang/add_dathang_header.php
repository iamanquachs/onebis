<?php
require('modules/dathangClass.php');
$db = new dathang();
$data = json_decode(file_get_contents('php://input'), true);
$list = $db->add_dathang_header($data['msdn'], $data['mshs'], $data['msdv'], $data['soct'], $data['mskh'], $data['tenkh'], $data['sodienthoai'], $data['tongcong'], $data['trangthai']);
header('Content-Type: application/json');
header("HTTP/1.0 200 OK");
echo json_encode('200') . "\n";
