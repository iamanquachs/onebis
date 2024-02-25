<?php
include('__include_connect.php');
require("../../modules/memberClass.php");

$db = new member();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$stt = 1;
$list = $db->load_phankhuc($mshs, $msdv);
header('Content-Type: application/json');
echo json_encode($list);