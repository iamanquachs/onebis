<?php
include('__include_connect.php');
require("../../modules/nhatkyClass.php");

$db = new nhatky();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$rowid = $_POST['rowid'];
$noidung = $_POST['noidung'];

$db->edit_noidung($mshs, $msdv, $rowid, $noidung);
