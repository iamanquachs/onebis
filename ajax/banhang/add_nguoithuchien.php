<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$rowid = $_POST['rowid'];
$tennv = $_POST['tennv'];
$db->add_nguoithuchien($mshs, $msdv, $rowid, $tennv);
