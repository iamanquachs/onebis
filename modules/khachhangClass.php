<?php

class khachhang extends database_sv
{

    public function load_khachhang($mshs, $msdv,  $ngaysn, $nhom)
    {
        $filter = '';
        $query = '';
        if ($ngaysn != '') {
            $query = "and DATE_ADD(a.ngaysinh, 
            INTERVAL YEAR(CURDATE())-YEAR(a.ngaysinh)
                     + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(a.ngaysinh),1,0)
            YEAR)  
        BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL $ngaysn DAY)";
        }
        if ($nhom != '') {
            $filter = "and a.nhom_kh = '$nhom'";
        }

        $getall = $this->connect->prepare("SELECT * FROM 
        (
            SELECT a.lastmodify,DATE_FORMAT(a.ngaytao, '%d/%m/%Y') as ngaytao , a.mskh, a.tenkh, a.sodienthoai as sdt,
            CONCAT(SUBSTRING(a.sodienthoai,1,4),'.',SUBSTRING(a.sodienthoai,5,3),'.',
            SUBSTRING(a.sodienthoai,8,3))dienthoai, a.gioitinh, a.email, a.diachi, a.msxa, DATE_FORMAT(a.ngaysinh, '%d/%m/%Y') as ngaysinh, 
            a.nghenghiep, a.facebook, a.magioithieu, b.tennhom AS nhom_kh, b.msnhom FROM hosokhachhang a LEFT JOIN nhom_khachhang b ON a.nhom_kh = b.msnhom AND a.mshs = b.mshs AND b.loai='NKH'
            where a.mshs='$mshs' and a.msdv='$msdv'  $filter $query GROUP BY a.sodienthoai) a
            LEFT JOIN 
                (
                SELECT ifnull(SUM(tongcong),0)doanhso, sodienthoai FROM banhang_header WHERE mshs='$mshs' GROUP BY sodienthoai
                ) b
            ON  a.sdt = b.sodienthoai 
            LEFT JOIN 
                (
                SELECT ifnull(SUM(tongcong - dathanhtoan),0)conno, sodienthoai FROM banhang_header WHERE mshs='$mshs' GROUP BY sodienthoai
                ) c
            ON  a.sdt = c.sodienthoai
            ORDER BY tenkh
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);

        $getall->execute();
        return $getall->fetchAll();
    }
    public function edit_khachhang($msdn, $mshs, $msdv, $mskh, $tenkh, $diachi, $ngaysinh, $gioitinh, $nghenghiep)
    {
        $getall = $this->connect->prepare("UPDATE hosokhachhang set lastmodify = now(),tenkh='$tenkh',diachi='$diachi',ngaysinh='$ngaysinh', msdn='$msdn', gioitinh = if('$gioitinh' <> '','$gioitinh',gioitinh), nghenghiep = if('$nghenghiep' <> '','$nghenghiep',nghenghiep) 
        WHERE mskh='$mskh' and mshs='$mshs'
        ");
        $getall->execute();
        return $getall->fetchAll();
    }
    public function delete_hanghoa($mshs, $msdv, $mshh)
    {
        $getall = $this->connect->prepare("DELETE FROM hosohanghoa where mshs='$mshs' and msdv='$msdv' and mshh='$mshh'
        ");
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_nhom_kh($mshs, $msdv)
    {
        $getall = $this->connect->prepare("SELECT msnhom, tennhom FROM nhom_khachhang where mshs='$mshs'  and msdv='$msdv' ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_ms_nguoithan_new($mshs, $msdv, $sodienthoai)
    {
        $getall = $this->connect->prepare("SELECT concat(sodienthoai,'_', RIGHT(ms_nguoithan ,1) + 1)ms_nguoithan FROM hosonguoithan WHERE mshs='$mshs' and sodienthoai='$sodienthoai' ORDER by ms_nguoithan DESC LIMIT 1");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function add_nguoithan($msdn, $mshs, $msdv, $sodienthoai, $ms_nguoithan, $ten_nguoithan, $gioitinh_nguoithan, $ngaysinh_nguoithan)
    {
        $getall = $this->connect->prepare("INSERT INTO hosonguoithan(lastmodify, msdn, mshs, msdv, sodienthoai, ms_nguoithan, ten_nguoithan, ngaysinh, gioitinh) VALUES(NOW(), '$msdn', '$mshs', '$msdv','$sodienthoai','$ms_nguoithan', '$ten_nguoithan','$ngaysinh_nguoithan','$gioitinh_nguoithan')");
        $getall->execute();
        return $getall->fetchAll();
    }
    public function add_voucher($mshs, $msdv, $msdn, $mavoucher, $tenvoucher, $sotien, $handung, $search, $ngaysn, $nhom)
    {
        $filter = '';
        $query = '';
        if ($ngaysn != '') {
            $query = "and DATE_ADD(ngaysinh, 
            INTERVAL YEAR(CURDATE())-YEAR(ngaysinh)
                     + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(ngaysinh),1,0)
            YEAR)  
        BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL $ngaysn DAY)";
        }
        if ($nhom != '') {
            $filter = "and nhom_kh = '$nhom'";
        }
        if ($search != '') {
            $filter = "and tenkh like '%$search%' or sodienthoai like '%$search%'";
        }

        $getall = $this->connect->prepare("INSERT INTO hosovoucher(lastmodify,mshs, msdv, msdn, msvoucher, tenvoucher, sotien, sodienthoai,  handung) 
        SELECT NOW(),'$mshs', '$msdv', '$msdn',  '$mavoucher', '$tenvoucher', '$sotien',sodienthoai, '$handung' FROM hosokhachhang 
        where mshs='$mshs' and msdv='$msdv'  $filter $query");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
}
