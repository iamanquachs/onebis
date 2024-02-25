<?php

class NhapKho extends database_sv
{
    //Add sản phảm mới tạm
    public function nhapkho_add_header($msdn, $mshs, $msdv,  $soct)
    {
        $getall = $this->connect->prepare("INSERT INTO nhapkhoheader(lastmodify,msdn,mshs, msdv, soct)
         VALUES (NOW(),'$msdn','$mshs', '$msdv', '$soct')");
        $getall->execute();
    }
    //Nhập kho load line
    public function nhapkho_load_header_taophieu($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("SELECT DATE_FORMAT(lastmodify,'%d/%m/%Y') as lastmodify,sohd,ngaygs,DATE_FORMAT(ngayhd,'%d/%m/%Y')as ngayhd,msncc,tenncc FROM nhapkhoheader
         WHERE mshs='$mshs' and msdv='$msdv' and soct = '$soct'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    //Nhập kho load line
    public function load_nhapkho_header($mshs, $msdv)
    {
        $getall = $this->connect->prepare("SELECT soct,sohd,ngaygs,ngayhd,msncc,tenncc,tongcongvat FROM nhapkhoheader WHERE mshs='$mshs' and msdv='$msdv'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    //Nhập kho load header chưa update
    public function nhapkho_load_header_chua_update($mshs, $msdv)
    {
        $getall = $this->connect->prepare("SELECT a.soct FROM nhapkhoheader a inner join nhapkholine b on a.soct =b.soct where a.mshs='$mshs' and a.msdv='$msdv' and b.tam='1' group by a.soct");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    //Nhập kho load header chưa update
    public function delete_nhapkho_load_header_chua_update($msdn, $mshs, $msdv)
    {
        $getall = $this->connect->prepare("DELETE From nhapkhoheader where soct not in (select soct from nhapkholine where mshs='$mshs' and msdv='$msdv') and msdn = '$msdn' and msdv='$msdv'");
        $getall->execute();
    }
    //Add sản phảm mới tạm
    public function add_nhapkho_line($msdn, $mshs, $msdv, $soct, $mshh, $tenthuoc, $dvt, $solo, $handung, $gianhap, $chietkhau, $tienchietkhau, $gianhapchuathue, $vat, $tienthue, $gianhapcothue, $soluong,  $thanhtiencothue, $ptgiaban, $giaban)
    {
        $getall = $this->connect->prepare("INSERT INTO nhapkholine(lastmodify, msdn, mshs,msdv,soct, mshh,tenhh,dvt,solo,handung,gianhapchuack, chietkhau,tienchietkhau,gianhapchuathue,thuesuat,tienthue, gianhapcothue,soluong, thanhtiencothue,ptgiaban, giaban,loaiphieu,tam)
         VALUES (NOW(),'$msdn', '$mshs','$msdv','$soct', '$mshh', '$tenthuoc', '$dvt','$solo', '$handung', '$gianhap', '$chietkhau', '$tienchietkhau','$gianhapchuathue', '$vat','$tienthue', '$gianhapcothue', '$soluong', '$thanhtiencothue','$ptgiaban','$giaban','1','1');");
        $getall->execute();
    }
    //Add sản phảm mới tạm
    public function edit_nhapkho_line($mshs, $msdv, $soct, $mshh, $tenthuoc, $dvt, $solo, $handung, $gianhap, $chietkhau, $tienchietkhau, $gianhapchuathue, $vat, $tienthue, $gianhapcothue, $soluong,  $thanhtiencothue, $ptgiaban, $giaban)
    {
        $getall = $this->connect->prepare("UPDATE nhapkholine set tenhh='$tenthuoc',dvt='$dvt',solo='$solo',handung='$handung',gianhapchuack='$gianhap',chietkhau='$chietkhau',tienchietkhau='$tienchietkhau',gianhapchuathue='$gianhapchuathue',thuesuat='$vat',tienthue='$tienthue',gianhapcothue='$gianhapcothue',soluong='$soluong',thanhtiencothue='$thanhtiencothue',ptgiaban='$ptgiaban',giaban='$giaban' WHERE mshs='$mshs' and msdv='$msdv' and soct='$soct' and mshh='$mshh'");
        $getall->execute();
    }
    //Nhập kho load line
    public function load_nhapkho_line($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("SELECT rowid, soct,mshh, tenhh, dvt, solo, date_format(handung, '%d/%m/%Y')handung, chietkhau, gianhapchuack, thuesuat,tienchietkhau, soluong, thanhtiencothue, gianhapcothue,ptgiaban,giaban FROM nhapkholine
        WHERE soct = '$soct' and mshs='$mshs' and msdv='$msdv' order by rowid ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    //update header
    public function update_nhapkho_header($mshs, $msdv, $soct, $sohoadon, $ngayhd, $msncc, $tenncc, $tongcong)
    {
        $getall = $this->connect->prepare("UPDATE nhapkhoheader set sohd='$sohoadon', ngaygs=NOW(), ngayhd='$ngayhd', tongcongvat='$tongcong', loaiphieu='1', msncc='$msncc', tenncc='$tenncc' where soct='$soct'  AND msdv='$msdv';
        UPDATE nhapkholine set ngaygs=NOW(), ngayhd='$ngayhd', tam='0' where soct='$soct'  AND msdv='$msdv';
        UPDATE  hosohanghoa a 
        INNER JOIN nhapkholine b ON a.mshh=b.mshh
        INNER JOIN nhapkhoheader c ON c.soct = b.soct
        SET a.giaban = b.giaban,  a.msncc = c.msncc, a.gianhap=b.gianhapchuathue, a.thuesuat=b.thuesuat
        WHERE b.soct='$soct' AND b.msdv='$msdv' and b.mshs='$mshs'
        ");
        $getall->execute();
    }
    //Nhập kho tính tổng thanh toan và tổng cộng vat
    public function nhapkho_tinhtong($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("SELECT SUM(gianhapchuathue * soluong) as thanhtienchuathue, SUM(thanhtiencothue) as thanhtiencothue, SUM(tienchietkhau) as tienchietkhau FROM nhapkholine
        WHERE soct = '$soct' and mshs='$mshs' and msdv='$msdv'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    //Nhập kho delete Line
    public function delete_nhapkho_line($mshs, $msdv, $soct, $rowid)
    {
        $getall = $this->connect->prepare("DELETE FROM nhapkholine where mshs='$mshs' and msdv='$msdv' and soct='$soct' and rowid='$rowid'");
        $getall->execute();
    }
    //Nhập kho load danh sách từ hosohanghoa
    public function load_hosohanghoa_nhapkho($mshs, $msdv, $tenhh)
    {
        $getall = $this->connect->prepare("SELECT mshh,tenhh,thuesuat,gianhap, dvt, quycach, giaban FROM hosohanghoa
        WHERE mshs='$mshs' and msdv='$msdv' and (tenhh LIKE '%$tenhh%' OR mshh like '%$tenhh%' or mavach like '%$tenhh%' ) and trangthai=0");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    //Nhập kho delete header
    public function delete_nhapkho($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("DELETE FROM nhapkhoheader where mshs='$mshs' and msdv='$msdv' and soct='$soct';DELETE FROM nhapkholine where mshs='$mshs' and msdv='$msdv' and soct='$soct'");
        $getall->execute();
    }
    //Nhập kho filter
    public function nhapkho_filter($mshs, $msdv, $loai, $tungay, $denngay)
    {
        if ($loai == 'theoHD') {
            $loai = 'ngayhd';
        } else {
            $loai = 'ngaygs';
        }
        $getall = $this->connect->prepare("SELECT soct,sohd,ngaygs,ngayhd,msncc,tenncc,tongcongvat, dathanhtoan FROM nhapkhoheader WHERE mshs='$mshs' and msdv='$msdv' and  $loai  BETWEEN '$tungay' AND '$denngay'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    //Nhập kho search
    public function nhapkho_search($mshs, $msdv, $value)
    {
        $getall = $this->connect->prepare("SELECT soct,sohd,ngaygs,ngayhd,msncc,tenncc,tongcongvat, dathanhtoan FROM nhapkhoheader WHERE mshs='$mshs' and msdv='$msdv' and sohd LIKE '%$value%' OR tenncc LIKE '%$value%' ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    //Nhập kho search
    public function huy_nhapkho($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("DELETE FROM nhapkholine where soct='$soct';DELETE FROM nhapkhoheader where mshs='$mshs' and msdv='$msdv' and soct='$soct'");
        $getall->execute();
    }

    //Mở cập nhật nhập kho thì update thành 1
    public function capnhat_nhapkho($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("UPDATE nhapkholine set tam='1' where mshs='$mshs' and msdv='$msdv' and soct='$soct'");
        $getall->execute();
    }
    //Add nhà cung cấp

    public function load_nhacungcap($mshs, $msdv)
    {
        $getall = $this->connect->prepare("SELECT rowid, msloai, tenloai from dmphanloai where phanloai='nhacc' and mshs='$mshs' and msdv='$msdv'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function delete_nhacungcap($mshs, $msdv, $rowid)
    {
        $getall = $this->connect->prepare("DELETE from dmphanloai where mshs='$mshs' and msdv='$msdv' and rowid='$rowid'");
        $getall->execute();
    }
    public function nhapkho_post_thuchi($mshs, $msdv, $soct, $socttc, $nganquy, $dathanhtoan)
    {
        $getall = $this->connect->prepare("UPDATE nhapkhoheader set dathanhtoan='$dathanhtoan', sophieuchi = concat(sophieuchi,'|','$soct'), nganquy='$nganquy' where soct='$socttc' and msdv='$msdv' and mshs='$mshs'");
        $getall->execute();
    }
}
