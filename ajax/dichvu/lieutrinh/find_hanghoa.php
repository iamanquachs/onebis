<?php
include("../../../includes/config.php");
include("../../../includes/database.php");
include("../../../includes/database_sv.php");
require("../../../modules/dichvuClass.php");

$db = new dichvu();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$tensanpham = $_POST['tensanpham'];
$loai = $_POST['loai'];
$msdichvu = $_POST['msdichvu'];
$phanbo = $_POST['phanbo'];
$lieutrinh = $_POST['lieutrinh'];
$list = $db->find_hanghoa($mshs, $msdv, $tensanpham, $msdichvu, $phanbo, $lieutrinh, $loai);
$stt = 1;
foreach ($list as $r) { ?>
    <tr class='hover:bg-green-300 hover:cursor-pointer' onclick="add_hanghoa('<?= $r->mshh ?>','<?= $r->tenhh ?>','<?= $r->dvt_quydoi ?>','<?= str_replace(',', '.', number_format($r->giaban)) ?>','<?= $loai ?>','<?= $r->loai ?>','<?= $r->ptthuchien ?>')" class="item_lieutrinh">
        <td class=" px-4 py-2"><?= $stt++ ?></td>
        <td class=" px-4 py-2"><?= $r->tenhh ?></td>
        <td class=" px-4 py-2 text-end"><?= $r->dvt_quydoi ?></td>
        <td class=" px-4 py-2 text-end"><?= $r->soluong_quydoi ?></td>
        <td class=" px-4 py-2 text-end"><?= $r->ptthuchien ?></td>
        <td class=" px-4 py-2 text-end"><?= str_replace(',', '.', number_format($r->giaban)) ?></td>

    </tr>
<?php
}
