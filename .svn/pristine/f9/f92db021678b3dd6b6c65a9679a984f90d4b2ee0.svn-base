<?php
include('__include_connect.php');
require("../../modules/nhatkyClass.php");
require("../../modules/xuatkhoClass.php");
require("../../modules/banhangClass.php");

$db_bh = new banhang();
$db = new nhatky();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$tenhh = $_POST['tenhh'];
$loai = $_POST['loai'];
$vitri = $_POST['vitri'];
$sodienthoai = $_POST['sodienthoai'];
if ($loai == 'hanghoa') {
    $list_hh = $db->tim_hanghoa($mshs, $msdv, $tenhh);
    $stt = 1;
    foreach ($list_hh as $e) {
        $list = $db_bh->load_hanghoa_dichvu($mshs, $msdv, 'hanghoa', '', $e->tenhh, $sodienthoai);
        foreach ($list as $r) {
?>
        <tr class="item_line text-black hover:bg-[#693b85] hover:text-white border-b border-dashed border-[#cfcdcd] hover:cursor-pointer" onclick="chon_hanghoa('<?= $r->maso ?>','<?= $r->ten ?>','<?= $e->dvt ?>','<?= $r->giaban ?>','<?= $e->gianhap ?>','<?= $r->pttichluy ?>','<?= $e->loai_hh ?>','<?= $e->songay_bh ?>','<?= $r->thuesuat ?>','<?= $r->ptthuchien ?>','<?= $r->msctkm ?>')">
            <td class='px-4 py-2 text-center'><?= $stt++ ?></td>
            <td class='noidung_td px-4 py-2 text-left'><?= $r->ten ?></td>
            <td class='noidung_edit px-4 py-2 text-center '><?= $e->dvt ?></td>
            <td class='noidung_edit px-4 py-2 text-right '><?= str_replace(',', '.', number_format($e->giaban)) ?></td>
        </tr>
        <?php
    }}
}
if ($loai == 'dichvu') {
    $list_dv = $db->tim_dichvu($mshs, $msdv, $tenhh);
    $stt = 1;
    foreach ($list_dv as $e) {
        $list = $db_bh->load_hanghoa_dichvu($mshs, $msdv, $e->lieutrinh == 1 ? 'lieutrinh' : 'dichvu', '', $e->tendichvu, $sodienthoai);
        foreach ($list as $r) {
        ?>
            <tr onclick="chon_dichvu('<?= $r->ten ?>','<?= $r->msctkm ?>','<?= $r->ptgiam ?>','<?= $r->maso ?>','<?= $e->lieutrinh ?>','<?= str_replace(',', '.', number_format($r->giaban)) ?>','DV', '<?= $vitri ?>', '<?= $r->ptthuchien ?>')" class="item_line text-black hover:bg-[#b5f5cc] border-b border-dashed border-[#cfcdcd] hover:cursor-pointer">
                <td class='px-4 py-2 text-center'><?= $stt++ ?></td>
                <td class='noidung_td px-4 py-2 text-left'><?= $r->ten ?></td>
                <td class='noidung_td px-4 py-2 text-center'><?= $e->lieutrinh == 1 ? 'Liệu trình' : 'Dịch vụ' ?></td>
                <td class='noidung_edit px-4 py-2  '>
                    <div class="flex justify-end items-center">
                        <?php
                        if ($r->ptgiam != 0) {
                            echo  '<div class="flex gap-2 items-center text-[#858484]"><p class="line-through">' . str_replace(',', '.', number_format($r->giaban)) . '</p>' . '<div class="bg-[#fff2cc] text-black text-md rounded-[3px] px-1" >-' . $r->ptgiam . '%</div>'  .
                                '<p class="font-medium text-black">' . str_replace(',', '.', number_format($r->giathu)) . '</p></div>';
                        } else {
                            echo '<p class="font-medium text-black">' . str_replace(',', '.', number_format($r->giaban)) . '</p>';
                        } ?>
                    </div>

                </td>
                <td class='noidung_edit px-4 py-2 text-right '></td>
            </tr>
<?php
        }
    }
}
