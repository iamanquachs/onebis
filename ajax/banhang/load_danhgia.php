<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$sdt = $_POST['sdt'];
$mshh = $_POST['mshh'];

$list = $db->load_danhgia($mshs, $msdv, $sdt, $mshh);
header('Content-Type: application/json');
echo json_encode($list);
