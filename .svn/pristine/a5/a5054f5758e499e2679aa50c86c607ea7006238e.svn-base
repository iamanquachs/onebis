<?php
include('__include_connect.php');
require("../../modules/nhanvienClass.php");

$db = new nhanvien();
$mshs = $_COOKIE['mshs'];
$msdn = $_POST['msdn'];
$msdv = $_COOKIE['msdv'];
$list = $db->load_chucnang_dacap($mshs, $msdn, $msdv);
$stt = 1;
foreach ($list as $r) {
?>
    <tr class="hover:bg-[#eac7f5] hover:cursor-pointer items border-b border-dashed border-[#cfcdcd]" ondblclick="delete_chucnang('<?= $r->manghiepvu ?>')">
        <td class="text-center px-4 py-2"><?= $stt++ ?></td>
        <td class="text-left px-4 py-2"><?= $r->tenmenu ?></td>
        <td class="search_key text-left px-4 py-2"><?= $r->tennghiepvu ?></td>

    </tr>
<?php
}
