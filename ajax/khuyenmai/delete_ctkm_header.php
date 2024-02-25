<?php
include('__include_connect.php');
require("../../modules/khuyenmaiClass.php");

$db = new khuyenmai();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msctkm = $_POST['msctkm'];
$list = $db->delete_ctkm_header($mshs, $msdv, $msctkm);
