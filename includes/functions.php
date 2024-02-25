<?php

function _get_login($sodienthoai, $matkhau)
{
    $database = new database();
    $getall = $database->connect->prepare("CALL `Au_Login`('$sodienthoai', '$matkhau')");
    $getall->setFetchMode(PDO::FETCH_OBJ);
    $getall->execute();
    return $getall->fetchAll();
}

function __register($msdn, $sodienthoai)
{
    $database = new database();
    $getall = $database->connect->prepare("INSERT INTO hosonhanvien(lastmodify, msdn,sodienthoai) VALUES (
        NOW(),'$msdn', '$sodienthoai')");
    $getall->execute();
}
function __forgot_password($sodienthoai, $matkhaumoi)
{
    $matkhaumoi = md5($matkhaumoi);
    $database = new database();
    $getall = $database->connect->prepare("UPDATE hosonhanvien set matkhau = '$matkhaumoi'  WHERE sodienthoai = '$sodienthoai'");
    $getall->execute();
}
function user_check_block($mshs, $msdv, $msdn)
{
    $database = new database();
    $getall = $database->connect->prepare("SELECT count(rowid)rowid from hosonhanvien where khoa='1' and mshs='$mshs' and msdv='$msdv' and msdn='$msdn'");
    $getall->setFetchMode(PDO::FETCH_OBJ);
    $getall->execute();
    return $getall->fetchAll();
}

function user_check_password($mshs, $msdv, $msdn)
{
    $database = new database();
    $getall = $database->connect->prepare("SELECT count(rowid)rowid from hosonhanvien where khoa='0' and mshs='$mshs' and msdv='$msdv' and msdn='$msdn' and matkhau = '202cb962ac59075b964b07152d234b70'");
    $getall->setFetchMode(PDO::FETCH_OBJ);
    $getall->execute();
    return $getall->fetchAll(); 
}

function kiemtra_phanquyen_user($msdn, $components)
{
    $database_sv = new database_sv();
    $getall = $database_sv->connect->prepare("SELECT count(msdn)msdn from hosophanquyen where  msdn='$msdn' and manghiepvu = '$components' ");
    $getall->setFetchMode(PDO::FETCH_OBJ);
    $getall->execute();
    return $getall->fetchAll();
}

function __menu_1($mshs, $msdv, $msdn)
{
    $database_sv = new database_sv();
    $getall = $database_sv->connect->prepare("SELECT stt,manghiepvu, tennghiepvu, tenmenu,sttmenu FROM hosophanquyen WHERE mshs='$mshs' AND msdv='$msdv' AND msdn='$msdn' and menu in(1,2) group by sttmenu ORDER BY sttmenu, stt");
    $getall->setFetchMode(PDO::FETCH_OBJ);
    $getall->execute();
    return $getall->fetchAll();
}

function __menu_2($mshs, $msdv, $msdn, $stt_menu)
{
    $database_sv = new database_sv();
    $getall = $database_sv->connect->prepare("SELECT stt, manghiepvu, tennghiepvu, tenmenu, sttmenu FROM hosophanquyen WHERE mshs='$mshs' AND msdv='$msdv' AND msdn='$msdn' and sttmenu='$stt_menu' and menu =2   ORDER BY sttmenu, stt");
    $getall->setFetchMode(PDO::FETCH_OBJ);
    $getall->execute();
    return $getall->fetchAll();
}
function __menu_3($mshs, $msdv, $msdn, $tenmenu)
{
    $database_sv = new database_sv();
    $getall = $database_sv->connect->prepare("SELECT stt, manghiepvu, tennghiepvu, tenmenu, sttmenu FROM hosophanquyen WHERE mshs='$mshs' AND msdv='$msdv' AND msdn='$msdn' and tenmenu='$tenmenu' and menu =3   ORDER BY sttmenu, stt");
    $getall->setFetchMode(PDO::FETCH_OBJ);
    $getall->execute();
    return $getall->fetchAll();
}

function _admin_menu_1($mshs, $msdv, $msdn, $loaihinh)
{
    if ($loaihinh != 'NK') {
        $loai = "'LD', 'TM'";
    } else {
        $loai = "'NK'";
    }
    $database = new database();
    $getall = $database->connect->prepare("SELECT stt,manghiepvu, tennghiepvu, tenmenu,sttmenu FROM hosochucnang WHERE  menu in(1,2) and loaihinh in ($loai,'ALL') and khoa = 0 group by sttmenu ORDER BY sttmenu, stt");
    $getall->setFetchMode(PDO::FETCH_OBJ);
    $getall->execute();
    return $getall->fetchAll();
}

function _admin_menu_2($mshs, $msdv, $msdn, $stt_menu)
{
    $database = new database();
    $getall = $database->connect->prepare("SELECT stt, manghiepvu, tennghiepvu, tenmenu, sttmenu FROM hosochucnang WHERE  sttmenu='$stt_menu' and menu =2 and khoa = 0  ORDER BY sttmenu, stt");
    $getall->setFetchMode(PDO::FETCH_OBJ);
    $getall->execute();
    return $getall->fetchAll();
}
function _admin_menu_3($mshs, $msdv, $msdn, $tenmenu)
{
    $database = new database();
    $getall = $database->connect->prepare("SELECT stt, manghiepvu, tennghiepvu, tenmenu, sttmenu FROM hosochucnang WHERE  tenmenu='$tenmenu' and menu =3 and khoa = 0   ORDER BY sttmenu, stt");
    $getall->setFetchMode(PDO::FETCH_OBJ);
    $getall->execute();
    return $getall->fetchAll();
}

function ktra_admin($mshs, $msdv, $msdn)
{
    $database_sv = new database_sv();
    $getall = $database_sv->connect->prepare("SELECT admin from hosonhanvien 
        where  mshs='$mshs' and msdv = '$msdv' and sodienthoai='$msdn'");
    $getall->setFetchMode(PDO::FETCH_OBJ);
    $getall->execute();
    return $getall->fetchAll();
}

function ktra_qltk($mshs, $msdv, $thamso)
{
    $database = new database();
    $getall = $database->connect->prepare("SELECT giatri from thamsohethong 
        where  mshs='$mshs' and msdv = '$msdv' and msthamso='$thamso'");
    $getall->setFetchMode(PDO::FETCH_OBJ);
    $getall->execute();
    return $getall->fetchAll();
}

function load_home($mshs, $msdv)
{
    $database_sv = new database_sv();
    $getall = $database_sv->connect->prepare("CALL `Show_Dashboard`('$mshs', '$msdv')");
    $getall->setFetchMode(PDO::FETCH_OBJ);
    $getall->execute();
    return $getall->fetchAll();
}

function GET_TBH_CMH($mshs, $msdv, $dieukien2)
{
    $database_sv = new database_sv();
    $getall = $database_sv->connect->prepare("SELECT msloai from dmphanloai where mshs='$mshs' and msdv='$msdv' and dieukien2='$dieukien2'");
    $getall->setFetchMode(PDO::FETCH_OBJ);
    $getall->execute();
    return $getall->fetchAll();
}

function ktra_hethan($mshs, $msdv, $loai)
{
    $query = '';
    if ($loai == 'ganhethan') {
        $query = 'AND  CURDATE() BETWEEN DATE_ADD(ngayhethan, INTERVAL -7 DAY) AND DATE_ADD(ngayhethan, INTERVAL -1 DAY)';
    } else {
        $query = "AND curdate() >= ngayhethan";
    }
    $database = new database();
    $getall = $database->connect->prepare("SELECT ngaykichhoat, sonam, sothangkm, ngayhethan, giahopdong FROM nhatky_giahan
    WHERE mshs='$mshs' and msdv = '$msdv'AND trangthai = 1  $query
    ");
    $getall->setFetchMode(PDO::FETCH_OBJ);
    $getall->execute();
    return $getall->fetchAll();
}

function load_landing_page_khachhang($rowid, $tendv)
{
    $database = new database();
    $getall = $database->connect->prepare("SELECT a.lastmodify, a.mshs, b.tendv, IFNULL(a.tieude,'The story of us')tieude, ifnull(a.noidung,'')noidung, ifnull(a.img_avt,'')img_avt, ifnull(a.img_donvi,'')img_donvi, ifnull(a.lydo,'')lydo, ifnull(a.goiy,'')goiy FROM landing_page a INNER join hosodonvi b ON a.mshs=b.mshs AND a.msdv=b.msdv WHERE a.rowid='$rowid' and a.tendv='$tendv'");
    $getall->setFetchMode(PDO::FETCH_OBJ);
    $getall->execute();
    return $getall->fetchAll();
}
