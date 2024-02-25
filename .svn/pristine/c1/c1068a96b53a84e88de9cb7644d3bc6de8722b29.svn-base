<?php
include('__include_connect.php');
require("../../modules/nhanvienClass.php");
require("../../modules/thamsoClass.php");

$db = new nhanvien();
$db_ts = new thamso_control();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_POST['msdn'];
$loaihinh = $_COOKIE['loaihinh'];

$list = $db->load_chucnang($mshs, $msdv, $msdn, $loaihinh);
$thamso = $db_ts->load_thamsohethong($mshs, $msdv, 'QLTK');
$stt = 1;
foreach ($list as $r) {
    if ($r->tenmenu == 'KHO') {
        if ($thamso[0]->giatri == 1) { ?>
            <tr class="hover:bg-[#d0ffd0] hover:cursor-pointer items border-b border-dashed border-[#cfcdcd]" ondblclick="add_chucnang('<?= $r->rowid ?>')">
                <td class="text-center px-4 py-2"><?= $stt++ ?></td>
                <td class="text-left px-4 py-2"><?= $r->tenmenu ?></td>
                <td class="search_key text-left px-4 py-2"><?= $r->tennghiepvu ?></td>
            </tr>
        <?php
        }
    } else { ?>
        <tr class="hover:bg-[#d0ffd0] hover:cursor-pointer items border-b border-dashed border-[#cfcdcd]" ondblclick="add_chucnang('<?= $r->rowid ?>')">
            <td class="text-center px-4 py-2"><?= $stt++ ?></td>
            <td class="text-left px-4 py-2"><?= $r->tenmenu ?></td>
            <td class="search_key text-left px-4 py-2"><?= $r->tennghiepvu ?></td>
        </tr>
<?php
    }
}
