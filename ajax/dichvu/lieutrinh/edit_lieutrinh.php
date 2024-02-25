<?php
include("../../../includes/config.php");
include("../../../includes/database.php");
include("../../../includes/database_sv.php");
require("../../../modules/dichvuClass.php");

$db = new dichvu();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];

$mslieutrinh = $_POST['mslieutrinh'];
$tenlieutrinh = $_POST['tenlieutrinh'];
$songay = $_POST['songay'];
$list = $db->edit_lieutrinh($mshs, $msdv, $mslieutrinh, $tenlieutrinh, $songay);
