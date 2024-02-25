<?php
include('__include_connect.php');
require("../../modules/quanlytaisanClass.php");
require("../../modules/baocaoClass.php");

$db_control = new baocao();
$db = new quanlytaisan();
$mshs = $_COOKIE['mshs'];
$msdv = $_POST['msdv'];
$msdn = $_COOKIE['msdn'];
$list = $db->load_taisan($mshs, $msdv);
$phanquyen_nhan = $db_control->ktra_phanquyen($mshs, $msdv, $msdn, 'NTS');
$phanquyen_duyet = $db_control->ktra_phanquyen($mshs, $msdv, $msdn, 'DTS');
$stt = 1;

foreach ($list as $r) {
?>
    <tr class="active_items item_line items border-b border-dashed border-[#ffffff40]" onclick='active_item(this)'>
        <td class=" text-center px-4 py-2"><?= $stt++ ?></td>
        <td class="search_key text-left px-4 py-2 ">
            <?= $r->tenhh ?>
        </td>
        <td class="text-left px-4 py-2 "><?= $r->tenphongban ?></td>
        <td class="text-center px-4 py-2 "><?= $r->nhap ?></td>
        <td class="text-center px-4 py-2 "><?= $r->xuat ?></td>
        <td class="text-center px-4 py-2 "><?= $r->ton ?></td>
        <td class="text-center px-4 py-2 "><?= $r->msdv ?></td>
        <td class="py-2 gap-3">
            <div class="flex justify-center items-center gap-3">
                <button onclick="load_chitiet_quanly_taisan('<?= $r->mshh ?>','<?= $r->tenhh ?>')">
                    <img class="w-[24px]" src="vendor/img/time24.png">
                </button>
                <button onclick="open_tra_taisan('<?= $r->mshh ?>','<?= $r->tenhh ?>','<?= $r->msphongban ?>','<?= $r->tenphongban ?>','<?= $r->ton ?>')">
                    <img class="w-[24px]" src="vendor/img/wait32.png">
                </button>
                <?php if ($phanquyen_duyet[0]->phanquyen == 1) { ?>
                    <button onclick="open_duyet_dieuchuyen('<?= $r->mshh ?>','<?= $r->tenhh ?>','<?= $r->ton ?>')">
                        <img class="w-[24px]" src="vendor/img/checked.png">
                    </button>
                <?php } ?>
                <?php if ($phanquyen_nhan[0]->phanquyen == 1) { ?>
                    <button onclick="open_nhan_dieuchuyen('<?= $r->mshh ?>','<?= $r->tenhh ?>')">
                        <img class="w-[24px]" src="vendor/img/arrow_right.png">
                    </button>
                <?php } ?>

            </div>

        </td>
    </tr>
<?php
}
