<?php
include("../../../includes/config.php");
include("../../../includes/database.php");
include("../../../includes/database_sv.php");
require("../../../modules/dichvuClass.php");

$db = new dichvu();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$mslieutrinh_add = 'LT' . date("dmyHis", time()) . rand(1000, 9999);
$mslieutrinh = $_POST['mslieutrinh'];
$msdichvu = $_POST['msdichvu'];
$db->copy_lieutrinh($mshs, $msdv, $mslieutrinh_add, $mslieutrinh, $msdichvu);
