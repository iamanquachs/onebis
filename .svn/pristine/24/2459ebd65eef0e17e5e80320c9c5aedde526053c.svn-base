<?php
include('__include_connect.php');
require("../../modules/nhapkhoClass.php");

$db = new NhapKho();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$db->delete_nhapkho($mshs, $msdv,$soct);
