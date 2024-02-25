<?php
include('__include_connect.php');
require("../../modules/danhmucClass.php");

$db = new danhmuc();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$list = $db->load_phanloai($mshs, $msdv);
header('Content-Type: application/json');
echo json_encode($list);
