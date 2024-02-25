<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$list = $db->load_banhang_line($msdv, $soct, '');
$stt = 1;
foreach ($list as $r) {
?>
    <tr class="hover:bg-[#e9b2f1] hover:cursor-pointer">
        <td class='px-4 py-2 text-center'><?= $stt++ ?></td>
        <td class=' px-4 py-2  gap-3 text-left flex'><?= $r->tenhh ?> <?php if ($r->loai_hh == 'DVLT') { ?>
                <img class="hover:cursor-pointer" onclick="load_chitiet_hanghoa('<?= $soct ?>','<?= $r->idchidinh ?>','<?= $r->mshh ?>','<?= $r->tenhh ?>')" src="vendor/img/option.png">
            <?php } ?>
        </td>
        <td class=' px-4 py-2  gap-3 text-center'><?= $r->soluong ?> </td>
        <td class='px-4 py-2 text-end'><?= str_replace(',', '.', number_format($r->thanhtien)) ?></td>
    </tr>
<?php
}
