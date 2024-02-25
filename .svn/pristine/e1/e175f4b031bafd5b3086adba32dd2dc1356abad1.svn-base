<?php
include("../../../includes/config.php");
include("../../../includes/database.php");
include("../../../includes/database_sv.php");
require("../../../modules/dichvuClass.php");

$db = new dichvu();
$mshs = $_COOKIE['mshs'];

$msdichvu = $_POST['msdichvu'];
$list = $db->load_image($msdichvu);
header('Content-Type: application/json');
echo json_encode($list);
