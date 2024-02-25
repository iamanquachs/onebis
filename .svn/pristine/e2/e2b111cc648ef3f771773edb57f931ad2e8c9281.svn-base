<?php
include('__include_connect.php');
require("../../modules/khuyenmaiClass.php");

$db = new khuyenmai();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$tensanpham = $_POST['tensanpham'];
$stt = 1;
$list = $db->find_hanghoa($mshs, $msdv, $tensanpham);
foreach ($list as $r) { ?>
    <tr class='hover:bg-green-300 hover:cursor-pointer' onclick="add_hanghoa('<?= $r->mshh ?>','<?= $r->tenhh ?>')" class="item_lieutrinh">
        <td class=" px-4 py-2"><?= $stt++ ?></td>
        <td class=" px-4 py-2"><?= $r->tenhh ?></td>

    </tr>
<?php
}
