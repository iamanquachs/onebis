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
    $list = $db->baocao_congno($mshs, $msdv, 'TH_THU', $tungay, $denngay);
}
if ($loai == 'Pay') {
    $list = $db->baocao_congno($mshs, $msdv, 'TH_TRA', $tungay, $denngay);
}
$tongdauky = 0;
$tongphatsinh = 0;
$tongdathanhtoan = 0;
$tongnotrongky = 0;
$tongnocuoiky = 0;
foreach ($list as $r) {
    $tongdauky += $r->dauky;
    $tongphatsinh += $r->phatsinh;
    $tongdathanhtoan += $r->dathanhtoan;
    $tongnotrongky += $r->notrongky;
    $tongnocuoiky += $r->nocuoiky;
    $msdv = $r->msdv;
?>
    <tr class="active_items item_line border-b border-dashed border-[#ffffff40] items" onclick='active_item(this)'>
        <td class="px-4 py-2 text-center "><?= $stt++ ?></td>
        <td class="search_key px-4 py-2 font-thin text-left"><?= $r->ten ?></td>
        <td class=" px-4 py-2 font-thin  text-right text-lg"><?= str_replace(',', '.', number_format($r->dauky)) ?></td>
        <td class=" px-4 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($r->phatsinh)) ?></td>
        <td class=" px-4 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($r->dathanhtoan)) ?></td>
        <td class=" px-4 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($r->notrongky)) ?></td>
        <td class=" px-4 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($r->nocuoiky)) ?></td>
        <td class=" px-4 py-2 font-thin text-center text-lg"><?= $r->msdv ?></td>
    </tr>
<?php
} ?>
<tr class="active_items item_line border-b border-dashed border-[#ffffff40] text-[#ffff00] " onclick='active_item(this)'>
    <td colspan='2' class="px-4 py-2 text-end ">Tổng cộng</td>
    <td class=" px-4 py-2 font-thin  text-right text-lg"><?= str_replace(',', '.', number_format($tongdauky)) ?></td>
    <td class=" px-4 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($tongphatsinh)) ?></td>
    <td class=" px-4 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($tongdathanhtoan)) ?></td>
    <td class=" px-4 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($tongnotrongky)) ?></td>
    <td class=" px-4 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($tongnocuoiky)) ?></td>
    <td class=" px-4 py-2 font-thin text-center text-lg"><?= $msdv ?></td>
</tr>