<main class="bg_main">
    <div class="flex flex-col">
        <!--Grid Form-->

        <div class="flex flex-1  flex-col md:flex-row lg:flex-row">
            <div class="mb-2 w-full">
                <div class="bg-[#ffffff36] rounded-md  px-2 py-3 ">
                    <div class="flex justify-between items-center tablet:grid tablet:grid-cols-12 phone:grid phone:grid-cols-12  ">
                        <div class="flex gap-5 tablet:gap-3 items-center  tablet:col-span-12 tablet:grid tablet:grid-cols-12 phone:col-span-12 phone:grid phone:grid-cols-12">
                            <p class="text-lg text-[#83ff00] tablet:col-span-12  tablet:text-center phone:col-span-12  phone:text-center whitespace-nowrap">Hồ sơ Hàng hóa</p>
                            <div class='flex tablet:col-span-12 tablet:justify-between phone:col-span-12 phone:justify-between'>
                                <div class="flex justify-center tablet:w-full phone:w-full items-center">
                                    <div class=" xl:w-96 tablet:w-full phone:w-full">
                                        <div class="input-group relative flex tablet:grid tablet:grid-cols-12 tablet:justify-between phone:grid phone:grid-cols-12 phone:justify-between gap-7 items-center w-full ">
                                            <form onsubmit="return false;" class="tablet:col-span-6 phone:col-span-6">
                                                <input type="search" onkeyup="search_hanghoa()" id="search" class="w-[300px] phone:w-[200px] mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-white" placeholder="Tìm tên hàng hóa" aria-label="Search" aria-describedby="button-addon2" autocomplete="off">
                                            </form>
                                            <select onchange="load_hanghoa()" class=" tablet:col-span-6 phone:col-span-6 phone:ml-3 mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-[white]" id="loai_filter">

                                            </select>
                                            <select onchange="load_hanghoa()" class="tablet:col-span-3 phone:col-span-4 tablet:w-auto  mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-[white]" id="nhom_filter">

                                            </select>
                                            <select onchange="load_hanghoa()" class=" tablet:col-span-3 phone:col-span-4 tablet:w-auto  mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] px-2 text-[white]" id="hang_filter">

                                            </select>
                                            <div class=" tablet:col-span-6 phone:col-span-4 flex gap-5 tablet:justify-end fullscreen:hidden laptop:hidden">
                                                <button class="bg-[#008d3f] p-2 rounded-md hover:bg-green-600 text-white phone:whitespace-nowrap" onclick="open_modal('form_add_hanghoa')">Thêm hàng hóa</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="flex gap-5 tablet:hidden phone:hidden">
                            <button class="bg-[#008d3f] p-2 rounded-md hover:bg-green-600 text-white" onclick="open_modal('form_add_hanghoa')">Thêm hàng hóa</button>
                        </div>
                    </div>

                </div>
                <div class="p-3 overflow-x-scroll">
                    <table class="min-w-full ">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class="font-thin text-center px-4 py-2">#</th>
                                <th class="font-thin text-left px-4 py-2">Tên hàng hóa</th>
                                <th class="font-thin text-center px-4 py-2 ">ĐVT</th>
                                <th class="font-thin text-center px-4 py-2 ">Quy đổi</th>
                                <th class="font-thin text-center px-4 py-2 ">ĐVT Quy đổi</th>
                                <th class="font-thin text-right px-4 py-2 ">Giá bán</th>
                                <th class="font-thin text-right px-4 py-2 ">% tích lũy</th>
                                <th class="font-thin text-right px-4 py-2 ">% thực hiện</th>
                                <th class="font-thin text-right px-4 py-2 ">Định mức</th>
                                <th class="font-thin text-center px-4 py-2 ">Loại HH</th>
                                <th class="font-thin text-center px-4 py-2 ">Nhóm HH</th>
                                <th class="font-thin text-center px-4 py-2 ">Hãng SX</th>
                                <th class="font-thin text-center px-4 py-2 ">Sử dụng</th>
                                <th class="font-thin text-center px-4 py-2 ">...</th>
                            </tr>
                        </thead>
                        <tbody id='list_hanghoa' class="">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Form thêm mới hàng hóa -->
<div class="relative z-10 hidden" id="form_add_hanghoa" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center  text-center items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-2xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[green]" id="exampleModalLabel">
                            Thêm hàng hóa
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_hanghoa')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div data-te-modal-body-ref class="overflow-y-scroll max-h-[500px] overflow-x-hidden">

                        <div class="relative flex-auto p-4 flex flex-wrap ">
                            <div class="w-full md:w-full px-3 pb-4 flex gap-5">
                                <div class="w-1/2">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="mavach_add">
                                        Mã vạch
                                    </label>
                                    <input class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="mavach_add" type="text" autocomplete="off">
                                </div>
                                <div class="w-1/2">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="mshhncc_add">
                                        MHSS NCC
                                    </label>
                                    <input class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="mshhncc_add" type="text" autocomplete="off">
                                </div>
                            </div>
                            <div class="w-full md:w-full px-3 pb-4 ">
                                <label class="block uppercase tracking-wide text-[red] text-xs font-medium mb-2" for="tenhanghoa_add">
                                    Tên hàng hóa
                                </label>
                                <input class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="tenhanghoa_add" type="text" autocomplete="off">
                            </div>

                            <div class="w-full md:w-full px-3 pb-4 flex gap-5">
                                <div class="w-1/2 pb-4 ">
                                    <label class="block uppercase tracking-wide text-[red]  text-xs font-medium mb-2" for="list_dvt_add">
                                        ĐVT
                                    </label>
                                    <div class="flex items-center gap-2 __icon">
                                        <select onchange="change_title_soluong_quydoi()" class="appearance-none block w-full   border-b-[1px]   py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="list_dvt_add" type="text">

                                        </select>
                                        <button id="" class="focus:outline-none icon_add" onclick="_show_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                        <button id="" class="focus:outline-none transition rotate-45 hidden icon_remove" onclick="_hidden_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                    </div>
                                    <div id="" class="flex w-full items-center mt-4 hidden __show">
                                        <div class="m px-3  ">
                                            <input class="appearance-none block w-full  border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tendvt_add" type="text" placeholder="Tên ĐVT">
                                        </div>
                                        <div class="flex justify-center">
                                            <button onclick="add_danhmuc('dvt','list_dvt_add','tendvt_add', 'Đơn vị tính','DVT')" class="bg-[red] rounded-md p-2  text-white text-md">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2 pb-4 ">
                                    <label class="block uppercase tracking-wide text-[red]  text-xs font-medium mb-2" for="list_loaihh_add">
                                        Loại hàng hóa
                                    </label>
                                    <div class="flex items-center gap-2 __icon">
                                        <select class="appearance-none block w-full  border-b-[1px]   py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="list_loaihh_add" type="text">

                                        </select>
                                    </div>

                                </div>

                            </div>
                            <div class="w-full md:w-full px-3 pb-4 flex gap-5">
                                <div class="w-1/2 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="list_dvt_add">
                                        ĐVT nhỏ nhất
                                    </label>
                                    <div class="flex items-center gap-2 __icon">
                                        <select onchange="change_title_soluong_quydoi()" class="appearance-none block w-full   border-b-[1px]   py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="list_dvt_nhonhat_add" type="text">

                                        </select>
                                        <button id="" class="focus:outline-none icon_add" onclick="_show_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                        <button id="" class="focus:outline-none transition rotate-45 hidden icon_remove" onclick="_hidden_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                    </div>
                                    <div id="" class="flex w-full items-center mt-4 hidden __show">
                                        <div class="m px-3  ">
                                            <input class="appearance-none block w-full  border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tendvt_nhonhat_add" type="text" placeholder="Tên ĐVT">
                                        </div>
                                        <div class="flex justify-center">
                                            <button onclick="add_danhmuc('dvt','list_dvt_nhonhat_add','tendvt_nhonhat_add', 'Đơn vị tính','DVT')" class="bg-[red] rounded-md p-2  text-white text-md">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="soluong_nhonhat_add">
                                        Số lượng <span id="title_soluong_quydoi_add"></span>
                                    </label>
                                    <input onkeyup="_ChangeFormat(this)" class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="soluong_nhonhat_add" type="text" value="0" autocomplete="off">
                                </div>

                            </div>
                            <div class="w-full md:w-full px-3 pb-2 flex gap-8">

                                <div class="w-1/2  pb-4 ">
                                    <label class="block uppercase tracking-wide text-[red]  text-xs font-medium mb-2" for="list_nhom_add">
                                        Nhóm
                                    </label>
                                    <div class="flex items-center gap-2 __icon">
                                        <select class="appearance-none block w-full  border-b-[1px]   py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="list_nhom_add" type="text">

                                        </select>
                                        <button id="icon_add_nhom_edit" class="focus:outline-none icon_add" onclick="_show_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                        <button id="icon_remove_nhom_edit" class="focus:outline-none transition rotate-45  hidden icon_remove" onclick="_hidden_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                    </div>
                                    <div id="show_nhom_edit" class="flex w-full items-center mt-4 hidden __show">
                                        <div class="m px-3  ">
                                            <input class="appearance-none block w-full  border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tennhom_add" type="text" placeholder="Tên nhóm">
                                        </div>
                                        <div class="flex justify-center">
                                            <button onclick="add_danhmuc('nhom', 'list_nhom_add', 'tennhom_add','Nhóm','NHH')" class="bg-[red] rounded-md p-2  text-white text-md">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2  pb-4 ">
                                    <label class="block uppercase tracking-wide text-[red]  text-xs font-medium mb-2" for="list_hangsx_add">
                                        Hãng sản xuất
                                    </label>
                                    <div class="flex items-center gap-2 __icon">
                                        <select class="appearance-none block w-full  border-b-[1px]   py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="list_hangsx_add" type="text">

                                        </select>
                                        <button class="focus:outline-none icon_add" onclick="_show_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                        <button class="focus:outline-none transition rotate-45  hidden icon_remove" onclick="_hidden_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                    </div>
                                    <div class="flex w-full items-center mt-4 hidden __show ">
                                        <div class="m px-3  ">
                                            <input class="appearance-none block w-full  border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tenhangsx_add" type="text" placeholder="Tên hãng">
                                        </div>
                                        <div class="flex justify-center">
                                            <button onclick="add_danhmuc('hangsx','list_hangsx_add','tenhangsx_add', 'Hãng sản xuất','HSX')" class="bg-[red] rounded-md p-2  text-white text-md">Lưu</button>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="w-full md:w-full px-3 pb-4 flex gap-5 phone:flex-wrap">
                                <div class="w-1/4 phone:w-2/6 pb-4">
                                    <label class="block uppercase tracking-wide text-[red]  text-xs font-medium mb-2" for="giaban_add">
                                        Giá bán
                                    </label>
                                    <input onkeyup="_ChangeFormat(this)" class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="giaban_add" type="text" value="0" autocomplete="off">

                                </div>
                                <div class="w-1/4  phone:w-2/6 pb-4">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="giaban_add">
                                        Tồn kho TT
                                    </label>
                                    <input onkeyup="_ChangeFormat(this)" class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="tonkho_tt_add" type="text" value="0" autocomplete="off">
                                </div>
                                <div class="w-1/4  phone:w-1/6">
                                    <label class="block uppercase tracking-wide text-xs font-medium mb-2" for="thuesuat_add">
                                        Thuế suất
                                    </label>
                                    <input onkeyup="_ChangeFormat(this)" class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="thuesuat_add" type="text" value="0" autocomplete="off">
                                </div>
                                <div class="w-1/4 pb-4  phone:w-2/6">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="pttichluy_add">
                                        % tích lũy
                                    </label>
                                    <input class="appearance-none block w-full border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="pttichluy_add" type="text" value="0" autocomplete="off">
                                </div>
                                <div class="w-1/4 pb-4  phone:w-2/6">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="ptthuchien_add">
                                        % thực hiện
                                    </label>
                                    <input class="appearance-none block w-full   border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="ptthuchien_add" type="text" value="0" autocomplete="off">
                                </div>
                            </div>

                            <div class="w-full md:w-full px-3 pb-2 flex">
                                <div class=" mt-2 w-1/2">
                                    <label class="flex items-center gap-2 uppercase tracking-wide text-gray-700 text-xs font-medium mb-2">
                                        Ảnh
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium" for="anhhanghoa_add">
                                            <img class="w-[20px]" src="vendor/img/add.png">
                                        </label>
                                        <input type="file" accept="image/*" onchange="anhhanghoa(this)" id="anhhanghoa_add" multiple hidden />
                                    </label>
                                    <div class="flex gap-2">
                                        <div id="list_img_hanghoa" class=" flex gap-2 flex-wrap">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="w-full md:w-full px-3 pb-2 pt-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="mota_hanghoa_add">
                                    Mô tả
                                </label>
                                <textarea class="appearance-none block w-full   border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="mota_hanghoa_add" type="text"></textarea>
                                <script>
                                    var editor = CKEDITOR.replace('mota_hanghoa_add');
                                </script>

                            </div>
                            <div class="w-full  px-3 pb-4 flex gap-5 ">
                                <div class="w-1/2">
                                    <label class="block uppercase tracking-wide text-[red] text-xs font-medium mb-2" for="trangthai_add">
                                        Trạng thái
                                    </label>
                                    <div class="flex items-center">
                                        <span class="mr-3 text-md ">Khóa</span>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" value="" id="trangthai_add" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                        </label>
                                        <span class="ml-3 text-md">Kích hoạt</span>
                                    </div>
                                </div>
                                <div class="w-1/2 phone:w-2/6 pb-4">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="sothangkhauhao_add">
                                        Số tháng khấu hao
                                    </label>
                                    <input onkeyup="this.value = this.value.replace(/[^0-9\\,.]/g,'')" class="appearance-none block w-full  border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="sothangkhauhao_add" type="text" autocomplete="off" value="0">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <p id="error_add_hanghoa" class="text-[red] hidden">Chưa nhập đủ thông tin</p>
                    <button onclick="add_hanghoa()" type="button" class="inline-flex w-full justify-center items-center rounded-md bg-green-600 px-7 py-2 text-[14px] text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:mt-0 max-w-[100px]">Lưu</button>
                    <button type="button" onclick="close_modal('form_add_hanghoa')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form chỉnh sửa hàng hóa -->
<div class="relative z-10 hidden" id="form_edit_hanghoa" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center  text-center items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-2xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[green]" id="exampleModalLabel">
                            Chỉnh hàng hóa
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_edit_hanghoa')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div data-te-modal-body-ref class="overflow-y-scroll max-h-[500px] overflow-x-hidden">
                        <div class="w-full md:w-full  px-3 pb-4 flex gap-5">
                            <div class="w-1/2 md:w-full px-3 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="mavach_edit">
                                    Mã vạch
                                </label>
                                <input class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="mavach_edit" type="text" autocomplete="off">
                            </div>
                            <div class="w-1/2 md:w-full px-3 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="mshhncc_edit">
                                    MSHH NCC
                                </label>
                                <input class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="mshhncc_edit" type="text" autocomplete="off">
                            </div>
                        </div>
                        <div class="relative flex-auto  px-3 pb-4flex flex-wrap ">
                            <div class="w-full md:w-full px-3 pb-4 ">
                                <label class="block uppercase tracking-wide text-[red] text-xs font-medium mb-2" for="tenhanghoa_edit">
                                    Tên hàng hóa
                                </label>
                                <input class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="tenhanghoa_edit" type="text" autocomplete="off">
                            </div>

                            <div class="w-full md:w-full px-3 pb-4 flex gap-5">
                                <div class="w-1/2 pb-4 ">
                                    <label class="block uppercase tracking-wide text-[red] text-xs font-medium mb-2" for="list_dvt_edit">
                                        ĐVT
                                    </label>
                                    <div class="flex items-center gap-2 __icon">
                                        <select onchange="change_title_soluong_quydoi()" class="appearance-none block w-full  border-b-[1px]   py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="list_dvt_edit" type="text">

                                        </select>
                                        <button id="" class="focus:outline-none icon_add" onclick="_show_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                        <button id="" class="focus:outline-none transition rotate-45 hidden icon_remove" onclick="_hidden_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                    </div>
                                    <div id="" class="flex w-full items-center mt-4 hidden __show">
                                        <div class="m px-3  ">
                                            <input class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tendvt_edit" type="text" placeholder="Tên ĐVT">
                                        </div>
                                        <div class="flex justify-center">
                                            <button onclick="add_danhmuc('dvt','list_dvt_edit','tendvt_edit', 'Đơn vị tính','DVT')" class="bg-[red] rounded-md p-2  text-white text-md">Lưu</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="w-1/2 pb-4 ">
                                    <label class="block uppercase tracking-wide text-[red] text-xs font-medium mb-2" for="list_loaihh_edit">
                                        Loại hàng hóa
                                    </label>
                                    <div class="flex items-center gap-2 __icon">
                                        <select class="appearance-none block w-full   border-b-[1px]   py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="list_loaihh_edit" type="text">

                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="w-full md:w-full px-3 pb-4 flex gap-5">
                                <div class="w-1/2 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="list_dvt_nhonhat_edit">
                                        ĐVT nhỏ nhất
                                    </label>
                                    <div class="flex items-center gap-2 __icon">
                                        <select onchange="change_title_soluong_quydoi()" class="appearance-none block w-full   border-b-[1px]   py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="list_dvt_nhonhat_edit" type="text">

                                        </select>
                                        <button id="" class="focus:outline-none icon_add" onclick="_show_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                        <button id="" class="focus:outline-none transition rotate-45 hidden icon_remove" onclick="_hidden_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                    </div>
                                    <div id="" class="flex w-full items-center mt-4 hidden __show">
                                        <div class="m px-3  ">
                                            <input class="appearance-none block w-full  border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tendvt_nhonhat_edit" type="text" placeholder="Tên ĐVT">
                                        </div>
                                        <div class="flex justify-center">
                                            <button onclick="add_danhmuc('dvt','list_dvt_nhonhat_edit','tendvt_nhonhat_edit', 'Đơn vị tính','DVT')" class="bg-[red] rounded-md p-2  text-white text-md">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="soluong_nhonhat_edit">
                                        Số lượng <span id="title_soluong_quydoi_edit"></span>
                                    </label>
                                    <input onkeyup="_ChangeFormat(this)" class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="soluong_nhonhat_edit" type="text" value="0" autocomplete="off">
                                </div>

                            </div>
                            <div class="w-full md:w-full px-3 pb-4 flex gap-5">
                                <div class="w-1/2  pb-4 ">
                                    <label class="block uppercase tracking-wide text-[red] text-xs font-medium mb-2" for="list_nhom_edit">
                                        Nhóm
                                    </label>
                                    <div class="flex items-center gap-2 __icon">
                                        <select class="appearance-none block w-full border-b-[1px]   py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="list_nhom_edit" type="text">

                                        </select>
                                        <button id="icon_add_nhom_edit" class="focus:outline-none icon_add" onclick="_show_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                        <button id="icon_remove_nhom_edit" class="focus:outline-none transition rotate-45  hidden icon_remove" onclick="_hidden_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                    </div>
                                    <div id="show_nhom_edit" class="flex w-full items-center mt-4 hidden __show">
                                        <div class="m px-3  ">
                                            <input class="appearance-none block w-full  border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tennhom_edit" type="text" placeholder="Tên nhóm">
                                        </div>
                                        <div class="flex justify-center">
                                            <button onclick="add_danhmuc('nhom', 'list_nhom_edit', 'tennhom_edit', 'Nhóm','NHH')" class="bg-[red] rounded-md p-2  text-white text-md">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2  pb-4 ">
                                    <label class="block uppercase tracking-wide text-[red] text-xs font-medium mb-2" for="list_hangsx_edit">
                                        Hãng sản xuất
                                    </label>
                                    <div class="flex items-center gap-2 __icon">
                                        <select class="appearance-none block w-full  border-b-[1px]   py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="list_hangsx_edit" type="text">

                                        </select>
                                        <button class="focus:outline-none icon_add" onclick="_show_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                        <button class="focus:outline-none transition rotate-45  hidden icon_remove" onclick="_hidden_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                    </div>
                                    <div class="flex w-full items-center mt-4 hidden __show ">
                                        <div class="m px-3  ">
                                            <input class="appearance-none block w-full   border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tenhangsx_edit" type="text" placeholder="Tên hãng">
                                        </div>
                                        <div class="flex justify-center">
                                            <button onclick="add_danhmuc('hangsx','list_hangsx_edit','tenhangsx_edit', 'Hãng sản xuất','HSX')" class="bg-[red] rounded-md p-2  text-white text-md">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full md:w-full px-3 pb-4 flex gap-5 phone:flex-wrap">
                                <div class="w-1/4 pb-4  phone:w-2/6">
                                    <label class="block uppercase tracking-wide text-[red] text-xs font-medium mb-2" for="giaban_edit">
                                        Giá bán
                                    </label>
                                    <input onkeyup="_ChangeFormat(this)" class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="giaban_edit" type="text" autocomplete="off">

                                </div>
                                <div class="w-1/4 pb-4 phone:w-2/6">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="giaban_add">
                                        Tồn kho TT
                                    </label>
                                    <input onkeyup="_ChangeFormat(this)" class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="tonkho_tt_edit" type="text" value="0" autocomplete="off">
                                </div>
                                <div class="w-1/4 phone:w-1/6">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="thuesuat_edit">
                                        Thuế suất
                                    </label>
                                    <input onkeyup="_ChangeFormat(this)" class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="thuesuat_edit" type="text" autocomplete="off">
                                </div>
                                <div class="w-1/4 phone:w-2/6 pb-4">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="pttichluy_edit">
                                        % tích lũy
                                    </label>
                                    <input class="appearance-none block w-full   border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="pttichluy_edit" type="text" autocomplete="off">
                                </div>
                                <div class="w-1/4 phone:w-2/6 pb-4">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="ptthuchien_edit">
                                        % thực hiện
                                    </label>
                                    <input class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="ptthuchien_edit" type="text" autocomplete="off">
                                </div>
                            </div>
                            <div class="w-full md:w-full px-3 pb-2 flex gap-8">

                            </div>


                            <div class="w-full md:w-full px-3 pb-2 flex">
                                <div class=" mt-2 w-1/2">
                                    <label class="flex items-center gap-2 uppercase tracking-wide text-gray-700 text-xs font-medium mb-2">
                                        Ảnh
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium" for="anhhanghoa_edit">
                                            <img class="w-[20px]" src="vendor/img/add.png">
                                        </label>
                                        <input type="file" accept="image/*" onchange="add_image(this)" id="anhhanghoa_edit" multiple hidden />
                                    </label>
                                    <div class="flex gap-2">
                                        <div id="list_img_hanghoa_edit" class=" flex gap-2 flex-wrap">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="w-full md:w-full px-3 pb-2 pt-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="mota_hanghoa_edit">
                                    Mô tả
                                </label>
                                <textarea class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="mota_hanghoa_edit" type="text"></textarea>
                                <script>
                                    var editor = CKEDITOR.replace('mota_hanghoa_edit');
                                </script>

                            </div>
                            <div class="w-full  px-3 pb-4 flex gap-5 ">
                                <div class="w-1/2">
                                    <label class="block uppercase tracking-wide text-[red] text-xs font-medium mb-2" for="trangthai_edit">
                                        Trạng thái
                                    </label>
                                    <div class="flex items-center">
                                        <span class="mr-3 text-md  dark:text-gray-300">Khóa</span>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" value="" id="trangthai_edit" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                        </label>
                                        <span class="ml-3 text-md  dark:text-gray-300">Kích hoạt</span>
                                    </div>
                                </div>
                                <div class="w-1/2 phone:w-2/6 pb-4">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="sothangkhauhao_edit">
                                        Số tháng khấu hao
                                    </label>
                                    <input onkeyup="this.value = this.value.replace(/[^0-9\\,.]/g,'')" class="appearance-none block w-full  border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="sothangkhauhao_edit" type="text" autocomplete="off" value="0">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <p id="error_edit_hanghoa" class="text-[red] hidden">Chưa nhập đủ thông tin</p>

                    <input id='mshh_edit' hidden>
                    <button onclick="edit_hanghoa()" type="button" class="inline-flex w-full justify-center items-center rounded-md bg-green-600 px-7 py-2 text-[14px] text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:mt-0 max-w-[100px]">Lưu</button>
                    <button type="button" onclick="close_modal('form_edit_hanghoa')" class=" inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form xóa hàng hóa -->
<div class="relative z-10 hidden" id="form_delete_hanghoa" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white   ">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[red]" id="exampleModalLabel">
                            Đồng ý xóa
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_delete_hanghoa')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="relative flex-auto p-4 text-center" id="tenhh_delele" data-te-modal-body-ref>

                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id='mshh_delete'>
                    <input hidden id='list_img_delete'>
                    <button type="button" onclick="delete_hanghoa(this)" class="inline-flex w-full justify-center items-center rounded-md bg-red-600 px-7 py-2 text-[14px] text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:mt-0 max-w-[100px]">Xóa</button>
                    <button type="button" onclick="close_modal('form_delete_hanghoa')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="vendor/js/sanpham.js?v=<?= md5_file('vendor/js/sanpham.js') ?>"></script>

<script>
    $(document).ready(function() {
        load_hanghoa();
        load_danhmuc('loai_hh', 'list_loaihh_add')
        load_danhmuc('nhom', 'list_nhom_add')
        load_danhmuc('nhacc', 'list_ncc_add')
        load_danhmuc('hangsx', 'list_hangsx_add')
        load_danhmuc('loai_hh', 'list_loaihh_edit')
        load_danhmuc('nhom', 'list_nhom_edit')
        load_danhmuc('nhacc', 'list_ncc_edit')
        load_danhmuc('hangsx', 'list_hangsx_edit')
        load_danhmuc('dvt', 'list_dvt_add')
        load_danhmuc('dvt', 'list_dvt_edit')
        load_danhmuc('dvt', 'list_dvt_nhonhat_add')
        load_danhmuc('dvt', 'list_dvt_nhonhat_edit')
    });
</script>