<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$list = $db->load_loai_dathen($msdv, $soct);
header('Content-Type: application/json');
echo json_encode($list);
