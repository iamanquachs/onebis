<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");

$db = new banhang();
$msdv = $_COOKIE['msdv'];
$loaihinh = $_COOKIE['loaihinh'];
$search_key = $_POST['search_key'];
$list = $db->load_banhang_header_henkhach($msdv, $search_key);
$stt = 1;
foreach ($list as $r) {
    $conno = $r->conno;
    $ham_thutien = '';
    if ($conno > 0) {
        $ham_thutien = "open_modal_thutien('$r->soct', $r->tongcong, $r->dathanhtoan,'$r->sodienthoai', '$r->tenkh')";
    }
    $item_dichvu = '';
    if ($r->dichvu != '') {

        $dichvu = explode('|', $r->dichvu);
        for ($i = 0; $i < count($dichvu); $i++) {
            $kytu = count($dichvu) == $i + 1 ? "" : " | ";
            $chitiet_dv = explode('/', $dichvu[$i]);
            $list_cut = explode('(', $chitiet_dv[1]);
            $chitiet_item = '';
            if (count($list_cut) > 1) {
                $item =  explode('▪', substr_replace($list_cut[1], "", -1));
                $list = '';
                for ($i = 0; $i < count($item); $i++) {
                    $item_b = explode('▪', $item[$i]);
                    $kytu_b = count($item) == $i + 1 ? "" : " • ";

                    for ($a = 0; $a < count($item_b); $a++) {
                        $list .= '
                    <span class="hover:text-[#edf74b]" onclick="open_add_nguoithuchien(`' . explode('•', $item_b[$a])[0] . '`)">
                    ' . explode('•', $item_b[$a])[1] .  '  
                    </span>' . $kytu_b;
                    }
                }
                $chitiet_item = $list_cut[0] . ' (' . $list . ')|';
            } else {
                $chitiet_item = '
                <span class="hover:text-[#edf74b]" onclick="open_add_nguoithuchien(`' . $chitiet_dv[0] . '`)">
                ' . $chitiet_dv[1] .  '  
                </span>' . $kytu;
            }

            $item_dichvu .= $chitiet_item;
        }
    }

?>
    <tr class="active_items item_line border-b border-dashed border-[#ffffff40] items" onclick='active_item(this)'>
        <td class='px-4 py-2 text-center'><?= $stt++ ?></td>
        <td class=' px-4 py-2 text-center '>
            <div class="flex gap-3 justify-center items-center">
                <?php
                switch ($r->thuchien) {
                    case (0): ?>
                        <button onclick="open_update_banhangline_ngaythuchien('<?= $r->soct ?>','<?= $r->tenkh ?>','henkhach')" class="hover:cursor-pointer">
                            <img class="min-w-[24px] max-w-[24px]" src="vendor/img/call.png" title="Gửi thực hiện">
                        </button>
                    <?php
                        break;
                    case (1): ?>
                        <button onclick="" class="hover:cursor-pointer">
                            <img class="min-w-[24px] max-w-[24px]" src="vendor/img/arrow_right.png" title="Chờ thực hiện">
                        </button>
                    <?php
                        break;

                    case (2): ?>
                        <img class="min-w-[24px] max-w-[24px]" src="vendor/img/wait32.png" title="Đang thực hiện">
                    <?php
                        break;
                    case (3): ?>
                        <img onclick="open_khachhang_danhgia(this,'<?= $r->soct ?>','<?= $r->sdt ?>','<?= $r->tennv ?>','<?= $r->dichvu ?>')" class="min-w-[24px] max-w-[24px]" src="vendor/img/check24.png" title="Đã thực hiện">
                    <?php
                        break;
                }
                if ($loaihinh != 'LD') {
                    ?>
                    <button onclick="open_add_chiso_sinhhieu('<?= $r->soct ?>','<?= $r->mach ?>','<?= $r->nhietdo ?>','<?= $r->huyetap ?>','<?= $r->nhiptho ?>','<?= $r->chieucao ?>','<?= $r->cannang ?>')" class="hover:cursor-pointer">
                        <img class="min-w-[24px] max-w-[24px]" src="vendor/img/khambenh.png" title="Chỉ số sinh hiệu">
                    </button>
                <?php } ?>
            </div>

        </td>
        <td class=' px-4 py-2  gap-3 text-center'><?= $r->thoigian ?> </td>
        <td class='search_key px-4 py-2  gap-3'><?= $r->tenkh ?><input hidden class="tenkh_chuyenkhoan" value='<?= $r->tenkh ?>'> </td>
        <td class='search_key px-4 py-2  gap-3'><?= $r->sodienthoai ?> </td>
        <td class=' px-4 py-2  gap-3 flex-col justify-center items-center'>
            <div class="w-[100px] bg-[#c89dcb] rounded-sm">
                <div class="bg-white text-md leading-none py-1 text-center text-black" style="width: <?= $r->tiendo ?>%"><?= $r->tiendo ?>%
                </div>
            </div>
        </td>
        <td class=' px-4 py-2  gap-3 text-start'><?= $r->tenlieutrinh ?> </td>
        <td class=' px-4 py-2 item_list_dichvu gap-3 tablet:min-w-[300px] phone:min-w-[300px] laptop:min-w-[300px] max-w-[400px]'><?= $item_dichvu ?> </td>
        <td class=' px-4 py-2  gap-3'><?= $r->tennv ?> </td>
        <td class='px-4 py-2 text-end'><?= str_replace(',', '.', number_format($r->tongcong)) ?></td>
        <td class='px-4 py-2 text-end' hidden><?= str_replace(',', '.', number_format($r->dathanhtoan)) ?></td>
        <td class='px-4 py-2 text-end hover:underline hover:text-[#edf74b]' onclick="<?= $ham_thutien ?>"><?= str_replace(',', '.', number_format($r->conno)) ?></td>
        <td class=' px-3 py-2 '>
            <div class=" flex justify-center gap-3 items-center">
                <button class="col-span-1 flex justify-center group p-2 text-[16px] relative text-white focus:outline-none">
                    <img src='vendor/img/triple_dots.png'>
                    <ul class="hidden group-focus-within:block list-none absolute  top-[0] right-[30px] bg-gray-50 w-50 z-900 shadow-lg group-focus-within:delay-500 rounded-full">
                        <li class="text-left py-3 px-4  hover:bg-gray-200 hover:rounded-full rounded-full text-black flex gap-3">
                            <img onclick="open_chitiet_banhang_header(this,'<?= $r->soct ?>')" class='min-w-[20px] max-w-[20px] hover:cursor-pointer' src="vendor/img/view.png" title="Chi tiết đơn hàng">
                            <img onclick="open_noidung('0','<?= $r->soct ?>','<?= $r->soct ?>','<?= $r->sodienthoai ?>')" class='min-w-[20px] max-w-[20px] hover:cursor-pointer' src="vendor/img/note32.png" title="Thêm ghi chú">
                            <img onclick="open_edit_banhang('<?= $r->soct ?>')" class='min-w-[20px] max-w-[20px] hover:cursor-pointer' src="vendor/img/edit.png" title="Chỉnh sửa đơn hàng">
                            <img onclick="open_print_banhang('<?= $r->soct ?>','inlai')" class='min-w-[20px] max-w-[20px]' src="vendor/img/print.png" title="In đơn hàng">
                            <?php if ($r->dathanhtoan == 0) { ?>
                                <img onclick="open_delete_banhang_header('<?= $r->soct ?>', '<?= $r->tenkh ?>')" class='min-w-[20px] max-w-[20px] hover:cursor-pointer' src="vendor/img/delete.png" title="Xóa đơn hàng">
                            <?php } else { ?>
                                <img onclick="open_delete_dathu_fail()" class='min-w-[20px] max-w-[20px] hover:cursor-pointer' src="vendor/img/delete.png" title="Xóa đơn hàng">
                            <?php } ?>

                        </li>
                    </ul>
            </div>
            </button>
        </td>
    </tr>
<?php
}
