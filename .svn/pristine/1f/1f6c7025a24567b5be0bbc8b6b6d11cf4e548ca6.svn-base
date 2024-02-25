<?php
include('__include_connect.php');
require("../../modules/baocaoClass.php");

$db = new baocao();
$db_control = new baocao_control();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];

$list = $db_control->load_chinhanh($mshs);
$list_phanquyen = $db->ktra_phanquyen($mshs, $msdv, $msdn);
if ($list_phanquyen[0]->phanquyen == 1) { ?>
    <option selected class='text-[#747474]' value="">Tất cả chi nhánh</option>
    <?php
    foreach ($list as $r) { ?>
        <option class='text-black' value="<?= $r->msdv ?>"><?= $r->tendv ?></option>
        <?php }
} else {
    foreach ($list as $e) {
        if ($msdv == $e->msdv) { ?>
            <option class='text-black' value="<?= $e->msdv ?>"><?= $e->tendv ?></option>
<?php }
    }
}
