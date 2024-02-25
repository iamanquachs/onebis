<?php
include('__include_connect.php');
require("../../modules/nhanvienClass.php");

$db = new nhanvien();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$search = $_POST['search'];
$loai_nv = $_POST['loai_nv'];
$chucvu = $_POST['chucvu'];
$trangthai = $_POST['trangthai'];
$list = $db->load_nhanvien($mshs, $msdv, $search, $loai_nv, $chucvu, $trangthai);
$stt = 1;
foreach ($list as $r) {

?>
    <tr class="active_items item_line border-b border-dashed border-[#ffffff40]" onclick='active_item(this)'>
        <td class=" text-center px-4 py-2"><?= $stt++ ?></td>
        <td class=" text-left px-4 py-2"><?= $r->hoten ?></td>
        <td class=" text-center px-4 py-2 "><?= $r->sodienthoai ?></td>
        <td class=" text-center px-4 py-2 "><?= $r->tenloainv ?></td>
        <td class=" text-center px-4 py-2 "><?= $r->tenchucvu ?></td>
        <td class=" text-center px-4 py-2 "><?= $r->gioitinh ?></td>
        <td class=" text-center px-4 py-2 hidden"><?= $r->diachi ?></td>
        <td class=" text-center px-4 py-2 hidden"><?= $r->email ?></td>
        <td class=" text-center px-4 py-2 "><?= date('d/m/Y', strtotime($r->ngaysinh)) ?></td>
        <td class="  px-4 py-2 ">
            <div class="flex justify-center items-center">
                <?= $r->khoa == 0 ? '<img class="w-[20px]" src="vendor/img/check24.png">' : '<img src="vendor/img/lock.png">' ?>
            </div>
        </td>
        <td class=" text-center px-4 py-2 ">
            <div class="flex justify-center items-center">
                <button onclick="open_modal_capquyen('<?= $r->msdn ?>','<?= $r->hoten ?>')">
                    <img class="min-w-[20px] max-w-[20px] max-h-[20px] min-h-[20px]" src="vendor/img/blue_lock.png">
                </button>
            </div>

        </td>
        <td class=" text-center px-4 py-2 ">
            <div class="flex justify-center items-center gap-3 ">
                <button onclick="open_edit_nhanvien('<?= $r->msdn ?>','<?= $r->hoten ?>','<?= str_replace('.', '', $r->sodienthoai) ?>','<?= $r->loai_nv ?>','<?= $r->mschucvu ?>','<?= $r->gioitinh ?>','<?= $r->diachi ?>','<?= $r->email ?>','<?= date('d/m/Y', strtotime($r->ngaysinh)) ?>','<?= str_replace(',', '.', number_format($r->luongcoban)) ?>','<?= str_replace(',', '.', number_format($r->luongtheogio)) ?>','<?= $r->cccd ?>','<?= $r->loai_hd ?>','<?= $r->khoa ?>','<?= $r->admin ?>')">
                    <img class="min-w-[20px] max-w-[20px] max-h-[20px] min-h-[20px]" src="vendor/img/edit.png">
                </button>
                <button onclick="open_delete_nhanvien('<?= $r->msdn ?>', '<?= $r->hoten ?>')">
                    <img class="min-w-[20px] max-w-[20px] max-h-[20px] min-h-[20px]" src="vendor/img/delete.png">
                </button>
            </div>

        </td>
    </tr>
<?php
}
