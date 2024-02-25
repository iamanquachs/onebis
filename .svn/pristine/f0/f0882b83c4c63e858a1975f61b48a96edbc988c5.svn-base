<?php
class danhmuc extends database_sv
{
    public function load_danhmuc($mshs, $msdv, $phanloai, $dieukien)
    {
        $getall = $this->connect->prepare("SELECT msloai, tenloai, dieukien1,dieukien2, admin, dieukien FROM dmphanloai where mshs='$mshs' and msdv='$msdv' and phanloai='$phanloai' order by dieukien, tenloai");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_phanloai($mshs, $msdv)
    {
        $getall = $this->connect->prepare("SELECT phanloai, tenphanloai FROM dmphanloai WHERE mshs='$mshs' and msdv='$msdv' and admin = 0 GROUP BY phanloai order by phanloai,tenphanloai");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function add_danhmuc($mshs, $msdv, $msloai, $tenloai, $phanloai, $tenphanloai, $dieukien1, $dieukien0)
    {
        $getall = $this->connect->prepare("INSERT INTO dmphanloai(mshs, msdv, msloai, tenloai, phanloai,tenphanloai, dieukien1, dieukien) VALUES('$mshs', '$msdv', '$msloai', '$tenloai', '$phanloai', '$tenphanloai','$dieukien1', '$dieukien0')");
        $getall->execute();
        return $getall->fetchAll();
    }
    public function edit_danhmuc($mshs, $msdv, $msloai, $tenloai, $phanloai, $dieukien1, $dieukien0)
    {
        $getall = $this->connect->prepare("UPDATE dmphanloai set tenloai='$tenloai', dieukien1='$dieukien1', dieukien='$dieukien0' where mshs='$mshs' and msdv='$msdv' and msloai='$msloai' and phanloai='$phanloai' ");
        $getall->execute();
        return $getall->fetchAll();
    }

    public function delete_danhmuc($mshs, $msdv, $msloai, $phanloai)
    {
        $getall = $this->connect->prepare("DELETE FROM dmphanloai where mshs='$mshs' and msdv='$msdv' and msloai='$msloai' and phanloai='$phanloai'");
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_phanloai_theophanloai($mshs, $msdv,  $phanloai)
    {
        $getall = $this->connect->prepare("SELECT phanloai,tenphanloai FROM dmphanloai
        WHERE mshs='$mshs' and msdv='$msdv'
        AND phanloai IN ($phanloai)
        GROUP BY phanloai
        ORDER BY phanloai desc");
        $getall->execute();
        return $getall->fetchAll();
    }
}
