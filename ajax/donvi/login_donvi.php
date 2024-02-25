<?php
include('__include_connect.php');
require("../../modules/donviClass.php");


$db = new donvi();
$mshs = $_POST['mshs'];
$msdv = $_POST['msdv'];
$user = $db->_get_login_with_donvi($mshs, $msdv);
foreach ($user as $r) {
    $mshs = $r->mshs;
    $msdv = $r->msdv;
    $tendv = $r->tendv;
    $hoten = $r->hoten;
    $sodienthoai = $r->sodienthoai;
    $loai_nv = $r->loai_nv;
    $loaihinh = $r->loaihinh;
    $dienthoaihotro = $r->dienthoaihotro;
    $chucvu = $r->mschucvu;
    setcookie("mshs", $mshs, time() + 30758400, "/");
    setcookie("msdv", $msdv, time() + 30758400, "/");
    setcookie("tendv", $tendv, time() + 30758400, "/");
    setcookie("msdn", $sodienthoai, time() + 30758400, "/");
    setcookie("hoten", $hoten, time() + 30758400, "/");
    setcookie("loai_nv", $loai_nv, time() + 30758400, "/");
    setcookie("loaihinh", $loaihinh, time() + 30758400, "/");
    setcookie("chucvu", $chucvu, time() + 30758400, "/");
    setcookie("dienthoaihotro", $dienthoaihotro, time() + 30758400, "/");
    setcookie("ngaydangnhap", date('d/m/Y'), time() + 30758400, "/");

    //mahoa
    $token = array();
    $token['msdv'] = $msdv;
    $token['msdn'] = $sodienthoai;
    $token['chucvu'] = $chucvu;
    $jsonwebtoken = JWT::encode($token, sha1('TPS@1719'));
    setcookie("token", $jsonwebtoken, time() + 30758400, "/");
}
header('Content-Type: application/json');
echo json_encode('200');
