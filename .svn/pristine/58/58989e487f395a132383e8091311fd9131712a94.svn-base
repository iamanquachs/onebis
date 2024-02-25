<?php
include('__include_connect.php');
require("../../modules/nhanvienClass.php");

$db = new nhanvien();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$tennv = $_COOKIE['hoten'];
$lydo = $_POST['lydo'];
$tungay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['tungay'])));
$denngay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['denngay'])));

$db->xinghiphep($mshs, $msdv, $msdn, $tennv,$lydo, $tungay, $denngay);

