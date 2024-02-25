<?php
include('__include_connect.php');
require("../../modules/dichvuClass.php");

$db = new dichvu();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdichvu = $_POST['msdichvu'];
$sotien = $_POST['sotien'];
$list = $db->update_thanhtien_dichvu($mshs, $msdv, $msdichvu, $sotien);
