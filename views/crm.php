<main class="bg_main">
    <div class="grid grid-cols-12 gap-3 tablet:gap-1">
        <!--Grid Form-->
        <div class="mb-2 col-span-12">
            <h2 id="title_dathen" class="text-white text-xl text-center  p-2  rounded-md">CUSTOMER RELATIONSHIP MANAGEMENT (CRM)</h2>
        </div>
        <div class="col-span-3 tablet:col-span-12 phone:col-span-12 flex flex-1  flex-col md:flex-row lg:flex-row ">
            <div class="mb-2 bg-[#ffffff36] rounded shadow-sm w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-3 items-center  border-b border-[#ffffff40]">
                        <div class="flex gap-5 w-full items-center justify-between">
                            <p class="text-lg text-[#83ff00]">Khách hàng</p>
                            <div class="flex gap-3 items-center">
                                <button onclick="get_crm()">
                                    <img id="img_load_crm" class="w-[24px] h-[24px]" src='vendor/img/wait32.png'>
                                </button>
                                <button onclick="open_modal('form_add_header_crm')">
                                    <img class="w-[24px] h-[24px]" src='vendor/img/add.png'>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-3 ">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class=" px-4 py-2 text-center font-thin">#</th>
                                <th class=" px-4 py-2 text-center font-thin ">Điện thoại</th>
                                <th class=" px-4 py-2 text-left font-thin ">Khách hàng</th>
                                <th class=" px-4 py-2 text-center font-thin ">ID</th>
                                <th class=" px-4 py-2 text-center font-thin ">Loại</th>
                            </tr>
                        </thead>
                        <tbody id='list_crm_header' class="text-white">

                        </tbody>
                    </table>

                </div>
            </div>
            <div class="mb-2 bg-[#ffffff36] rounded shadow-sm w-full">

                <div class="py-5 px-3  tablet:grid tablet:grid-cols-12 tablet:gap-7 phone:grid phone:grid-cols-12 phone:gap-3">
                    <div class="w-full flex gap-3 tablet:col-span-12 phone:col-span-12">
                        <input onkeyup="crm_search()" id="search" class="w-1/2 appearance-none block border-b border-[#ffffff40]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[14px] text-white" placeholder="Tìm tên, SĐT" autocomplete="off">
                    </div>

                    <div class="grid grid-cols-12 gap-3 pt-5 items-center justify-between tablet:col-span-6 tablet:items-end phone:col-span-12 phone:items-end">
                        <select onchange="load_header()" class="col-span-6 mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-[white]" id="list_filter_trangthai" type="text">

                        </select>
                        <select onchange="load_header()" class="col-span-6 mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-[white]" id="list_filter_nhanvien" type="text">

                        </select>

                    </div>
                </div>

            </div>
        </div>
        <div class="col-span-9 tablet:col-span-12 phone:col-span-12">
            <div class="mb-2 bg-[#ffffff36] rounded shadow-sm w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-2 pb-[0.7rem] items-center  border-b border-[#ffffff40]">
                        <div class="flex gap-5  items-center ">
                            <p class="text-lg text-[#83ff00]">Nhật ký</p>
                            <select onchange="load_line('')" class=" mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-[white]" id="list_filter_khachhang" type="text">

                            </select>
                        </div>
                        <input hidden id="msdn_crm" value="<?= $_COOKIE['msdn'] ?>">
                        <input hidden id="sodienthoai_crm_line">
                        <input hidden id="nhatky_crm_line">
                        <div id="btn_add_chitiet_crm" class="flex gap-5 hidden">
                            <button class="" onclick="open_add_chitiet_crm()"><img src="vendor/img/add.png"></button>
                        </div>
                    </div>
                </div>
                <div class="py-3 phone:overflow-x-scroll">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class=" px-4 py-2 text-center font-thin">#</th>
                                <th class=" px-4 py-2 text-center font-thin">Ngày</th>
                                <th class=" px-4 py-2 text-start font-thin">Họ tên</th>
                                <th class=" px-4 py-2 font-thin text-left">Nội dung</th>
                                <th class=" px-4 py-2 font-thin text-left">Trạng thái</th>
                                <th class=" px-4 py-2 font-thin text-center">...</th>
                            </tr>
                        </thead>
                        <tbody id='list_crm_line' class="text-white">

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</main>
<!-- Form add header crm -->
<div class="relative z-10 hidden" id="form_add_header_crm" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full  justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[green]'>Thêm khách hàng</p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_header_crm')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2 px-4 " id="" data-te-modal-body-ref>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3 ">
                            <p class="col-span-3  text-[black]">Số điện thoại</p>
                            <input id="dienthoai_add_header" onfocusout="find_khachhang()" class='col-span-9  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3 ">
                            <p class="col-span-3  text-[black]">Tên khách hàng</p>
                            <input id="tenkh_add_header" class='col-span-9  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3 ">
                            <p class="col-span-3  text-[black]">Nội dung</p>
                            <input id="noidung_add_header" class='col-span-9  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <p id="error_add_header" class="text-[red] hidden ">Hãy nhập đầy đủ thông tin</p>
                    <button type="button" onclick="add_crm_header()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_add_header_crm')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form add chi tiết crm -->
<div class="relative z-10 hidden" id="form_add_chitiet_crm" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full  justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[green]'>Thêm nhật ký CRM <span id="ten_add_chitiet_ctkm"></span></p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_chitiet_crm')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2 px-4 " id="" data-te-modal-body-ref>
                        <div id='tenkh' class="grid grid-cols-12 w-full justify-between items-center py-3 ">
                            <p class="col-span-3  text-[black]">Nội dung</p>
                            <input id="noidung_add" class='col-span-9  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3 ">
                            <p class="col-span-3  text-[black]">Trạng thái</p>

                            <select id="loai_trangthai_add" class="col-span-9  rounded-sm bg-transparent border-b border-[#f568e3] focus:outline-none pb-2">

                            </select>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <p id="error_add" class="text-[red] hidden ">Hãy nhập đầy đủ thông tin</p>
                    <button type="button" onclick="add_crm_line()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_add_chitiet_crm')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form edit crm  -->
<div class="relative z-10 hidden" id="form_edit_chitiet_crm" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full  justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[red]'>Chỉnh nhật kí <span id="vitri_edit"></span></p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_edit_chitiet_crm')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 " data-te-modal-body-ref>
                        <div id='tenkh' class="grid grid-cols-12 w-full justify-between items-center py-3 ">
                            <p class="col-span-3  text-[black]">Nội dung</p>
                            <input id="noidung_edit" class='col-span-9  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3 ">
                            <p class="col-span-3  text-[black]">Trạng thái</p>

                            <select id="loai_trangthai_edit" class="col-span-9  rounded-sm bg-transparent border-b border-[#f568e3] focus:outline-none pb-2">

                            </select>
                        </div>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="rowid_edit">
                    <input hidden id="soct_edit">
                    <p id="error_chinhsua" class="text-[red] hidden ">Hãy nhập đầy đủ thông tin</p>
                    <button type="button" onclick="edit_chitiet_crm()" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-600 px-5 py-2 text-[14px]  text-white shadow-sm  hover:bg-red-500 sm:mt-0 max-w-[100px] ">Chỉnh</button>
                    <button type="button" onclick="close_modal('form_edit_chitiet_crm')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        get_crm()
        load_header()
        load_trangthai()
        load_nhanvien()
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
<script type="text/javascript" src="vendor/js/crm.js?v=<?= md5_file('vendor/js/crm.js') ?>"></script>