<?php
include('__include_connect.php');
require("../../modules/nhatkyClass.php");
require("../../modules/banhangClass.php");

$db_bh = new banhang();
$db = new nhatky();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$db_bh->delete_banhangline_xoatam($mshs, $msdv, $soct);
