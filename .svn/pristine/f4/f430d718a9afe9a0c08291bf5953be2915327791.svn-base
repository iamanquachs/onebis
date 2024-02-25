<?php
include('__include_connect.php');
require("../../modules/xuatkhoClass.php");

$db_xk = new xuatkho();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$mshh = $_POST['mshh'];
$thamso_qltk = $_POST['thamso_qltk'];
header('Content-Type: application/json');
if ($thamso_qltk == '1') {
    $db_xk->lay_tonkho_baocao($mshs, $msdv, date('Y-m-d'), date('Y-m-d'), 'CN');
    $list_tonkho = $db_xk->get_tonkho_by_mshh($mshs, $msdv, $mshh);
    echo json_encode($list_tonkho[0]->toncuoi);
} else {
    $db_xk->lay_tonkho_baocao($mshs, $msdv, date('Y-m-d'), date('Y-m-d'), 'CN');
    $list_tonkho = $db_xk->get_tonkho_by_mshh($mshs, $msdv, $mshh);
    echo json_encode($list_tonkho[0]->toncuoi);
}
