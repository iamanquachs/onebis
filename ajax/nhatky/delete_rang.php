<?php
include('__include_connect.php');
require("../../modules/nhatkyClass.php");
require("../../modules/banhangClass.php");

$db_bh = new banhang();
$db = new nhatky();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$soct = $_POST['soct'];
$msrang = $_POST['msrang'];
$rowidtc = explode('-', $_POST['rowidtc']);
$list = $db->delete_rang($mshs, $msdv, $soct, $msrang);
for ($i = 0; $i < count($rowidtc); $i++) {
    $db_bh->delete_nhatky_thuchien($msdv, $soct, $rowidtc[$i]);
}
$db_bh->capnhat_trangthai_banhang_header($msdv, $msdn, $soct);
