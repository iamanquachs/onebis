<?php
include("../includes/config.php");
include("../includes/database.php");
include("../includes/functions.php");

$rowid = $_GET['r'];
$tendv = $_GET['soct'];
$ld = load_landing_page_khachhang($rowid, $tendv);
$filename = 'landing_page_public';
