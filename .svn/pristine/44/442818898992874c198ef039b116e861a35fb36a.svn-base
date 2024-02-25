<?php
include('__include_connect.php');
require("../../modules/nhanvienClass.php");

$db = new nhanvien();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$rowid = $_POST['rowid'];
$loai = $_POST['loai'];
$trangthai='1';
if($loai == 'tuchoi'){
    $trangthai = '2';
}

$db->duyet_nghiphep($mshs, $msdv, $msdn, $rowid,$trangthai);

