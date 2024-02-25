<?php
include('__include_connect.php');
require("../../modules/tiepnhanClass.php");
require("../../modules/banhangClass.php");

$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$stt = 1;
$list = $db->load_banhang_header_henkhach_nhakhoa($msdv, '');

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
            $trangthai  = "text-[white] hover:text-[#edf74b]";
            if ($chitiet_dv[6] == 2) {
                $trangthai  = "text-[#83ff20] hover:text-[#edf74b]";
            };
            if ($chitiet_dv[6] == 3) {
                $trangthai  = "text-[#e88afb] hover:text-[#edf74b]";
            };
            $item_dichvu .= '
            <span class="' . $trangthai . '" onclick="open_add_nugoithuchien_dichvu_rang(`' . $chitiet_dv[0] . '`,`' . $chitiet_dv[2] . '`,`' . $chitiet_dv[1] . '`,`' . $chitiet_dv[4] . '`,`' .  $r->soct  . '`,`' . $chitiet_dv[5] . '`,`' . $chitiet_dv[3] . '`)">
            ' . $chitiet_dv[2] .  '  
            </span>' . $kytu;
        }
    }
?>

    <tr class="active_items item_line border-b border-dashed border-[#ffffff40]" onclick='active_item(this)'>
        <td class=' px-4 py-2 text-center '>
            <div class="flex gap-3 justify-center items-center">
                <?php
                switch ($r->thuchien) {
                    case (0): ?>
                        <button onclick="open_tiepnhan_benhnhan('<?= $r->soct ?>','<?= $r->tenkh ?>','<?= $r->sdt ?>')" class="hover:cursor-pointer">
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
                        <button onclick="" class="hover:cursor-pointer">
                            <img class="min-w-[24px] max-w-[24px]" src="vendor/img/wait32.png" title="Đang thực hiện">
                        </button>
                    <?php
                        break;
                    case (3): ?>
                        <button onclick="" class="hover:cursor-pointer">
                            <img class="min-w-[24px] max-w-[24px]" src="vendor/img/check24.png" title="Đã thực hiện">
                        </button>
                <?php
                        break;
                }
                ?>

            </div>

        </td>
        <td class='px-4 py-2 text-center'><?= $stt++ ?></td>
        <td class=' px-4 py-2  gap-3 text-center'><?= $r->thoigian ?> </td>
        <td class=' px-4 py-2  gap-3'><?= $r->tenkh ?><input hidden class="tenkh_chuyenkhoan" value='<?= $r->tenkh ?>'> </td>
        <td class=' px-4 py-2  gap-3'><?= $r->ngaysinh ?> </td>
        <td class=' px-4 py-2  gap-3'><?= $r->sodienthoai ?> </td>
        <td class=' px-4 py-2  gap-3 text-start'><?= $r->tenlieutrinh ?> </td>
        <td class=' px-4 py-2  gap-3 flex-col justify-center items-center'>
            <div class="w-[100px] bg-[#c89dcb] rounded-sm">
                <div class="bg-white text-md leading-none py-1 text-center text-black" style="width: <?= $r->tiendo ?>%; max-width:100%"><?= $r->tiendo ?>%
                </div>
            </div>
        </td>
        <td class=' px-4 py-2 item_list_dichvu gap-3 tablet:min-w-[300px] phone:min-w-[300px] laptop:min-w-[300px]'><?= $item_dichvu ?> </td>
        <td class=' px-4 py-2  gap-3'><?= $r->tennv ?> </td>
        <td class='px-4 py-2 text-end'><?= str_replace(',', '.', number_format($r->tongcong)) ?></td>
        <td class='px-4 py-2 text-end'><?= str_replace(',', '.', number_format($r->dathanhtoan)) ?></td>
        <td class='px-4 py-2 text-end hover:underline hover:text-[#edf74b]' onclick="<?= $ham_thutien ?>"><?= str_replace(',', '.', number_format($r->conno)) ?></td>
    </tr>
<?php
}
