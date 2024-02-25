<?php
include("../../../includes/config.php");
include("../../../includes/database.php");
include("../../../includes/database_sv.php");
require("../../../modules/dichvuClass.php");

$db = new dichvu();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];

$msdichvu = $_POST['msdichvu'];
$mslieutrinh = $_POST['mslieutrinh'];
$thutu = $_POST['thutu'];
$loai = $_POST['loai'];
if ($loai == 'len') {
    $len = $db->select_move_lieutrinh($mshs, $msdv, $msdichvu, $thutu - 1);
    $thutu_len = (int) $len[0]->thutu + 1;
    $update_len = $db->move_lieutrinh($mshs, $msdv, $len[0]->mslieutrinh, $thutu_len);
    $update_lieutrinh_chon = $db->move_lieutrinh($mshs, $msdv, $mslieutrinh, $thutu - 1);
} else {
    $xuong = $db->select_move_lieutrinh($mshs, $msdv, $msdichvu, $thutu + 1);
    $thutu_xuong = (int) $xuong[0]->thutu - 1;
    $update_xuong = $db->move_lieutrinh($mshs, $msdv, $xuong[0]->mslieutrinh, $thutu_xuong);
    $update_lieutrinh_chon = $db->move_lieutrinh($mshs, $msdv, $mslieutrinh, $thutu + 1);
}
