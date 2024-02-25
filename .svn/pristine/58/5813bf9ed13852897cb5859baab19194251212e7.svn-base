<?php

class dathen extends database_sv
{


    public function load_dathen($mshs, $msdv, $tungay, $denngay)
    {
        $getall = $this->connect->prepare("SELECT CONCAT(SUBSTRING(a.sodienthoai,1,4),'.',SUBSTRING(a.sodienthoai,5,3),'.',SUBSTRING(a.sodienthoai,8,3))sodienthoai, b.tenkh, 
        DATE(a.ngayhen)ngay, date_format(ngayhen, '%H:%i')gio, DAYOFWEEK(ngayhen)thu,DATE_FORMAT(a.ngayhen,'%d/%m/%Y %H:%i')ngayhen,        
        a.tenlieutrinh, a.tenhh, replace(GROUP_CONCAT(CONCAT(IF(a.ms_rang <> '',CONCAT('(',a.ms_rang,') '),''),a.tenhh)),',',' • ') AS tenhh, 
        replace(GROUP_CONCAT(a.rowid),',','|') AS rowid, a.soct        
        FROM banhang_line a 
        left JOIN banhang_header b ON a.msdv = b.msdv AND a.sodienthoai = b.sodienthoai and a.soct = b.soct        
        WHERE  a.mshs='$mshs' and a.msdv='$msdv' and a.nhom_hh not in ('DVLT','LT', 'DT', 'VC')        
        AND DATE(a.ngayhen) BETWEEN '$tungay' AND '$denngay' and b.dathen=0 and a.thuchien = 0
        GROUP BY a.sodienthoai, date(a.ngayhen)    
        UNION all 
        SELECT CONCAT(SUBSTRING(c.sodienthoai,1,4),'.',SUBSTRING(c.sodienthoai,5,3),'.',SUBSTRING(c.sodienthoai,8,3))sodienthoai, c.tenkh, 
        DATE(c.lastmodify)ngay, date_format(c.lastmodify, '%H:%i')gio, DAYOFWEEK(c.lastmodify)thu,DATE_FORMAT(c.lastmodify,'%d/%m/%Y %H:%i')ngayhen,        
        '', '', if(c.tuvan='','Khách hẹn', concat('Khách hẹn ', c.tuvan)) AS tenhh, '' AS rowid, c.soct 
        from banhang_header c where DATE(c.lastmodify) BETWEEN '$tungay' AND '$denngay' and c.dathen=1
        and c.mshs='$mshs' and c.msdv='$msdv'
        GROUP BY sodienthoai, ngay ORDER BY rowid");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function edit_ngayhen($mshs, $msdv, $rowid, $soct, $ngayhen, $giohen)
    {
        $ngay = $ngayhen . ' ' . $giohen;
        $getall = $this->connect->prepare("UPDATE banhang_line set ngayhen='$ngay'
        WHERE  mshs='$mshs' and msdv='$msdv' and rowid='$rowid' and soct='$soct'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
}
