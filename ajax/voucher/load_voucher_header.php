<?php
include('__include_connect.php');
require("../../modules/voucherClass.php");

$db = new voucher();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$tungay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['tungay'])));
$denngay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['denngay'])));
$valueSearch = $_POST['valueSearch'];
$locloai = $_POST['locloai'];
$nhom = $_POST['nhom'];
$stt = 1;
$list = $db->load_voucher($mshs, $msdv, $valueSearch, $tungay, $denngay, $locloai, $nhom, 'header', '');
foreach ($list as $r) { ?>
    <tr class="active_items item_line" onclick="active_item(this),open_chitiet_voucher('<?= $r->msvoucher ?>','<?= $r->tenvoucher ?>')">
        <td class=" px-4 py-2 text-center font-thin"><?= $stt++ ?></th>
        <td class=" px-4 py-2 text-center font-thin"><?= $r->ngay ?></th>
        <td class=" px-4 py-2 font-thin text-left"><?= $r->tenvoucher ?></th>
    </tr>
<?php
}
