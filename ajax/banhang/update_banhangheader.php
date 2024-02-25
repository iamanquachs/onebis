<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");
require("../../modules/thuchiClass.php");
require("../../modules/thamsoClass.php");

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

$db_thamso = new thamso_control();
$thuchi_db = new thuchi();
$db = new banhang();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$tennv = $_COOKIE['hoten'];
$loaihinh = $_COOKIE['loaihinh'];
$soct_thuchi = 'TT' . date("dmyHis", time()) . rand(1000, 9999);
$soct = $_POST['soct'];
$mskh = $_POST['mskh'];
$tenkh = $_POST['tenkh'];
$tenkh_khongdau = $_POST['tenkh_khongdau'];
$ngaysinh = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['ngaysinh'])));
$diachi = $_POST['diachi'];
$gioitinh = $_POST['gioitinh'];
$nhom_kh = $_POST['nhom'];
$sodienthoai = $_POST['sodienthoai'];
$tongcong = $_POST['tongcong'];
$sotien = $_POST['sotien'];
$sotienvoucher = 0;
$nganquy = $_POST['nganquy'];
$msvoucher = $_POST['msvoucher'];
$ms_nguoithan = $_POST['ms_nguoithan'];
$qltk = $_POST['qltk'];

// $maso_massage = $_POST['maso_massage'];
// $ten_massage = $_POST['ten_massage'];
// $maso_huongdau = $_POST['maso_huongdau'];
// $ten_huongdau = $_POST['ten_huongdau'];
// $maso_daugoi = $_POST['maso_daugoi'];
// $ten_daugoi = $_POST['ten_daugoi'];

$ngaydat = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['ngaydat'])));
$giodat = $_POST['giodat'];

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
// for ($i = 0; $i < count($maso_massage); $i++) {
//     $db->add_yeucau($mshs, $msdv, $rowidtc, $soct, $sodienthoai, $msdn, $tennv, $maso_massage[$i], $ten_massage[$i], 'MS');
// }
// if ($maso_huongdau != '') {
//     $db->add_yeucau($mshs, $msdv, $rowidtc, $soct, $sodienthoai, $msdn, $tennv, $maso_huongdau, $ten_huongdau, 'HD');
// }
// if ($maso_daugoi != '') {
//     $db->add_yeucau($mshs, $msdv, $rowidtc, $soct, $sodienthoai, $msdn, $tennv, $maso_daugoi, $ten_daugoi, 'DA');
// }

$response = curl_exec($curl);
if ($mskh == '') {
    $ktra_sdt = $db->find_khachhang($mshs, $sodienthoai);
    if (count($ktra_sdt) == 0) {
        $mskh = 'KH' . date("dmyHis", time()) . rand(1000, 9999);
        $db->add_khachhang($msdn, $msdv, $mshs, $mskh, $tenkh, $sodienthoai, $ngaysinh, $diachi, $gioitinh, '');
    }
}
$db->update_dotuoi_banhang_line($msdv, $mshs, $sodienthoai, $ngaysinh);

$noidung = 'Thu tiền dịch vụ|' . $tenkh;
if ($msvoucher != '') {
    $tenvoucher = $_POST['tenvoucher'];
    $sotienvoucher = $_POST['sotienvoucher'];
    $idchidinhvoucher = 'CD' . date("dmyHis", time()) . rand(1000, 9999);
    $db->update_voucher($mshs, $msdv, $msvoucher, $sodienthoai);
    $db->add_banhang_line_mshh(0, $msdn, $mshs, $msdv, $soct, $idchidinhvoucher, $msvoucher, $tenvoucher, '', '', $nhom_kh, 'VC', 'VC', 'voucher', '1', -$sotienvoucher, -$sotienvoucher, '', '', -$sotienvoucher, 0, -$sotienvoucher, '', '1', '', 0, $sodienthoai);
}
if ($sotien > 0) {
    $thuchi_db->add_thuchi($msdn, $mshs, $msdv, $soct_thuchi, $soct, $sohd, $ngay, $mskh, $tenkh, $sotien, $noidung, $msdn, $tennv, $loaichungtu, $nganquy, $makhoanmuc);
    $dathu = 1;
    $qr_code = json_decode($response)->qr_code;
} else {
    $dathu = 0;
    $sotien = 0;
    $soct_thuchi = '';
    $qr_code = '';
}
$ngayhen = $ngaydat . ' ' . $giodat;
$db->update_banhangline_dathu($mshs, $msdv, $soct, $sodienthoai, $dathu);
$db->update_ngay_banhangline($mshs, $msdv, $soct, $ngaydat);
$db->update_banhangheader($ngayhen, $mshs, $msdv, $soct,  $mskh, $tenkh, $sodienthoai, $tongcong, $sotien + $sotienvoucher, $soct_thuchi, $trangthai, $qr_code, $ms_nguoithan);

$ktra_soluong = $db->ktra_soluong_soct_banhang_line($mshs, $msdv, $soct);
if ($loaihinh == 'NK' && $ktra[0]->soluong == 0) {
    $ktra_khamrang = $db->ktra_khamrang($mshs, $msdv, $soct);
    if ($ktra_khamrang[0]->solan == 0) {
        $db->add_banhang_line_mshh(
            0,
            $msdn,
            $mshs,
            $msdv,
            $soct,
            'AUTOPOST',
            'CK',
            'Khám răng',
            '',
            '',
            $nhom_kh,
            'DV',
            'CK',
            'Lần',
            0,
            0,
            0,
            '',
            0,
            0,
            0,
            0,
            '',
            0,
            0,
            0,
            $sodienthoai
        );
    }
}
$db->get_conno_khachhang($mshs, $sodienthoai);

if ($qltk == 1) {
    $db->xuatkho_trukho($msdv, $soct);
}
