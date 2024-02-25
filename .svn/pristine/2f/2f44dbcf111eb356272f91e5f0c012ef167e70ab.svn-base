<?php
include('__include_connect.php');
require("../../modules/xuatkhoClass.php");

$db = new xuatKho();
$msdn = $_COOKIE['msdn'];
$msdv = $_COOKIE['msdv'];
$db->delete_xuatkho_load_header_chua_update($msdn, $msdv);
$list = $db->xuatkho_load_header_chua_update();
header('Content-Type: application/json');
echo json_encode($list);
