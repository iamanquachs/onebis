<?php
include('__include_connect.php');
require("../../modules/thuchiClass.php");

$db = new thuchi();
$msdn = $_COOKIE['msdn'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$socttc = $_POST['socttc'];
$sotien = $_POST['sotien'];
$list = $db->delete_thuchi($msdv, $msdn, $soct, $socttc, $sotien);
header('Content-Type: application/json');
echo json_encode($list);
