<?php
include('__include_connect.php');
require("../../modules/thuchiClass.php");

$db = new thuchi();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$search = $_POST['search'];
$stt = 1;
$list = $db->load_ncc_chuathanhtoan($mshs, $msdv, $search);
foreach ($list as $r) { ?>
    <tr class="text-sm hover:bg-[#ddd] hover:cursor-pointer" onclick="chon_thanhtoan_ncc('<?= $r->soct ?>', '<?= $r->sohd ?>','<?= $r->tenncc ?>','<?= $r->conno ?>')">
        <td class=" px-4 py-2 text-center font-thin"><?= $r->sohd ?></td>
        <td class=" px-4 py-2 font-thin text-left"><?= $r->tenncc ?></td>
        <td class=" px-4 py-2 font-thin text-right"><?= str_replace(',', '.', number_format($r->tongcongvat)) ?></td>
        <td class=" px-4 py-2 font-thin  text-right"><?= str_replace(',', '.', number_format($r->dathanhtoan)) ?></td>
        <td class=" px-4 py-2 font-thin text-right text-[red]"><?= str_replace(',', '.', number_format($r->conno)) ?></td>
    </tr>
<?php
}
