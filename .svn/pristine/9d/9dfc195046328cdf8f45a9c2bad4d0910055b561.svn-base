<?php
include('__include_connect.php');
require("../../modules/khuyenmaiClass.php");

$db = new khuyenmai();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$khoa = $_POST['khoa'];
$msctkm = $_POST['msctkm'];
$list = $db->edit_ctkm_header($mshs, $msdv, $khoa, $msctkm);
