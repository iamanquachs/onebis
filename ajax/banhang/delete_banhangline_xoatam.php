<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$db->delete_banhangline_xoatam($mshs, $msdv, $soct);
header('Content-Type: application/json');
echo json_encode($soct);
