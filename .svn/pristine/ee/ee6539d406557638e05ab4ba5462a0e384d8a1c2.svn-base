<?php
include('__include_connect.php');
require("../../modules/nhatkyClass.php");

$db = new nhatky();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$sodienthoai = $_POST['sodienthoai'];

$list = $db->quatrinhdieutri($mshs, $msdv, $sodienthoai);
$stt = 1;
foreach ($list as $r) {
?>
    <tr class="item_line text-black hover:bg-[#693b85] hover:text-white hover:cursor-pointer" onclick="open_noidung_quatrinhdieutri('<?= $r->mshh ?>','<?= $r->sodienthoai ?>')">
        <td class='px-4 py-2 text-center'><?= $stt++ ?></td>
        <td class='noidung_edit px-4 py-2 text-left '><?= $r->tenhh ?></td>
        <td class='noidung_edit px-4 py-2 text-center '><?= $r->soluong ?></td>
    </tr>
<?php
}
