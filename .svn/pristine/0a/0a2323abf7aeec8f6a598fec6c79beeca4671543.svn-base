<?php
include('__include_connect.php');
require("../../modules/tiepnhanClass.php");

$db = new tiepnhan();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$sodienthoai = $_POST['sodienthoai'];
$soct = $_POST['soct'];
$tuvan = $_POST['tuvan'];
$ngaydat = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['ngaydat'])));
$thoigian = $_POST['thoigian'];

$ngayhen = $ngaydat . ' ' . $thoigian;
$db->update_khachdat($mshs, $msdv, $sodienthoai, $soct, $tuvan, $ngayhen);
