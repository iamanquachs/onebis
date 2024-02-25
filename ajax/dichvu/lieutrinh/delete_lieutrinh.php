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
$mslieutrinh = $_POST['mslieutrinh'];

$list = $db->delete_lieutrinh($mshs, $msdv, $msdichvu, $mslieutrinh);
