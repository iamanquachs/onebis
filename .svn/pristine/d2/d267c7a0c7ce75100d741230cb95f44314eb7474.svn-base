<?php
include('__include_connect.php');
require("../../modules/nhapkhoClass.php");
require("../../modules/xuatkhoClass.php");

$db_xk = new xuatkho();
$db = new NhapKho();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$loai = $_POST['loai'];
$tungay = $_POST['tungay'];
$denngay = $_POST['denngay'];
$db_xk->lay_tonkho_baocao($mshs, $msdv, date('Y-m-d'), date('Y-m-d'), 'CN');
$list = $db->nhapkho_filter($mshs, $msdv, $loai, $tungay, $denngay);
$stt = 1;
foreach ($list as $r) {
    $date =   date_create($r->ngayhd);
    $dathanhtoan =  $r->dathanhtoan;
    $conno = str_replace(',', '.', number_format($r->tongcongvat - $r->dathanhtoan));
    $setdathanhtoan = '<td onclick="open_post_thuchi(this)" class="px-4 py-2 text-center"><span class="text-[yellow]" >' . str_replace(',', '.', number_format($dathanhtoan)) . '</span></td>';
    if ($r->tongcongvat == $dathanhtoan) {
        $setdathanhtoan = '<td class="px-4 py-2 flex justify-center"><img  src="vendor/img/check16.png"></td>';
    }
?>
    <tr class="active_items item_line items border-b border-dashed border-[#ffffff40]" onclick='active_item(this)'>
        <td scope="row" class="px-4 py-2 text-center" onclick="load_chitiet_line(this, '<?= $r->soct ?>','<?= $r->tenncc ?> <?= str_replace(',', '.', number_format($r->tongcongvat)) ?>' )"><?= $stt++ ?></td>
        <td onclick="load_chitiet_line(this, '<?= $r->soct ?>','<?= $r->tenncc ?> <?= str_replace(',', '.', number_format($r->tongcongvat)) ?>' )" class="px-4 py-2 text-center"><?= date_format($date, "d/m/Y") ?></td>
        <td hidden class="soct px-4 py-2 text-center"><?= $r->soct ?></td>
        <td hidden class="conno"><?= $conno ?></td>
        <td hidden class="msncc"><?= $r->msncc ?></td>
        <td hidden class="dathanhtoan"><?= $dathanhtoan ?></td>
        <td class="search_key sohd px-4 py-2 text-center" onclick="load_chitiet_line(this, '<?= $r->soct ?>','<?= $r->tenncc ?> <?= str_replace(',', '.', number_format($r->tongcongvat)) ?>' )" class="sohd px-4 py-2 text-center"><?= $r->sohd ?></td>
        <td onclick="load_chitiet_line(this, '<?= $r->soct ?>','<?= $r->tenncc ?> <?= str_replace(',', '.', number_format($r->tongcongvat)) ?>' )" class="search_key ten_ncc px-4 py-2 text-start"><?= $r->tenncc ?></td>
        <td onclick="load_chitiet_line(this, '<?= $r->soct ?>','<?= $r->tenncc ?> <?= str_replace(',', '.', number_format($r->tongcongvat)) ?>' )" class="px-4 py-2 text-end "><?= str_replace(',', '.', number_format($r->tongcongvat)) ?></td>
        <?= $setdathanhtoan ?>
    </tr>
<?php
}
