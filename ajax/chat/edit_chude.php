<?php
include('__include_connect.php');
require("../../modules/chatClass.php");

$db = new chat();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$tenchude = $_POST['tenchude'];
$db->edit_chude($mshs, $msdv, $soct, $tenchude);
