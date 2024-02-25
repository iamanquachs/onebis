<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");


$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$sodienthoai = $_POST['sodienthoai'];

$list = $db->load_lichsu_khachhang($mshs, $msdv, $sodienthoai);
$stt = 1;
foreach ($list as $r) { ?>
    <tr class="hover:cursor-pointer hover:bg-[#ddd] border-b border-dashed border-[#cfcdcd]">
        <td class="px-4 py-2 font-thin  text-center"><?= $r->ngay ?></td>
        <td class="px-4 py-2 font-thin "><?= $r->tenhh ?></td>
        <td class="px-4 font-thin  py-2 text-left">
            <?php if ($r->nhanvien == '') {
            ?>
                <button onclick="open_update_ngayhen_dichvu_chuathuchien('<?= $r->rowid ?>','<?= $r->soct ?>','<?= $r->tenhh ?>', '<?= $r->mslieutrinh ?>', '<?= $r->tenlieutrinh ?>')" class="focus:outline-none">
                    <img class='opacity-30' src='vendor/img/checked.png'>
                </button>
            <?php } else {
                echo $r->nhanvien;
            } ?>
        </td>
        <td class="px-4 py-2 font-thin ">
            <div class='flex justify-center items-center'>
                <?php
                switch ($r->danhgia) {
                    case "1RKHL": ?>
                        <img class='max-w-[24px] min-w-[24px] max-h-[24px] min-h-[24px]' src='vendor/img/ratkhonghailong.png'>
                    <?php
                        break;
                    case "2KHL": ?>
                        <img class='max-w-[24px] min-w-[24px] max-h-[24px] min-h-[24px]' src='vendor/img/khonghailong.png'>
                    <?php
                        break;
                    case "3HL": ?>
                        <img class='max-w-[24px] min-w-[24px] max-h-[24px] min-h-[24px]' src='vendor/img/hailong.png'>
                    <?php
                        break;
                    default: ?>
                        <img class='max-w-[24px] min-w-[24px] max-h-[24px] min-h-[24px]' src='vendor/img/rathailong.png'>
                <?php
                        break;
                }
                ?>
            </div>
        </td>

    </tr>
<?php
}
