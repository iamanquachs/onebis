<?php
include('__include_connect.php');
require("../../modules/donviClass.php");

$db = new donvi_control();
$where = $_POST['where'];
$group = $_POST['group'];
$list = $db->load_dmtinh($group, $where);
header('Content-Type: application/json');
echo json_encode($list);
