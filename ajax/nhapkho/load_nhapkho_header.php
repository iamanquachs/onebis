<?php
include('__include_connect.php');
require("../../modules/nhapkhoClass.php");

$db = new NhapKho();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$list = $db->load_nhapkho_header($mshs, $msdv);
$stt = 1;
foreach ($list as $r) {
    $date =   date_create($r->ngayhd) ?>
    <tr id="item_nhapkho_header " class="py-2" onclick="load_chitiet_line(this, '<?= $r->soct ?>')">
        <th scope="row" class="px-4 py-2 text-center"><?= $stt++ ?></th>
        <td class="px-4 py-2 text-center"><?= date_format($date, "d/m/Y") ?></td>
        <td hidden class="soct"><?= $r->soct ?></td>
        <td class="px-4 py-2 text-center"><?= $r->sohd ?></td>
        <td class="px-4 py-2 text-center"><?= $r->tenncc ?></td>
        <td class="px-4 py-2 text-center"><?= str_replace(',', '.', number_format($r->tongcongvat)) ?></td>
    </tr>
<?php
}
