<?php
class donvi_control extends database
{
    public function load_dmtinh($group, $where)
    {
        $getall = $this->connect->prepare("SELECT maxa, tenxa, mahuyen, tenhuyen, matinh, tentinh, CONCAT(tenxa, ', ', tenhuyen, ', ', tentinh ) as diachi FROM dmtinh $where $group");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function load_donvi($songayhethan)
    {
        $query = '';
        if ($songayhethan != '') {
            $query = " and ngayhethan <= DATE_ADD(CURDATE(),INTERVAL $songayhethan DAY)";
        }

        $getall = $this->connect->prepare("SELECT * FROM
        (
        SELECT mshs, msdv, tendv, msxa, diachi, loaihinh, nguoidaidien, CONCAT(SUBSTRING(dienthoai,1,4),'.',SUBSTRING(dienthoai,5,3),'.',
        SUBSTRING(dienthoai,8,3))dienthoai, concat(CONCAT(SUBSTRING(dienthoai,1,4),'.',SUBSTRING(dienthoai,5,3),'.',
        SUBSTRING(dienthoai,8,3)),' | ', nguoidaidien )khachhang, trangthai,dienthoaihotro
        FROM hosodonvi ORDER BY mshs DESC
        )a
        INNER JOIN
        ( 
        SELECT msdv, giahopdong, datediff(ngayhethan, curdate())songay, danhan,
        DATE_FORMAT(ngaykichhoat,'%d/%m/%Y')ngaykichhoat, DATE_FORMAT(ngayhethan,'%d/%m/%Y')ngayhethan 
        FROM nhatky_giahan where trangthai = 1 $query
        GROUP BY msdv
        )b ON a.msdv = b.msdv");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function active_donvi($mshs, $msdv, $tendv, $msxa, $diachi, $loaihinh, $nguoidaidien, $sdt, $sohopdong, $giahopdong, $sothang_km, $donvi_taitro, $ghichu, $sdt_congtacvien, $sonam, $dienthoaihotro,  $add_or_edit, $nguoigiahan)
    {
        $getall = $this->connect->prepare("CALL `Active_MSDV`('$mshs', '$msdv', '$tendv', '$msxa','$diachi','$loaihinh', '$nguoidaidien', '$sdt', '$sohopdong', '$giahopdong', '$sothang_km', '$donvi_taitro',  '$ghichu' ,'$sdt_congtacvien', '$sonam','$dienthoaihotro', '$add_or_edit', '$nguoigiahan')");
        $getall->execute();
        return $getall->fetchAll();
    }
    public function set_trangthai_msdv($msdv, $trangthai)
    {
        $getall = $this->connect->prepare("CALL `SetStatus_MSDV`('$msdv', '$trangthai')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_ctkm($query)
    {
        $getall = $this->connect->prepare("SELECT tenctkm, giahopdong, sonam, sothangkm FROM ctkm_admin $query");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function load_nhatky_giahan($mshs, $msdv)
    {
        $getall = $this->connect->prepare("SELECT nguoigiahan, dienthoaictv as sdtctv,  CONCAT(SUBSTRING(dienthoaictv,1,4),'.',SUBSTRING(dienthoaictv,5,3),'.',
        SUBSTRING(dienthoaictv,8,3))dienthoaictv, msdvtaitro, sohopdong, date_format(ngaykichhoat,'%d/%m/%Y')ngaykichhoat, sonam, sothangkm, songaygiahan,  date_format(ngayhethan,'%d/%m/%Y')ngayhethan, giahopdong 
        from nhatky_giahan
        where mshs='$mshs' and msdv='$msdv' ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function xacnhan_giahan($mshs, $msdv)
    {
        $getall = $this->connect->prepare("UPDATE nhatky_giahan SET danhan = 1, ngayhethan = DATE_ADD(ngayhethan, INTERVAL (sonam * 12) + sothangkm MONTH)
        WHERE mshs='$mshs' and msdv='$msdv' AND trangthai = 1
        ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
}
class donvi extends database_sv
{
    function _get_login_with_donvi($mshs, $msdv)
    {
        $control = $this->control_variable;
        $sv = $this->sv_variable;
        $getall = $this->connect->prepare("SELECT a.sodienthoai, a.loai_nv, a.hoten,a.mschucvu, b.mshs, b.msdv, b.tendv, b.loaihinh,b.dienthoaihotro 
        FROM $sv.hosonhanvien a INNER JOIN $control.hosodonvi b
        ON a.msdv = b.msdv AND a.sodienthoai=b.msdn WHERE b.mshs = '$mshs' and b.msdv = '$msdv'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
}
