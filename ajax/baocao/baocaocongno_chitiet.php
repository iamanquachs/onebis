<?php
include('__include_connect.php');
require("../../modules/baocaoClass.php");

$db = new baocao();
$mshs = $_COOKIE['mshs'];
$msdv = $_POST['msdv'];
$tungay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['tungay'])));
$denngay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['denngay'])));
$loai = $_POST['loai'];
$stt = 1;
if ($loai == 'Receivable') {
    $list = $db->baocao_congno($mshs, $msdv, 'CT_THU', $tungay, $denngay);
}
if ($loai == 'Pay') {
    $list = $db->baocao_congno($mshs, $msdv, 'CT_TRA', $tungay, $denngay);
}
$alltongcong = 0;
$tongdathanhtoan = 0;
$tongconno = 0;
foreach ($list as $r) {
    $alltongcong += $r->tongcong;
    $tongdathanhtoan += $r->dathanhtoan;
    $tongconno += $r->conno;
    $msdv = $r->msdv;
    $khachhang = explode(' | ', $r->ten);
    $func_thutien = '';
    $func_thutien = 'onclick="open_modal_thutien(`' . $r->soct . '`,`' . $r->sohd . '`,`' . $r->tongcong . '`,`' . $r->dathanhtoan . '`,`' . $khachhang[0] . '`,`' . $khachhang[1] . '`,`' . $loai . '`)"';
?>
    <tr class="active_items item_line border-b border-dashed border-[#ffffff40] items" onclick='active_item(this)'>
        <td class="px-4 py-2 text-center "><?= $stt++ ?></td>
        <td class=" px-4 py-2 text-center font-thin"><?= $r->ngay ?></td>
        <td class="search_key px-4 py-2 font-thin text-center"><?= $r->soct ?></td>
        <td class="search_key px-4 py-2 font-thin text-left"><?= $r->ten ?></td>
        <td class=" px-4 py-2 font-thin text-center"><?= $r->sothamchieu ?></td>
        <td class=" px-4 py-2 font-thin  text-right text-lg"><?= str_replace(',', '.', number_format($r->tongcong)) ?></td>
        <td class=" px-4 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($r->dathanhtoan)) ?></td>
        <td class=" px-4 py-2 font-thin text-right text-lg <?= $r->conno > 0 ? 'hover:text-[#ffff00]' : '' ?>" <?= $func_thutien ?>><?= str_replace(',', '.', number_format($r->conno)) ?></td>
        <td class=" px-4 py-2 font-thin text-center"><?= $r->msdv ?></td>
    </tr>
<?php
} ?>
<tr class="active_items item_line border-b border-dashed border-[#ffffff40] text-[#ffff00]" onclick='active_item(this)'>
    <td colspan='5' class="px-4 py-2 text-end ">Tổng cộng</td>
    <td class=" px-4 py-2 font-thin  text-right text-lg"><?= str_replace(',', '.', number_format($alltongcong)) ?></td>
    <td class=" px-4 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($tongdathanhtoan)) ?></td>
    <td class=" px-4 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($tongconno)) ?></td>
    <td class=" px-4 py-2 font-thin text-center text-lg"><?= $msdv ?></td>
</tr>