<?php
include('__include_connect.php');
require("../../modules/khachhangClass.php");

$db = new khachhang();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$sodienthoai = $_POST['sodienthoai'];
$ms_nguoithan = $_POST['ms_nguoithan'];
$ten_nguoithan = $_POST['ten_nguoithan'];
$gioitinh_nguoithan = $_POST['gioitinh_nguoithan'];
$ngaysinh_nguoithan = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['ngaysinh_nguoithan'])));;
 $db->add_nguoithan($msdn, $mshs, $msdv, $sodienthoai, $ms_nguoithan, $ten_nguoithan, $gioitinh_nguoithan, $ngaysinh_nguoithan);
