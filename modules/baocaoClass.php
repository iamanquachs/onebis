<?php
class baocao extends database_sv
{
    public function baocao_thuchi($mshs, $msdv, $msdn, $tungay, $denngay, $khoanmuc, $nguoilap)
    {

        $getall = $this->connect->prepare("CALL `BC_ThuChi`('$mshs', '$msdv', '$msdn', '$tungay', '$denngay', '$khoanmuc', '$nguoilap')
         ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function baocao_thuchiendichvu($mshs, $msdv, $tungay, $denngay)
    {

        $query_msdv = '';
        if ($msdv != '') {
            $query_msdv = "and msdv='$msdv'";
        }
        $getall = $this->connect->prepare("SELECT rowid, msnv, tennv,concat(msnv,' | ', tennv)nhanvien, thuchien, doanhso, hoahong, luongcoban, songay_duocnghi,songaynghi,ngaycong, luongngaycong, tienphucap, tamung, khoantru,tongnhan, chucvu, phucap, msdv, trangthai, sophieuchi, sophieuthu from bangluong where mshs='$mshs' $query_msdv and tungay='$tungay' and denngay='$denngay' order by trangthai,chucvu
         ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function baocao_thuchiendichvu_msdv($mshs, $msdv, $tungay, $denngay, $msdn)
    {

        $getall = $this->connect->prepare("CALL `TinhLuongNhanVien`('$mshs', '$msdv', '$tungay', '$denngay', '$msdn')
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function update_khoantru($mshs, $msdv, $rowid, $sotien)
    {
        $getall = $this->connect->prepare("UPDATE bangluong set khoantru='$sotien',
        tongnhan = luongcoban+hoahong+tienphucap - tamung - '$sotien'  where mshs='$mshs' and msdv='$msdv' and rowid='$rowid'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }


    public function add_thuchi_bangluong($msdn, $mshs, $msdv, $soct, $socttc, $sohd, $mskh, $tenkh, $sotien, $noidung, $msnv, $tennv, $loaichungtu, $nganquy,  $makhoanmuc)
    {
        $loaiphieu = '';
        if ($loaichungtu == 0) {
            $loaiphieu = "sophieuthu='$soct'";
        } else {
            $loaiphieu = "sophieuchi='$soct', trangthai='1'";
        }

        $getall = $this->connect->prepare("INSERT INTO thuchi (lastmodify, msdn, mshs, msdv, soct,socttc, sohd, ngay, mskh, tenkh, sotien, noidung, msnv, tennv, loaichungtu, nganquy, makhoanmuc) VALUES( NOW(), '$msdn', '$mshs', '$msdv', '$soct', '$socttc','$sohd', CURDATE(), '$mskh', '$tenkh','$sotien', '$noidung','$msnv','$tennv', '$loaichungtu', '$nganquy', '$makhoanmuc' );
         UPDATE bangluong set lastmodify=NOW(), $loaiphieu where msnv='$msnv' and mshs='$mshs' and msdv='$msdv' ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function delete_thuchi_luong($mshs, $msdv, $msnv, $sophieu)
    {

        $getall = $this->connect->prepare("UPDATE bangluong set trangthai='0',sophieuthu='', sophieuchi='' where mshs='$mshs' and msdv='$msdv' and msnv='$msnv'; DELETE from thuchi where mshs='$mshs' and msdv='$msdv' and soct='$sophieu'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function chitiet_baocao_thuchiendichvu($mshs, $msdv, $msnv, $tungay, $denngay)
    {
        $query = '';
        if ($msdv != '') {
            $query = " and a.msdv='$msdv'";
        }
        $getall = $this->connect->prepare("	SELECT date_format(date(b.time_hoanthanh),'%d/%m/%Y') ngay, b.msnv, b.tennv, a.tenhh, CONCAT(date_format(b.time_thuchien, '%H:%i'),' - ', date_format(b.time_hoanthanh, '%H:%i')) thoigian,
        date_format(TIMEDIFF(b.time_hoanthanh, b.time_thuchien),'%H:%i')timeht,
        SUM(giathu*soluong)doanhso,
        round(sum(b.ptthuchien * (a.giathu*a.soluong)/100),0)hoahong,
        a.mshs, a.msdv, b.rowidtc
        FROM banhang_line a 
        INNER JOIN nhatky_thuchien b ON a.rowid = b.rowidtc
        WHERE a.mshs = '$mshs' $query and b.msnv='$msnv' AND date(b.time_hoanthanh) BETWEEN '$tungay' AND '$denngay'
        ORDER BY date(b.time_hoanthanh) desc
         ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function baocao_hoatdong($mshs, $msdv, $loai, $tungay, $denngay)
    {

        $getall = $this->connect->prepare("CALL `BC_HoatDong`('$mshs', '$msdv', '$tungay', '$denngay',$loai)");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function chart_baocao_hieuqua_nhanvien($mshs, $msdv, $khachhang, $nhanvien, $danhgia, $tungay, $denngay)
    {
        $filter = '';
        if ($khachhang != '') {
            $filter .= "AND a.sodienthoai='$khachhang'";
        }
        if ($nhanvien != '') {
            $filter .= "AND c.msnv='$nhanvien'";
        }
        if ($danhgia != '') {
            $filter .= "AND a.mshh='$danhgia'";
        }

        $getall = $this->connect->prepare("SELECT
         CASE
        when a.mshh='1RKHL' then 'Rất không hài lòng'
        when a.mshh='2KHL' then 'Không hài lòng'
        when a.mshh='3HL' then 'Hài lòng'
        else 'Rất hài lòng'
        end
        mshh, COUNT(a.mshh)soluong FROM nhatky_tuvan a
        INNER JOIN banhang_header b ON a.soct=b.soct AND a.msdv=b.msdv
        INNER JOIN nhatky_thuchien c ON a.soct=c.soct AND a.msdv=c.msdv
        WHERE a.mshs='$mshs' AND a.msdv='$msdv' 
        AND DATE(a.lastmodify) BETWEEN '$tungay' AND '$denngay' 
        AND a.loai='DG' $filter GROUP BY a.mshh ORDER BY ngay,a.mshh");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function baocao_hieuqua_nhanvien($mshs, $msdv, $khachhang, $nhanvien, $danhgia, $tungay, $denngay)
    {
        $filter = '';
        if ($khachhang != '') {
            $filter .= "AND a.sodienthoai='$khachhang'";
        }
        if ($nhanvien != '') {
            $filter .= "AND c.msnv='$nhanvien'";
        }
        if ($danhgia != '') {
            $filter .= "AND a.mshh='$danhgia'";
        }

        $getall = $this->connect->prepare("SELECT date_format(c.time_thuchien,'%d/%m/%Y %H:%i')ngaythuhien,
        date_format(c.time_hoanthanh,'%d/%m/%Y %H:%i')ngayhoanthanh,
        date_format(timediff(c.time_hoanthanh, c.time_thuchien),'%H:%i')thoigian,
        b.tenhh,
        ((b.soluong*b.giathu) - (b.soluong*b.gianhap))loinhuan,
        CONCAT (CONCAT(SUBSTRING(a.sodienthoai,1,4),'.',SUBSTRING(a.sodienthoai,5,3),'.',SUBSTRING(a.sodienthoai,8,3)),' • ', d.tenkh)khachhang, 
        c.tennv, a.mshh
        FROM nhatky_tuvan a
        INNER JOIN nhatky_thuchien c ON a.soct=c.soct AND a.msdv=c.msdv
        INNER JOIN banhang_line b ON c.rowidtc=b.rowid AND a.msdv=b.msdv
        INNER JOIN hosokhachhang d ON b.sodienthoai=d.sodienthoai AND a.mshs=d.mshs
        WHERE year(c.time_hoanthanh)<>'0000' and a.mshs='$mshs' AND a.msdv='$msdv' 
        AND DATE(a.lastmodify) BETWEEN '$tungay' AND '$denngay'  
        AND a.loai='DG' $filter ORDER BY c.time_thuchien desc, c.time_hoanthanh desc, c.msnv,a.mshh");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function baocao_hoatdong_theonam($mshs, $msdv, $nam)
    {
        $getall = $this->connect->prepare("CALL `BC_HoatDong_Nam`('$mshs', '$msdv', '$nam')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function chart_baocao_hoatdong_cautruc_chiphi($mshs, $msdv, $nam)
    {

        $getall = $this->connect->prepare("CALL `BC_CauTrucChiPhi`('$mshs', '$msdv', '$nam')
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function baocao_hanghoa_dichvu($mshs, $msdv, $loai, $tungay, $denngay)
    {

        $getall = $this->connect->prepare("CALL `BC_TopHHDV`('$mshs', '$msdv', '$tungay', '$denngay', '$loai')
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function case_baocaodotuoi($mshs, $msdv,  $loai)
    {

        $getall = $this->connect->prepare("CALL `BC_PhanKhucKhachHang`('$mshs', '$msdv','$loai')
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function when_baocaodotuoi($mshs, $msdv, $select, $query, $order, $tungay, $denngay)
    {

        $getall = $this->connect->prepare("SELECT dichvu $query FROM (
        SELECT tenhh AS 'dichvu', 
        $select
        FROM banhang_line 
        WHERE mshs='$mshs' and msdv='$msdv' and msdv_lieutrinh <>'' and nhom_hh NOT IN ('LT', 'VC')
        AND ngay BETWEEN '$tungay' AND '$denngay'	
        GROUP BY mshh $order
        ) a
GROUP BY dichvu order by dichvu
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function baocao_hanghoa_dichvu_chuadoanthu($mshs, $msdv,  $tungay, $denngay)
    {

        $getall = $this->connect->prepare("SELECT * FROM
        (
        SELECT msdichvu, tendichvu, msdv  FROM hosodichvu
        WHERE mshs = '$mshs' AND if('$msdv' = '', 1 = 1, msdv = '$msdv')
        AND trangthai=0
        UNION ALL 
        SELECT mshh as msdichvu, tenhh as tendichvu, msdv  FROM hosohanghoa 
        WHERE mshs = '$mshs' AND if('$msdv' = '', 1 = 1, msdv = '$msdv')
        AND trangthai=0
        ) a
        WHERE a.msdichvu NOT IN
        (SELECT mshh FROM banhang_line
        WHERE mshs = '$mshs'
        AND if('$msdv' = '', 1 = 1, msdv = '$msdv')
        AND ngay BETWEEN '$tungay' AND '$denngay'
        )
        ORDER BY tendichvu
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function baocao_khachhang_hanghoa($mshs, $msdv, $loai, $tungay, $denngay)
    {

        $getall = $this->connect->prepare("CALL `BC_TopKHHH`('$mshs', '$msdv', '$tungay', '$denngay', '$loai')
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function baocao_congno($mshs, $msdv, $loaicongno, $tungay, $denngay)
    {

        $getall = $this->connect->prepare("CALL `BC_CongNo`('$mshs', '$msdv', '$tungay', '$denngay', '$loaicongno')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_nhanvien($mshs, $msdv)
    {
        $getall = $this->connect->prepare("SELECT sodienthoai, tennv FROM hosonhanvien where mshs='$mshs' and msdv='$msdv'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_khachhang($mshs, $msdv)
    {
        $getall = $this->connect->prepare("SELECT sodienthoai, tenkh FROM hosokhachhang where mshs='$mshs' and msdv='$msdv'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function ktra_phanquyen($mshs, $msdv, $msdn, $manghiepvu)
    {
        $getall = $this->connect->prepare("SELECT COUNT(rowid)phanquyen FROM hosophanquyen WHERE mshs='$mshs' AND msdv='$msdv' AND msdn='$msdn' and manghiepvu='$manghiepvu'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function list_namhoatdong($mshs, $msdv)
    {
        $query = '';
        if ($msdv != '') {
            $query = " and msdv='$msdv'";
        }
        $getall = $this->connect->prepare("SELECT YEAR(ngay)nam from banhang_header where mshs='$mshs' $query GROUP BY YEAR(ngay) order by YEAR(ngay)");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function add_ctkm($mshs, $msdv, $msdn, $msctkm, $tenctkm, $ptgiam, $handung_tungay, $handung_denngay, $tungay, $denngay)
    {

        $getall = $this->connect->prepare("INSERT ctkm (lastmodify,mshs, msdv, msdn, msctkm, tenctkm,mshh,tenhh,tungay, denngay, ptgiam) 
        SELECT * FROM
        (
        SELECT now(),'$mshs', '$msdv','$msdn','$msctkm', '$tenctkm', msdichvu, tendichvu ,'$handung_tungay', '$handung_denngay', '$ptgiam' FROM hosodichvu
        WHERE mshs = '$mshs' AND if('$msdv' = '', 1 = 1, msdv = '$msdv')
        AND trangthai=0
        UNION ALL 
        SELECT now(),'$mshs', '$msdv','$msdn','$msctkm', '$tenctkm', mshh as msdichvu, tenhh as tendichvu ,'$handung_tungay', '$handung_denngay', '$ptgiam' FROM hosohanghoa 
        WHERE mshs = '$mshs' AND if('$msdv' = '', 1 = 1, msdv = '$msdv')
        AND trangthai=0
        ) a
        WHERE a.msdichvu NOT IN
        (SELECT mshh FROM banhang_line
        WHERE mshs = '$mshs'
        AND if('$msdv' = '', 1 = 1, msdv = '$msdv')
        AND ngay BETWEEN '$tungay' AND '$denngay'
        )
        ORDER BY tendichvu");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
}

class baocao_control extends database
{
    public function load_chinhanh($mshs)
    {
        $getall = $this->connect->prepare("SELECT msdv, tendv FROM hosodonvi WHERE mshs='$mshs'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
}
