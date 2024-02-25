<?php
include('__include_connect.php');
require("../../modules/quanlytaisanClass.php");

$db = new quanlytaisan();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$soct = $_POST['soct'];
$mshh = $_POST['mshh'];
$loai = $_POST['loai'];
$db->update_hososudungtaisan($msdn, $mshs, $msdv, $soct, $mshh, $loai);
