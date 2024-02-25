<?php
include('__include_connect.php');
require("../../modules/nhatkyClass.php");

$db = new nhatky();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$sodienthoai = $_POST['sodienthoai'];

$list = $db->load_lichsu_dieutri_rang($mshs, $msdv, $sodienthoai);
header('Content-Type: application/json');
echo json_encode($list);
