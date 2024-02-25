<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");
require("../../modules/thuchiClass.php");
require("../../modules/thamsoClass.php");

$db_thamso = new thamso_control();
$thuchi_db = new thuchi();
$db = new banhang();


$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$tennv = $_COOKIE['hoten'];
$soct_thuchi = 'TT' . date("dmyHis", time()) . rand(1000, 9999);
$soct = $_POST['soct'];
$sodienthoai = $_POST['mskh'];
$mskh = $_POST['mskh'];
$tenkh = $_POST['tenkh'];
$tenkh_khongdau = $_POST['tenkh_khongdau'];
$tongcong = $_POST['tongcong'];
$sotien_dathu = $_POST['sotien_dathu'];
$sotien = $_POST['sotien'];
$nganquy = $_POST['nganquy'];
$noidung = 'Thu tiền dịch vụ|' . $tenkh;
$trangthai = '1';
$loaiphieu = '1';
$loaichungtu = '0';
$makhoanmuc = $_POST['makhoanmuc'];
$sohd = '';
$ngay = date("Y-m-d");

$bank = $db_thamso->load_thamso_nganhang($msdv);


$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://egpp.vn/api/qr_nganhang',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{
    "bin": "' . $bank[0]->giatri . '",
    "stk": "' . $bank[1]->giatri . '",
    "sotien": "' . $sotien . '",
    "noidung": "' . $tenkh_khongdau . ' CHUYEN KHOAN"
}',
    CURLOPT_HTTPHEADER => array(
        'Authorization: bearer eyJ0eXAi.iJKV1QiLCJhbGci.iJIUzI1NiJ9OeyJtc2R2Ijoia2NiIiwibWFjb3NvZHFnIjoi.TItMDAwMDA3IiwidXNlciI6ImtjYiIsInRpbWUi.iIyMDIzLTA2LTE1In0OYZjf_kb-nwZfHzIwKfclWyYSlPL3xyvKYt9uh1Z8smI',
        'Content-Type: application/json'
    ),
));
$response = curl_exec($curl);
$qr_code = json_decode($response)->qr_code;


if ($sotien > 0) {
    $thuchi_db->add_thuchi($msdn, $mshs, $msdv, $soct_thuchi, $soct, $sohd, $ngay, $mskh, $tenkh, $sotien, $noidung, $msdn, $tennv, $loaichungtu, $nganquy, $makhoanmuc);
    $dathu = 1;
} else {
    $dathu = 0;
    $sotien = 0;
    $soct_thuchi = '';
}
$db->update_banhangline_dathu($mshs, $msdv, $soct, $sodienthoai, $dathu);
$db->update_banhangheader('', $mshs, $msdv, $soct,  $mskh, $tenkh, $sodienthoai, $tongcong, $sotien, $soct_thuchi, $trangthai, $qr_code, '');
$db->get_conno_khachhang($mshs, $sodienthoai);
