<?php
include('__include_connect.php');
require("../../modules/khuyenmaiClass.php");

$db = new khuyenmai();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$khoa = $_POST['khoa'];
$rowid = $_POST['rowid'];
$list = $db->edit_chitiet_ctkm($mshs, $msdv, $khoa, $rowid);
