<?php
include('__include_connect.php');
require("../../modules/nhapkhoClass.php");

$db = new NhapKho();
$mshs = $_COOKIE['mshs'];
$msdn = $_COOKIE['msdn'];
$msdv = $_COOKIE['msdv'];
$db->delete_nhapkho_load_header_chua_update($msdn,$mshs, $msdv);
$list = $db->nhapkho_load_header_chua_update($mshs, $msdv);
header('Content-Type: application/json');
echo json_encode($list);
