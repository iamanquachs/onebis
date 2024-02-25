<?php
include('__include_connect.php');
require("../../modules/baocaoClass.php");

$db = new baocao();
$mshs = $_COOKIE['mshs'];
$msdv = $_POST['msdv'];
$list = $db->list_namhoatdong($mshs, $msdv);
header('Content-Type: application/json');
echo json_encode($list);
