<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");

$db = new banhang();
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$soct = $_POST['soct'];
$idchidinh = $_POST['idchidinh'];
$list = $db->delete_banhangheader($msdv, $msdn, $soct, $idchidinh);
header('Content-Type: application/json');
echo json_encode($list);

