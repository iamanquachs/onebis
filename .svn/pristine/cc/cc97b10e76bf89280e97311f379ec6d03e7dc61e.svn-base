<?php
include('__include_connect.php');
require("../../modules/nhatkyClass.php");

$db = new nhatky();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msnv = $_COOKIE['msdn'];
$rowidtc = $_POST['rowid'];
$ktra = $db->ktra_nguoithuchien($msnv, $rowidtc);
header('Content-Type: application/json');
if (count($ktra) == 0) {
    echo 200;
} else {
    echo 400;
}
