<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");

$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$hoten = $_COOKIE['hoten'];
$soct = $_POST['soct'];
$sodienthoai = $_POST['sodienthoai'];
$loai = $_POST['loai'];
$maso = $_POST['maso'];
$yeucau = $_POST['yeucau'];
$ten = $_POST['ten'];
if ($loai == 'MS') {
    if ($yeucau == 'true') {
        $db->add_yeucau($mshs, $msdv, '0', $soct, $sodienthoai, $msdn, $hoten, $maso, $ten, $loai);
    } else {
        $db->delete_yeucau($mshs, $msdv, $soct, $sodienthoai,  $maso);
    }
} else {
    $db->update_yeucau($mshs, $msdv, $soct, $sodienthoai,  $maso, $ten, $loai);
}
