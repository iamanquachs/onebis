    <?php
include('__include_connect.php');
require("../../modules/khuyenmaiClass.php");

$db = new khuyenmai();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$msctkm = 'KM' . date("dmyHis", time()) . rand(1000, 9999);
$tenctkm = $_POST['tenctkm'];
$ptgiam = $_POST['ptgiam'];
$loai_km = $_POST['loai_km'];
$mshh = $_POST['mshh'];
$tenhh = $_POST['tenhh'];
$nhom_hh = $_POST['nhom_hh'];
$tungay = date('Y/m/d', strtotime(str_replace('/', '-', $_POST['tungay'])));
$denngay = date('Y/m/d', strtotime(str_replace('/', '-', $_POST['denngay'])));
if ($loai_km == '0') {
    $db->add_chitiet_ctkm($mshs, $msdv, $msdn, $msctkm, $tenctkm, $mshh, $tenhh, $ptgiam, $tungay, $denngay);
}
if ($loai_km == '1') {
    $db->add_ctkm_header($mshs, $msdv, $msdn, $msctkm, $tenctkm, $ptgiam, $tungay, $denngay);
}
if ($loai_km == '2') {
    $db->add_ctkm_theo_nhom($mshs, $msdv, $msdn, $msctkm, $tenctkm, $ptgiam, $nhom_hh, $tungay, $denngay);
}
