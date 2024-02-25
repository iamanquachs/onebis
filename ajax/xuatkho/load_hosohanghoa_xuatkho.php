<?php
include('__include_connect.php');
require("../../modules/xuatkhoClass.php");

$db = new xuatkho();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$tenhh = $_POST['tenhh'];
$loaixuat = $_POST['loaixuat'];

if ($loaixuat == 'XNCC') {
    $list = $db->load_hosohanghoa_xuatkho_tra($mshs, $msdv, $tenhh);
} else {
    $list = $db->load_hosohanghoa_xuatkho_hube_hethan($mshs, $msdv, $tenhh);
}
$stt = 1;
?>
<thead>
    <tr class="font_semi">
        <th class="px-4 py-2 text-center" scope="col">#</th>
        <th class="px-4 py-2 text-left" scope="col">Tên hàng hóa</th>
        <th class="px-4 py-2 text-center" scope="col">ĐVT</th>
        <th class="px-4 py-2 text-left" scope="col">Số lô</th>
        <th class="px-4 py-2 text-center" scope="col">Hạn dùng</th>
        <th class="px-4 py-2 text-right" scope="col">Giá nhập</th>
        <th class="px-4 py-2 text-right" scope="col">Giá bán</th>
        <th class="px-4 py-2 text-right" scope="col">SL</th>
        <th class="px-4 py-2 text-left" scope="col">Số HD</th>
        <th class="px-4 py-2 text-center" scope="col">Ngày HD</th>
        <th class="px-4 py-2 text-left" scope="col">Tên NCC</th>
    </tr>
</thead>
<tbody id='chitiet_hosohanghoa_line'>
    <?php
    foreach ($list as $r) { ?>
        <tr class="hover:bg-[#693b85] hover:cursor-pointer border-b border-dashed border-[#c1adc6]" onclick="chon_hanghoa('<?= $r->mshh ?>','<?= $r->tenhh ?>','<?= $r->dvt ?>','<?= $r->solo ?>','<?= $r->handung ?>','<?= $r->gianhapcothue ?>','<?= $r->giaban ?>','<?= $r->soluong ?>','<?= $r->sohd ?>', '<?= $r->ngayhd ?>', '<?= $r->tenncc ?>')">
            <td scope="col" class="px-4 py-2 text-center"><?= $stt++ ?></td>
            <td class="mshh_td" hidden><?= $r->mshh ?></td>
            <td class="tenhh_td px-4 py-2 text-left"><?= $r->tenhh ?></td>
            <td class="dvt_td px-4 py-2 text-center"><?= $r->dvt ?></td>
            <td class="solo_td px-4 py-2 text-left "><?= $r->solo ?></td>
            <td class="handung_td px-4 py-2 text-center" scope="col"><?= $r->handung ?></td>
            <td class="gianhapcothue_td px-4 py-2 text-right" scope="col"><?= str_replace(',', '.', number_format($r->gianhapcothue)) ?></td>
            <td class="px-4 py-2 text-right" scope="col"><?= str_replace(',', '.', number_format($r->giaban)) ?></td>
            <td class="px-4 py-2 text-right" scope="col"><?= $r->soluong ?></td>
            <td class="px-4 py-2 text-left" scope="col"><?= $r->sohd ?></td>
            <td class="ngayhd_td px-4 py-2 text-center" scope="col"><?= $r->ngayhd ?></td>
            <td class="tenncc_td px-4 py-2 text-left" scope="col"><?= $r->tenncc ?></td>
        </tr>
    <?php
    } ?>
</tbody>