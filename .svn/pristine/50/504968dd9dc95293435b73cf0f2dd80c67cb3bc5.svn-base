<?php
include('__include_connect.php');
require("../../modules/landingClass.php");

function locdautiengviet($str)
{
    $str = strtolower($str); //chuyển chữ hoa thành chữ thường
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd' => 'đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D' => 'Đ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );
    foreach ($unicode as $nonUnicode => $uni) {
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    $str = strtolower(str_replace(' ', '-', $str));
    return $str;
}

$db = new landing();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$tendv = locdautiengviet($_COOKIE['tendv']);
$text_tieude = $_POST['text_tieude'];
$text_noidung = $_POST['text_noidung'];
$text_lydo1 = $_POST['text_lydo1'];
$text_lydo2 = $_POST['text_lydo2'];
$text_lydo3 = $_POST['text_lydo3'];
$anh_avt_edit = $_FILES['anh_avt_edit'];
$img_avt_cu = $_POST['img_avt_cu'];
$list_img_donvi_cu = explode('|', $_POST['list_img_donvi_cu']);
$input_edit_img_donvi_1 = $_FILES['input_edit_img_donvi_1'];
$input_edit_img_donvi_2 = $_FILES['input_edit_img_donvi_2'];
$input_edit_img_donvi_3 = $_FILES['input_edit_img_donvi_3'];
$img_avt = '';
$lydo = $text_lydo1 . '|' . $text_lydo2 . '|' . $text_lydo3;
$path_img_1 = $list_img_donvi_cu[0];
$path_img_2 = $list_img_donvi_cu[1];
$path_img_3 = $list_img_donvi_cu[2];
// Image 1
if ($input_edit_img_donvi_1 != '') {
    unlink('../../../upload/landing_page/' . $mshs . '/' . $list_img_donvi_cu[0]);

    $duoi = explode('.', $input_edit_img_donvi_1['name']);
    $duoi = $duoi[(count($duoi) - 1)];
    $path_image = 'item_1.' . $duoi;
    $path_img_1 = $path_image;
    move_uploaded_file($input_edit_img_donvi_1['tmp_name'], '../../upload/landing_page/' . $mshs . '/'  . $path_image);
}

// Image 2
if ($input_edit_img_donvi_2 != '') {
    unlink('../../../upload/landing_page/' . $mshs . '/' . $list_img_donvi_cu[1]);

    $duoi = explode('.', $input_edit_img_donvi_2['name']);
    $duoi = $duoi[(count($duoi) - 1)];
    $path_image = 'item_2.' . $duoi;
    $path_img_2 = $path_image;
    move_uploaded_file($input_edit_img_donvi_2['tmp_name'], '../../upload/landing_page/' . $mshs . '/'  . $path_image);
}

// Image 3
if ($input_edit_img_donvi_3 != '') {
    unlink('../../../upload/landing_page/' . $mshs . '/' . $list_img_donvi_cu[2]);

    $duoi = explode('.', $input_edit_img_donvi_3['name']);
    $duoi = $duoi[(count($duoi) - 1)];
    $path_image = 'item_3.' . $duoi;
    $path_img_3 = $path_image;
    move_uploaded_file($input_edit_img_donvi_3['tmp_name'], '../../upload/landing_page/' . $mshs . '/'  . $path_image);
}

// Image AVT
if ($anh_avt_edit != '') {
    unlink('../../../upload/landing_page/' . $mshs . '/' . $img_avt_cu);
    $duoi = explode('.', $anh_avt_edit['name']);
    $duoi = $duoi[(count($duoi) - 1)];
    $img_avt = 'item_avt.' . $duoi;
    move_uploaded_file($anh_avt_edit['tmp_name'], '../../upload/landing_page/' . $mshs . '/'  . $img_avt);
}
$all_path_image = $path_img_1 . '|' . $path_img_2 . '|' . $path_img_3;

$db->edit_landing_page($mshs, $msdv, $tendv, $msdn, $text_tieude, $text_noidung, $img_avt, $all_path_image, $lydo);
