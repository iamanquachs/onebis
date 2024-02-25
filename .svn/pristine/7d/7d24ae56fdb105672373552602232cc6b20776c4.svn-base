<?php
include('__include_connect.php');
require("../../modules/xuatkhoClass.php");

$db = new xuatKho();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$rowid = $_POST['rowid'];
$db->delete_xuatkho_line($mshs, $msdv, $soct,$rowid);
