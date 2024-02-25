<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$mshs = $_COOKIE['mshs'];
$dienthoai = $_POST['dienthoai'];
$list = $db->get_conno_khachhang($mshs, $dienthoai);
header('Content-Type: application/json');
echo json_encode($list);
