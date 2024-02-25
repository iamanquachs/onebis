<?php
include('__include_connect.php');
require("../../modules/nhanvienClass.php");

$db = new nhanvien();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn =  $_POST['msdn'];
$manghiepvu =  $_POST['manghiepvu'];

$db->delete_chucnang($mshs, $msdv, $msdn, $manghiepvu);
