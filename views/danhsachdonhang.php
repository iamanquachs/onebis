<main class="bg_main ">
    <div class="grid grid-cols-5 phone:grid-cols-6 phone:gap-5 justify-center tablet:gap-5 phone:overflow-x-scroll" id='list_trangthai_donhang'>
        <div class="col-span-1 phone:col-span-2">
            <div class="text-center flex items-center gap-5 tablet:gap-2 justify-center">
                <p class="text-lg text-[#ffffff99] whitespace-nowrap tablet:whitespace-normal phone:whitespace-normal">Chưa tiếp nhận</p>
                <div class="min-h-[40px] min-w-[40px] max-h-[40px] max-w-[40px] bg-[#bf9100] rounded-full flex items-center justify-center">
                    <p class="py-2 text-center text-[20px] text-white" id="sl_chuatiepnhan">0</p>
                </div>
            </div>
        </div>
        <div class="col-span-1 phone:col-span-2">
            <div class="text-center flex items-center gap-5 tablet:gap-2 justify-center">
                <p class="text-lg text-[#ffffff99] whitespace-nowrap tablet:whitespace-normal  phone:whitespace-normal">Chờ thực hiện</p>
                <div class="min-h-[40px] min-w-[40px] max-h-[40px] max-w-[40px] bg-[#c85a0d] rounded-full flex items-center justify-center">
                    <p class="py-2 text-center text-[20px] text-white" id="sl_chothuchien">0</p>
                </div>
            </div>
        </div>
        <div class="col-span-1 phone:col-span-2">
            <div class="text-center flex items-center gap-5 tablet:gap-2 justify-center">
                <p class="text-lg text-[#ffffff99] whitespace-nowrap tablet:whitespace-normal  phone:whitespace-normal">Đang thực hiện</p>
                <div class="min-h-[40px] min-w-[40px] max-h-[40px] max-w-[40px] bg-[#4a206a] rounded-full flex items-center justify-center">
                    <p class="py-2 text-center text-[20px] text-white" id="sl_dangthuchien">0</p>
                </div>
            </div>
        </div>
        <div class="col-span-1 phone:col-span-3">
            <div class="text-center flex items-center gap-5 tablet:gap-2 justify-center">
                <p class="text-lg text-[#ffffff99] whitespace-nowrap tablet:whitespace-normal  phone:whitespace-normal">Đã thực hiện</p>
                <div class="min-h-[40px] min-w-[40px] max-h-[40px] max-w-[40px] bg-[#538234] rounded-full flex items-center justify-center">
                    <p class="py-2 text-center text-[20px] text-white" id="sl_dathuchien">0</p>
                </div>
            </div>
        </div>
        <div class="col-span-1 phone:col-span-3">
            <div class="text-center flex items-center gap-5 tablet:gap-2 justify-center">
                <p class="text-lg text-[#ffffff99] whitespace-nowrap tablet:whitespace-normal  phone:whitespace-normal">NV chờ</p>
                <div class="min-h-[40px] min-w-[40px] max-h-[40px] max-w-[40px] bg-[#2f5596] rounded-full flex items-center justify-center">
                    <p class="py-2 text-center text-[20px] text-white" id="soluong_nv_cho">0</p>
                </div>
            </div>
        </div>
    </div>
    <div class="input-group relative flex  items-center w-full justify-center py-5 phone:pt-2">
        <input type="text" onkeyup="banhang_search(this)" id="value_search" class="w-[300px] text-left appearance-none block    border-b border-[#f568e3]  px-4 pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-white" placeholder="Tìm kiếm tên, SĐT" autocomplete="off">
    </div>
    <div class="flex flex-col">
        <!--Grid Form-->
        <div class="flex flex-1  flex-col md:flex-row lg:flex-row ">
            <div class="mb-3 bg-[#ffffff36] rounded shadow-sm w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-2 items-center  border-b border-[#ffffff40]">
                        <div class="flex gap-5 w-full items-center  justify-between">
                            <p class="text-lg text-[#83ff00]">Hôm nay</p>
                            <div id="qr_code_hidden" class="hidden">
                            </div>
                            <div class="flex item gap-5">
                                <button class=" text-white flex items-center gap-3 bg-[#834e7d] rounded-full p-1 pr-3 focus:outline-none hover:bg-[#360332]" onclick=" add_banhang_header('0')"><img src="vendor/img/add.png" title="Thêm mới Đơn hàng"> <span>Thêm đơn hàng</span></button>
                                <button class=" focus:outline-none">
                                    <img onclick="load_list_henkhach_va_nhanvien()" id="img_load_nhanvien" class="img_load_nhanvien w-[24px] h-[24px] hover:cursor-pointer hover:opacity-1" src='vendor/img/wait32.png' title="Làm mới">
                                </button>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="py-3 overflow-x-scroll">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class=" px-4 py-2 text-center font-thin">#</th>
                                <th class=" px-4 py-2 font-thin text-center">...</th>
                                <th class=" px-4 py-2 whitespace-nowrap text-center font-thin">Thời gian</th>
                                <th class=" px-4 py-2 whitespace-nowrap font-thin">Khách hàng</th>
                                <th class=" px-4 py-2 whitespace-nowrap font-thin ">Điện thoại</th>
                                <th class=" px-4 py-2 whitespace-nowrap font-thin  text-start">Tiến độ</th>
                                <th class=" px-4 py-2 whitespace-nowrap font-thin text-start">Dịch vụ</th>
                                <th class=" px-4 py-2 whitespace-nowrap font-thin ">Chi tiết</th>
                                <th class=" px-4 py-2 whitespace-nowrap font-thin ">Thực hiện</th>
                                <th class=" px-4 py-2 whitespace-nowrap font-thin text-end">Tổng cộng</th>
                                <th class=" px-4 py-2 whitespace-nowrap font-thin text-end hidden">Thanh toán</th>
                                <th class=" px-4 py-2 whitespace-nowrap font-thin text-end">Còn nợ</th>
                                <th class=" px-4 py-2 whitespace-nowrap font-thin text-center">...</th>
                            </tr>
                        </thead>
                        <tbody id='list_banhang_header_henkhach' class="0">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-3 tablet:gap-0 phone:gap-0 laptop:gap-0">

            <div class="col-span-7 laptop:col-span-12 tablet:col-span-12 phone:col-span-12  flex flex-1  flex-col md:flex-row lg:flex-row ">
                <div class="mb-3 bg-[#ffffff36] rounded shadow-sm w-full">
                    <div class="">
                        <div class="flex justify-between px-3 py-2 items-center  border-b border-[#ffffff40]">
                            <div class="flex gap-5 w-[150px]  items-center">
                                <p class="text-lg text-[#f7f44d]">Khách đặt</p>

                            </div>
                            <div class="flex gap-5 items-center">
                                <button class=" text-white" onclick="open_modal('form_add_khachdat')"><img src="vendor/img/customer.png" title="Khách đặt dịch vụ"></button>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 overflow-x-scroll">
                        <table class="min-w-full">
                            <thead>
                                <tr class="text-[#efbff5] text-lg">
                                    <th class=" px-4 py-2 text-center font-thin">#</th>
                                    <th class=" px-4 py-2 text-center font-thin">Thời gian</th>
                                    <th class=" px-4 py-2 font-thin">Khách hàng</th>
                                    <th class=" px-4 py-2 font-thin ">Điện thoại</th>
                                    <th class=" px-4 py-2 font-thin text-end">Ghi chú</th>
                                    <th class=" px-4 py-2 font-thin text-center">...</th>
                                </tr>
                            </thead>
                            <tbody id='list_banhang_header_khachdat' class="0">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-span-5  laptop:col-span-12 tablet:col-span-12 phone:col-span-12 flex flex-1  flex-col md:flex-row lg:flex-row ">
                <div class="mb-3 bg-[#ffffff36] rounded shadow-sm w-full">
                    <div class="">
                        <div class="flex justify-between px-3 py-2 items-center  border-b border-[#ffffff40]">
                            <div class="flex gap-5  w-full items-center justify-between">
                                <p class="text-lg text-[#bfdcfb]">Nhân viên</p>
                                <div>
                                    <img onclick="load_list_henkhach_va_nhanvien()" id="img_load_nhanvien" class="img_load_nhanvien w-[24px] hover:cursor-pointer hover:opacity-1" src='vendor/img/wait32.png' title="Làm mới">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="py-3 overflow-x-scroll">
                        <table class="min-w-full">
                            <thead>
                                <tr class="text-[#efbff5] text-lg">
                                    <th class=" px-3 py-2 text-center font-thin">#</th>
                                    <th class=" px-3 py-2 text-left font-thin">Nhân viên</th>
                                    <th class=" px-3 py-2 text-center font-thin">Vào</th>
                                    <th class=" px-3 py-2 text-center font-thin">Thời gian</th>
                                    <th class=" px-3 py-2  text-left font-thin">Dịch vụ</th>
                                    <th class=" px-3 py-2 text-center font-thin">...</th>
                                </tr>
                            </thead>
                            <tbody id='list_nhanvien' class="0">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>

    </div>

</main>
<!-- Form delete bán hàng header -->
<div class="relative z-10 hidden" id="form_show_chitiet_banhang" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-7xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[red]'>Danh sách dịch vụ</p>
                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_show_chitiet_banhang')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="relative grid grid-cols-12 p-4" id="" data-te-modal-body-ref>
                        <div id="list_form_hanghoa" class="col-span-6 pr-2 border-r">
                            <div class="p-3">
                                <table class="min-w-full divide-y divide-gray-100 dark:divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th class=" px-4 py-2 font_semi text-center">#</th>
                                            <th class=" px-4 py-2  font_semi">Hàng hóa/Dịch vụ</th>
                                            <th class=" px-4 py-2 font_semi text-center">SL</th>
                                            <th class=" px-4 py-2 font_semi text-end">Số tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody id='list_hanghoa' class="divide-y divide-gray-100 dark:divide-gray-200">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="item_chitiet_hanghoa" class="col-span-6 pl-2 hidden">
                            <h4 class="text-lg  text-green-700">Mô tả <span id="tenhanghoa"></span></h4>
                            <div class="p-3">
                                <table id="" class="min-w-full divide-y divide-gray-100 dark:divide-gray-200">
                                    <thead>
                                        <tr class="font_semi">
                                            <th class=" px-4 py-2 text-center">Lần</th>
                                            <th class=" px-4 py-2">Liệu trình</th>
                                            <th class=" px-4 py-2 text-center">SL</th>
                                            <th class=" px-4 py-2 text-end">Đơn giá</th>
                                        </tr>
                                    </thead>
                                    <tbody id='chitiet_hanghoa' class="divide-y divide-gray-100 dark:divide-gray-200">

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="soct_delete">

                    <button type="button" onclick="close_modal('form_show_chitiet_banhang')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form delete bán hàng header -->
<div class="relative z-10 hidden" id="form_delete_banhangline" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
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
                        <button type="button" onclick="close_modal('form_delete_banhangline')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2   flex justify-center" id="" data-te-modal-body-ref>
                        <p id="ten_khachhang_delete" class="text-lg "></p>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="soct_delete">
                    <button type="button" onclick="delete_banhang('NO')" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_delete_banhangline')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

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
                        <div id='img_thongbao' class="hidden">
                            <img src="vendor/img/success.png">
                        </div>
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
<!-- Form cập nhật ngày thực hiện -->
<div class="relative z-10 hidden" id="form_update_ngaythuchien" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[purple]'>Bạn chắc chắn chuyển đang thực hiện? </p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_update_ngaythuchien')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>

                    </div>
                    <!--Modal body-->
                    <div class="p-4 text-center" data-te-modal-body-ref>
                        <p id="dathen_error" class="text-[red] mb-2 hidden">Chưa nhập đầy đủ thông tin</p>
                        <span class="text-xl" id="tenkh_update"></span>
                        <div id="form_ngaysinh_update" class="hidden">
                            <label class="w-full mt-3 grid grid-cols-12 gap-4  uppercase tracking-wide  text-xs items-center justify-start  whitespace-nowrap ">
                                <div class="col-span-3 flex items-center">
                                    Ngày sinh
                                </div>
                                <div class="col-span-9 input-group date flex items-center">
                                    <input data-date-format="dd-mm-yy" type="text" placeholder="dd/mm/yyyy" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask="" im-insert="false" class="phone:w-[120px] txt_date phone:w-full w-full appearance-none block    border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" id="ngaysinh_add" type="text" data-date-format="dd/mm/yyyy" maxlength="10" placeholder="Ngày sinh">
                                </div>
                            </label>
                        </div>
                        <div id="form_diachi_update" class="hidden">
                            <label class="w-full grid grid-cols-12 gap-4 mt-3 uppercase tracking-wide text-xs  whitespace-nowrap ">
                                <div class="col-span-3 flex items-center">Địa chỉ</div>
                                <div class="col-span-9 input-group date flex items-center">
                                    <input class="w-full appearance-none block    border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" id="diachi_add" type="text" placeholder="Địa chỉ" autocomplete="off">
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="soct_update">
                    <input hidden id="loai_update">
                    <input hidden id="sodienthoai_update">
                    <button type="button" onclick="update_banhangline_ngaythuchien()" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_update_ngaythuchien')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form thanh toán  -->
<div class="relative z-10 hidden" id="form_thutien" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[red]'>Thanh toán khách hàng <span id='tenkh_thanhtoan' class="tenkh_chuyenkhoan"></span></p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_thutien')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 " data-te-modal-body-ref>
                        <div class="grid grid-cols-12 gap-2">
                            <p class="col-span-3">Tổng cộng</p>
                            <input id="tongcong_thanhtoan" class="col-span-9 border-b  focus:outline-none px-3" readonly>
                        </div>
                        <div class="grid grid-cols-12 gap-2 pt-5">
                            <p class="col-span-3 ">Đã thu</p>
                            <input id="sotien_dathu" class="col-span-9 border-b focus:outline-none px-3 " readonly>
                            <input id="sotien_voucher" class="col-span-9 border-b focus:outline-none px-3 " hidden readonly>
                        </div>
                        <div class="grid grid-cols-12 gap-2 pt-5">
                            <p class="col-span-3 text-[red]">Thu thêm</p>
                            <input id="sotien_thanhtoan" onkeyup="_ChangeFormat(this), tinh_nolai_edit(this)" onfocusout="load_QR_chuyenkhoan()" class="sotien_chuyenkhoan col-span-9 border-b focus:outline-none px-3 font_semi text-[red]" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 gap-2 mt-5 ">
                            <p class="col-span-3  text-[green]">Nợ lại</p>
                            <input id="nolai" value='0' class="col-span-9 border-b focus:outline-none  px-3 font_semi text-[green]" readonly>
                        </div>
                        <div class="grid grid-cols-12 gap-2  pt-5">
                            <p class="col-span-3">Ngân quỹ</p>
                            <select id="nganquy_thutruoc" onchange="load_QR_chuyenkhoan()" class="nganquy_chuyenkhoan col-span-9 border-b">
                                <option value="TM">Tiền mặt</option>
                                <option value="NH">Ngân hàng</option>
                            </select>
                        </div>
                        <div class=" w-full h-auto mt-5 flex-col justify-center items-center">
                            <div id="qr-code" class="flex justify-center"></div>
                            <p class="text-center mt-3 text-[red]" id="title_qr_thanhtoan"></p>
                        </div>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id='soct_thuchi'>
                    <input hidden id="mskh_thanhtoan">

                    <button type="button" onclick="thutien_donhang()" class="mt-3 inline-flex w-full justify-center rounded-md bg-[purple] px-5 py-2 text-[14px]  text-white shadow-sm  hover:bg-purple-500 sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_thutien')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form thêm chỉ số sinh hoa -->
<div class="relative z-10 hidden" id="form_chisosinhhieu" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[red]'>Chỉ số sinh hiệu</p>
                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_chisosinhhieu')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2 leading-10 gap-2" id="" data-te-modal-body-ref>
                        <div class="grid grid-cols-12 gap-2 items-center">
                            <p class="col-span-3 text-right">Mạch</p>
                            <input id="mach_chisosinhhieu" class="col-span-9 border-b  focus:outline-none px-3" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center">
                            <p class="col-span-3 text-right">Nhiệt độ</p>
                            <input id="nhietdo_chisosinhhieu" class="col-span-9 border-b  focus:outline-none px-3" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center">
                            <p class="col-span-3 text-right">Huyết áp</p>
                            <input id="huyetap_chisosinhhieu" class="col-span-9 border-b  focus:outline-none px-3" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center">
                            <p class="col-span-3 text-right">Nhịp thở</p>
                            <input id="nhiptho_chisosinhhieu" class="col-span-9 border-b  focus:outline-none px-3" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center">
                            <p class="col-span-3 text-right">Chiều cao</p>
                            <input id="chieucao_chisosinhhieu" class="col-span-9 border-b  focus:outline-none px-3" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center">
                            <p class="col-span-3 text-right">Cân nặng</p>
                            <input id="cannang_chisosinhhieu" class="col-span-9 border-b  focus:outline-none px-3" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="soct_chisosinhhieu">
                    <button type="button" onclick="update_chisosinhhieu()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_chisosinhhieu')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form add người thực hiện -->
<div class="relative z-10 hidden" id="form_add_nguoithuchien" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-4xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-200 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[green] text-lg'>Nhật ký sử dụng</p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_nguoithuchien')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2 leading-10 gap-2 max-h-[450px] overflow-y-scroll" id="" data-te-modal-body-ref>
                        <div class="py-3 ">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="text-[#23a323]">
                                        <th class=" px-4 py-2 text-center font-thin">#</th>
                                        <th class=" px-4 py-2 text-left font-thin">Dịch vụ</th>
                                        <th class=" px-4 py-2 text-center font-thin">Số lượng</th>
                                        <th class=" px-4 py-2 font-thin text-left">Nhân viên</th>
                                        <th class=" px-4 py-2 font-thin text-left">Yêu cầu</th>
                                    </tr>
                                </thead>
                                <tbody id='list_dichvu_dadung' class="0">

                                </tbody>
                            </table>
                        </div>
                        <div class="py-3">
                            <h4 class="text-[red] ml-2 text-lg">Yêu cầu nhân viên thực hiện</h4>
                            <table class="min-w-full">
                                <thead>
                                    <tr class="text-[#7e0606]">
                                        <th class=" px-3 py-2 text-center font-thin">#</th>
                                        <th class=" px-3 py-2 text-left font-thin">Nhân viên</th>
                                        <th class=" px-3 py-2 text-center font-thin">Vào</th>
                                        <th class=" px-3 py-2 text-center font-thin">Thời gian</th>
                                        <th class=" px-3 py-2  text-left font-thin">Dịch vụ</th>
                                        <th class=" px-3 py-2 text-center font-thin">...</th>
                                    </tr>
                                </thead>
                                <tbody id='list_nhanvien_in_modal' class="!text-black">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="rowid_add_nguoithuchien">
                    <input hidden id="ten_add_nguoithuchien">
                    <button type="button" onclick="add_nguoithuchien()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_add_nguoithuchien')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form đánh giá khách hàng -->
<div class="relative z-10 hidden" id="form_khachhang_danhgia" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-start sm:p-0 bg-white ">

            <div id="kichthuoc_form" class=" sm:w-full max-w-full min-h-[500px]">
                <div class="bg-white min-h-[500px]">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 py-2 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl text-center leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[black] text-lg text-center '>Đánh giá trải nghiêm</p>

                        </h5>
                        <!--Close button-->
                        <div class="flex justify-end w-auto">
                            <button type="button" onclick="close_modal('form_khachhang_danhgia')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                                <img src="vendor/img/cancel.png">
                            </button>
                        </div>
                    </div>
                    <!--Modal body-->
                    <div class="py-7">
                        <p class='text-[red] text-xl text-center py-3'>CHÚNG TỐI RẤT TRÂN TRỌNG VÀ NGHIÊM TÚC GHI NHẬN Ý KIẾN ĐÓNG GÓP CỦA QUÝ KHÁCH</p>
                    </div>
                    <div class="p-2 flex justify-center gap-20" id="" data-te-modal-body-ref>
                        <div class="danhgia_cl hover:cursor-pointer" onclick="chon_danhgia(this,'1RKHL')">
                            <img class="pl-[10px]" src='vendor/img/ratkhonghailong.png'>
                            <p class="text-center text-xl pt-8">Rất không hài lòng</p>
                        </div>
                        <div class="danhgia_cl hover:cursor-pointer" onclick="chon_danhgia(this,'2KHL')">
                            <img src='vendor/img/khonghailong.png'>
                            <p class="text-center text-xl pt-8">Không hài lòng</p>
                        </div>
                        <div class="danhgia_cl hover:cursor-pointer" onclick="chon_danhgia(this,'3HL')">
                            <img src='vendor/img/hailong.png'>
                            <p class="text-center text-xl pt-8">Hài lòng</p>
                        </div>
                        <div class="danhgia_cl hover:cursor-pointer" onclick="chon_danhgia(this,'4RHL')">
                            <img src='vendor/img/rathailong.png'>
                            <p class="text-center text-xl pt-8">Rất hài lòng</p>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 flex justify-center gap-3">
                    <input hidden id="soct_danhgia">
                    <input hidden id="sdt_danhgia">
                    <input hidden id="nhanvien_danhgia">
                    <input hidden id="dichvu_danhgia">
                    <input hidden id="trangthai_danhgia">
                    <p id="btn_sent_danhgia" onclick="post_danhgia()" class='bg-[#d152e2] px-7 py-2 text-white text-2xl font-medium hover:cursor-pointer hover:bg-[#bb48ca] rounded-full hidden'>
                        Đánh giá
                    </p>

                </div>
            </div>

        </div>

    </div>
</div>
<div class="relative z-10 hidden" id="form_add_khachdat" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-3xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[green]'>Khách đặt Dịch vụ</p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_khachdat')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2 px-5 leading-10 " id="" data-te-modal-body-ref>
                        <div class="grid grid-cols-12 gap-2 items-center text-[red]">
                            <p class="col-span-3">Điện thoại</p>
                            <input id="dienthoai_add_khachdat" onkeyup="find_khachhang_khachdat(),this.value = this.value.replace(/[^0-9\\,]/g,'')" class="col-span-9 border-b  focus:outline-none px-3" autocomplete="off" maxlength="10">
                        </div>
                        <div class="grid grid-cols-12  items-center justify-center  max-h-[300px] overflow-scroll">
                            <table id="form_khachhang_khachdat" class="col-span-12 bg-[#f7e2f7] divide-y divide-gray-100 dark:divide-gray-200 py-3 hidden">
                                <thead>
                                    <tr>
                                        <td class=" px-4 py-2">Điện thoại</td>
                                        <td class=" px-4 py-2 text-left">Khách hàng</td>
                                        <td class=" px-4 py-2 text-center">Người thân</td>
                                        <td class=" px-4 py-2 text-end">Giới tính</td>
                                        <td class=" px-4 py-2 text-end">Thành viên</td>
                                        <td class=" px-4 py-2 text-end">% giảm</td>
                                    </tr>
                                </thead>
                                <tbody id='list_khachhang_khachdat' class="divide-y divide-gray-100 dark:divide-gray-200">
                                </tbody>
                            </table>
                        </div>

                        <div class="grid grid-cols-12 gap-2 items-center  text-[red] py-2">
                            <p class="col-span-3">Họ tên</p>
                            <input id="tenkh_add_khachdat" class="col-span-9 border-b  focus:outline-none px-3" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center py-2">
                            <p class="col-span-3">Giới tính</p>
                            <input id="nam_khachdat" value="NAM" type="radio" name="gioitinh_khachdat">
                            <label for="nam">Nam</label>
                            <input id="nu_khachdat" type="radio" value="NỮ" name="gioitinh_khachdat" checked>
                            <label for="nu">Nữ</label>
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center py-2">
                            <p class="col-span-3">Ngày sinh</p>
                            <input id="ngaysinh_add_khachdat" class="txt_date col-span-9 border-b  focus:outline-none px-3 text-black">
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center py-2">
                            <p class="col-span-3">Địa chỉ</p>
                            <input id="diachi_add_khachdat" class="col-span-9 border-b  focus:outline-none px-3" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center py-2">
                            <p class="col-span-3">Ghi chú</p>
                            <input id="ghichu_add_khachdat" class="col-span-9 border-b  focus:outline-none px-3" autocomplete="off">
                        </div>
                        <div id="ngaygio" class="grid grid-cols-12 gap-2 items-center py-2">
                            <p class="col-span-3  text-[red]">Ngày giờ</p>
                            <input id="ngay_khachdat" data-date-format="dd/mm/yyyy" class="form-control text-center mt-[2px] border-b bg-transparent min-w-[100px]" type="text" value="<?= date('d/m/Y'); ?>"> <span class="input-group-addon"></span>
                            <input id="giohen_khachdat" class=" form-control text-center border-b min-w-[100px]" type="time" value="<?= date('H:i') ?>">

                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end items-center gap-3">
                    <input hidden id="mskh_add_khachdat">
                    <input hidden id="msnguoithan_add_khachdat">
                    <input hidden id="msnguoithan_new_khachdat">
                    <input hidden id="nhom_add_khachdat">
                    <input hidden id="ptgiam_load_khachdat" value="0">
                    <p id="error_add_benhnhan_khachdat" class="hidden text-[red]">Vui lòng nhập đầy đủ thông tin</p>
                    <button type="button" onclick="add_khachdat()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_add_khachdat')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form add tư vấn điều trị -->
<div class="relative z-10 hidden" id="form_add_noidung" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-4xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[red]'>Ghi chú thực hiện</p>
                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_noidung')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2  max-h-[450px] overflow-y-scroll" id="" data-te-modal-body-ref>
                        <div>
                            <h3 class="text-left text-xl text-[#008b2e]">• Ghi chú</h3>
                            <div class="grid grid-cols-12 py-3">
                                <div class="col-span-10">
                                    <input class="w-full appearance-none block    border-b border-[#ddd]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" id="noidung_tuvan" type="text" placeholder="Nội dung tư vấn">
                                </div>
                                <div class="col-span-2 flex justify-center">
                                    <div>
                                        <img onclick="add_noidung('TV')" class="w-[20px]" src="vendor/img/checked.png">
                                    </div>
                                </div>
                            </div>
                            <div class=" max-h-[300px] overflow-y-scroll">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="text-[black] text-lg">
                                            <th class=" px-4 py-2 text-center font_semi">#</th>
                                            <th class=" px-4 py-2 text-left font_semi">Nội dung</th>
                                            <th class=" px-4 py-2 text-left font_semi whitespace-nowrap">Người tư vấn</th>
                                            <th class=" px-4 py-2 text-center font-thin">...</th>
                                        </tr>
                                    </thead>
                                    <tbody id='chitiet_tuvan' class="0 ">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h3 class="text-left text-xl text-[#008b2e]">• Điều trị</h3>
                            <div class="grid grid-cols-12 py-3">
                                <div class="col-span-10">
                                    <input class="w-full appearance-none block    border-b border-[#ddd]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" id="noidung_dieutri" type="text" placeholder="Nội dung điều trị">
                                </div>
                                <div class="col-span-2 flex justify-center ">
                                    <div>
                                        <img onclick="add_noidung('DT')" class="w-[20px]" src="vendor/img/checked.png">
                                    </div>
                                </div>
                            </div>
                            <div class="max-h-[300px] overflow-y-scroll">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="text-[black] text-lg">
                                            <th class=" px-4 py-2 text-center font_semi">#</th>
                                            <th class=" px-4 py-2 text-left font_semi">Nội dung</th>
                                            <th class=" px-4 py-2 text-left font_semi  whitespace-nowrap">Người thao tác</th>
                                            <th class=" px-4 py-2 text-center font-thin">...</th>
                                        </tr>
                                    </thead>
                                    <tbody id='chitiet_dieutri' class="0 ">

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="rowid_tuvan">
                    <input hidden id="soct_tuvan">
                    <input hidden id="sodienthoai_tuvan">
                    <input hidden id="mshh_tuvan">
                    <button type="button" onclick="close_modal('form_add_noidung')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form delete nội dung -->
<div class="relative z-10 hidden" id="form_delete_noidung" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[red]' id="title_xoa_noidung"></p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_delete_noidung')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2   flex justify-center" id="" data-te-modal-body-ref>
                        <p id="noidung_delete" class="text-lg "></p>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="rowid_noidung_delete">
                    <input hidden id="loai_noidung_delete">
                    <input hidden id="mshh_noidung_delete">

                    <button type="button" onclick="delete_noidung()" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_delete_noidung')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
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
<script>
    $(document).ready(function() {
        load_banhang_header_henkhach('')
        load_banhang_header_khachdat('')
        load_trangthai_donhang()
        load_nhanvien_in_banhang()
    })
</script>
<script type="text/javascript" src="vendor/js/banhang.js?v=<?= md5_file('vendor/js/banhang.js') ?>"></script>