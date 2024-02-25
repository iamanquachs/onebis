<?php
include('__include_connect.php');
require("../../modules/crmClass.php");
$db = new crm();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];

$list = $db->load_thongbao_crm($mshs, $msdv);
header('Content-Type: application/json');
echo json_encode($list);
