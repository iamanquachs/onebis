<?php
include('__include_connect.php');
require("../../modules/chatClass.php");

$db = new chat();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$list = $db->load_soluong_tinnhan($mshs, $msdv);
header('Content-Type: application/json');
echo json_encode($list);
