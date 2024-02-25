<?php
include('__include_connect.php');
require("../../modules/tiepnhanClass.php");

$db = new tiepnhan();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msnv = $_POST['msnv'];
$rowidtc = $_POST['rowid'];
$soct =  $_POST['soct'];
$mslieutrinh =  $_POST['mslieutrinh'];
$db->add_nguoithuchien($rowidtc, $mshs, $msdv, $soct, $msnv, $mslieutrinh);
