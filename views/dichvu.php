<main class="bg_main">
    <div class="flex flex-col">
        <!--Grid Form-->

        <div class="flex flex-1  flex-col md:flex-row lg:flex-row">
            <div class="mb-2 w-full">
                <div class="bg-[#ffffff36] rounded-md  px-2 py-3 ">
                    <div class="flex justify-between tablet:grid tablet:grid-cols-12 phone:grid phone:grid-cols-12">
                        <div class="flex gap-5 items-center tablet:gap-3 tablet:col-span-12 tablet:grid tablet:grid-cols-12 phone:gap-3 phone:col-span-12 phone:grid phone:grid-cols-12">
                            <p class="text-lg text-[#83ff00] whitespace-nowrap tablet:col-span-12  tablet:text-center phone:col-span-12  phone:text-center">Hồ sơ Dịch vụ</p>
                            <div class='flex tablet:col-span-12 tablet:mt-3 tablet:justify-between tablet:gap-5 phone:col-span-12 phone:mt-3 phone:justify-between phone:gap-5  phone:grid phone:grid-cols-12'>
                                <div class="flex justify-center phone:col-span-12 phone:w-full items-center phone:justify-start">
                                    <div class="w-full">
                                        <div class="input-group relative flex  items-stretch w-full  ">
                                            <div class="input-group relative flex gap-5 items-end w-full  phone:grid phone:grid-cols-12 phone:justify-between  ">
                                                <form onsubmit="return false;" class="phone:col-span-12">
                                                    <input type="search" onkeyup="dichvu_search()" id="search" class="tablet:w-[200px] phone:w-full w-[300px] mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-white" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="button-addon2" autocomplete="off">
                                                </form>
                                                <select onchange="load_dichvu()" class="phone:col-span-6 tablet:w-[140px] w-[300px] phone:w-[140px] mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-[white]" id="list_danhmuc_filter" type="text">

                                                </select>
                                                <select onchange="load_dichvu()" class=" phone:col-span-6 tablet:w-[120px] phone:w-full w-[300px] mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-[white]" id="list_loai_filter" type="text">
                                                    <option class='text-[#747474]' value="">Tất cả loại</option>
                                                    <option class='text-[black]' value="0">Dịch vụ</option>
                                                    <option class='text-[black]' value="1">Liệu trình</option>
                                                    <option class='text-[black]' value="2">Gói dịch vụ</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex gap-5 phone:col-span-12 tablet:justify-end phone:justify-end  fullscreen:hidden laptop:hidden">
                                    <button class="bg-[#008d3f] p-2 rounded-md whitespace-nowrap hover:bg-green-600 text-[white]" onclick="open_add_dichvu()">Thêm dịch vụ</button>
                                    <button class="bg-[#21a586] p-2 rounded-md whitespace-nowrap hover:bg-[#31af91] text-[white]" onclick="open_add_goidichvu()">Gói dịch vụ</button>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-5 tablet:hidden phone:hidden">
                            <button class="bg-[#008d3f] p-2 rounded-md whitespace-nowrap hover:bg-green-600 text-[white]" onclick="open_add_dichvu()">Thêm dịch vụ</button>
                            <button class="bg-[#21a586] p-2 rounded-md whitespace-nowrap hover:bg-[#31af91] text-[white]" onclick="open_add_goidichvu()">Gói dịch vụ</button>
                        </div>
                    </div>

                </div>
                <div class="p-3 overflow-x-scroll">
                    <table class="min-w-full ">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class="px-4 py-2 text-center font-thin">#</th>
                                <th class="px-4 py-2 text-left font-thin">Tên dịch vụ</th>
                                <th class="px-4 py-2 text-right font-thin">Đơn giá</th>
                                <th class="px-4 py-2 text-right font-thin">% tích lũy</th>
                                <th class="px-4 py-2 text-right font-thin">% thực hiện</th>
                                <th class="px-4 py-2 text-center font-thin">Thời gian</th>
                                <th class="px-4 py-2 text-center font-thin">Loại</th>
                                <th class="px-4 py-2 text-center font-thin">Danh mục</th>


                                <th class="px-4 py-2 text-center font-thin">Mô tả</th>
                                <th class="px-4 py-2 text-center font-thin">Sử dụng</th>
                                <th class="px-4 py-2 text-center font-thin">...</th>
                            </tr>
                        </thead>
                        <tbody id='list_dichvu'>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Form thêm mới dịch vụ -->
<div class="relative z-10 hidden" id="form_add_dichvu" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center  text-center items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-2xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal !text-[green]" id="exampleModalLabel">
                            Thêm dịch vụ
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_dichvu')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div data-te-modal-body-ref class="overflow-y-scroll max-h-[500px] overflow-x-hidden">

                        <div class="relative flex-auto p-4 px-2 flex flex-wrap ">
                            <div class="w-full md:w-full px-3 pb-4 ">
                                <label class="block uppercase tracking-wide text-[red] text-xs font-medium" for="tendichvu_add">
                                    Tên dịch vụ
                                </label>
                                <input class="appearance-none block w-full border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="tendichvu_add" type="text" autocomplete="off">
                            </div>

                            <div class="w-full md:w-full px-3 pb-4 flex gap-5 phone:gap-2">
                                <div class="w-2/6">
                                    <label class="block uppercase tracking-wide text-[red] text-xs font-medium" for="sotien_add">
                                        Số tiền
                                    </label>
                                    <input onkeyup="_ChangeFormat(this)" class="appearance-none block w-full  text-gray-700 border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="sotien_add" type="text" value="0" autocomplete="off">
                                </div>
                                <div id="__giavon" class="w-2/6  pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium" for="giavon_add">
                                        Giá vốn
                                    </label>
                                    <input onkeyup="_ChangeFormat(this)" class="appearance-none block w-full   border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="giavon_add" type="text" value="0" autocomplete="off">
                                </div>
                                <div class="w-1/6  pb-4">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium whitespace-nowrap" for="thoigian_add">
                                        Thời gian
                                    </label>
                                    <input class="appearance-none block w-full   border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="thoigian_add" type="text" value="0" autocomplete="off">
                                </div>
                                <div id="__ngaybaohanh" class="w-1/6  pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium whitespace-nowrap" for="ngaybaohanh_add">
                                        Ngày bảo hành
                                    </label>
                                    <input class="appearance-none block w-full   border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="ngaybaohanh_add" type="text" value="0" autocomplete="off">
                                </div>
                            </div>
                            <div class="w-full md:w-full px-3 pb-4 gap-5 flex">
                                <div class="w-1/3  pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium" for="thuesuat_add">
                                        Thuế suất
                                    </label>
                                    <input class="appearance-none block w-full   border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="thuesuat_add" type="text" value="0" autocomplete="off">
                                </div>
                                <div id='__pttichluy' class="w-1/3  pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium" for="pttichluy_add">
                                        % tích lũy
                                    </label>
                                    <input class="appearance-none block w-full  border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="pttichluy_add" type="text" value="0" autocomplete="off">
                                </div>
                                <div id='__ptthuchien' class="w-1/3  pb-4  ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium" for="pttichluy_add">
                                        % thực hiện
                                    </label>
                                    <input class="appearance-none block w-full   border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="ptthuchien_add" type="text" value="0" autocomplete="off">
                                </div>
                            </div>


                            <div class="w-full md:w-full px-3 pb-2 flex">
                                <div class="w-1/3">
                                    <label class="block uppercase tracking-wide text-[red] text-xs font-medium mb-3" for="lieutrinh_add">
                                        Liệu trình
                                    </label>
                                    <div class="flex items-center">
                                        <span class="mr-3 text-md  dark:text-gray-300">Không</span>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" value="" onchange="hien_pttichluy(this)" id="lieutrinh_add" class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                        </label>
                                        <span class="ml-3 text-md  dark:text-gray-300">Có</span>
                                    </div>
                                </div>
                                <div class="w-2/3 px-3 pb-2 ">
                                    <label class="block uppercase tracking-wide text-[red] text-xs font-medium mb-2" for="list_danhmuc_add">
                                        Danh mục
                                    </label>
                                    <div class="flex items-center gap-4 __icon">
                                        <select class="appearance-none block w-full  border-b-[1px] pb-1 px-4 leading-tight focus:outline-none focus:bg-white " id="list_danhmuc_add" type="text">

                                        </select>
                                        <button id="icon_add_danhmuc_edit" class="focus:outline-none icon_add" onclick="_show_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                        <button id="icon_remove_danhmuc_edit" class="focus:outline-none transition rotate-45  hidden icon_remove" onclick="_hidden_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                    </div>
                                    <p class="error_add_danhmuc hidden text-[red]">Chưa nhập tên danh mục</p>
                                    <div id="show_danhmuc_edit" class="flex w-full items-center mt-4 hidden __show">
                                        <div class="m px-3  ">
                                            <input class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tendanhmuc_add" type="text" placeholder="Tên danh mục">
                                        </div>
                                        <div class="flex justify-center">
                                            <button onclick="add_danhmuc('NDV')" class="bg-[red] rounded-md p-2  text-white text-md">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-full px-3 pb-2 flex">
                                <div class=" mt-2 w-1/2">
                                    <label class="flex items-center gap-2 uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="anhdichvu">
                                        Ảnh
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium" for="anhdichvu_add">
                                            <img class="w-[20px]" src="vendor/img/add.png">
                                        </label>
                                        <input type="file" accept="image/*" onchange="anhdichvu(this)" id="anhdichvu_add" multiple hidden />
                                    </label>
                                    <div class="flex gap-2">
                                        <div id="list_img_dichvu" class=" flex gap-2 flex-wrap">
                                        </div>
                                    </div>
                                </div>
                                <div class=" mt-2 w-1/2">
                                    <label class="flex items-center gap-2 uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="">
                                        Video
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="videodichvu_add">
                                            <img class="w-[20px]" src="vendor/img/add.png">
                                        </label>
                                        <input type="file" accept="video/*" onchange="videodichvu(this)" id="videodichvu_add" multiple hidden />
                                    </label>
                                    <div class="flex gap-2">
                                        <div id="list_video_dichvu" class="hidden flex gap-2 flex-wrap">
                                            <video width="320" id="video_path" height="240" controls autoplay>
                                            </video>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full md:w-full px-3 pb-2 pt-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="mota_dichvu_add">
                                    Mô tả
                                </label>
                                <textarea class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="mota_dichvu_add" type="text"></textarea>
                                <script>
                                    var editor = CKEDITOR.replace('mota_dichvu_add');
                                </script>

                            </div>
                            <div class="w-1/2">
                                <label class="block uppercase tracking-wide text-[red] text-xs font-medium mb-2" for="trangthai_add">
                                    Trạng thái
                                </label>
                                <div class="flex items-center">
                                    <span class="mr-3 text-md">Khóa</span>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" value="" id="trangthai_add" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-[blue-800] rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    </label>
                                    <span class="ml-3 text-md">Kích hoạt</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end items-center gap-5">
                    <div id="error_themdichvu" class="hidden"><span class="text-red-700">Thông tin màu đỏ là bắt buộc</span></div>
                    <div class="flex justify-end items-center gap-3">
                        <button onclick="add_dichvu()" type="button" class="inline-flex w-full items-center justify-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 sm:ml-3  max-w-[100px]">Lưu</button>
                        <button type="button" onclick="close_modal('form_add_dichvu')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form thêm mới gói dịch -->
<div class="relative z-10 hidden" id="form_add_goi_dichvu" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center  text-center items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-3xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal !text-[green]" id="title_modal">

                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_goi_dichvu')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div data-te-modal-body-ref class="overflow-y-scroll max-h-[500px] overflow-x-hidden">

                        <div class="relative flex-auto p-4 flex flex-wrap ">
                            <div class="w-full md:w-full px-3">
                                <input class="appearance-none block w-full border-b border-gray-200 py-1 px-4 leading-tight focus:outline-none focus:bg-white text-black " id="tendichvu_goidichvu_add" type="text" placeholder="Tên gói dịch vụ" autocomplete="off">
                            </div>
                            <div class="w-full md:w-full px-3 pb-4 flex gap-5 pt-5 items-start">
                                <div id="form_sotien_goidichvu" class="w-1/3 hidden">
                                    <label class="block uppercase tracking-wide text-[red] text-xs font-medium mb-2" for="sotien_goidichvu_add">
                                        Số tiền gói dịch vụ
                                    </label>
                                    <input onkeyup="_ChangeFormat(this)" class="appearance-none block w-full border-b border-gray-200 py-1 px-4 leading-tight focus:outline-none focus:bg-white text-black " id="sotien_goidichvu_add" type="text" autocomplete="off">
                                </div>
                                <div id="form_them_danhmuc" class="w-2/3 ">
                                    <div class="flex items-center gap-4 __icon">
                                        <div class="w-full">
                                            <label class="block uppercase tracking-wide text-[red] text-xs font-medium mb-2" for="list_danhmuc_add_goidichvu">
                                                Danh mục
                                            </label>
                                            <select class="appearance-none block w-full py-1 border-b-[1px] px-4 leading-tight focus:outline-none focus:bg-white " id="list_danhmuc_add_goidichvu" type="text">
                                            </select>
                                        </div>
                                        <button id="icon_add_danhmuc_edit" class="focus:outline-none icon_add" onclick="_show_add(this)"><img class="focus:outline-none w-[20px]" src="vendor/img/add.png"></button>
                                        <button id="icon_remove_danhmuc_edit" class="focus:outline-none transition rotate-45 w-[20px] hidden icon_remove" onclick="_hidden_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                    </div>
                                    <div id="show_danhmuc_edit" class="flex w-full items-center mt-4 hidden __show">
                                        <div class="m px-3  ">
                                            <input class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tendanhmuc_add_goidichvu" type="text" placeholder="Tên danh mục">
                                        </div>
                                        <div class="flex justify-center">
                                            <button onclick="add_danhmuc_goidichvu('NDV')" class="bg-[red] rounded-md p-2  text-white text-md">Lưu</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div id="form_add_chitiet_goidichvu" class="w-full px-3 bg-[#ffe5fd] rounded ">
                                <div class="flex items-center gap-3 py-2">
                                    <h4 class="text-lg  text-[#931693]">Dịch vụ</h4>
                                    <button class="focus:outline-none icon_add" onclick="_show_form(this)"><img class="focus:outline-none w-[20px]" src="vendor/img/add.png"></button>
                                    <button class="focus:outline-none transition rotate-45 hidden icon_remove" onclick="_hidden_form(this)"><img class="focus:outline-none w-[20px]" src="vendor/img/add.png"></button>
                                    <div class="form_phanbo_dichvu pl-10 flex items-center gap-3">
                                        <label class="block uppercase tracking-wide text-[red] font-medium " for="phanbo_giaban_goidichvu" id="text_phanbogia_goidichvu">
                                            Phân bổ giá
                                        </label>
                                        <div class="flex items-center ">
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" value="" onchange="open_modal_phanbogia_goidichvu() " id="phanbo_giaban_goidichvu" class="sr-only peer" checked>
                                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-[blue-800] rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form_sotien_phanbo_goidichvu pl-10 flex items-center gap-3">
                                        <input id="sotien_goidichvu" onkeyup="_ChangeFormat(this)" class="text-[red] max-w-[100px]  border-b border-red-500  py-2 px-3 focus:outline-none leading-tight text-right font_semi bg-transparent">
                                        <button id="btn_edit_sotien_phanbo_goidichvu" onclick="change_sotien_goidichvu()" class="hidden w-[24px] h-[24px] focus:outline-none"><img src="vendor/img/checked.png"></button>
                                        <button id="btn_reload_sotien_phanbo_goidichvu" class="hidden w-[24px] h-[24px] focus:outline-none"><img src="vendor/img/wait32.png"></button>
                                    </div>
                                </div>

                                <div class="flex gap-3 form_add_lieutrinh hidden w-full">
                                    <div class="w-2/6 ">
                                        <input hidden id="mshh_add_goidichvu">
                                        <label class="block uppercase tracking-wide text-black text-xs font-medium mb-2" for="tenhanghoa_add_goidichvu">
                                            Tên HH/DV
                                        </label>
                                        <input onkeyup="find_hanghoa(this, 'goidichvu')" class="appearance-none block  w-full  py-3 px-4 phone:px-1 leading-tight focus:outline-none  " id="tenhanghoa_add_goidichvu" type="text" autocomplete="off">
                                    </div>
                                    <div class="w-1/6">
                                        <label class="block uppercase tracking-wide text-black text-xs font-medium mb-2" for="soluong_add_goidichvu">
                                            Số lượng
                                        </label>
                                        <input class="appearance-none block w-full  text-black  py-3 px-4 phone:px-1 leading-tight focus:outline-none focus:bg-white " id="soluong_add_goidichvu" type="text" value="1" autocomplete="off" onkeyup="tinhtong_dongia_goidichvu(this);_ChangeFormat(this)">
                                    </div>
                                    <div class="w-1/6">
                                        <label class="block uppercase tracking-wide text-black text-xs font-medium mb-2" for="ptthuchien_add_goidichvu">
                                            % thực hiện
                                        </label>
                                        <input class="appearance-none block w-full  text-black  py-3 px-4 phone:px-1 leading-tight focus:outline-none focus:bg-white " id="ptthuchien_add_goidichvu" type="text" value="1" autocomplete="off">
                                    </div>

                                    <div class="w-1/6 ">

                                        <label class="block uppercase tracking-wide text-black text-xs font-medium mb-2" for="dongia_add_goidichvu">
                                            Thành tiền
                                        </label>
                                        <input hidden id="dongia_goidichvu_add_tam">
                                        <input onkeyup="_ChangeFormat(this)" class="appearance-none block w-[100px] phone:w-[70px] text-gray-700  py-3 px-4 phone:px-1 leading-tight focus:outline-none focus:bg-white " id="dongia_add_goidichvu" type="text" autocomplete="off">
                                    </div>
                                    <div class="w-1/6 flex items-end justify-end">
                                        <div class="px-3 btn_add_lieutrinh flex items-end  phone:px-0">
                                            <button onclick="add_chitiet_goidichvu()" class="focus:outline-none bg-[red] rounded-md p-2  text-white text-md px-4">Lưu</button>
                                        </div>

                                    </div>
                                </div>
                                <div id="form_hanghoa_goidichvu" class="hidden">
                                    <table class="min-w-full divide-y divide-white bg-[#e4fff0] mt-2 rounded">
                                        <thead>
                                            <tr class="font_semi">
                                                <th class=" px-4 py-2">#</th>
                                                <th class=" px-4 py-2">Tên HH/DV</th>
                                                <th class=" px-4 py-2 text-end">ĐVT nhỏ nhất</th>
                                                <th class=" px-4 py-2 text-end">SL nhỏ nhất</th>
                                                <th class=" px-4 py-2 text-end">% thực hiện</th>
                                                <th class=" px-4 py-2 text-end">Đơn giá</th>
                                            </tr>
                                        </thead>
                                        <tbody id='list_sanpham_goidichvu' class="list_sanpham divide-y divide-white">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="py-2">
                                    <table class="min-w-full divide-y divide-gray-100 dark:divide-gray-200">
                                        <thead>
                                            <tr class="font_semi">
                                                <th class=" px-4 py-2">#</th>
                                                <th class=" px-4 py-2">Hàng hóa/Dịch vụ</th>
                                                <th class=" px-4 py-2 text-end">Số lượng</th>
                                                <th class=" px-4 py-2 text-end">Thành tiền</th>
                                                <th class=" px-4 py-2 text-end">% thực hiện</th>
                                                <th class=" px-4 py-2 text-center">...</th>
                                            </tr>
                                        </thead>
                                        <tbody id='chitiet_lieutrinh_goidichvu' class="divide-y divide-gray-100 dark:divide-gray-200">

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div id="form_them_hinhanh_video" class="w-full md:w-full px-3 py-2 flex">
                                <div class=" mt-2 w-1/2">
                                    <!-- thêm hình trong add -->
                                    <label id="form_add_anh_goidichvu" class="flex items-center gap-2 uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="anhdichvu">
                                        Ảnh
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium" for="anh_goidichvu_add">
                                            <img class="w-[20px]" src="vendor/img/add.png">
                                        </label>
                                        <input type="file" accept="image/*" onchange="anh_goidichvu(this)" id="anh_goidichvu_add" multiple hidden />
                                    </label>
                                    <!-- chỉnh hình trong add -->
                                    <label id="form_edit_anh_goidichvu" class="flex items-center gap-2 uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="anhdichvu">
                                        Ảnh
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium" for="anh_goidichvu_edit">
                                            <img class="w-[20px]" src="vendor/img/add.png">
                                        </label>
                                        <input type="file" accept="image/*" onchange="add_image_goidichvu(this)" id="anh_goidichvu_edit" multiple hidden />
                                    </label>
                                    <div class="flex gap-2">
                                        <div id="list_img_goidichvu" class=" flex gap-2 flex-wrap">
                                        </div>
                                        <div>

                                        </div>
                                    </div>
                                </div>

                                <div class=" mt-2 w-1/2">
                                    <label class="flex items-center gap-2 uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="">
                                        Video
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="video_goidichvu_add">
                                            <img class="w-[20px]" src="vendor/img/add.png">
                                        </label>
                                        <input type="file" accept="video/*" onchange="video_goidichvu(this)" id="video_goidichvu_add" multiple hidden />
                                    </label>
                                    <div class="flex gap-2">
                                        <div id="list_video_goidichvu" class="hidden flex gap-2 flex-wrap">
                                            <video width="320" id="video_goidichvu_path" height="240" controls>
                                            </video>
                                        </div>
                                        <div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="form_them_mota" class="w-full md:w-full px-3 pb-2 pt-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="mota_goidichvu_add">
                                    Mô tả
                                </label>
                                <textarea class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="mota_goidichvu_add" type="text"></textarea>
                                <script>
                                    var editor = CKEDITOR.replace('mota_goidichvu_add');
                                </script>

                            </div>
                            <div id="form_them_trangthai" class="w-1/2  px-3 pb-4">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="trangthai_add_goidichvu">
                                    Trạng thái
                                </label>
                                <div class="flex items-center">
                                    <span class="mr-3 text-md">Khóa</span>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" value="" id="trangthai_add_goidichvu" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-[blue-800] rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    </label>
                                    <span class="ml-3 text-md">Kích hoạt</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end items-center gap-5">
                    <div id="error_goidichvu" class="hidden"><span class="text-red-700">Thông tin màu đỏ là bắt buộc</span></div>
                    <div class="flex justify-end items-center gap-3">
                        <input id="msdichvu_goidichvu" hidden>
                        <button id="btn_add_goidichvu" onclick="add_goidichvu()" type="button" class="inline-flex w-full items-center justify-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 sm:ml-3  max-w-[100px] hidden">Lưu</button>
                        <button id="btn_edit_goidichvu" onclick="edit_goidichvu()" type="button" class="inline-flex w-full items-center justify-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 sm:ml-3  max-w-[100px] hidden">Lưu</button>
                        <button type="button" onclick="close_modal('form_add_goi_dichvu')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Form chỉnh sửa dịch vụ -->
<div class="relative z-10 hidden" id="form_edit_dichvu" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center  text-center items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-2xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal !text-[green]" id="exampleModalLabel">
                            Chỉnh dịch vụ
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_edit_dichvu')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div data-te-modal-body-ref class="overflow-y-scroll max-h-[500px] overflow-x-hidden">

                        <div class="relative flex-auto p-4 px-2 flex flex-wrap ">
                            <div class="w-full md:w-full px-3 pb-4 ">
                                <label class="block uppercase tracking-wide text-[red] text-xs font-medium mb-2" for="tendichvu_edit">
                                    Tên dịch vụ
                                </label>
                                <input class="appearance-none block w-full  border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="tendichvu_edit" type="text" autocomplete="off">
                            </div>

                            <div class="w-full md:w-full px-3 pb-4 flex gap-5 phone:gap-2">
                                <div class="w-2/6">
                                    <label class="block uppercase tracking-wide text-[red] text-xs font-medium mb-2" title='Dịch vụ có mô tả sẽ không chỉnh được giá' for="sotien_edit">
                                        Số tiền <span title='Dịch vụ có mô tả sẽ không chỉnh được giá'>*</span>
                                    </label>
                                    <input onkeyup="_ChangeFormat(this)" class="appearance-none block w-full border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="sotien_edit" type="text" autocomplete="off">
                                </div>
                                <div id="__giavon_edit" class="w-2/6  pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="giavon_edit">
                                        Giá vốn
                                    </label>
                                    <input onkeyup="_ChangeFormat(this)" class="appearance-none block w-full   border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="giavon_edit" type="text" value="0" autocomplete="off">
                                </div>
                                <div class="w-1/6 pb-4">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2 whitespace-nowrap" for="thoigian_edit">
                                        Thời gian
                                    </label>
                                    <input class="appearance-none block w-full  border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="thoigian_edit" type="text" autocomplete="off">

                                </div>
                                <div id='__ngaybaohanh_edit' class="w-1/6  pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2 whitespace-nowrap" for="ngaybaohanh_edit">
                                        Ngày bảo hành
                                    </label>
                                    <input class="appearance-none block w-full   border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="ngaybaohanh_edit" type="text" autocomplete="off">
                                </div>

                            </div>

                            <div class="w-full md:w-full px-3 pb-2 flex gap-5">
                                <div class="w-1/3  pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="thuesuat_edit">
                                        Thuế
                                    </label>
                                    <input class="appearance-none block w-full   border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="thuesuat_edit" type="text" autocomplete="off">
                                </div>

                                <div id='__pttichluy_edit' class="w-1/3  pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="pttichluy_edit">
                                        % tích lũy
                                    </label>
                                    <input class="appearance-none block w-full   border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="pttichluy_edit" type="text" autocomplete="off">
                                </div>
                                <div id='__ptthuchien_edit' class="w-1/3  pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="ptthuchien_edit">
                                        % thực hiện
                                    </label>
                                    <input class="appearance-none block w-full   border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="ptthuchien_edit" type="text" autocomplete="off">
                                </div>
                            </div>

                            <div class="w-full md:w-full px-3 pb-2 flex">
                                <div class="w-1/3">
                                    <label class="block uppercase tracking-wide text-[red] text-xs mb-2" for="lieutrinh_edit">
                                        Liệu trình
                                    </label>
                                    <div class="flex items-center">
                                        <span class="mr-3 text-md  dark:text-gray-300">Không</span>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" value="" onchange="hien_pttichluy_edit()" id="lieutrinh_edit" class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                        </label>
                                        <span class="ml-3 text-md  dark:text-gray-300">Có</span>
                                    </div>
                                </div>
                                <div class="w-2/3 px-3 pb-4 ">
                                    <label class="block uppercase tracking-wide text-[red] text-xs mb-2" for="list_danhmuc_edit">
                                        Danh mục
                                    </label>
                                    <div class="flex items-center gap-4 __icon">
                                        <select class="appearance-none block w-full border-b-[1px] px-4 leading-tight focus:outline-none focus:bg-white " id="list_danhmuc_edit" type="text">

                                        </select>
                                        <button id="icon_add_danhmuc" class="focus:outline-none icon_add" onclick="_show_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                        <button id="icon_remove_danhmuc" class="focus:outline-none transition rotate-45  hidden icon_remove" onclick="_hidden_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                    </div>
                                    <p class="error_add_danhmuc_edit hidden text-[red]">Chưa nhập tên danh mục</p>
                                    <div id="show_danhmuc" class="flex w-full items-center mt-4 hidden __show">
                                        <div class="m px-3  ">
                                            <input class="appearance-none block w-full  border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tendanhmuc_edit" type="text" placeholder="Tên danh mục">
                                        </div>
                                        <div class="flex justify-center">
                                            <button onclick="add_danhmuc_edit('NDV')" class="bg-[red] rounded-md p-2  text-white text-md">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-full px-3 pb-2 flex">
                                <div class=" mt-2 w-1/2">
                                    <label class="flex items-center gap-2 uppercase tracking-wide text-gray-700 font-medium mb-2" for="anhdichvu">
                                        Ảnh
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium" for="anhdichvu_edit">
                                            <img class="w-[20px]" src="vendor/img/add.png">
                                        </label>
                                        <input type="file" accept="image/*" onchange="add_image(this)" id="anhdichvu_edit" multiple hidden />
                                    </label>
                                    <div class="flex gap-2">
                                        <div id="list_img_dichvu_edit" class=" flex gap-2 flex-wrap">
                                        </div>

                                    </div>
                                </div>
                                <div class=" mt-2 w-1/2">
                                    <label class="flex items-center gap-2 uppercase tracking-wide text-gray-700  font-medium mb-2" for="">
                                        Video
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="videodichvu_edit">
                                            <img class="w-[20px]" src="vendor/img/add.png">
                                        </label>
                                        <input type="file" accept="video/*" onchange="videodichvu_edit(this)" id="videodichvu_edit" multiple hidden />
                                    </label>
                                    <div class="flex gap-2">
                                        <div id="list_video_dichvu_edit" class=" flex gap-2 flex-wrap">

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="w-full md:w-full px-3 pb-2 pt-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="mota_dichvu_edit">
                                    Mô tả
                                </label>
                                <textarea class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="mota_dichvu_edit" type="text"></textarea>
                                <script>
                                    var editor = CKEDITOR.replace('mota_dichvu_edit');
                                </script>

                            </div>
                            <div class="w-1/2">
                                <label class="block uppercase tracking-wide text-[red] text-xs font-medium mb-2" for="trangthai_edit">
                                    Trạng thái
                                </label>
                                <div class="flex items-center">
                                    <span class="mr-3 text-md ">Khóa</span>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" value="" id="trangthai_edit" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    </label>
                                    <span class="ml-3 text-md ">Kích hoạt</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end items-center gap-3">
                    <input id="msdichvu_edit" hidden>
                    <button onclick="edit_dichvu()" type="button" class="inline-flex w-full items-center justify-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 sm:ml-3  max-w-[100px]">Lưu</button>
                    <button type="button" onclick="close_modal('form_edit_dichvu')" class=" inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form xóa dịch vụ -->
<div class="relative z-10 hidden" id="form_delete_dichvu" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full  justify-center text-center items-center sm:p-0">

            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white   ">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[red]" id="exampleModalLabel">
                            Đồng ý xóa
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_delete_dichvu')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="relative flex-auto p-4" data-te-modal-body-ref>
                        <p id="tendichvu_delele" class="text-center text-[red] text-[16px]"></p>
                        <p id="error_dichvu_delele" class="text-[16px]"></p>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end items-center gap-3">
                    <input hidden id='msdichvu_delete'>
                    <input hidden id='list_img_delete'>
                    <input hidden id='list_video_delete'>
                    <button type="button" onclick="delete_dichvu(this)" class="inline-flex w-full items-center justify-center rounded-md bg-red-600 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-red-500 sm:mt-0 max-w-[100px]  ">Xóa</button>
                    <button type="button" onclick="close_modal('form_delete_dichvu')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- ------------------------------------------Liệu trình --------------------------------------->

<!-- Form copy liệu trình -->
<div class="relative z-20 hidden" id="form_copy_lieutrinh" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full  justify-center text-center items-center sm:p-0">

            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white   ">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[red]" id="exampleModalLabel">
                            Copy liệu trình
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_copy_lieutrinh')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="relative flex-auto p-4" id="tendichvu_delele" data-te-modal-body-ref>
                        <p id="title_tenlieutrinh_copy"></p>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end items-center gap-3">
                    <input hidden id='mslieutrinh_copy'>
                    <input hidden id='msdichvu_copy'>
                    <input hidden id='tenlieutrinh_copy'>
                    <button type="button" onclick="copy_lieutrinh()" class="inline-flex w-full items-center justify-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 sm:mt-0 max-w-[100px]">Lưu</button>
                    <button type="button" onclick="close_modal('form_copy_lieutrinh')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form thêm liệu trình-->
<div class="relative z-10 hidden" id="form_lieutrinh" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-8xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="tendichvu" class='text-black'></p>

                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_lieutrinh')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="relative grid grid-cols-12 p-4 overflow-y-scroll max-h-[500px]" id="" data-te-modal-body-ref>
                        <div id="list_form_lieutrinh" class="col-span-6 phone:col-span-12 tablet:col-span-12 pr-2 border-r min-h-[300px] max-h-[300px]  overflow-y-scroll">
                            <div class="flex items-center gap-3 pb-2">
                                <h4 class="text-lg  text-[green] ">Danh sách liệu trình </h4>
                                <button class="focus:outline-none icon_add" onclick="_show_form(this)"><img class="focus:outline-none max-w-[20px] min-w-[20px]" src="vendor/img/add.png"></button>
                                <button class="focus:outline-none transition rotate-45  hidden icon_remove" onclick="_hidden_form(this)"><img class="focus:outline-none max-w-[20px] min-w-[20px]" src="vendor/img/add.png"></button>

                                <div id="error_themlieutrinh" class="hidden"><span class="text-red-700">Thông tin màu đỏ là bắt buộc</span></div>
                            </div>
                            <div class="form_add_lieutrinh hidden">
                                <div class="w-full pb-4 ">
                                    <div class="w-full flex items-center">
                                        <label class="w-1/4 block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2  whitespace-nowrap">
                                            Tên liệu trình
                                        </label>
                                        <input class="appearance-none block w-3/4 text-gray-700 border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="tenlieutrinh_add" type="text" autocomplete="off">
                                    </div>
                                    <div class="w-full flex pt-3 items-center">
                                        <label class="w-1/4 block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2  whitespace-nowrap">
                                            <span id='load_solan'>
                                                Thực hiện sau
                                            </span>
                                            <span> (ngày)</span>
                                        </label>
                                        <div class='flex items-center gap-3 w-3/4'>
                                            <input class="appearance-none block w-1/2  text-gray-700 border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="songay_add" type="text" autocomplete="off">
                                            <div id="" class="btn_add_lieutrinh flex items-end justify-end ">
                                                <input hidden id="msdichvu_add">
                                                <input hidden id="thanhtien_dichvu">
                                                <button onclick="add_lieutrinh()" class="focus:outline-none bg-[red] rounded-md p-2 px-4 text-white text-md">Lưu</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="p-3">
                                <table class="min-w-full divide-y divide-gray-100 dark:divide-gray-200">
                                    <thead>
                                        <tr class="font_semi">
                                            <th class=" px-4 py-2 text-center">Lần</th>
                                            <th class=" px-4 py-2">Tên liệu trình</th>
                                            <th class=" px-4 py-2 text-center">Số ngày</th>
                                            <th class=" px-4 py-2 text-end">Số tiền</th>
                                            <th class=" px-4 py-2 text-end">...</th>
                                        </tr>
                                    </thead>
                                    <tbody id='list_lieutrinh' class="divide-y divide-gray-100 dark:divide-gray-200">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="item_chitiet_lieutrinh" class="col-span-6 phone:col-span-12 tablet:col-span-12 pl-2 hidden min-h-[300px] max-h-[300px]   overflow-y-scroll">
                            <div class="flex items-center gap-3 pb-3">
                                <h4 class="text-lg  text-[green]"><span id="tenlieutrinh"></span></h4>
                                <button class="focus:outline-none icon_add" onclick="_show_form(this)"><img class="focus:outline-none min-w-[20px] max-w-[20px] min-h-[20px] max-h-[20px]" src="vendor/img/add.png"></button>
                                <button class="focus:outline-none transition rotate-45  hidden icon_remove" onclick="_hidden_form(this)"><img class="focus:outline-none  w-[20px] min-w-[20px] max-w-[20px] min-h-[20px] max-h-[20px]" src="vendor/img/add.png"></button>
                                <div class="form_phanbo_dichvu pl-10 flex items-center gap-3">
                                    <label class="block uppercase tracking-wide text-[red] font-medium " for="phanbo_giaban" id="text_phanbogia">
                                        Phân bổ giá
                                    </label>
                                    <div class="flex items-center ">
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" value="" onchange="open_modal_phanbogia() " id="phanbo_giaban" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-[blue-800] rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                        </label>
                                    </div>
                                </div>
                                <div class="form_sotien_phanbo_dichvu pl-10 flex items-center gap-3">
                                    <input id="sotien_dichvu" onkeyup="_ChangeFormat(this)" class="text-[red] max-w-[100px]  border-b border-gray-200 rounded py-2 px-3 focus:outline-none leading-tight text-right font_semi">
                                    <button id="btn_edit_sotien_phanbo" onclick="change_sotien_dichvu()" class="hidden w-[24px] h-[24px] focus:outline-none"><img src="vendor/img/checked.png"></button>
                                    <button id="btn_reload_sotien_phanbo" class="hidden w-[24px] h-[24px] focus:outline-none"><img src="vendor/img/wait32.png"></button>
                                </div>

                                <div id="error_them_chitietlieutrinh" class="hidden"><span class="text-red-700">Thông tin màu đỏ là bắt buộc</span></div>
                            </div>

                            <div class="grid grid-cols-12 gap-3 form_add_lieutrinh hidden items-end ">
                                <div class=" col-span-5">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="tenhanghoa_add">
                                        Tên hàng hóa/Dịch vụ
                                    </label>
                                    <input hidden id="mshh_add">
                                    <input onkeyup="find_hanghoa(this, 'mota')" class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="tenhanghoa_add" type="text" autocomplete="off">
                                </div>
                                <div class=" col-span-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="soluong_add">
                                        Số lượng
                                    </label>
                                    <input onkeyup="tinhtong_dongia(this);_ChangeFormat(this)" class="appearance-none block w-full   border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="soluong_add" type="text" value="1" autocomplete="off">
                                </div>
                                <div class=" col-span-4">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="dongia_add">
                                        Thành tiền
                                    </label>
                                    <input hidden id="dongia_dichvu_add_tam">
                                    <input onkeyup="_ChangeFormat(this)" class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="dongia_add" type="text" autocomplete="off">

                                </div>
                                <div class="col-span-4 form_dinhluong">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="dinhluong_add">
                                        Định lượng
                                    </label>
                                    <input onkeyup="this.value = this.value.replace(/[^0-9\\,.]/g,'')" class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="dinhluong_add" type="text" autocomplete="off" value="0">

                                </div>
                                <div class=" col-span-2 form_dvt_dinhluong">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="list_dvt_nhonhat">
                                        ĐVT nhỏ nhất
                                    </label>
                                    <input class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="dvt_dinhluong_add" type="text" autocomplete="off" readonly>

                                </div>
                                <div class=" col-span-2 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="ptthuchien_dichvu_add">
                                        % thực hiện
                                    </label>
                                    <input class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="ptthuchien_dichvu_add" type="text" autocomplete="off">

                                </div>
                                <div class=" col-span-4 ">
                                    <div class=" btn_add_lieutrinh flex items-end  ">
                                        <input hidden id="mslieutrinh_add">
                                        <input hidden id="dvt_quydoi_add_dichvu">
                                        <button onclick="add_chitiet_lieutrinh()" class="focus:outline-none bg-[red] rounded-md p-2  text-white text-md px-4">Lưu</button>
                                    </div>

                                </div>


                            </div>
                            <div id="form_hanghoa" class="hidden">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 mt-2 bg-[#d6f5d6] rounded">
                                    <thead>
                                        <tr class="font_semi">
                                            <th class=" px-4 py-2">#</th>
                                            <th class=" px-4 py-2">Tên HH/DV</th>
                                            <th class=" px-4 py-2 text-end">ĐVT nhỏ nhất</th>
                                            <th class=" px-4 py-2 text-end">SL nhỏ nhất</th>
                                            <th class=" px-4 py-2 text-end">% thực hiện</th>
                                            <th class=" px-4 py-2 text-end">Đơn giá</th>
                                        </tr>
                                    </thead>
                                    <tbody id='list_sanpham' class="list_sanpham divide-y divide-white">

                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3 p-3 bg-[#ffe5fd] ">
                                <table class="min-w-full divide-y divide-gray-100 dark:divide-gray-200">
                                    <thead>
                                        <tr class="font_semi">
                                            <th class=" px-4 py-2">#</th>
                                            <th class=" px-4 py-2">Hàng hóa/Dịch vụ</th>
                                            <th class=" px-4 py-2 text-end">SL</th>
                                            <th class=" px-4 py-2 text-end">Thành tiền</th>
                                            <th class=" px-4 py-2 text-end">Định lượng</th>
                                            <th class=" px-4 py-2 text-end">% thực hiện</th>
                                            <th class=" px-4 py-2 text-center">...</th>
                                        </tr>
                                    </thead>
                                    <tbody id='chitiet_lieutrinh' class="divide-y divide-gray-100 dark:divide-gray-200">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">

                    <button type="button" onclick="close_modal('form_lieutrinh')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form xóa liệu trình -->
<div class="relative z-10 hidden" id="form_delete_lieutrinh" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center text-center items-center sm:p-0">

            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white   ">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[red]" id="exampleModalLabel">
                            Đồng ý xóa
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_delete_lieutrinh')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="relative flex-auto p-4" id="tenlieutrinh_delele" data-te-modal-body-ref>

                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id='mslieutrinh_delete'>
                    <button type="button" onclick="delete_lieutrinh()" class="inline-flex w-full items-center justify-center rounded-md bg-red-600 px-5 py-2  text-white shadow-sm hover:bg-red-500 sm:ml-3 max-w-[100px] ">Xóa</button>
                    <button type="button" onclick="close_modal('form_delete_lieutrinh')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form phân bổ giá dịch vụ -->
<div class="relative z-10 hidden" id="form_phanbogia" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center text-center items-center sm:p-0">

            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white   ">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[red]" id="exampleModalLabel">
                            Chú ý
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="huy_phanbo()" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="relative flex-auto p-4" id="tenlieutrinh_delele" data-te-modal-body-ref>
                        <p class="text-center leading-8 text-md">
                            Phân bổ lại giá cho các hàng hóa, dịch vụ kèm theo với tổng tiền thu là: <span id="sotien_phanbogia" class="text-[red] font_semi "></span>.
                            </br>
                            Việc phân bổ giá KHÔNG thể phục hồi lại giá trước khi phân bổ.

                        </p>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id='mslieutrinh_delete'>
                    <button type="button" onclick="set_phanbo('dichvu')" class="inline-flex w-full items-center justify-center rounded-md bg-red-600 px-5 py-2  text-white shadow-sm hover:bg-red-500 sm:ml-3 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="huy_phanbo()" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form phân bổ giá gói dịch vụ -->
<div class="relative z-10 hidden" id="form_phanbogia_goidichvu" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center text-center items-center sm:p-0">

            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white   ">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[red]" id="exampleModalLabel">
                            Chú ý
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="huy_phanbo_goidichvu()" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="relative flex-auto p-4" id="tenlieutrinh_delele" data-te-modal-body-ref>
                        <p class="text-center leading-8 text-md">
                            Phân bổ lại giá cho các hàng hóa, dịch vụ kèm theo với tổng tiền thu là: <span id="sotien_phanbogia_goidichvu" class="text-[red] font_semi "></span>.
                            </br>
                            Việc phân bổ giá KHÔNG thể phục hồi lại giá trước khi phân bổ.

                        </p>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id='mslieutrinh_delete'>
                    <button type="button" onclick="set_phanbo('goidichvu')" class="inline-flex w-full items-center justify-center rounded-md bg-red-600 px-5 py-2  text-white shadow-sm hover:bg-red-500 sm:ml-3 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="huy_phanbo_goidichvu()" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form xóa chi tiết liệu trình -->
<div class="relative z-10 hidden" id="form_delete_chitiet_lieutrinh" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center text-center items-center sm:p-0">

            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white   ">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[red]" id="exampleModalLabel">
                            Đồng ý xóa
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_delete_chitiet_lieutrinh')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="relative flex-auto p-4" id="tenlieutrinh_chitiet_delele" data-te-modal-body-ref>

                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id='mslieutrinh_chitiet_delete'>
                    <input hidden id='msdichvu_chitiet_delete'>
                    <input hidden id='mshh_chitiet_delete'>
                    <input hidden id='rowid_chitiet_delete'>
                    <button type="button" onclick="delete_chitiet_lieutrinh()" class="inline-flex w-full items-center justify-center rounded-md bg-red-600 px-5 py-2 text-white shadow-sm hover:bg-red-500 sm:ml-3 max-w-[100px]">Xóa</button>
                    <button type="button" onclick="close_modal('form_delete_chitiet_lieutrinh')" class=" inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="vendor/js/dichvu.js?v=<?= md5_file('vendor/js/dichvu.js') ?>"></script>
<script>
    $(document).ready(function() {
        load_dichvu();
        load_danhmuc()
    });
</script>