<?php
include('__include_connect.php');
require("../../modules/hanghoaClass.php");

$db = new hanghoa();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$mshh = $_POST['mshh'];
$list_img = explode('|', $_POST['list_img']);
for ($i = 0; $i < count($list_img); $i++) {
    unlink('../../upload/anhhanghoa/' . $mshs . '/' . $list_img[$i]);
}

$list = $db->delete_hanghoa($msdn, $msdv, $mshh);
