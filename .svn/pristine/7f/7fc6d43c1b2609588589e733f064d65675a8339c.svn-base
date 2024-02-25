<?php
include('__include_connect.php');
require("../../modules/nhatkyClass.php");

$db = new nhatky();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$stt = 1;
$list = $db->load_chidinh_dichvu_rang($mshs, $msdv, $soct);
header('Content-Type: application/json');
echo json_encode($list);
