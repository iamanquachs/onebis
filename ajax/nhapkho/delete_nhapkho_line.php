<?php
include('__include_connect.php');
require("../../modules/nhapkhoClass.php");

$db = new NhapKho();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$rowid = $_POST['rowid'];
$db->delete_nhapkho_line($mshs, $msdv,$soct, $rowid);
