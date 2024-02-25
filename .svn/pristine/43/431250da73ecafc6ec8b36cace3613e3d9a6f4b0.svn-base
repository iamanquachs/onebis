<?php
include('__include_connect.php');
require("../../modules/baocaoClass.php");

$db = new baocao();
$mshs = $_COOKIE['mshs'];
$msdv = $_POST['msdv'];
$tungay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['tungay'])));
$denngay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['denngay'])));
$stt = 1;
$sumdoanhso = 0;
$sumhoahong = 0;
$sumluongcoban = 0;
$sumtienphucap = 0;
$sumtamung = 0;
$sumkhoantru = 0;
$sumtongnhan = 0;
$sumluongngaycong = 0;
$sumngaycong = 0;
$list = $db->baocao_thuchiendichvu($mshs, $msdv,  $tungay, $denngay);
foreach ($list as $r) {
    $sumdoanhso += $r->doanhso;
    $sumhoahong += $r->hoahong;
    $sumluongcoban += $r->luongcoban;
    $sumtienphucap += $r->tienphucap;
    $sumtamung += $r->tamung;
    $sumtongnhan += $r->tongnhan;
    $sumkhoantru += $r->khoantru;
    $sumngaycong += $r->ngaycong;
    $sumluongngaycong += $r->luongngaycong;
?>
    <tr class="active_items item_line border-b border-dashed border-[#ffffff40] items" onclick="active_item(this)">
        <td class="px-3 py-2 text-center "><?= $stt++ ?></td>
        <td class="search_key px-3 py-2 font-thin text-left"><?= $r->nhanvien ?></td>
        <td class=" px-3 py-2 font-thin text-center"><?= $r->thuchien ?></td>
        <td class=" px-3 py-2 font-thin  text-right text-lg"><?= str_replace(',', '.', number_format($r->doanhso)) ?></td>
        <td onclick="load_chitiet_baocao_thuchiendichvu('<?= $r->msnv ?>', '<?= $r->tennv ?>')" class=" px-3 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($r->hoahong)) ?></td>
        <td class=" px-3 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($r->luongcoban)) ?></td>
        <td class=" px-3 py-2 font-thin text-right text-lg" title="Số ngày được nghỉ: <?= $r->songay_duocnghi ?> | Số ngày nghỉ: <?= $r->songaynghi ?>"><?= str_replace(',', '.', number_format($r->ngaycong)) ?></td>
        <td class=" px-3 py-2 font-thin text-right text-lg " title="Lương ngày công"><?= str_replace(',', '.', number_format($r->luongngaycong)) ?></td>
        <td class=" px-3 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($r->tienphucap)) ?></td>
        <td class=" px-3 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($r->tamung)) ?></td>

        <?php
        switch ($r->trangthai) {
            case '0':
                if ($msdv != '') {
        ?>
                    <td onclick="open_update_khoantru('<?= $r->rowid ?>','<?= $r->nhanvien ?>','<?= str_replace(',', '.', number_format($r->khoantru)) ?>')" class=" px-3 py-2 font-thin text-right text-lg hover:underline hover:text-[#edf74b]"><?= str_replace(',', '.', number_format($r->khoantru)) ?></td>
                <?php } else { ?>
                    <td class=" px-3 py-2 font-thin text-right text-lg "><?= str_replace(',', '.', number_format($r->khoantru)) ?></td>
                <?php }
                break;
            default: ?>
                <td class=" px-3 py-2 font-thin text-right text-lg "><?= str_replace(',', '.', number_format($r->khoantru)) ?></td>
        <?php break;
        }
        ?>
        <td class=" px-3 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($r->tongnhan)) ?></td>
        <td class=" px-3 py-2 font-thin text-center"><?= $r->chucvu ?></td>
        <td class=" px-3 py-2 font-thin text-center"><?= $r->phucap ?></td>
        <td class=" px-3 py-2 font-thin text-center"><?= $r->msdv ?></td>
        <td class=" px-3 py-2 font-thin text-center">
            <?php
            switch ($r->trangthai) {
                case '0':
                    if ($msdv != '') {
            ?>
                        <span onclick="open_add_thuchi_luong('<?= $r->msnv ?>','<?= $r->tennv ?>','<?= $r->tongnhan ?>','<?= $r->tamung ?>')" class="hover:underline hover:text-[#edf74b]">Chưa duyệt</span>
                    <?php } else { ?>
                        <span>Chưa duyệt</span>
                    <?php }
                    break;
                default:
                    if ($msdv != '') {
                    ?>
                        <span onclick="open_phieu_dathuchien('<?= $r->sophieuchi ?>', '<?= $r->sophieuthu ?>','<?= $r->msnv ?>','<?= $r->tennv ?>')" class="hover:underline hover:text-[#edf74b]">Đã duyệt</span>
                    <?php } else { ?>
                        <span>Đã duyệt</span>
            <?php
                    }
                    break;
            }
            ?>
        </td>
    </tr>
<?php
} ?>
<tr class="active_items item_line border-b border-dashed border-[#ffffff40] text-[#edf74b]" onclick="active_item(this)">
    <td colspan="3" class="px-3 py-2 text-right ">Tổng cộng</td>
    <td class=" px-3 py-2 font-thin  text-right text-lg"><?= str_replace(',', '.', number_format($sumdoanhso)) ?></td>
    <td class=" px-3 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($sumhoahong)) ?></td>
    <td class=" px-3 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($sumluongcoban)) ?></td>
    <td class=" px-3 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($sumngaycong)) ?></td>
    <td class=" px-3 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($sumluongngaycong)) ?></td>
    <td class=" px-3 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($sumtienphucap)) ?></td>
    <td class=" px-3 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($sumtamung)) ?></td>
    <td class=" px-3 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($sumkhoantru)) ?></td>
    <td class=" px-3 py-2 font-thin text-right text-lg"><?= str_replace(',', '.', number_format($sumtongnhan)) ?></td>
    <td class=" px-3 py-2 font-thin text-center"></td>
    <td class=" px-3 py-2 font-thin text-center"></td>
    <td class=" px-3 py-2 font-thin text-center"></td>
    <td class=" px-3 py-2 font-thin text-center"></td>
</tr>