<?php
include('__include_connect.php');
require("../../modules/nhanvienClass.php");

$db = new nhanvien_sv();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$list = $db->load_chucnang($mshs, $msdv);
$stt = 1;
foreach ($list as $r) {

?>
    <tr class="hover:bg-[#ffc8ff] hover:cursor-pointer item_line" onclick='active_item(this)'>
        <td class="border-x text-center px-4 py-2"><?= $stt++ ?></td>
        <td class="border-x text-left px-4 py-2"><?= $r->tennghiepvu ?></td>

    </tr>
<?php
}
