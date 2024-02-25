<?php
include('__include_connect.php');
require("../../modules/thuchiClass.php");


$db = new Thuchi();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$soct = $_POST['soct'];
$ngay = $_POST['ngay'];
$mskh = '';
$tenkh = '';
$sotien = $_POST['sotien'];
$noidung = $_POST['noidung'];
$msnv = $_POST['maso'];
$tennv = $_POST['tenmaso'];
$sohd = '';
$nganquy = $_POST['nganquy'];
$khoanmuc = $_POST['khoanmuc'];
$loaichungtu = $_POST['loaichungtu'];
if ($loaichungtu == 1) {
    $sotien = -$sotien;
}
$list = $db->edit_thuchi($mshs, $msdv, $msdn, $soct, $ngay, $sotien, $noidung, $msnv, $tennv, $nganquy, $khoanmuc);
