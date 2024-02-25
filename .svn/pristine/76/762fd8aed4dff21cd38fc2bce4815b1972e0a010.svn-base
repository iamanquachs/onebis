<?php
include('__include_connect.php');
require("../../modules/xuatkhoClass.php");

$db = new xuatKho();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$list = $db->xuatkho_tinhtong($mshs, $msdv, $soct);
header('Content-Type: application/json');
echo json_encode($list);
