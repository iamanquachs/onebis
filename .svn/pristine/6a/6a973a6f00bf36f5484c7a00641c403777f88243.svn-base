<?php
include('__include_connect.php');
require("../../modules/baocaoClass.php");

$db = new baocao();
$mshs = $_COOKIE['mshs'];
$msdv = $_POST['msdv'];
$loai = $_POST['loai'];
$tungay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['tungay'])));
$denngay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['denngay'])));
$stt = 1;
$tongtiennhap = 0;
$tongsl = 0;
$tongdoanhthu = 0;
$tonglaigop = 0;
if ($_POST['loai_baocao'] == 'HHDV') {
    $list = $db->baocao_hanghoa_dichvu($mshs, $msdv, $loai, $tungay, $denngay);
} else {
    $list = $db->baocao_khachhang_hanghoa($mshs, $msdv, $loai, $tungay, $denngay);
}
foreach ($list as $r) {
    $tongtiennhap += $r->gianhap;
    $tongsl += $r->sl;
    $tongdoanhthu += $r->doanhthu;
    $tonglaigop += $r->laigop;
?>
    <tr class="active_items item_line border-b border-dashed border-[#ffffff40] items" onclick='active_item(this)'>
        <th class=" px-4 py-2 text-center font-thin"><?= $stt++ ?></th>
        <th class="search_key px-4 py-2 text-left font-thin"><?= $r->tenhh ?></th>
        <th class=" px-4 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($r->gianhap)) ?></th>
        <th class=" px-4 py-2 font-thin text-center "><?= str_replace(',', '.', number_format($r->sl)) ?></th>
        <th class=" px-4 py-2 font-thin  text-right text-lg"><?= str_replace(',', '.', number_format($r->doanhthu)) ?></th>
        <th class=" px-4 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($r->laigop)) ?></th>
        <th class=" px-4 py-2 font-thin text-left max-w-[400px] flex-wrap"><?= $r->khachhang ?></th>
        <th class=" px-4 py-2 font-thin text-center"><?= $r->dotuoi ?></th>
        <th class=" px-4 py-2 font-thin text-center"><?= $r->msdv ?></th>
    </tr>

<?php
} ?>

<tr class="active_items item_line border-b border-dashed border-[#ffffff40] text-[#edf74b]" onclick='active_item(this)'>
    <th colspan="2" class=" px-4 py-2 text-right font-thin">Tổng cộng</th>
    <th class=" px-4 py-2 font-thin text-right "><?= str_replace(',', '.', number_format($tongtiennhap)) ?></th>
    <th class=" px-4 py-2 font-thin text-center text-lg"><?= str_replace(',', '.', number_format($tongsl)) ?></th>
    <th class=" px-4 py-2 font-thin  text-right text-lg"><?= str_replace(',', '.', number_format($tongdoanhthu)) ?></th>
    <th class=" px-4 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($tonglaigop)) ?></th>
    <th class=" px-4 py-2 font-thin text-center"></th>
    <th class=" px-4 py-2 font-thin text-center"></th>
    <th class=" px-4 py-2 font-thin text-center"></th>
</tr>