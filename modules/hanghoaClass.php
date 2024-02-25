<?php

class hanghoa extends database_sv
{

    public function load_hanghoa($mshs, $msdv,  $loai, $nhom, $hang)
    {
        $query = '';
        $filter = '';
        if ($loai != '') {
            $filter .= "and a.loai_hh ='$loai'";
        }
        if ($nhom != '') {
            $filter .= "and a.nhom ='$nhom'";
        }
        if ($hang != '') {
            $filter .= "and a.mshangsx ='$hang'";
        }


        $getall = $this->connect->prepare("SELECT a.lastmodify, a.mshh, a.tenhh, a.loai_hh, b.tenloai AS loai, a.msncc, ifnull(f.tenloai,'') AS nhacc, a.dvt, a.mshangsx,
        e.tenloai AS tenhangsx, a.quycach, a.gianhap, a.giaban, a.thuesuat, a.nhom, c.tenloai AS tennhom, a.pttichluy,a.ptthuchien, a.path_image, a.mota, a.trangthai, a.tonkho_tt, a.dvt_quydoi, a.soluong_quydoi, a.mavach, a.mshhncc, a.thoihan_khauhao
       FROM hosohanghoa a 
       INNER JOIN dmphanloai b ON a.loai_hh = b.msloai AND b.phanloai = 'loai_hh'
       INNER JOIN dmphanloai c ON a.nhom = c.msloai AND c.phanloai = 'nhom'
       INNER JOIN dmphanloai e ON a.mshangsx = e.msloai AND e.phanloai = 'hangsx'
       left JOIN dmphanloai f ON a.msncc = f.msloai AND f.phanloai = 'nhacc'
       WHERE  a.msdv = '$msdv' and a.mshs ='$mshs' $query $filter  ORDER BY a.tenhh
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);

        $getall->execute();
        return $getall->fetchAll();
    }
    public function add_hanghoa($trangthai, $msdn, $mshs, $msdv, $mshh, $tenhanghoa, $loai_hh,  $hangsx, $quycach, $gianhap, $giaban, $thuesuat, $nhom, $dvt, $pttichluy, $ptthuchien, $all_path_image, $mota, $tonkho_tt, $mavach, $mshhncc, $dvt_quydoi, $soluong_quydoi, $sothang_khauhao)
    {
        $getall = $this->connect->prepare("INSERT INTO hosohanghoa(lastmodify, trangthai, msdn, mshs, msdv, mshh, tenhh, loai_hh, mshangsx, quycach, gianhap, giaban, thuesuat, nhom, dvt, pttichluy,ptthuchien, path_image, mota , tonkho_tt, mavach, mshhncc, dvt_quydoi, soluong_quydoi, thoihan_khauhao) VALUES(NOW(), '$trangthai','$msdn', '$mshs', '$msdv', '$mshh', '$tenhanghoa', '$loai_hh', '$hangsx', '$quycach', '$gianhap', '$giaban', '$thuesuat', '$nhom', '$dvt', '$pttichluy','$ptthuchien', '$all_path_image', '$mota','$tonkho_tt', '$mavach', '$mshhncc', '$dvt_quydoi', '$soluong_quydoi', '$sothang_khauhao')  
        ");
        $getall->execute();
    }
    public function edit_hanghoa($trangthai, $msdn, $mshs, $msdv, $mshh, $tenhanghoa, $loai_hh, $hangsx, $quycach,  $giaban, $thuesuat, $nhom, $dvt, $pttichluy, $ptthuchien, $mota, $tonkho_tt, $mavach, $mshhncc, $dvt_quydoi, $soluong_quydoi, $sothang_khauhao)
    {
        $getall = $this->connect->prepare("UPDATE hosohanghoa set lastmodify=NOW(), trangthai='$trangthai', tonkho_tt='$tonkho_tt',tenhh='$tenhanghoa',loai_hh='$loai_hh',mshangsx='$hangsx', quycach='$quycach',  giaban='$giaban', thuesuat='$thuesuat', nhom='$nhom', giaban='$giaban', dvt='$dvt', pttichluy='$pttichluy', ptthuchien='$ptthuchien', mota='$mota', mavach='$mavach', mshhncc='$mshhncc',dvt_quydoi='$dvt_quydoi', soluong_quydoi='$soluong_quydoi', thoihan_khauhao='$sothang_khauhao' WHERE mshh='$mshh' and msdv='$msdv' and mshs='$mshs'
        ");
        $getall->execute();
        return $getall->fetchAll();
    }
    public function delete_hanghoa($msdn, $msdv, $mshh)
    {
        $getall = $this->connect->prepare("CALL `CheckDelete_HHDV`('$msdv', '$msdn', '$mshh')
        ");
        $getall->execute();
        return $getall->fetchAll();
    }

    public function load_image($mshh)
    {
        $getall = $this->connect->prepare("SELECT mshs,lastmodify, path_image FROM hosohanghoa where mshh='$mshh'
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);

        $getall->execute();
        return $getall->fetchAll();
    }
    public function edit_image($mshh, $path_image)
    {
        $getall = $this->connect->prepare("UPDATE hosohanghoa set path_image = '$path_image' where mshh='$mshh'
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);

        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_hanghoa_vuotdinhmuc($mshs, $msdv)
    {
        $getall = $this->connect->prepare("SELECT a.tenhh, a.tonkho_tt, TRUNCATE(b.toncuoi,2)toncuoi 
        FROM hosohanghoa a INNER JOIN tonkho b ON a.mshh=b.mshh AND a.msdv=b.msdv
         WHERE a.mshs='$mshs' AND a.msdv='$msdv' AND a.tonkho_tt > 0 AND b.toncuoi <= a.tonkho_tt
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);

        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_hanghoa_hethan($mshs, $msdv, $thamso)
    {
        $getall = $this->connect->prepare(" SELECT a.mshh, a.tenhh, 
        DATE_FORMAT(b.handung, '%d/%m/%Y')handung
        FROM hosohanghoa a 
        INNER JOIN tonkho b ON a.mshh=b.mshh and a.msdv = b.msdv
        WHERE b.mshs='$mshs' and b.msdv='$msdv' 
        and a.trangthai='0' and b.toncuoi > 0 AND DATEDIFF(b.handung,CURRENT_DATE) <= '$thamso' order by b.handung
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);

        $getall->execute();
        return $getall->fetchAll();
    }
}
