<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");

$db_bh = new banhang();
$msdn = $_COOKIE['msdn'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];

$db_bh->capnhat_trangthai_banhang_header($msdv, $msdn, $soct);
