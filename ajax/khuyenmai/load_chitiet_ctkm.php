<?php
include('__include_connect.php');
require("../../modules/khuyenmaiClass.php");

$db = new khuyenmai();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msctkm = $_POST['msctkm'];
$ctkm_tungay = date('Y/m/d', strtotime(str_replace('/', '-', $_POST['ctkm_tungay'])));
$ctkm_denngay = date('Y/m/d', strtotime(str_replace('/', '-', $_POST['ctkm_denngay'])));

$list = $db->load_chitiet_ctkm($mshs, $msdv, $msctkm, $ctkm_tungay, $ctkm_denngay);

$stt = 1;
foreach ($list as $r) {
    switch ($r->khoa) {
        case '0':
            $img = './vendor/img/checked.png';
            $khoa = 1;
            break;
        default:
            $img = './vendor/img/lock.png';
            $khoa = 0;
            break;
    }

?>
    <tr class="active_items item_line border-b border-dashed border-[#ffffff40] items">
        <td class="stt_td px-4 py-2 text-center " style="text-align: center;"><?= $stt++ ?></td>
        <td class="msctkm_td px-4 py-2 text-center "><?= $r->mshh ?></td>
        <td class="px-4 py-2 text-left search_key"><?= $r->tenhh ?></td>
        <td class="px-4 py-2 text-center "><?= $r->ptgiam ?></td>
        <td class="px-4 py-2 text-center "><?= $r->tungay ?></td>
        <td class="px-4 py-2 text-center "><?= $r->denngay ?></td>
        <td class="px-4 py-2  justify-center items-center">
            <img onclick="edit_chitiet_ctkm('<?= $khoa ?>','<?= $r->rowid ?>','<?= $msctkm ?>','<?= $r->tenctkm ?>')" src='<?= $img ?>'>
        </td>
        <td class="px-4 py-2 flex justify-center items-center">
            <button onclick=" open_delete_form('<?= $r->rowid ?>','<?= $msctkm ?>', '<?= $r->tenhh ?>')"><img class="w-[20px]" src='./vendor/img/delete.png'></button>
        </td>
    </tr>
<?php
}
