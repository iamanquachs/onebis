<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");

$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$soct = $_POST['soct'];
$rowid = $_POST['rowid'];
$mslieutrinh = $_POST['mslieutrinh'];
$msmota = $_POST['msmota'];
$thuchien = 2;
$db->update_hoantat_lieutrinh($mshs, $msdv, $soct, $rowid, $mslieutrinh);
$ktra = $db->ktr_hoantat_lieutrinh($mshs, $msdv, $soct, $rowid, $mslieutrinh);
if ($ktra[0]->lieutrinh == 0) {
    $thuchien = 3;
}

$list = $db->update_banhangline_hoanthanh_dichvu($mshs, $msdv, $soct, $rowid, $mslieutrinh, $thuchien, $msmota);
$db->update_trangthai_banhang_header($mshs, $msdv, $msdn, $soct, 3);
