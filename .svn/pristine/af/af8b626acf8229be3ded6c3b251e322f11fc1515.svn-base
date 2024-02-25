<?php
include('__include_connect.php');
require("../../modules/nhatkyClass.php");

$db = new nhatky();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msnv = $_COOKIE['msdn'];
$rowidtc = $_POST['rowid'];
$soct =  $_POST['soct'];
$mslieutrinh =  $_POST['mslieutrinh'];
$db->add_nguoithuchien($rowidtc, $mshs, $msdv, $soct, $msnv, $mslieutrinh);
