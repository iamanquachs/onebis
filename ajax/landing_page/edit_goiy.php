<?php
include('__include_connect.php');
require("../../modules/landingClass.php");
$db = new landing();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$goiy = $_POST['goiy'];
$loai = $_POST['loai'];

if ($loai == 'load') {
    $list = $db->load_landing_page($mshs, $msdv);
    header('Content-Type: application/json');
    echo json_encode($list);
} else {
    $list = $db->edit_goiy($mshs, $msdv, $goiy, $loai);
}
