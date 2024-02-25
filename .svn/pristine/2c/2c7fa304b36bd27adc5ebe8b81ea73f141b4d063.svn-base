<?php

class landing extends database
{

    public function load_landing_page($mshs, $msdv)
    {
        $getall = $this->connect->prepare("SELECT rowid, lastmodify,tendv, ifnull(tieude,'The story of us')tieude, ifnull(noidung,'')noidung, ifnull(img_avt,'')img_avt, ifnull(img_donvi,'')img_donvi, ifnull(lydo,'')lydo, goiy FROM landing_page WHERE mshs='$mshs' AND msdv='$msdv'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function edit_landing_page($mshs, $msdv, $tendv, $msdn, $tieude, $noidung, $img_avt, $img_donvi, $lydo)
    {
        $getall = $this->connect->prepare("UPDATE landing_page set lastmodify=NOW(),msdn='$msdn',tendv='$tendv', tieude='$tieude', noidung='$noidung', img_avt=if('$img_avt' <> '','$img_avt', img_avt), img_donvi='$img_donvi', lydo='$lydo' where mshs='$mshs' and msdv='$msdv'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function edit_goiy($mshs, $msdv, $goiy, $loai)
    {
        $query = '';
        if ($loai == 'add') {
            $query = "concat(goiy , '$goiy')";
        }
        if ($loai == 'delete') {
            $query = "'$goiy'";
        }
        $getall = $this->connect->prepare("UPDATE landing_page set goiy= $query where mshs='$mshs' and msdv='$msdv'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function send_yeucau($mshs, $msdv, $msdn, $sodienthoai, $hoten, $noidung, $rowid)
    {
        $getall = $this->connect->prepare("CALL `Post_Khac`('$rowid','$mshs', '$msdv', '$msdn', '', '$sodienthoai', '$hoten', '$noidung', 'YCTV')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
}
