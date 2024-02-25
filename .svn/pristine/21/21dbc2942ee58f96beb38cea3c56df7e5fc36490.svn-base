<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");
$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$rowid = $_POST['rowid'];
$list = $db->load_nhanvien_yeucau($mshs, $msdv, $rowid);
header('Content-Type: application/json');
echo json_encode($list);
