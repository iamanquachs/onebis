<?php
include("../../../includes/config.php");
include("../../../includes/database.php");
include("../../../includes/database_sv.php");
require("../../../modules/dichvuClass.php");

$db = new dichvu();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];

$msdichvu = $_POST['msdichvu'];
$sotien = $_POST['sotien'];
$phanbogia = $_POST['phanbogia'];
$loai = $_POST['loai'];
if ($loai == 'sotien') {
    $db->change_sotien_dichvu($mshs, $msdv, $msdichvu, $sotien);
    $list_item_cotrong_dichvukhac = $db->ktra_dichvu_co_trong_dichvu($mshs, $msdv, $msdichvu);
    foreach ($list_item_cotrong_dichvukhac as $i) {
        //update từng mô tả dịch vụ theo msdichvu cha
        $db->update_sotien_dichvu_trongmota($mshs, $msdv, $i->msdichvu, $msdichvu, $sotien);
        if ($i->trangthai === 'true') {
            //nếu phân bổ giá là true thì chạy store để update lại tất cả chi tiết của dịch vụ đó
            $db->update_sotien_chitiet_dichvu($mshs, $msdv, $i->msdichvu, '', 'Luu');
        } else {
            //nếu phân bổ giá là false thì update dịch vụ cha
            $sotien_dv_update = $db->load_thanhtien_dichvu($mshs, $msdv, $i->msdichvu);
            $db->update_thanhtien_dichvu($mshs, $msdv, $i->msdichvu, $sotien_dv_update[0]->thanhtien);
        }
    }
} else {
    $db->change_trangthai_phanbo_dichvu($mshs, $msdv, $msdichvu, $phanbogia);
    if ($phanbogia == '1') {
        $db->change_sotien_dichvu($mshs, $msdv, $msdichvu, $sotien);
        $db->update_sotien_chitiet_dichvu($mshs, $msdv, $msdichvu, '', 'Luu');
    }
}
