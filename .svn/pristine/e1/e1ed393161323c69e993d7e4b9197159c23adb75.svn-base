<?php
include('__include_connect.php');
require("../../modules/nhanvienClass.php");

$db = new nhanvien();
$db_sv = new nhanvien_control();
$msdn =  $_POST['sodienthoai'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$khoa = $_POST['trangthai'];
$admin = $_POST['admin'];
$loai_nv =  $_POST['loai_nv'];
$sodienthoai =  $_POST['sodienthoai'];
$matkhau =  md5($_POST['matkhau']);
$hoten =  $_POST['tennhanvien'];
$ngaysinh =  date('Y-m-d', strtotime(str_replace('/', '-', $_POST['ngaysinh'])));;
$gioitinh =  $_POST['gioitinh'];
$diachi =  $_POST['diachi'];
$email =  $_POST['email'];
$ngaytuyendung =  $_POST['ngaytuyendung'];
$luongtheogio =  $_POST['luongtheogio'];
$luongcoban =  $_POST['luongcoban'];
$cccd =  $_POST['cccd'];
// $loai_hd =  $_POST['loai_hd'];
$loai_hd =  1;
$mschucvu =  $_POST['chucvu'];

$db->add_nhanvien($khoa,$admin, $loai_nv, $msdn, $mshs, $msdv, $sodienthoai, $hoten, $ngaysinh, $gioitinh, $diachi, $email, $ngaytuyendung, $luongtheogio, $luongcoban, $cccd, $loai_hd, $mschucvu);
$db_sv->add_nhanvien_sv($msdn, $mshs, $msdv, $khoa, $sodienthoai, $matkhau);
