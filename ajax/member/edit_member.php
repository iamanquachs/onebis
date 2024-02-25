<?php
include('__include_connect.php');
require("../../modules/memberClass.php");

$db = new member();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msnhom = $_POST['msnhom'];
$tennhom = $_POST['tennhom'];
$phantramgiam =  $_POST['ptgiam'];
$sotientu =  $_POST['sotientu'];
$sotienden =  $_POST['sotienden'];

$list = $db->edit_member($mshs, $msdv, $msnhom, $tennhom, $phantramgiam, $sotientu, $sotienden);
