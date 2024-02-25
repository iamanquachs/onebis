<?php
include("../../../includes/config.php");
include("../../../includes/database.php");
include("../../../includes/database_sv.php");
require("../../../modules/dichvuClass.php");

$db = new dichvu();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdichvu = $_POST['msdichvu'];
$list = $db->load_lieutrinh($mshs, $msdv, $msdichvu);
$stt = 1;
$firt_thutu = '';
$last_thutu = '';
if (count($list) != 0) {
    $firt_thutu = $list[0]->thutu;
    $last_thutu = end($list)->thutu;
}
foreach ($list as $r) {
    $load_thanhtien = $db->load_thanhtien($mshs, $msdv, $msdichvu, $r->mslieutrinh);
    $thanhtien = $load_thanhtien[0]->thanhtien;
?>

    <tr id="<?= $r->mslieutrinh ?>" class="item_lieutrinh hover:cursor-pointer hover:bg-[#693b85] hover:text-white">
        <td class=" px-4 py-2 text-center" onclick="chitiet_lieutrinh(this,'<?= $msdichvu ?>','<?= $r->mslieutrinh ?>','<?= $r->tenlieutrinh ?>')">
            <p class=" bg-[#daaaff] rounded-full"><?= $stt++ ?></p>
        </td>
        <td class=" px-4 py-2 hover:cursor-pointer tenlieutrinh_td" onclick="chitiet_lieutrinh(this,'<?= $msdichvu ?>','<?= $r->mslieutrinh ?>','<?= $r->tenlieutrinh ?>')"><?= $r->tenlieutrinh ?></td>
        <td class=" px-4 py-2 hover:cursor-pointer tenlieutrinh_input hidden"><input class="text-black max-w-[100px] border-b" value="<?= $r->tenlieutrinh ?>" /></td>
        <td class=" px-4 py-2 text-center songay_td" onclick="chitiet_lieutrinh(this,'<?= $msdichvu ?>','<?= $r->mslieutrinh ?>','<?= $r->tenlieutrinh ?>')"><?= $r->songay ?></td>
        <td class=" px-4 py-2 hover:cursor-pointer songay_input hidden"><input class="text-black max-w-[50px] border-b" value="<?= $r->songay ?>" /></td>
        <td class=" px-4 py-2 text-end" onclick="chitiet_lieutrinh(this,'<?= $msdichvu ?>','<?= $r->mslieutrinh ?>','<?= $r->tenlieutrinh ?>')"><?= str_replace(',', '.', number_format($thanhtien)) ?></td>
        <td class=" py-2 ">
            <div class="z-10 flex gap-3 items-center justify-end ">
                <button class="focus:outline-none btn_show_edit" onclick="open_edit_lieutrinh(this)">
                    <img class="max-w-[20px] min-w-[20px]" src="vendor/img/edit.png" title="Chỉnh liệu trình">
                </button>
                <button class="focus:outline-none btn_edit hidden" onclick="edit_lieutrinh(this,'<?= $r->mslieutrinh ?>','<?= $msdichvu ?>')">
                    <img class="max-w-[20px] min-w-[20px]" src="vendor/img/checked.png" title="Chỉnh liệu trình">
                </button>
                <button class="focus:outline-none" onclick="open_copy_lieutrinh('<?= $msdichvu ?>','<?= $r->mslieutrinh ?>','<?= $r->tenlieutrinh ?>')">
                    <img class="max-w-[20px] min-w-[20px]" src="vendor/img/copy.png" title="Sao chép liệu trình">
                </button>
                <button class="focus:outline-none" onclick="open_delete_lieutrinh('<?= $r->mslieutrinh ?>','<?= $r->tenlieutrinh ?>')">
                    <img class="max-w-[20px] min-w-[20px]" src="vendor/img/delete.png" title="Xóa liệu trình">
                </button>
                <div class="flex flex-col">
                    <?php if ($firt_thutu != $r->thutu) { ?>
                        <div onclick="move_lieutrinh('<?= $msdichvu ?>','<?= $r->mslieutrinh ?>','<?= $r->thutu ?>', 'len')" class="hover:bg-slate-400 hover:cursor-pointer rounded-md">
                            <img class="max-w-[16px] min-w-[16px]" src="vendor/img/arrow-down.png">
                        </div>
                    <?php }
                    if ($last_thutu != $r->thutu) { ?>
                        <div onclick="move_lieutrinh('<?= $msdichvu ?>','<?= $r->mslieutrinh ?>','<?= $r->thutu ?>', 'xuong')" class="hover:bg-slate-400 hover:cursor-pointer rounded-md">
                            <img class="max-w-[16px] min-w-[16px]" src="vendor/img/arrow-top.png">
                        </div>
                    <?php }  ?>

                </div>
            </div>


        </td>
    </tr>
<?php
}
