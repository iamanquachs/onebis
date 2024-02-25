<main class="bg_main ">

    <div class="flex flex-col">
        <!--Grid Form-->
        <div class="flex flex-1  flex-col md:flex-row lg:flex-row ">
            <div class="mb-2 bg-[#ffffff36] rounded shadow-sm w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-2 items-center  border-b border-[#ffffff40]">
                        <div class="flex gap-5   items-center ">
                            <p class="text-lg text-[#83ff00]">Hồ sơ đơn vị</p>
                        </div>
                        <input type="text" onkeyup="donvi_search()" id="search" class="w-[300px] text-left appearance-none block border-b border-[#f568e3]  px-4 pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[14px] text-white" placeholder="Tìm kiếm" autocomplete="off">
                        <input type="text" onkeyup="load_donvi()" id="songayhethan" class="w-[200px] text-left appearance-none block border-b border-[#f568e3]  px-4 pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[14px] text-white" placeholder="Số ngày hết hạn" autocomplete="off">
                        <div class="flex gap-5 items-center">
                            <button type="button" onclick="open_modal('form_add_donvi')" class="bg-[green] border-none px-5 py-2 text-white rounded-md">Thêm đơn vị</button>
                        </div>

                    </div>

                </div>
                <div class="py-3 ">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class=" px-4 py-2 text-center font-thin">#</th>
                                <th class=" px-4 py-2 text-left font-thin">MSHS</th>
                                <th class=" px-4 py-2 font-thin text-left">MSDV</th>
                                <th class=" px-4 py-2 font-thin text-left">Đơn vị</th>

                                <th class=" px-4 py-2 font-thin text-left">Đại diện</th>
                                <th class=" px-4 py-2 font-thin text-start">Địa chỉ</th>
                                <th class=" px-4 py-2 font-thin text-center">Ngày KH</th>
                                <th class=" px-4 py-2 font-thin text-center">Ngày HH</th>
                                <th class=" px-4 py-2 font-thin text-right">Ngày</th>
                                <th class=" px-4 py-2 font-thin text-right">Giá</th>
                                <th class=" px-4 py-2 font-thin  text-center">Loại hình</th>
                                <th class=" px-4 py-2 font-thin text-center">...</th>
                            </tr>
                        </thead>
                        <tbody id='list_donvi' class="0 ">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</main>



<!-- Form add donvi -->
<div class="relative z-10 hidden" id="form_add_donvi" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-2xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="title_form_add">
                            Thêm mới đơn vị
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="open_add_hoso_donvi()" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4  " data-te-modal-body-ref>
                        <input hidden id="mshs_add_donvi" value="">
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3 gap-5">
                            <div class=" col-span-6  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="tendv_add">
                                    Tên đơn vị
                                </label>
                                <input class="appearance-none block w-full border-b border-gray-300 py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tendv_add" type="text">
                            </div>
                            <div class=" col-span-6  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="dienthoai_add">
                                    Điện thoại
                                </label>
                                <input onkeyup="this.value = this.value.replace(/[^0-9\\,]/g,'')" class="appearance-none block w-full border-b border-gray-300  py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="dienthoai_add" type="text">
                            </div>
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3 gap-5">
                            <div class=" col-span-6  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="loaihinh_add">
                                    Loại hình
                                </label>
                                <select id="loaihinh_add" class='appearance-none block w-full border-b border-gray-300 py-2 px-4 leading-tight focus:outline-none focus:bg-white '>
                                    <option value='LD'>LÀM ĐẸP</option>
                                    <option value='TM'>THẨM MỸ</option>
                                    <option value="NK">NHA KHOA</option>
                                </select>
                            </div>
                            <div class=" col-span-6  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="nguoidaidien_add">
                                    Người đại diện
                                </label>
                                <input class="appearance-none block w-full border-b border-gray-300  py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="nguoidaidien_add" type="text">
                            </div>
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3 gap-5">
                            <div class=" col-span-6  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="sohopdong_add">
                                    Số hợp đồng
                                </label>
                                <input class="appearance-none block w-full border-b border-gray-300 py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="sohopdong_add" type="text">
                            </div>
                            <div class=" col-span-6  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="giahopdong_add">
                                    Giá hợp đồng
                                </label>
                                <input onkeyup="_ChangeFormat(this)" class="appearance-none block w-full border-b border-gray-300 py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="giahopdong_add" type="text">
                            </div>
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3 gap-5">
                            <div class=" col-span-3  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="sonam_add">
                                    Số năm
                                </label>
                                <input onkeyup="this.value = this.value.replace(/[^0-9\\,]/g,'')" class="appearance-none block w-full border-b border-gray-300 py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="sonam_add" type="text">
                            </div>
                            <div class=" col-span-3  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="sothangkm_add">
                                    Số tháng KM
                                </label>
                                <input onkeyup="this.value = this.value.replace(/[^0-9\\,]/g,'')" class="appearance-none block w-full border-b border-gray-300  py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="sothangkm_add" type="text">
                            </div>
                            <div class=" col-span-6  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="sdt_ctv_add">
                                    Điện thoại CTV
                                </label>
                                <input onkeyup="this.value = this.value.replace(/[^0-9\\,]/g,'')" class="appearance-none block w-full border-b border-gray-300 py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="sdt_ctv_add" type="text">
                            </div>
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3 gap-5">
                            <div class=" col-span-6  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="dvtaitro_add">
                                    Đơn vị tài trợ
                                </label>
                                <input class="appearance-none block w-full border-b border-gray-300 py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="dvtaitro_add" type="text">
                            </div>
                            <div class=" col-span-6  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="ghichu_add">
                                    Ghi chú
                                </label>
                                <input class="appearance-none block w-full border-b border-gray-300  py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="ghichu_add" type="text">
                            </div>
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3 gap-5">
                            <div class=" col-span-12  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="diachi_add">
                                    Địa chỉ
                                </label>
                                <input class="appearance-none block w-full border-b border-gray-300  py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="diachi_add" type="text">
                            </div>
                            <div class=" col-span-4  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="list_tinh">
                                    Tỉnh
                                </label>
                                <select id="list_tinh" onchange="load_huyen('add','')" class='list_tinh appearance-none block w-full border-b border-gray-300 py-2 px-4 leading-tight focus:outline-none focus:bg-white '>

                                </select>
                            </div>
                            <div class=" col-span-4  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="list_huyen">
                                    Huyện
                                </label>
                                <select id="list_huyen" onchange="load_xa('add','')" class='list_huyen appearance-none block w-full border-b border-gray-300 py-2 px-4 leading-tight focus:outline-none focus:bg-white '>

                                </select>
                            </div>
                            <div class=" col-span-4  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="list_xa">
                                    Xã
                                </label>
                                <select id="list_xa" class='list_xa appearance-none block w-full border-b border-gray-300 py-2 px-4 leading-tight focus:outline-none focus:bg-white '>

                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <button type="button" onclick="add_donvi()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_add_donvi')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form edit donvi -->
<div class="relative z-10 hidden" id="form_edit_donvi" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-6xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[green]" id="exampleModalLabel">
                            Chỉnh đơn vị <span class="uppercase" id="tendv_edit_title"></span>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_edit_donvi')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4  " data-te-modal-body-ref>

                        <div class="grid grid-cols-12 w-full justify-between items-center py-3 gap-5">
                            <div class=" col-span-12  pb-4 ">
                                <label class="block uppercase tracking-wide text-[purple] text-xs font-medium " for="tendv_edit">
                                    Tên đơn vị
                                </label>
                                <input class="appearance-none block w-full border-b border-gray-300 py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="tendv_edit" type="text">
                            </div>

                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3 gap-5">
                            <div class=" col-span-4  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="loaihinh_edit">
                                    Loại hình
                                </label>
                                <select id="loaihinh_edit" class='appearance-none block w-full border-b border-gray-300 py-2 px-4 leading-tight focus:outline-none focus:bg-white '>
                                    <option value='LD'>LÀM ĐẸP</option>
                                    <option value='TM'>THẨM MỸ</option>
                                    <option value="NK">NHA KHOA</option>
                                </select>
                            </div>
                            <div class=" col-span-4  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="nguoidaidien_edit">
                                    Người đại diện
                                </label>
                                <input class="appearance-none block w-full border-b border-gray-300  py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="nguoidaidien_edit" type="text">
                            </div>
                            <div class=" col-span-4  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="dienthoaihotro_edit">
                                    Điện thoại hỗ trợ
                                </label>
                                <input onkeyup="this.value = this.value.replace(/[^0-9\\,]/g,'')" class="appearance-none block w-full border-b border-gray-300  py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="dienthoaihotro_edit" type="text">
                            </div>
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3 gap-5">

                            <div class=" col-span-12  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="diachi_edit">
                                    Địa chỉ
                                </label>
                                <input class="appearance-none block w-full border-b border-gray-300  py-2 px-4 leading-tight focus:outline-none focus:bg-white " id="diachi_edit" type="text">
                            </div>
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3 gap-5">

                            <div class=" col-span-4  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="list_tinh">
                                    Tỉnh
                                </label>
                                <select id="list_tinh_edit" onchange="load_huyen('edit','')" class='list_tinh appearance-none block w-full border-b border-gray-300 py-2 px-4 leading-tight focus:outline-none focus:bg-white '>

                                </select>
                            </div>
                            <div class=" col-span-4  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="list_huyen">
                                    Huyện
                                </label>
                                <select id="list_huyen_edit" onchange="load_xa('edit','')" class='list_huyen appearance-none block w-full border-b border-gray-300 py-2 px-4 leading-tight focus:outline-none focus:bg-white '>

                                </select>
                            </div>
                            <div class=" col-span-4  pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium " for="list_xa">
                                    Xã
                                </label>
                                <select id="list_xa_edit" class='list_xa appearance-none block w-full border-b border-gray-300 py-2 px-4 leading-tight focus:outline-none focus:bg-white '>

                                </select>
                            </div>
                            <div class="col-span-12 hidden">
                                <table class="min-w-full bg-[#ffdcfc] mt-2  rounded-md">
                                    <thead>
                                        <tr class="text-black border-b border-dashed border-[#ddd]">
                                            <th class="font-thin text-center px-4 py-2">#</th>
                                            <th class="font-thin text-left px-4 py-2">Người GH</th>
                                            <th class="font-thin text-center px-4 py-2 ">SĐT CTV</th>
                                            <th class="font-thin text-center px-4 py-2 ">ĐV tài trợ</th>
                                            <th class="font-thin text-center px-4 py-2 ">Số HĐ</th>
                                            <th class="font-thin text-center px-4 py-2 ">Ngày KH</th>
                                            <th class="font-thin text-center px-4 py-2 ">Số năm</th>
                                            <th class="font-thin text-center px-4 py-2 ">Số tháng KM</th>
                                            <th class="font-thin text-center px-4 py-2 ">Số ngày GH</th>
                                            <th class="font-thin text-center px-4 py-2 ">Ngày HH</th>
                                            <th class="font-thin text-right px-4 py-2 ">Giá HĐ</th>
                                            <th class="font-thin text-center px-4 py-2 ">...</th>
                                        </tr>
                                    </thead>
                                    <tbody id='list_nhatky_giahan' class="">

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="mshs_edit">
                    <input hidden id="dienthoai_add">
                    <input hidden id="msdv_edit">
                    <button type="button" onclick="edit_donvi()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_edit_donvi')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form chỉnh trạng thái -->
<div class="relative z-10 hidden" id="form_edit_trangthai" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[red]'>Khóa/Xóa <span class="uppercase" id="tendv_edit_trangthai"></span></p>

                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_edit_trangthai')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div id="list_trangthai" class="p-4 flex justify-center gap-5" data-te-modal-body-ref>

                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">

                    <button type="button" onclick="close_modal('form_edit_trangthai')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form chỉnh tham số  -->
<div class="relative z-10 hidden" id="form_edit_thamso" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-4xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[green]" id="exampleModalLabel">
                            <p id="title_thongbao">Chỉnh tham số hệ thống <span class="uppercase" id="tendv_edit_thamso"></span></p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_edit_thamso')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 " data-te-modal-body-ref>
                        <div>
                            <table class="min-w-full ">
                                <thead>
                                    <tr class="text-[#000] font_semi">
                                        <th class="text-center px-4 py-2">#</th>
                                        <th class="text-left px-4 py-2">Tham số</th>
                                        <th class="text-center px-4 py-2 ">Giá trị</th>
                                        <th class="text-center px-4 py-2 ">...</th>
                                    </tr>
                                </thead>
                                <tbody id='list_thamso' class="">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">

                    <button type="button" onclick="close_modal('form_edit_thamso')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form login with donvi  -->
<div class="relative z-10 hidden" id="form_login" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[green]" id="exampleModalLabel">
                            <p id="title_thongbao">Đăng nhập</span></p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_login')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 " data-te-modal-body-ref>
                        <p id="tendonvi_login"></p>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input id='mshs_login' hidden>
                    <input id='msdv_login' hidden>
                    <button onclick="login_donvi()" type="button" class="mt-3 inline-flex w-full justify-center items-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 max-w-[100px] ">Login</button>
                    <button type="button" onclick="close_modal('form_login')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>



<!-- Form list bank chỉnh sửa  -->
<div class="relative z-10 hidden" id="form_edit_list_bank" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-hitems-end justify-center  text-center items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-2xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[green]" id="exampleModalLabel">
                            Chỉnh <span class="mr-4 lowercase" id="tenthamso_edit"></span>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_edit_list_bank')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div data-te-modal-body-ref class=" max-h-[700px] overflow-x-hidden">

                        <div class="relative flex-auto p-4 flex flex-wrap ">
                            <div id="form_list_bank" class="w-full md:w-full px-3 pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="find_bank">
                                    Ngân hàng
                                </label>
                                <input onkeyup="find_nganhang()" class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="find_bank" type="text">
                                <div id='list_nganhang' class="max-h-[300px] overflow-y-scroll hidden">

                                </div>
                            </div>
                            <div id="form_bin_bank" class="w-full md:w-full px-3 pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="giatrithamso_edit">
                                    Giá trị
                                </label>
                                <input class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="giatrithamso_edit" type="text" readonly>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input id='msthamso_edit' hidden>
                    <input id='mshs_edit' hidden>
                    <input id='msdv_edit' hidden>
                    <button onclick="edit_thamso_bank()" type="button" class="inline-flex w-full justify-center items-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_edit_list_bank')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form gia hạn  -->
<div class="relative z-10 hidden" id="form_giahan" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-hitems-end justify-center  text-center items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-2xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[green]" id="exampleModalLabel">
                            Gia hạn <span class="mr-4 uppercase" id="tendv_giahan"></span>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_giahan')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div data-te-modal-body-ref class=" max-h-[700px] overflow-x-hidden">
                        <div class="px-3">
                            <table class="min-w-full bg-[#ffdcfc] mt-2  rounded-md">
                                <thead>
                                    <tr class="text-black border-b border-dashed border-[#ddd]">
                                        <th class="font-thin text-center px-4 py-2">#</th>
                                        <th class="font-thin text-left px-4 py-2">Chương trình khuyến mãi</th>
                                        <th class="font-thin text-right px-4 py-2 ">Giá/năm</th>
                                        <th class="font-thin text-center px-4 py-2 ">Tặng (tháng)</th>
                                        <th class="font-thin text-center px-4 py-2 ">...</th>
                                    </tr>
                                </thead>
                                <tbody id='list_ctkm' class="">

                                </tbody>
                            </table>
                        </div>
                        <div class="relative flex-auto p-4 flex flex-wrap ">
                            <div id="" class="w-full md:w-full px-3 pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="dongia_add_giahan">
                                    Giá/năm
                                </label>
                                <input class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight text-lg  focus:outline-none focus:bg-white " id="dongia_add_giahan" type="text">
                            </div>
                            <div id="" class="w-full md:w-full px-3 pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="sonam_add_giahan">
                                    Số năm gia hạn
                                </label>
                                <input onkeyup="load_ctkm('1')" class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight text-lg  focus:outline-none focus:bg-white " id="sonam_add_giahan" type="text">
                            </div>
                            <div id="" class="w-full md:w-full px-3 pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="khuyenmai_add_giahan">
                                    Tặng (tháng)
                                </label>
                                <input class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 text-lg  leading-tight focus:outline-none focus:bg-white " id="khuyenmai_add_giahan" type="text" readonly>
                            </div>
                            <div id="" class="w-full md:w-full px-3 pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="thanhtien_add_giahan">
                                    Thành tiền
                                </label>
                                <input class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight text-[red] text-lg font_semi  focus:outline-none focus:bg-white " id="thanhtien_add_giahan" type="text" readonly>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input id='mshs_dv_giahan' hidden>
                    <input id='msdv_dv_giahan' hidden>
                    <button onclick="giahan_donvi()" type="button" class="inline-flex w-full justify-center items-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 max-w-[100px]">Lưu</button>
                    <button type="button" onclick="close_modal('form_giahan')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form xác nhận gia hạn  -->
<div class="relative z-10 hidden" id="form_xacnhan_giahan" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-hitems-end justify-center  text-center items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-2xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[green]" id="exampleModalLabel">
                            Đã nhận chuyển khoản <span id="tendv_xacnhan_chuyenkhoan"></span>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_xacnhan_giahan')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div data-te-modal-body-ref class=" max-h-[700px] overflow-x-hidden">
                        <input hidden id="mshs_xacnhan_giahan">
                        <input hidden id="msdv_xacnhan_giahan">
                        <div class="relative flex-auto p-4 flex flex-wrap gap-7">
                            <button onclick="xacnhan_giahan()" type="button" class="inline-flex w-full justify-center items-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 max-w-[100px]">Xác nhận</button>

                            <button type="button" onclick="close_modal('form_xacnhan_giahan')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>
                        </div>
                    </div>

                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(async function() {
        await load_tinh()
        load_donvi()

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
<script type="text/javascript" src="vendor/js/donvi.js?v=<?= md5_file('vendor/js/donvi.js') ?>"></script>