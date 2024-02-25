<?php
include('__include_connect.php');
require("../../modules/danhmucClass.php");

$db = new danhmuc();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$phanloai = $_POST['phanloai'];
$list = $db->load_phanloai_theophanloai($mshs, $msdv,  $phanloai);
header('Content-Type: application/json');
echo json_encode($list);
