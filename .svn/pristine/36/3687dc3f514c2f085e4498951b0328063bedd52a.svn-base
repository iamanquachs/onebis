<?php
include('__include_connect.php');
require("../../modules/thamsoClass.php");

$db = new thamso_control();
$mshs = $_POST['mshs'];
if ($mshs == '') {
    $mshs = $_COOKIE['mshs'];
}

$msdv = $_POST['msdv'];
if ($msdv == '') {
    $msdv = $_COOKIE['msdv'];
}
$msthamso =  $_POST['msthamso'];
$giatri =  $_POST['giatri'];
$db->edit_thamsohethong($mshs, $msdv, $msthamso, $giatri);
