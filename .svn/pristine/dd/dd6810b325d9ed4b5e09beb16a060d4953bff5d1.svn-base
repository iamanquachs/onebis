<?php
class tonkho extends database_sv
{
    public function load_tonkho($mshs, $msdv, $songayhethan, $vuotdinhmuc)
    {
        $query = '';
        if ($msdv != '') {
            $query .= "AND a.msdv='$msdv'";
        }
        if ($vuotdinhmuc != '') {
            $query .= "AND b.tonkho_tt > 0 and b.tonkho_tt >= a.toncuoi ";
        }
        $getall = $this->connect->prepare("SELECT a.msdv,b.mshh,CONCAT(b.mshh, ' | ',b.tenhh)hanghoa, b.dvt, a.solo, DATE_FORMAT(a.handung, '%d/%m/%Y')handung, a.gianhapcothue, 0 as soluong, a.tondau, 
        (a.gianhapcothue * a.tondau) tttondau,(a.gianhapcothue * a.tongnhap)tttongnhap, a.tongnhap,(a.giaxuatcothue * a.tongxuat)tttongxuat, a.tongxuat,a.toncuoi, (a.gianhapcothue * a.toncuoi) tttoncuoi,
        if((b.tonkho_tt - a.toncuoi)<0,0,b.tonkho_tt - a.toncuoi) as tonkho_tt,
        CASE
            WHEN DATEDIFF(a.handung,CURRENT_DATE) < $songayhethan  THEN '1'
            WHEN a.handung < CURDATE()  THEN '2'
            ELSE '0'
        END AS tinhtrang,
        CASE
            WHEN a.toncuoi < b.tonkho_tt  THEN '1'
            ELSE '0'
        END AS hetkho
        FROM tonkho a INNER JOIN hosohanghoa b ON a.mshh =b.mshh 
        WHERE  a.mshs='$mshs' $query");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
}
