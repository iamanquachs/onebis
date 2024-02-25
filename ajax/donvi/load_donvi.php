<?php
include('__include_connect.php');
require("../../modules/donviClass.php");

$db = new donvi_control();
$songayhethan = $_POST['songayhethan'];
$list = $db->load_donvi($songayhethan);
$stt = 1;
foreach ($list as $r) {
    $diachi_maxa = $db->load_dmtinh('', "where maxa='$r->msxa'");
    $dc = count($diachi_maxa) != 0  ? ', ' . $diachi_maxa[0]->diachi : '';
?>
    <tr class="active_items item_line border-b border-dashed border-[#ffffff40] items" onclick='active_item(this)'>
        <td class=" px-4 py-2 text-center font-thin"><?= $stt++ ?></td>
        <td class=" px-4 py-2 text-left font-thin"><?= $r->mshs ?></td>
        <td class=" px-4 py-2 font-thin text-left"><?= $r->msdv ?></td>
        <td class="search_key px-4 py-2 font-thin text-left"><?= $r->tendv ?></td>

        <td class="search_key px-4 py-2 font-thin text-left"><?= $r->khachhang ?></td>
        <td class="search_key px-4 py-2 font-thin text-start"><?= $r->diachi .  $dc  ?></td>
        <td class="search_key px-4 py-2 font-thin text-center"><?= $r->ngaykichhoat ?></td>
        <td class="search_key px-4 py-2 font-thin text-center"><?= $r->ngayhethan ?></td>
        <td class="search_key px-4 py-2 font-thin text-right"><?= $r->songay ?></td>

        <?php
        if ($r->danhan == 1) {
        ?>
            <td class=" px-4 py-2 font-thin text-right"><?= str_replace(',', '.', number_format($r->giahopdong)) ?></td>
        <?php } else { ?>
            <td class=" px-4 py-2 font-thin text-right text-[yellow] underline" onclick="open_xacnhan('<?= $r->mshs ?>','<?= $r->msdv ?>','<?= $r->tendv ?>')"><?= str_replace(',', '.', number_format($r->giahopdong)) ?></td>
        <?php } ?>
        <td class="search_key px-4 py-2 font-thin  text-center"><?= $r->loaihinh ?></td>
        <td class=" px-4 py-2 font-thin ">
            <div class="flex justify-center gap-3">
                <div>
                    <img onclick="open_login_donvi('<?= $r->mshs ?>', '<?= $r->msdv ?>', '<?= $r->tendv ?>')" title='Đăng nhập' class="min-w-[20] max-w-[20px]" src="vendor/img/arrow_right.png">
                </div>
                <?php
                switch ($r->trangthai) {
                    case 0: ?>
                        <div>

                            <img onclick="open_form_trangthai('<?= $r->msdv ?>','<?= $r->trangthai ?>','<?= $r->tendv ?>')" title='Khóa/Xóa' class="min-w-[20] max-w-[20px]" src="vendor/img/check24.png">
                        </div>
                    <?php
                        break;
                    case 1: ?>
                        <div>
                            <img onclick="open_form_trangthai('<?= $r->msdv ?>','<?= $r->trangthai ?>')" title='Khóa/Xóa' class="min-w-[20] max-w-[20px]" src="vendor/img/lock.png">
                        </div>
                    <?php
                        break;
                    default: ?>
                        <div>
                            <img onclick="open_form_trangthai('<?= $r->msdv ?>','<?= $r->trangthai ?>')" title='Khóa/Xóa' class="min-w-[20] max-w-[20px]" src="vendor/img/delete.png">
                        </div>
                <?php
                        break;
                }
                ?>

                <div>
                    <img onclick="open_add_new_donvi('<?= $r->mshs ?>')" title='Thêm đơn vị' class="min-w-[20] max-w-[20px]" src="vendor/img/add.png">
                </div>
                <div>
                    <img onclick="open_edit_thamso('<?= $r->mshs ?>','<?= $r->msdv ?>','<?= $r->tendv ?>')" title='Chỉnh tham số đơn vị' class="min-w-[20] max-w-[20px]" src="vendor/img/cauhinh.png">
                </div>
                <div>
                    <img onclick="open_giahan('<?= $r->mshs ?>', '<?= $r->msdv ?>', '<?= $r->tendv ?>')" title='Gia hạn đơn vị' class="min-w-[20] max-w-[20px]" src="vendor/img/wait32.png">
                </div>
                <div>
                    <img onclick="open_edit_donvi('<?= $r->mshs ?>','<?= $r->msdv ?>','<?= $r->tendv ?>','<?= $r->dienthoai ?>','<?= $r->loaihinh ?>','<?= $r->nguoidaidien ?>','<?= explode('|', $r->diachi)[0]  ?>','<?= $r->msxa ?>','<?= $r->dienthoaihotro ?>')" title='Chỉnh đơn vị' class="min-w-[20] max-w-[20px]" src='vendor/img/edit.png'>
                </div>
            </div>
        </td>

    </tr>
<?php
}
