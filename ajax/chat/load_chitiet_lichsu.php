<?php
include('__include_connect.php');
require("../../modules/chatClass.php");

$db = new chat();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$list = $db->load_chitiet_lichsu($mshs, $msdv, $soct);
header('Content-Type: application/json');
echo json_encode($list);
