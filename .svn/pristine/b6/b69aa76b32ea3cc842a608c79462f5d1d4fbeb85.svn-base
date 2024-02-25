<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");

$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$vitri = 'nhatky';
$list = $db->load_banhang_line($msdv, $soct, $vitri);
$stt = 1;
$tongthanhtien = 0;
foreach ($list as $r) {
    $tongthanhtien += $r->thanhtien;
?>
    <tr class="item_line text-black hover:bg-[#693b85]  hover:cursor-pointer hover:text-white">
        <td class='px-4 py-2 text-center'><?= $stt++ ?></td>
        <td class='px-4 py-2 text-left'><?= $r->tenhh ?></td>
        <td class='px-4 py-2 text-right'><?= str_replace(',', '.', number_format($r->thanhtien)) ?></td>
        <td class='px-4 py-2 text-center flex justify-center gap-3'>
            <button>
                <img class="w-[20px]" onclick="open_delete_donthuoc('<?= $r->tenhh ?>','<?= $r->mshh ?>','<?= $r->idchidinh ?>','<?= $soct ?>')" src='vendor/img/delete.png' title="Xóa dịch vụ">
            </button>
        </td>
    </tr>
<?php
} ?>
<tr class="item_line text-black hover:bg-[#693b85]  hover:cursor-pointer hover:text-white font_semi">
    <td colspan="2" class='px-4 py-2 text-center'>Tổng cộng</td>
    <td class='px-4 py-2 text-right'><?= str_replace(',', '.', number_format($tongthanhtien)) ?></td>
    <td></td>
</tr>