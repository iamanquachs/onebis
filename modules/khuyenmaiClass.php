<?php

class khuyenmai extends database_sv
{
    public function load_header($mshs, $msdv, $songayhethan,  $ctkm_tungay, $ctkm_denngay)
    {


        $filter = "and  denngay between '$ctkm_tungay' and '$ctkm_denngay' ";

        if ($songayhethan != '') {
            $filter =  'and denngay <= DATE_ADD(CURDATE(), INTERVAL ' . $songayhethan . ' DAY) ';
        }

        $getall = $this->connect->prepare("SELECT msctkm, tenctkm, khoa FROM ctkm WHERE msdv='$msdv' and mshs='$mshs'  $filter  GROUP BY msctkm order by tenctkm");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_chitiet_ctkm($mshs, $msdv, $msctkm, $ctkm_tungay, $ctkm_denngay)
    {

        $getall = $this->connect->prepare("SELECT rowid,tenctkm, mshh, tenhh, ptgiam, DATE_FORMAT(tungay, '%d/%m/%Y')tungay, DATE_FORMAT(denngay, '%d/%m/%Y')denngay, khoa FROM ctkm  WHERE msdv='$msdv' and mshs='$mshs'  and msctkm='$msctkm' and denngay between  '$ctkm_tungay' and '$ctkm_denngay'order by tungay desc, tenhh ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function add_ctkm_header($mshs, $msdv, $msdn, $msctkm, $tenctkm, $ptgiam, $tungay, $denngay)
    {
        $getall = $this->connect->prepare("INSERT ctkm (lastmodify,mshs, msdv, msdn, msctkm, tenctkm,mshh,tenhh,tungay, denngay, loaikm, ptgiam) 
        SELECT NOW(),'$mshs', '$msdv', '$msdn', '$msctkm', '$tenctkm', mshh, tenhh, '$tungay','$denngay','0', '$ptgiam' from hosohanghoa where trangthai = 0 and mshs='$mshs' and msdv='$msdv' and mshh not in (SELECT mshh 
        FROM  ctkm
        WHERE mshs ='$mshs' and msdv='$msdv'  and tungay >= '$tungay' AND denngay <='$denngay'); 
        INSERT ctkm (lastmodify,mshs, msdv, msdn, msctkm, tenctkm,mshh,tenhh,tungay, denngay, loaikm, ptgiam)
         SELECT NOW(),'$mshs', '$msdv', '$msdn', '$msctkm', '$tenctkm', msdichvu, tendichvu, '$tungay','$denngay','0', '$ptgiam' from hosodichvu where trangthai = 0 and mshs='$mshs' and msdv='$msdv' 
         and msdichvu not in (SELECT mshh 
        FROM  ctkm
        WHERE mshs ='$mshs' and msdv='$msdv'  and tungay >= '$tungay' AND denngay <='$denngay')");
        $getall->execute();
    }
    public function add_ctkm_theo_nhom($mshs, $msdv, $msdn, $msctkm, $tenctkm, $ptgiam, $nhom_hh, $tungay, $denngay)
    {
        $getall = $this->connect->prepare("INSERT ctkm (lastmodify,mshs, msdv, msdn, msctkm, tenctkm,mshh,tenhh,tungay, denngay, loaikm, ptgiam)
         SELECT NOW(),'$mshs', '$msdv', '$msdn', '$msctkm', '$tenctkm', msdichvu, tendichvu, '$tungay','$denngay','0', '$ptgiam' from hosodichvu where trangthai = 0 and mshs='$mshs' and msdv='$msdv'  and nhom_dichvu='$nhom_hh' mshh not in (SELECT mshh 
        FROM  ctkm
        WHERE mshs ='$mshs' and msdv='$msdv'  and tungay >= '$tungay' AND denngay <='$denngay')");
        $getall->execute();
    }
    public function edit_chitiet_ctkm($mshs, $msdv, $khoa, $rowid)
    {
        $getall = $this->connect->prepare("UPDATE ctkm set lastmodify=NOW(), khoa='$khoa' where rowid='$rowid' and mshs='$mshs' and msdv='$msdv'");
        $getall->execute();
    }
    public function delete_chitiet_ctkm($mshs, $msdv, $rowid)
    {
        $getall = $this->connect->prepare("DELETE from ctkm WHERE mshs='$mshs'and msdv='$msdv'and rowid='$rowid'");
        $getall->execute();
    }
    public function delete_ctkm_header($mshs, $msdv, $msctkm)
    {
        $getall = $this->connect->prepare("DELETE from ctkm WHERE mshs='$mshs'and msdv='$msdv'and msctkm='$msctkm'");
        $getall->execute();
    }
    public function edit_ctkm_header($mshs, $msdv, $khoa, $msctkm)
    {
        $getall = $this->connect->prepare("UPDATE ctkm set lastmodify=NOW(), khoa='$khoa' where msctkm='$msctkm' and mshs='$mshs' and msdv='$msdv'");
        $getall->execute();
    }
    public function find_hanghoa($mshs, $msdv, $tensanpham)
    {
        $getall = $this->connect->prepare("SELECT  mshh,tenhh, giaban, 0 loai from hosohanghoa where trangthai='0' and mshs='$mshs' and msdv='$msdv' AND tenhh like '%$tensanpham%'
        UNION ALL 
        SELECT msdichvu AS mshh, tendichvu AS tenhh, sotien AS giaban, 1 loai FROM hosodichvu
         WHERE  msdv='$msdv' and mshs='$mshs'
        --  msdichvu NOT IN (SELECT msdichvu FROM hosolieutrinh WHERE msdv = '$msdv') 
          AND trangthai ='0' AND tendichvu like '%$tensanpham%'  ORDER BY loai, tenhh");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function ktra_ctkm($mshs, $msdv, $msctkm)
    {
        $getall = $this->connect->prepare("SELECT msctkm from ctkm where mshs='$mshs' AND msdv='$msdv' and msctkm='$msctkm' and mshh='$msctkm'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function ktra_ngay_ctkm($mshs, $msdv, $msctkm,  $tungay, $denngay)
    {
        $getall = $this->connect->prepare("SELECT count(rowid)rowid from ctkm WHERE mshs='$mshs' AND msdv='$msdv' AND msctkm='$msctkm' AND khoa=0 AND  '$tungay' < '$denngay ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function update_chitiet_ctkm($mshs, $msdv, $msdn, $msctkm, $mshh, $tenhh, $ptgiam, $tungay, $denngay)
    {
        $getall = $this->connect->prepare("UPDATE ctkm set lastmodify=NOW(), mshh='$mshh', tenhh='$tenhh',ptgiam='$ptgiam', tungay='$tungay', denngay='$denngay' where msctkm='$msctkm' and msdv='$msdv' and mshs='$mshs'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function add_chitiet_ctkm($mshs, $msdv, $msdn, $msctkm, $tenctkm, $mshh, $tenhh, $ptgiam, $tungay, $denngay)
    {
        $getall = $this->connect->prepare("INSERT ctkm (lastmodify,mshs, msdv, msdn, msctkm, tenctkm, mshh,tenhh, loaikm, tungay, denngay, ptgiam) SELECT NOW(),'$mshs', '$msdv','$msdn','$msctkm','$tenctkm','$mshh','$tenhh','0','$tungay','$denngay','$ptgiam' from hosohanghoa where trangthai = 0 and mshs='$mshs' and msdv='$msdv' and mshh not in (SELECT mshh 
        FROM  ctkm
        WHERE mshs ='$mshs' and msdv='$msdv'  and tungay >= '$tungay' AND denngay <='$denngay');
        INSERT ctkm (lastmodify,mshs, msdv, msdn, msctkm, tenctkm, mshh,tenhh, loaikm, tungay, denngay, ptgiam) SELECT NOW(),'$mshs', '$msdv','$msdn','$msctkm','$tenctkm','$mshh','$tenhh','0','$tungay','$denngay','$ptgiam' from hosodichvu where trangthai = 0 and mshs='$mshs' and msdv='$msdv' and msdichvu not in (SELECT mshh 
        FROM  ctkm
        WHERE mshs ='$mshs' and msdv='$msdv'  and tungay >= '$tungay' AND denngay <='$denngay')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
}
