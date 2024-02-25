<?php

class thuchi extends database_sv
{
    public function load_thuchi($mshs, $msdv, $valueSearch, $tungay, $denngay, $locloai, $khoanmuc)
    {
        $filter = '';
        if ($valueSearch != '') {
            $filter = $filter . "and (a.noidung like '%$valueSearch%' or a.tenkh like '%$valueSearch%') group by soct";
        }
        if ($locloai != '') {
            $filter = $filter . "and a.loaichungtu ='$locloai'";
        }
        if ($khoanmuc != '' && $khoanmuc != null) {
            $filter = $filter . "and a.makhoanmuc ='$khoanmuc'";
        }
        $getall = $this->connect->prepare("SELECT  DATE_FORMAT(a.lastmodify, '%d/%m/%Y %H:%i')lastmodify, a.msdv, a.msdn,a.soct, a.socttc, 
        a.sohd,DATE_FORMAT(a.ngay, '%d/%m/%Y')ngay ,a.mskh, a.tenkh, 
        abs(a.sotien) as sotien, 
        CASE WHEN a.loaichungtu = '0' THEN abs(a.sotien) ELSE '' END SoTienThu,
        CASE WHEN a.loaichungtu = '1' THEN abs(a.sotien) ELSE '' END SoTienChi,
        a.noidung, a.msnv, a.tennv,a.loaichungtu,  a.nganquy,a.makhoanmuc, b.tenloai, b.dieukien2
         from thuchi a 
         INNER JOIN dmphanloai b ON a.makhoanmuc = b.msloai AND b.phanloai='khoanmuc'
        WHERE a.msdv='$msdv' AND a.mshs='$mshs'  AND a.ngay BETWEEN '$tungay' AND '$denngay'  $filter
        order by a.rowid desc  ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function add_thuchi($msdn, $mshs, $msdv, $soct, $socttc, $sohd, $ngay, $mskh, $tenkh, $sotien, $noidung, $msnv, $tennv, $loaichungtu, $nganquy, $makhoanmuc)
    {
        $getall = $this->connect->prepare("INSERT INTO thuchi (lastmodify, msdn, mshs, msdv, soct,socttc, sohd, ngay, mskh, tenkh, sotien, noidung, msnv, tennv, loaichungtu, nganquy, makhoanmuc) VALUES(NOW(), '$msdn', '$mshs', '$msdv', '$soct', '$socttc','$sohd', '$ngay', '$mskh', '$tenkh', '$sotien','$noidung', '$msnv', '$tennv', '$loaichungtu', '$nganquy', '$makhoanmuc')");
        $getall->execute();
    }

    public function edit_thuchi($mshs, $msdv, $msdn, $soct, $ngay, $sotien, $noidung, $msnv, $tennv, $nganquy, $khoanmuc)
    {
        $getall = $this->connect->prepare("UPDATE thuchi set lastmodify=NOW(), sotien='$sotien', noidung='$noidung', msnv='$msnv', tennv='$tennv', nganquy='$nganquy', makhoanmuc='$khoanmuc' where  soct='$soct' and msdv='$msdv' and mshs='$mshs'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function delete_thuchi($msdv, $msdn, $soct, $socttc, $sotien)
    {
        $getall = $this->connect->prepare("CALL `XoaThuChi` ('$msdv', '$msdn','$soct', '$socttc', '$sotien')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function add_khoanmuc($mshs, $msdv, $makhoanmuc, $tenkhoanmuc)
    {
        $getall = $this->connect->prepare("INSERT dmphanloai(mshs,msdv, msloai, tenloai, phanloai ) VALUES ('$mshs','$msdv', '$makhoanmuc', '$tenkhoanmuc', 'khoanmuc')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function load_nhanvien($mshs, $msdv)
    {
        $getall = $this->connect->prepare("SELECT msdn, hoten, loai_nv FROM hosonhanvien where mshs ='$mshs' and msdv ='$msdv' order by hoten ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_tongthuchi($mshs, $msdv, $tungay, $denngay)
    {
        $getall = $this->connect->prepare("SELECT 'dauky' loai, ifnull(SUM(sotien),0)dauky FROM thuchi WHERE ngay<'$tungay' AND msdv='$msdv'AND mshs='$mshs'
        UNION ALL
        SELECT 'tongthu'loai, ifnull(SUM(sotien),0)tongthu FROM thuchi WHERE ngay between '$tungay' AND '$denngay' AND msdv='$msdv' AND mshs='$mshs' AND loaichungtu=0
        UNION ALL
        SELECT 'tongchi'loai, ifnull(SUM(abs(sotien)),0)tongchi FROM thuchi WHERE ngay between '$tungay' AND '$denngay' AND msdv='$msdv' AND mshs='$mshs' AND loaichungtu=1");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_ncc_chuathanhtoan($mshs, $msdv, $search)
    {
        $query = '';
        if ($search != '') {
            $query = "and (sohd like '%$search%' or tenncc like '%$search%')";
        }
        $getall = $this->connect->prepare("SELECT soct, sohd, tenncc, tongcongvat, dathanhtoan, (tongcongvat-dathanhtoan)conno FROM nhapkhoheader WHERE mshs='$mshs' AND msdv='$msdv' AND tongcongvat-dathanhtoan > 0 $query ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function chi_thanhtoan_nhacungcap($msdv, $soct, $socttc, $nganquy, $sotien)
    {
        $getall = $this->connect->prepare("UPDATE nhapkhoheader set dathanhtoan=abs(dathanhtoan + $sotien), sophieuchi = concat(sophieuchi,'|','$soct'), nganquy='$nganquy' where soct='$socttc' and msdv='$msdv'");
        $getall->execute();
    }
}
