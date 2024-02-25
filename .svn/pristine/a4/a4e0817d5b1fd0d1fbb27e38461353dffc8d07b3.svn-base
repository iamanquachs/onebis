<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$phanloai = $_POST['phanloai'];
$sodienthoai = $_POST['sodienthoai'];
$nhom_hh = $phanloai == 'lieutrinh' ? "LT" : '';
$loai = $_POST['loai'];
$search = $_POST['search'];
$list = $db->load_hanghoa_dichvu($mshs, $msdv, $phanloai, $loai, $search, $sodienthoai);
$stt = 1;
foreach ($list as $r) {
    $maso = $r->maso;
?>
    <div ondblclick="add_banhang_line('<?= $r->msctkm ?>','<?= $r->ptgiam ?>','<?= $r->maso ?>','<?= $phanloai == 'lieutrinh' ? 1 : 0 ?>','<?= $phanloai == 'hanghoa' ? 'HH' : 'DV' ?>')" class="col-span-3 phone:col-span-4 rounded-md text-start bg-[#fffdfd1b]">
        <div class="p-2">
            <input hidden class='maso_item' value='<?= $r->maso ?>'>
            <h4 class="text-lg  text-white h-[60px] tablet:h-[55px] phone:h-[54px] line-clamp-2"><?= $r->ten ?></h4>
            <p class="text-[#ffff00] font-medium flex items-center">
                <?php
                if ($r->ptgiam != 0) {
                    echo  '<div class="flex gap-2 items-center text-[#d7d4d4] tablet:flex-wrap phone:flex-wrap"><p class="line-through">' . str_replace(',', '.', number_format($r->giaban)) . '</p>' . '<div class="bg-[#fff2cc] text-black text-md rounded-[3px] px-1" >-' . $r->ptgiam . '%</div>'  .
                        '<p class="text-[#ffff00] font-medium">' . str_replace(',', '.', number_format($r->giathu)) . '</p></div>';
                } else {
                    echo '<p class="text-[#ffff00] font-medium">' . str_replace(',', '.', number_format($r->giaban)) . '</p>';
                } ?>
            </p>
        </div>
        <?php if ($phanloai == 'lieutrinh') { ?>
            <hr class="divide-x-2  border-[#ffffff40]">
            <div class="p-2 text-[#c2c1c1]">
                <?php
                $list_lieutrinh = $db->load_lieutrinh($mshs, $msdv, $r->maso);
                foreach ($list_lieutrinh as $i) {
                ?>
                    <p data-item='<?= $i->mslieutrinh ?>'><?= $i->tenlieutrinh ?></p>
                <?php } ?>
            </div>
        <?php
        } ?>
    </div>
<?php
}
