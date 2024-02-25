<main class="bg_main ">

    <div class="flex flex-col">
        <!--Grid Form-->
        <div class="flex flex-1  flex-col md:flex-row lg:flex-row ">
            <div class="mb-2 rounded shadow-sm w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-2 items-center bg-[#ffffff36] rounded-md ">
                        <div class="flex gap-5   items-center ">
                            <p class="text-lg text-[#83ff00]">Thực hiện dịch vụ</p>
                            <div>
                                <img onclick="load_nhatky()" id="img_load_nhanvien" class="w-[24px] hover:cursor-pointer hover:opacity-1" src='vendor/img/wait32.png' title="Làm mới">
                            </div>
                        </div>

                    </div>

                </div>
                <div class="py-3  phone:overflow-x-scroll ">
                    <?php if ($_COOKIE['loaihinh'] == 'NK') { ?>
                        <table class="min-w-full">
                            <thead>
                                <tr class="text-[#efbff5] text-lg">
                                    <th class=" px-4 py-2 text-center font-thin">#</th>
                                    <th class=" px-4 py-2 text-left font-thin">Khách hàng</th>
                                    <th class=" px-4 py-2 text-center font-thin">Tuổi</th>
                                    <th class=" px-4 py-2 text-left font-thin">Thực hiện dịch vụ</th>
                                    <th class=" px-4 py-2 font-thin text-left">Người thực hiện</th>
                                    <th class=" px-4 py-2 text-center font-thin">Trạng thái</th>
                                    <th class=" px-4 py-2 text-center font-thin">Khám</th>
                                </tr>
                            </thead>
                            <tbody id='chitiet_nhatky' class="">

                            </tbody>
                        </table>
                    <?php
                    } else {
                    ?>
                        <table class="min-w-full">
                            <thead>
                                <tr class="text-[#efbff5] text-lg">
                                    <th class=" px-4 py-2 text-center font-thin">#</th>
                                    <th class=" px-4 py-2 text-left font-thin">Khách hàng</th>
                                    <th class=" px-4 py-2 text-left font-thin">Dịch vụ</th>
                                    <th class=" px-4 py-2 text-center font-thin">...</th>
                                    <th class=" px-4 py-2 font-thin text-left">Người thực hiện</th>
                                    <th class=" px-4 py-2 font-thin text-center">Yêu cầu</th>
                                    <th class=" px-4 py-2 font-thin text-left">Ghi chú</th>
                                </tr>
                            </thead>
                            <tbody id='chitiet_nhatky' class="">

                            </tbody>
                        </table>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</main>

<!-- Form add tư vấn điều trị -->
<div class="relative z-10 hidden" id="form_add_noidung" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-2xl">
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
                                            <th class=" px-4 py-2 text-center font-thin">#</th>
                                            <th class=" px-4 py-2 text-left font-thin">Nội dung</th>
                                            <th class=" px-4 py-2 text-left font-thin">Người tư vấn</th>
                                            <th class=" px-4 py-2 text-center font-thin">...</th>
                                        </tr>
                                    </thead>
                                    <tbody id='chitiet_tuvan' class="0 ">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mt-5" hidden>
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
                                            <th class=" px-4 py-2 text-center font-thin">#</th>
                                            <th class=" px-4 py-2 text-left font-thin">Nội dung</th>
                                            <th class=" px-4 py-2 text-left font-thin">Người điều trị</th>
                                            <th class=" px-4 py-2 text-center font-thin">...</th>
                                        </tr>
                                    </thead>
                                    <tbody id='chitiet_dieutri' class="0 ">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h3 class="text-left text-xl text-[#008b2e]">• Liệu trình</h3>

                            <div class="p-3">
                                <table id="" class="min-w-full divide-y divide-gray-100 dark:divide-gray-200">
                                    <thead>
                                        <tr class="font_semi">
                                            <th class=" px-4 py-2 text-center">Lần</th>
                                            <th class=" px-4 py-2">Liệu trình</th>
                                            <th class=" px-4 py-2 text-center">Ngày</th>
                                            <th class=" px-4 py-2 text-center">Số tiền</th>
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

<!-- Form add hình ảnh -->
<div class="relative z-10 hidden" id="form_add_img" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[green]" id="exampleModalLabel">
                            Hình ảnh
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_img')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2 " id="" data-te-modal-body-ref>

                        <div class="flex gap-2 flex-wrap">
                            <div id="list_img_nhatky" class=" flex gap-2 flex-wrap">
                            </div>
                            <label class="flex items-center border border-dashed border-[#ffffff40] gap-2 uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="anhnhatky">
                                <label class="w-[100px] h-[100px] hover:cursor-pointer  uppercase tracking-wide text-gray-700 text-xs font-medium border border-dashed border-[#ffffff40] bg-[#e5e5e5]   flex justify-center items-center" for="anhnhatky_add">
                                    <img class="w-[20px]" src="vendor/img/add.png">
                                </label>
                                <input type="file" accept="image/*" onchange="anhnhatky(this)" id="anhnhatky_add" multiple hidden />
                            </label>
                            <div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="rowid_add_img">
                    <input hidden id="soct_add_img">
                    <button type="button" onclick="add_img_nhatky()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_add_img')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

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
                        <button type="button" onclick="delete_nguoithuchien()" class="mt-3 mr-3 inline-flex justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm  ring-gray-300 hover:bg-[red]  sm:mt-0 ">Hủy thực hiện</button>
                        <button id="btn_hoantat_dichvu" type="button" onclick="hoantat_dichvu()" class="mt-3 inline-flex justify-center rounded-md bg-[#7c00af] px-5 py-2 text-[14px]  text-white shadow-sm  ring-gray-300 hover:bg-[green]  sm:mt-0 ">Thực hiện hoàn tất</button>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="mslieutrinh_hoantat">
                    <input hidden id="msmota_hoantat">
                    <input hidden id="rowid_delete">
                    <input hidden id="soct_thuchien">
                    <button type="button" onclick="close_modal('form_delete_nguoithuchien')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form add nguoi thuc hein -->
<div class="relative z-10 hidden" id="form_add_nguoithuchien" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[red]'>Thực hiện dịch vụ này</p>
                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_nguoithuchien')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 flex justify-center" data-te-modal-body-ref>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="rowid_thuchien_add">
                    <input hidden id="soct_thuchien_add">
                    <input hidden id="ptthuchien_add">
                    <input hidden id="mslieutrinh_add">
                    <input hidden id="msmota_add">

                    <button type="button" onclick="add_nguoithuchien()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_add_nguoithuchien')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form quá trình điều trị -->
<div class="relative z-10 hidden" id="form_quatrinhdieutri" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-6xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[red]'>Lịch sử điều trị</p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_quatrinhdieutri')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4  grid grid-cols-2 justify-center max-h-[450px] overflow-y-scroll" data-te-modal-body-ref>
                        <div class="w-full col-span-1 border-r">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="text-[black] text-lg">
                                        <th class=" px-4 py-2 text-center font-thin">#</th>
                                        <th class=" px-4 py-2 text-left font-thin">Ngày</th>
                                        <th class=" px-4 py-2 text-left font-thin">Tên HH/DV</th>

                                    </tr>
                                </thead>
                                <tbody id='chitiet_quatrinhdieutri' class="0 ">

                                </tbody>
                            </table>
                        </div>
                        <div class="w-full col-span-1">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="text-[black] text-lg">
                                        <th class=" px-4 py-2 text-center font-thin">#</th>
                                        <th class=" px-4 py-2 text-left font-thin">Nội dung</th>
                                        <th class=" px-4 py-2 text-center font-thin">Loại</th>
                                    </tr>
                                </thead>
                                <tbody id='noidung_chitiet_quatrinhdieutri' class="0 ">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <button type="button" onclick="close_modal('form_quatrinhdieutri')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

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
                                <input hidden id="nhom_add">
                                <input hidden id="thuesuat_add">
                                <input hidden id="msctkm_add">
                                <input hidden id="ton_edit">
                                <input hidden id="sodienthoai" value="">
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
                    <input hidden id="msnguoithan_donthuoc">
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
<!-- Form thêm dịch vụ -->
<div class="relative z-10 hidden" id="form_add_dichvu" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-4xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[red]'>Dịch vụ | <span id="tenkh_add_dichvu"></span></p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_dichvu')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4   justify-center" data-te-modal-body-ref>
                        <div class="grid grid-cols-12 gap-7">
                            <div class="col-span-3 phone:col-span-6">
                                <input hidden id="msctkm_add_dichvu">
                                <input hidden id="ptgiam_add_dichvu">
                                <input hidden id="mshh_add_dichvu">
                                <input hidden id="colieutrinh_add_dichvu">
                                <input hidden id="nhom_hh_add_dichvu">
                                <label for="tenhh_add">Tên dịch vụ</label>
                                <input onkeyup="tim_hanghoa(this, 'dichvu','xutri')" class="w-full appearance-none block border-b border-[#ddd]  px-4 leading-tight focus:outline-none py-2 bg-transparent text-[16px]" type="text" id='tendichvu_add' placeholder="Tìm tên DV" autocomplete="off">
                            </div>

                            <div class="col-span-1 phone:col-span-4 flex justify-center items-center">
                                <div>
                                    <button type="button" id="btn_chon_hanghoa" onclick="add_dichvu()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Chọn</button>
                                </div>
                            </div>

                        </div>
                        <div id="form_dichvu" class="w-full hidden bg-[#e1f3e8] rounded-md mt-2  max-h-[450px] overflow-y-scroll">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="text-[red] text-lg">
                                        <th class=" px-4 py-2 text-center font-thin">#</th>
                                        <th class=" px-4 py-2 text-left font-thin">Tên dịch vụ</th>
                                        <th class=" px-4 py-2 text-center font-thin">Nhóm</th>
                                        <th class=" px-4 py-2 text-right font-thin">Giá bán</th>
                                    </tr>
                                </thead>
                                <tbody id='list_dichvu_items' class="0 ">

                                </tbody>
                            </table>
                        </div>
                        <div class="w-full ">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="text-[black] text-lg">
                                        <th class=" px-4 pt-4 pb-2 text-center font-thin text-[green]">#</th>
                                        <th class=" px-4 pt-4 pb-2 text-left font-thin text-[green]">Tên dịch vụ</th>
                                        <th class=" px-4 pt-4 pb-2 text-right font-thin text-[green]">Thành tiền</th>
                                        <th class=" px-4 pt-4 pb-2 text-center font-thin text-[green]">...</th>
                                    </tr>
                                </thead>
                                <tbody id='list_dichvu' class="0 ">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="soct_dichvu">
                    <input hidden id="sodienthoai_dichvu">
                    <input hidden id="msnguoithan_dichvu">
                    <input hidden id="ptgiam_dichvu">
                    <input hidden id="ptthuchien_dichvu">
                    <input hidden id="msctkm_dichvu">
                    <input hidden id="nhom_kh_dichvu">
                    <button type="button" onclick="luu_dichvu()" class="mt-3 inline-flex w-full justify-center rounded-md bg-[green] px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="open_huy_dichvu()" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

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
                    <input hidden id="rowidtc_donthuoc">
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
<!-- form thông báo -->
<div class="relative z-10 hidden" id="form_info" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_info" class='text-[red]'></p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_info')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
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

                    <button type="button" onclick="close_modal('form_info')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(async function() {
        await load_nhatky()
        lay_tonkho_baocao()

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
<script type="text/javascript" src="vendor/js/nhatky.js?v=<?= md5_file('vendor/js/nhatky.js') ?>"></script>