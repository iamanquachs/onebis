<?php

class voucher extends database_sv
{

    public function load_voucher($mshs, $msdv, $valueSearch, $tungay, $denngay, $locloai, $nhom, $vitri, $msvoucher)
    {
        $filter = '';
        $query = '';
        if ($valueSearch != '') {
            $filter = $filter . "and (a.tenvoucher like '%$valueSearch%' or a.sodienthoai like '%$valueSearch%')";
        }

        if ($locloai != '') {
            $filter .= "and a.trangthai = '$locloai'";
        }
        if ($nhom != '') {
            $filter .= "and b.nhom_kh = '$nhom'";
        }
        if ($vitri == 'header') {
            $query = "group by a.msvoucher";
        }
        if ($msvoucher != '') {
            $filter .= "and a.msvoucher = '$msvoucher'";
        }
        $getall = $this->connect->prepare("SELECT DATE_FORMAT(a.lastmodify, '%H:%i %d/%m/%Y')ngay, a.rowid, 
        CONCAT(SUBSTRING(a.sodienthoai,1,4),'.',SUBSTRING(a.sodienthoai,5,3),'.',SUBSTRING(a.sodienthoai,8,3))sodienthoai, CONCAT(CONCAT(SUBSTRING(a.sodienthoai,1,4),'.',SUBSTRING(a.sodienthoai,5,3),'.',SUBSTRING(a.sodienthoai,8,3)),' • ',b.tenkh)khachhang,
        a.msvoucher, a.tenvoucher, a.sotien, a.mabaomat, a.loai, a.trangthai, DATE_FORMAT(handung, '%d/%m/%Y')handung, a.rowid,
        c.tennhom
        FROM hosovoucher a
        INNER JOIN hosokhachhang b ON a.sodienthoai = b.sodienthoai and b.mshs='$mshs' and b.msdv='$msdv'
        LEFT JOIN nhom_khachhang c ON b.nhom_kh = c.msnhom where a.mshs='$mshs' and a.msdv='$msdv' and c.mshs='$mshs' and c.msdv='$msdv' and a.handung between '$tungay' and '$denngay' $filter $query  order by a.rowid desc ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function add_voucher($mshs, $msdv, $msdn,  $mskh, $mavoucher, $tenvoucher, $sotien, $handung)
    {
        $getall = $this->connect->prepare("INSERT INTO hosovoucher(lastmodify,mshs, msdv, msdn, msvoucher, tenvoucher, sotien, sodienthoai,  handung) VALUES (NOW(),'$mshs', '$msdv', '$msdn',  '$mavoucher', '$tenvoucher', '$sotien','$mskh', '$handung')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function edit_voucher($loaivoucher, $mskh, $mavoucher, $tenvoucher, $sotien, $thoihan, $mabaomat, $trangthai)
    {
        $getall = $this->connect->prepare("UPDATE set lastmodify=NOW(),mskh='$mskh', tenvoucher='$tenvoucher', sotien='$sotien', mabaomat='$mabaomat', loai='$loaivoucher', trangthai='$trangthai', thoihan='$thoihan' FROM hosovoucher where mavoucher='$mavoucher'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function delete_voucher($msdv, $mshs, $rowid)
    {
        $getall = $this->connect->prepare("DELETE FROM hosovoucher where rowid='$rowid' and mshs='$mshs' and msdv='$msdv'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function add_voucher_all_kh($mshs, $msdv, $msdn, $mavoucher, $tenvoucher, $sotien, $handung, $nhom)
    {

        $getall = $this->connect->prepare("INSERT INTO hosovoucher(lastmodify,mshs, msdv, msdn, msvoucher, tenvoucher, sotien, sodienthoai,  handung) 
        SELECT NOW(),'$mshs', '$msdv', '$msdn',  '$mavoucher', '$tenvoucher', '$sotien',
        sodienthoai, '$handung' FROM hosokhachhang 
        where mshs='$mshs' and msdv='$msdv' and if('$nhom' = 'all', '1=1', nhom_kh = '$nhom')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function tim_khachhang($mshs, $msdv, $value)
    {
        $getall = $this->connect->prepare("SELECT sodienthoai, tenkh FROM hosokhachhang WHERE mshs='$mshs' and msdv='$msdv' and sodienthoai like '%$value%'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
}
