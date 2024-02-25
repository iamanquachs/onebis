<?php
include('__include_connect.php');
require("../../modules/donviClass.php");

$db = new donvi_control();
$mshs = $_POST['mshs'];
$msdv = $_POST['msdv'];
$db->xacnhan_giahan($mshs, $msdv);

