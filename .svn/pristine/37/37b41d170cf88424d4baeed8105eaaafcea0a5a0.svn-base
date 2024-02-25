<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$idchidinh = $_POST['idchidinh'];
$mslieutrinh = $_POST['mslieutrinh'];
$vitri = $_POST['vitri'];
$list_lieutrinh = $db->load_chitiet_hanghoa($msdv, $soct, $idchidinh, $mslieutrinh);
$stt = 1;
foreach ($list_lieutrinh as $r) {
    $list_hanghoa_lieutrinh = $db->load_chitiet_hanghoa($msdv, $soct,  $idchidinh, $r->mshh);
    $thanhtien = 0;
    foreach ($list_hanghoa_lieutrinh as $i) {
        $thanhtien += $i->thanhtien;
    }
?>

    <tr class="hover:bg-[#ddd] hover:cursor-pointer">
        <td class='px-4 py-2 text-center'><?= $stt++ ?></td>
        <td class=' px-4 py-2  gap-3 text-left flex'>
            <button onclick="show_chitiet_lieutrinh(this, '<?= $r->mshh ?>')" class="icon_show hidden focus:outline-none z-[10]"><img src="vendor/img/ondown.png"></button>
            <button onclick="hidden_chitiet_lieutrinh(this,'<?= $r->mshh ?>')" class="icon_hidden   focus:outline-none z-[10]"><img src=" vendor/img/ontop.png"></button>
            <?= $r->tenhh ?>
        </td>
        <?php if ($vitri == 'banhang') { ?>
            <td class=' px-4 py-2  gap-3 text-center'><?= $r->soluong ?> </td>
        <?php } else { ?>
            <td class=' px-4 py-2  gap-3 text-center'><?= $r->ngayhendaformat ?> </td>
        <?php } ?>
        <td class='px-4 py-2 text-end'><?= str_replace(',', '.', number_format($thanhtien)) ?></td>
    </tr>
    <?php foreach ($list_hanghoa_lieutrinh as $i) { ?>
        <tr class="<?= $r->mshh ?> item_hanghoa_lieutrinh hover:cursor-pointer hover:bg-[#e9b2f1] hidden bg-slate-100">
            <td></td>
            <td class=' px-4 py-2  gap-3 text-left flex pl-[4.25rem]'><?= $i->tenhh ?>
            </td>
            <?php if ($vitri == 'banhang') { ?>
                <td class=' px-4 py-2  gap-3 text-center'><?= $r->soluong ?> </td>
            <?php } else { ?>
                <td class=' px-4 py-2  gap-3 text-center'><?= $r->ngayhendaformat ?> </td>
            <?php } ?>
            <td class='px-4 py-2 text-end'><?= str_replace(',', '.', number_format($i->thanhtien)) ?></td>
        </tr>
    <?php
    } ?>


<?php
}
