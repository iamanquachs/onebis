<?php
include('__include_connect.php');
require("../../modules/tiepnhanClass.php");
require("../../modules/banhangClass.php");

$db_bh = new banhang();
$db = new tiepnhan();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$valueSearch = $_POST['valueSearch'];
$stt = 1;

$list = $db->load_benhnhan($mshs, $msdv, $valueSearch);

foreach ($list as $r) {
    $hidden =  $valueSearch == '' ? 'hidden' : '';
    $conno = $r->conno;
    $ham_thutien = '';
    if ($conno > 0) {
        $ham_thutien = "open_modal_thutien('$r->soct', $r->tongcong, $r->dathanhtoan,'$r->sodienthoai', '$r->tenkh')";
    }

?>
    <tr class="active_items item_line items border-b border-dashed border-[#ffffff40]" onclick='active_item(this)'>
        <td class=" px-4 py-2 font-thin">
            <div class="flex items-center justify-center">
                <?php switch ($r->trangthai) {
                    case '1': ?>
                        <img class="min-w-[20px] max-w-[20px] min-h-[20px] max-h-[20px]" src='vendor/img/wait.png' title="Đang khám">
                    <?php
                        break;
                    case '2': ?>
                        <img class="min-w-[20px] max-w-[20px] min-h-[20px] max-h-[20px]" src='vendor/img/wait.png' title="Đang thực hiện">
                    <?php
                        break;
                    case '3': ?>
                        <img class="min-w-[20px] max-w-[20px] min-h-[20px] max-h-[20px]" src='vendor/img/check24.png' title="Dịch vụ">
                    <?php
                        break;
                    case '4': ?>
                        <img class="min-w-[20px] max-w-[20px] min-h-[20px] max-h-[20px]" src='vendor/img/check24.png' title="Đã khám ">
                    <?php
                        break;
                    default: ?>
                        <img class="min-w-[20px] max-w-[20px] min-h-[20px] max-h-[20px]" src='vendor/img/call.png' title="Chờ tiếp nhận">
                <?php
                        break;
                } ?>
            </div>
        </td>
        <td class=" px-4 py-2 text-center font-thin"><?= $stt++ ?></td>
        <td class="<?= $hidden ?> px-4 py-2 font-thin text-center"><?= $r->loai ?></td>
        <td class=" px-4 py-2 font-thin text-center hidden"><?= $r->mskh ?></td>
        <td class=" px-4 py-2 font-thin text-left"><?= $r->tenkh ?></td>
        <td class=" px-4 py-2 font-thin text-left"><?= $r->nguoithan ?></td>
        <td class=" px-4 py-2 font-thin text-center"><?= $r->gioitinh ?></td>
        <td class=" px-4 py-2 font-thin text-center"><?= date('d/m/Y', strtotime(str_replace('/', '-', $r->ngaysinh))) . ' (' . $r->tuoi . ' tuổi)' ?></td>
        <td class=" px-4 py-2 font-thin text-center"><?= $r->sodienthoai ?></td>
        <td class=" px-4 py-2 font-thin text-left phone:min-w-[200px]"><?= $r->diachi ?> </td>

        <td class=" px-4 py-2 font-thin text-center"></td>
        <td class=" px-4 py-2 font-thin text-right"><?= str_replace(',', '.', number_format($r->tongcong)) ?>
        </td>
        <td onclick="<?= $ham_thutien ?>" class=" hover:underline hover:text-[#edf74b] px-4 py-2 font-thin text-right"><?= str_replace(',', '.', number_format($r->conno)) ?>
        </td>

        <td class=" px-4 py-2 font-thin">
            <div class="flex gap-3 items-center justify-center">
                <?php if ($r->trangthai == 0) { ?>
                    <button onclick="open_add_donkham('<?= $r->mskh ?>','<?= $r->tenkh ?>','<?= $r->sdt ?>','<?= $r->diachi ?>','<?= $r->gioitinh ?>','<?= $r->ms_nguoithan ?>')">
                        <img class="min-w-[24px] max-w-[24px] min-h-[24px] max-h-[24px]" src='vendor/img/khambenh.png' title='Đăng ký khám'>
                    </button>
                <?php
                }
                if ($r->vitri == 1) {
                ?>
                    <button onclick="open_chucnang('<?= $r->sdt ?>','<?= $r->soct ?>','<?= $r->tenkh ?>','<?= $r->trangthai ?>','<?= $r->mskh ?>','<?= $r->diachi ?>','<?= $r->gioitinh ?>','<?= $r->nghenghiep ?>','<?= date('d/m/Y', strtotime(str_replace('/', '-', $r->ngaysinh))) ?>')">
                        <img class="min-w-[24px] max-w-[24px] min-h-[24px] max-h-[24px]" src='vendor/img/opt32.png' title='Chức năng'>
                    </button>
                <?php } ?>
                <button onclick="open_lichsu('<?= $r->sdt ?>','<?= $r->tenkh ?>')">
                    <img class="min-w-[24px] max-w-[24px] min-h-[24px] max-h-[24px]" src='vendor/img/history.png' title="Lịch sử">
                </button>
                <?php
                if ($r->vitri == 1) {
                    if ($db->kiemtra_phanquyen_user($msdn, 'CDDV')[0]->msdn > 0) { ?>
                        <button id="btn_chidinh" onclick="open_form_dichvu_dachidinh('<?= $r->sdt ?>','<?= $r->soct ?>','<?= $r->tenkh ?>','<?= $r->ms_nguoithan ?>')">
                            <img class="min-w-[24px] max-w-[24px] min-h-[24px] max-h-[24px]" src='vendor/img/lab32.png' title="Chỉ định dịch vụ">
                        </button>
                        <button onclick="open_form_add_donthuoc('<?= $r->sdt ?>','<?= $r->soct ?>','<?= $r->tenkh ?>','<?= $r->ms_nguoithan ?>','<?= $r->nhom_kh ?>')">
                            <img class="min-w-[24px] max-w-[24px] min-h-[24px] max-h-[24px]" src='vendor/img/donthuoc32.png' title="Chỉ định thuốc">
                        </button>
                <?php
                    }
                }
                ?>
            </div>
        </td>
    </tr>
<?php
}
