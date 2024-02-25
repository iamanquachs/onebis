<?php
include('__include_connect.php');
require("../../modules/tiepnhanClass.php");
require("../../modules/nhatkyClass.php");

$db_nk = new nhatky();
$db = new tiepnhan();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$stt = 1;
$tongthanhtien = 0;
$list = $db_nk->load_chidinh_dichvu_rang($mshs, $msdv, $soct);
foreach ($list as $r) {
    $tongthanhtien += $r->thanhtien;
?>
    <tr class="text-[black] hover:bg-[#ddd] border-b border-dashed border-[#ddd]">
        <td class=" px-4 py-3 text-center font-thin"><?= $stt++ ?></th>
        <td class=" px-4 py-3 text-center font-thin"><?= $r->ms_rang ?></td>
        <td class=" px-4 py-3 text-left font-thin"><?= $r->tenhh ?></td>
        <td class=" px-4 py-3 text-right font-thin"><?= str_replace(',', '.', number_format($r->giaban)) ?></td>
        <td class=" px-4 py-3 text-right font-thin"><?= $r->ptgiam ?></td>
        <td class=" px-4 py-3 text-right font-thin"><?= str_replace(',', '.', number_format($r->thanhtien)) ?></td>
        <td class=" px-4 py-3  font-thin">
            <div class="flex justify-center">
                <img class="w-[20px] h-[20px] hover:cursor-pointer" onclick="open_delete_dichvu_rang('<?= $r->tenhh ?>', '<?= $r->mshh ?>', '<?= $r->idchidinh ?>', '<?= $soct ?>', '<?= $r->ms_rang ?>', '<?= $r->rowid ?>')" src='vendor/img/delete.png'>
            </div>
        </td>
        <td class=" px-4 py-3  font-thin">
            <div class="flex justify-end gap-3 whitespace-nowrap">
                <?php
                $list_nguoithuchien = $db->load_nguoithuchien($mshs, $msdv, $r->rowid);
                foreach ($list_nguoithuchien as $e) {
                    if ($e->nhanvien != '') {
                        $tach_nhanvien = explode('|', $e->nhanvien);
                        for ($i = 0; $i < count($tach_nhanvien); $i++) {
                            $nhanvien = explode('-', $tach_nhanvien[$i]);
                ?>
                            <span class="hover:text-[#006400] hover:cursor-pointer" onclick="open_xoa_nguoithuchien('<?= $nhanvien[0] ?>','<?= $nhanvien[1] ?>', '<?= $nhanvien[2] ?>', '<?= $r->mslieutrinh ?>')"><?= $nhanvien[0] ?> •</span>
                    <?php
                        }
                    }
                }
                if ($r->mslieutrinh == '') {
                    ?>
                    <img class="w-[20px] h-[20px] hover:cursor-pointer" onclick="open_add_nugoithuchien_dichvu_rang('<?= $r->rowid ?>','<?= $r->tenhh ?>', '<?= $r->mshh ?>', '<?= $r->idchidinh ?>', '<?= $soct ?>', '<?= $r->ms_rang ?>', '<?= $r->mslieutrinh ?>')" class="w-[24px] h-[24px]" src='vendor/img/customer.png'>
                <?php
                } ?>
            </div>
        </td>
    </tr>
<?php
} ?>
<tr class="text-[red]">
    <td colspan="5" class=" px-4 py-3 text-end font_semi">Tổng cộng</th>
    <td class=" px-4 py-3 text-right font_semi"><?= str_replace(',', '.', number_format($tongthanhtien)) ?></td>

</tr>