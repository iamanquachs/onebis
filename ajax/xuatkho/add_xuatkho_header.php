<?php

include('__include_connect.php');
require("../../modules/xuatkhoClass.php");

$db = new xuatKho();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = 'XK' . date("dmyHis", time()) . rand(1000, 9999);
$loaixuat = $_POST['loaixuat'];
$db->add_xuatkho_header($msdn, $mshs, $msdv,  $soct, $loaixuat);
header('Content-Type: application/json');
echo json_encode($soct);
