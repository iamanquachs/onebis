<?php
include('__include_connect.php');
require("../../modules/tiepnhanClass.php");

$db = new tiepnhan();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$sodienthoai = $_POST['sodienthoai'];
$soct = $_POST['soct'];
$ngayhientai = '0000-00-00';

$db->update_ngaykham_benhnhan($mshs, $msdv, $sodienthoai,  $ngayhientai,'');
$db->delete_banhang_header($mshs, $msdv, $soct);
