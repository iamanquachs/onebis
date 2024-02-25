<?php
include('__include_connect.php');
require("../../modules/memberClass.php");

$db = new member();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$rowid =  $_POST['rowid'];
$tuoitu =  $_POST['tuoitu'];
$tuoiden =  $_POST['tuoiden'];

$list = $db->edit_phankhuc($mshs, $msdv, $rowid, $tuoitu, $tuoiden);
