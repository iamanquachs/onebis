<?php

class crm extends database_sv
{
    public function Show_CRM($msdv, $msdn)
    {
        $getall = $this->connect->prepare("CALL `Show_CRM`('$msdv', '$msdn')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function load_header($msdv, $trangthai, $nhanvien, $dht)
    {
        $new_query = " and a.soct not in (select soct from crm where trangthai = '$dht' and msdv = '$msdv' group by soct)  ";
        $query = "";
        if ($trangthai != '') {
            $query = " and a.trangthai = '$trangthai'";
            $new_query = '';
        }
        if ($nhanvien != '') {
            $query .= " and a.msdn = '$nhanvien'";
            $new_query = '';
        }

        $getall = $this->connect->prepare("SELECT a.soct, right(a.soct, 4)id_soct, a.trangthai AS mstrangthai, b.tenloai AS trangthai,
        a.dienthoai, a.hoten, a.loai FROM crm a
        INNER JOIN dmphanloai b ON a.msdv = b.msdv AND a.trangthai = b.msloai
        WHERE a.msdv='$msdv' and a.xoa=0   $query $new_query
        GROUP BY soct
        ORDER BY a.ngayyeucau");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_select($msdv, $msdn)
    {
        $getall = $this->connect->prepare("SELECT ''soct, 'Tất cả' noidung, NOW() ngayyeucau
        UNION ALL
        SELECT soct, CONCAT(DATE_FORMAT(ngayyeucau, '%d/%m/%y'),' • ', noidung)noidung,ngayyeucau  FROM crm
        WHERE msdv='$msdv' AND dienthoai='$msdn'
        GROUP BY soct
        ORDER BY ngayyeucau DESC");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function load_line($msdv, $soct, $sodienthoai)
    {
        $query = "and a.dienthoai='$sodienthoai'";
        if ($soct != '') {
            $query = "and a.soct='$soct'";
        }
        $getall = $this->connect->prepare("SELECT a.msdn,a.rowid, date_format(a.ngayyeucau,'%H:%i %d/%m/%Y')ngayyeucau, 
        if(a.phanloai = 'KH', a.hoten, b.hoten)hoten, a.noidung, c.tenloai, a.soct , a.phanloai, a.trangthai
       FROM crm a 
       left JOIN hosonhanvien b ON a.msdn=b.msdn AND a.msdv=b.msdv 
       INNER JOIN dmphanloai c ON a.trangthai=c.msloai AND a.msdv=c.msdv
       WHERE a.msdv='$msdv' and a.xoa=0 $query
       ORDER by a.lastmodify desc,a.soct");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function add_crm_line($msdv, $msdn, $soct, $trangthai, $noidung)
    {
        $getall = $this->connect->prepare("INSERT INTO crm( phanloai, soct, lastmodify, ngayyeucau, ngay, mshs, msdv, msdn, nguon, loai, trangthai, dienthoai, hoten, noidung) SELECT 'NV', soct, NOW(), ngayyeucau, CURDATE(), mshs, msdv, '$msdn', nguon, loai, '$trangthai', dienthoai, hoten,'$noidung' FROM crm WHERE msdv='$msdv' and soct='$soct' LIMIT 1");
        $getall->execute();
    }
    public function add_crm_header($mshs, $msdv, $msdn, $soct, $dienthoai, $hoten, $noidung, $clh)
    {
        $getall = $this->connect->prepare("INSERT INTO crm( phanloai, soct, lastmodify, ngayyeucau, ngay, mshs, msdv, msdn,  trangthai, dienthoai, hoten, noidung) VALUE('KH', '$soct', NOW(), NOW(), CURDATE(), '$mshs', '$msdv', '$msdn',  '$clh', '$dienthoai', '$hoten', '$noidung')");
        $getall->execute();
    }
    public function edit_chitiet_crm($msdv, $soct, $rowid, $noidung, $trangthai)
    {
        $getall = $this->connect->prepare("UPDATE crm set lastmodify=NOW(),noidung='$noidung', trangthai='$trangthai' where msdv='$msdv' and soct='$soct' and rowid='$rowid'");
        $getall->execute();
    }
    public function load_danhmuc($mshs, $msdv, $dieukien2)
    {
        $getall = $this->connect->prepare("SELECT msloai from dmphanloai where mshs='$mshs' and msdv='$msdv' and dieukien2='$dieukien2'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_thongbao_crm($mshs, $msdv)
    {
        $getall = $this->connect->prepare("SELECT COUNT(*) sl
        FROM
        (
        SELECT rowid FROM crm where mshs='$mshs' and
        msdv = '$msdv' group BY  soct
        HAVING COUNT(soct)=1
        ORDER BY soct
        )a");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
}
