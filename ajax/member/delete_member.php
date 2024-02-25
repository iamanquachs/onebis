<?php
include('__include_connect.php');
require("../../modules/memberClass.php");

$db = new member();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msnhom =  $_POST['msnhom'];

$list = $db->delete_member($mshs, $msdv, $msnhom);
