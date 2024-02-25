<?php
include('__include_connect.php');
require("../../modules/memberClass.php");

$db = new member();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$loai = $_POST['loai'];
$stt = 1;
$list = $db->load_member($mshs, $msdv, $loai);
foreach ($list as $r) { ?>
    <tr class="active_items item_line items border-b border-dashed border-[#ffffff40]" onclick='active_item(this)'>
        <th class=" px-4 py-2 text-center font-thin"><?= $stt++ ?></th>
        <th class=" px-4 py-2 text-start font-thin"><?= $r->tennhom ?></th>
        <th class=" px-4 py-2 text-center font-thin "><?= $r->phantramgiam ?></th>
        <th class=" px-4 py-2 text-end font-thin "><?= str_replace(',', '.', number_format($r->sotientu)) ?></th>
        <th class=" px-4 py-2 text-end font-thin "><?= str_replace(',', '.', number_format($r->sotienden)) ?></th>
        <th class=" px-4 py-2 font-thin ">
            <div class="flex gap-3 items-center justify-center">
                <button onclick="open_edit_member('<?= $r->msnhom ?>','<?= $r->tennhom ?>','<?= $r->phantramgiam ?>','<?= $r->sotientu ?>','<?= $r->sotienden ?>')">
                    <img class="min-w-[20px] max-w-[20px]" src='vendor/img/edit.png'>
                </button>
                <button onclick="open_delete_member('<?= $r->msnhom ?>','<?= $r->tennhom ?>')">
                    <img class="min-w-[20px] max-w-[20px]" src='vendor/img/delete.png'>
                </button>
            </div>
        </th>
    </tr>

<?php
}
