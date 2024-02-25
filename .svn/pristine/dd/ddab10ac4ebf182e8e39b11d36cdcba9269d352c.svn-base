<main class="bg_main">
    <div class="flex flex-col">
        <!--Grid Form-->

        <div class="flex flex-1  flex-col md:flex-row lg:flex-row">
            <div class="mb-2 w-full">
                <div class="bg-[#ffffff36] rounded-md  px-2 py-3 ">
                    <div class="flex justify-between  items-center tablet:grid tablet:grid-cols-12 phone:grid phone:grid-cols-12">
                        <div class="flex gap-5 tablet:gap-3  tablet:col-span-12 tablet:grid tablet:grid-cols-12 phone:gap-3  phone:col-span-12 phone:grid phone:grid-cols-12 items-center">
                            <p class="text-lg text-[#83ff00] tablet:col-span-12  tablet:text-center phone:col-span-12  phone:text-center whitespace-nowrap">Nhân viên</p>
                            <div class='flex tablet:col-span-12 tablet:justify-between phone:col-span-12 phone:justify-between'>
                                <div class="flex justify-center items-center tablet:w-full phone:w-full">
                                    <div class=" xl:w-96 tablet:w-full phone:w-full">
                                        <div class="input-group relative flex gap-7 items-center w-full tablet:grid tablet:grid-cols-12 tablet:justify-between phone:grid phone:grid-cols-12 phone:justify-between phone:gap-4">
                                            <form onsubmit="return false;" class="tablet:col-span-6 phone:col-span-6">
                                                <input type="search" onkeyup="load_nhanvien()" id="value_search" class="w-[300px] phone:w-[200px] mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-white" placeholder="Tìm tên hoặc số điện thoại" aria-label="Search" aria-describedby="button-addon2" autocomplete="off">
                                            </form>
                                            <select onchange="load_nhanvien()" class="tablet:col-span-6 phone:col-span-6 phone:ml-4  mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-[white] " id="loainv_filter" type="text">

                                            </select>
                                            <select onchange="load_nhanvien()" class="tablet:col-span-3 phone:col-span-4  mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-[white] " id="chucvu_filter" type="text">

                                            </select>
                                            <select onchange="load_nhanvien()" class="tablet:col-span-3 phone:col-span-4  mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-[white] " id="trangthai_filter" type="text">
                                                <option value="" class='text-[#747474]'>Tất cả trạng thái</option>
                                                <option value="0" class="text-black">Đang sử dụng</option>
                                                <option value="1" class="text-black">Khóa</option>
                                            </select>
                                            <div class="flex gap-5 tablet:col-span-6 phone:col-span-4 fullscreen:hidden laptop:hidden tablet:justify-end phone:justify-end phone:whitespace-nowrap">
                                                <button class="bg-[#008d3f] p-2 rounded-md hover:bg-green-600 text-white" onclick="open_modal('form_add_nhanvien')">Thêm nhân viên</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-5 tablet:hidden phone:hidden ">
                            <button class="bg-[#008d3f] p-2 rounded-md hover:bg-green-600 text-white" onclick="open_modal('form_add_nhanvien')">Thêm nhân viên</button>
                        </div>
                    </div>

                </div>
                <div class="p-3 border-[#ffffff40] tablet:overflow-x-scroll phone:overflow-x-scroll">
                    <table class="min-w-full ">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class=" text-center font-thin px-4 py-2">#</th>
                                <th class=" text-left font-thin px-4 py-2">Tên nhân viên</th>
                                <th class=" text-center font-thin px-4 py-2 ">Số điện thoại</th>
                                <th class=" text-center font-thin px-4 py-2 ">Công việc</th>
                                <th class=" text-center font-thin px-4 py-2 ">Chức vụ</th>
                                <th class=" text-center font-thin px-4 py-2 ">Giới tính</th>
                                <th class=" text-center font-thin px-4 py-2 hidden">Địa chỉ</th>
                                <th class=" text-center font-thin px-4 py-2 hidden">Email</th>
                                <th class=" text-center font-thin px-4 py-2 ">Ngày sinh</th>
                                <th class=" text-center font-thin px-4 py-2 ">Trạng thái</th>
                                <th class=" text-center font-thin px-4 py-2 ">Cấp quyền</th>
                                <th class=" text-center font-thin px-4 py-2 ">...</th>
                            </tr>
                        </thead>
                        <tbody id='list_nhanvien' class="">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Form thêm mới nhân viên -->
<div class="relative z-10 hidden" id="form_add_nhanvien" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center  text-center items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-2xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[green]" id="exampleModalLabel">
                            Thêm nhân viên
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_nhanvien')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div data-te-modal-body-ref class="overflow-y-scroll max-h-[500px] overflow-x-hidden">

                        <div class="relative flex-auto p-4 flex flex-wrap ">

                            <div class="w-full md:w-full px-3 pb-4  flex gap-5">
                                <div class="w-full pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="tennhanvien_add">
                                        Tên nhân viên
                                    </label>
                                    <input class="appearance-none block w-full  border-b border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tennhanvien_add" type="text" autocomplete="off">
                                </div>

                            </div>
                            <div class="w-full md:w-full px-3 pb-4  flex gap-5">
                                <div class="w-1/2 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="sodienthoai_add">
                                        Số điện thoại
                                    </label>
                                    <input class="appearance-none block w-full border-b border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="sodienthoai_add" type="text" autocomplete="off">
                                </div>
                                <div class="w-full pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="matkhau_add">
                                        Mật khẩu
                                    </label>
                                    <input class="appearance-none block w-full border-b border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="matkhau_add" type="password">
                                </div>
                            </div>

                            <div class="w-full md:w-full px-3 pb-4 flex gap-5">
                                <div class="w-1/2 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="list_nhanvien_add">
                                        Loại nhân viên
                                    </label>
                                    <div class="flex items-center gap-2 __icon">
                                        <select class="list_nhanvien appearance-none block w-full  border-b-[1px]   py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="list_nhanvien_add" type="text">

                                        </select>
                                        <button id="" class="focus:outline-none icon_add" onclick="_show_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                        <button id="" class="focus:outline-none transition rotate-45 hidden icon_remove" onclick="_hidden_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                    </div>
                                    <div id="" class="flex w-full items-center mt-4 hidden __show">
                                        <div class="m px-3  ">
                                            <input class="appearance-none block w-full  border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tenloainhanvien_add" type="text" placeholder="Tên loại nhân viên">
                                        </div>
                                        <div class="flex justify-center">
                                            <button onclick="add_danhmuc('loai_nv','tenloainhanvien_add','Nhân viên','LNV')" class="bg-[red] rounded-md p-2  text-white text-md">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="list_chucvu_add">
                                        Chức vụ
                                    </label>
                                    <div class="flex items-center gap-2 __icon">
                                        <select class="list_chucvu appearance-none block w-full  border-b-[1px]   py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="list_chucvu_add" type="text">

                                        </select>
                                        <button id="icon_add_chucvu_edit" class="focus:outline-none icon_add" onclick="_show_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                        <button id="icon_remove_chucvu_edit" class="focus:outline-none transition rotate-45  hidden icon_remove" onclick="_hidden_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                    </div>
                                    <div id="show_chucvu_edit" class="flex w-full items-center mt-4 hidden __show">
                                        <div class="m px-3  ">
                                            <input class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tenchucvu_add" type="text" placeholder="Tên chức vụ">
                                        </div>
                                        <div class="flex justify-center">
                                            <button onclick="add_danhmuc('chucvu', 'tenchucvu_add', 'Chức vụ','LCV')" class="bg-[red] rounded-md p-2  text-white text-md">Lưu</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="w-full md:w-full px-3 pb-2 flex gap-8">
                                <div class="w-1/2 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="diachi_add">
                                        Địa chỉ
                                    </label>
                                    <input class="appearance-none block w-full   border-b border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="diachi_add" type="text" autocomplete="off">
                                </div>
                                <div class="w-1/2 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="email_add">
                                        Email
                                    </label>
                                    <input class="appearance-none block w-full  border-b border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="email_add" type="text" autocomplete="off">
                                </div>
                            </div>
                            <div class="w-full md:w-full px-3 pb-2 flex gap-8 phone:gap-3">
                                <div class="w-1/3 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="gioitinh_add">
                                        Giới tính
                                    </label>

                                    <select class=" appearance-none block w-full   border-b-[1px]   py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="gioitinh_add" type="text">
                                        <option value="NAM">Nam</option>
                                        <option value="NỮ">Nữ</option>
                                    </select>
                                </div>
                                <div class="w-1/3 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="cccd_add">
                                        CCCD
                                    </label>
                                    <input onkeyup="this.value = this.value.replace(/[^0-9\\,]/g,'')" class="appearance-none block w-full  border-b border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="cccd_add" type="text" autocomplete="off">
                                </div>
                                <div class="w-1/3 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="ngaysinh_add">
                                        Ngày sinh
                                    </label>
                                    <div id="ngay" class="input-group date flex items-center pl-4" data-date-format="dd/mm/yyyy">
                                        <input class="appearance-none block w-full   border-b border-gray-200 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white " value="<?= date('d/m/Y'); ?>" data-date-format="dd/mm/yyyy" id="ngaysinh_add" type="text">
                                        <span class="input-group-addon"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-full px-3 pb-2 flex gap-8 phone:gap-3 justify-between">
                                <div class="w-2/4 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="luongcoban_add">
                                        Lương cơ bản
                                    </label>
                                    <input onkeyup=" _ChangeFormat(this)" class="appearance-none block w-full  border-b border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="luongcoban_add" type="text" autocomplete="off">
                                </div>
                                <div class="w-1/2 pb-4 hidden">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="luongtheogio_add">
                                        Lương theo giờ
                                    </label>
                                    <input onkeyup=" _ChangeFormat(this)" class="appearance-none block w-full   border-b border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="luongtheogio_add" type="text">
                                </div>
                                <div class="w-1/4 phone:w-2/4">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="trangthai_add">
                                        Trạng thái
                                    </label>
                                    <div class="flex items-center">
                                        <span class="mr-3 text-md ">Khóa</span>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" value="" id="trangthai_add" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                        </label>
                                        <span class="ml-3 text-md whitespace-nowrap">Kích hoạt</span>
                                    </div>
                                </div>
                                <div class="w-1/4 flex justify-end">
                                    <div>
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="trangthai_add">
                                            Admin
                                        </label>
                                        <div class="flex items-center">
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" value="" id="admin_add" class="sr-only peer">
                                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <p id="" class="erorr_sdt_add text-[red] text-lg hidden">Số điện thoại đã có</p>
                    <button onclick="add_nhanvien()" type="button" class="inline-flex w-full justify-center items-center rounded-md bg-green-600 px-5 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:mt-0 max-w-[100px]">Lưu</button>
                    <button type="button" onclick="close_modal('form_add_nhanvien')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form chỉnh sửa nhân viên -->
<div class="relative z-10 hidden" id="form_edit_nhanvien" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center  text-center items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-2xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[green]" id="exampleModalLabel">
                            Cập nhật thông tin
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_edit_nhanvien')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div data-te-modal-body-ref class="overflow-y-scroll max-h-[700px] overflow-x-hidden">

                        <div class="relative flex-auto p-4 flex flex-wrap ">

                            <div class="w-full md:w-full px-3 pb-4  flex gap-5">
                                <div class="w-full pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="tennhanvien_edit">
                                        Tên nhân viên
                                    </label>
                                    <input class="appearance-none block w-full  border-b border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tennhanvien_edit" type="text"autocomplete="off">
                                </div>

                            </div>
                            <div class="w-full md:w-full px-3 pb-4  flex gap-5">
                                <div class="w-1/2 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="sodienthoai_edit">
                                        Số điện thoại
                                    </label>
                                    <input class="appearance-none block w-full  border-b border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="sodienthoai_edit" type="text"autocomplete="off">
                                </div>
                                <div class="w-full pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="matkhau_edit">
                                        Đổi mật khẩu
                                    </label>
                                    <input class="appearance-none block w-full  border-b border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="matkhau_edit" type="password">
                                </div>
                            </div>

                            <div class="w-full md:w-full px-3 pb-4 flex gap-5">
                                <div class="w-1/2 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="list_nhanvien_edit">
                                        Loại nhân viên
                                    </label>
                                    <div class="flex items-center gap-2 __icon">
                                        <select class="list_nhanvien appearance-none block w-full  border-b-[1px]   py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="list_nhanvien_edit" type="text">

                                        </select>
                                        <button id="" class="focus:outline-none icon_add" onclick="_show_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                        <button id="" class="focus:outline-none transition rotate-45 hidden icon_remove" onclick="_hidden_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                    </div>
                                    <div id="" class="flex w-full items-center mt-4 hidden __show">
                                        <div class="m px-3  ">
                                            <input class="appearance-none block w-full  border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tennhanvien_add" type="text" placeholder="Tên công việc">
                                        </div>
                                        <div class="flex justify-center">
                                            <button onclick="add_danhmuc('nhanvien','list_nhanvien_edit','tennhanvien_add','LNV')" class="bg-[red] rounded-md p-2  text-white text-md">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="list_chucvu_edit">
                                        Chức vụ
                                    </label>
                                    <div class="flex items-center gap-2 __icon">
                                        <select class="list_chucvu appearance-none block w-full border-b-[1px]   py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="list_chucvu_edit" type="text">

                                        </select>
                                        <button id="icon_add_chucvu_edit" class="focus:outline-none icon_add" onclick="_show_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                        <button id="icon_remove_chucvu_edit" class="focus:outline-none transition rotate-45  hidden icon_remove" onclick="_hidden_add(this)"><img class="focus:outline-none" src="vendor/img/add.png"></button>
                                    </div>
                                    <div id="show_chucvu_edit" class="flex w-full items-center mt-4 hidden __show">
                                        <div class="m px-3  ">
                                            <input class="appearance-none block w-full  border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tenchucvu_add" type="text" placeholder="Tên chức vụ">
                                        </div>
                                        <div class="flex justify-center">
                                            <button onclick="add_danhmuc('loai_hh','list_chucvu_edit', 'tenchucvu_add','LCV')" class="bg-[red] rounded-md p-2  text-white text-md">Lưu</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="w-full md:w-full px-3 pb-2 flex gap-8 ">
                                <div class="w-1/2 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="diachi_edit">
                                        Địa chỉ
                                    </label>
                                    <input class="appearance-none block w-full  border-b border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="diachi_edit" type="text"autocomplete="off">
                                </div>
                                <div class="w-1/2 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="email_edit">
                                        Email
                                    </label>
                                    <input class="appearance-none block w-full  border-b border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="email_edit" type="text"autocomplete="off">
                                </div>
                            </div>
                            <div class="w-full md:w-full px-3 pb-2 flex gap-8 phone:gap-3">
                                <div class="w-1/3 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="gioitinh_edit">
                                        Giới tính
                                    </label>
                                    <select class=" appearance-none block w-full  border-b-[1px]   py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="gioitinh_edit" type="text">
                                        <option value="NAM">Nam</option>
                                        <option value="NỮ">Nữ</option>
                                    </select>
                                </div>
                                <div class="w-1/3 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="cccd_edit">
                                        CCCD
                                    </label>
                                    <input onkeyup="this.value = this.value.replace(/[^0-9\.\,]/g,'')" class="appearance-none block w-full border-b border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="cccd_edit" type="text"autocomplete="off">
                                </div>
                                <div class="w-1/3 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="ngaysinh_edit">
                                        Ngày sinh
                                    </label>
                                    <div id="ngay_edit" class="input-group date flex items-center pl-4" data-date-format="dd/mm/yyyy">
                                        <input class="appearance-none block w-full border-b border-gray-200 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white " value="<?= date('d/m/Y'); ?>" data-date-format="dd/mm/yyyy" id="ngaysinh_edit" type="text">
                                        <span class="input-group-addon"></span>
                                    </div>

                                </div>
                            </div>
                            <div class="w-full md:w-full px-3 pb-2 flex gap-8 phone:gap-3">
                                <div class="w-2/4 pb-4 ">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="luongcoban_edit">
                                        Lương cơ bản
                                    </label>
                                    <input onkeyup=" _ChangeFormat(this)" class="appearance-none block w-full  border-b border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="luongcoban_edit" type="text"autocomplete="off">
                                </div>
                                <div class="w-1/2 pb-4 hidden">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="luongtheogio_edit">
                                        Lương theo giờ
                                    </label>
                                    <input onkeyup=" _ChangeFormat(this)" class="appearance-none block w-full   border-b border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="luongtheogio_edit" type="text">
                                </div>
                                <div class="w-1/4 phone:w-2/4">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="trangthai_edit">
                                        Trạng thái
                                    </label>
                                    <div class="flex items-center">
                                        <span class="mr-3 text-md ">Khóa</span>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" value="" id="trangthai_edit" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                        </label>
                                        <span class="ml-3 text-md whitespace-nowrap">Kích hoạt</span>
                                    </div>
                                </div>
                                <div class="w-1/4 flex justify-end">
                                    <div>
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="trangthai_add">
                                            Admin
                                        </label>
                                        <div class="flex items-center">
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" value="" id="admin_edit" class="sr-only peer" checked>
                                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>


                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input id='msdn_edit' hidden>
                    <button onclick="edit_nhanvien()" type="button" class="inline-flex w-full justify-center items-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:mt-0 max-w-[100px]">Lưu</button>
                    <button type="button" onclick="close_modal('form_edit_nhanvien')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form xóa nhân viên -->
<div class="relative z-10 hidden" id="form_delete_nhanvien" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
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
                        <button type="button" onclick="close_modal('form_delete_nhanvien')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="relative flex-auto p-4 text-center " id="hoten_delele" data-te-modal-body-ref>

                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id='msdn_delete'>
                    <button type="button" onclick="delete_nhanvien(this)" class="inline-flex w-full justify-center items-center rounded-md bg-red-600 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:mt-0 max-w-[100px] ">Xóa</button>
                    <button type="button" onclick="close_modal('form_delete_nhanvien')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form cấp quyền -->
<div class="relative z-10 hidden" id="form_capquyen_nhanvien" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-6xl">
                <div class="bg-white   ">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal  dark:text-neutral-200 text-[red]" id="exampleModalLabel">
                            Tên nhân viên: <span id='tennv_phanquyen'></span>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_capquyen_nhanvien')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="relative flex-auto p-4" id="hoten_delele" data-te-modal-body-ref>
                        <div class="grid grid-cols-12 gap-5 phone:overflow-x-scroll">
                            <div class="col-span-6 phone:col-span-12">
                                <div class="flex justify-between items-center phone:gap-3">
                                    <h3 class="font_semi text-[green] phone:whitespace-nowrap">Danh sách chức năng</h3>
                                    <input type="search" onkeyup="phanquyen_search()" id="phanquyen_search" class="w-[300px] tablet:w-[180px] mt-1 text-left appearance-none block border-b border-[#ddd] pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] " placeholder="Tìm tên chức năng" aria-label="Search" aria-describedby="button-addon2">
                                </div>
                                <div class="pt-3 max-h-[500px] phone:max-h-[300px] overflow-y-scroll">
                                    <table class="min-w-full">
                                        <thead>
                                            <tr class="font_semi">
                                                <th class="text-center px-4 py-2">#</th>
                                                <th class="text-left px-4 py-2 ">Tên Menu</th>
                                                <th class="text-left px-4 py-2 ">Tên chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody id='list_chucnang' class="">

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="col-span-6 phone:col-span-12">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-[#9407c3] font_semi text-right phone:whitespace-nowrap">Đã cấp</h3>
                                    <input type="search" onkeyup="chucnang_dacap_search()" id="chucnang_search" class="w-[300px] tablet:w-[220px] mt-1 text-left appearance-none block border-b border-[#ddd] pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] " placeholder="Tìm tên chức năng đã cấp" aria-label="Search" aria-describedby="button-addon2">
                                </div>

                                <div class="pt-3 max-h-[500px] phone:max-h-[300px] overflow-y-scroll">
                                    <table class="min-w-full ">
                                        <thead>
                                            <tr class="font_semi ">
                                                <th class="text-center px-4 py-2">#</th>
                                                <th class="text-left px-4 py-2">Tên Menu</th>
                                                <th class="text-left px-4 py-2">Tên chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody id='list_chucnang_dacap' class="">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id='msdn_phanquyen'>

                    <button type="button" onclick="close_modal('form_capquyen_nhanvien')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="vendor/js/nhanvien.js?v=<?= md5_file('vendor/js/nhanvien.js') ?>"></script>

<script>
    $(document).ready(function() {
        load_nhanvien()
        load_danhmuc('loai_nv')
        load_danhmuc('chucvu')
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var dateToday = new Date();
        $("#ngay input,#ngay_edit input").datepicker({
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