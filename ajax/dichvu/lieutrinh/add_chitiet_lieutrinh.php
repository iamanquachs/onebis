<?php
include("../../../includes/config.php");
include("../../../includes/database.php");
include("../../../includes/database_sv.php");
require("../../../modules/dichvuClass.php");

$db = new dichvu();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdichvu = $_POST['msdichvu'];
$lieutrinh = $_POST['lieutrinh'];
if ($lieutrinh == '0') {
    $mslieutrinh = 'KLT' . date("dmyHis", time()) . rand(1000, 9999);
} else {
    $mslieutrinh = $_POST['mslieutrinh'];
}
$mshh = $_POST['mshh'];

$tenhh = $_POST['tenhh'];
$soluong = $_POST['soluong'];
$ptthuchien = $_POST['ptthuchien'];
$dongia = $_POST['dongia'];
$dinhluong = $_POST['dinhluong'];
$phanbo = $_POST['phanbo'];
if ($mshh == "DV0000000000000001") {
    $dongia = -$dongia;
}
$db->add_chitiet_lieutrinh($msdn, $mshs, $msdv, $msdichvu, $mslieutrinh, $mshh, $tenhh, $soluong, $dongia, $dinhluong, $ptthuchien);
if ($mshh != "DV0000000000000001") {
    if ($phanbo === 'true') {
        $db->update_sotien_chitiet_dichvu($mshs, $msdv, $msdichvu, $mshh, 'Luu');
    }
}
//get list dịch vụ có trong mô tả
if ($lieutrinh == 0) {
    if ($phanbo === 'false') {
        // $list_item_cotrong_dichvukhac = $db->ktra_dichvu_co_trong_dichvu($mshs, $msdv, $msdichvu);
        // foreach ($list_item_cotrong_dichvukhac as $i) {
        //update từng mô tả dịch vụ theo msdichvu cha
        // $sotien_dichvu_trongmota = $db->load_thanhtien_dichvu($mshs, $msdv, $msdichvu);

        // $db->update_sotien_dichvu_trongmota($mshs, $msdv, $i->msdichvu, $msdichvu, $sotien_dichvu_trongmota[0]->thanhtien);
        // if ($i->trangthai === 'true') {
        //nếu phân bổ giá là true thì chạy store để update lại tất cả chi tiết của dịch vụ đó
        //     $db->update_sotien_chitiet_dichvu($mshs, $msdv, $i->msdichvu, $mshh, 'Luu');
        // } else {
        //nếu phân bổ giá là false thì dịch vụ cha
        //     $sotien = $db->load_thanhtien_dichvu($mshs, $msdv, $i->msdichvu);
        //     $db->update_thanhtien_dichvu($mshs, $msdv, $i->msdichvu,  $sotien[0]->thanhtien);
        // }
        // }
    }
    $ktra_dv_comota = $db->ktra_dv_comota($mshs, $msdv, $mshh);
    if ($ktra_dv_comota[0]->mota > 0) {
        $db->add_mota_dichvu($mshs, $msdv, $msdichvu, $mslieutrinh, $mshh, '');
    }
}
