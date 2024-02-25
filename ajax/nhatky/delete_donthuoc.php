<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");

$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$soct = $_POST['soct'];
$idchidinh = $_POST['idchidinh'];
$rowidtc = $_POST['rowidtc'];
$list = $db->delete_banhang_line($msdv, $soct, $idchidinh);
$db->update_banhangheader_donthuoc($mshs, $msdv, $soct);
$db->capnhat_trangthai_banhang_header($msdv, $msdn, $soct);
$db->delete_nhatky_thuchien($msdv, $soct, $rowidtc);
