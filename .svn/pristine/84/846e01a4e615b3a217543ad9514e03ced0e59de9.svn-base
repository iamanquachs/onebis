<?php
require("modules/baocaoClass.php");
$db = new baocao();
$db_control = new baocao_control();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];

$list_chinhanh = $db_control->load_chinhanh($mshs);
$list_chinhanh_phanquyen = $db->ktra_phanquyen($mshs, $msdv, $msdn, 'XCN');
$filename = 'khachhang';
