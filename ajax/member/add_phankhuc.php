<?php
include('__include_connect.php');
require("../../modules/memberClass.php");

$db = new member();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$tenloai = 'Phân khúc khách hàng';
$tenphanloai =  'Phân khúc khách hàng';
$msloai = 'DM' . date("dmyHis", time()) . rand(1000, 9999);
$tuoitu =  $_POST['tuoitu'];
$tuoiden =  $_POST['tuoiden'];

$list = $db->add_phankhuc( $mshs, $msdv, $msloai, $tenloai, $tenphanloai, $tuoitu, $tuoiden);
