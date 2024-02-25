<?php
include('__include_connect.php');
require("../../modules/danhmucClass.php");

$db = new danhmuc();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msloai =  $_POST['msloai'];
$phanloai =  $_POST['phanloai'];

$list = $db->delete_danhmuc($mshs, $msdv, $msloai, $phanloai);
