<main class="bg_main ">
    <div class="grid grid-cols-12 gap-3">
        <!--Grid Form-->

        <div class="col-span-5 phone:col-span-12 tablet:col-span-12 flex flex-1  flex-col md:flex-row lg:flex-row ">
            <div class="mb-2 bg-[#ffffff36] rounded shadow-sm w-full ">
                <div class="">
                    <div class="flex justify-between px-3 py-3 items-center  border-b border-[#a86ed4]">
                        <div class="flex gap-5  items-center ">
                            <p class="text-lg text-[#83ff00]">Danh sách Phiếu nhập</p>

                        </div>
                    </div>
                </div>
                <div class="py-3 overflow-x-scroll">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class=" px-4 py-2 text-center font-thin">#</th>
                                <th class=" px-4 py-2 text-center font-thin">Ngày HĐ</th>
                                <th class=" px-4 py-2 text-center font-thin">Số HĐ</th>
                                <th class=" px-4 py-2 text-start font-thin ">NCC</th>
                                <th class=" px-4 py-2  font-thin text-end">Tổng tiền</th>
                                <th class=" px-4 py-2  font-thin text-center">Đã thanh toán</th>
                            </tr>
                        </thead>
                        <tbody id='list_nhapkho_header' class="text-white">

                        </tbody>
                    </table>
                    <div class="pt-5 px-3">
                        <input onkeyup="nhapkho_search(this)" id="search" class="w-1/2 phone:w-full appearance-none block border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-white" placeholder="Tìm kiếm" autocomplete="off">
                        <div class="flex gap-3 pt-5 items-end">
                            <select onchange="nhapkho_filter()" id="loai_filter" class="w-full tablet:w-1/2 appearance-none block   text-[#c068ba] border-b border-[#f568e3]  px-4 phone:px-1 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]">
                                <option value="theoNN">Theo ngày nhập</option>
                                <option value="theoHD">Theo ngày HĐ</option>
                            </select>
                            <div class="donhang_filter_div " style="display: flex; justify-content: center; align-items: end; gap: 10px;">
                                <div id="tungay" class="input-group date text-white" data-date-format="dd/mm/yyyy">
                                    <input id="tungay_input" data-date-format="dd/mm/yyyy" onchange="nhapkho_filter()" class="form-control text-center bg-transparent border-b border-[#f568e3] phone:w-[100px]" type="text" value="<?= date('d/m/Y', strtotime('-30 day', strtotime(date('Y-m-d')))); ?>"> <span class="input-group-addon"></span>
                                </div>
                                <span class="text-white">Đến</span>
                                <div id="denngay" class="input-group date text-white" data-date-format="dd/mm/yyyy">
                                    <input id="denngay_input" data-date-format="dd/mm/yyyy" onchange="nhapkho_filter()" class="form-control text-center bg-transparent border-b border-[#f568e3] phone:w-[100px]" type="text" value="<?= date('d/m/Y'); ?>"> <span class="input-group-addon"></span>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-7 phone:col-span-12 tablet:col-span-12">
            <div class="mb-2 bg-[#ffffff36] rounded shadow-sm w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-2 pb-[0.7rem] items-center  border-b border-[#a86ed4]">
                        <div class="flex gap-5  items-center ">
                            <p class="text-lg text-[#83ff00]">Chi tiết phiếu nhập</p>
                        </div>
                        <input hidden id="soct_nhapkho">
                        <input hidden id="title_delete_nhapkho">
                        <div class="flex gap-5 ">
                            <button class=" text-white bg-[#9536b2] px-3 py-1 rounded-md" onclick="add_nhapkho_header()">Tạo phiếu nhập</button>
                            <button class=" text-white bg-[#7f8d24] px-3 py-1 rounded-md" onclick="open_print_nhapkho()">In phiếu</button>
                            <button class=" text-white bg-[#b33333] px-3 py-1 rounded-md" onclick="capnhat_nhapkho()">Cập nhật</button>
                            <button class=" text-white bg-[red] px-3 py-1 rounded-md" onclick="open_delete_nhapkho()">Xóa phiếu</button>
                        </div>
                    </div>
                </div>
                <div class="py-3 overflow-x-scroll">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class=" px-4 py-2 text-center font-thin">#</th>
                                <th class=" px-4 py-2 text-start font-thin">Tên hàng hóa</th>
                                <th class=" px-4 py-2 text-center font-thin">ĐVT</th>
                                <th class=" px-4 py-2 text-center font-thin ">Số lô</th>
                                <th class=" px-4 py-2 text-center font-thin ">Hạn dùng</th>
                                <th class=" px-4 py-2 font-thin text-end">Giá nhập</th>
                                <th class=" px-4 py-2 font-thin text-end">CK</th>
                                <th class=" px-4 py-2 font-thin text-center">VAT</th>
                                <th class=" px-4 py-2 font-thin text-center">SL</th>
                                <th class=" px-4 py-2 font-thin text-end">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody id='list_nhapkho_line' class="text-white">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</main>

<!-- Form delete nhap kho  -->
<div class="relative z-10 hidden" id="form_delete_nhapkho" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[red]'>Đồng ý xóa</p>
                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_delete_nhapkho')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 " data-te-modal-body-ref>
                        <p id="ten_donhang" class="text-center"></p>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="soct_delete">
                    <button type="button" onclick="delete_nhapkho()" class="mt-3 inline-flex w-full justify-center rounded-md bg-[purple] px-5 py-2 text-[14px]  text-white shadow-sm  hover:bg-purple-500 sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_delete_nhapkho')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form nhập kho post thu chi-->
<div class="relative z-10 hidden" id="form_post_thuchi" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[red]'>Thanh toán NCC</p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_post_thuchi')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 flex justify-center" data-te-modal-body-ref>
                        <p id="title_thongbao"></p>
                        <div class="w-full">
                            <div class="grid grid-cols-12 items-center">
                                <span class="col-span-3 text-[red] font_semi">Số tiền</span>
                                <input class="col-span-9 text-[red] font_semi focus:outline-none border-b border-[#f568e3] p-2" onkeyup=" _ChangeFormat(this),ktra_sotien_thanhtoan(this)" id="sotien_conno">

                            </div>
                            <div class="grid grid-cols-12 mt-[20px]  items-center">
                                <span class="col-span-3" style="color: #000;">Ngân quỹ</span>
                                <select id="nganquy_post_thuchi" class="col-span-9 p-2 border-b border-[#f568e3] ">
                                    <option value="TM">Tiền mặt</option>
                                    <option value="NH">Ngân hàng</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input type="hidden" id="soct_thanhtoan">
                    <input type="hidden" id="sotien_thanhtoan">
                    <input type="hidden" id="ten_ncc_thanhtoan">
                    <input type="hidden" id="ms_ncc_thanhtoan">
                    <input type="hidden" id="sohd_thanhtoan">
                    <input type="hidden" id="dathanhtoan_thanhtoan">
                    <button type="button" onclick="nhapkho_post_thuchi()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[120px] ">Thanh toán</button>

                    <button type="button" onclick="close_modal('form_post_thuchi')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form nhập kho chưa thành công-->
<div class="relative z-10 hidden" id="form_nhapkho_chua_thanhcong" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[red]'>Thông báo</p>
                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_nhapkho_chua_thanhcong')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 flex justify-center" data-te-modal-body-ref>
                        <div id='item_nhapkho_chua_thanhcong' class="w-full">

                        </div>

                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">

                    <button type="button" onclick="close_modal('form_nhapkho_chua_thanhcong')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form error-->
<div class="relative z-10 hidden" id="form_error" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[red]'>Thông báo</p>
                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_error')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 flex justify-center" data-te-modal-body-ref>
                        <div class="w-full text-[red] text-lg text-center">
                            Chưa chọn phiếu
                        </div>

                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <button type="button" onclick="close_modal('form_error')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        nhapkho_filter()
        get_nhapkho_chua_update()
    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var dateToday = new Date();
        $("#tungay input, #denngay input").datepicker({
            autoclose: true,
            todayHighlight: true,
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
<script type="text/javascript" src="vendor/js/nhapkho.js?v=<?= md5_file('vendor/js/nhapkho.js') ?>"></script>