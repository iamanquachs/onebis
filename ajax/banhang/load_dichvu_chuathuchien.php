<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$sodienthoai = $_POST['sodienthoai'];

$list = $db->load_dichvu_chuathuchien($mshs, $msdv, $sodienthoai);
$stt = 1;
foreach ($list as $r) { ?>
    <tr class="hover:cursor-pointer hover:bg-[#ddd] border-b border-dashed border-[#cfcdcd]">
        <th class="px-4 py-2 font-thin  text-center"><?= $stt++ ?></th>
        <th class="px-4 py-2 font-thin "><?= $r->tenhh ?></th>
        <th class="px-4 font-thin  py-2 flex justify-center">
            <?php if ($r->thuchien == 0) {
            ?>
                <button onclick="check_ngaythuchien('<?= $r->rowid ?>', '<?= $sodienthoai ?>',1)" class="focus:outline-none">
                    <img class='opacity-30' src='vendor/img/checked.png'>
                </button>
            <?php } else { ?>
                <button onclick="check_ngaythuchien('<?= $r->rowid ?>', '<?= $sodienthoai ?>',0)" class="focus:outline-none">
                    <img src='vendor/img/checked.png'>
                </button>
            <?php } ?>
        </th>
    </tr>
<?php
}
