<?php
include('__include_connect.php');
require("../../modules/dichvuClass.php");

$db = new dichvu();
$mshs = $_COOKIE['mshs'];
$msdn = $_COOKIE['msdn'];
$msdv = $_COOKIE['msdv'];
$msdichvu = $_POST['msdichvu'];
$list_img = explode('|', $_POST['list_img']);
$list_video = explode('|', $_POST['list_video']);
for ($i = 0; $i < count($list_img); $i++) {
    unlink('../../upload/anhdichvu/' . $mshs . '/' . $list_img[$i]);
}
for ($i = 0; $i < count($list_video); $i++) {
    unlink('../../upload/videodichvu/' . $mshs . '/' . $list_video[$i]);
}

$list = $db->delete_dichvu($msdn, $msdv, $msdichvu);
