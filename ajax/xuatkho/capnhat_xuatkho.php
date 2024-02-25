<?php
include('__include_connect.php');
require("../../modules/xuatkhoClass.php");

$db = new xuatKho();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$db->capnhat_xuatkho($mshs, $msdv,$soct);
