<?php
include('__include_connect.php');
require("../../modules/crmClass.php");
$db = new crm();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$soct = $_POST['soct'];
$rowid = $_POST['rowid'];
$noidung = $_POST['noidung'];
$trangthai = $_POST['trangthai'];

$db->edit_chitiet_crm($msdv,  $soct, $rowid, $noidung, $trangthai);
