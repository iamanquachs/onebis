<?php
include('__include_connect.php');
require("../../modules/memberClass.php");

$db = new member();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$rowid =  $_POST['rowid'];

$list = $db->delete_phankhuc($mshs, $msdv, $rowid);
