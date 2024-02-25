<?php
include('__include_connect.php');
require("../../modules/quanlytaisanClass.php");

$db = new quanlytaisan();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$mshh = $_POST['mshh'];
$list = $db->load_chitiet_quanly_taisan($mshs, $msdv, $mshh);
$stt = 1;
foreach ($list as $r) {
?>
    <tr class=" items border-b border-dashed border-[#ffffff40]" onclick='active_item(this)'>
        <td class=" text-center px-4 py-2"><?= $stt++ ?></td>
        <td class="text-center px-4 py-2 ">
            <?= $r->ngaymua ?>
        </td>
        <td class="text-center px-4 py-2 "><?= $r->ngayxuat ?></td>
        <td class="text-center px-4 py-2 "><?= $r->nguoixuat ?> </br></td>
        <td class="text-center px-4 py-2 "><?= $r->msdonvi_xuat ?></td>
        <td class="text-center px-4 py-2 "><?= $r->ngaynhan ?></td>
        <td class="text-center px-4 py-2 "><?= $r->tenhh ?></td>
        <td class="text-center px-4 py-2 "><?= $r->soluong ?></td>
        <td class="text-center px-4 py-2 "><?= $r->thoihan_khauhao ?></td>
    </tr>
<?php
}
