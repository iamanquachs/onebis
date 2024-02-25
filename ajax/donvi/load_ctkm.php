<?php
include('__include_connect.php');
require("../../modules/donviClass.php");

$db = new donvi_control();
$query = $_POST['query'];
$list = $db->load_ctkm($query);
header('Content-Type: application/json');
echo json_encode($list);
