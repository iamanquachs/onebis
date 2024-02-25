<?php
include("../../../includes/config.php");
include("../../../includes/database.php");
include("../../../includes/database_sv.php");
require("../../../modules/dichvuClass.php");

$db = new dichvu();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdichvu = $_POST['msdichvu'];
$mshh = $_POST['mshh'];
$loai = $_POST['loai'];

$list = $db->update_sotien_chitiet_dichvu($mshs, $msdv, $msdichvu, $mshh, $loai);
$ktra_goicomota =  $db->ktra_comota($mshs, $msdv, $msdichvu, 'CHA');

for ($i = 0; $i < count($ktra_goicomota); $i++) {
    $ktra_mota_child = $db->ktra_comota($mshs, $msdv, $msdichvu, $ktra_goicomota[$i]->mshh);
    if (count($ktra_mota_child) > 0) {
        $db->update_giadv_motadv($mshs, $msdv, $msdichvu, $ktra_goicomota[$i]->mshh, $ktra_goicomota[$i]->dongia);
    }
}

header('Content-Type: application/json');
echo json_encode($list);
