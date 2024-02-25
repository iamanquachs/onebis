<?php
include('__include_connect.php');
require("../../modules/hanghoaClass.php");

$db = new hanghoa();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$loai = $_POST['loai'];
$nhom = $_POST['nhom'];
$hang = $_POST['hang'];
$list = $db->load_hanghoa($mshs, $msdv, $loai, $nhom, $hang);
$stt = 1;
foreach ($list as $r) {
    $hinhanh = explode('|', $r->path_image);

?>
    <tr class="active_items item_line items border-b border-dashed border-[#ffffff40]" onclick='active_item(this)'>
        <td class="text-center px-4 py-2"><?= $stt++ ?></td>
        <td class="search_key text-start px-4 py-2"><?= $r->tenhh ?></td>
        <td class="text-center px-4 py-2 "><?= $r->dvt ?></td>
        <td class="text-center px-4 py-2 "><?= str_replace(',', '.', number_format($r->soluong_quydoi)) ?></td>
        <td class="text-center px-4 py-2 "><?= $r->dvt_quydoi ?></td>
        <td class="text-end px-4 py-2 "><?= str_replace(',', '.', number_format($r->giaban)) ?></td>
        <td class="text-end px-4 py-2 "><?= $r->pttichluy ?></td>
        <td class="text-end px-4 py-2 "><?= $r->ptthuchien ?></td>
        <td class="text-end px-4 py-2 "><?= str_replace(',', '.', number_format($r->tonkho_tt)) ?></td>
        <td class="text-center px-4 py-2 "><?= $r->loai ?></td>
        <td class="text-center px-4 py-2 "><?= $r->tennhom ?></td>
        <td class="text-center px-4 py-2  mota_td" hidden><?= $r->mota ?></td>
        <td class="text-center px-4 py-2 "><?= $r->tenhangsx ?></td>


        <td class="text-center px-4 py-2 ">
            <button>
                <?php if ($r->trangthai == '1') { ?>
                    <img src="vendor/img/lock.png">
                <?php } else { ?>
                    <img src="vendor/img/checked.png">
                <?php } ?>
            </button>
        </td>
        <td class="text-center py-2 flex justify-center gap-3">
            <button onclick="open_edit_hanghoa(this,'<?= $r->mshh ?>','<?= $r->tenhh ?>','<?= $r->loai_hh ?>','<?= $r->dvt ?>','<?= $r->mshangsx ?>','<?= $r->quycach ?>','<?= str_replace(',', '.', number_format($r->gianhap)) ?>','<?= str_replace(',', '.', number_format($r->giaban)) ?>','<?= $r->thuesuat ?>','<?= $r->nhom ?>','<?= $r->pttichluy ?>','<?= $r->ptthuchien ?>','<?= $r->path_image ?>','<?= $r->trangthai ?>','<?= $r->tonkho_tt ?>','<?= $r->dvt_quydoi ?>','<?= str_replace(',', '.', number_format($r->soluong_quydoi)) ?>','<?= $r->mavach ?>','<?= $r->mshhncc ?>','<?= $r->thoihan_khauhao ?>')">
                <img class="w-[20px]" src="vendor/img/edit.png">
            </button>
            <button onclick="open_delete_hanghoa('<?= $r->mshh ?>', '<?= $r->tenhh ?>','<?= $r->path_image ?>')">
                <img class="w-[20px]" src="vendor/img/delete.png">
            </button>
        </td>
    </tr>
<?php
}
