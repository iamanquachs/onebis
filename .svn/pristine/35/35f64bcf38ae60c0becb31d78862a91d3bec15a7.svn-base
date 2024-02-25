<?php
include('__include_connect.php');
require("../../modules/thamsoClass.php");


$db = new thamso_control();
$msdv = $_COOKIE['msdv'];
$sotien = $_POST['sotien'];
$noidung = $_POST['noidung'];
$list = $db->load_thamso_nganhang($msdv);


$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://egpp.vn/api/qr_nganhang',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{
    "bin": "' . $list[0]->giatri . '",
    "stk": "' . $list[1]->giatri . '",
    "sotien": "' . $sotien . '",
    "noidung": "' . $noidung . '"
}',
    CURLOPT_HTTPHEADER => array(
        'Authorization: bearer eyJ0eXAi.iJKV1QiLCJhbGci.iJIUzI1NiJ9OeyJtc2R2Ijoia2NiIiwibWFjb3NvZHFnIjoi.TItMDAwMDA3IiwidXNlciI6ImtjYiIsInRpbWUi.iIyMDIzLTA2LTE1In0OYZjf_kb-nwZfHzIwKfclWyYSlPL3xyvKYt9uh1Z8smI',
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);

echo json_decode($response)->qr_code;
