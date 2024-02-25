<?php
include('__include_connect.php');
require("../../modules/baocaoClass.php");

$db = new baocao();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$msnv = $_POST['msnv'];
$sophieuthu = $_POST['sophieuthu'];
$sophieuchi = $_POST['sophieuchi'];


$db->delete_thuchi_luong($mshs, $msdv, $msnv, $sophieuthu);
$db->delete_thuchi_luong($mshs, $msdv, $msnv, $sophieuchi);
