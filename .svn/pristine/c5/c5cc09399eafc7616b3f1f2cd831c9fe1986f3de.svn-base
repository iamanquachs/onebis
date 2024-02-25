<?php
include('__include_connect.php');
require("../../modules/dathenClass.php");

$db = new dathen();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$rowid = explode('|', $_POST['rowid']);
$soct = $_POST['soct'];
$ngayhen = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['ngayhen'])));
$giohen = $_POST['giohen'];
for ($i = 0; $i < count($rowid); $i++) {
    $db->edit_ngayhen($mshs, $msdv, $rowid[$i], $soct, $ngayhen, $giohen);
}
