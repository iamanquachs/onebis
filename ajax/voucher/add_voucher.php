<?php
include('__include_connect.php');
require("../../modules/voucherClass.php");

$db = new voucher();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$loaikh = $_POST['loaikh'];
$nhomkh = $_POST['nhomkh'];
$mavoucher = 'VC' . date("dmyHis", time()) . rand(1000, 9999);
if ($_POST['vitri'] == 'line') {
    $mavoucher = $_POST['msvoucher'];
}
$mskh = $_POST['mskh'];
$tenvoucher = $_POST['tenvoucher'];
$sotien = $_POST['sotien'];
$handung = date('Y/m/d', strtotime(str_replace('/', '-',  $_POST['handung'])));

if ($loaikh == 0) {
    $nhomkh = 'all';
    $db->add_voucher_all_kh($mshs, $msdv, $msdn,  $mavoucher, $tenvoucher, $sotien, $handung, $nhomkh);
}
if ($loaikh == 1) {
    $list_kh = $db->add_voucher_all_kh($mshs, $msdv, $msdn,  $mavoucher, $tenvoucher, $sotien, $handung, $nhomkh);
}
if ($loaikh == 2) {
    $db->add_voucher($mshs, $msdv, $msdn, $mskh, $mavoucher, $tenvoucher, $sotien, $handung);
}
