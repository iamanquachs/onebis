<main class="bg_main">

    <div class="grid grid-cols-12 gap-3">
        <!--Grid Form-->

        <div class="col-span-4 tablet:col-span-12 phone:col-span-12 flex  flex-col md:flex-row lg:flex-row ">
            <div class="mb-2 bg-[#ffffff36] rounded shadow-sm w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-3 items-center  border-b border-[#ffffff40]">
                        <div class="flex gap-5 w-full items-center justify-between">
                            <p class="text-lg text-[#83ff00]">Danh sách Voucher</p>
                            <div>
                                <img onclick="open_modal('form_add_voucher')" src="vendor/img/add.png">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-3 ">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class=" px-4 py-2 text-center font-thin">#</th>
                                <th class=" px-4 py-2 text-center font-thin">Ngày</th>
                                <th class=" px-4 py-2 text-start font-thin ">Voucher</th>
                            </tr>
                        </thead>
                        <tbody id='list_voucher_header' class="text-white">

                        </tbody>
                    </table>

                </div>
            </div>
            <div class="mb-2 bg-[#ffffff36] rounded shadow-sm w-full">

                <div class="py-5 px-3">
                    <div class="w-full flex gap-3">
                        <form onsubmit="return false;" class="w-full">
                            <input type="text" onkeyup="load_voucher_header()" id="_search" class="w-full text-left appearance-none block border-b border-[#f568e3]  px-4 pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-white" placeholder="Tìm tên voucher hoặc SĐT" autocomplete="off">
                        </form>

                    </div>

                    <div class="grid grid-cols-12 gap-3 pt-5 phone:gap-2 items-end justify-between">
                        <div id="tungay" class="col-span-4 input-group date text-white" data-date-format="dd/mm/yyyy">
                            <input id="tungay_input" data-date-format="dd/mm/yyyy" class=" w-full text-center bg-transparent border-b border-[#ffffff40] " type="text" value="<?= date('d/m/Y'); ?>"> <span class="input-group-addon"></span>
                        </div>
                        <span class="col-span-1 text-center text-white">Đến</span>
                        <div id="denngay" class=" col-span-4 input-group date text-white" data-date-format="dd/mm/yyyy">
                            <input id="denngay_input" data-date-format="dd/mm/yyyy" class=" w-full text-center bg-transparent border-b border-[#ffffff40] " type="text" value="<?= date('d/m/Y', strtotime('+30 day', strtotime(date('Y-m-d')))); ?>"> <span class="input-group-addon"></span>
                        </div>
                        <select id="trangthai_loc" onchange="load_voucher_header(), load_voucher() " class="text-white  col-span-3 rounded-sm bg-transparent border-b border-[#f568e3] focus:outline-none pb-2">
                            <option class='text-[#747474]' value="">Trạng thái</option>
                            <option class='text-black' value="1">Đã dùng</option>
                            <option class='text-black' value="0">Chưa dùng</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-span-8 tablet:col-span-12 phone:col-span-12">
            <div class="mb-2 bg-[#ffffff36] rounded shadow-sm w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-2 pb-[0.7rem] items-center  border-b border-[#ffffff40]">
                        <div class="flex gap-5  items-center ">
                            <p class="text-lg text-[#83ff00]">Chi tiết Voucher <span class="lowercase" id="tenvoucher_load"></span></p>
                        </div>
                        <input hidden id="msvoucher_load">
                        <div id="btn_add_chitiet_voucher" class="flex gap-5 hidden">
                            <button class="" onclick="open_modal('form_add_voucher_chitiet')"><img src="vendor/img/add.png"></button>
                        </div>
                    </div>
                </div>
                <div class="py-3 phone:overflow-x-scroll">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class=" px-4 py-2 text-center font-thin">#</th>
                                <th class=" px-4 py-2 text-start font-thin">Khách hàng</th>
                                <th class=" px-4 py-2 text-start font-thin">Nhóm</th>
                                <th class=" px-4 py-2 text-right font-thin">Số tiền</th>
                                <th class=" px-4 py-2 font-thin text-center">Thời hạn</th>
                                <th class=" px-4 py-2 font-thin text-center">Đã dùng</th>
                                <th class=" px-4 py-2 font-thin text-left">...</th>
                            </tr>
                        </thead>
                        <tbody id='list_voucher_chitiet' class="text-white">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</main>
<!-- Form add voucher-->
<div class="relative z-10 hidden" id="form_add_voucher" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal !text-[green]" id="exampleModalLabel">
                            Thêm mới voucher
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_voucher')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4  " data-te-modal-body-ref>

                        <div id='' class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Đối tượng</p>
                            <select id="loaikh" onchange="loai_khachhang()" class='col-span-8  border-b px-2  border-[#ddd] text-[black]'>
                                <option value="0">Tất cả khách hàng</option>
                                <option value="1">Nhóm khách hàng</option>
                                <option value="2">Một khách hàng</option>
                            </select>
                        </div>
                        <div id='form_nhom_kh' class="grid grid-cols-12 w-full justify-between items-center py-3 hidden">
                            <p class="col-span-4  text-[black]">Nhóm</p>
                            <select id="nhom_kh_add" onchange="loai_khachhang()" class='col-span-8  border-b px-2  border-[#ddd] text-[black]'>

                            </select>
                        </div>
                        <div id="mskh" class="grid grid-cols-12 w-full justify-between items-center py-3 hidden">
                            <p class="col-span-4  text-[black]">Số điện thoại</p>
                            <div class="col-span-8 ">
                                <input id="mskh_add" onkeyup="tim_khachhang() " class='w-full border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">

                            </div>
                        </div>
                        <div id="form_khachhang" class="max-h-[200px] overflow-y-scroll hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead>
                                    <tr>
                                        <th class=" px-4 py-2">#</th>
                                        <th class=" px-4 py-2">Tên khách hàng </th>
                                    </tr>
                                </thead>
                                <tbody id='list_khachhang' class="list_sanpham divide-y divide-gray-200 dark:divide-gray-700">

                                </tbody>
                            </table>
                        </div>

                        <div id='tenkh' class="grid grid-cols-12 w-full justify-between items-center py-3 hidden">
                            <p class="col-span-4  text-[black]">Tên khách hàng</p>
                            <input id="tenkh_add" class='col-span-8  border-b px-2  border-[#ddd] text-[black]' type="text" readonly>
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Tên voucher</p>
                            <input id="tenvoucher_add" class='col-span-8  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Số tiền</p>
                            <input id="sotien_add" onkeyup="_ChangeFormat(this) " class='col-span-8  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
                        </div>

                        <div id="handung" class="input-group date grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Thời hạn</p>
                            <input id="handung_input" class=" col-span-8 form-control border-b px-2  border-[#ddd] text-start bg-transparent " type="text" data-date-format="dd/mm/yyyy" value="<?= date('d/m/Y', strtotime('+30 day', strtotime(date('Y-m-d')))); ?>"> <span class="input-group-addon"></span>
                        </div>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <button type="button" id='btn_chi' onclick="add_voucher()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_add_voucher')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form add voucher chitiet-->
<div class="relative z-10 hidden" id="form_add_voucher_chitiet" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal !text-[green]" id="exampleModalLabel">
                            Thêm chi tiết voucher <span class="lowercase" id="ten_voucher_add_chitiet"></span>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_voucher_chitiet')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4  " data-te-modal-body-ref>

                        <div id='' class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Đối tượng</p>
                            <select id="loaikh_chitiet" onchange="loai_khachhang_chitiet()" class='col-span-8  border-b px-2  border-[#ddd] text-[black]'>
                                <option value="0">Tất cả khách hàng</option>
                                <option value="1">Nhóm khách hàng</option>
                                <option value="2">Một khách hàng</option>
                            </select>
                        </div>
                        <div id='form_nhom_kh_chitiet' class="grid grid-cols-12 w-full justify-between items-center py-3 hidden">
                            <p class="col-span-4  text-[black]">Nhóm</p>
                            <select id="nhom_kh_add_chitiet" onchange="loai_khachhang_chitiet()" class='col-span-8  border-b px-2  border-[#ddd] text-[black]'>

                            </select>
                        </div>
                        <div id="mskh_chitiet" class="grid grid-cols-12 w-full justify-between items-center py-3 hidden">
                            <p class="col-span-4  text-[black]">Số điện thoại</p>
                            <div class="col-span-8 ">
                                <input id="mskh_add_chitiet" onkeyup="tim_khachhang_chitiet() " class='w-full border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">

                            </div>
                        </div>
                        <div id="form_khachhang_chitiet" class="max-h-[200px] overflow-y-scroll hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead>
                                    <tr>
                                        <th class=" px-4 py-2">#</th>
                                        <th class=" px-4 py-2">Tên khách hàng </th>
                                    </tr>
                                </thead>
                                <tbody id='list_khachhang_chitiet' class="list_sanpham divide-y divide-gray-200 dark:divide-gray-700">

                                </tbody>
                            </table>
                        </div>

                        <div id='tenkh_chitiet' class="grid grid-cols-12 w-full justify-between items-center py-3 hidden">
                            <p class="col-span-4  text-[black]">Tên khách hàng</p>
                            <input id="tenkh_add_chitiet" class='col-span-8  border-b px-2  border-[#ddd] text-[black]' type="text" readonly>
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Số tiền</p>
                            <input id="sotien_add_chitiet" onkeyup="_ChangeFormat(this) " class='col-span-8  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
                        </div>

                        <div id="handung_chitiet" class="input-group date grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Thời hạn</p>
                            <input id="handung_input_chitiet" class=" col-span-8 form-control border-b px-2  border-[#ddd] text-start bg-transparent " type="text" data-date-format="dd/mm/yyyy" value="<?= date('d/m/Y', strtotime('+30 day', strtotime(date('Y-m-d')))); ?>"> <span class="input-group-addon"></span>
                        </div>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <button type="button" id='btn_chi' onclick="add_voucher_chitiet()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_add_voucher_chitiet')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form delete voucher-->
<div class="relative z-10 hidden" id="form_delete_voucher" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[red]'>Đồng ý xóa</p>
                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_delete_voucher')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2   flex justify-center" id="" data-te-modal-body-ref>
                        <p id="tenvoucher_delete" class="text-lg "></p>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="rowid_delete">
                    <button type="button" onclick="delete_voucher()" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_delete_voucher')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form edit voucher-->
<div class="relative z-10 hidden" id="form_edit_thuchi" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            Chỉnh sửa phiếu <span id="loai_phieu_edit"></span>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_edit_thuchi')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4  " data-te-modal-body-ref>

                        <div id='khoanmuc_thu_edit' class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Khoản mục</p>
                            <select id="khoanmucthu_edit" class='col-span-6  border-b px-2  border-[#ddd] text-[black]'>

                            </select>
                            <div class="col-span-2 flex justify-end __icon">
                                <button id="icon_add_danhmuc_edit" class="focus:outline-none icon_add" onclick="_show_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                <button id="icon_remove_danhmuc_edit" class="focus:outline-none transition rotate-45  hidden icon_remove" onclick="_hidden_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                            </div>
                            <div id="show_danhmuc" class="col-span-12 grid grid-cols-12 w-full items-center mt-4 hidden __show">
                                <div class="col-span-10">
                                    <input class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tendanhmuc_add" type="text" placeholder="Tên danh mục">
                                </div>
                                <div class="flex justify-center items-center col-span-2">
                                    <button onclick="add_khoanmuc(this, 'THU', 'LTC')" class="rounded-md p-2  text-white text-xs"><img class="" src="vendor/img/checked.png"></button>
                                </div>
                            </div>
                        </div>
                        <div id='khoanmuc_chi_edit' class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Khoản mục</p>
                            <select id="khoanmucchi_edit" class='col-span-6  border-b px-2  border-[#ddd] text-[black]'>

                            </select>
                            <div class="col-span-2 flex justify-end __icon">
                                <button id="icon_add_danhmuc_edit" class="focus:outline-none icon_add" onclick="_show_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                <button id="icon_remove_danhmuc_edit" class="focus:outline-none transition rotate-45  hidden icon_remove" onclick="_hidden_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                            </div>
                            <div id="show_danhmuc" class="col-span-12 grid grid-cols-12 w-full items-center mt-4 hidden __show">
                                <div class="col-span-10">
                                    <input class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tendanhmuc_add" type="text" placeholder="Tên danh mục">
                                </div>
                                <div class="flex justify-center items-center col-span-2">
                                    <button onclick="add_khoanmuc(this,'CHI','LTC')" class=" rounded-md p-2  text-white text-xs"><img class="" src="vendor/img/checked.png"></button>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Số tiền</p>
                            <input id="sotien_edit" onkeyup="_ChangeFormat(this) " class='col-span-8  border-b px-2  border-[#ddd] text-[black]' type="text">
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Nội dung</p>
                            <input id="noidung_edit" class='col-span-8  border-b px-2  border-[#ddd] text-[black]' type="text">
                        </div>
                        <div id="nguoinop_thu_edit" class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Người nộp</p>
                            <select id="nguoinop_edit" class='col-span-8  border-b px-2  border-[#ddd] text-[black]'>

                            </select>
                        </div>
                        <div id="nguoinhan_chi_edit" class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Người nhận</p>
                            <select id="nguoinhan_edit" class='col-span-8  border-b px-2  border-[#ddd] text-[black]'>

                            </select>
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Ngân quỹ</p>
                            <select id="nganquy_edit" class='col-span-8  border-b px-2  border-[#ddd] text-[black]'>
                                <option value="TM">Tiền mặt</option>
                                <option value="NH">Ngân hàng</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="soct_edit">
                    <button type="button" id="btn_thu_edit" onclick="edit_thuchi('thu')" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" id='btn_chi_edit' onclick="edit_thuchi('chi')" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_edit_thuchi')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(async function() {
        await load_nhom_kh()
        load_voucher_header()

    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var dateToday = new Date();
        $("#tungay input, #denngay input, #handung input").datepicker({
            autoclose: true,
            todayHighlight: true,
        }).on('changeDate', async function() {
            await load_voucher_header()
            load_voucher()
        });
        $('#tungay input').datepicker('update', new Date());
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
<script type="text/javascript" src="vendor/js/voucher.js?v=<?= md5_file('vendor/js/voucher.js') ?>"></script>