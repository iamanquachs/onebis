<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");

$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$msrang = $_POST['msrang'];

$list = $db->load_banhang_line($msdv, $soct, $msrang);
$stt = 1;
foreach ($list as $r) {
    if ($r->mshh != '') {
?>
        <tr class="item_line text-black hover:bg-[#693b85]  hover:cursor-pointer hover:text-white">
            <td class='px-4 py-2 text-center'><?= $stt++ ?></td>
            <td class='px-4 py-2 text-left'><?= $r->tenhh ?></td>
            <td class='px-4 py-2 text-right'><?= str_replace(',', '.', number_format($r->giaban)) ?></td>
            <td class='px-4 py-2 text-right'><?= str_replace(',', '.', number_format($r->ptgiam)) ?></td>
            <td class='px-4 py-2 text-right'><?= str_replace(',', '.', number_format(($r->giaban * $r->ptgiam) / 100)) ?></td>
            <td class='px-4 py-2 text-right'><?= str_replace(',', '.', number_format($r->thanhtien)) ?></td>
            <td class='px-4 py-2 text-center'><?= $r->ngayhen ?></td>

            <td class='px-4 py-2 text-center flex justify-center gap-3'>
                <button>
                    <img class="w-[20px]" onclick="open_delete_dichvu_rang('<?= $r->tenhh ?>','<?= $r->mshh ?>','<?= $r->idchidinh ?>','<?= $soct ?>','<?= $msrang ?>','<?= $r->rowid ?>')" src='vendor/img/delete.png'>
                </button>
            </td>
        </tr>
<?php
    }
}
