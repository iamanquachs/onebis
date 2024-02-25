<?php
include('__include_connect.php');
require("../../modules/crmClass.php");
$db = new crm();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$soct = $_POST['soct'];
$noidung = $_POST['noidung'];
$trangthai = $_POST['trangthai'];

$db->add_crm_line($msdv, $msdn, $soct, $trangthai, $noidung);
