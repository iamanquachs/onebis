<?php
include('__include_connect.php');
require("../../modules/voucherClass.php");

$db = new voucher();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$rowid = $_POST['rowid'];
$db->delete_voucher($msdv, $mshs, $rowid);
