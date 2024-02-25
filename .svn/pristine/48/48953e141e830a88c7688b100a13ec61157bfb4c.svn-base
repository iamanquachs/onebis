<?php
include('__include_connect.php');
require("../../modules/nhatkyClass.php");

$db = new nhatky();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$ms_rang = $_POST['ms_rang'];
$idtuvan = $_POST['idtuvan'];
$db->update_chandoan_rang($mshs, $msdv, $soct, $ms_rang, $idtuvan);
