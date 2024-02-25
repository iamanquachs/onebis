<?php
include('__include_connect.php');
require("../../modules/xuatkhoClass.php");

$db = new xuatkho();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];

$list = $db->load_xuatkho_line($mshs, $msdv, $soct);
$stt = 1;
foreach ($list as $r) {
    $date = date_create($r->handung); ?>
    <tr class="hover:bg-[#693b85] hover:cursor-pointer">
        <td class="stt_td px-4 py-2 text-center"><?= $stt++ ?></td>
        <td class="msnpp_td px-4 py-2 text-center"><?= $r->msncc ?></td>
        <td class="mshh_td px-4 py-2 text-center"> <?= $r->mshh ?></td>
        <td class="left px-4 py-2 text-start"><?= $r->tenhh ?></td>
        <td class="dvt_td px-4 py-2 text-center"><?= $r->dvt ?></td>
        <td class="right px-4 py-2 text-center"><?= $r->soluong ?></td>
        <td class="right px-4 py-2 text-center"><?= $r->ptgiam ?></td>
        <td class="right px-4 py-2 text-end"><?= str_replace(',', '.', number_format($r->thanhtienvat)) ?></td>
    </tr>
<?php
}
