<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");
require("../../modules/tiepnhanClass.php");

$db = new banhang();
$db_tn = new tiepnhan();

$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$soct = $_POST['soct'];

$db_tn->update_banhangline_donthuoc_dichvu($mshs, $msdv, $msdn, $soct, 'DV');
$db->update_banhangheader_donthuoc($mshs, $msdv, $soct);
