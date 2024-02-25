<?php
include('__include_connect.php');
require("../../modules/tiepnhanClass.php");

$db = new tiepnhan();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$rowid = $_POST['rowid'];

$list = $db->load_nhanvien_thuchien($mshs, $msdv, $rowid);
header('Content-Type: application/json');
echo json_encode($list);
