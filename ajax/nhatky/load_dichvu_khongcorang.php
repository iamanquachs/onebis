<?php
include('__include_connect.php');
require("../../modules/nhatkyClass.php");

$db = new nhatky();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$stt = 1;
$list = $db->load_dichvu_khongcorang($mshs, $msdv, $soct);
foreach ($list as $e) {
?>
    <div class="border-b border-[#ffffff40] grid grid-cols-12 justify-between items-center px-3 py-2 text-white mb-2 text-lg gap-7">
        <div class="col-span-10">
            <p class="text-white  text-left"><?= $e->tenhh ?></p>
        </div>
        <div class="flex gap-3 col-span-2 justify-end">
            <p><?= str_replace(',', '.', number_format($e->thanhtien)) ?></p>
            <div class="w-[20px]">
            </div>
        </div>
    </div>
<?php }
