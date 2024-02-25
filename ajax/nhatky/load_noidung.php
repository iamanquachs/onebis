<?php
include('__include_connect.php');
require("../../modules/nhatkyClass.php");

$db = new nhatky();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$rowid = $_POST['rowid'];
$sodienthoai = $_POST['sodienthoai'];
$loai = $_POST['loai'];
$mshh = $_POST['mshh'];
$list = $db->load_noidung($mshs, $msdv, $rowid, $sodienthoai, $loai, $mshh);
$stt = 1;
foreach ($list as $r) {
?>
    <tr class="item_line !text-black ">
        <td class='px-4 py-2 text-center'><?= $stt++ ?></td>
        <td class='noidung_td px-4 py-2 text-left whitespace-wrap'><?= $r->noidung ?></td>
        <td class='noidung_edit px-4 py-2 text-left hidden'><textarea class="min-w-[400px]"><?= $r->noidung ?></textarea></td>
        <td class='px-4 py-2 text-left'><?= $r->tennv ?></td>
        <td class='px-4 py-2  '>
            <div class="flex justify-center items-center gap-3 ">

                <button class="btn_edit" onclick="open_edit_noidung(this)">
                    <img class="min-w-[20px] max-w-[20px]" src='vendor/img/edit.png'>
                </button>
                <button class="btn_success hidden" onclick="edit_noidung(this, '<?= $r->rowid ?>', '<?= $loai ?>', '<?= $mshh ?>')">
                    <img class="min-w-[20px] max-w-[20px]" src='vendor/img/checked.png'>
                </button>
                <button>
                    <img onclick="open_delete_noidung('<?= $r->rowid ?>', '<?= $loai ?>', '<?= $r->noidung ?>', '<?= $mshh ?>')" class="min-w-[20px] max-w-[20px]" src='vendor/img/delete.png'>
                </button>
            </div>

        </td>
    </tr>
<?php
}
