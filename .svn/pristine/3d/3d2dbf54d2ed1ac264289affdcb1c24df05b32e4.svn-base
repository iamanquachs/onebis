<main class="bg_main ">

    <div class="flex flex-col">
        <!--Grid Form-->
        <div class="flex flex-1  flex-col md:flex-row lg:flex-row ">
            <div class="mb-2 rounded shadow-sm w-full">
                <div class="">
                    <div class="bg-[#ffffff36] rounded-md flex justify-between px-3 py-2 items-center tablet:grid tablet:grid-cols-12 phone:grid phone:grid-cols-12  gap-3  tablet:justidy-between phone:justidy-between">
                        <div class="flex gap-5 tablet:col-span-12 tablet:justify-center phone:col-span-12 phone:justify-center items-center ">
                            <p class="text-lg text-[#83ff00] whitespace-nowrap">Thu chi</p>
                        </div>
                        <form onsubmit="return false;" class="tablet:col-span-6 tablet:mt-3 phone:col-span-12 phone:mt-3">
                            <input type="text" onkeyup="load_thuchi()" id="_search" class="w-[300px] laptop:w-[200px] phone:w-full text-left appearance-none block border-b border-[#f568e3]  px-4 pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[14px] text-white" placeholder="Tìm kiếm" autocomplete="off">
                        </form>
                        <div style="display: flex;  border-radius: 5px; background-color: #e4fae9;" class="tablet:col-span-6 tablet:justify-between phone:col-span-12 phone:justify-between phone:mt-3">
                            <div id="tungay" class="input-group date flex items-center pl-4" data-date-format="dd/mm/yyyy">
                                <p class="whitespace-nowrap">Từ ngày</p>
                                <input id="tungay_input" data-date-format="dd/mm/yyyy" onchange="load_thuchi()" class="form-control text-center bg-transparent tablet:w-[100px] phone:w-[100px] laptop:w-[100px]" type="text" value="<?= date('d/m/Y'); ?>"> <span class="input-group-addon"></span>
                            </div>
                            <div id="denngay" class="input-group date flex items-center" data-date-format="dd/mm/yyyy">
                                <p class="whitespace-nowrap">Đến ngày</p>
                                <input id="denngay_input" data-date-format="dd/mm/yyyy" onchange="load_thuchi()" class="form-control text-center bg-transparent tablet:w-[100px] phone:w-[100px] laptop:w-[100px]" type="text" value="<?= date('d/m/Y'); ?>"> <span class="input-group-addon"></span>
                            </div>
                        </div>
                        <div class="tablet:col-span-3 tablet:mt-3 phone:col-span-6 phone:mt-2">
                            <select id="trangthai_loc" onchange="load_thuchi()" class="text-white rounded-sm bg-transparent border-b border-[#f568e3] focus:outline-none">
                                <option class='text-[#747474]' value="">Tất cả thu chi</option>

                                <option class='text-black' value="0">Thu</option>
                                <option class='text-black' value="1">Chi</option>
                            </select>
                        </div>
                        <div class="tablet:col-span-3 tablet:mt-2 phone:col-span-6 phone:mt-2">
                            <select id="khoanmuc_loc" onchange="load_thuchi()" class="text-white rounded-sm bg-transparent border-b border-[#f568e3]  focus:outline-none">
                                <option selected value="">Tất cả khoản mục</option>
                            </select>
                        </div>
                        <div class="flex gap-5 items-center tablet:col-span-6 tablet:justify-end tablet:mt-2 phone:col-span-12 phone:justify-end phone:mt-2">
                            <button type="button" onclick="open_add_thu()" class="bg-[green] border-none px-5 py-2 text-white rounded-md whitespace-nowrap" data-target="#form_add_thu" data-toggle="modal">Tạo phiếu thu</button>
                            <button type="button" onclick="open_add_chi()" class="bg-[#edf74b] border-none px-5 py-2 text-black rounded-md whitespace-nowrap" data-target="#form_add_chi" data-toggle="modal">Tạo phiếu chi</button>
                        </div>
                    </div>

                </div>
                <div class="py-3 overflow-x-scroll">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class=" px-4 py-2 text-center font-thin">#</th>
                                <th class=" px-4 py-2 text-center font-thin">Ngày</th>
                                <th class=" px-4 py-2 font-thin text-right">Thu</th>
                                <th class=" px-4 py-2 font-thin text-right">Chi</th>
                                <th class=" px-4 py-2 font-thin  text-left">Nội dung</th>
                                <th class=" px-4 py-2 font-thin text-center">Khoản</th>
                                <th class=" px-4 py-2 font-thin text-left">Người (nộp/nhận)</th>
                                <th class=" px-4 py-2 font-thin text-center">...</th>
                            </tr>
                        </thead>
                        <tbody id='chitiet_thuchi' class="0 ">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class=" flex justify-end">
        <div id='tongthuchi' class="grid grid-cols-12 max-w-5xl w-full justify-end text-white items-center gap-3 overflow-x-scroll ">
        </div>
    </div>
</main>

<!-- Form delete thu chi -->
<div class="relative z-10 hidden" id="form_delete_thuchi" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
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
                        <button type="button" onclick="close_modal('form_delete_thuchi')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2   flex justify-center" id="" data-te-modal-body-ref>
                        <p id="title_xoathuchi" class="text-lg "></p>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="soct_delete">
                    <input hidden id="loaithuchi_delete">
                    <input hidden id="sotienthuchi_delete">
                    <input hidden id="soct_dh_thuchi_delete">
                    <button type="button" onclick="delete_thuchi()" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_delete_thuchi')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form thông báo -->
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

                        <p id="text_thongbao" class="text-md">Vui lòng nhập thông tin khách hàng</p>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">

                    <button type="button" onclick="close_modal('form_error')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form add thu chi -->
<div class="relative z-10 hidden" id="form_add_thuchi" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            Thêm mới phiếu <span id="loai_phieu"></span>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_thuchi')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4  " data-te-modal-body-ref>

                        <div id='khoanmuc_thu' class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Khoản thu</p>
                            <select id="khoanmucthu_add" class='col-span-6  border-b px-2  border-[#ddd] text-[black]'>
                            </select>
                            <div class="col-span-2 flex justify-end __icon">
                                <button id="icon_add_danhmuc_edit" class="focus:outline-none icon_add" onclick="_show_add(this)"><img class="focus:outline-none" src="vendor/img/add.png" title="Thêm khoản thu"></button>
                                <button id="icon_remove_danhmuc_edit" class="focus:outline-none transition rotate-45  hidden icon_remove" onclick="_hidden_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                            </div>
                            <div id="show_danhmuc" class="col-span-12 grid grid-cols-12 w-full items-center mt-4 hidden __show">
                                <div class="col-span-10">
                                    <input class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tendanhmuc_add" type="text" placeholder="Tên danh mục">
                                </div>
                                <div class="flex justify-center items-center col-span-2">
                                    <button onclick="add_khoanmuc(this, 'THU','LTC')" class="rounded-md p-2  text-white text-xs"><img class="" src="vendor/img/checked.png"></button>
                                </div>
                            </div>
                        </div>

                        <div id='khoanmuc_chi' class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Khoản chi</p>
                            <select id="khoanmucchi_add" onchange="ktra_chinhacc()" class='col-span-6  border-b px-2  border-[#ddd] text-[black]'>
                            </select>
                            <div class="col-span-2 flex justify-end __icon">
                                <button id="icon_add_danhmuc_edit" class="focus:outline-none icon_add" onclick="_show_add(this)"><img class="focus:outline-none" src="vendor/img/add.png" title="Thêm khoản chi"></button>
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
                            <div id="form_chinhacc" class="col-span-12 grid grid-cols-12 w-full items-center mt-4   hidden">
                                <input id="sohd_add" value="" hidden>
                                <input id="soct_add" value="" hidden>
                                <p class="col-span-4  text-[black]">Chọn NCC</p>
                                <input id="tim_nhacc" onkeyup="tim_nhacungcap(this)" class='col-span-8  border-b px-2  border-[#ddd] text-[black]' type="text" placeholder="Tìm số HD, NCC">
                                <div id="list_chuathanhtoan" class="col-span-12 hidden">
                                    <table class="min-w-full">
                                        <thead>
                                            <tr class="text-sm whitespace-nowrap">
                                                <th class=" px-4 py-2 text-center font-thin">Số HD</th>
                                                <th class=" px-4 py-2 font-thin text-center">Tên NCC</th>
                                                <th class=" px-4 py-2 font-thin text-center">TT</th>
                                                <th class=" px-4 py-2 font-thin  text-center">Đã TT</th>
                                                <th class=" px-4 py-2 font-thin text-center">Còn nợ</th>
                                            </tr>
                                        </thead>
                                        <tbody id='chitiet_thanhtoanncc' class="0 ">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Số tiền</p>
                            <input id="sotien_add" onkeyup="_ChangeFormat(this)" class='col-span-8  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Nội dung</p>
                            <input id="noidung_add" class='col-span-8  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
                        </div>
                        <div id="nguoinop_thu" class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Người nộp</p>
                            <select id="nguoinop_add" class='col-span-8  border-b px-2  border-[#ddd] text-[black]'>

                            </select>

                        </div>
                        <div id="nguoinhan_chi" class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Người nhận</p>
                            <select id="nguoinhan_add" class='col-span-8  border-b px-2  border-[#ddd] text-[black]'>

                            </select>
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Ngân quỹ</p>
                            <select id="nganquy_add" class='col-span-8  border-b px-2  border-[#ddd] text-[black]'>
                                <option value="TM">Tiền mặt</option>
                                <option value="NH">Ngân hàng</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <p class="error_add_phieuthu hidden text-[red]">Vui lòng nhập đầy đủ thông tin</p>
                    <button type="button" id="btn_thu" onclick="add_thuchi('thu')" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" id='btn_chi' onclick="add_thuchi('chi')" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_add_thuchi')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form edit thu chi -->
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
                                    <button onclick="add_khoanmuc(this, 'THU','LTC')" class="rounded-md p-2  text-white text-xs"><img class="" src="vendor/img/checked.png"></button>
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
                            <input id="sotien_edit" onkeyup="_ChangeFormat(this)" class='col-span-8  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Nội dung</p>
                            <input id="noidung_edit" class='col-span-8  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
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
        await load_khoanmuc()

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
<script type="text/javascript" src="vendor/js/thuchi.js?v=<?= md5_file('vendor/js/thuchi.js') ?>"></script>