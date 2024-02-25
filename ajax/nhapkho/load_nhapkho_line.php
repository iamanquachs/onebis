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
    <tr id='item_nhapkho' class="active_items_hover pt-2">
        <th scope="row" class="text-center px-4 py-2 "><?= $stt++ ?></th>
        <td class="tenhh_line text-start px-4 py-2 "><?= $r->tenhh ?></td>
        <td hidden class='soct text-center'><?= $r->soct ?></td>
        <td hidden class='rowid'><?= $r->rowid ?></td>
        <td hidden class='mshh' id='mshh_line'><?= $r->mshh ?></td>
        <td class="dvt_line text-center px-4 py-2 "><?= $r->dvt ?></td>
        <td class="solo_line text-center px-4 py-2 "><?= $r->solo ?></td>
        <td class="handung_line text-center px-4 py-2 "><?= $r->handung ?></td>
        <td class="gianhap_line text-center px-4 py-2 "><?= str_replace(',', '.', number_format($r->gianhapchuack)) ?></td>
        <td class="chietkhau_line text-center px-4 py-2 "><?= $r->chietkhau ?></td>
        <td class="tienchietkhau_line text-center px-4 py-2 "><?= str_replace(',', '.', number_format($r->tienchietkhau)) ?></td>
        <td class="vat_line text-center px-4 py-2 "><?= $r->thuesuat ?></td>
        <td class="giabanvat_line text-center px-4 py-2 "><?= str_replace(',', '.', number_format($r->gianhapcothue)) ?></td>
        <td class="soluong_line text-center px-4 py-2 "><?= $r->soluong ?></td>
        <td class="thanhtien_line text-center px-4 py-2 "><?= str_replace(',', '.', number_format($r->gianhapcothue * $r->soluong)) ?></td>
        <td class="ptgiaban_line text-center px-4 py-2 "><?= $r->ptgiaban ?></td>
        <td class="giaban_line text-center px-4 py-2 "><?= str_replace(',', '.', number_format($r->giaban)) ?></td>
        <td class="text-center px-4 py-2 ">
            <div class="flex justify-center items-center gap-3 ">
                <button onclick="open_form_edit_line('<?= $r->soct ?>','<?= $r->mshh ?>','<?= $r->tenhh ?>','<?= $r->dvt ?>','<?= $r->solo ?>','<?= $r->handung ?>','<?= $r->gianhapchuack ?>','<?= $r->chietkhau ?>','<?= $r->tienchietkhau ?>','<?= $r->thuesuat ?>','<?= $r->gianhapcothue ?>','<?= $r->soluong ?>','<?= $r->ptgiaban ?>','<?= $r->giaban ?>','<?= $r->gianhapcothue * $r->soluong ?>')" data-target="#form_edit_line" data-toggle="modal">
                    <img class="min-w-[20px] max-w-[20px]" src="./vendor/img/edit.png">
                </button>
                <button onclick="open_nhapkho_delete_line('<?= $r->soct ?>','<?= $r->rowid ?>','<?= $r->tenhh ?>')" data-target="#form_delete_line" data-toggle="modal"><img class="min-w-[20px] max-w-[20px]" src="./vendor/img/delete.png"></button>
            </div>
        </td>
    </tr>
<?php
}
