<?php
include('__include_connect.php');
require("../../modules/nhapkhoClass.php");

$db = new NhapKho();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];

$list = $db->load_nhapkho_line($mshs, $msdv, $soct);
$stt = 1;
foreach ($list as $r) {
?>
    <tr class="active_items item_line border-b border-dashed border-[#ffffff40]" onclick='active_item(this)' id='item_nhapkho'>
        <th scope="row" class="px-4 py-2 text-center"><?= $stt++ ?></th>
        <td class="px-4 py-2 tenhh_line text-start"><?= $r->tenhh ?></td>
        <td hidden class='soct'><?= $r->soct ?></td>
        <td hidden class='rowid'><?= $r->rowid ?></td>
        <td hidden class='mshh' id='mshh_line'><?= $r->mshh ?></td>
        <td class="px-4 py-2 dvt_line text-center"><?= $r->dvt ?></td>
        <td class="px-4 py-2 solo_line text-center"><?= $r->solo ?></td>
        <td class="px-4 py-2 handung_line text-center"><?= $r->handung ?></td>
        <td class="px-4 py-2 gianhap_line text-end"><?= str_replace(',', '.', number_format($r->gianhapchuack)) ?></td>
        <td class="px-4 py-2 chietkhau_line text-end"><?= str_replace(',', '.', number_format($r->tienchietkhau)) . '(' . $r->chietkhau . '%)' ?></td>
        <td class="px-4 py-2 vat_line text-center"><?= $r->thuesuat ?></td>
        <td class="px-4 py-2 soluong_line text-center"><?= str_replace(',', '.', number_format($r->soluong)) ?></td>
        <td class="px-4 py-2 thanhtien_line text-end"><?= str_replace(',', '.', number_format($r->gianhapcothue * $r->soluong)) ?></td>
    </tr>
<?php
}
