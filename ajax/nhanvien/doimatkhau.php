<?php
include('__include_connect.php');
require("../../modules/nhanvienClass.php");

$db = new nhanvien_control();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$matkhaucu = $_POST['matkhaucu'];
$matkhaumoi = $_POST['matkhaumoi'];

$item_mkcu = $db->ktra_matkhaucu($mshs, $msdv, $msdn, $matkhaucu);
if (count($item_mkcu) != 0) {
    $db->doimatkhau($mshs, $msdv, $msdn, $matkhaumoi);
} else {
    header('Content-Type: application/json');
    echo json_encode('false');
}
