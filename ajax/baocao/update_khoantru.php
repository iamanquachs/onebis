<?php
include('__include_connect.php');
require("../../modules/baocaoClass.php");

$db = new baocao();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$rowid = $_POST['rowid'];
$sotien = $_POST['sotien'];
$db->update_khoantru($mshs, $msdv, $rowid, $sotien);

