<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$list = $db->load_kehoachdieutri($msdv, $soct);

header('Content-Type: application/json');
echo json_encode($list);