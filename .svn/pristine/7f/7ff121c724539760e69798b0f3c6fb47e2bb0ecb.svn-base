<?php
include('__include_connect.php');
require("../../modules/crmClass.php");
$db = new crm();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$sodienthoai = $_POST['sodienthoai'];
$list = $db->load_select($msdv, $sodienthoai);
header('Content-Type: application/json');
echo json_encode($list);
