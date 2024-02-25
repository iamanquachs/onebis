<?php
include('__include_connect.php');
require("../../modules/baocaoClass.php");

$db = new baocao();
$mshs = $_COOKIE['mshs'];
$msdv = $_POST['msdv'];
$tungay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['tungay'])));
$denngay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['denngay'])));
$msnv = $_POST['msnv'];
$stt = 1;
$tongdoanhso = 0;
$tonghoahong = 0;
$list = $db->chitiet_baocao_thuchiendichvu($mshs, $msdv, $msnv, $tungay, $denngay);
foreach ($list as $r) {
    $tongdoanhso += $r->doanhso;
    $tonghoahong += $r->hoahong;
    $msdv = $r->msdv;
?>
    <tr class="border-b border-dashed border-[#ddd] ">
        <td class="px-4 py-2 text-center "><?= $stt++ ?></td>
        <td class="search_key px-4 py-2 text-center font-thin"><?= $r->ngay ?></td>
        <td class="search_key px-4 py-2 font-thin text-left"><?= $r->tenhh ?></td>
        <td class=" px-4 py-2 font-thin text-center"><?= $r->thoigian ?></br>(<?= $r->timeht ?>)</td>
        <td class=" px-4 py-2 font-thin  text-right text-lg"><?= str_replace(',', '.', number_format($r->doanhso)) ?></td>
        <td class=" px-4 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($r->hoahong)) ?></td>
        <td class=" px-4 py-2 font-thin text-center"><?= $r->msdv ?></td>
    </tr>
<?php
} ?>
<tr class="font_semi  text-lg">
    <td colspan="4" class="px-4 py-2 text-right ">Tổng cộng</td>
    <td class="search_key px-4 py-2 text-right"><?= str_replace(',', '.', number_format($tongdoanhso)) ?></td>
    <td class="search_key px-4 py-2 text-right"><?= str_replace(',', '.', number_format($tonghoahong)) ?></td>
    <td class=" px-4 py-2 font-thin text-center"><?= $msdv ?></td>
</tr>