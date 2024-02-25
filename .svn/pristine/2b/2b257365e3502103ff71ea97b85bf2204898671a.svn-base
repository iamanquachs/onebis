<?php
include('__include_connect.php');
require("../../modules/khuyenmaiClass.php");

$db = new khuyenmai();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$rowid = $_POST['rowid'];
$list = $db->delete_chitiet_ctkm($mshs, $msdv, $rowid);
