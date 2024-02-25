<?php
include('__include_connect.php');
require("../../modules/tonkhoClass.php");
require("../../modules/xuatkhoClass.php");

$db_xk = new xuatkho();
$db = new tonkho();
$mshs = $_COOKIE['mshs'];
$msdv = $_POST['msdv'];
$songayhethan = $_POST['songayhethan'];
$vuotdinhmuc = $_POST['vuotdinhmuc'];
$db_xk->lay_tonkho_baocao($mshs, $msdv, date('Y-m-d'), date('Y-m-d'), 'CN');
$list = $db->load_tonkho($mshs, $msdv, $songayhethan, $vuotdinhmuc);
$stt = 1;
$sumtondau = 0;
$sumtttondau = 0;
$sumtttongnhap = 0;
$sumtttongxuat = 0;
$sumtongnhap = 0;
$sumtongxuat = 0;
$sumtoncuoi = 0;
$sumtttoncuoi = 0;
foreach ($list as $r) {
    $sumtondau += $r->tondau;
    $sumtttondau += $r->tttondau;
    $sumtttongxuat += $r->tttongxuat;
    $sumtttongnhap += $r->tttongnhap;
    $sumtongnhap += $r->tongnhap;
    $sumtongxuat += $r->tongxuat;
    $sumtoncuoi += $r->toncuoi;
    $sumtttoncuoi += $r->tttoncuoi;
    switch ($r->tinhtrang) {
        case '1':
            $style = 'background-color:#a49901; border-radius:20px;color:#fff; text-align:end;padding:0px 10px';
            $title = 'Gần hạn';
            break;
        case '2':
            $style = 'background-color:red; border-radius:20px;color:#fff; text-align:end;padding:0px 10px';
            $title = 'Quá hạn';
            break;
        default:
            $style = '';
            $title = 'Bình thường';
            break;
    }
    switch ($r->hetkho) {
        case '1':
            $style_tk = 'background-color:#a49901; border-radius:20px;color:#fff; text-align:end;padding:0px 10px';
            $title_tk = 'Vượt định mức';
            break;
        default:
            $style_tk = '';
            $title_tk = 'Bình thường';
            break;
    }
?>

    <tr class="active_items item_line border-b border-dashed border-[#ffffff40] items" onclick='active_item(this)'>
        <td class="px-4 py-2 text-center"><?= $stt++ ?></td>
        <td class="search_key px-4 py-2 text-left hidden"><?= $r->mshh ?></td>
        <td class="search_key px-4 py-2 text-left"><?= $r->hanghoa ?></td>
        <td class="px-4 py-2 text-center"><?= $r->dvt ?></td>
        <td class="search_key px-4 py-2 text-center"><?= $r->solo ?></td>
        <td class="px-4 py-2 text-center"><span style="<?= $style ?>" title='<?= $title ?>' s><?= $r->handung ?></span></td>
        <td class="px-4 py-2 text-right text-lg"><?= str_replace(',', '.', number_format($r->gianhapcothue)) ?></td>
        <td class="px-4 py-2 text-right text-lg"><?= str_replace(',', '.', number_format($r->tondau)) ?></td>
        <td class="px-4 py-2 text-right text-lg"><?= str_replace(',', '.', number_format($r->tttondau)) ?></td>
        <td class="px-4 py-2 text-right text-lg"><?= str_replace(',', '.', number_format($r->tongnhap)) ?></td>
        <td class="px-4 py-2 text-right text-lg"><?= str_replace(',', '.', number_format($r->tttongnhap)) ?></td>
        <td class="px-4 py-2 text-right text-lg"><?= str_replace(',', '.', number_format($r->tongxuat)) ?></td>
        <td class="px-4 py-2 text-right text-lg"><?= str_replace(',', '.', number_format($r->tttongxuat)) ?></td>
        <td class="px-4 py-2 text-right text-lg"><?= str_replace(',', '.', number_format($r->toncuoi)) ?></td>
        <td class="px-4 py-2 text-right text-lg"><?= str_replace(',', '.', number_format($r->tttoncuoi)) ?></td>
        <td class="px-4 py-2 text-right"> <span style="<?= $style_tk ?>" title='<?= $title_tk ?>' s><?= str_replace(',', '.', number_format($r->tonkho_tt)) ?></span></td>

        <td class="px-4 py-2 text-right "><?= $r->msdv ?></td>
    </tr>
<?php
}
?>
<tr class="active_items item_line border-b border-dashed border-[#ffffff40]  text-[#edf74b]" onclick='active_item(this)'>
    <td class="px-4 py-2 text-right text-lg " colspan="6">Tổng cộng</td>
    <td class="px-4 py-2 text-right text-lg " colspan="1"><?= str_replace(',', '.', number_format($sumtondau)) ?></td>
    <td class="px-4 py-2 text-right text-lg " colspan="1"><?= str_replace(',', '.', number_format($sumtttondau)) ?></td>
    <td class="px-4 py-2 text-right text-lg " colspan="1"><?= str_replace(',', '.', number_format($sumtongnhap)) ?></td>
    <td class="px-4 py-2 text-right text-lg " colspan="1"><?= str_replace(',', '.', number_format($sumtttongnhap)) ?></td>
    <td class="px-4 py-2 text-right text-lg " colspan="1"><?= str_replace(',', '.', number_format($sumtongxuat)) ?></td>
    <td class="px-4 py-2 text-right text-lg " colspan="1"><?= str_replace(',', '.', number_format($sumtttongxuat)) ?></td>
    <td class="px-4 py-2 text-right text-lg " colspan="1"><?= str_replace(',', '.', number_format($sumtoncuoi)) ?></td>
    <td class="px-4 py-2 text-right text-lg " colspan="1"><?= str_replace(',', '.', number_format($sumtttoncuoi)) ?></td>

    <td class="px-4 py-2 text-right " colspan="1"></td>
    <td class="px-4 py-2 text-right " colspan="1"><?= $msdv ?></td>
</tr>