<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$rowid = explode('|', $_POST['rowid']);
for ($i = 0; $i < count($rowid); $i++) {
    $db->update_ngayhen_dichvu_chuathuchien($mshs, $msdv, $rowid[$i]);
}
