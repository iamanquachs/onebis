<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$mslieutrinh = $_POST['mslieutrinh'];

$list = $db->ktr_dichvu_co_cunglieutrinh($mshs, $msdv, $soct, $mslieutrinh);
header('Content-Type: application/json');
echo json_encode($list);
