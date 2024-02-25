<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$msdv = $_COOKIE['msdv'];
$soct = $_POST['soct'];
$idchidinh = $_POST['idchidinh'];
$mslieutrinh = $_POST['mslieutrinh'];
$list = $db->load_chitiet_hanghoa($msdv, $soct, $idchidinh, $mslieutrinh);
$stt = 1;
foreach ($list as $r) {
    $list_hanghoa_lieutrinh = $db->load_chitiet_hanghoa($msdv, $soct,  $idchidinh, $r->mshh);
    $thanhtien = 0;
    foreach ($list_hanghoa_lieutrinh as $i) {
        $thanhtien += $i->thanhtien;
    }
    $ngayhen =  explode(' ', $r->ngayhendaformat);
?>
    <tr class="hover:cursor-pointer  item_lieutrinh" onclick="load_chitiet_mota_dichvu_lieutrinh(this, '<?= $soct ?>', '<?= $idchidinh ?>','<?= $r->mshh ?>', '<?= $r->tenhh ?>')">
        <td class='px-4 py-2 text-center'><?= $stt++ ?></td>
        <td class=' px-4 py-2  gap-3 text-left flex'>
            <p class="tenhanghoa"><?= $r->tenhh ?></p>
            <div class="tenhanghoa_edit input-group  hidden">
                <input class="input_tenhh_edit form-control text-center border-b border-[#f568e3] " type="text" value="<?= $r->tenhh ?>"> <span class="input-group-addon"></span>
            </div>
        </td>
        <td class=' px-4 py-2  gap-3 text-center'>

            <p class="ngayhen"><?= $r->ngayhendaformat ?></p>
            <div class="ngayhen ngayhen_edit input-group date hidden flex" data-date-format="dd/mm/yyyy">
                <input class="ngayhen_input max-w-[90px] input_ngayhen_edit form-control text-center border-b border-[#f568e3] focus:outline-none" type="text" data-date-format="dd/mm/yyyy" value="<?= $ngayhen[0] ?>">
                <input class="input_giohen_edit form-control text-center border-b border-[#f568e3] focus:outline-none" type="time" value="<?= $ngayhen[1] ?>">
                <span class="input-group-addon"></span>
            </div>
        </td>
        <td class='px-4 py-2 text-end'><?= str_replace(',', '.', number_format($thanhtien)) ?></td>
        <td class=' px-4 py-2 flex items-center gap-3 text-center whitespace-nowrap'>
            <button class="__btn_edit" onclick="open_edit_chitiet_lieutrinh(this)">
                <img class="min-w-[20px] max-w-[20px]" src="vendor/img/edit.png">
            </button>
            <button class="__btn_save hidden" onclick="edit_chitiet_lieutrinh(this, '<?= $soct ?>','<?= $r->idchidinh ?>','<?= $r->mshh ?>', '<?= $mslieutrinh ?>')">
                <img class="min-w-[20px] max-w-[20px]" src="vendor/img/checked.png">
            </button>
            <?php if ($r->dathu == 0) { ?>
                <button onclick="open_delete_chitiet_lieutrinh('<?= $soct ?>','<?= $r->idchidinh ?>','<?= $r->tenhh ?>','<?= $r->mshh ?>','<?= $mslieutrinh ?>')">
                    <img class="min-w-[20px] max-w-[20px]" src="vendor/img/delete.png">
                </button>
            <?php } else { ?>
                <button onclick="open_delete_dathu_fail()">
                    <img class="min-w-[20px] max-w-[20px]" src="vendor/img/delete.png">
                </button>
            <?php } ?>
        </td>
    </tr>
<?php
} ?>
<script type="text/javascript">
    $(document).ready(function() {
        var dateToday = new Date();
        $(".ngayhen .ngayhen_input").datepicker({
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>