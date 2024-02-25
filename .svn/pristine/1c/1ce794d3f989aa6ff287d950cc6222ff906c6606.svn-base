<?php
include('__include_connect.php');
require("../../modules/quanlytaisanClass.php");

$db = new quanlytaisan();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$tenhh = $_POST['tenhh'];
$list = $db->find_hanghoa($mshs, $msdv, $tenhh);
$stt = 1;

foreach ($list as $r) {
?>
    <tr class="hover:cursor-pointer hover:bg-[#ddd]  border-b border-dashed border-[#ffffff40]" onclick='chon_hanghoa("<?= $r->mshh ?>","<?= $r->tenhh ?>","<?= $r->toncuoi ?>")'>
        <td class=" text-center px-4 py-2"><?= $stt++ ?></td>
        <td class="text-left px-4 py-2 ">
            <?= $r->tenhh ?>
        </td>
    </tr>
<?php
}
