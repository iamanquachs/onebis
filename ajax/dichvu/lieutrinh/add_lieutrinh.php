<?php
include("../../../includes/config.php");
include("../../../includes/database.php");
include("../../../includes/database_sv.php");
require("../../../modules/dichvuClass.php");

$db = new dichvu();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];

$msdichvu = $_POST['msdichvu'];
$mslieutrinh = 'LT' . date("dmyHis", time()) . rand(1000, 9999);
$tenlieutrinh = $_POST['tenlieutrinh'];
$songay = $_POST['songay'];
$thutu = '0';
$list = $db->add_lieutrinh($msdn, $mshs, $msdv, $msdichvu, $mslieutrinh, $tenlieutrinh, $songay, $thutu);
