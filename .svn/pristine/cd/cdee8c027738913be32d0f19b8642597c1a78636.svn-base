<?php
class member extends database_sv
{
    public function load_member($mshs, $msdv, $loai)
    {
        $getall = $this->connect->prepare("SELECT msnhom, tennhom, phantramgiam, sotientu, sotienden FROM nhom_khachhang where mshs='$mshs' and msdv='$msdv' AND loai='$loai' order by phantramgiam");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function add_member($msdn, $mshs, $msdv, $msnhom, $tennhom, $phantramgiam, $sotientu, $sotienden,$loai)
    {
        $getall = $this->connect->prepare("INSERT INTO nhom_khachhang(msdn, mshs, msdv, msnhom, tennhom, phantramgiam, sotientu, sotienden, loai) VALUES('$msdn','$mshs', '$msdv', '$msnhom', '$tennhom', '$phantramgiam', '$sotientu', '$sotienden','$loai')");
        $getall->execute();
        return $getall->fetchAll();
    }
    public function edit_member($mshs, $msdv, $msnhom, $tennhom, $phantramgiam, $sotientu, $sotienden)
    {
        $getall = $this->connect->prepare("UPDATE nhom_khachhang set tennhom='$tennhom', phantramgiam='$phantramgiam', sotientu='$sotientu', sotienden='$sotienden' where mshs='$mshs' and msdv='$msdv' and msnhom='$msnhom'");
        $getall->execute();
        return $getall->fetchAll();
    }

    public function delete_member($mshs, $msdv, $msnhom)
    {
        $getall = $this->connect->prepare("DELETE FROM nhom_khachhang where mshs='$mshs' and msdv='$msdv' and msnhom='$msnhom'");
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_phankhuc($mshs, $msdv)
    {
        $getall = $this->connect->prepare("SELECT rowid, msloai,dieukien1, dieukien2 FROM dmphanloai WHERE mshs='$mshs' and msdv='$msdv' and phanloai='pkkh' ORDER BY dieukien1");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function add_phankhuc($mshs, $msdv, $msloai, $tenloai, $tenphanloai, $tuoitu, $tuoiden)
    {
        $getall = $this->connect->prepare("INSERT INTO dmphanloai( mshs, msdv, msloai, tenloai, phanloai, tenphanloai, dieukien1, dieukien2) VALUES('$mshs', '$msdv', '$msloai', '$tenloai','pkkh', '$tenphanloai', '$tuoitu', '$tuoiden')");
        $getall->execute();
        return $getall->fetchAll();
    }
    public function edit_phankhuc($mshs, $msdv, $rowid, $tuoitu, $tuoiden)
    {
        $getall = $this->connect->prepare("UPDATE dmphanloai set dieukien1='$tuoitu', dieukien2='$tuoiden' where mshs='$mshs' and msdv='$msdv' and rowid='$rowid'");
        $getall->execute();
        return $getall->fetchAll();
    }

    public function delete_phankhuc($mshs, $msdv, $rowid)
    {
        $getall = $this->connect->prepare("DELETE FROM dmphanloai where mshs='$mshs' and msdv='$msdv' and rowid='$rowid'");
        $getall->execute();
        return $getall->fetchAll();
    }
}
