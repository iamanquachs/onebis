<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$idchidinh = $_POST['idchidinh'];
$mslieutrinh = $_POST['mslieutrinh'];
$list_lieutrinh = $db->load_chitiet_hanghoa($msdv, $soct, $idchidinh, $mslieutrinh);
$stt = 1;
foreach ($list_lieutrinh as $r) {
?>
    <tr class=" item_line hover:bg-[#ddd] hover:cursor-pointer">
        <td class='px-4 py-2 text-start'><?= $stt++ ?></td>
        <td class=' px-4 py-2  gap-3 text-left flex'>
            <?= $r->tenhh ?>
        </td>
        <td class=' px-4 py-2  gap-3 text-center'><?= $r->soluong ?> </td>
        <td class='px-4 py-2 text-end'><?= str_replace(',', '.', number_format($r->thanhtien)) ?></td>
    </tr <?php
        }
