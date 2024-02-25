<?php
include('__include_connect.php');
require("../../modules/xuatkhoClass.php");

$db = new xuatkho();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$mshh = $_POST['mshh'];
$thamso_qltk = $_POST['thamso_qltk'];
$list_pttichluy = $db->get_pttichluy_by_mshh($mshs, $msdv, $mshh);
$list_tonkho = 0;
header('Content-Type: application/json');
echo json_encode($list_pttichluy);
