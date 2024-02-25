<?php
include("../../../includes/config.php");
include("../../../includes/database.php");
include("../../../includes/database_sv.php");
require("../../../modules/nhatkyClass.php");

$db = new nhatky();

$rowid = $_POST['rowid'];
$list = $db->load_image($rowid);
header('Content-Type: application/json');
echo json_encode($list);
