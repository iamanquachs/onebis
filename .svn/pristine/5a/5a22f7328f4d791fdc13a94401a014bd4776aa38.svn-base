<?php
include('__include_connect.php');
require("../../modules/tiepnhanClass.php");

$db = new tiepnhan();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$sodienthoai = $_POST['sodienthoai'];
$soct = $_POST['soct'];

$db->update_henkhach($mshs, $msdv, $sodienthoai, $soct);
$db->update_ngaykham_benhnhan($mshs, $msdv, $sodienthoai, $soct);
