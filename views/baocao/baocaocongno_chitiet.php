<main class="bg_main ">

    <div class="flex flex-col">
        <!--Grid Form-->
        <div class="flex flex-1  flex-col md:flex-row lg:flex-row ">
            <div class="mb-2 w-full">
                <div id="qr_code_hidden" class="hidden">
                </div>
                <div class="">
                    <div class="flex justify-between px-3 py-2 items-center  phone:grid phone:grid-cols-12 tablet:grid tablet:grid-cols-12 bg-[#ffffff36] rounded-md ">
                        <div class="flex gap-3 items-center tablet:col-span-12 tablet:justify-center phone:col-span-12 phone:justify-center">
                            <p class="text-lg text-[#83ff00]">Chi tiết công nợ <span id="loaicongno">
                                    <?php
                                    $loai = $_GET['soct'];
                                    if ($loai == 'Receivable') {
                                        echo 'phải thu ';
                                    } else {
                                        echo 'phải trả ';
                                    }
                                    ?>

                                </span></p>

                        </div>
                        <div class="flex gap-5  tablet:col-span-12 tablet:justify-between tablet:mt-3 phone:col-span-12 phone:justify-between phone:mt-3 phone:gap-0 items-end ">
                            <input type="text" onkeyup="baocao_search(this)" id="search" class="w-[300px] phone:w-full text-left appearance-none block border-b border-[#f568e3]  px-4 pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-white" placeholder="Tìm số HĐ, tên" autocomplete="off">
                            <?php
                            $loai = $_GET['soct'];
                            if ($loai == 'Receivable') { ?>
                                <select onchange="load_baocao_congno_chitiet('<?= $_GET['soct'] ?>')" class=" mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-[white]" id="list_ncc_filter" type="text">
                                </select>
                            <?php
                            } else { ?>
                                <select onchange="load_baocao_congno_chitiet('<?= $_GET['soct'] ?>')" class=" mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-[white]" id="list_khachhang_filter" type="text">
                                </select>
                            <?php }
                            ?>
                        </div>
                        <div class="flex gap-5 tablet:col-span-12 tablet:justify-between tablet:mt-3 phone:col-span-12 phone:justify-between phone:mt-3 phone:grid phone:grid-cols-12  items-center">
                            <select onchange="load_baocao_congno_chitiet('<?= $_GET['soct'] ?>')" class="phone:col-span-12 mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-[white]" id="list_chinhanh" type="text">
                                <?php
                                if ($list_chinhanh_phanquyen[0]->phanquyen == 1) { ?>
                                    <option selected class='text-[#747474]' value="">Tất cả chi nhánh</option>
                                    <?php
                                    foreach ($list_chinhanh as $r) { ?>
                                        <option class='text-black' value="<?= $r->msdv ?>"><?= $r->tendv ?></option>
                                        <?php }
                                } else {
                                    foreach ($list_chinhanh as $e) {
                                        if ($msdv == $e->msdv) { ?>
                                            <option class='text-black' value="<?= $e->msdv ?>"><?= $e->tendv ?></option>
                                <?php }
                                    }
                                } ?>
                            </select>
                            <div style="display: flex;  border-radius: 5px; background-color: #e4fae9;" class="phone:col-span-10">
                                <div id="tungay" class="input-group date flex items-center pl-4" data-date-format="dd/mm/yyyy">
                                    <p class="whitespace-nowrap">Từ ngày</p>
                                    <input id="tungay_input" data-date-format="dd/mm/yyyy" class="form-control text-center bg-transparent  phone:w-[90px] laptop:w-[100px]" type="text" value="<?= date('d/m/Y'); ?>"> <span class="input-group-addon"></span>
                                </div>
                                <div id="denngay" class="input-group date flex items-center" data-date-format="dd/mm/yyyy">
                                    <p class="whitespace-nowrap">Đến ngày</p>
                                    <input id="denngay_input" data-date-format="dd/mm/yyyy" class="form-control text-center bg-transparent  phone:w-[90px] laptop:w-[100px]" type="text" value="<?= date('d/m/Y'); ?>"> <span class="input-group-addon"></span>
                                </div>
                            </div>
                            <div class="text-white phone:col-span-2">
                                <?php
                                $loai = $_GET['soct'];
                                if ($loai == 'Receivable') { ?>
                                    <button class="bg-[green] px-3 py-2 rounded-md">
                                        <a href='ReportCreditSummary/Receivable'>Tổng hợp</a>
                                    </button>

                                <?php
                                } else { ?>
                                    <button class="bg-[green] px-3 py-2 rounded-md">
                                        <a href='ReportCreditSummary/Pay'>Tổng hợp</a>
                                    </button>

                                <?php }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="py-3  overflow-x-scroll">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class=" px-4 py-2 text-center font-thin">#</th>
                                <th class=" px-4 py-2 text-center font-thin">Ngày</th>
                                <th class=" px-4 py-2 font-thin text-center">Số CT</th>
                                <?php
                                $loai = $_GET['soct'];
                                if ($loai == 'Receivable') {
                                    echo '<th class=" px-4 py-2 font-thin text-left">Khách hàng</td>
                                    ';
                                } else {
                                    echo '<th class=" px-4 py-2 font-thin text-left">Nhà cung cấp</td>
                                    ';
                                }
                                ?>
                                </th>
                                <th class=" px-4 py-2 font-thin text-center">Số tham chiếu</th>
                                <th class=" px-4 py-2 font-thin text-right">Tổng cộng</th>
                                <th class=" px-4 py-2 font-thin text-right">Đã thanh toán</th>
                                <th class=" px-4 py-2 font-thin text-right">Còn nợ</th>
                                <th class=" px-4 py-2 font-thin text-center">MSĐV</th>
                            </tr>
                        </thead>
                        <tbody id='chitiet_baocao' class="0 ">

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</main>
<!-- Form thanh toán  -->
<div class="relative z-10 hidden" id="form_thutien" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[red]'>Thanh toán khách hàng <span id='tenkh_thanhtoan' class="tenkh_chuyenkhoan"></span></p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_thutien')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 " data-te-modal-body-ref>
                        <div class="grid grid-cols-12 gap-2">
                            <p class="col-span-3">Tổng cộng</p>
                            <input id="tongcong_thanhtoan" class="col-span-9 border-b  focus:outline-none px-3" readonly>
                        </div>
                        <div class="grid grid-cols-12 gap-2 pt-5">
                            <p class="col-span-3 ">Đã thu</p>
                            <input id="sotien_dathu" class="col-span-9 border-b focus:outline-none px-3 " readonly>
                            <input id="sotien_voucher" class="col-span-9 border-b focus:outline-none px-3 " hidden readonly>
                        </div>
                        <div class="grid grid-cols-12 gap-2 pt-5">
                            <p class="col-span-3 text-[red]">Thu thêm</p>
                            <input id="sotien_thanhtoan" onkeyup="_ChangeFormat(this), tinh_nolai_edit(this)" onfocusout="load_QR_chuyenkhoan()" class="sotien_chuyenkhoan col-span-9 border-b focus:outline-none px-3 font_semi text-[red]" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 gap-2 mt-5 ">
                            <p class="col-span-3  text-[green]">Nợ lại</p>
                            <input id="nolai" value='0' class="col-span-9 border-b focus:outline-none  px-3 font_semi text-[green]" readonly>
                        </div>
                        <div class="grid grid-cols-12 gap-2  pt-5">
                            <p class="col-span-3">Ngân quỹ</p>
                            <select id="nganquy_thutruoc" onchange="load_QR_chuyenkhoan()" class="nganquy_chuyenkhoan col-span-9 border-b">
                                <option value="TM">Tiền mặt</option>
                                <option value="NH">Ngân hàng</option>
                            </select>
                        </div>
                        <div class=" w-full h-auto mt-5 flex-col justify-center items-center">
                            <div id="qr-code" class="flex justify-center"></div>
                            <p class="text-center mt-3 text-[red]" id="title_qr_thanhtoan"></p>
                        </div>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id='soct_thuchi'>
                    <input hidden id='sohd_thuchi'>
                    <input hidden id="mskh_thanhtoan">
                    <button type="button" id="btn_tra_nhacc" onclick="tratien_nhacungcap()" class="mt-3 inline-flex w-full justify-center rounded-md bg-[purple] px-5 py-2 text-[14px]  text-white shadow-sm  hover:bg-purple-500 sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" id="btn_thutien_donhang" onclick="thutien_donhang()" class="mt-3 inline-flex w-full justify-center rounded-md bg-[purple] px-5 py-2 text-[14px]  text-white shadow-sm  hover:bg-purple-500 sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_thutien')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(async function() {

        load_baocao_congno_chitiet(
            '<?= $_GET['soct'] ?>'
        )



    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var dateToday = new Date();
        $("#tungay input, #denngay input").datepicker({
            autoclose: true,
            todayHighlight: true,
        }).on('changeDate', function() {
            load_baocao_congno_chitiet('<?= $_GET['soct'] ?>')
        });
        $('#denngay input').datepicker('update', new Date());
    });
</script>
<script>
    jQuery(document).ready(function($) {
        $('.txt_date').inputmask({
            mask: "1/2/y",
            placeholder: "dd/mm/yyyy",
            leapday: "29/02/",
            separator: "/",
            alias: "dd/mm/yyyy",
        });
    });
</script>
<link href="vendor/css/datepicker.css" rel="stylesheet">
<script src="vendor/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="vendor/js/baocao.js?v=<?= md5_file('vendor/js/baocao.js') ?>"></script>