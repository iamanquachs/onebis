<?php
include('__include_connect.php');
require("../../modules/dathangClass.php");

$db = new dathang();
$msdv = $_COOKIE['msdv'];
$mshs = $_COOKIE['mshs'];
$soct = $_POST['soct'];
$idchidinh = $_POST['idchidinh'];
$list = $db->delete_dathang_line($mshs, $msdv, $soct, $idchidinh);
header('Content-Type: application/json');
echo json_encode($list);
