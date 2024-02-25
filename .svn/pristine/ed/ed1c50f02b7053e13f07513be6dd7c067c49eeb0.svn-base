<?php
include('__include_connect.php');
require("../../modules/xuatkhoClass.php");

$db = new xuatkho();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];

$list = $db->load_xuatkho_line($mshs, $msdv, $soct);
$stt = 1;
foreach ($list as $r) {
    $date = date_create($r->handung); ?>
    <tr class="active_items item_line border-b border-dashed border-[#ffffff40]" onclick='active_item(this)'>
        <td scope="col" class="px-4 py-2 text-center"><?= $stt++ ?></td>
        <td class="mshh_line_td" hidden><?= $r->mshh ?></td>
        <td class="msctkm_line_td" hidden><?= $r->msctkm ?></td>
        <td class="tenhh_line_td px-4 py-2 text-center" style="text-align: left;" scope="col"><?= $r->auto_post ? "<span style='color:red'>(KM thêm) </span>" . $r->tenhh : $r->tenhh ?></td>
        <td class="dvt_line_td px-4 py-2 text-center" scope="col"><?= $r->dvt ?></td>
        <td class="solo_line_td px-4 py-2 text-center" scope="col"><?= $r->solo ?></td>
        <td class="dvt_line_td px-4 py-2 text-center" scope="col"><?= $r->handung ?></td>
        <td class="ptgiam_line_td px-4 py-2 text-center" scope="col"><?= $r->ptgiam ?></td>
        <td class="giaban_line_td px-4 py-2 text-end" scope="col"><?= str_replace(',', '.', number_format($r->giaban)) ?></td>
        <td class="soluong_line_td px-4 py-2 text-center" scope="col"><?= $r->soluong ?></td>
        <td class="thanhtien_line_td px-4 py-2 text-end" scope="col"><?= str_replace(',', '.', number_format($r->thanhtienvat)) ?></td>
        <td class="px-4 py-2 flex justify-center items-center" onclick="open_modal_delete('<?= $soct ?>','<?= $r->rowid ?>', '<?= $r->tenhh ?>')" scope="col"><img class="min-w-[20px] max-w-[20px]" src='./vendor/img/delete.png'></td>
    </tr>
<?php
}
