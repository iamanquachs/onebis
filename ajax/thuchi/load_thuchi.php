<?php
include('__include_connect.php');
require("../../modules/thuchiClass.php");

$db = new thuchi();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$tungay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['tungay'])));
$denngay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['denngay'])));
$valueSearch = $_POST['valueSearch'];
$locloai = $_POST['locloai'];
$khoanmuc = $_POST['khoanmuc'];
$list = $db->load_thuchi($mshs, $msdv, $valueSearch, $tungay, $denngay, $locloai, $khoanmuc);
header('Content-Type: application/json');
echo json_encode($list);
