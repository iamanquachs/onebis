<?php
require('modules/dathangClass.php');
$db = new dathang();
$data = json_decode(file_get_contents('php://input'), true);
$list = $db->add_dathang_line($data['mshs'], $data['msdv'], $data['msdn'], $data['dienthoai'], $data['soct'], $data['idchidinh'], $data['nhom_hh'], $data['colieutrinh'], $data['nhom_kh'], $data['msctkm'], $data['ptgiam'], $data['mshh']);
header('Content-Type: application/json');
header("HTTP/1.0 200 OK");
echo json_encode('200') . "\n";
