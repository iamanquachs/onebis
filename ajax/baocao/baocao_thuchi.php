<?php
include('__include_connect.php');
require("../../modules/baocaoClass.php");

$db = new baocao();
$mshs = $_COOKIE['mshs'];
$msdn = $_COOKIE['msdn'];
$tungay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['tungay'])));
$denngay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['denngay'])));
$msdv = $_POST['msdv'];
$khoanmuc = $_POST['khoanmuc'];
$nguoilap = $_POST['nguoilap'];
$stt = 1;
$list = $db->baocao_thuchi($mshs, $msdv, $msdn, $tungay, $denngay, $khoanmuc, $nguoilap);
foreach ($list as $r) {
    if ($r->loai == 1) {
        $dauky = $r->dauky;
?>
        <tr class="active_items item_line" onclick='active_item(this)'>
            <td class="px-4 py-2 text-right text-[#ffff00] text-lg" colspan="11">Đầu kỳ: <?= str_replace(',', '.', number_format($dauky)) ?></td>
        </tr>
    <?php
    } else {
        $thu = $r->thu;
        $chi = $r->chi;
        $dauky = ($dauky) + ($thu) - ($chi);
    ?>

        <tr class="active_items item_line border-b border-dashed border-[#ffffff40] items " onclick='active_item(this)'>
            <td class="px-4 py-2 text-center "><?= $stt++ ?></td>
            <td class="px-4 py-2 text-start">
                <p class="text-center"><?= $r->ngay ?></p>
            </td>
            <td class="px-4 py-2 text-start"><?= $r->soct ?></td>
            <td class="search_key px-4 py-2 text-start"><?= $r->hoten ?></td>
            <td class="search_key px-4 py-2 text-start tablet:min-w-[150px]"><?= $r->noidung ?></td>
            <td class="px-4 py-2 text-start  tablet:min-w-[150px]"><?= $r->tenloai ?></td>
            <td class="search_key px-4 py-2 text-start"><?= $r->tennv ?></td>
            <td class="px-4 py-2 text-end text-lg"><?= str_replace(',', '.', number_format($thu)) ?></td>
            <td class="px-4 py-2 text-end text-lg"><?= str_replace(',', '.', number_format($chi)) ?></td>
            <td class="px-4 py-2 text-end text-lg"><?= str_replace(',', '.', number_format($dauky)) ?></td>
            <td class="search_key px-4 py-2 text-center"><?= $r->msdv ?></td>
        </tr>
<?php
    }
}
