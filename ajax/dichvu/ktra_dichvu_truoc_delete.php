<?php
include('__include_connect.php');
require("../../modules/dichvuClass.php");

$db = new dichvu();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdichvu = $_POST['msdichvu'];

$list = $db->ktra_dichvu_co_trong_dichvu($mshs, $msdv, $msdichvu);
header('Content-Type: application/json');
echo json_encode($list);
