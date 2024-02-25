<?php
include('__include_connect.php');
require("../../modules/xuatkhoClass.php");

$db = new xuatkho();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$soct = $_POST['soct'];
$tongcong = $_POST['tongcong'];
$loaixuat = $_POST['loaixuat'];

$tongcong = $_POST['tongcong'];
$db->update_xuatkho_header($mshs, $msdv, $msdn, $soct, $tongcong, $loaixuat);
