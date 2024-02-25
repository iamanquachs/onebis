<?php
include('__include_connect.php');
require("../../modules/danhmucClass.php");

$db = new danhmuc();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$phanloai =  $_POST['phanloai'];
$msloai =  $_POST['msloai'];
$tenloai = $_POST['tenloai'];
$dieukien1 = $_POST['dieukien1'];
$dieukien0 = $_POST['dieukien0'];

$list = $db->edit_danhmuc($mshs, $msdv, $msloai, $tenloai, $phanloai, $dieukien1, $dieukien0);
