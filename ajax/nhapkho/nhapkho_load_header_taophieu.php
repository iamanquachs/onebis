<?php
include('__include_connect.php');
require("../../modules/nhapkhoClass.php");

$db = new NhapKho();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];

$list = $db->nhapkho_load_header_taophieu($mshs, $msdv,$soct);
header('Content-Type: application/json');
echo json_encode($list);
