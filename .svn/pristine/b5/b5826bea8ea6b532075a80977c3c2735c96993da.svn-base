<?php

class nhanvien extends database_sv
{
    public function load_nhanvien($mshs, $msdv, $search, $loai_nv, $chucvu, $trangthai)
    {
        $query = '';
        $filter = '';
        if ($search != '') {
            $query = "and (a.hoten like '%$search%' or a.sodienthoai like '%$search%')";
        }
        if ($loai_nv != '') {
            $filter .= "and a.loai_nv='$loai_nv'";
        }
        if ($chucvu != '') {
            $filter .= "and a.mschucvu='$chucvu'";
        }
        if ($trangthai != '') {
            $filter .= "and a.khoa='$trangthai'";
        }
        $getall = $this->connect->prepare("SELECT a.msdn,a.khoa,a.loai_nv,b.tenloai AS tenloainv, CONCAT(SUBSTRING(a.sodienthoai,1,4),'.',SUBSTRING(a.sodienthoai,5,3),'.',SUBSTRING(a.sodienthoai,8,3))sodienthoai, a.hoten, DATE_FORMAT(a.ngaysinh,'%d/%m/%Y')ngaysinh, a.gioitinh, a.diachi, a.email, a.ngaytuyendung,
        a.luongcoban, a.luongtheogio,
        a.cccd, a.loai_hd, a.mschucvu, c.tenloai AS tenchucvu, a.admin
               FROM hosonhanvien a 
                 inner join dmphanloai b on a.loai_nv =b.msloai AND b.phanloai='loai_nv'
                 inner join dmphanloai c on a.mschucvu =c.msloai AND c.phanloai='chucvu'
               WHERE a.mshs = '$mshs' AND a.msdv='$msdv' $query $filter order by hoten");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function add_nhanvien($khoa, $admin, $loai_nv, $msdn, $mshs, $msdv, $sodienthoai, $hoten, $ngaysinh, $gioitinh, $diachi, $email, $ngaytuyendung, $luongtheogio, $luongcoban, $cccd, $loai_hd, $mschucvu)
    {
        $getall = $this->connect->prepare("INSERT INTO hosonhanvien(lastmodify, khoa,admin, loai_nv, msdn, mshs, msdv, sodienthoai, hoten, ngaysinh, gioitinh, diachi, email, ngaytuyendung, luongtheogio, luongcoban, cccd, loai_hd, mschucvu) VALUES(NOW(), '$khoa','$admin', '$loai_nv', '$msdn', '$mshs', '$msdv', '$sodienthoai', '$hoten', '$ngaysinh', '$gioitinh', '$diachi', '$email', NOW(), '$luongtheogio', '$luongcoban', '$cccd', '$loai_hd', '$mschucvu')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function edit_nhanvien($msdn, $mshs, $msdv, $sodienthoai, $hoten, $loai_nv, $gioitinh, $diachi, $email, $ngaysinh, $luongcoban, $luongtheogio, $cccd, $loai_hd, $khoa, $mschucvu, $admin)
    {

        $getall = $this->connect->prepare("UPDATE hosonhanvien set sodienthoai='$sodienthoai', hoten='$hoten',loai_nv='$loai_nv',gioitinh='$gioitinh',diachi='$diachi',email='$email',ngaysinh='$ngaysinh',luongcoban='$luongcoban',luongtheogio='$luongtheogio',cccd='$cccd',loai_hd='$loai_hd',khoa='$khoa',`admin`='$admin', mschucvu='$mschucvu' where mshs='$mshs' and msdv='$msdv' and msdn='$msdn'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function delete_nhanvien($mshs, $msdv, $msdn)
    {
        $getall = $this->connect->prepare("DELETE FROM hosonhanvien where mshs='$mshs' and msdv='$msdv' and msdn='$msdn'; DELETE FROM hosophanquyen where mshs='$mshs' and msdv='$msdv' and msdn='$msdn'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_chucnang_dacap($mshs, $msdn, $msdv)
    {

        $getall = $this->connect->prepare("SELECT stt,tenmenu, manghiepvu, tennghiepvu from hosophanquyen where mshs='$mshs' and msdv='$msdv' and msdn='$msdn'  order by tenmenu");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function add_chucnang($mshs, $msdv, $msdn, $rowid)
    {
        $control = $this->control_variable;
        $sv = $this->sv_variable;
        $getall = $this->connect->prepare("INSERT INTO $sv.hosophanquyen(mshs, msdv, msdn,stt, manghiepvu, tennghiepvu, tenmenu, sttmenu,menu)
        SELECT '$mshs', '$msdv', '$msdn',stt, manghiepvu, tennghiepvu, tenmenu, sttmenu,menu from $control.hosochucnang where rowid ='$rowid'");
        $getall->execute();
    }
    public function delete_chucnang($mshs, $msdv, $msdn, $manghiepvu)
    {
        $getall = $this->connect->prepare("DELETE FROM hosophanquyen where mshs='$mshs' and msdv='$msdv' and msdn='$msdn' and manghiepvu='$manghiepvu'");
        $getall->execute();
    }
    public function load_chucnang($mshs, $msdv, $msdn, $loaihinh)
    {
        if ($loaihinh != 'NK') {
            $loai = "'LD', 'TM'";
        } else {
            $loai = "'NK'";
        }
        $control = $this->control_variable;
        $sv = $this->sv_variable;
        $getall = $this->connect->prepare("SELECT rowid,manghiepvu, tennghiepvu, stt, tenmenu, sttmenu from $control.hosochucnang where khoa = 0 and manghiepvu not in (select manghiepvu from $sv.hosophanquyen where msdv = '$msdv' and mshs='$mshs' and msdn='$msdn') and loaihinh in ($loai,'ALL') order by sttmenu,stt");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function xinghiphep($mshs, $msdv, $msdn, $tennv, $lydo, $tungay, $denngay)
    {
        $getall = $this->connect->prepare("INSERT INTO hosochamcong (lastmodify, mshs, msdv,
        tungay, denngay, lydo, msnv, tennv, luongcoban)
        SELECT NOW(),'$mshs', '$msdv','$tungay', '$denngay', '$lydo',
        '$msdn', '$tennv', luongcoban
        FROM hosonhanvien WHERE sodienthoai= '$msdn' AND msdv='$msdv'");
        $getall->execute();
    }

    public function load_duyetnghiphep($mshs, $msdv)
    {
        $getall = $this->connect->prepare("SELECT a.rowid, a.msnv, a.tennv, a.tungay, a.denngay, a.songay, a.lydo, concat(ifnull(b.danghi,0),'/',a.duocnghi)danghi, a.note from 
        (
            SELECT a.rowid, a.msnv, a.tennv, date_format(a.tungay, '%d/%m/%Y')tungay, date_format(a.denngay, '%d/%m/%Y')denngay, 
            DATEDIFF(a.denngay, a.tungay)+1 as songay, a.lydo,
            c.dieukien as duocnghi,
            if(DATEDIFF(a.denngay, tungay)>c.dieukien,1,0)note
            from hosochamcong a
            inner join hosonhanvien b on a.msdv = b.msdv and a.msnv = b.sodienthoai
            INNER join dmphanloai c on b.mschucvu = c.msloai and a.msdv = b.msdv
            where a.trangthai=0
            and a.mshs='$mshs' and a.msdv='$msdv'
            
        )a
        LEFT join
            (select sum(DATEDIFF(denngay, tungay)+1)danghi, msnv as msnvdanghi from hosochamcong where month(denngay ) = MONTH(CURRENT_DATE())
            and trangthai=1 and loai=1 and mshs='$mshs' and msdv='$msdv'
            GROUP by msnv
            )b
        on a.msnv = b.msnvdanghi;
        order by a.tungay desc, a.msnv
       ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function duyet_nghiphep($mshs, $msdv, $msdn, $rowid, $trangthai)
    {
        $getall = $this->connect->prepare("UPDATE hosochamcong set trangthai = '$trangthai', ms_nguoiduyet='$msdn', ngayduyet=NOW() where mshs='$mshs' and msdv='$msdv' and rowid ='$rowid'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_lichsu_thangnghi($mshs, $msdv, $msdn)
    {
        $getall = $this->connect->prepare("SELECT concat(date_format(denngay,'%m'),'/',YEAR(denngay))ngay, date_format(denngay,'%m')thang
        FROM hosochamcong WHERE mshs='$mshs' and  msdv='$msdv' AND msnv='$msdn' GROUP BY ngay ORDER BY YEAR(denngay) desc, date_format(denngay,'%m') desc");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_lichsu__chitiet_thangnghi($mshs, $msdv, $msdn, $thang)
    {
        $query = " and month(denngay) = month(curdate())";
        if ($thang != '') {
            $query = " and month(denngay) = '$thang'";
        }
        $getall = $this->connect->prepare("SELECT rowid, date_format(tungay, '%d/%m/%Y')tungay, date_format(denngay, '%d/%m/%Y')denngay, DATEDIFF(denngay, tungay)songay, trangthai 
        from hosochamcong 
        where  mshs='$mshs' and msdv='$msdv' and msnv='$msdn' $query order by tungay desc, trangthai");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function delete_nghiphep($mshs, $msdv, $msdn, $rowid)
    {
        $getall = $this->connect->prepare("DELETE from hosochamcong where mshs='$mshs' and msdv='$msdv' and msnv='$msdn' and rowid='$rowid'");
        $getall->execute();
    }
};
class nhanvien_control extends database
{
    public function delete_nhanvien_sv($mshs, $msdv, $msdn)
    {
        $getall = $this->connect->prepare("DELETE FROM hosonhanvien where mshs='$mshs' and msdv='$msdv' and msdn='$msdn'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function add_nhanvien_sv($msdn, $mshs, $msdv, $khoa, $sodienthoai, $matkhau)
    {
        $getall = $this->connect->prepare("INSERT INTO hosonhanvien(lastmodify, msdn, mshs, msdv, khoa, sodienthoai, matkhau) VALUES(now(), '$msdn','$mshs','$msdv','$khoa','$sodienthoai', '$matkhau')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function edit_nhanvien_sv($msdn, $mshs, $msdv, $khoa, $sodienthoai, $matkhau)
    {
        $matkhau_new = '';
        $mk = md5($matkhau);
        if ($matkhau != '') {
            $matkhau_new = ", matkhau='$mk'";
        };
        $getall = $this->connect->prepare("UPDATE hosonhanvien set khoa='$khoa', sodienthoai='$sodienthoai' $matkhau_new where msdn='$msdn' and mshs='$mshs' and msdv='$msdv' ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function ktra_matkhaucu($mshs, $msdv, $msdn,  $matkhaucu)
    {
        $matkhau =  md5($matkhaucu);
        $getall = $this->connect->prepare("SELECT sodienthoai from hosonhanvien where mshs='$mshs' and msdv='$msdv' and matkhau ='$matkhau' and msdn='$msdn' ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function doimatkhau($mshs, $msdv, $msdn, $matkhaumoi)
    {
        $matkhau = md5($matkhaumoi);
        $getall = $this->connect->prepare("UPDATE hosonhanvien set  matkhau='$matkhau' where msdn='$msdn' and mshs='$mshs' and msdv='$msdv' ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
}
