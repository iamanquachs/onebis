<?php
include('__include_connect.php');
require("../../modules/xuatkhoClass.php");

$db = new xuatkho();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$tungay = date('Y-m-d');
$dengay = date('Y-m-d');
$loai = $_POST['loai'];
$db->lay_tonkho_baocao($mshs, $msdv, $tungay, $dengay, $loai);
