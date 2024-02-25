<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");

$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$loai = $_POST['loai'];
$list = $db->huy_donthuoc_dichvu($mshs, $msdv, $soct, $loai);
