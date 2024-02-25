<?php
include('__include_connect.php');
require("../../modules/nhatkyClass.php");

$db = new nhatky();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msnv = $_COOKIE['msdn'];
$rowid =  $_POST['rowid'];
$soct =  $_POST['soct'];
$mslieutrinh =  $_POST['mslieutrinh'];

$list = $db->delete_nguoithuchien($mshs, $msdv, $msnv, $soct, $rowid, $mslieutrinh);
