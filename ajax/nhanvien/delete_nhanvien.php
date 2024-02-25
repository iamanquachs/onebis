<?php
include('__include_connect.php');
require("../../modules/nhanvienClass.php");

$db = new nhanvien();
$db_sv = new nhanvien_control();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn =  $_POST['msdn'];

$db->delete_nhanvien($mshs, $msdv, $msdn);
$db_sv->delete_nhanvien_sv($mshs, $msdv, $msdn);
