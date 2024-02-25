<?php
include('__include_connect.php');
require("../../modules/tiepnhanClass.php");

$db = new tiepnhan();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$stt = 1;
$rand = rand(1000, 9999);
$list = $db->load_khachdat($mshs, $msdv);
foreach ($list as $r) {
?>
    <tr class="active_items item_line items border-b border-dashed border-[#ffffff40]" onclick='active_item(this)'>
        <td class=" px-4 py-2 text-center font-thin"><?= $stt++ ?></td>
        <td class="td_thoigian px-4 py-2 font-thin text-center"><?= $r->thoigian ?></td>
        <td class="input_thoigian px-4 py-2 font-thin text-center hidden">
            <div class="flex items-end">
                <input id="ngaydat_edit_<?= $rand ?>" data-date-format="dd/mm/yyyy" class="ngaydat_edit form-control text-center border-b bg-transparent max-w-[100px]" type="text" value="<?= $r->ngaydat ?>">
                <span class="input-group-addon"></span>
                <input class="gio_edit border-b bg-transparent max-w-[100px]" type="time" value="<?= $r->thoigian ?>">
            </div>
        </td>
        <td class=" px-4 py-2 font-thin text-left"><?= $r->tenkh ?></td>
        <td class=" px-4 py-2 font-thin text-center"><?= $r->ngaysinh . ' (' . $r->tuoi . ' tuổi)' ?></td>
        <td class=" px-4 py-2 font-thin text-center"><?= $r->sodienthoai ?></td>
        <td class=" px-4 py-2 font-thin text-center"><?= $r->gioitinh ?></td>
        <td class=" px-4 py-2 font-thin text-left"><?= $r->diachi ?></td>

        <td class="td_tuvan px-4 py-2 font-thin text-center"><?= $r->tuvan ?></td>
        <td class="input_tuvan px-4 py-2 font-thin text-center hidden"><input class="border-b bg-transparent " value="<?= $r->tuvan ?>"></td>
        <td class=" px-4 py-2 font-thin">
            <div class="flex gap-3 items-center justify-center">
                <button onclick="open_tiepnhan_khachdat('<?= $r->soct ?>','<?= $r->tenkh ?>','<?= $r->sdt ?>','<?= $r->ngaysinh ?>','<?= $r->diachi ?>')">
                    <img class="min-w-[24px] max-w-[24px] min-h-[24px] max-h-[24px]" src='vendor/img/arrow_right.png' title="Tiếp nhận">
                </button>
                <button class="btn_edit" onclick="open_edit_khachdat(this)">
                    <img class="min-w-[24px] max-w-[24px] min-h-[24px] max-h-[24px]" src='vendor/img/edit.png' title="Chỉnh sửa">
                </button>
                <button class="btn_save hidden" onclick="edit_khachdat(this,'<?= $r->soct ?>','<?= $r->sdt ?>')">
                    <img class="min-w-[24px] max-w-[24px] min-h-[24px] max-h-[24px]" src='vendor/img/check24.png' title="Chỉnh sửa">
                </button>
                <button onclick="open_delete_khachdat('<?= $r->soct ?>','<?= $r->tenkh ?>','<?= $r->sdt ?>')">
                    <img class="min-w-[24px] max-w-[24px] min-h-[24px] max-h-[24px]" src='vendor/img/delete.png' title="Xóa khách đặt">
                </button>
            </div>
        </td>
    </tr>
    <script>
        $(document).ready(function() {
            var dateToday = new Date();
            $("#ngaydat_edit_<?= $rand ?>").datepicker({
                autoclose: true,
                todayHighlight: true,
            });
        });
    </script>
<?php
} ?>