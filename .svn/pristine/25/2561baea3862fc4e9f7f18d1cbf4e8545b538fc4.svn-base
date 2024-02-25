<?php
class tiepnhan extends database_sv
{
    public function load_benhnhan($mshs, $msdv, $valueSearch)
    {
        $getall = $this->connect->prepare("CALL `Show_KhachHang`('$mshs', '$msdv', '$valueSearch')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function load_khachdat($mshs, $msdv)
    {
        $getall = $this->connect->prepare(
            "SELECT c.mskh, c.tenkh, a.sodienthoai as sdt, DATE_FORMAT(a.ngaysinh, '%d/%m/%Y')ngaysinh,
        CONCAT(SUBSTRING(a.sodienthoai,1,4),'.',SUBSTRING(a.sodienthoai,5,3),'.',SUBSTRING(a.sodienthoai,8,3))sodienthoai, a.gioitinh, a.diachi,DATE_FORMAT(a.ngaykb, '%d/%m/%Y')ngay_kb,
         c.soct, year(CURDATE()) - year(a.ngaysinh) as tuoi,c.tuvan, date_format(c.lastmodify,'%H:%i')thoigian, date_format(c.lastmodify,'%d/%m/%Y')ngaydat
                from hosokhachhang a 
                inner join banhang_header c on a.sodienthoai=c.sodienthoai and a.mshs=c.mshs
                where a.mshs = '$mshs' and a.msdv='$msdv' and c.trangthai=0 and date(c.lastmodify)=CURDATE()
                order by c.lastmodify"
        );
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function update_soluong_hanghoa_banhang_line($mshs, $msdv, $sodienthoai, $soct, $idchidinh, $soluong)
    {
        $getall = $this->connect->prepare("UPDATE banhang_line set  soluong='$soluong', soluong_xuat='$soluong' where mshs='$mshs' and msdv='$msdv'  and sodienthoai='$sodienthoai 'and idchidinh='$idchidinh' and soct='$soct'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function update_ngaykham_benhnhan($mshs, $msdv, $sodienthoai, $soct)
    {
        $getall = $this->connect->prepare("UPDATE hosokhachhang set  soct='$soct', ngaykb='CURDATE()',
        sttkb=(SELECT count(rowid)+1 from banhang_header       
        where mshs = '$mshs' and msdv='$msdv' and ngaykb = CURRENT_DATE and dathen=0)
         where mshs='$mshs'  and sodienthoai='$sodienthoai'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function update_banhangline_donthuoc_dichvu($mshs, $msdv, $msdn, $soct, $nhomhh)
    {
        $nhom_ins = '';
        if ($nhomhh == 'DT') {
            $nhom_ins = "and nhom_hh='DT'";
        }
        if ($nhomhh == 'DV') {
            $nhom_ins = "and nhom_hh<>'DT'";
        }
        $getall = $this->connect->prepare("UPDATE banhang_line set lastmodify=NOW(),tam=0 where mshs='$mshs' and msdv='$msdv' and soct='$soct' and tam=1 $nhom_ins;
        CALL `Update_TrangThai_BanHangH`('$msdv', '$msdn', '$soct')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }


    public function update_henkhach($mshs, $msdv, $sodienthoai, $soct)
    {
        $getall = $this->connect->prepare("UPDATE banhang_header set trangthai='1', ngaykb=CURDATE(), dathen=0 where mshs='$mshs' and msdv='$msdv'and sodienthoai='$sodienthoai' and soct='$soct';
        UPDATE banhang_line set thuchien='1' where mshs='$mshs' and msdv='$msdv'and sodienthoai='$sodienthoai' and soct='$soct' and date(ngayhen)=CURDATE();
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function update_khachdat($mshs, $msdv, $sodienthoai, $soct, $tuvan, $ngayhen)
    {
        $getall = $this->connect->prepare("UPDATE banhang_header set lastmodify='$ngayhen', tuvan='$tuvan' where mshs='$mshs' and msdv='$msdv'and sodienthoai='$sodienthoai' and soct='$soct'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function delete_banhang_header($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("DELETE FROM banhang_header where mshs='$mshs' and msdv='$msdv' and soct='$soct' and trangthai=1, 
        DELETE FROM banhang_line where mshs='$mshs' and msdv='$msdv' and soct='$soct' and thuchien=1 ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function kiemtra_phanquyen_user($msdn, $components)
    {
        $getall = $this->connect->prepare("SELECT count(msdn)msdn from hosophanquyen where  msdn='$msdn' and manghiepvu = '$components' ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function update_banhangline_dichvu_set_tam($mshs, $msdv, $msdn, $soct)
    {
        $getall = $this->connect->prepare("UPDATE banhang_line set lastmodify=NOW(),tam=0 where mshs='$mshs' and msdv='$msdv' and soct='$soct' and tam=1 ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function update_nguoithan($mshs, $msdv, $sodienthoai, $msnguoithan, $soct)
    {
        $getall = $this->connect->prepare("UPDATE banhang_header set ms_nguoithan='$msnguoithan' where mshs='$mshs' and msdv='$msdv' and soct='$soct' and sodienthoai ='$sodienthoai' ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function add_nguoithuchien($rowidtc, $mshs, $msdv, $soct, $msnv, $mslieutrinh)
    {
        $getall = $this->connect->prepare("CALL `Post_NhatKyThucHien`('$mshs', '$msdv', '$soct', '$rowidtc', '$msnv', '$mslieutrinh')");
        $getall->execute();
        return $getall->fetchAll();
    }

    public function load_nguoithuchien($mshs, $msdv, $rowidtc)
    {
        $getall = $this->connect->prepare("SELECT replace(GROUP_CONCAT(tennv,'-',rowidtc,'-',msnv),',','|') AS nhanvien FROM nhatky_thuchien WHERE mshs='$mshs' AND msdv='$msdv' and loai='TH' AND rowidtc='$rowidtc'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_nhanvien_thuchien($mshs, $msdv, $rowid)
    {
        $getall = $this->connect->prepare("SELECT rowidtc, soct,msnv from nhatky_thuchien where mshs='$mshs' and msdv='$msdv' and rowidtc='$rowid' and loai='TH'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function add_banhang_header_khachdat($ngayhen, $loaiphieu, $msdn, $mshs, $msdv, $soct, $socttc, $mskh, $tenkh, $sodienthoai, $tongcong, $trangthai, $dathen, $ngaydat, $ghichu, $msnguoithan)
    {
        $getall = $this->connect->prepare("INSERT INTO banhang_header(lastmodify,loai_phieu, dathen, ngay, msdn, mshs, msdv, soct, socttc, sohd, mskh, tenkh, sodienthoai, tongcong, trangthai,ngaykb, tuvan, ms_nguoithan) VALUES('$ngayhen','$loaiphieu', '$dathen', '$ngaydat', '$msdn', '$mshs','$msdv','$soct', '$socttc','','$mskh', '$tenkh','$sodienthoai', '$tongcong', '$trangthai','$ngaydat', '$ghichu','$msnguoithan')");
        $getall->execute();
    }
}
