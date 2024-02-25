<?php
include('__include_connect.php');
require("../../modules/crmClass.php");
$db = new crm();
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];

$db->Show_CRM($msdv, $msdn);
