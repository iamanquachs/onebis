<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");

$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$soct = $_POST['soct'];
$nhomhh = $_POST['nhomhh'];
$qltk = $_POST['qltk'];
$db->update_banhangline_donthuoc_dichvu($mshs, $msdv, $msdn,  $soct, $nhomhh);
$db->update_banhangheader_donthuoc($mshs, $msdv, $soct);
if ($qltk == 1) {
    $db->xuatkho_trukho($msdv, $soct);
}
