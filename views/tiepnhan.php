<main class="bg_main ">
    <div class="input-group relative flex  items-center gap-3 w-full justify-center py-5 phone:pt-2">
        <input type="text" onkeyup="load_benhnhan(this)" id="value_search" class="w-[300px]  text-left appearance-none block    border-b border-[#f568e3]  px-4 pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-white" placeholder="Tìm tên, SĐT" autocomplete="off">
        <div class="flex gap-5 items-center min-w-[90px]">
            <button class="btn_themmoi hidden text-white bg-[green] px-3 py-2 rounded-md whitespace-nowrap" onclick="open_themmoi_khachhang()">Thêm mới</button>
        </div>
    </div>
    <div class="flex flex-col">
        <!--Grid Form-->
        <div class="grid grid-cols-12 gap-3">
            <div class="col-span-12 flex flex-1  flex-col md:flex-row lg:flex-row ">
                <div class="mb-3 bg-[#ffffff36] rounded shadow-sm w-full">
                    <div class="">
                        <div class="flex justify-between px-3 py-2 items-center  border-b border-[#ffffff40]">
                            <div class="flex gap-5 w-[150px]  items-center ">
                                <p class="text-lg text-[#83ff00]">Hôm nay</p>
                            </div>
                            <div class="flex gap-5 items-center">

                                <button class="load_homnay_henkhach focus:outline-none text-white w-[24px] h-[24px]" onclick=" load_homnay_henkhach()"><img src="vendor/img/wait32.png" title="Tải lại"></button>
                            </div>
                        </div>

                    </div>
                    <div class="py-3 overflow-x-scroll">
                        <table class="min-w-full">
                            <thead>
                                <tr class="text-[#efbff5] text-lg">
                                    <th class=" px-4 py-2 font-thin text-center">...</th>
                                    <th class=" px-4 py-2 text-center font-thin">#</th>
                                    <th class="homnay px-4 py-2 text-center font-thin hidden">...</th>
                                    <th class=" px-4 py-2 whitespace-nowrap text-center font-thin hidden">MSBN</th>
                                    <th class=" px-4 py-2 whitespace-nowrap text-left font-thin">Khách hàng</th>
                                    <th class=" px-4 py-2 whitespace-nowrap text-left font-thin">Người thân</th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin text-center">G.Tính</th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin text-center">Ngày sinh </th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin text-center">Điện thoại</th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin text-left">Địa chỉ</th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin text-center">Bác sĩ</th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin text-right">Tổng cộng</th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin text-right">Còn nợ</th>
                                    <th class=" px-4 py-2 font-thin text-center">...</th>
                                </tr>
                            </thead>
                            <tbody id='list_tiepnhan' class="0">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-span-12 flex flex-1  flex-col md:flex-row lg:flex-row mt-5">
                <div class="mb-3 bg-[#ffffff36] rounded shadow-sm w-full">
                    <div class="">
                        <div class="flex justify-between px-3 py-2 items-center  border-b border-[#ffffff40]">
                            <div class="flex gap-5 w-[150px]  items-center ">
                                <p class="text-lg text-[#83ff00]">Liệu trình</p>
                            </div>
                            <div class="flex gap-5 items-center">

                                <button class="load_homnay_henkhach focus:outline-none text-white w-[24px] h-[24px]" onclick=" load_homnay_henkhach()"><img src="vendor/img/wait32.png" title="Tải lại"></button>
                            </div>
                        </div>

                    </div>
                    <div class="py-3 overflow-x-scroll">
                        <!-- <table class="min-w-full">
                            <thead>
                                <tr class="text-[#efbff5] text-lg">
                                    <th class=" px-4 py-2 font-thin text-center">...</th>
                                    <th class=" px-4 py-2 text-center font-thin">#</th>
                                    <th class=" px-4 py-2 text-left font-thin">Khách hàng</th>
                                    <th class=" px-4 py-2 font-thin text-center">Ngày sinh </th>
                                    <th class=" px-4 py-2 font-thin text-center">Điện thoại</th>
                                    <th class=" px-4 py-2 font-thin text-center">G.Tính</th>
                                    <th class=" px-4 py-2 font-thin text-left">Địa chỉ</th>
                                    <th class=" px-4 py-2 font-thin text-center">Bác sĩ</th>
                                    <th class=" px-4 py-2 font-thin text-center">Dịch vụ</th>
                                    <th class=" px-4 py-2 font-thin text-right">Tổng cộng</th>
                                    <th class=" px-4 py-2 font-thin text-right">Còn nợ</th>
                                    <th class=" px-4 py-2 font-thin text-center">...</th>
                                </tr>
                            </thead>
                            <tbody id='list_henkhach' class="0">

                            </tbody>
                        </table> -->
                        <table class="min-w-full">
                            <thead>
                                <tr class="text-[#efbff5] text-lg">
                                    <th class=" px-4 py-2 font-thin text-center">...</th>
                                    <th class=" px-4 py-2 text-center font-thin">#</th>
                                    <th class=" px-4 py-2 whitespace-nowrap text-center font-thin">Thời gian</th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin">Khách hàng</th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin">Ngày sinh</th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin ">Điện thoại</th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin text-start">Liệu trình</th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin  text-start">Tiến độ</th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin ">Hôm nay</th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin ">Thực hiện</th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin text-end">Tổng cộng</th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin text-end">Thanh toán</th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin text-end">Còn nợ</th>

                                </tr>
                            </thead>
                            <tbody id='list_henkhach' class="0">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-span-12 flex flex-1  flex-col md:flex-row lg:flex-row mt-5">
                <div class="mb-3 bg-[#ffffff36] rounded shadow-sm w-full">
                    <div class="">
                        <div class="flex justify-between px-3 py-2 items-center  border-b border-[#ffffff40]">
                            <div class="flex gap-5 w-[150px]  items-center ">
                                <p class="text-lg text-[#83ff00]">Khách đặt</p>
                            </div>
                            <div class="flex gap-5 items-center">
                                <button class=" focus:outline-none text-white w-[24px] h-[24px]" onclick="open_khachdat() "><img src="vendor/img/add.png" title="Thêm khách đặt"></button>
                                <button class="load_homnay_henkhach focus:outline-none text-white w-[24px] h-[24px]" onclick=" load_homnay_henkhach()"><img src="vendor/img/wait32.png" title="Tải lại"></button>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 overflow-x-scroll">
                        <table class="min-w-full">
                            <thead>
                                <tr class="text-[#efbff5] text-lg">
                                    <th class=" px-4 py-2 whitespace-nowrap text-center font-thin">#</th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin text-center">Thời gian</th>
                                    <th class=" px-4 py-2 whitespace-nowrap text-left font-thin">Khách hàng</th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin text-center">Ngày sinh </th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin text-center">Điện thoại</th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin text-center">G.Tính</th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin text-left">Địa chỉ</th>
                                    <th class=" px-4 py-2 whitespace-nowrap font-thin text-center">Ghi chú</th>
                                    <th class=" px-4 py-2 font-thin text-center">...</th>
                                </tr>
                            </thead>
                            <tbody id='list_khachdat' class="0">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<!-- Form add khách đặt -->
<div class="relative z-10 hidden" id="form_add_khachdat" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-2xl">
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
<!-- Form add bệnh nhân -->
<div class="relative z-10 hidden" id="form_add_benhnhan" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-3xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[green]'>Thêm mới bệnh nhân</p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_benhnhan')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2 px-5 leading-10 " id="" data-te-modal-body-ref>
                        <div class="grid grid-cols-12 gap-2 items-center text-[red]">
                            <p class="col-span-3">Điện thoại</p>
                            <input id="dienthoai_add" onkeyup="find_khachhang(),this.value = this.value.replace(/[^0-9\\,]/g,'')" class="col-span-9 border-b  focus:outline-none px-3" autocomplete="off" maxlength="10">
                        </div>
                        <div class="grid grid-cols-12  items-center justify-center  max-h-[300px] overflow-scroll">
                            <table id="form_khachhang" class="col-span-12 bg-[#f7e2f7] divide-y divide-gray-100 dark:divide-gray-200 py-3 hidden">
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
                                <tbody id='list_khachhang' class="divide-y divide-gray-100 dark:divide-gray-200">
                                </tbody>
                            </table>
                        </div>

                        <div class="grid grid-cols-12 gap-2 items-center  text-[red] py-2">
                            <p class="col-span-3">Họ tên</p>
                            <input id="tenkh_add" class="col-span-9 border-b  focus:outline-none px-3" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center py-2">
                            <p class="col-span-3">Giới tính</p>
                            <input id="nam" value="NAM" type="radio" name="gioitinh">
                            <label for="nam">Nam</label>
                            <input id="nu" type="radio" value="NỮ" name="gioitinh" checked>
                            <label for="nu">Nữ</label>
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center py-2">
                            <p class="col-span-3">Ngày sinh</p>
                            <input id="ngaysinh_add" class="txt_date col-span-9 border-b  focus:outline-none px-3 text-black">
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center py-2">
                            <p class="col-span-3">Địa chỉ</p>
                            <input id="diachi_add" class="col-span-9 border-b  focus:outline-none px-3" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center py-2">
                            <p class="col-span-3">Nghề nghiệp</p>
                            <input id="nghenghiep_add" class="col-span-9 border-b  focus:outline-none px-3" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="mskh_add">
                    <input hidden id="msnguoithan_add">
                    <input hidden id="msnguoithan_new">
                    <input hidden id="nhom_add">
                    <input hidden id="ptgiam_load" value="0">
                    <p id="error_add_benhnhan" class="hidden text-[red]">Vui lòng nhập đầy đủ thông tin</p>
                    <button id="btn_luu_khachhang" type="button" onclick="add_benhnhan()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button id="btn_chon_khachhang" type="button" onclick="chon_benhnhan()" class="hidden mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Chọn</button>
                    <button type="button" onclick="close_modal('form_add_benhnhan')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form edit bệnh nhân -->
<div class="relative z-10 hidden" id="form_edit_benhnhan" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-3xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[red]'>Cập nhật thông tin khách hàng</p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_edit_benhnhan')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2 px-3 leading-10 " id="" data-te-modal-body-ref>
                        <div class="grid grid-cols-12 gap-2 items-center text-[red]">
                            <p class="col-span-3">Điện thoại</p>
                            <input id="dienthoai_edit" onkeyup="find_khachhang(),this.value = this.value.replace(/[^0-9\\,]/g,'')" class="col-span-9 border-b  focus:outline-none px-3" autocomplete="off" readonly>
                        </div>

                        <div class="grid grid-cols-12 gap-2 items-center  text-[red] py-2">
                            <p class="col-span-3">Họ tên</p>
                            <input id="tenkh_edit" class="col-span-9 border-b  focus:outline-none px-3" autocomplete="off" readonly>
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center py-2">
                            <p class="col-span-3">Giới tính</p>
                            <input id="nam_edit" value="NAM" type="radio" name="gioitinh_edit">
                            <label for="nam_edit">Nam</label>
                            <input id="nu_edit" type="radio" value="NỮ" name="gioitinh_edit" checked>
                            <label for="nu_edit">Nữ</label>
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center py-2">
                            <p class="col-span-3">Ngày sinh</p>
                            <input id="ngaysinh_edit" class="txt_date col-span-9 border-b  focus:outline-none px-3 text-black">
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center py-2">
                            <p class="col-span-3">Địa chỉ</p>
                            <input id="diachi_edit" class="col-span-9 border-b  focus:outline-none px-3" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center py-2">
                            <p class="col-span-3">Nghề nghiệp</p>
                            <input id="nghenghiep_edit" class="col-span-9 border-b  focus:outline-none px-3" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="mskh_edit">
                    <input hidden id="msnguoithan_edit">
                    <input hidden id="nhom_edit">
                    <p id="error_add_benhnhan" class="hidden text-[red]">Vui lòng nhập đầy đủ thông tin</p>
                    <button type="button" onclick="edit_benhnhan()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_edit_benhnhan')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form add khám bệnh -->
<div class="relative z-10 hidden" id="form_add_khambenh" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[red]'>Xác nhận đăng ký khám bệnh?</p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_khambenh')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2 px-3 leading-10 " id="" data-te-modal-body-ref>
                        <p id="tenkhachhang_dangky"></p>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="mskh_add_khambenh">
                    <input hidden id="tenkh_add_khambenh">
                    <input hidden id="sodienthoai_add_khambenh">
                    <input hidden id="msnguoithan_add_khambenh">
                    <p id="error_add_benhnhan" class="hidden text-[red]">Vui lòng nhập đầy đủ thông tin</p>
                    <button type="button" onclick="dangky_khambenh()" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_add_khambenh')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form lịch sử khám bệnh -->
<div class="relative z-10 hidden" id="form_lichsu_khambenh" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[green]'>Lịch sử khám bệnh <span id="tenbn_khambenh"></span></p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_lichsu_khambenh')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2 px-3 leading-10 " id="" data-te-modal-body-ref>
                        <div class="grid grid-cols-12  items-center justify-center  max-h-[300px] overflow-scroll">
                            <table class="col-span-12 bg-[#f7e2f7] divide-y divide-gray-100 dark:divide-gray-200 py-3 ">
                                <thead>
                                    <tr>
                                        <td class=" px-4 py-2">#</td>
                                        <td class=" px-4 py-2 text-left">HH/DV</td>
                                        <td class=" px-4 py-2 text-center">Số lượng</td>
                                    </tr>
                                </thead>
                                <tbody id='list_lichsu_khambenh' class="divide-y divide-gray-100 dark:divide-gray-200">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <button type="button" onclick="close_modal('form_lichsu_khambenh')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form chức năng -->
<div class="relative z-10 hidden" id="form_chucnang" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[green]'><span id="tenbn_chucnang"></span></p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_chucnang')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2 px-3 leading-10 grid grid-cols-2 gap-5" id="" data-te-modal-body-ref>
                        <button id="btn_huykham" type="button" onclick="open_huykham()" class="col-span-1 mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-3 py-1 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 min-w-[100px] ">Hủy khám</button>
                        <button type="button" onclick="open_edit_benhnhan()" class="col-span-1 mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-3 py-1 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 min-w-[100px] ">Cập nhật</button>

                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input id='sodienthoai_chucnang' hidden>
                    <input id='soct_chucnang' hidden>
                    <button type="button" onclick="close_modal('form_chucnang')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form hủy khám -->
<div class="relative z-10 hidden" id="form_huykham" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[red]'>Hủy khám </p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_huykham')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2 px-3 leading-10 flex justify-center" id="" data-te-modal-body-ref>
                        <span id="tenbn_huykham"></span>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input id='sodienthoai_huykham' hidden>
                    <input id='soct_huykham' hidden>
                    <button type="button" onclick="huykham_benhnhan()" class=" mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_huykham')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form tiếp nhận khám -->
<div class="relative z-10 hidden" id="form_tiepnhan_benhnhan" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[green]'>Khám bệnh</p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_tiepnhan_benhnhan')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2 px-3 leading-10 flex justify-center" id="" data-te-modal-body-ref>
                        <span id="tenbn_benhnhan_tiepnhan"></span>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input id='sodienthoai_benhnhan_tiepnhan' hidden>
                    <input id='soct_benhnhan_tiepnhan' hidden>
                    <button type="button" onclick="tiepnhan_benhnhan()" class=" mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_tiepnhan_benhnhan')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form tiếp nhận khám -->
<div class="relative z-10 hidden" id="form_tiepnhan_khachdat" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[green]'>Tiếp nhận</p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_tiepnhan_khachdat')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2 px-3 leading-10 " id="" data-te-modal-body-ref>
                        <p class="text-center text-lg" id="tenbn_khachdat_tiepnhan"></p>

                        <div id="ngaysinh_tiepnhan_khachdat" class="grid grid-cols-12 gap-2 items-center py-2 hidden">
                            <p class="col-span-3 text-[red]">Ngày sinh</p>
                            <input id="ngaysinh_add_khachdat_tiepnhan" class="txt_date col-span-9 border-b  focus:outline-none px-3 text-black">
                        </div>
                        <div id="diachi_tiepnhan_khachdat" class="grid grid-cols-12 gap-2 items-center py-2 hidden">
                            <p class="col-span-3 text-[red]">Địa chỉ</p>
                            <input id="diachi_add_khachdat_tiepnhan" class="col-span-9 border-b  focus:outline-none px-3" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input id='sodienthoai_khachdat_tiepnhan' hidden>
                    <input id='soct_khachdat_tiepnhan' hidden>
                    <button type="button" onclick="tiepnhan_khachdat()" class=" mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_tiepnhan_khachdat')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

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
                    <input hidden id="sdt_thanhtoan">

                    <button type="button" onclick="thutien_donhang()" class="mt-3 inline-flex w-full justify-center rounded-md bg-[purple] px-5 py-2 text-[14px]  text-white shadow-sm  hover:bg-purple-500 sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_thutien')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form dịch vụ đã chỉ định  -->
<div class="relative z-10 hidden" id="form_dichvu_dachidinh" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-4xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[green] flex items-center gap-4'>
                                Dịch vụ đã chỉ định
                                <span id='tenkh_dachidinh'></span>
                                <span onclick="open_chidinh_dichvu()"><img class="w-[24px] h-[24px] hover:cursor-pointer" src='vendor/img/add.png'></span>
                            </p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_dichvu_dachidinh')" class=" hover:cursor-pointer box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 " data-te-modal-body-ref>
                        <div class="overflow-x-scroll">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="font_semi">
                                        <th class=" px-4 py-2 text-center font-thin">#</th>
                                        <th class=" px-4 py-2 text-left font-thin">Răng</th>
                                        <th class=" px-4 py-2 font-thin text-center">Dịch vụ</th>
                                        <th class=" px-4 py-2 font-thin text-center">Đơn giá</th>
                                        <th class=" px-4 py-2 font-thin text-center">% giảm</th>
                                        <th class=" px-4 py-2 font-thin text-left">Thanh toán</th>
                                        <th class=" px-4 py-2 font-thin text-center">...</th>
                                        <th class=" px-4 py-2 font-thin text-center">Thực hiện</th>
                                    </tr>
                                </thead>
                                <tbody id='list_dichvu_dachidinh' class="0">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id='soct_dachidinh'>
                    <input hidden id='msnguoithan_chidinh_dichvu'>
                    <input hidden id='sdt_dachidinh'>
                    <input hidden id='nhom_kh_dachidinh'>
                    <input hidden id='ptgiam_dachidinh'>
                    <input hidden id='trangthai_donhang_dachidinh'>
                    <button type="button" onclick="close_modal('form_dichvu_dachidinh')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form add chỉ định dịch vụ -->
<div class="relative z-10 hidden" id="form_chidinh_dichvu" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-7xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[red]'>Chỉ định dịch vụ <span id="tenkh_chidinh_dichvu"></span></p>

                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_chidinh_dichvu')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4   justify-center" data-te-modal-body-ref>

                        <div class="grid grid-cols-12 gap-7">
                            <div class="col-span-12 flex flex-col  items-center" id="list_check_rang">
                                <div class="flex items-center gap-3">
                                    <div onclick="check_rang(this,'R11')" class='hover:cursor-pointer R11 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R11' value='R11'>
                                        <p>R11</p>
                                    </div>
                                    <div onclick="check_rang(this,'R12')" class='hover:cursor-pointer R12 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R12' value='R12'>
                                        <p>R12</p>
                                    </div>
                                    <div onclick="check_rang(this,'R13')" class='hover:cursor-pointer R13 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R13' value='R13'>
                                        <p>R13</p>
                                    </div>
                                    <div onclick="check_rang(this,'R14')" class='hover:cursor-pointer R14 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R14' value='R14'>
                                        <p>R14</p>
                                    </div>
                                    <div onclick="check_rang(this,'R15')" class='hover:cursor-pointer R15 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R15' value='R15'>
                                        <p>R15</p>
                                    </div>
                                    <div onclick="check_rang(this,'R16')" class='hover:cursor-pointer R16 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R16' value='R16'>
                                        <p>R16</p>
                                    </div>
                                    <div onclick="check_rang(this,'R18')" class='hover:cursor-pointer R18 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R18' value='R18'>
                                        <p>R18</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div onclick="check_rang(this,'R21')" class='hover:cursor-pointer R21 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R21' value='R21'>
                                        <p>R21</p>
                                    </div>
                                    <div onclick="check_rang(this,'R22')" class='hover:cursor-pointer R22 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R22' value='R22'>
                                        <p>R22</p>
                                    </div>
                                    <div onclick="check_rang(this,'R23')" class='hover:cursor-pointer R23 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R23' value='R23'>
                                        <p>R23</p>
                                    </div>
                                    <div onclick="check_rang(this,'R24')" class='hover:cursor-pointer R24 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R24' value='R24'>
                                        <p>R24</p>
                                    </div>
                                    <div onclick="check_rang(this,'R25')" class='hover:cursor-pointer R25 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R25' value='R25'>
                                        <p>R25</p>
                                    </div>
                                    <div onclick="check_rang(this,'R26')" class='hover:cursor-pointer R26 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R26' value='R26'>
                                        <p>R26</p>
                                    </div>
                                    <div onclick="check_rang(this,'R28')" class='hover:cursor-pointer R28 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R28' value='R28'>
                                        <p>R28</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div onclick="check_rang(this,'R31')" class='hover:cursor-pointer R31 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R31' value='R31'>
                                        <p>R31</p>
                                    </div>
                                    <div onclick="check_rang(this,'R32')" class='hover:cursor-pointer R32 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R32' value='R32'>
                                        <p>R32</p>
                                    </div>
                                    <div onclick="check_rang(this,'R33')" class='hover:cursor-pointer R33 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R33' value='R33'>
                                        <p>R33</p>
                                    </div>
                                    <div onclick="check_rang(this,'R34')" class='hover:cursor-pointer R34 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R34' value='R34'>
                                        <p>R34</p>
                                    </div>
                                    <div onclick="check_rang(this,'R35')" class='hover:cursor-pointer R35 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R35' value='R35'>
                                        <p>R35</p>
                                    </div>
                                    <div onclick="check_rang(this,'R36')" class='hover:cursor-pointer R36 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R36' value='R36'>
                                        <p>R36</p>
                                    </div>
                                    <div onclick="check_rang(this,'R38')" class='hover:cursor-pointer R38 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R38' value='R38'>
                                        <p>R38</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div onclick="check_rang(this,'R41')" class='hover:cursor-pointer R41 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R41' value='R41'>
                                        <p>R41</p>
                                    </div>
                                    <div onclick="check_rang(this,'R42')" class='hover:cursor-pointer R42 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R42' value='R42'>
                                        <p>R42</p>
                                    </div>
                                    <div onclick="check_rang(this,'R43')" class='hover:cursor-pointer R43 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R43' value='R43'>
                                        <p>R43</p>
                                    </div>
                                    <div onclick="check_rang(this,'R44')" class='hover:cursor-pointer R44 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R44' value='R44'>
                                        <p>R44</p>
                                    </div>
                                    <div onclick="check_rang(this,'R45')" class='hover:cursor-pointer R45 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R45' value='R45'>
                                        <p>R45</p>
                                    </div>
                                    <div onclick="check_rang(this,'R46')" class='hover:cursor-pointer R46 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R46' value='R46'>
                                        <p>R46</p>
                                    </div>
                                    <div onclick="check_rang(this,'R48')" class='hover:cursor-pointer R48 flex gap-3 items-center rounded-md text-black text-lg px-3 py-1'>
                                        <input type='checkbox' class='item_msrang accent-green-500 text-black w-5 h-5' id='R48' value='R48'>
                                        <p>R48</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 flex gap-4 items-end">
                                <input hidden id="msctkm_add_dichvu_chidinh">
                                <input hidden id="mshh_add_dichvu_chidinh">
                                <input hidden id="colieutrinh_add_dichvu_chidinh">
                                <input hidden id="nhom_hh_add_dichvu_chidinh">
                                <div>
                                    <label for="tenhh_add">Tên dịch vụ</label>
                                    <input onkeyup="tim_hanghoa(this, 'dichvu', 'chidinh')" class="w-full appearance-none block border-b border-[#ddd]  px-4 leading-tight focus:outline-none py-2 bg-transparent text-[16px] min-w-[300px]" type="text" id='tendichvu_add_chidinh' placeholder="Tìm tên DV" autocomplete="off">
                                </div>
                                <div>
                                    <label for="dongia_add_dichvu">Đơn giá</label>
                                    <input onkeyup="tinhtiengiam('chidinh')" class="w-full appearance-none block border-b border-[#ddd]  px-4 leading-tight focus:outline-none py-2 bg-transparent text-[16px]" type="text" id='dongia_add_dichvu_chidinh' readonly>
                                </div>
                                <div>
                                    <label for="ptgiam_add_dichvu">% giảm</label>
                                    <input onkeyup="tinhtiengiam('chidinh')" class="w-full appearance-none block border-b border-[#ddd]  px-4 leading-tight focus:outline-none py-2 bg-transparent text-[16px] max-w-[70px]" type="text" id='ptgiam_add_dichvu_chidinh' autocomplete="off">
                                </div>
                                <div>
                                    <label for="tiengiam_add_dichvu">Tiền giảm</label>
                                    <input class="w-full appearance-none block border-b border-[#ddd]  px-4 leading-tight focus:outline-none py-2 bg-transparent text-[16px]  max-w-[150px]" type="text" id='tiengiam_add_dichvu_chidinh' readonly>
                                </div>
                                <div class="hidden">
                                    <label for="ngayhen_add">Ngày hẹn</label>
                                    <div class="flex items-end gap-2">
                                        <input id="ngayhen_edit_chidinh" class=" w-full appearance-none block border-b border-[#ddd]  px-4 leading-tight focus:outline-none py-2 bg-transparent text-[16px] " value="<?= date('d/m/Y') ?>" data-date-format="dd/mm/yyyy" type="text"> <span class="input-group-addon"></span>
                                        <input id="giohen_edit_chidinh" class=" w-full appearance-none block border-b border-[#ddd]  px-4 leading-tight focus:outline-none py-2 bg-transparent text-[16px] " value="<?= date('H:i') ?>" type="time">
                                    </div>
                                </div>
                                <div>
                                    <button type="button" id="btn_chon_hanghoa_chidinh" onclick="add_chidinh_dichvu()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Chọn</button>
                                </div>
                            </div>
                        </div>
                        <div id="form_dichvu_chidinh" class="w-full hidden bg-[#e1f3e8] rounded-md mt-2">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="text-[#06913d] text-lg">
                                        <th class=" px-4 py-2 text-center font-thin">#</th>
                                        <th class=" px-4 py-2 text-left font-thin">Tên dịch vụ</th>
                                        <th class=" px-4 py-2 text-center font-thin">Nhóm</th>
                                        <th class=" px-4 py-2 text-right font-thin">Giá bán</th>
                                    </tr>
                                </thead>
                                <tbody id='list_dichvu_chidinh_items' class="0 ">

                                </tbody>
                            </table>
                        </div>
                        <div class="w-full ">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="text-[black] text-lg">
                                        <th class=" px-4 pt-4 pb-2 text-center font-thin text-[green]">#</th>
                                        <th class=" px-4 pt-4 pb-2 text-left font-thin text-[green]">Tên dịch vụ</th>
                                        <th class=" px-4 pt-4 pb-2 text-right font-thin text-[green]">Đơn giá</th>
                                        <th class=" px-4 pt-4 pb-2 text-right font-thin text-[green]">% giảm</th>
                                        <th class=" px-4 pt-4 pb-2 text-right font-thin text-[green]">Tiền giảm</th>
                                        <th class=" px-4 pt-4 pb-2 text-right font-thin text-[green]">Thanh toán</th>
                                        <th class=" px-4 pt-4 pb-2 text-center font-thin text-[green]">Răng</th>
                                        <th class=" px-4 pt-4 pb-2 text-center font-thin text-[green]">...</th>
                                    </tr>
                                </thead>
                                <tbody id='list_chidinh_dichvu' class="">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="soct_dichvu_chidinh">
                    <input hidden id="sodienthoai_dichvu_chidinh">
                    <input hidden id="ptgiam_dichvu_chidinh">
                    <input hidden id="ptthuchien_dichvu_chidinh">
                    <input hidden id="msctkm_dichvu_chidinh">
                    <input hidden id="nhom_kh_dichvu_chidinh">
                    <button type="button" id='btn_luu_dichvu' onclick="luu_dichvu_rang()" class="inline-flex w-full justify-center rounded-md bg-green-600 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="open_modal('form_huy_chidinh_dichvu')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form hủy chỉ định dịch vụ -->
<div class="relative z-10 hidden" id="form_huy_chidinh_dichvu" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[red]'>Thông báo</p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_huy_chidinh_dichvu')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2 flex justify-center" id="" data-te-modal-body-ref>
                        <p class='text-[red]'>Hủy chỉ định dịch vụ</p>

                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <button type="button" onclick="huy_chidinh_dichvu()" class="inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_huy_chidinh_dichvu')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form delete dịch vụ -->
<div class="relative z-10 hidden" id="form_delete_dichvu" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
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
                        <button type="button" onclick="close_modal('form_delete_dichvu')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2   flex justify-center" id="" data-te-modal-body-ref>
                        <p id="tenhh_delete_dichvu" class="text-lg "></p>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="mshh_delete_dichvu">
                    <input hidden id="msrang_delete_dichvu">
                    <input hidden id="idchidinh_delete_dichvu">
                    <input hidden id="rowid_dichvu">
                    <button type="button" onclick="delete_dichvu_rang()" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_delete_dichvu')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

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

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[green]'>Thêm người thực hiện</p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_nguoithuchien')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->

                    <div class="p-2 leading-10 gap-2 max-h-[450px] overflow-y-scroll" id="" data-te-modal-body-ref>
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
                <div class="bg-gray-50 px-4 py-3 flex justify-end items-center gap-3">
                    <input hidden id="msnv_add_nguoithuchien">
                    <input hidden id="rowid_add_nguoithuchien">
                    <input hidden id="soct_add_nguoithuchien">
                    <input hidden id="mslieutrinh_add_nguoithuchien">
                    <input hidden id="trangthai_add_nguoithuchien">
                    <p id="error_add_nguoithuchien" class="text-[red] hidden">Nhân viên đang thực hiện dịch vụ khác</p>
                    <button type="button" onclick="add_nguoithuchien()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Thêm</button>
                    <button type="button" onclick="close_modal('form_add_nguoithuchien')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form delete người thực hiện -->
<div class="relative z-10 hidden" id="form_delete_nguoithuchien" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[red]'>Vui lòng Xác nhận</p>
                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_delete_nguoithuchien')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2   flex justify-center gap-5" id="" data-te-modal-body-ref>
                        <p id='tennv_delete'></p>

                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="rowid_delete">
                    <input hidden id="msnv_delete">
                    <input hidden id="mslieutrinh_delete">
                    <button type="button" onclick="delete_nguoithuchien()" class="mt-3 mr-3 inline-flex justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm  ring-gray-300 hover:bg-[red]  sm:mt-0 ">Hủy thực hiện</button>
                    <button type="button" onclick="close_modal('form_delete_nguoithuchien')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form thêm đơn thuốc -->
<div class="relative z-10 hidden" id="form_add_donthuoc" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-7xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[red]'>Đơn thuốc | <span id="tenkh_add_donthuoc"></span></p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_donthuoc')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4   justify-center" data-te-modal-body-ref>
                        <div class="grid grid-cols-12 gap-3">
                            <div class="col-span-3 phone:col-span-4">
                                <input hidden id="mshh_add">
                                <input hidden id="giaban_add">
                                <input hidden id="gianhap_add">
                                <input hidden id="pttichluy_add">
                                <input hidden id="loai_hh_add">
                                <input hidden id="songay_bh_add">
                                <input hidden id="nhomhh_add">
                                <input hidden id="thuesuat_add">
                                <input hidden id="ton_edit">
                                <label for="tenhh_add">Tên hàng hóa</label>
                                <input onkeyup="tim_hanghoa(this, 'hanghoa','')" class="w-full appearance-none block border-b border-[#ddd]  px-1 leading-tight focus:outline-none py-2 bg-transparent text-[16px]" id="tenhh_add" type="text" placeholder="Tìm tên HH" autocomplete="off">
                            </div>
                            <div class="col-span-2 phone:col-span-4">
                                <label for="dvt_add">ĐVT</label>
                                <input class="w-full  appearance-none block border-b border-[#ddd]  px-1 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] py-2 " id="dvt_add" type="text" readonly>
                            </div>
                            <div class="col-span-1 phone:col-span-4">
                                <label for="ton_add">Tồn</label>
                                <input class="w-full appearance-none block border-b border-[#ddd]  px-1 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] py-2 " id="ton_add" type="text" readonly>
                            </div>
                            <div class="col-span-3 phone:col-span-4">
                                <label for="cachdung_add">Cách dùng</label>
                                <input class="w-full appearance-none block border-b border-[#ddd]  px-1 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] py-2 " id="cachdung_add" type="text" autocomplete="off">
                            </div>
                            <div class="col-span-2 phone:col-span-4">
                                <label for="soluong_add">Số lượng</label>
                                <input onkeyup="_ChangeFormat(this),ktr_soluong()" class="w-full appearance-none block border-b border-[#ddd]  px-1 leading-tight focus:outline-none pb-2 py-2  bg-transparent text-[16px]" id="soluong_add" type="text" value="0" autocomplete="off">
                            </div>
                            <div class="col-span-1 phone:col-span-4 flex justify-center items-center">
                                <div>
                                    <button type="button" id="btn_chon_hanghoa" onclick="add_donthuoc()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Chọn</button>
                                </div>
                            </div>

                        </div>
                        <div id="form_hanghoa" class="w-full hidden bg-[#e1f3e8] rounded-md mt-2 overflow-x-scroll">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="text-[red] text-lg">
                                        <th class=" px-4 py-2 text-center font-thin">#</th>
                                        <th class=" px-4 py-2 text-left font-thin">Tên hàng hóa</th>
                                        <th class=" px-4 py-2 text-center font-thin">ĐVT</th>
                                        <th class=" px-4 py-2 text-right font-thin">Giá bán</th>
                                    </tr>
                                </thead>
                                <tbody id='list_hanghoa' class="0 ">

                                </tbody>
                            </table>
                        </div>
                        <div class="w-full overflow-x-scroll">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="text-[black] text-lg">
                                        <th class=" px-4 pt-4 pb-2 text-center font-thin text-[green]">#</th>
                                        <th class=" px-4 pt-4 pb-2 text-left font-thin text-[green]">Tên hàng hóa</th>
                                        <th class=" px-4 pt-4 pb-2 text-center font-thin text-[green]">ĐVT</th>
                                        <th class=" px-4 pt-4 pb-2 text-right font-thin text-[green]">SL</th>
                                        <th class=" px-4 pt-4 pb-2 text-right font-thin text-[green]">Giá bán</th>
                                        <th class=" px-4 pt-4 pb-2 text-right font-thin text-[green]">Thành tiền</th>
                                        <th class=" px-4 pt-4 pb-2 text-left font-thin text-[green]">Cách dùng</th>
                                        <th class=" px-4 pt-4 pb-2 text-center font-thin text-[green]">...</th>
                                    </tr>
                                </thead>
                                <tbody id='list_donthuoc' class="0 ">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="soct_donthuoc">
                    <input hidden id="sodienthoai_donthuoc">
                    <input hidden id="ptgiam_donthuoc">
                    <input hidden id="ptthuchien_donthuoc">
                    <input hidden id="msctkm_donthuoc">
                    <input hidden id="nhom_kh_donthuoc">
                    <button type="button" onclick="luu_donthuoc()" class="mt-3 inline-flex w-full justify-center rounded-md bg-[green] px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="open_huy_donthuoc()" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form delete đơn thuốc -->
<div class="relative z-10 hidden" id="form_delete_donthuoc" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
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
                        <button type="button" onclick="close_modal('form_delete_donthuoc')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2   flex justify-center" id="" data-te-modal-body-ref>
                        <p id="tenhh_delete_donthuoc" class="text-lg "></p>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="mshh_delete_donthuoc">
                    <input hidden id="idchidinh_delete_donthuoc">
                    <input hidden id="soct_delete_donthuoc">
                    <button type="button" onclick="delete_donthuoc()" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_delete_donthuoc')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- form huy đơn thuốc -->
<div class="relative z-10 hidden" id="form_huy_donthuoc" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[red]'>Đồng ý hủy</p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_huy_donthuoc')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2   flex justify-center" id="" data-te-modal-body-ref>
                        <p id="tenkh_huy_donthuoc" class="text-lg "></p>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="soct_huy_donthuoc">
                    <button id="btn_huy_donthuoc" type="button" onclick="huy_donthuoc_dichvu('DT')" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px]  hidden">Đồng ý</button>
                    <button id='btn_huy_dichvu' type="button" onclick="huy_donthuoc_dichvu('DV')" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px]  hidden">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_huy_donthuoc')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form add người thân -->
<div class="relative z-10 hidden" id="form_add_nguoithan" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[green]'>Thêm người thân</p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_nguoithan')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2 px-3 leading-10" id="" data-te-modal-body-ref>

                        <div class="grid grid-cols-12 gap-2 items-center">
                            <p class="col-span-3">Họ tên</p>
                            <input id="hoten_nguoithan" class="col-span-9 border-b  focus:outline-none px-3" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center">
                            <p class="col-span-3">Giới tính</p>
                            <input id="nam_nguoithan" value="NAM" type="radio" name="gioitinhnguoithan">
                            <label for="nam_nguoithan">Nam</label>
                            <input id="nu_nguoithan" type="radio" value="NỮ" name="gioitinhnguoithan" checked>
                            <label for="nu_nguoithan">Nữ</label>
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center">
                            <p class="col-span-3">Ngày sinh</p>
                            <input id="ngaysinh_nguoithan" class="txt_date col-span-9 border-b  focus:outline-none px-3 text-black">
                        </div>

                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end items-center gap-3">
                    <input hidden id="sdt_nguoithan">
                    <input hidden id="loai_add" value="inform">
                    <p id="error_add_nguoithan" class='hidden text-[red]'>Vui lòng nhập đầy đủ thông tin</p>
                    <button type="button" onclick="add_nguoithan()" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_add_nguoithan')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var dateToday = new Date();
        $("#ngaygio #ngay_khachdat").datepicker({
            autoclose: true,
            todayHighlight: true,
        });
    });
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
        load_benhnhan()
        load_henkhach()
        load_khachdat()
    })
</script>
<script type="text/javascript" src="vendor/js/tiepnhan.js?v=<?= md5_file('vendor/js/tiepnhan.js') ?>"></script>