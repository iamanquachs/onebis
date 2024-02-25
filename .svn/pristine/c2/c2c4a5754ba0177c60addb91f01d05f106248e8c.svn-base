<main class="bg_main ">
    <div class="flex flex-col">

        <!--Grid Form-->

        <div class="w-full">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 bg-[#ffffff21] rounded-md ">
                    <div class=" rounded-md   shadow-sm w-full">
                        <div class="border-b border-[#a86ed4]  rounded-t-md  px-2 py-3 flex justify-between items-center text-[#c5e0b4] ">
                            Thông tin phiếu xuất
                        </div>
                        <div class=''>
                            <div class=" w-full gap-10 p-3">
                                <div class="w-full flex gap-5 phone:grid phone:grid-cols-12 phone:gap-3">

                                    <label class="w-2/6 flex gap-4 phone:w-full phone:col-span-12 uppercase tracking-wide text-white text-xs   whitespace-nowrap">
                                        <select id="loaixuat_add" class="w-full  appearance-none block   text-[white] border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]">
                                        </select>
                                        <button onclick="open_modal('form_add_loaixuat')">
                                            <img src="vendor/img/add.png">
                                        </button>
                                    </label>

                                    <label class="w-2/6 flex pl-8 phone:pl-0  gap-3 phone:w-full phone:col-span-12 items-center uppercase tracking-wide text-white text-xs  whitespace-nowrap">
                                        <div>
                                            <p class="text-[#c068ba]">Tổng cộng</p>
                                        </div>
                                        <input class="w-full appearance-none block   text-white border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" id="tongcong_add" type="text" value="0" readonly>
                                    </label>

                                    <div class="w-2/6 flex pl-8 phone:w-full phone:col-span-12 gap-3 items-center uppercase tracking-wide text-white text-md  whitespace-nowrap justify-end">
                                        <button onclick="huy_xuatkho()" class='bg-[#ddd] p-2 px-10 rounded-md text-black'>Hủy</button>
                                        <button onclick="update_xuatkho_header()" class=' bg-[#a04ae2]  p-2 px-10 rounded-md text-white'>Lưu</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-span-12 ">
                    <div class="mb-2 p-3 bg-[#ffffff21] shadow-sm w-full rounded-md  gap-10">
                        <div class=" mb-4 w-full rounded-md flex gap-10 items-center tablet:grid tablet:grid-cols-12 tablet:gap-5  phone:grid phone:grid-cols-12 phone:gap-3">
                            <div class="w-2/6 text-white tablet:w-full tablet:col-span-3 phone:w-full phone:col-span-4">
                                <label for="tenthuoc_add " class="text-[#c068ba]">Tên hàng hóa</label>
                                <input hidden id="mshh_add">
                                <input onkeyup="load_hosohanghoa(this)" id="tenthuoc_add" class="w-full appearance-none block  tablet:w-full text-white border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" autocomplete="off">
                            </div>
                            <div class="w-1/6 text-white tablet:w-full tablet:col-span-3 phone:w-full phone:col-span-4">
                                <label class="text-[#c068ba]">ĐVT</label>
                                <input id="dvt_add" class="w-full appearance-none block   text-white border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" readonly>
                            </div>
                            <div class="w-1/6 text-white tablet:w-full tablet:col-span-3 phone:w-full phone:col-span-4">
                                <label class="text-[#c068ba]">Tồn</label>
                                <input id="tonkho_add" class="w-full appearance-none block   text-white border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" readonly>
                            </div>
                            <div class="w-1/6 text-white tablet:w-full tablet:col-span-3 phone:w-full phone:col-span-4">
                                <label class="text-[#c068ba]">Số lô</label>
                                <input id="solo_add" class="w-full appearance-none block   text-white border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" autocomplete="off">
                            </div>
                            <div class="w-1/6 text-white tablet:w-full tablet:col-span-3 phone:w-full phone:col-span-4" readonly>
                                <label class="text-[#c068ba]">Hạn dùng</label>
                                <div data-date-format="dd/mm/yyyy" class="input-group date " readonly>
                                    <input id="handung_add" type="text" value="<?= date('d/m/Y'); ?>" class="w-full appearance-none block   text-[white] border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" readonly>
                                </div>
                            </div>
                            <div class="w-1/6 text-white tablet:w-full tablet:col-span-3 phone:w-full phone:col-span-4">
                                <label class="text-[#c068ba]">Giá nhập</label>
                                <input id="gianhap_add" onkeyup="tinh_gianhapcothue()" class="w-full appearance-none block   text-white border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" autocomplete="off">
                            </div>
                            <div class="w-1/6 text-white tablet:w-full tablet:col-span-3 phone:w-full phone:col-span-4">
                                <label class="text-[#c068ba]">Số lượng</label>
                                <input id="soluong_add" onkeyup="tinh_soluong_tonkho(this)" value="1" class="w-full appearance-none block   text-white border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" autocomplete="off">
                            </div>
                            <div class="w-1/6 text-white tablet:w-full tablet:col-span-3 phone:w-full phone:col-span-4 tablet:flex tablet:items-end">
                                <input hidden id="msncc_add">
                                <input hidden id="ptgiam_add" value="0">
                                <input hidden id="msctkm_add" value="">
                                <input hidden id="giaban_add" value="0">
                                <input hidden id="pttichluy_add">
                                <input hidden id="thuesuat_add">
                                <button onclick="add_xuatkho_line()" id="btn_add_line" class=' bg-[#a86ed4]  p-2 px-10 rounded-md text-white'>Chọn</button>
                            </div>
                        </div>

                        <div class=" w-full rounded-md mt-4 gap-10 text-white">
                            <table id="load_hosohanghoa" class="min-w-full divide-y divide-gray-100 dark:divide-gray-200">

                            </table>
                        </div>
                        <div class=" w-full rounded-md mt-4 gap-10 text-white overflow-x-scroll">
                            <table class="min-w-full ">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 text-[#ceb4cd] font-thin text-center">#</th>
                                        <th class="px-4 py-2 text-[#ceb4cd] font-thin  text-start">Tên hàng hóa</th>
                                        <th class="px-4 py-2 text-[#ceb4cd] font-thin text-center">ĐVT</th>
                                        <th class="px-4 py-2 text-[#ceb4cd] font-thin text-center">Số lô</th>
                                        <th class="px-4 py-2 text-[#ceb4cd] font-thin text-center">Hạn dùng</th>
                                        <th class="px-4 py-2 text-[#ceb4cd] font-thin text-center">% KM</th>
                                        <th class="px-4 py-2 text-[#ceb4cd] font-thin text-end">Giá bán</th>
                                        <th class="px-4 py-2 text-[#ceb4cd] font-thin text-center">SL</th>
                                        <th class="px-4 py-2 text-[#ceb4cd] font-thin text-end">Thanh toán</th>
                                        <th class="px-4 py-2 text-[#ceb4cd] font-thin text-center">...</th>
                                    </tr>
                                </thead>
                                <tbody id='list_xuatkho_line' class="">

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!--/Grid Form-->
    </div>
</main>

<!-- Form delete-->
<div class="relative z-10 hidden" id="form_delete" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[red]'>Đồng ý xóa</p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_delete')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2   flex justify-center" id="" data-te-modal-body-ref>
                        <p id="ten_hanghoa_delete" class="text-lg "></p>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="soct_delete">
                    <input hidden id="rowid_delete">
                    <button type="button" onclick="delete_xuatkho_line()" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_delete')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form edit -->
<div class="relative z-10 hidden" id="form_edit" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[red]'>Chỉnh sửa</p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_edit')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 w-full " data-te-modal-body-ref>
                        <div class="w-full flex gap-5 pb-4">
                            <div class="w-1/2 ">
                                <label>Tên hàng hóa</label>
                                <input hidden id="mshh_edit_line">
                                <input id="tenhh_line_edit" class="w-full appearance-none block    border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" readonly>
                            </div>
                            <div class="w-1/2 ">
                                <label>Đơn vị tính</label>
                                <input id="dvt_line_edit" class="w-full appearance-none block    border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" readonly>
                            </div>
                        </div>
                        <div class="w-full flex gap-5 pb-4">

                            <div class="w-1/2 ">
                                <label>Số lô</label>
                                <input id="solo_line_edit" class="w-full appearance-none block    border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" autocomplete="off">
                            </div>
                            <div class="w-1/2 ">
                                <label>Hạn dùng</label>
                                <input id="handung_line_edit" type='date' class="w-full appearance-none block    border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]">
                            </div>
                        </div>
                        <div class="w-full flex gap-5 pb-4">

                            <div class="w-1/2 ">
                                <label>Giá nhập</label>
                                <input id="gianhap_line_edit" onkeyup="tinh_gianhapcothue_edit();_ChangeFormat(this)" class="w-full appearance-none block    border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" autocomplete="off" >
                            </div>
                            <div class="w-1/2 ">
                                <label>Chiết khấu(%)</label>
                                <input onkeyup="tinh_gianhapcothue_edit()" id="chietkhau_line_edit" class="w-full appearance-none block    border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" autocomplete="off">
                            </div>
                        </div>
                        <div class="w-full flex gap-5 pb-4">

                            <div class="w-1/2 ">
                                <label>Tiền chiết khấu</label>
                                <input id="tienchietkhau_line_edit" class="w-full appearance-none block    border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" readonly>
                            </div>
                            <div class="w-1/2 ">
                                <label>VAT</label>
                                <input id="vat_line_edit" onkeyup="tinh_gianhapcothue_edit()" class="w-full appearance-none block    border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" autocomplete="off">
                            </div>
                        </div>
                        <div class="w-full flex gap-5 pb-4">

                            <div class="w-1/2 ">
                                <label>Giá nhập VAT</label>
                                <input id="gianhapvat_line_edit" class="w-full appearance-none block    border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" readonly>
                            </div>
                            <div class="w-1/2 ">
                                <label>Số lượng</label>
                                <input id="soluong_line_edit" onkeyup="tinh_gianhapcothue_edit()" class="w-full appearance-none block    border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" autocomplete="off">
                            </div>
                        </div>
                        <div class="w-full flex gap-5 pb-4">
                            <div class="w-1/2 ">
                                <label>PT Giá bán</label>
                                <input id="ptgiaban_line_edit" onkeyup="tinh_gianhapcothue_edit()" class="w-full appearance-none block    border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" autocomplete="off">
                            </div>
                            <div class="w-1/2 ">
                                <label>Giá bán</label>
                                <input id="giaban_line_edit" class="w-full appearance-none block    border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" autocomplete="off">
                            </div>
                        </div>
                        <div class="w-full flex gap-5 pb-4">
                            <div class="w-1/2 ">
                                <label>Thành tiền</label>
                                <input id="thanhtien_line_edit" class="w-full appearance-none block    border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="soct_edit_line">
                    <button type="button" onclick="edit_nhapkho_line()" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px] ">Chỉnh</button>
                    <button type="button" onclick="close_modal('form_edit')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form thông báo -->
<div class="relative z-10 hidden" id="form_info" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
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
                        <button type="button" onclick="close_modal('form_info')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 flex justify-center" data-te-modal-body-ref>
                        <div id='img_thongbao' class="hidden">
                            <img src="vendor/img/success.png">
                        </div>
                        <p id="text_thongbao" class="text-md">Vui lòng nhập thông tin khách hàng</p>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">

                    <button type="button" onclick="close_modal('form_info')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form add loại xuất -->
<div class="relative z-10 hidden" id="form_add_loaixuat" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[green]'>Thêm loại xuất</p>
                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_loaixuat')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 " data-te-modal-body-ref>
                        <div class="w-full flex gap-5 pb-4">
                            <label class="whitespace-nowrap">Loại xuất</label>
                            <input id="tenloaixuat_add" class="w-full appearance-none block border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]">
                        </div>
                        <div>
                            <table class="min-w-full divide-y divide-gray-100 dark:divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 text-[black] font-thin text-center">#</th>
                                        <th class="px-4 py-2 text-[black] font-thin  text-start">Loại xuất</th>
                                        <th class="px-4 py-2 text-[black] font-thin text-center">...</th>
                                    </tr>
                                </thead>
                                <tbody id='list_loaixuat' class="divide-y divide-gray-100 dark:divide-gray-200 ">

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <button type="button" onclick="add_danhmuc('NLX')" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Thêm</button>
                    <button type="button" onclick="close_modal('form_add_loaixuat')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(async function() {
        lay_tonkho_baocao()
        load_xuatkho_line()
        load_loaixuat()
        tinh_tongcong()
    });
</script>
<script type="text/javascript" src="vendor/js/xuatkho.js?v=<?= md5_file('vendor/js/xuatkho.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var dateToday = new Date();
        $("#ngay input, #ngay_handung input").datepicker({
            autoclose: true,
            todayHighlight: true,
        });
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