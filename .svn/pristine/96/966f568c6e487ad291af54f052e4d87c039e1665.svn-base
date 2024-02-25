<?php

include('__include_connect.php');
require("../../modules/nhapkhoClass.php");

$db = new NhapKho();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = 'NK' . date("dmyHis", time()) . rand(1000, 9999);
$db->nhapkho_add_header($msdn, $mshs, $msdv,  $soct);
header('Content-Type: application/json');
echo json_encode($soct);
