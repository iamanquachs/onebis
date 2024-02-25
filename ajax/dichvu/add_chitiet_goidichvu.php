<?php
include('__include_connect.php');
require("../../modules/dichvuClass.php");

$db = new dichvu();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdichvu = $_POST['msdichvu'];
if ($msdichvu == '') {
    $msdichvu = 'GD' . date("dmyHis", time()) . rand(1000, 9999);
}
$mslieutrinh = 'KL' . date("dmyHis", time()) . rand(1000, 9999);
$lieutrinh = '2';
$mshh = $_POST['mshh'];
$tenhh = $_POST['tenhh'];
$soluong = $_POST['soluong'];
$dongia = $_POST['dongia'];
$ptthuchien = $_POST['ptthuchien'];
$phanbo = $_POST['phanbo'];


if ($mshh == "DV0000000000000001") {
    $dongia = -$dongia;
}

$db->add_chitiet_lieutrinh($msdn, $mshs, $msdv, $msdichvu, $mslieutrinh, $mshh, $tenhh, $soluong, $dongia, '', $ptthuchien);
$ktra_dv_comota = $db->ktra_dv_comota($mshs, $msdv, $mshh);
if (count($ktra_dv_comota) > 0) {
    $db->add_mota_dichvu($mshs, $msdv, $msdichvu, $ktra_dv_comota[0]->lieutrinh == 1 ? '' : $mslieutrinh, $mshh, 'CHA');
}
if ($phanbo === 'true') {
    $db->update_sotien_chitiet_dichvu($mshs, $msdv, $msdichvu, $mshh, 'Luu');
}
$db->update_giadv_motadv($mshs, $msdv, $msdichvu, $mshh, $dongia);


$ktra_goicomota =  $db->ktra_comota($mshs, $msdv, $msdichvu, 'CHA');

for ($i = 0; $i < count($ktra_goicomota); $i++) {
    $ktra_mota_child = $db->ktra_comota($mshs, $msdv, $msdichvu, $ktra_goicomota[$i]->mshh);
    if (count($ktra_mota_child) > 0) {
        $db->update_giadv_motadv($mshs, $msdv, $msdichvu, $ktra_goicomota[$i]->mshh, $ktra_goicomota[$i]->dongia);
    }
}


header('Content-Type: application/json');
echo json_encode($msdichvu);
