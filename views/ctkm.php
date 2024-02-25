<main class="bg_main">
    <div class="grid grid-cols-12 gap-3 tablet:gap-1">
        <!--Grid Form-->

        <div class="col-span-3 tablet:col-span-12 phone:col-span-12 flex flex-1  flex-col md:flex-row lg:flex-row ">
            <div class="mb-2 bg-[#ffffff36] rounded shadow-sm w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-3 items-center  border-b border-[#ffffff40]">
                        <div class="flex gap-5 w-full items-center justify-between">
                            <p class="text-lg text-[#83ff00]">Danh sách CTKM</p>
                            <div>
                                <img onclick="open_modal('form_add_ctkm')" src="vendor/img/add.png">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-3 ">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class=" px-4 py-2 text-center font-thin">#</th>
                                <th class=" px-4 py-2 text-start font-thin ">Tên CTKM</th>
                                <th class=" px-4 py-2 text-center font-thin ">...</th>
                            </tr>
                        </thead>
                        <tbody id='list_ctkm_header' class="text-white">

                        </tbody>
                    </table>

                </div>
            </div>
            <div class="mb-2 bg-[#ffffff36] rounded shadow-sm w-full">

                <div class="py-5 px-3  tablet:grid tablet:grid-cols-12 tablet:gap-7 phone:grid phone:grid-cols-12 phone:gap-3">
                    <div class="w-full flex gap-3 tablet:col-span-12 phone:col-span-12">
                        <input onkeyup="ctkm_search()" id="tenctkm_search" class="w-1/2 appearance-none block border-b border-[#ffffff40]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[14px] text-white" placeholder="Tìm kiếm" autocomplete="off">
                        <input onkeyup="load_header()" id="songayhethan_filter" class="w-1/2 appearance-none block border-b border-[#ffffff40]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[14px] text-white" placeholder="Số ngày hết hạn" autocomplete="off">
                    </div>



                    <div class="grid grid-cols-12 gap-3 pt-5 items-center justify-between tablet:col-span-6 tablet:items-end phone:col-span-12 phone:items-end">
                        <div id="tungay" class="col-span-5 input-group date text-white" data-date-format="dd/mm/yyyy">
                            <input id="tungay_input" data-date-format="dd/mm/yyyy" onchange="load_header()" class="w-full text-center bg-transparent border-b border-[#ffffff40] " type="text" value="<?= date('d/m/Y'); ?>"> <span class="input-group-addon"></span>
                        </div>
                        <span class="col-span-2 text-center text-white">Đến</span>
                        <div id="denngay" class=" col-span-5 input-group date text-white" data-date-format="dd/mm/yyyy">
                            <input id="denngay_input" data-date-format="dd/mm/yyyy" onchange="load_header()" class="w-full text-center bg-transparent border-b border-[#ffffff40] " type="text" value="<?= date('d/m/Y', strtotime('+30 day', strtotime(date('Y-m-d')))); ?>"> <span class="input-group-addon"></span>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="col-span-9 tablet:col-span-12 phone:col-span-12">
            <div class="mb-2 bg-[#ffffff36] rounded shadow-sm w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-2 pb-[0.7rem] items-center  border-b border-[#ffffff40]">
                        <div class="flex gap-5  items-center ">
                            <p class="text-lg text-[#83ff00]">Chi tiết CTKM</p>
                            <input onkeyup="ctkm_search_hanghoa_dichvu()" id="search_hanghoa_dichvu" class="w--[200px] appearance-none block border-b border-[#ffffff40]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[14px] text-white" placeholder="Tìm hàng hóa, dịch vụ" autocomplete="off">
                        </div>
                        <input hidden id="ms_chitiet_ctkm">
                        <input hidden id="ten_chitiet_ctkm">
                        <div id="btn_add_chitiet_ctkm" class="flex gap-5 hidden">
                            <button class="" onclick="open_add_chitiet_ctkm()"><img src="vendor/img/add.png"></button>

                        </div>
                    </div>
                </div>
                <div class="py-3 phone:overflow-x-scroll">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class=" px-4 py-2 text-center font-thin">#</th>
                                <th class=" px-4 py-2 text-center font-thin">MSHH</th>
                                <th class=" px-4 py-2 text-start font-thin">Tên hàng hóa</th>
                                <th class=" px-4 py-2 text-center font-thin">% Giảm</th>
                                <th class=" px-4 py-2 font-thin text-center">Từ ngày</th>
                                <th class=" px-4 py-2 font-thin text-center">Đến ngày</th>
                                <th class=" px-4 py-2 font-thin text-start">...</th>
                                <th class=" px-4 py-2 font-thin text-center">...</th>
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
<!-- Form add ctkm header -->
<div class="relative z-10 hidden" id="form_add_ctkm" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full  justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[green]'>Thêm mới CTKM</p>
                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_ctkm')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class=" p-4" id="" data-te-modal-body-ref>
                        <div id='' class="grid grid-cols-12 w-full justify-between items-center py-3 ">
                            <p class="col-span-3  text-[black]">Tên CTKM</p>
                            <input id="ten_header_ctkm_add" class='col-span-9  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3 ">
                            <p class="col-span-3  text-[black]">Loại KM</p>

                            <select id="loai_khuyenmai" onchange="loai_khuyenmai()" class="col-span-9  rounded-sm bg-transparent border-b border-[#f568e3] focus:outline-none pb-2">
                                <option class='text-black' value="0" selected>Theo sản phẩm</option>
                                <option class='text-black' value="1">Tất cả sản phẩm</option>
                                <option class='text-black' value="2">Nhóm sản phẩm</option>
                            </select>
                        </div>
                        <div id="form_chon_nhom_hanghoa" class="grid grid-cols-12 w-full justify-between items-center py-3 hidden">
                            <p class="col-span-3  text-[black]">Loại hàng hóa</p>

                            <select id="list_nhom_hh" class="col-span-9  rounded-sm bg-transparent border-b border-[#f568e3] focus:outline-none pb-2">

                            </select>
                        </div>
                        <div id='form_chon_hanghoa' class="grid grid-cols-12 w-full justify-between items-center py-3 ">
                            <p class="col-span-3  text-[black]">Tên HH/DV</p>
                            <input hidden id="mshh_header_ctkm_add">
                            <input id="tenhh_header_ctkm_add" onkeyup="find_hanghoa_header(this)" class='col-span-9  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
                            <div id="form_hanghoa_header" class="hidden col-span-12 ">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead>
                                        <tr>
                                            <th class=" px-4 py-2">#</th>
                                            <th class=" px-4 py-2">Tên HH/DV </th>
                                        </tr>
                                    </thead>
                                    <tbody id='list_sanpham_header' class="list_sanpham divide-y divide-gray-200 dark:divide-gray-700">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id='' class="grid grid-cols-12 w-full justify-between items-center py-3 ">
                            <p class="col-span-3  text-[black]">% Giảm</p>
                            <input id="ptgiam_header_ctkm_add" class='col-span-9  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
                        </div>
                        <div class="donhang_filter_div w-full">
                            <div id="tungay_header" class="input-group date text-black grid grid-cols-12 w-full justify-between items-center py-3" data-date-format="dd/mm/yyyy">
                                <p class="col-span-3  text-[black]">Từ ngày</p>
                                <input id="tungay_header_input" onchange="load_header()" data-date-format="dd/mm/yyyy" class="col-span-9  form-control text-start bg-transparent border-b border-[#ddd] " type="text" value="<?= date('d/m/Y') ?>"> <span class="input-group-addon"></span>
                            </div>

                            <div id="denngay_header" class="input-group date text-black grid grid-cols-12 w-full justify-between items-center py-3" data-date-format="dd/mm/yyyy">
                                <p class="col-span-3  text-[black]">Đến ngày</p>
                                <input id="denngay_header_input" onchange="load_header()" data-date-format="dd/mm/yyyy" class="col-span-9 form-control text-start bg-transparent border-b border-[#ddd] " type="text" value="<?= date('d/m/Y') ?>"> <span class="input-group-addon"></span>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="soct_delete">
                    <button type="button" onclick="add_ctkm_header()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_add_ctkm')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form add chi tiết ctkm -->
<div class="relative z-10 hidden" id="form_add_chitiet_ctkm" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full  justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[green]'>Thêm chi tiết CTKM <span id="ten_add_chitiet_ctkm"></span></p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_chitiet_ctkm')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2 px-4 " id="" data-te-modal-body-ref>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3 ">
                            <p class="col-span-3  text-[black]">Loại KM</p>

                            <select id="loai_khuyenmai_chitiet" onchange="loai_khuyenmai_chitiet()" class="col-span-9  rounded-sm bg-transparent border-b border-[#f568e3] focus:outline-none pb-2">
                                <option class='text-black' value="0" selected>Theo sản phẩm</option>
                                <option class='text-black' value="1">Tất cả sản phẩm</option>
                                <option class='text-black' value="2">Nhóm sản phẩm</option>
                            </select>
                        </div>
                        <div id="form_chon_nhom_hanghoa_chitiet" class="grid grid-cols-12 w-full justify-between items-center py-3 hidden">
                            <p class="col-span-3  text-[black]">Loại hàng hóa</p>

                            <select id="list_nhom_hh_chitiet" class="col-span-9  rounded-sm bg-transparent border-b border-[#f568e3] focus:outline-none pb-2">

                            </select>
                        </div>
                        <div id='form_chon_hanghoa_chitiet' class="grid grid-cols-12 w-full justify-between items-center py-3 ">
                            <p class="col-span-3  text-[black]">Tên HH/DV</p>
                            <input hidden id="mshh_chitiet_ctkm_add">
                            <input id="tenhh_chitiet_ctkm_add" onkeyup="find_hanghoa(this)" class='col-span-9  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
                            <div id="form_hanghoa" class="hidden col-span-12 ">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead>
                                        <tr>
                                            <th class=" px-4 py-2">#</th>
                                            <th class=" px-4 py-2">Tên HH/DV </th>
                                        </tr>
                                    </thead>
                                    <tbody id='list_sanpham' class="list_sanpham divide-y divide-gray-200 dark:divide-gray-700">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id='tenkh' class="grid grid-cols-12 w-full justify-between items-center py-3 ">
                            <p class="col-span-3  text-[black]">% Giảm</p>
                            <input id="ptgiam_chitiet_ctkm_add" class='col-span-9  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
                        </div>
                        <div class="donhang_filter_div w-full">
                            <div id="tungay_chitiet" class="input-group date text-black grid grid-cols-12 w-full justify-between items-center py-3" data-date-format="dd/mm/yyyy">
                                <p class="col-span-3  text-[black]">Từ ngày</p>
                                <input id="tungay_chitiet_input" onchange="load_header()" data-date-format="dd/mm/yyyy" class="col-span-9  form-control text-start bg-transparent border-b border-[#ddd] " type="text" value="<?= date('d/m/Y') ?>"> <span class="input-group-addon"></span>
                            </div>

                            <div id="denngay_chitiet" class="input-group date text-black grid grid-cols-12 w-full justify-between items-center py-3" data-date-format="dd/mm/yyyy">
                                <p class="col-span-3  text-[black]">Đến ngày</p>
                                <input id="denngay_chitiet_input" onchange="load_header()" data-date-format="dd/mm/yyyy" class="col-span-9 form-control text-start bg-transparent border-b border-[#ddd] " type="text" value="<?= date('d/m/Y') ?>"> <span class="input-group-addon"></span>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="soct_delete">
                    <button type="button" onclick="add_chitiet_ctkm()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_add_chitiet_ctkm')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form delete ctkm  -->
<div class="relative z-10 hidden" id="form_delete_ctkm" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full  justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[red]'>Đồng ý xóa</p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_delete_ctkm')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 " data-te-modal-body-ref>
                        <p id="tenhh_delete" class="text-center"></p>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="rowid_delete">
                    <input hidden id="msctkm_delete">
                    <button type="button" onclick="delete_chitiet_ctkm()" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-600 px-5 py-2 text-[14px]  text-white shadow-sm  hover:bg-red-500 sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_delete_ctkm')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form delete ctkm header -->
<div class="relative z-10 hidden" id="form_delete_ctkm_header" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full  justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[red]'>Đồng ý xóa</p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_delete_ctkm_header')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 " data-te-modal-body-ref>
                        <p id="tenhh_delete_header" class="text-center"></p>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="msctkm_delete_header">
                    <button type="button" onclick="delete_ctkm_header()" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-600 px-5 py-2 text-[14px]  text-white shadow-sm  hover:bg-red-500 sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_delete_ctkm_header')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        load_header()
        load_nhom_hh()
    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var dateToday = new Date();
        $("#tungay input, #denngay input,#tungay_chitiet input, #denngay_chitiet input,#tungay_header input, #denngay_header input").datepicker({
            autoclose: true,
            todayHighlight: true,
        }).on('changeDate', async function() {
            await load_header()
        });
        // $('#tungay input').datepicker('update', new Date());
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
<script type="text/javascript" src="vendor/js/khuyenmai.js?v=<?= md5_file('vendor/js/khuyenmai.js') ?>"></script>