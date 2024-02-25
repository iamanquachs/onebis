<?php
class banhang extends database_sv
{

    public function add_banhang_header($loaiphieu, $msdn, $mshs, $msdv, $soct, $socttc, $mskh, $tenkh, $sodienthoai, $tongcong, $trangthai, $dathen)
    {
        $getall = $this->connect->prepare("INSERT INTO banhang_header(lastmodify,loai_phieu, dathen, ngay, msdn, mshs, msdv, soct, socttc, sohd, mskh, tenkh, sodienthoai, tongcong, trangthai,ngaykb) VALUES(NOW(),'$loaiphieu', '$dathen', CURDATE(), '$msdn', '$mshs','$msdv','$soct', '$socttc','','$mskh', '$tenkh','$sodienthoai', '$tongcong', '$trangthai',CURDATE())");
        $getall->execute();
    }
    public function load_banhang_header_homnay($msdv, $loai_dathen, $search_key, $soct)
    {
        $query = '';
        $trangthai = '1';
        if ($search_key != '') {
            $query .= "and ( a.tenkh like '%$search_key%' or a.sodienthoai like '%$search_key%')";
        }
        if ($loai_dathen == 1) {
            $query .= "and a.dathen = '$loai_dathen' ";
            $trangthai = 0;
        } else {
            $query .= "and a.dathen <> '1' ";
        }
        if ($soct != '') {
            $query .= "and a.soct='$soct'";
        }
        $getall = $this->connect->prepare("SELECT a.soct, a.mskh, a.msdn, DATE_FORMAT(a.lastmodify, '%d/%m/%y %H:%i')thoigian,a.sodienthoai as sdt, a.tenkh, CONCAT(SUBSTRING(a.sodienthoai,1,4),'.',SUBSTRING(a.sodienthoai,5,3),'.',SUBSTRING(a.sodienthoai,8,3))sodienthoai, a.tongcong,
        a.dathanhtoan, a.tongcong - a.dathanhtoan AS conno, a.qr_code, a.tuvan
        FROM banhang_header a
        WHERE a.loai_phieu = 0 and ngay = CURDATE() and a.trangthai = '$trangthai' AND msdv = '$msdv'  $query ORDER BY a.rowid desc");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_thongtin_khachhang($mshs, $msdv, $sdt)
    {
        $getall = $this->connect->prepare("SELECT date_format(ngaysinh, '%d/%m/%Y')ngaysinh, diachi
        FROM hosokhachhang
        WHERE mshs = '$mshs' and msdv = '$msdv' and sodienthoai='$sdt'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    // Chỗ này load đặt hẹn và tư vấn
    public function load_loai_dathen($msdv, $soct)
    {
        $getall = $this->connect->prepare("SELECT dathen, tuvan
        FROM banhang_header 
        WHERE msdv = '$msdv' and soct='$soct'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    // Chỗ này load đặt hẹn và tư vấn
    public function load_nhanvien_in_banhang($msdv)
    {
        $getall = $this->connect->prepare("CALL `Show_NhanVien`('$msdv')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    // Chỗ này load nhân viên đã yêu cầu theo rowid
    public function load_nhanvien_yeucau($mshs, $msdv, $rowid)
    {
        $getall = $this->connect->prepare("SELECT rowid,ms_nguoithuchien
        FROM banhang_line 
        WHERE mshs = '$mshs' and msdv = '$msdv' and rowid='$rowid'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_soluong_trangthai($msdv, $mshs)
    {
        $getall = $this->connect->prepare("SELECT ifnull(SUM(a.ChuaDen),0)ChuaDen, ifnull(SUM(a.ChoThucHien),0)ChoThucHien, ifnull(SUM(a.DangThucHien),0)DangThucHien, ifnull(SUM(a.DaThucHien),0)DaThucHien, 0 NVTL
        FROM
        (SELECT  
          CASE WHEN a.thuchien = 0 THEN 1 ELSE 0 END ChuaDen,
          CASE WHEN a.thuchien = 1 THEN 1 ELSE 0 END ChoThucHien,
          CASE WHEN a.thuchien = 2 THEN 1 ELSE 0 END DangThucHien,
          CASE WHEN a.thuchien = 3 THEN 1 ELSE 0 END DaThucHien
        FROM banhang_line a 
        WHERE a.msdv='$msdv' and a.mshs='$mshs' AND a.nhom_hh NOT IN ('LT', 'DVLT', 'DT')
             AND CURDATE()=DATE(a.ngayhen) GROUP BY a.sodienthoai, a.thuchien)a");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function load_banhang_header_henkhach($msdv, $search_key)
    {
        $getall = $this->connect->prepare("CALL `Show_HenKhach`('$msdv', '$search_key')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function load_banhang_header_henkhach_nhakhoa($msdv, $search_key)
    {
        $getall = $this->connect->prepare("CALL `Show_HenKhach_NhaKhoa`('$msdv', '$search_key')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function load_lichsu_khachang_theo_rowid($msdv, $rowid)
    {
        $getall = $this->connect->prepare("CALL `Show_LichSuTheoRowID`('$msdv', '$rowid')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function get_tour_tudong($msdv)
    {
        $getall = $this->connect->prepare("CALL `Show_DieuTour`('$msdv')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    // update yêu cầu người thực hiện
    public function add_nguoithuchien($mshs, $msdv, $rowid, $msnv)
    {
        $getall = $this->connect->prepare("UPDATE banhang_line set lastmodify=now(), ms_nguoithuchien='$msnv', tour_yeucau='1' where mshs='$mshs' and msdv='$msdv' and rowid='$rowid'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function update_banhangline_ngaythuchien($msdv, $soct, $msnv)
    {
        $getall = $this->connect->prepare("UPDATE banhang_line SET lastmodify=NOW(), ngay = CURDATE(), thuchien = 1 WHERE soct='$soct' AND thuchien = 0 AND nhom_hh NOT IN ('DVLT') AND msdv='$msdv' and CURDATE() = date(ngayhen);
        UPDATE banhang_line SET ms_nguoithuchien='$msnv' WHERE soct='$soct'  AND nhom_hh NOT IN ('DVLT') AND msdv='$msdv' and CURDATE() = date(ngayhen) and tour_yeucau = '0' and ms_nguoithuchien = '';
         UPDATE banhang_header set lastmodify=NOW(),trangthai=1, dathen=2 where soct='$soct' AND msdv='$msdv' and dathen=1;
         ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function update_hoantat_lieutrinh($mshs, $msdv, $soct, $rowid, $mslieutrinh)
    {
        $getall = $this->connect->prepare("UPDATE banhang_line SET lastmodify=NOW(), thuchien = 3 WHERE soct='$soct' and mshs='$mshs' AND msdv='$msdv' and rowid='$rowid'; 
         ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function ktr_hoantat_lieutrinh($mshs, $msdv, $soct, $rowid, $mslieutrinh)
    {
        $getall = $this->connect->prepare("SELECT count(rowid)lieutrinh from banhang_line where mshs='$mshs' and msdv='$msdv' and soct='$soct' and mslieutrinh = '$mslieutrinh'  and thuchien < 3 
         ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function xuatkho_trukho($msdv, $soct)
    {
        $getall = $this->connect->prepare("CALL `ThemXuatKho_TruKho`('$soct','$msdv');
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function update_banhangline_hoanthanh_dichvu($mshs, $msdv, $soct, $rowid, $mslieutrinh, $thuchien, $msmota)
    {
        $getall = $this->connect->prepare("UPDATE banhang_line SET thuchien = '$thuchien' WHERE mshh='$mslieutrinh' and soct='$soct' and mshs='$mshs' and msdv='$msdv' ;
        UPDATE banhang_line SET lastmodify=NOW(), thuchien = 3 
            WHERE soct='$soct' AND DATE(ngayhen) = CURDATE() AND nhom_hh in ('HH','TH') and mshs='$mshs' AND msdv='$msdv' ;
        UPDATE nhatky_thuchien set time_hoanthanh = NOW() where mshs='$mshs' AND msdv='$msdv' and rowidtc='$rowid' and soct='$soct';
        CALL `ThemXuatKho_TruKho`('$soct','$msdv');
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function update_banhangheader($ngay, $mshs, $msdv, $soct,  $mskh, $tenkh, $dienthoai, $tongcong, $sotien, $soct_thuchi, $trangthai, $qr_code, $ms_nguoithan)
    {

        $getall = $this->connect->prepare("UPDATE banhang_header set  lastmodify='$ngay',ngay='$ngay', mskh='$mskh', tenkh='$tenkh',sodienthoai='$dienthoai',tongcong='$tongcong',dathanhtoan= dathanhtoan + '$sotien',socttc='$soct_thuchi', trangthai = '$trangthai', qr_code='$qr_code', ms_nguoithan=if('$ms_nguoithan' = '',ms_nguoithan,'$ms_nguoithan') where mshs='$mshs' and msdv='$msdv' and soct='$soct'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function update_trangthai_banhang_header($mshs, $msdv, $msdn, $soct, $trangthai)
    {
        $getall = $this->connect->prepare("UPDATE banhang_header set lastmodify=now(), trangthai='$trangthai', msdn='$msdn' where mshs='$mshs' and msdv='$msdv' and soct='$soct' ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function update_ngay_banhangline($mshs, $msdv, $soct, $ngay)
    {
        $getall = $this->connect->prepare("UPDATE banhang_line set ngay='$ngay' where mshs='$mshs' and msdv='$msdv' and soct='$soct' ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function update_banhangline_dathu($mshs, $msdv, $soct, $sodienthoai, $dathu)
    {
        $getall = $this->connect->prepare("UPDATE banhang_line set lastmodify=NOW(),sodienthoai='$sodienthoai',dathu='$dathu', tam=0 where mshs='$mshs' and msdv='$msdv' and soct='$soct' and dathu=0");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function update_banhangline_giamgia($mshs, $msdv, $msdn, $soct, $idchidinh, $ptgiam)
    {
        $getall = $this->connect->prepare("UPDATE banhang_line set lastmodify=NOW(),msctkm='NVG|$msdn',ptgiam='$ptgiam' where mshs='$mshs' and msdv='$msdv' and soct='$soct' and idchidinh='$idchidinh'; UPDATE banhang_line set giathu = round(giaban-(giaban * ptgiam /100)) where mshs='$mshs' and msdv='$msdv' and soct='$soct' and idchidinh='$idchidinh' and nhom_hh <>'VC'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function delete_banhangline_xoatam($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("DELETE FROM banhang_line where mshs='$mshs' and msdv='$msdv' and soct='$soct' and tam=1");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function delete_banhangheader($msdv, $msdn, $soct, $idchidinh)
    {
        $getall = $this->connect->prepare("CALL `CheckDelete_BanHang`('$msdv', '$msdn', '$soct','$idchidinh')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }


    public function load_hanghoa_dichvu($mshs, $msdv, $phanloai, $loai, $search, $sodienthoai)
    {
        if ($phanloai == 'lieutrinh') {
            $query = "CALL `ShowItems`('$mshs', '$msdv', '$sodienthoai', 'DV',1,'$loai', '$search')";
        }
        if ($phanloai == 'dichvu') {
            $query = "CALL `ShowItems`('$mshs', '$msdv', '$sodienthoai', 'DV',0 ,'$loai', '$search')";
        }
        if ($phanloai == 'hanghoa') {
            $query = "CALL `ShowItems`('$mshs', '$msdv', '$sodienthoai', 'HH',0,'$loai', '$search')";
        }
        $getall = $this->connect->prepare($query);
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function load_lieutrinh($mshs, $msdv, $msdichvu)
    {
        $getall = $this->connect->prepare("SELECT mslieutrinh, tenlieutrinh from hosolieutrinh where mshs='$mshs' and msdv='$msdv' and msdichvu='$msdichvu' order by thutu");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function load_banhang_line($msdv, $soct, $vitri)
    {
        $query = '';
        if ($vitri == 'nhatky') {
            $query = "and nhom_hh not in ('RA','DT')";
        }
        if ($vitri != 'nhatky' && $vitri != '') {
            $query = "and ms_rang='$vitri' and nhom_hh <>'RA' ";
        }
        $getall = $this->connect->prepare("SELECT rowid,sodienthoai,mshh,tenhh, soct, idchidinh, loai_hh, nhom_hh,giaban,soluong,sum(giaban)giagoc, sum(round(giathu* soluong,0)) as thanhtien, dathu, max(ptgiam)ptgiam, ms_rang, date_format(ngayhen,'%d/%m/%Y %H:%i')ngayhen from banhang_line where soct='$soct' and msdv='$msdv'  and nhom_hh<>'VC' $query GROUP BY idchidinh  order by rowid desc ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function load_chitiet_hanghoa($msdv, $soct, $idchidinh, $mslieutrinh)
    {
        $getall = $this->connect->prepare("SELECT mshh,tenhh, soct, idchidinh, loai_hh,soluong, (giathu) as thanhtien ,DATE_FORMAT(ngayhen,'%d/%m/%Y %H:%i')ngayhendaformat, DATE_FORMAT(ngayhen,'%Y-%m-%d %H:%i') as ngayhenchuaformat ,dathu from banhang_line where soct='$soct' and msdv='$msdv' and idchidinh='$idchidinh' and mslieutrinh='$mslieutrinh'  order by rowid ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function edit_chitiet_lieutrinh($msdv, $soct, $idchidinh, $mshh, $tenhh, $ngayhen, $giohen)
    {
        $ngay = $ngayhen . ' ' . $giohen;
        $getall = $this->connect->prepare("UPDATE banhang_line set tenhh='$tenhh', ngayhen='$ngay' where msdv ='$msdv' and soct='$soct' and idchidinh='$idchidinh' and mshh='$mshh' ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function delete_chitiet_lieutrinh($msdv, $soct, $idchidinh, $mshh)
    {

        $getall = $this->connect->prepare("DELETE FROM banhang_line where msdv='$msdv' and soct='$soct' and idchidinh='$idchidinh' and mshh='$mshh'; DELETE FROM banhang_line where msdv='$msdv' and soct='$soct' and idchidinh='$idchidinh' and mslieutrinh='$mshh'; ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }


    public function add_banhang_line($mshs, $msdv, $msdn, $dienthoai, $soct, $idchidinh, $nhom_hh, $colieutrinh, $nhom_kh, $msctkm, $ptgiam, $mshh, $msnguoithan)
    {
        $getall = $this->connect->prepare("CALL `Post_BanHang_Line`('$mshs', '$msdv', '$msdn', '$dienthoai', '$msnguoithan', '$soct', '$idchidinh', '$nhom_hh', '$colieutrinh', '$nhom_kh', '$msctkm', '$ptgiam', '$mshh')");
        $getall->execute();
        return $getall->fetchAll();
    }
    public function add_banhang_line_mshh($pttichluy, $msdn, $mshs, $msdv, $soct, $idchidinh, $mshh, $tenhh, $mslieutrinh, $tenlieutrinh, $nhom_kh, $nhom_hh, $loai_hh, $dvt, $soluong, $gianhap, $giaban, $msctkm, $ptgiam, $giathu, $thuesuat, $giathuvat, $ms_nguoithuchien, $thuchien, $songay_bh, $tam, $sodienthoai)
    {
        $getall = $this->connect->prepare("INSERT INTO banhang_line(lastmodify,tam, sodienthoai, pttichluy, msdn, mshs, msdv, ngay, ngayhen, soct, idchidinh, mshh, tenhh, mslieutrinh, tenlieutrinh, nhom_kh, nhom_hh, loai_hh, dvt, soluong, gianhap, giaban, msctkm, ptgiam, giathu, thuesuat, giathuvat, ms_nguoithuchien, thuchien, songay_bh, dathu) VALUES(NOW(),'$tam','$sodienthoai', '$pttichluy', '$msdn', '$mshs', '$msdv', CURDATE(), NOW(), '$soct', '$idchidinh', '$mshh', '$tenhh', '$mslieutrinh', '$tenlieutrinh', '$nhom_kh', '$nhom_hh', '$loai_hh', '$dvt', '$soluong', '$gianhap', '$giaban', '$msctkm', '$ptgiam', '$giathu', '$thuesuat', '$giathuvat', '$ms_nguoithuchien', '$thuchien', '$songay_bh', '0')");
        $getall->execute();
        return $getall->fetchAll();
    }
    public function ktra_soluong_soct_banhang_line($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("SELECT COUNT(rowid)soluong FROM banhang_line where mshs='$mshs' AND msdv = '$msdv'
        AND soct='$soct' LIMIT 1");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }


    public function delete_banhang_line($msdv, $soct, $idchidinh)
    {
        $getall = $this->connect->prepare("DELETE from banhang_line where soct='$soct' and idchidinh='$idchidinh' and msdv='$msdv'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function delete_nhatky_thuchien($msdv, $soct, $rowid)
    {
        $getall = $this->connect->prepare("DELETE from nhatky_thuchien where soct='$soct' and rowidtc='$rowid' and msdv='$msdv'");
        $getall->execute();
    }



    public function load_kehoachdieutri($msdv, $soct)
    {
        $getall = $this->connect->prepare("SELECT b.mslieutrinh, a.tenhh dichvu, DATE_FORMAT(b.ngayhen,'%d/%m/%Y %H:%i')ngayhen, b.tenlieutrinh FROM 
        (
              SELECT mshh, tenhh, soct, msdv FROM banhang_line 
            WHERE soct='$soct' AND loai_hh='DVLT' AND msdv='$msdv' 
        ) a 
        INNER JOIN 
        banhang_line b ON a.soct = b.soct AND a.mshh = b.msdv_lieutrinh AND  b.loai_hh='LT' AND  b.msdv='$msdv' AND a.soct = '$soct' ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    //Insert hosokhachhang khi khách hàng không có trong danh sách
    public function add_khachhang($msdn, $msdv, $mshs, $mskh, $tenkh, $sodienthoai, $ngaysinh, $diachi, $gioitinh, $nghenghiep)
    {
        $getall = $this->connect->prepare("INSERT INTO hosokhachhang(lastmodify, ngaytao, msdn, mshs, msdv, mskh, tenkh, sodienthoai,gioitinh, diachi, ngaysinh, nhom_kh, nghenghiep) 
        VALUES(NOW(), CURDATE(), '$msdn', '$mshs', '$msdv','$mskh', '$tenkh', '$sodienthoai', '$gioitinh', '$diachi', '$ngaysinh', '', '$nghenghiep') ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function update_dotuoi_banhang_line($msdv, $mshs, $sodienthoai, $ngaysinh)
    {
        $getall = $this->connect->prepare("UPDATE  banhang_line SET dotuoi = YEAR(CURDATE())-YEAR('$ngaysinh') where mshs='$mshs' and msdv='$msdv' and sodienthoai='$sodienthoai'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function update_ngaysinh_diachi($msdn, $mshs, $msdv, $sodienthoai, $diachi, $ngaysinh)
    {
        $getall = $this->connect->prepare("UPDATE hosokhachhang set lastmodify = now(),diachi='$diachi',ngaysinh='$ngaysinh', msdn='$msdn' WHERE sodienthoai='$sodienthoai' and msdv='$msdv' and mshs='$mshs'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function find_khachhang($mshs, $value)
    {
        $getall = $this->connect->prepare("SELECT a.mskh, a.tenkh, a.sodienthoai, ifnull(b.tennhom,'')tennhom, ifnull(a.nhom_kh, '')nhom_kh, 
        ifnull(b.phantramgiam,0)ptgiam , a.gioitinh, a.diachi, DATE_FORMAT(a.ngaysinh , '%d/%m/%Y') as ngaysinh,
        ''ms_nguoithan, ''ten_nguoithan, a.nghenghiep
                from hosokhachhang a left JOIN nhom_khachhang b ON a.mshs=b.mshs AND a.nhom_kh=b.msnhom
                WHERE a.mshs='$mshs' AND a.sodienthoai LIKE '%$value%'
        UNION ALL
        SELECT a.mskh, a.tenkh, a.sodienthoai, ifnull(b.tennhom,'')tennhom, ifnull(a.nhom_kh, '')nhom_kh,
        ifnull(b.phantramgiam,0)ptgiam , c.gioitinh, a.diachi, DATE_FORMAT(c.ngaysinh , '%d/%m/%Y') as ngaysinh, 
        ifnull(c.ms_nguoithan,'')ms_nguoithan, ifnull(c.ten_nguoithan,'')ten_nguoithan,a.nghenghiep
                from hosokhachhang a 
                  left JOIN nhom_khachhang b ON a.mshs=b.mshs AND a.nhom_kh=b.msnhom
                    INNER JOIN 
                        hosonguoithan  c  
                    ON a.sodienthoai = c.sodienthoai AND a.mshs=c.mshs
        WHERE a.mshs='$mshs' AND a.sodienthoai LIKE '%$value%'
        order by sodienthoai");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function get_conno_khachhang($mshs, $dienthoai)
    {
        $getall = $this->connect->prepare("CALL `UpdateNhomKH`('$mshs', '$dienthoai')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_thanhtien($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("SELECT ifnull(sum(round(giathu * soluong,0)), 0) as tongtien from banhang_line where mshs='$mshs' and msdv='$msdv' and soct='$soct' and nhom_hh<>'VC'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_sotien_voucher($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("SELECT mshh,tenhh, ABS(giathu)giathu from banhang_line where mshs='$mshs' and msdv='$msdv' and soct='$soct' and nhom_hh='VC'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function update_voucher($mshs, $msdv, $msvoucher, $sodienthoai)
    {
        $getall = $this->connect->prepare("UPDATE hosovoucher set lastmodify=NOW(), trangthai='1' where mshs='$mshs' and msdv='$msdv' and msvoucher='$msvoucher' and sodienthoai='$sodienthoai'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_voucher($mshs, $msdv, $sodienthoai)
    {
        $getall = $this->connect->prepare("SELECT msvoucher, tenvoucher, sotien, DATE_FORMAT(handung, '%d/%m/%Y') AS handung from hosovoucher where CURDATE() < handung and trangthai ='0' and mshs='$mshs' and msdv='$msdv' and sodienthoai='$sodienthoai'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_banhang_khachhang($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("SELECT date_format(lastmodify,'%d/%m/%Y')ngayhen,date_format(lastmodify,'%H:%i')giohen,sodienthoai, date_format(ngay,'%d/%m/%Y')ngay, dathanhtoan,  tongcong from banhang_header where mshs='$mshs' and msdv='$msdv'and soct='$soct'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function load_tennhom_dichvu($mshs, $msdv, $lieutrinh)
    {

        $getall = $this->connect->prepare("SELECT a.msloai, a.tenloai FROM  hosodichvu b 
        left JOIN dmphanloai a  ON a.msloai=b.nhom_dichvu 
        WHERE a.mshs='$mshs' AND a.msdv='$msdv' and phanloai='dichvu' 
        AND b.lieutrinh='$lieutrinh' AND a.admin ='0'  GROUP BY b.nhom_dichvu ORDER BY tenloai
       
       ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function load_tennhom_hanghoa($mshs, $msdv, $lieutrinh)
    {
        $getall = $this->connect->prepare("SELECT a.msloai, a.tenloai FROM  hosohanghoa b
         left JOIN dmphanloai a  ON a.msloai=b.loai_hh 
        WHERE a.mshs='$mshs' AND a.msdv='$msdv' and phanloai='loai_hh' 
         AND a.admin ='0'  GROUP BY b.loai_hh ORDER BY tenloai
       
       ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function update_tuvan($mshs, $msdv, $soct, $tuvan)
    {
        $getall = $this->connect->prepare("UPDATE banhang_header set lastmodify=NOW(), tuvan='$tuvan' where mshs='$mshs' and msdv='$msdv' and soct='$soct'
       ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function update_chisosinhhieu($mshs, $msdv, $soct, $mach, $nhietdo, $huyetap, $nhiptho, $chieucao, $cannang)
    {
        $getall = $this->connect->prepare("UPDATE banhang_line set lastmodify=NOW(), mach='$mach', nhietdo='$nhietdo', huyetap='$huyetap', nhiptho='$nhiptho', chieucao='$chieucao', cannang='$cannang' where mshs='$mshs' and msdv='$msdv' and soct='$soct' and CURDATE()=date(ngayhen)
       ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function add_donthuoc($sodienthoai, $pttichluy, $msdn, $mshs, $msdv,  $soct, $idchidinh, $mshh, $tenhh, $mslieutrinh, $tenlieutrinh, $nhom_kh, $nhom_hh, $loai_hh, $dvt, $soluong, $gianhap, $giaban, $msctkm, $ptgiam, $giathu, $thuesuat, $giathuvat, $ms_nguoithuchien, $thuchien,  $ptthuchien, $songay_bh, $dathu, $idtuvan, $ms_rang)
    {
        $getall = $this->connect->prepare("INSERT INTO banhang_line(lastmodify, tam, sodienthoai, pttichluy, msdn, mshs, msdv, ngay, lanthuchien, ngayhen, soct, idchidinh, mshh, tenhh, mslieutrinh, tenlieutrinh, nhom_kh, nhom_hh, loai_hh, dvt, soluong, gianhap, giaban, msctkm, ptgiam, giathu, thuesuat, giathuvat, ms_nguoithuchien, thuchien, ptthuchien, songay_bh,
         dathu, idtuvan, ms_rang) VALUES (NOW(), '1', '$sodienthoai', '$pttichluy', '$msdn', '$mshs', '$msdv', CURDATE(), '1', NOW(), '$soct', '$idchidinh', '$mshh', '$tenhh', '$mslieutrinh', '$tenlieutrinh', '$nhom_kh', '$nhom_hh', '$loai_hh', '$dvt', '$soluong', '$gianhap', '$giaban', '$msctkm', '$ptgiam', '$giathu', '$thuesuat', '$giathuvat', '$ms_nguoithuchien', '$thuchien', '$ptthuchien', '$songay_bh',
         '$dathu', '$idtuvan', '$ms_rang')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_donthuoc($mshs, $msdv, $soct, $sodienthoai)
    {
        $getall = $this->connect->prepare("SELECT rowid,idchidinh, mshh,tenhh,dvt, soluong, giathu,(giathu * soluong)AS thanhtien, idtuvan FROM banhang_line WHERE sodienthoai ='$sodienthoai' and mshs='$mshs' and msdv='$msdv' and soct='$soct' AND nhom_hh='DT'
       ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function huy_donthuoc_dichvu($mshs, $msdv, $soct, $loai)
    {
        $query = '';
        if ($loai == 'DT') {
            $query = "and nhom_hh='DT'";
        }
        $getall = $this->connect->prepare("DELETE FROM banhang_line where mshs='$mshs' and msdv='$msdv' and soct='$soct' and tam=1 $query");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function edit_donthuoc($mshs, $msdv, $soct, $idchidinh, $soluong, $cachdung)
    {
        $getall = $this->connect->prepare("UPDATE banhang_line set lastmodify=NOW(),soluong='$soluong', idtuvan='$cachdung' where mshs='$mshs' and msdv='$msdv' and soct='$soct' and idchidinh ='$idchidinh' and nhom_hh='DT'");
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
        $getall = $this->connect->prepare("UPDATE banhang_line set lastmodify=NOW(),tam=0, thuchien=1, ms_nguoithuchien='$msdn' where mshs='$mshs' and msdv='$msdv' and soct='$soct' and tam=1 $nhom_ins;
        CALL `Update_TrangThai_BanHangH`('$msdv', '$msdn', '$soct')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function capnhat_trangthai_banhang_header($msdv, $msdn, $soct)
    {
        $getall = $this->connect->prepare(" CALL `Update_TrangThai_BanHangH`('$msdv', '$msdn', '$soct')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function update_banhangheader_donthuoc($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("CALL `Update_TCBH_Header_Line`('$msdv','$soct')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function post_danhgia($mshs, $msdv, $soct, $sdt, $nhanvien, $dichvu, $danhgia)
    {
        $getall = $this->connect->prepare("CALL `Post_DanhGia`('$mshs', '$msdv', '$soct','$sdt','$nhanvien','$dichvu','$danhgia')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_print_donhang($msdv, $soct)
    {
        $getall = $this->connect->prepare("SELECT tenhh, soluong, sum(soluong * giathu)thanhtien , sum(soluong * giaban)tongcong, sum(soluong * (giaban - giathu))giamgia, nhom_hh
        from banhang_line where soct='$soct' 
        and msdv='$msdv'   GROUP BY idchidinh   
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_print_tongcong($msdv, $soct)
    {
        $getall = $this->connect->prepare("SELECT date_format(lastmodify, '%d/%m/%Y %H:%i')ngayin, tenkh, tongcong AS thanhtoan, dathanhtoan 
        from banhang_header  
        where soct='$soct' and msdv='$msdv' 
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_danhgia($mshs, $msdv, $sdt, $mshh)
    {
        $query = '';
        if ($mshh != '') {
            $query = "mshh IN ('2KHL', '1RKHL') AND";
        }
        $getall = $this->connect->prepare("SELECT date_format(lastmodify,'%d/%m/%Y %H:%i')ngaygio, noidung as dichvu, tennv as nhanvien, mshh as danhgia FROM nhatky_tuvan WHERE $query  sodienthoai='$sdt' and mshs='$mshs' and msdv='$msdv' AND loai='DG' order by mshh
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_qr_code_banhang($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("SELECT qr_code 
        from banhang_header  
        where soct='$soct' and msdv='$msdv' and mshs='$mshs' 
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function ktra_khamrang($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("SELECT count(rowid)solan 
        from banhang_line  
        where soct='$soct' and msdv='$msdv' and mshs='$mshs' and idchidinh='AUTOPOST' 
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_dichvu_chuathuchien($mshs, $msdv, $sodienthoai)
    {
        $getall = $this->connect->prepare("SELECT rowid, mshh, tenhh, thuchien FROM banhang_line WHERE mshs='$mshs' and msdv='$msdv' and sodienthoai='$sodienthoai' AND thuchien <3 ORDER BY rowid DESC
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_lichsu_khachhang($mshs, $msdv, $sodienthoai)
    {
        $getall = $this->connect->prepare("CALL `Show_NhatKyTuVan`('$msdv', '$sodienthoai')
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function update_ngayhen_dichvu_chuathuchien($mshs, $msdv, $rowid)
    {
        $getall = $this->connect->prepare("UPDATE banhang_line set lastmodify=NOW(),ngay=NOW(), ngayhen=NOW() WHERE mshs='$mshs' and msdv='$msdv' and rowid='$rowid'
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function add_yeucau($mshs, $msdv, $rowidtc, $soct, $sodienthoai, $msnv, $tennv, $mshh, $noidung, $loai)
    {

        $getall = $this->connect->prepare("INSERT INTO nhatky_tuvan(rowidtc, lastmodify, mshs, msdv, soct, sodienthoai, msnv, tennv, mshh, noidung, loai) VALUE('$rowidtc', NOW(), '$mshs', '$msdv', '$soct', '$sodienthoai', '$msnv', '$tennv', '$mshh', '$noidung', '$loai')
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function delete_yeucau($mshs, $msdv, $soct, $sodienthoai,  $mshh)
    {

        $getall = $this->connect->prepare("DELETE from nhatky_tuvan where mshs='$mshs' and msdv='$msdv' and soct='$soct' and sodienthoai='$sodienthoai' and mshh='$mshh'
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function update_yeucau($mshs, $msdv, $soct, $sodienthoai,  $mshh, $noidung, $loai)
    {

        $getall = $this->connect->prepare("UPDATE nhatky_tuvan set mshh='$mshh', noidung='$noidung' where mshs='$mshs' and msdv='$msdv' and soct='$soct' and sodienthoai='$sodienthoai' and loai='$loai'
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function ktr_dichvu_co_cunglieutrinh($mshs, $msdv, $soct, $mslieutrinh)
    {

        $getall = $this->connect->prepare("SELECT rowid, tenhh FROM banhang_line WHERE mshs='$mshs' and msdv='$msdv' and soct='$soct' AND mslieutrinh='$mslieutrinh' and thuchien < 3
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
}
class banhang_control extends database
{
    public function load_print_donvi($mshs, $msdv)
    {
        $getall = $this->connect->prepare("SELECT tendv, concat(diachi,', ',tinh_huyen_xa)diachi,CONCAT(SUBSTRING(dienthoai,1,4),'.',SUBSTRING(dienthoai,5,3),'.',
        SUBSTRING(dienthoai,8,3))dienthoai  
        FROM hosodonvi WHERE mshs='$mshs' AND msdv ='$msdv'
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
}
