<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$idchidinh = $_POST['idchidinh'];
$mshh = $_POST['mshh'];
$tenhh = $_POST['tenhh'];
$ngayhen = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['ngayhen'])));
$giohen = $_POST['giohen'];
$db->edit_chitiet_lieutrinh($msdv, $soct, $idchidinh, $mshh, $tenhh, $ngayhen, $giohen);
