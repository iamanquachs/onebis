<?php

class xuatKho extends database_sv
{
    //Add sản phảm mới tạm
    public function add_xuatkho_header($msdn, $mshs, $msdv,  $soct, $loaixuat)
    {
        $getall = $this->connect->prepare("INSERT INTO xuatkho_header(lastmodify,msdn,mshs, msdv, soctdh, soct, loaixuat,nguon) VALUES (NOW(),'$msdn','$mshs', '$msdv', '$soct', '$soct', '$loaixuat', 'XTT');");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    //Nhập kho load line
    public function load_xuatkho_header($mshs, $msdv, $tungay, $denngay, $loaixuat)
    {
        $filter = '';
        if ($loaixuat != '') {
            $filter = "and a.loaixuat='$loaixuat'";
        }
        $getall = $this->connect->prepare("SELECT (@row_number:=@row_number + 1) AS stt, DATE_FORMAT(a.lastmodify, '%I:%i %d/%m/%y')ngaygio, a.soct, 
        a.tongcongvat, a.dathanhtoan, a.mskh, a.tenkhachhang, a.soctdh, a.sohd, a.nguon, a.tenkhachhang, a.loaixuat, b.tenloai
         FROM xuatkho_header a
         INNER JOIN dmphanloai b 
         ON a.msdv=b.msdv and a.loaixuat = b.msloai AND b.phanloai='loaixuat' , (SELECT @row_number:=0) AS temp 
        where a.mshs='$mshs' and a.msdv='$msdv' and a.loaixuat<>'XBB' $filter and a.ngay between '$tungay' and '$denngay' order by a.rowid desc");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    //Nhập kho load header chưa update
    public function xuatkho_load_header_chua_update()
    {
        $getall = $this->connect->prepare("SELECT a.soct FROM xuatkho_header a inner join xuatkho_line b on a.soct =b.soct where b.tam='1' group by a.soct");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    //Nhập kho load header chưa update
    public function delete_xuatkho_load_header_chua_update($msdn, $msdv)
    {
        $getall = $this->connect->prepare("DELETE From xuatkho_header where soct not in (select soct from xuatkho_line where msdv='$msdv') and msdn = '$msdn' and msdv='$msdv'");
        $getall->execute();
    }
    //Add xuất kho line
    public function add_xuatkho_line($rowid_tonkho, $mshs, $msdv, $msdn, $msnpp, $soct, $mshh, $tenhh, $dvt, $solo, $handung, $soluong, $msctkm, $gianhapcothue, $giagoc, $ptgiam, $giaban, $thuesuat, $pttichluy, $loai_xuat)
    {
        $getall = $this->connect->prepare("INSERT INTO xuatkho_line(lastmodify,mshs, msdv, msdn, msncc, ngay, soct, mshh, tenhh, dvt, ngaysx, solo, handung, soluong, msctkm, gianhapvat, giagoc, ptgiam, giaban, thuesuat, thanhtien, thanhtienvat, tam, loaixuat, ghichu, pttichluy ) VALUES( NOW(), '$mshs','$msdv','$msdn','$msnpp', NOW(),'$soct','$mshh','$tenhh','$dvt','','$solo','$handung','$soluong','$msctkm','$gianhapcothue','$giagoc','$ptgiam','$giaban','$thuesuat', $soluong * $giaban, $soluong * $giaban, '1', '$loai_xuat', '', '$pttichluy')");
        $getall->execute();
    }

    public function lay_tonkho_baocao($mshs, $msdv, $tungay, $dengay, $loai)
    {
        $getall = $this->connect->prepare("CALL `LayTonKhoBaoCao`('$mshs', '$msdv', '$tungay', '$dengay', '$loai')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    //Nhập kho load line
    public function load_xuatkho_line($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("SELECT rowid, msncc, soct, mshh, tenhh, solo,ptgiam,  dvt,DATE_FORMAT(handung, '%d/%m/%Y')handung, soluong, msctkm, giaban, thanhtienvat, auto_post from xuatkho_line where mshs='$mshs' and msdv='$msdv' and soct='$soct' order by auto_post, msctkm,rowid desc ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    //update header
    public function update_xuatkho_header($mshs, $msdv, $msdn, $soct, $tongcong, $loaixuat)
    {
        $getall = $this->connect->prepare("UPDATE xuatkho_header SET lastmodify=NOW(), msdn='$msdn',ngay=NOW(), ngayhd=NOW(), tongcongvat='$tongcong', loaixuat='$loaixuat',  msnvbh = '$msdn' WHERE mshs='$mshs' and msdv='$msdv' AND soct='$soct'; UPDATE xuatkho_line set tam=0, loaixuat='$loaixuat' where mshs='$mshs' and msdv='$msdv' and soct='$soct'");
        $getall->execute();
    }
    //Nhập kho tính tổng thanh toan và tổng cộng vat
    public function xuatkho_tinhtong($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("SELECT  SUM(thanhtienvat)tongtien, loaixuat FROM xuatkho_line WHERE mshs ='$mshs' and msdv ='$msdv' AND soct='$soct' ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    //xuất kho delete Line
    public function delete_xuatkho_line($mshs, $msdv, $soct, $rowid)
    {
        $getall = $this->connect->prepare("DELETE from xuatkho_line where mshs='$mshs' and msdv='$msdv' and soct='$soct' and rowid='$rowid';
        ");
        $getall->execute();
    }
    //Xuất kho load danh sách từ hosohanghoa
    public function load_hosohanghoa_xuatkho_hube_hethan($mshs, $msdv, $tenhh)
    {
        $getall = $this->connect->prepare("SELECT b.rowid AS rowid_tonkho, a.mshh, a.tenhh,a.dvt , b.solo, 
        DATE_FORMAT(b.handung, '%d/%m/%Y')handung,
         b.gianhapcothue, a.giaban,b.toncuoi as soluong,''sohd, ''ngayhd, c.tenloai AS tenncc
        FROM hosohanghoa a 
        INNER JOIN tonkho b ON a.mshh=b.mshh 
        INNER JOIN dmphanloai c ON a.msncc = c.msloai AND c.phanloai='nhacc'
        WHERE b.mshs='$mshs' and b.msdv='$msdv' AND (a.tenhh LIKE '%$tenhh%' or a.mshh like '%$tenhh%' or a.mavach like '%$tenhh%') 
        and a.trangthai='0' and b.toncuoi > 0 order by a.tenhh");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_hosohanghoa_xuatkho_tra($mshs, $msdv, $tenhh)
    {
        $getall = $this->connect->prepare("SELECT a.mshh,a.tenhh, a.dvt, a.solo, DATE_FORMAT(a.handung, '%d/%m/%Y')handung,
        a.gianhapcothue, a.gianhapcothue as giaban, a.soluong,
        b.sohd, DATE_FORMAT(b.ngayhd, '%d/%m/%Y')ngayhd,b.tenncc
               FROM nhapkholine a 
               INNER JOIN nhapkhoheader b ON a.soct=b.soct AND a.msdv=b.msdv 
               INNER JOIN hosohanghoa c ON a.mshh=c.mshh AND a.msdv=c.msdv 
               WHERE a.mshs='$mshs' and a.msdv='$msdv' and (a.tenhh like '%$tenhh%' or a.mshh like '%$tenhh%' or c.mavach like '%$tenhh%'  ) order by a.tenhh");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function get_pttichluy_by_mshh($mshs, $msdv, $mshh)
    {
        $getall = $this->connect->prepare("SELECT  a.thuesuat, a.pttichluy, a.msncc   
        FROM hosohanghoa a 
           where a.mshs = '$mshs' and a.msdv = '$msdv'and  a.trangthai = 0 AND  a.mshh = '$mshh'  ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function get_tonkho_by_mshh($mshs, $msdv, $mshh)
    {
        $getall = $this->connect->prepare("SELECT ifnull(sum(toncuoi),0) as toncuoi  from tonkho  where mshs='$mshs' and msdv='$msdv' and mshh='$mshh' ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    //xuất kho delete header
    public function delete_xuatkho($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("DELETE FROM xuatkho_header where soct='$soct';DELETE FROM xuatkho_line where mshs='$mshs' and msdv='$msdv' and soct='$soct'");
        $getall->execute();
    }

    //Nhập kho search
    public function huy_xuatkho($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("DELETE FROM xuatkho_line where soct='$soct';DELETE FROM xuatkho_header where mshs='$mshs' and msdv='$msdv' and soct='$soct'");
        $getall->execute();
    }

    //Mở cập nhật nhập kho thì update thành 1
    public function capnhat_xuatkho($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("UPDATE xuatkho_line set tam='1' where mshs='$mshs' and msdv='$msdv' and soct='$soct'");
        $getall->execute();
    }
    //Add nhà cung cấp

    public function nhapkho_post_thuchi($msdv, $soct, $socttc, $nganquy, $dathanhtoan)
    {
        $getall = $this->connect->prepare("UPDATE nhapkhoheader set dathanhtoan='$dathanhtoan', sophieuchi = concat(sophieuchi,'|','$soct'), nganquy='$nganquy' where soct='$socttc' and msdv='$msdv'");
        $getall->execute();
    }
}
