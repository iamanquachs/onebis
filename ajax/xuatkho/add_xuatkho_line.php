<?php
include('__include_connect.php');
require("../../modules/xuatkhoClass.php");

$db = new xuatkho();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$soct = $_POST['soct'];
$mshh = $_POST['mshh'];
$tenhh = $_POST['tenhh'];
$solo = $_POST['solo'];
$soluong = $_POST['soluong'];
$pttichluy = $_POST['pttichluy'];
$dvt = $_POST['dvt'];
$thuesuat = $_POST['thuesuat'];
$giaban = $_POST['giaban'];
$giagoc = $_POST['giagoc'];
$ptgiam = $_POST['ptgiam'];
$handung = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['handung'])));
$msctkm = $_POST['msctkm'];
$msncc = $_POST['msncc'];
$loai_xuat = $_POST['loai_xuat'];
$rowid_tonkho = '';

$list_tonkho = $db->lay_tonkho_baocao($mshs, $msdv, date('Y-m-d'), date('Y-m-d'), 'CN');

$gianhapcothue = 0;
for ($i = 0; $i < count($list_tonkho); $i++) {
    if ($list_tonkho[$i]->mshh == $mshh && $list_tonkho[$i]->solo == $solo) {
        $gianhapcothue = $list_tonkho[$i]->gianhapcothue;
    }
}
$db->add_xuatkho_line($rowid_tonkho, $mshs, $msdv, $msdn, $msncc, $soct, $mshh, $tenhh, $dvt, $solo, $handung, $soluong, $msctkm, $gianhapcothue, $giagoc, $ptgiam, $giaban, $thuesuat, $pttichluy, $loai_xuat);
