<?php
include('__include_connect.php');
require("../../modules/xuatkhoClass.php");

$db = new xuatkho();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$tungay = $_POST['tungay'];
$denngay = $_POST['denngay'];
$loaixuat = $_POST['loaixuat'];

$list = $db->load_xuatkho_header($mshs, $msdv, $tungay, $denngay, $loaixuat);
foreach ($list as $r) {
    $dathanhtoan = str_replace(',', '.', number_format($r->dathanhtoan));
    $conno = ($r->tongcongvat) - ($r->dathanhtoan);
?>
    <tr class="active_items item_line border-b border-dashed border-[#ffffff40]" onclick="active_item(this),load_chitiet_line(this, '<?= $r->soct ?>', '<?= $r->tenkhachhang ?>')">
        <td class="stt_td px-4 py-2 text-center"> <?= $r->stt ?></td>
        <td class="soct_td " style="display: none;"><?= $r->soct ?></td>
        <td class="mskh_td" style="display: none;"><?= $r->mskh ?></td>
        <td class="conno_td" style="display: none;"><?= str_replace(',', '.', number_format($conno)) ?></td>
        <td class="sohd_td" style="display: none;"><?= $r->sohd ?></td>
        <td class="soctdh_td" style="display: none;"><?= $r->soctdh ?></td>
        <td class="ngay_td px-4 py-2 text-center"> <?= $r->ngaygio ?></td>
        <td class=" px-4 py-2 text-center"> <?= $r->tenloai ?></td>
        <td class=" px-4 py-2 text-center"><?= str_replace(',', '.', number_format($r->tongcongvat)) ?></td>
        <td class="dathanhtoan" style="display: none;"><?= $r->dathanhtoan ?></td>
    </tr>
<?php
}
