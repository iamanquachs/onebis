<?php
include('__include_connect.php');
require("../../modules/dathenClass.php");

$db = new dathen();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$tungay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['tungay'])));
$denngay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['denngay'])));
$begin = new DateTime($tungay);
$end = new DateTime(date('Y-m-d', strtotime($denngay . ' +1 day')));

$interval = DateInterval::createFromDateString('1 day');
$period = new DatePeriod($begin, $interval, $end);
$week = array("Chủ nhật - ", "Thứ 2 - ", "Thứ 3 - ", "Thứ 4 - ", "Thứ 5 - ", "Thứ 6 - ", "Thứ 7 - ");


foreach ($period as $dt) {
    $date = date_create($dt->format("Y-m-d"));
    $w = $week[(int)$date->format('w')];
?>
    <div id="ngay_<?= $dt->format("Y-m-d") ?>" class="w-[230px] min-w-[230px] rounded-md text-start bg-[#fffdfd1b]">
        <div class="text-center">
            <h4 class="text-lg  text-white whitespace-nowrap bg-[#efb0eb70] py-3 rounded-t-md"><?= $w . ' ' . $dt->format("d/m/Y") ?></h4>
        </div>
    </div>
<?php }
$list_dathen = $db->load_dathen($mshs, $msdv, $tungay, $denngay);
$ngay_sosanh = '';
foreach ($list_dathen as $r) {

    if ($ngay_sosanh != $r->ngay) {
        $ngay_sosanh =  $r->ngay;
    } else {
    } ?>
    <script>
        $('#ngay_<?= $ngay_sosanh ?>').append(`<div class='border-b border-[#ffffff2e] py-2 px-3'>
        <p onclick="load_quatrinhdieutri('<?= $r->sodienthoai ?>')" class='text-[#f9ff00] text-lg flex items-center hover:cursor-pointer'><?= $r->tenkh  ?></p>
        <div class='flex  justify-between items-center'>
        <div class='flex items-center gap-2 py-2'>
        <img class="focus:outline-none w-[16px]" src="vendor/img/call.png">
        <p class='text-white text-lg flex items-center'><?= $r->sodienthoai ?></p>
        </div>
        <div  >
        <button class='hover:cursor-pointer flex items-center gap-2' onclick="open_add_ngayhen('<?= $r->rowid ?>', '<?= $r->soct ?>', '<?= $r->tenkh ?>', '<?= $r->ngayhen ?>')">
        <img class="focus:outline-none w-[16px]" src="vendor/img/time24.png">
        <p class='text-white hover:text-[#f9ff00]  text-lg flex items-center'><?= $r->gio ?></p>
        </button>
        </div>
        </div>
            
            <p class='text-[#ffffffa8] text-md flex items-center'><?= $r->tenhh ?></p>
        </div>`)
    </script>
    <?php ?>

<?php }
