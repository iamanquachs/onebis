<?php
include('__include_connect.php');
require("../../modules/thamsoClass.php");

$db = new thamso_control();

$list = $db->load_nganhang();
header('Content-Type: application/json');
echo json_encode($list);
