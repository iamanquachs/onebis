<?php
include('__include_connect.php');
require("../../modules/crmClass.php");
$db = new crm();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$soct = 'CRM' . date("dmyHis", time()) . rand(1000, 9999);;
$dienthoai = $_POST['dienthoai'];
$hoten = $_POST['hoten'];
$noidung = $_POST['noidung'];
$clh = $db->load_danhmuc($mshs, $msdv, 'CLH')[0]->msloai;

$db->add_crm_header($mshs, $msdv, $msdn, $soct, $dienthoai, $hoten, $noidung, $clh);
