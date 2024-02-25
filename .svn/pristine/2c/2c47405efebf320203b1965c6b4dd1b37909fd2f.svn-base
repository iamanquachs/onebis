<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");

$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$sodienthoai = $_POST['sodienthoai'];
$list = $db->load_donthuoc($mshs, $msdv, $soct, $sodienthoai);
$stt = 1;
foreach ($list as $r) {
?>
    <tr class="item_line !text-black ">
        <td class='px-4 py-2 text-center'><?= $stt++ ?></td>
        <td class=' px-4 py-2 text-left'><?= $r->tenhh ?></td>
        <td class=' px-4 py-2 text-center '><?= $r->dvt ?></td>
        <td class='soluong px-4 py-2 text-right'><?= str_replace(',', '.', number_format($r->soluong)) ?></td>
        <td class='soluong_edit px-4 py-2 text-right hidden '><input class="input_sl_edit w-[50px] border-b text-right" value="<?= $r->soluong ?>"></td>
        <td class='px-4 py-2 text-right'><?= str_replace(',', '.', number_format($r->giathu)) ?></td>
        <td class='px-4 py-2 text-right'><?= str_replace(',', '.', number_format($r->thanhtien)) ?></td>
        <td class='cachdung px-4 py-2 text-left'><?= $r->idtuvan ?></td>
        <td class='cachdung_edit px-4 py-2 text-left hidden'><input class="input_cachdung_edit border-b" value="<?= $r->idtuvan ?>"></td>
        <td class='px-4 py-2 text-center flex justify-center gap-3'>
            <button onclick="open_edit_donthuoc(this, '<?= $r->mshh ?>')" class="btn_edit_donthuoc">
                <img class="w-[20px]" src='vendor/img/edit.png'>
            </button>
            <button onclick="edit_donthuoc(this, '<?= $soct ?>', '<?= $r->idchidinh ?>')" class="btn_luu_donthuoc hidden">
                <img class="w-[20px]" src='vendor/img/checked.png' title="Chỉnh đơn thuốc">
            </button>
            <button>
                <img class="w-[20px]" onclick="open_delete_donthuoc('<?= $r->tenhh ?>','<?= $r->mshh ?>','<?= $r->idchidinh ?>','<?= $soct ?>','<?= $r->rowid ?>')" src='vendor/img/delete.png' title='Xóa đơn thuốc'>
            </button>
        </td>
    </tr>
<?php
}
