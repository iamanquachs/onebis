<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");
require("../../modules/dathangClass.php");
require("../../modules/thamsoClass.php");

$db = new banhang();
$db_control = new banhang_control();
$db_bank = new thamso_control();
$db_dathang = new dathang();

$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$hoten = $_COOKIE['hoten'];
$soct = $_POST['soct'];

$list_donhang = $db_dathang->load_print_donhang($msdv, $soct);
$list_tongcong = $db_dathang->load_print_tongcong($msdv, $soct);
$list_donvi = $db_control->load_print_donvi($mshs, $msdv);
$bank = $db_bank->load_thamso_nganhang($msdv);
$qr_img = $_POST['qr_img'];
$stt = 1;
$tongcong = 0;
$giamgia = 0;
date_default_timezone_set("Asia/Bangkok");
?>

<style>
    @page {
        size: auto;
        margin: 3mm;
    }
</style>
<div>

    <div class="text-left">
        <div>

            <h4 class='uppercase font_semi'><?= $list_donvi[0]->tendv ?></h4>
            <div class="text-[11px]">
                <p><?= $list_donvi[0]->diachi ?></p>
                <p><?= $list_donvi[0]->dienthoai ?></p>
            </div>
        </div>
        <div class="py-3 text-center">
            <h4 id="test_vi" class="font_semi">PHIẾU THANH TOÁN</h4>
        </div>
    </div>
    <div class="mb-3">
        <div>
            <p class="text-[14px]">Khách hàng: <span class="uppercase"><?= $list_tongcong[0]->tenkh ?></span></p>
        </div>
    </div>
    <table class="min-w-full">
        <thead>
            <tr class="text-[#000]">
                <th class="border text-[12px] text-center font-thin">#</th>
                <th class="border text-[12px] font-thin text-center px-2">Dịch vụ</th>
                <th class="border text-[12px] font-thin text-center">SL</th>
                <th class="border text-[12px] font-thin text-center px-2">Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($list_donhang as $r) {
                $tongcong += $r->tongcong;
                $giamgia += $r->giamgia;
            ?>
                <tr>
                    <td class='border text-[12px] text-center' style="text-align: center;"><?= $stt++ ?></td>
                    <td class='border text-[12px] text-left px-2 py-1' style="text-align: start;"><?= $r->tenhh ?> </td>
                    <td class='border text-[12px] text-center' style="text-align: center;"><?= $r->soluong ?></td>
                    <td class='border text-[12px] text-end w-[50px] px-2 py-1' style="text-align: end;"><?= str_replace(',', '.', number_format($r->tongcong)) ?></td>
                </tr>

            <?php

            }
            ?>
            <tr>
                <td class='border text-[12px] text-end font_semi px-2 py-1' style="text-align: end;" colspan="3">Tổng cộng</td>
                <td class='border text-[12px] text-end font_semi px-2 py-1' style="text-align: end;"><?= str_replace(',', '.', number_format($tongcong)) ?></td>
            </tr>
            <tr>
                <td class='border text-[12px] text-end font_semi px-2 py-1' style="text-align: end;" colspan="3">Giảm giá</td>
                <td class='border text-[12px] text-end font_semi px-2 py-1' style="text-align: end;"><?= str_replace(',', '.', number_format($giamgia)) ?></td>
            </tr>
            <tr>
                <td class='border text-[12px] text-end font_semi px-2 py-1' style="text-align: end;" colspan="3">Thanh toán</td>
                <td class='border text-[12px] text-end font_semi px-2 py-1' style="text-align: end;"><?= str_replace(',', '.', number_format($list_tongcong[0]->thanhtoan)) ?></td>
            </tr>
            <tr>
                <td class='border text-[12px] text-end font_semi px-2 py-1' style="text-align: end;" colspan="3">Đã thanh toán</td>
                <td class='border text-[12px] text-end font_semi px-2 py-1' style="text-align: end;"><?= str_replace(',', '.', number_format($list_tongcong[0]->dathanhtoan)) ?></td>
            </tr>
            <tr>
                <td class='border text-[12px] text-end font_semi px-2 py-1' style="text-align: end;" colspan="3">Còn lại</td>
                <td class='border text-[12px] text-end font_semi px-2 py-1' style="text-align: end;"><?= str_replace(',', '.', number_format($list_tongcong[0]->thanhtoan - $list_tongcong[0]->dathanhtoan)) ?></td>
            </tr>
        </tbody>
    </table>
    <div class="text-[12px] mt-3">
        <div class="w-full h-auto my-5 flex justify-center items-center">
            <div id="qr_code_print">
                <img src='<?= $qr_img ?>'>
            </div>
        </div>
        <div class=" gap-1">
            <p class="whitespace-nowrap">Ngày in: <span><?= $list_tongcong[0]->ngayin ?></span>
            </p>
            <p class="whitespace-nowrap">Người lập: <span class="uppercase"><?= $hoten ?></span></span>
            </p>
        </div>
        <div>
            <p>Trân trọng cảm ơn Quý khách!</p>
        </div>
        <div>
            <p>onebis © by tpsoftct.vn</p>
        </div>
    </div>
</div>