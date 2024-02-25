<?php
include('__include_connect.php');
require("../../modules/dathangClass.php");


$db = new dathang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];

$list = $db->load_qr_code_dathang($mshs, $msdv, $soct);
header('Content-Type: application/json');
echo json_encode($list);
