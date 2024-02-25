<?php
include('__include_connect.php');
require("../../modules/thamsoClass.php");

$db = new thamso_control();

$mshs = $_POST['mshs'];
if ($mshs == '') {
    $mshs = $_COOKIE['mshs'];
}

$msdv = $_POST['msdv'];
if ($msdv == '') {
    $msdv = $_COOKIE['msdv'];
}
$msthamso =  $_POST['msthamso'];
$list = $db->load_thamsohethong($mshs, $msdv, $msthamso);
header('Content-Type: application/json');
echo json_encode($list);
