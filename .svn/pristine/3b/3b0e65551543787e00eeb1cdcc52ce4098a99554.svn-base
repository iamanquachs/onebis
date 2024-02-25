<?php
include('__include_connect.php');
require("../../modules/nhatkyClass.php");

$db = new nhatky();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msnv = $_COOKIE['msdn'];
$tennv = $_COOKIE['hoten'];
$rowid = $_POST['rowid'];
$mshh = $_POST['mshh'];
$sodienthoai = $_POST['sodienthoai'];
$soct = $_POST['soct'];
$noidung = $_POST['noidung'];
$loai = $_POST['loai'];

$db->add_noidung($mshs, $msdv, $rowid, $sodienthoai, $soct, $msnv, $tennv, $mshh, $noidung, $loai);
