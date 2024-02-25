<?php
include('__include_connect.php');
require("../../modules/memberClass.php");

$db = new member();
$msdn = $_COOKIE['msdn'];
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msnhom = 'DM' . date("dmyHis", time()) . rand(1000, 9999);
$tennhom = $_POST['tennhom'];
$phantramgiam =  $_POST['ptgiam'];
$sotientu =  $_POST['sotientu'];
$sotienden =  $_POST['sotienden'];
$loai =  $_POST['loai'];

$list = $db->add_member($msdn, $mshs, $msdv, $msnhom, $tennhom, $phantramgiam, $sotientu, $sotienden, $loai);
