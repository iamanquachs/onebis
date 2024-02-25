<?php
include('__include_connect.php');
require("../../modules/donviClass.php");

$db = new donvi_control();
$mshs = $_POST['mshs'];
if ($mshs == '') {
    $mshs = $_COOKIE['mshs'];
}
$msdv = $_POST['msdv'];
if ($msdv == '') {
    $msdv = $_COOKIE['msdv'];
}
$stt = 1;
$list = $db->load_nhatky_giahan($mshs, $msdv);
foreach ($list as $r) { ?>
    <tr class="text-black border-b border-dashed border-[#ddd]">
        <td class="font-thin text-center px-4 py-2 "><?= $r->ngaykichhoat ?></td>
        <td class="font-thin text-center px-4 py-2 "><?= $r->sonam ?></td>
        <td class="font-thin text-center px-4 py-2 "><?= $r->sothangkm ?></td>
        <td class="font-thin text-center px-4 py-2 "><?= $r->ngayhethan ?></td>
        <td class="font-thin text-right px-4 py-2 "><?= str_replace(',', '.', number_format($r->giahopdong)) ?></td>
    </tr>
<?php
}
