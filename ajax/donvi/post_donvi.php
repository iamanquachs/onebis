<?php
include('__include_connect.php');
require("../../modules/donviClass.php");

$db = new donvi_control();
$mshs = $_POST['mshs'];
$msdn = $_COOKIE['msdn'];
if ($mshs == '') {
    $mshs = 'HS' . date("dmyHis", time()) . rand(1000, 9999);
}
$msdv = 'DV' . date("dmyHis", time()) . rand(1000, 9999);
$tendv = $_POST['tendv'];
$sdt =  $_POST['sdt'];
$loaihinh =  $_POST['loaihinh'];
$nguoidaidien =  $_POST['nguoidaidien'];
$sohopdong =  $_POST['sohopdong'];
$giahopdong =  $_POST['giahopdong'];
$sothang_km =  $_POST['sothang_km'];
$donvi_taitro =  $_POST['donvi_taitro'];
$ghichu =  $_POST['ghichu'];
$diachi =  $_POST['diachi'];
$msxa =  $_POST['msxa'];
$sdt_congtacvien =  $_POST['sdt_ctv'];
$sonam =  $_POST['sonam'];
$add_or_edit =  $_POST['add_or_edit'];
$songaygiahan =  $_POST['songaygiahan'];
$dienthoaihotro =  $_POST['dienthoaihotro'];
if ($add_or_edit == '0') {
    $mshs = $_POST['mshs'];
    $msdv = $_POST['msdv'];
} else {
    mkdir('../../upload/anhdichvu/' . $mshs . '', 0777, true);
    mkdir('../../upload/anhdieutri/' . $mshs . '', 0777, true);
    mkdir('../../upload/anhhanghoa/' . $mshs . '', 0777, true);
    mkdir('../../upload/videodichvu/' . $mshs . '', 0777, true);
    mkdir('../../upload/landing_page/' . $mshs . '', 0777, true);
}

$list = $db->active_donvi($mshs, $msdv, $tendv, $msxa, $diachi, $loaihinh, $nguoidaidien, $sdt, $sohopdong, $giahopdong, $sothang_km, $donvi_taitro, $ghichu, $sdt_congtacvien, $sonam, $dienthoaihotro,  $add_or_edit, $msdn);
