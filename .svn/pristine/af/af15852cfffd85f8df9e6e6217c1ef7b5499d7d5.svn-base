<?php
class thamso_control extends database
{
    public function load_thamsohethong($mshs, $msdv, $msthamso)
    {
        $query = '';
        if ($msthamso != '') {
            $query = " msthamso, tenthamso, giatri, admin from thamsohethong 
            where  mshs='$mshs' and msdv = '$msdv' and msthamso='$msthamso' order by admin,stt";
        } else {
            $query = " msthamso, tenthamso, giatri, admin, stt from thamsohethong 
            where  msdv = '$msdv'
            UNION ALL 
            SELECT 'DayExp'msthamso, 'Số ngày sử dụng còn lại'tenthamso, DATEDIFF(ngayhethan,CURDATE())giatri, 1 ADMIN, '100'stt  
            FROM nhatky_giahan WHERE msdv = '$msdv' and trangthai = 1 order by admin,stt";
        }
        $getall = $this->connect->prepare("SELECT $query");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function edit_thamsohethong($mshs, $msdv, $msthamso, $giatri)
    {

        $getall = $this->connect->prepare("UPDATE thamsohethong set giatri='$giatri' where mshs='$mshs' and msdv='$msdv' and msthamso='$msthamso' ");
        $getall->execute();
    }
    public function load_thamso_nganhang($msdv)
    {
        $getall = $this->connect->prepare("SELECT giatri from thamsohethong where msdv='$msdv' and msthamso in('BANK_bin', 'BANK_sotaikhoan') ORDER BY LENGTH(giatri)");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_nganhang()
    {
        $getall = $this->connect->prepare("SELECT `name`, bin,short_name,logo  from hosonganhang");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
}
