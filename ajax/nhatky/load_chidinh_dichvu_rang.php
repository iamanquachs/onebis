<?php
include('__include_connect.php');
require("../../modules/nhatkyClass.php");

$db = new nhatky();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$stt = 1;
$list = $db->load_chidinh_dichvu_rang($mshs, $msdv, $soct);
foreach ($list as $r) {
?>
    <tr class="text-[black]  hover:bg-[#ddd] border-b border-dashed border-[#ddd]">
        <td class=" px-4 pt-4 pb-2 text-center font-thin"><?= $stt++ ?></th>
        <td class=" px-4 pt-4 pb-2 text-left font-thin"><?= $r->tenhh ?></td>
        <td class=" px-4 pt-4 pb-2 text-right font-thin"><?= str_replace(',', '.', number_format($r->giaban)) ?></td>
        <td class=" px-4 pt-4 pb-2 text-right font-thin"><?= $r->ptgiam ?></td>
        <td class=" px-4 pt-4 pb-2 text-right font-thin"><?= str_replace(',', '.', number_format($r->giaban * $r->ptgiam / 100)) ?></td>
        <td class=" px-4 pt-4 pb-2 text-right font-thin"><?= str_replace(',', '.', number_format($r->thanhtien)) ?></td>
        <td class=" px-4 pt-4 pb-2 text-center font-thin"><?= $r->ms_rang ?></td>
        <td class=" px-4 pt-4 pb-2 flex justify-center font-thin">
            <div>
                <img class="w-[20px]" onclick="open_delete_dichvu_rang('<?= $r->tenhh ?>', '<?= $r->mshh ?>', '<?= $r->idchidinh ?>', '<?= $soct ?>', '<?= $r->ms_rang ?>', '<?= $r->rowid ?>')" src='vendor/img/delete.png'>
            </div>
        </td>
    </tr>
<?php
}
