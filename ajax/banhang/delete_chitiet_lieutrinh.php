<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$idchidinh = $_POST['idchidinh'];
$mshh = $_POST['mshh'];
$db->delete_chitiet_lieutrinh($msdv, $soct, $idchidinh, $mshh);

