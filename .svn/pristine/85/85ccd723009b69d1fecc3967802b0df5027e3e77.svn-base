<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");

$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$idchidinh = $_POST['idchidinh'];
$soluong = $_POST['soluong'];
$cachdung = $_POST['cachdung'];

$list = $db->edit_donthuoc($mshs, $msdv, $soct, $idchidinh, $soluong, $cachdung);
