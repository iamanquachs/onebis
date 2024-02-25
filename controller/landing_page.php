<?php
require("modules/landingClass.php");
$db = new landing();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];

$ld = $db->load_landing_page($mshs, $msdv);
$filename = 'landing_page';
