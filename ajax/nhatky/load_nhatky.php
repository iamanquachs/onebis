<?php
include('__include_connect.php');
require("../../modules/nhatkyClass.php");

$db = new nhatky();
$mshs = $_COOKIE['mshs'];
$msdn = $_COOKIE['msdn'];
$msdv = $_COOKIE['msdv'];
$loaihinh = $_COOKIE['loaihinh'];
$at_dieutour = $_POST['at_dieutour'];
$list = $db->load_nhatky($mshs, $msdv, $at_dieutour, $msdn, $loaihinh);
$stt = 1;
if ($loaihinh == 'NK') {
    foreach ($list as $r) {

        $item_dichvu = '';
        if ($r->dichvu != '') {

            $dichvu = explode('•', $r->dichvu);
            for ($i = 0; $i < count($dichvu); $i++) {
                $kytu = count($dichvu) == $i + 1 ? "" : " | ";
                $chitiet_dv = explode('-', $dichvu[$i]);
                $trangthai  = "text-[white] hover:text-[#edf74b]";
                if ($chitiet_dv[5] == 2) {
                    $trangthai  = "text-[#83ff20] hover:text-[#edf74b]";
                };
                if ($chitiet_dv[5] == 3) {
                    $trangthai  = "text-[#e88afb] hover:text-[#edf74b]";
                };
                $item_dichvu .= '
            <span class="' . $trangthai . '" onclick="open_addnguoithuchien(`' . $chitiet_dv[0] . '`,`' . $r->soct . '`,`' . $r->ptthuchien . '`,`' . $chitiet_dv[2] . '`,`' . $chitiet_dv[4] . '`)">
            (' . $chitiet_dv[1] . ') ' . $chitiet_dv[3] .  '  
            </span>' . $kytu;
            }
        }
?>
        <tr class="active_items item_line border-b border-dashed border-[#ffffff40]" onclick='active_item(this)'>
            <td class='px-4 py-2 text-center '><?= $stt++ ?></td>
            <td class='px-4 py-2 text-left whitespace-nowrap'>
                <?= $r->tenkh ?>
            </td>
            <td class='px-4 py-2 text-center'><?= $r->dotuoi  ?></td>

            <td class='px-4 py-2 text-left max-w-[300px] min-w-[300px]'><?= $item_dichvu  ?></td>

            <td class="px-4 py-2 text-left whitespace-nowrap">
                <?php
                $list_nguoithuchien = $db->load_nguoithuchien($mshs, $msdv, $r->rowid);
                foreach ($list_nguoithuchien as $e) {
                    echo $e->nhanvien; ?>
                <?php
                } ?>
            </td>

            <td class='px-4 py-2  '>
                <div class="flex items-center justify-center">
                    <?php switch ($r->trangthai) {
                        case '0': ?>
                            <img class="w-[24px] h-[24px]" src='vendor/img/uncheck32.png' title="Chờ khám">
                        <?php
                            break;
                        case '1': ?>
                            <img class="w-[24px] h-[24px]" src='vendor/img/wait.png' title="Đã tiếp nhận">
                        <?php
                            break;
                        case '2': ?>
                            <img class="w-[24px] h-[24px]" src='vendor/img/wait.png' title="Đang khám">
                        <?php
                            break;
                        case '3': ?>
                            <img class="w-[24px] h-[24px]" src='vendor/img/lab32.png' title="Dịch vụ">
                        <?php
                            break;
                        case '4': ?>
                            <img class="w-[24px] h-[24px]" src='vendor/img/check24.png' title="Đã khám ">
                        <?php
                            break;
                        default: ?>
                    <?php
                            break;
                    } ?>

                </div>

            </td>
            <td class='px-4 py-2  '>
                <div class="flex items-center justify-center">
                    <div>
                        <img class="mx-2 min-w-[24px] max-w-[24px]" onclick="open_add_rang('<?= $r->soct ?>')" src='vendor/img/rang.png' title="Khám răng">
                    </div>
                    <div>
                        <img class="mx-2 min-w-[24px] max-w-[24px]" onclick="open_add_donthuoc('<?= $r->soct ?>','<?= $r->sodienthoai ?>', '<?= $r->ptgiam ?>', '<?= $r->msctkm ?>', '<?= $r->nhom_kh ?>', '<?= $r->tenkh ?>')" src='vendor/img/donthuoc32.png' title="Chỉ định Đơn thuốc">
                    </div>
                </div>
            </td>
        </tr>
    <?php }
} else {
    foreach ($list as $r) {
        $trangthai  = "text-[white] hover:text-[#edf74b]";
        if ($r->thuchien == 2) {
            $trangthai  = "text-[#83ff20] hover:text-[#edf74b]";
        };
        if ($r->thuchien == 3) {
            $trangthai  = "text-[#e88afb] hover:text-[#edf74b]";
        };
    ?>
        <tr class="active_items item_line border-b border-dashed border-[#ffffff40]" onclick='active_item(this)'>
            <td class='px-4 py-2 text-center '><?= $stt++ ?></td>
            <td class='px-4 py-2 text-left '>
                <?= $r->tenkh ?>
            </td>
            <td class='px-4 py-2 text-left <?= $trangthai ?> '><?= $r->tenhh ?></td>
            <td class='px-4 py-2  '>
                <div class="flex justify-center gap-5 items-center">
                    <img onclick="open_quatrinhdieutri('<?= $r->sodienthoai ?>')" class="min-w-[32px] max-w-[32px]" src='vendor/img/history.png' title=" Lịch sử">
                    <?php switch ($r->thuchien) {
                        case '1': ?>
                            <div>
                                <img onclick="open_addnguoithuchien('<?= $r->rowid ?>','<?= $r->soct ?>','<?= $r->ptthuchien ?>','<?= $r->mslieutrinh ?>','<?= $r->thuchien ?>')" class="mx-2 min-w-[32px] max-w-[32px]" src='vendor/img/uncheck32.png' title="Chờ thực hiện">
                            </div>
                        <?php
                            break;
                        case '2': ?>
                            <div>
                                <img onclick="open_addnguoithuchien('<?= $r->rowid ?>','<?= $r->soct ?>','<?= $r->ptthuchien ?>','<?= $r->mslieutrinh ?>','<?= $r->thuchien ?>')" class="mx-2 min-w-[32px] max-w-[32px]" src='vendor/img/wait32.png' title="Đang thực hiện">
                            </div>
                        <?php
                            break;

                        case '3': ?>
                            <div>
                                <img onclick="open_addnguoithuchien('<?= $r->rowid ?>','<?= $r->soct ?>','<?= $r->ptthuchien ?>','<?= $r->mslieutrinh ?>','<?= $r->thuchien ?>')" class="mx-2 min-w-[32px] max-w-[32px]" src='vendor/img/checked32.png' title="Đã thực hiện">
                            </div> <?php
                                    break;
                            }
                            if ($r->thuchien > 1) {
                                    ?>
                        <div>
                            <img class="mx-2 min-w-[32px] max-w-[32px]" onclick="open_noidung('<?= $r->rowid ?>','<?= $r->soct ?>','<?= $r->mshh ?>','<?= $r->sodienthoai ?>','<?= $r->idchidinh ?>','<?= $r->msdv_lieutrinh ?>')" src='vendor/img/note32.png' title="Ghi chú thực hiện">
                        </div>
                        <?php
                                if ($loaihinh != 'LD') {
                        ?>
                            <div>
                                <img class="mx-2 min-w-[32px] max-w-[32px]" onclick="open_add_donthuoc('<?= $r->soct ?>','<?= $r->sodienthoai ?>', '<?= $r->ptgiam ?>', '<?= $r->msctkm ?>', '<?= $r->nhom_kh ?>', '<?= $r->tenkh ?>', '<?= $r->ms_nguoithan ?>')" src='vendor/img/donthuoc32.png' title="Chỉ định Đơn thuốc">
                            </div>
                        <?php } ?>
                        <?php
                                if ($loaihinh == 'NK') {
                        ?>
                            <div>
                                <img class="mx-2 min-w-[32px] max-w-[32px]" onclick="open_add_rang('<?= $r->soct ?>')" src='vendor/img/rang.png' title="Khám răng">
                            </div>
                        <?php } ?>
                        <div>
                            <img class="mx-2 min-w-[32px] max-w-[32px]" onclick="open_add_dichvu('<?= $r->soct ?>','<?= $r->sodienthoai ?>', '<?= $r->ptgiam ?>', '<?= $r->msctkm ?>', '<?= $r->nhom_kh ?>', '<?= $r->ptthuchien ?>', '<?= $r->tenkh ?>', '<?= $r->ms_nguoithan ?>')" src='vendor/img/lab32.png' title="Chỉ định Dịch vụ">
                        </div>
                    <?php
                            } ?>

                    <div>
                        <img class="mx-2 min-w-[32px] max-w-[32px]" onclick="open_add_hinhanh('<?= $r->rowid ?>', '<?= $r->soct ?>')" src='vendor/img/img_32.png' title="Tải hình lên">
                    </div>
                </div>
            </td>
            <td class="px-4 py-2 text-left">
                <?php
                $list_nguoithuchien = $db->load_nguoithuchien($mshs, $msdv, $r->rowid);
                foreach ($list_nguoithuchien as $e) {
                    echo $e->nhanvien; ?>
                <?php
                } ?>
            </td>
            <td class="px-4 py-2 ">
                <div class="flex justify-center items-center">
                    <?php if ($r->tour_yeucau == '1') { ?>
                        <img class="mx-2 min-w-[20px] max-w-[20px]" src='vendor/img/checked.png'>
                    <?php } ?>
                </div>
            </td>
            <td class="px-4 py-2 text-left">
                <?php
                $list_noidung_yeucau = $db->load_noidung($mshs, $msdv, $r->rowid, $r->sodienthoai, "'MS', 'HD', 'DA'", '');
                foreach ($list_noidung_yeucau as $i) {
                    echo  $i->loai . ': ' . $i->noidung . ' | '; ?>
                <?php
                } ?>
            </td>
        </tr>
<?php
    }
}
