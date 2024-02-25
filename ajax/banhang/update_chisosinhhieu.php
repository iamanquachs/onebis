<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$mach = $_POST['mach'];
$nhietdo = $_POST['nhietdo'];
$huyetap = $_POST['huyetap'];
$nhiptho = $_POST['nhiptho'];
$chieucao = $_POST['chieucao'];
$cannang = $_POST['cannang'];
$db->update_chisosinhhieu($mshs, $msdv, $soct, $mach, $nhietdo, $huyetap, $nhiptho, $chieucao, $cannang);
