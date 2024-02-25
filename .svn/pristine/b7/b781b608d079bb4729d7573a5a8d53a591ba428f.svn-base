<?php
include('__include_connect.php');
require("../../modules/thuchiClass.php");


$db = new Thuchi();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$list = $db->load_nhanvien($mshs, $msdv);
header('Content-Type: application/json');
echo json_encode($list);
