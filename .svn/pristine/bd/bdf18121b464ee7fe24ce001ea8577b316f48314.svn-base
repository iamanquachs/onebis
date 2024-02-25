<?php
include('__include_connect.php');
require("../../modules/crmClass.php");
$db = new crm();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$soct = $_POST['soct'];
$sodienthoai = $_POST['sodienthoai'];

$list = $db->load_line($msdv, $soct, $sodienthoai);
header('Content-Type: application/json');
echo json_encode($list);
