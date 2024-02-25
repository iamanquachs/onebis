<?php
include('__include_connect.php');
require("../../modules/thuchiClass.php");


$db = new Thuchi();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$tungay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['tungay'])));
$denngay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['denngay'])));
$list = $db->load_tongthuchi($mshs, $msdv, $tungay, $denngay);
$dauky = 0;
$tongthu = 0;
$tongchi = 0;
foreach ($list as $r) {
?>
    <?php if ($r->loai == 'dauky') {
        $dauky = $r->dauky;
    ?>
        <div class="col-span-3 phone:col-span-6  bg-[#483b57] rounded-lg px-5 py-2 flex gap-2">
            <p class="whitespace-nowrap">Đầu kỳ: </p>
            <span id="sotien_dauki"> <?= str_replace(',', '.', number_format($r->dauky)) ?></span>
        </div>
    <?php } ?>
    <?php if ($r->loai == 'tongthu') {
        $tongthu = $r->dauky;
    ?>

        <div class=" col-span-3 phone:col-span-6 bg-[#483b57] rounded-lg px-5 py-2 flex gap-2">
            <p class="whitespace-nowrap">Tổng thu: </p>
            <span id="sotien_dauki"> <?= str_replace(',', '.', number_format($r->dauky)) ?></span>
        </div>
    <?php } ?>
    <?php if ($r->loai == 'tongchi') {
        $tongchi = $r->dauky;
    ?>

        <div class=" col-span-3 phone:col-span-6 bg-[#483b57] rounded-lg px-5 py-2 flex gap-2">
            <p class="whitespace-nowrap">Tổng chi: </p>
            <span id="sotien_dauki"> <?= str_replace(',', '.', number_format($r->dauky)) ?></span>
        </div>
    <?php } ?>

<?php
} ?>
<div class=" col-span-3 phone:col-span-6 bg-[#483b57] rounded-lg px-5 py-2 flex gap-2 text-[#edf74b]">
    <p class="whitespace-nowrap">Cuối kỳ: </p>
    <span id="sotien_dauki"><?= str_replace(',', '.', number_format($dauky + $tongthu - $tongchi)) ?></span>
</div>