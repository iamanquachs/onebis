<?php
include('__include_connect.php');
require("../../modules/khuyenmaiClass.php");

$db = new khuyenmai();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$songayhethan = $_POST['songayhethan'];
$ctkm_tungay = date('Y/m/d', strtotime(str_replace('/', '-', $_POST['ctkm_tungay'])));
$ctkm_denngay = date('Y/m/d', strtotime(str_replace('/', '-', $_POST['ctkm_denngay'])));

// $db->auto_set_hieuluc();
$list = $db->load_header($mshs, $msdv,  $songayhethan,  $ctkm_tungay, $ctkm_denngay);
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
    <tr class="active_items item_line border-b border-dashed border-[#ffffff40] items" onclick=" load_chitiet_ctkm('<?= $r->msctkm ?>','<?= $r->tenctkm ?>');active_item(this)">
        <td style="text-align: center;"><?= $stt++ ?></td>
        <td hidden class="msctkm_td"><?= $r->msctkm ?></td>
        <td class=" px-4 py-2 text-start search_key"><?= $r->tenctkm ?></td>
        <td class="px-4 py-2 ">
            <div class=" justify-center items-center flex gap-3">
                <img onclick="edit_ctkm_header('<?= $khoa ?>','<?= $r->msctkm ?>','<?= $r->tenctkm ?>')" src='<?= $img ?>'>
                <button onclick=" open_delete_form_header('<?= $r->msctkm ?>','<?= $r->tenctkm ?>')"><img class="w-[20px]" src='./vendor/img/delete.png'></button>
            </div>
        </td>
    </tr>
<?php
}
