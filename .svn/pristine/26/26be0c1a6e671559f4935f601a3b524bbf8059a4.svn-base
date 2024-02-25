<?php
include('__include_connect.php');
require("../../modules/nhapkhoClass.php");

$db = new NhapKho();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$list = $db->load_nhacungcap($mshs, $msdv, 'loaixuat');
header('Content-Type: application/json');
echo json_encode($list);
