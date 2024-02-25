<?php
class quanlytaisan extends database_sv
{
    public function load_taisan($mshs, $msdv)
    {
        $getall = $this->connect->prepare("SELECT a.mshh, a.tenhh,a.msphongban, a.tenphongban, sum(abs(xuat))xuat, sum(nhap)nhap, sum(nhap)-sum(abs(xuat))ton, a.mshs, a.msdv
        from 
        (
            select a.rowid,a.mshh, a.tenhh, a.msdonvi as msphongban, b.tenloai as tenphongban,
            case when  a.soluong < 0 then a.soluong ELSE 0 END 'Xuat',
            case when  a.soluong > 0 then a.soluong ELSE 0 END 'Nhap',
            a.mshs, a.msdv
            from hososudungtaisan a
            INNER join dmphanloai b 
            ON a.msdonvi = b.msloai and a.mshs = b.mshs and b.phanloai='phongban'
            where  a.mshs='$mshs' and if('$msdv'='', 1=1, a.msdv='$msdv')  
            order by a.rowid, a.tenhh   
        ) a
        group by mshh, msphongban order by rowid, tenhh ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_chitiet_quanly_taisan($mshs, $msdv, $mshh)
    {
        $getall = $this->connect->prepare("SELECT a.rowid,a.loaixuat, c.ngaygs ngaymua, a.ngayxuat, a.msnguoixuat, d.hoten AS nguoixuat, a.msdonvi_xuat, a.ngaynhan, a.msnguoinhan, a.msdonvi_nhan,
        a.msnguoi_sudung, a.soct, a.mshh, a.tenhh, a.soluong,b.thoihan_khauhao 
        FROM hososudungtaisan a
        INNER JOIN hosohanghoa b ON a.mshh=b.mshh AND a.mshs=b.mshs
        INNER JOIN nhapkholine c ON a.mshh=c.mshh AND a.mshs=c.mshs
        INNER JOIN hosonhanvien d ON a.msnguoixuat=d.sodienthoai AND a.mshs=d.mshs 
        where a.mshs='$mshs' and a.msdv='$msdv' and a.mshh='$mshh' group by a.soct");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function add_xuat_taisan($msdn, $mshs, $msdv, $loaixuat, $donvinhan, $soct, $mshh, $tenhh, $soluong)
    {
        $getall = $this->connect->prepare("INSERT INTO hososudungtaisan(lastmodify, loaixuat, msdn, mshs, msdv, ngay, msdonvi, soct, mshh, tenhh, soluong) VALUES(NOW(), '$loaixuat','$msdn','$mshs', '$msdv',NOW(),'$donvinhan', '$soct','$mshh', '$tenhh', '$soluong')");
        $getall->execute();
        return $getall->fetchAll();
    }
    public function update_hososudungtaisan($msdn, $mshs, $msdv,  $soct, $mshh, $loai)
    {
        $query = '';
        if ($loai == 'duyet') {
            $query = "msnguoi_duyet='$msdn',  thoigian_duyet=NOW()";
        }
        if ($loai == 'nhan') {
            $query = "msnguoi_nhan='$msdn',  thoigian_nhan=NOW()";
        }
        $getall = $this->connect->prepare("UPDATE hososudungtaisan set lastmodify=NOW(), $query where mshs='$mshs' and msdv='$msdv' and soct='$soct'");
        $getall->execute();
        return $getall->fetchAll();
    }
    public function find_hanghoa($mshs, $msdv, $tenhh)
    {
        $getall = $this->connect->prepare("SELECT a.mshh, b.tenhh, a.toncuoi FROM tonkho a inner JOIN hosohanghoa b ON a.mshh=b.mshh WHERE a.mshs='$mshs' AND a.msdv='$msdv' and b.tenhh like '%$tenhh%' GROUP BY a.mshh");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
}
