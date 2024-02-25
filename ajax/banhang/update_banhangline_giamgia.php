<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$idchidinh = $_POST['idchidinh'];
$ptgiam = $_POST['ptgiam'];
$db->update_banhangline_giamgia($mshs, $msdv, $msdn, $soct, $idchidinh, $ptgiam);
