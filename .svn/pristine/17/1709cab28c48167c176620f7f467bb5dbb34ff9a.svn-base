<?php
include("../includes/config.php");
include("../includes/database.php");
include("../includes/functions.php");
include("../includes/jwt.php");

$sodienthoai = $_POST['sodienthoai'];
$matkhau = $_POST['matkhau'];
$user = _get_login($sodienthoai, $matkhau);
if ($user[0]->logined == 1) {
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
} else {
    header('Content-Type: application/json');
    echo json_encode($user);
}
