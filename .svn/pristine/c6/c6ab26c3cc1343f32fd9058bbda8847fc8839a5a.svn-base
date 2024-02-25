<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");

$db = new banhang();
$msdv = $_COOKIE['msdv'];
$rowid = $_POST['rowid'];
$stt = 1;
$list = $db->load_lichsu_khachang_theo_rowid($msdv, $rowid);
foreach ($list as $r) { ?>
    <tr class="border-b border-dashed border-[#a7a5a540]">
        <th class=" px-4 py-2 text-center font-thin"><?= $stt++ ?></th>
        <th class=" px-4 py-2 text-left font-thin"><?= $r->tenhh ?></th>
        <th class=" px-4 py-2 text-center font-thin"><?= $r->sl ?></th>
        <th class=" px-4 py-2 text-left  font-thin "><?= $r->nhanvien ?></th>
        <th class=" px-4 py-2 text-left  font-thin "><?= $r->yeucau ?></th>
    </tr>
<?php
}
