<?php
include('__include_connect.php');
require("../../modules/donviClass.php");

$db = new donvi_control();
$msdv = $_POST['msdv'];
$trangthai = $_POST['trangthai'];
$list = $db->set_trangthai_msdv($msdv, $trangthai);
