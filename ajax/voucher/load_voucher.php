<?php
include('__include_connect.php');
require("../../modules/voucherClass.php");

$db = new voucher();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$tungay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['tungay'])));
$denngay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['denngay'])));
$msvoucher = $_POST['msvoucher'];
$valueSearch = $_POST['valueSearch'];
$locloai = $_POST['locloai'];
$nhom = $_POST['nhom'];
$stt = 1;
$list = $db->load_voucher($mshs, $msdv, $valueSearch, $tungay, $denngay, $locloai, $nhom, 'line', $msvoucher);
foreach ($list as $r) { ?>
    <tr class="active_items item_line items border-b border-dashed border-[#ffffff40]" onclick='active_item(this)'>
        <td class=" px-4 py-2 text-center font-thin"><?= $stt++ ?></td>
        <td class=" px-4 py-2 font-thin text-left"><?= $r->khachhang ?></td>
        <td class=" px-4 py-2 font-thin text-left">
            <?= $r->tennhom ?></td>
        <td class=" px-4 py-2 font-thin  text-right">
            <?= str_replace(',', '.', number_format($r->sotien)) ?></td>
        <td class=" px-4 py-2 font-thin text-center">
            <?= $r->handung ?>
        </td>
        <td class=" px-4 py-2 font-thin text-center flex justify-center">
            <?= $r->trangthai == '1' ? "<img src='vendor/img/check24.png' class='w-[20px]' title='Đã dùng'>" : '' ?>
        </td>
        <td class=" px-4 py-2 font-thin">
            <button onclick="open_delete_voucher('<?= $r->rowid ?>','<?= $r->khachhang ?>')">
                <img class="w-[20px]" src='vendor/img/delete.png'>
            </button>
        </td>
    </tr>
<?php
}
