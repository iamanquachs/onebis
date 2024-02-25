<?php

class chat extends database_sv
{
    public function load_soluong_tinnhan($mshs, $msdv)
    {
        $getall = $this->connect->prepare("SELECT count(rowid)soluong from chatai where mshs='$mshs' and msdv='$msdv' and date(lastmodify) = CURDATE()");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function load_lichsu($mshs, $msdv)
    {
        $getall = $this->connect->prepare("SELECT date_format(lastmodify, '%d/%m/%Y')ngay, soct, tenchude from chatai where mshs='$mshs' and msdv='$msdv' and xoa = 0 group by soct order by ngay desc");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
   
    public function load_chitiet_lichsu($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("SELECT tenchude, question, answer from chatai where mshs='$mshs' and msdv='$msdv' and soct='$soct'  and xoa = 0 order by rowid");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function add_tinnhan($mshs, $msdv, $msdn, $soct, $tenchude, $question, $answer)
    {
        $getall = $this->connect->prepare("INSERT INTO chatai(lastmodify, msdn, mshs, msdv,soct, tenchude, question, answer) VALUES(NOW(), '$msdn', '$mshs', '$msdv', '$soct', '$tenchude','$question', '$answer')");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }

    public function edit_chude($mshs, $msdv, $soct, $tenchude)
    {
        $getall = $this->connect->prepare("UPDATE chatai set tenchude='$tenchude' where mshs='$mshs' and msdv='$msdv' and soct='$soct'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function delete_chude($mshs, $msdv, $soct)
    {
        $getall = $this->connect->prepare("UPDATE chatai set xoa = 1 where mshs='$mshs' and msdv='$msdv' and soct='$soct'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
}
