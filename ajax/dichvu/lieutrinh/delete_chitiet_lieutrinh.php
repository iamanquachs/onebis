<?php
include("../../../includes/config.php");
include("../../../includes/database.php");
include("../../../includes/database_sv.php");
require("../../../modules/dichvuClass.php");

$db = new dichvu();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$rowid = $_POST['rowid'];
$msdichvu = $_POST['msdichvu'];
$mslieutrinh = $_POST['mslieutrinh'];
$mshh = $_POST['mshh'];
$sotien = $_POST['sotien'];
$phanbo = $_POST['phanbo'];
$loai_lieutrinh = $_POST['loai_lieutrinh'];

$db->delete_chitiet_lieutrinh($rowid, $mshs, $msdv, $msdichvu, $mslieutrinh, $mshh, $sotien, $phanbo);
if ($phanbo === 'true') {
    $db->update_sotien_chitiet_dichvu($mshs, $msdv, $msdichvu, $mshh, 'Luu');
}
$ktra_goicomota =  $db->ktra_comota($mshs, $msdv, $msdichvu, 'CHA');

for ($i = 0; $i < count($ktra_goicomota); $i++) {
    $ktra_mota_child = $db->ktra_comota($mshs, $msdv, $msdichvu, $ktra_goicomota[$i]->mshh);
    if (count($ktra_mota_child) > 0) {
        $db->update_giadv_motadv($mshs, $msdv, $msdichvu, $ktra_goicomota[$i]->mshh, $ktra_goicomota[$i]->dongia);
    }
}
//get list dịch vụ có trong mô tả
if ($loai_lieutrinh == 0) {
    if ($phanbo === 'false') {
        $list_item_cotrong_dichvukhac = $db->ktra_dichvu_co_trong_dichvu($mshs, $msdv, $msdichvu);
        foreach ($list_item_cotrong_dichvukhac as $i) {
            //update từng mô tả dịch vụ theo msdichvu cha
            $sotien_dichvu_trongmota = $db->load_thanhtien_dichvu($mshs, $msdv, $msdichvu);

            $db->update_sotien_dichvu_trongmota($mshs, $msdv, $i->msdichvu, $msdichvu, $sotien_dichvu_trongmota[0]->thanhtien);
            if ($i->trangthai === 'true') {
                //nếu phân bổ giá là true thì chạy store để update lại tất cả chi tiết của dịch vụ đó
                $db->update_sotien_chitiet_dichvu($mshs, $msdv, $i->msdichvu, $mshh, 'Luu');
            } else {
                //nếu phân bổ giá là false thì dịch vụ cha
                $sotien = $db->load_thanhtien_dichvu($mshs, $msdv, $i->msdichvu);
                $db->update_thanhtien_dichvu($mshs, $msdv, $i->msdichvu,  $sotien[0]->thanhtien);
            }
        }
    }
}
