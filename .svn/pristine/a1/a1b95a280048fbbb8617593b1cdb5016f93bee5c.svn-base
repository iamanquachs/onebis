<?php
include('__include_connect.php');
require("../../modules/nhanvienClass.php");

$db = new nhanvien();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn =  $_COOKIE['msdn'];
$rowid =  $_POST['rowid'];

$db->delete_nghiphep($mshs, $msdv, $msdn, $rowid);
