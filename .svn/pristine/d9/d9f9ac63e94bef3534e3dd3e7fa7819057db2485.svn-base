<?php
include('__include_connect.php');
require("../../modules/nhapkhoClass.php");

$db = new NhapKho();

$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$hoten = $_COOKIE['hoten'];
$tendv = $_COOKIE['tendv'];
$soct = $_POST['soct'];
$tongthanhtien = 0;
$stt = 1;
$list = $db->load_nhapkho_line($mshs, $msdv, $soct);
$list_nhapkho_header = $db->nhapkho_load_header_taophieu($mshs, $msdv, $soct);
$lastmodify = $list_nhapkho_header[0]->lastmodify;
$ngay = explode('/', $lastmodify);
date_default_timezone_set("Asia/Bangkok");

?>

<style>
    @page {
        size: auto;
        margin: 10mm;
    }
</style>
<div>

    <div class="text-left">
        <div>

            <h4 class='uppercase font_semi'><?= $tendv ?></h4>

        </div>
        <div class="py-3 text-center">
            <h4 id="test_vi" class="font_semi text-xl">PHIẾU NHẬP KHO</h4>
        </div>
    </div>
    <div class="mb-3">
        <div>
            <p class="text-[14px]">Ngày HĐ: <span class=""><?= $list_nhapkho_header[0]->ngayhd ?></span></p>
        </div>
        <div>
            <p class="text-[14px]">Số HĐ: <span class=""><?= $list_nhapkho_header[0]->sohd ?></span></p>
        </div>
        <div>
            <p class="text-[14px]">Tên công ty: <span class="uppercase font_semi"><?= $list_nhapkho_header[0]->tenncc ?></span></p>
        </div>
    </div>
    <table class="min-w-full">
        <thead>
            <tr class="text-[#000]">
                <th rowspan="2" class="border text-center font-thin">#</th>
                <th rowspan="2" class="border font-thin text-center">Mã số</th>
                <th rowspan="2" class="border font-thin text-center px-2">Hàng hóa</th>
                <th rowspan="2" class="border font-thin text-center px-2">ĐVT</th>
                <th colspan="2" class="border font-thin text-center px-2">Số lượng</th>
                <th rowspan="2" class="border font-thin text-center px-2">Đơn giá</th>
                <th rowspan="2" class="border font-thin text-center px-2">Thành tiền</th>
            </tr>
            <tr class="text-[#000]">
                <th rowspan="2" class="border font-thin text-center ">Chứng từ</th>
                <th class="border font-thin text-center ">Thực nhập</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($list as $r) {
                $tongthanhtien += $r->thanhtiencothue;
            ?>
                <tr>
                    <td class='border text-center' style="text-align: center;"><?= $stt++ ?></td>
                    <td class='border text-center px-2 w-[150px]' style="text-align: left;"><?= $r->mshh ?></td>
                    <td class='border text-left px-2 py-1' style="text-align: start;"><?= $r->tenhh ?> </td>
                    <td class='border text-center' style="text-align: center;"><?= $r->dvt ?></td>
                    <td class='border text-center px-2 ' style="text-align: right;"><?= $r->soluong ?></td>
                    <td class='border text-center px-2 ' style="text-align: right;"><?= $r->soluong ?></td>
                    <td class='border text-end w-[100px] px-2 py-1' style="text-align: end;"><?= str_replace(',', '.', number_format($r->gianhapcothue)) ?></td>
                    <td class='border text-end w-[100px] px-2 py-1' style="text-align: end;"><?= str_replace(',', '.', number_format($r->thanhtiencothue)) ?></td>
                </tr>

            <?php

            }
            ?>
            <tr>
                <td class='border text-end font_semi px-2 py-1' style="text-align: end;" colspan="7">Tổng cộng</td>
                <td class='border text-end font_semi px-2 py-1' style="text-align: end;"><?= str_replace(',', '.', number_format($tongthanhtien)) ?></td>
            </tr>
        </tbody>
    </table>
    <div class=" w-full flex justify-start mt-4">
        <p>Số chứng từ gốc kém theo:</p>
    </div>
    <div class=" w-full flex justify-end mt-4">
        <p>Ngày <?= $ngay[0] ?> tháng <?= $ngay[1] ?> năm <?= $ngay[2] ?> </p>
    </div>
    <div class="grid grid-cols-12 justify-between mt-3  min-w-full" style="display: flex; justify-content: space-around;">

        <div class="col-span-4">
            <p class="font_semi">Người lập phiếu</p>
        </div>
        <div class="col-span-4">
            <p class="font_semi">Thủ kho</p>
        </div>
        <div class="col-span-4">
            <p class="font_semi">Kế toán trưởng</p>
        </div>

    </div>
</div>