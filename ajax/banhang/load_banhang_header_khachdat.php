<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");
$db = new banhang();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$loai_dathang = '1';
$search_key = $_POST['search_key'];
$list = $db->load_banhang_header_homnay($msdv, $loai_dathang, $search_key, '');
$stt = 1;
foreach ($list as $r) {
    $load_thongtin_khachhang = $db->load_thongtin_khachhang($mshs, $msdv, $r->sdt);
?>
    <tr class="active_items item_line border-b border-dashed border-[#ffffff40]" onclick='active_item(this)'>
        <td class='px-4 py-2 text-center'><?= $stt++ ?></td>
        <td class=' px-4 py-2  max-w-[30px] text-center'><?= $r->thoigian ?> </td>
        <td class=' px-4 py-2'><?= $r->tenkh ?> </td>
        <td class=' px-4 py-2'><?= $r->sodienthoai ?> </td>
        <td class=' px-4 py-2 text-end'><?= $r->tuvan ?> </td>
        <td class=' px-4 py-2 text-center flex justify-center gap-3 items-center'>

            <button onclick="open_chitiet_banhang_header(this,'<?= $r->soct ?>')" class="hover:cursor-pointer">
                <img class="min-h-[20px] min-w-[20px] max-h-[20px] max-w-[20px]" src="vendor/img/view.png" title="Chi tiết đơn hàng">
            </button>
            <button onclick="open_xacnhan_donhang('<?= $r->soct ?>', '<?= $r->tenkh ?>', '<?= $r->sdt ?>', '<?= $load_thongtin_khachhang[0]->ngaysinh ?>', '<?= $load_thongtin_khachhang[0]->diachi ?>', 'khachdat')">
                <img class="min-h-[20px] min-w-[20px] max-h-[20px] max-w-[20px]" src="vendor/img/arrow_right.png" title="Xác nhận đơn hàng">
            </button>
            <button onclick="open_edit_banhang('<?= $r->soct ?>')">
                <img class="min-h-[20px] min-w-[20px] max-h-[20px] max-w-[20px]" src="vendor/img/edit.png" title="Chỉnh sửa đơn hàng">
            </button>
            <?php if ($r->dathanhtoan == 0) { ?>
                <button onclick="open_delete_banhang_header('<?= $r->soct ?>', '<?= $r->tenkh ?>')" class="hover:cursor-pointer">
                    <img class="min-h-[20px] min-w-[20px] max-h-[20px] max-w-[20px]" src="vendor/img/delete.png" title="Xóa đơn hàng">
                </button>
            <?php } else { ?>
                <button onclick="open_delete_dathu_fail()" class="hover:cursor-pointer">
                    <img class="min-h-[20px] min-w-[20px] max-h-[20px] max-w-[20px]" src="vendor/img/delete.png" title="Xóa đơn hàng">
                </button>
            <?php } ?>
        </td>
    </tr>
<?php
}
