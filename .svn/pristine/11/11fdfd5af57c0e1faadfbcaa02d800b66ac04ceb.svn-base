<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$tuvan = $_POST['tuvan'];
$db->update_tuvan($mshs, $msdv, $soct, $tuvan);
