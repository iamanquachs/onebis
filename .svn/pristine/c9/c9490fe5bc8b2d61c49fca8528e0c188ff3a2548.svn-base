<?php
include('__include_connect.php');
require("../../modules/khachhangClass.php");

$db = new khachhang();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$mavoucher = 'VC' . date("dmyHis", time()) . rand(1000, 9999);
$tenvoucher = $_POST['tenvoucher'];
$sotien = $_POST['sotien'];
$handung = date('Y/m/d', strtotime(str_replace('/', '-',  $_POST['handung'])));
$search = $_POST['search'];
$ngaysn = $_POST['ngaysn'];
$nhom = $_POST['nhom'];
$db->add_voucher($mshs, $msdv, $msdn, $mavoucher, $tenvoucher, $sotien, $handung, $search, $ngaysn, $nhom);
