<?php
include('__include_connect.php');
require("../../modules/chatClass.php");

$db = new chat();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$old_soct = $_POST['old_soct'];
$list = $db->load_lichsu($mshs, $msdv);
header('Content-Type: application/json');
echo json_encode($list);

