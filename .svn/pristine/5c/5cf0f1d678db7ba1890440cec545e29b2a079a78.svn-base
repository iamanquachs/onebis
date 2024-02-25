<?php
include("../../../includes/config.php");
include("../../../includes/database.php");
include("../../../includes/database_sv.php");
require("../../../modules/hanghoaClass.php");

$db = new hanghoa();

$mshh = $_POST['mshh'];
$list = $db->load_image($mshh);
header('Content-Type: application/json');
echo json_encode($list);
