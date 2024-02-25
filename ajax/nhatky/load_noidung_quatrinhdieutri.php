<?php
include('__include_connect.php');
require("../../modules/nhatkyClass.php");

$db = new nhatky();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$sodienthoai = $_POST['sodienthoai'];
$mshh = $_POST['mshh'];

$list = $db->noidung_quatrinhdieutri($mshs, $msdv, $sodienthoai, $mshh);
$stt = 1;
foreach ($list as $r) {
?>
    <tr class="item_line text-black hover:bg-[#693b85] hover:text-white hover:cursor-pointer" >
        <td class='px-4 py-2 text-center'><?= $stt++ ?></td>
        <td class=' px-4 py-2 text-left'><?= $r->noidung ?></td>
        <td class=' px-4 py-2 text-center '><?= $r->loai ?></td>
    </tr>
<?php
}
