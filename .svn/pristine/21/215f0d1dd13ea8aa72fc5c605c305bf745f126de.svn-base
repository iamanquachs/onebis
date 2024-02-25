<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");
$db = new banhang();
$msdv = $_COOKIE['msdv'];
$list = $db->load_nhanvien_in_banhang($msdv);
header('Content-Type: application/json');
echo json_encode($list);
