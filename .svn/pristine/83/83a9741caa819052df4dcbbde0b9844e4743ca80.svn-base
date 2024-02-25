<?php
class dathang extends database_sv
{
    public function add_dathang_header($msdn, $mshs, $msdv, $soct, $mskh, $tenkh, $sodienthoai, $tongcong, $trangthai)
    {
        $getall = $this->connect->prepare("INSERT INTO dathang_header(lastmodify, ngay, msdn, mshs, msdv, soct, sohd, mskh, tenkh, sodienthoai, tongcong, trangthai) VALUES(NOW(), CURDATE(), '$msdn', '$mshs','$msdv','$soct','','$mskh', '$tenkh','$sodienthoai', '$tongcong', '$trangthai')");
        $getall->execute();
    }
    public function add_dathang_line($mshs, $msdv, $msdn, $dienthoai, $soct, $idchidinh, $nhom_hh, $colieutrinh, $nhom_kh, $msctkm, $ptgiam, $mshh, $msnguoithan)
    {
        $getall = $this->connect->prepare("CALL `Post_DatHang_Line`('$mshs', '$msdv', '$msdn', '$dienthoai','$msnguoithan', '$soct', '$idchidinh', '$nhom_hh', '$colieutrinh', '$nhom_kh', '$msctkm', '$ptgiam', '$mshh')");
        $getall->execute();
        return $getall->fetchAll();
    }

    public function load_soluonggiohang($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("SELECT mshh,tenhh, soct, idchidinh, loai_hh,giaban,soluong, sum(soluong * giathu) as thanhtien, dathu, max(ptgiam)ptgiam, ms_rang, date_format(ngayhen,'%d/%m/%Y %H:%i')ngayhen from dathang_line where  soct='$soct' and msdv='$msdv'  and nhom_hh<>'VC' GROUP BY idchidinh  order by rowid desc ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_thanhtien($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("SELECT ifnull(sum(round(giathu * soluong,0)), 0) as tongtien from dathang_line where mshs='$mshs' and msdv='$msdv' and soct='$soct' and nhom_hh<>'VC'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function update_dathangheader($mshs, $msdv, $soct,  $mskh, $tenkh, $dienthoai, $tongcong, $sotien, $soct_thuchi, $trangthai, $qr_code, $msnguoithan)
    {
        $getall = $this->connect->prepare("UPDATE dathang_header set lastmodify=NOW(), mskh='$mskh', tenkh='$tenkh',sodienthoai='$dienthoai',tongcong='$tongcong',dathanhtoan= dathanhtoan + '$sotien',socttc='$soct_thuchi', trangthai = '$trangthai', qr_code='$qr_code', ms_nguoithan='$msnguoithan' where mshs='$mshs' and msdv='$msdv' and soct='$soct'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function delete_dathang_line($mshs, $msdv, $soct, $idchidinh)
    {
        $getall = $this->connect->prepare("DELETE from dathang_line where soct='$soct' and idchidinh='$idchidinh' and msdv='$msdv' and mshs='$mshs'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function add_dathang_line_mshh($pttichluy, $msdn, $mshs, $msdv, $soct, $idchidinh, $mshh, $tenhh, $mslieutrinh, $tenlieutrinh, $nhom_kh, $nhom_hh, $loai_hh, $dvt, $soluong, $gianhap, $giaban, $msctkm, $ptgiam, $giathu, $thuesuat, $giathuvat, $ms_nguoithuchien, $thuchien, $songay_bh, $tam, $sodienthoai)
    {
        $getall = $this->connect->prepare("INSERT INTO dathang_line(lastmodify,tam, sodienthoai, pttichluy, msdn, mshs, msdv, ngay, ngayhen, soct, idchidinh, mshh, tenhh, mslieutrinh, tenlieutrinh, nhom_kh, nhom_hh, loai_hh, dvt, soluong, gianhap, giaban, msctkm, ptgiam, giathu, thuesuat, giathuvat, ms_nguoithuchien, thuchien, songay_bh, dathu) VALUES(NOW(),'$tam','$sodienthoai', '$pttichluy', '$msdn', '$mshs', '$msdv', CURDATE(), NOW(), '$soct', '$idchidinh', '$mshh', '$tenhh', '$mslieutrinh', '$tenlieutrinh', '$nhom_kh', '$nhom_hh', '$loai_hh', '$dvt', '$soluong', '$gianhap', '$giaban', '$msctkm', '$ptgiam', '$giathu', '$thuesuat', '$giathuvat', '$ms_nguoithuchien', '$thuchien', '$songay_bh', '0')");
        $getall->execute();
        return $getall->fetchAll();
    }

    public function update_dathang_line_khachhang($mshs, $msdv, $soct, $sodienthoai, $nhom_kh, $ptgiam, $dathu)
    {
        $getall = $this->connect->prepare("UPDATE dathang_line set lastmodify=NOW(),sodienthoai='$sodienthoai',nhom_kh='$nhom_kh', ptgiam='$ptgiam', giathu = giaban-(giaban * $ptgiam)/100, giathuvat= giaban-(giaban * $ptgiam)/100, dathu='$dathu', tam=0
        where mshs='$mshs' and msdv='$msdv' and soct='$soct' and dathu=0 and nhom_hh<>'VC'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function post_banhang($mshs, $msdv, $soct, $ngaysinh)
    {
        $getall = $this->connect->prepare("INSERT INTO banhang_header(lastmodify, trangthai,loai_phieu, dathen, ngay, msdn, mshs, msdv, soct, socttc, sohd, mskh, tenkh, sodienthoai,ms_nguoithan, tongcong, dathanhtoan,qr_code) 
        SELECT lastmodify, trangthai,0, 0, ngay, msdn, mshs, msdv, soct, socttc, sohd, mskh, tenkh, sodienthoai,ms_nguoithan, tongcong, dathanhtoan,qr_code from dathang_header where mshs='$mshs' and msdv='$msdv' and soct='$soct';
        INSERT INTO banhang_line(lastmodify, tam, sodienthoai, pttichluy, msdn, mshs, msdv, ngay, lanthuchien, ngayhen, soct, idchidinh, mshh, tenhh, mslieutrinh, tenlieutrinh, msmota, nhom_kh, nhom_hh, loai_hh, dvt, soluong,soluong_xuat, gianhap, giaban, msctkm, ptgiam, giathu, thuesuat, giathuvat, ms_nguoithuchien, thuchien, ptthuchien, songay_bh,
         dathu, idtuvan, ms_rang, dotuoi, msdv_lieutrinh) 
         SELECT lastmodify, tam, sodienthoai, pttichluy, msdn, mshs, msdv, ngay, lanthuchien, ngayhen, soct, idchidinh, mshh, tenhh, mslieutrinh, tenlieutrinh, msmota, nhom_kh, nhom_hh, loai_hh, dvt, soluong, soluong_xuat, gianhap, giaban, msctkm, ptgiam, giathu, thuesuat, giathuvat, ms_nguoithuchien, thuchien, ptthuchien, songay_bh,
         dathu, idtuvan, ms_rang, YEAR(CURDATE())-YEAR('$ngaysinh'), msdv_lieutrinh from dathang_line where mshs='$mshs' and msdv='$msdv' and soct='$soct' order by rowid;
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_qr_code_dathang($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("SELECT qr_code 
        from dathang_header  
        where soct='$soct' and msdv='$msdv' and mshs='$mshs' 
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_print_donhang($msdv, $soct)
    {
        $getall = $this->connect->prepare("SELECT tenhh, soluong, sum(soluong * giathu)thanhtien , sum(soluong * giaban)tongcong, sum(soluong * (giaban - giathu))giamgia
        from dathang_line where soct='$soct' 
        and msdv='$msdv'  and nhom_hh<>'VC'  GROUP BY idchidinh   
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_print_tongcong($msdv, $soct)
    {
        $getall = $this->connect->prepare("SELECT date_format(lastmodify, '%d/%m/%Y %H:%i')ngayin, tenkh, tongcong AS thanhtoan, dathanhtoan 
        from dathang_header  
        where soct='$soct' and msdv='$msdv'
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function delete_dathang_xoatam($mshs, $msdv)
    {
        $getall = $this->connect->prepare("DELETE FROM dathang_line where mshs='$mshs' and msdv='$msdv' and tam=1 and date_format(lastmodify,'%Y-%m-%d') < CURDATE(); 
        DELETE FROM dathang_header where mshs='$mshs' and msdv='$msdv' and trangthai=0 and ngay < CURDATE()");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
}
