<?php
include('__include_connect.php');
require("../../modules/baocaoClass.php");

$db = new baocao();
$mshs = $_COOKIE['mshs'];
$msdv = $_POST['msdv'];
$tungay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['tungay'])));
$denngay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['denngay'])));
$stt = 1;

$list = $db->baocao_hanghoa_dichvu_chuadoanthu($mshs, $msdv, $tungay, $denngay);

foreach ($list as $r) {
?>
    <tr class="active_items item_line border-b border-dashed border-[#ffffff40] items" onclick='active_item(this)'>
        <th class=" px-4 py-2 text-center font-thin"><?= $stt++ ?></th>
        <th class=" px-4 py-2 text-left font-thin hidden"><?= $r->msdv ?></th>
        <th class="search_key px-4 py-2 font-thin text-left max-w-[400px] flex-wrap"><?= $r->tendichvu ?></th>
        <th class=" px-4 py-2 font-thin text-center"><?= $r->msdv ?></th>
    </tr>
<?php
} ?>