<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
class database_sv
{
    public $connect_control;
    public $connect; //sv

    public $control_variable;
    public $sv_variable;

    public function __construct()
    {
        try {
            // (host, dbname, charset, tai khoan, matkhau)
            $this->connect_control = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
            $this->connect_control->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $msdv = $_COOKIE['msdv'];
            if ($msdv != '' || $msdv != null) {
                $getall = $this->connect_control->prepare("SELECT AES_DECRYPT(ips, 'tpsob@23')ips,AES_DECRYPT(dbs, 'tpsob@23')dbs,AES_DECRYPT(usc, 'tpsob@23')uss,AES_DECRYPT(psc, 'tpsob@23')pws FROM hosodonvi WHERE msdv = '$msdv' limit 1");
                $getall->setFetchMode(PDO::FETCH_OBJ);
                $getall->execute();
                $list_info =  $getall->fetchAll();
                foreach ($list_info as $r) {
                    $ips = $r->ips;
                    $dbs = $r->dbs;
                    $uss = $r->uss;
                    $pws = $r->pws;
                }
                $this->connect = new PDO("mysql:host=$ips;dbname=$dbs;charset=utf8", $uss, $pws);
                $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $this->control_variable = DB_NAME;
                $this->sv_variable = $dbs;
            }
        } catch (PDOException $EX) {
            echo $EX->getMessage(0);
        }
    }
    public function __destruct()
    {
        $this->connect_control = null;
        $this->connect = null;
    }
}
$database = new database_sv();
