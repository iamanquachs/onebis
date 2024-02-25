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
    <tr class=" item_line hover:bg-[#693b85]  hover:cursor-pointer hover:text-white">
        <td class='px-4 py-2 text-center'><?= $stt++ ?></td>
        <td class=' px-4 py-2 flex items-center gap-3 tablet:whitespace-nowrap'><?= $r->tenhh ?>
            <?php if ($r->loai_hh == 'DVLT') { ?>
                <img class="hover:cursor-pointer" onclick="open_modal_chitiet_lieutrinh('<?= $soct ?>','<?= $r->idchidinh ?>','<?= $r->mshh ?>','<?= $r->tenhh ?>')" src="vendor/img/option.png">
            <?php } ?>
        </td>

        <td class='px-4 py-2 text-center'><?= $r->ptgiam ?></td>
        <td class='px-4 py-2 text-end'><?= str_replace(',', '.', number_format($r->thanhtien)) ?></td>
        <td class='px-4 py-2 '>
            <div class="flex justify-center items-center  gap-3">

                <button class="hover:cursor-pointer" onclick="open_giamgia_banhang_line('<?= $r->tenhh ?>', '<?= $r->idchidinh ?>', '<?= $r->giagoc ?>', '<?= $soct ?>', '<?= $r->ptgiam ?>')">
                    <img class="min-w-[20px] max-w-[20px]" src="vendor/img/percent.png">
                </button>
                <?php if ($r->dathu == 0) { ?>
                    <button class="hover:cursor-pointer" onclick="open_delete_banhang_line(' <?= $r->tenhh ?>', '<?= $r->idchidinh ?>')">
                        <img class="min-w-[20px] max-w-[20px]" src="vendor/img/delete16.png">
                    </button>
                <?php } else { ?>
                    <button class="hover:cursor-pointer" onclick="open_delete_dathu_fail()">
                        <img class="min-w-[20px] max-w-[20px]" src="vendor/img/delete16.png">
                    </button>
                <?php } ?>
            </div>

        </td>
    </tr>
<?php
}
