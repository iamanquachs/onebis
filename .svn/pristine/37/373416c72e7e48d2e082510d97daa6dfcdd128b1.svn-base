<main class="bg_main">
    <div class="flex flex-col">
        <!--Grid Form-->

        <div class="flex flex-1  flex-col md:flex-row lg:flex-row">
            <div class="mb-2 w-full">
                <div class="bg-[#ffffff36] rounded-md  px-2 py-3 ">
                    <div class="flex justify-between items-center tablet:grid tablet:grid-cols-12 phone:grid phone:grid-cols-12  ">
                        <div class="flex gap-5 tablet:gap-3 items-center  tablet:col-span-12 tablet:grid tablet:grid-cols-12 phone:col-span-12 phone:grid phone:grid-cols-12">
                            <p class="text-lg text-[#83ff00] tablet:col-span-12  tablet:text-center phone:col-span-12  phone:text-center whitespace-nowrap">Điều chuyển tài sản</p>
                            <div class='flex tablet:col-span-12 tablet:justify-between phone:col-span-12 phone:justify-between'>
                                <div class="flex justify-center tablet:w-full phone:w-full items-center">
                                    <div class=" xl:w-96 tablet:w-full phone:w-full">
                                        <div class="input-group relative flex tablet:grid tablet:grid-cols-12 tablet:justify-between phone:grid phone:grid-cols-12 phone:justify-between gap-7 items-center w-full ">
                                            <form onsubmit="return false;" class="tablet:col-span-6 phone:col-span-6">
                                                <input type="search" onkeyup="quanlytaisan_search()" id="search" class="w-[300px] phone:w-[200px] mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-white" placeholder="Tìm tên hàng hóa" aria-label="Search" aria-describedby="button-addon2" autocomplete="off">
                                            </form>

                                            <select onchange="load_taisan()" class="phone:col-span-5 phone:w-full mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-[white]" id="list_chinhanh" type="text">
                                                <?php
                                                if ($list_chinhanh_phanquyen[0]->phanquyen == 1) { ?>
                                                    <option selected class='text-[#747474]' value="">Tất cả chi nhánh</option>
                                                    <?php
                                                    foreach ($list_chinhanh as $r) { ?>
                                                        <option class='text-black' value="<?= $r->msdv ?>"><?= $r->tendv ?></option>
                                                        <?php }
                                                } else {
                                                    foreach ($list_chinhanh as $e) {
                                                        if ($msdv == $e->msdv) { ?>
                                                            <option class='text-black' value="<?= $e->msdv ?>"><?= $e->tendv ?></option>
                                                <?php }
                                                    }
                                                } ?>
                                            </select>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class=" tablet:col-span-6 phone:col-span-4 flex gap-5 tablet:justify-end ">
                            <button class="bg-[#008d3f] p-2 rounded-md hover:bg-green-600 text-white phone:whitespace-nowrap" onclick="open_modal('form_xuat_sudung')">Xuất tài sản</button>
                        </div>
                    </div>

                </div>
                <div class="p-3 overflow-x-scroll">
                    <table class="min-w-full ">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class="font-thin text-center px-4 py-2">#</th>
                                <th class="font-thin text-left px-4 py-2">Tên tài sản/CCDC</th>
                                <th class="font-thin text-left px-4 py-2 ">Tên phòng ban</th>
                                <th class="font-thin text-center px-4 py-2 ">Nhập</th>
                                <th class="font-thin text-center px-4 py-2 ">Xuất</th>
                                <th class="font-thin text-center px-4 py-2 ">Tồn</th>
                                <th class="font-thin text-center px-4 py-2 ">MSĐV</th>
                                <th class="font-thin text-center px-4 py-2 ">...</th>
                            </tr>
                        </thead>
                        <tbody id='list_quanly_taisan' class="">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Form xuất sử dụng -->
<div class="relative z-10 hidden" id="form_xuat_sudung" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center  text-center items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-2xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[green]" id="exampleModalLabel">
                            Xuất sử dụng
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_xuat_sudung')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div data-te-modal-body-ref class="overflow-y-scroll max-h-[500px] overflow-x-hidden">
                        <input hidden id="msdonvi_quanly_add_xsd">

                        <div class="w-full   px-3 pb-4 gap-5  mt-5">
                            <div class="w-full grid grid-cols-12 items-center px-3 ">
                                <label class="col-span-4 block uppercase tracking-wide text-gray-700 text-xs font-medium whitespace-nowrap" for="donvi_quanly_add">
                                    Tên tài sản/CCDC
                                </label>
                                <input hidden id="mshh_add_xsd">
                                <input onkeyup="find_hanghoa()" class="col-span-8 appearance-none block w-full  border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="tenhh_add_xsd" type="text" autocomplete="off">
                            </div>
                            <div id="form_hanghoa" class="w-full grid grid-cols-12 items-center px-3 hidden">
                                <div class="col-span-12">
                                    <table class="min-w-full ">
                                        <thead>
                                            <tr class=" text-lg">
                                                <th class="font-thin text-center px-4 py-2">#</th>
                                                <th class="font-thin text-left px-4 py-2">Tên tài sản/CCDC</th>
                                            </tr>
                                        </thead>
                                        <tbody id='list_hanghoa' class="">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="w-full grid grid-cols-12 items-center px-3 mt-5">
                                <label class="col-span-4  block uppercase tracking-wide text-gray-700 text-xs font-medium whitespace-nowrap" for="donvi_nhan_add">
                                    Đơn vị nhận
                                </label>
                                <div class="col-span-8 flex items-center gap-2 __icon">
                                    <select class="min-w-[300px] appearance-none block w-full  border-b-[1px]   py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="donvi_nhan_sudung">

                                    </select>
                                </div>
                            </div>
                            <div class="w-full px-3 grid grid-cols-12 items-center  mt-5">
                                <label class=" col-span-4 block uppercase tracking-wide text-gray-700 text-xs font-medium whitespace-nowrap" for="soluong_add">
                                    Số lượng
                                </label>
                                <input onkeyup="soluong_nhap(this)" class="col-span-6  min-w-full appearance-none block w-full  border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="soluong_xuat_sudung" type="text" autocomplete="off">
                                <input hidden id="tonkho">
                                <p class="col-span-2" id="tonkho_toida"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <p id="_error_xsd" class="text-[red] hidden">Số lượng vượt mức hoặc chưa chọn đơn vị nhận</p>
                    <button onclick="xuat_sudung()" type="button" class="inline-flex w-full justify-center items-center rounded-md bg-green-600 px-7 py-2 text-[14px] text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:mt-0 max-w-[100px]">Lưu</button>
                    <button type="button" onclick="close_modal('form_xuat_sudung')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form thêm mới hàng hóa -->
<div class="relative z-10 hidden" id="form_add_quanly_taisan" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center  text-center items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-2xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[green]" id="exampleModalLabel">
                            Trả tài sản
                            <input hidden id="mshh_sudung">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_quanly_taisan')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div data-te-modal-body-ref class="overflow-y-scroll max-h-[500px] overflow-x-hidden">
                        <div class="w-full   px-3 pb-4 gap-5  mt-5">
                            <div class="w-full grid grid-cols-12 items-center px-3 ">
                                <label class="col-span-4 block uppercase tracking-wide text-gray-700 text-xs font-medium whitespace-nowrap" for="donvi_quanly_add">
                                    Tài sản
                                </label>
                                <input hidden id="msdonvi_sudung">
                                <input class="col-span-8 appearance-none block w-full  border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="tenhh_sudung" type="text" autocomplete="off" readonly>
                            </div>

                            <div class="w-full px-3 grid grid-cols-12 items-center  mt-5">
                                <label class=" col-span-4 block uppercase tracking-wide text-gray-700 text-xs font-medium whitespace-nowrap" for="soluong_add">
                                    Số lượng
                                </label>
                                <input onkeyup="soluong_chuyengiao(this)" class="col-span-7  min-w-[300px] appearance-none block w-full  border-b border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="soluong_add" type="text" autocomplete="off">
                                <input hidden id="soluong_toida">
                                <p class="col-span-1" id="soluong_chuyengiao"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <p id="_error" class="text-[red] hidden">Số lượng vượt mức hoặc chưa chọn đơn vị nhận</p>
                    <button onclick="xuat_tra()" type="button" class="inline-flex w-full justify-center items-center rounded-md bg-green-600 px-7 py-2 text-[14px] text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:mt-0 max-w-[100px]">Lưu</button>
                    <button type="button" onclick="close_modal('form_add_quanly_taisan')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form chi tiết -->
<div class="relative z-10 hidden" id="form_chitiet_dieuchuyen" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-6xl">
                <div class="bg-white   ">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[green]" id="title_form_chitiet_dieuchuyen">

                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_chitiet_dieuchuyen')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="relative flex-auto p-4 text-center" id="tenhh_delele" data-te-modal-body-ref>

                        <div class="p-3 overflow-x-scroll">
                            <table class="min-w-full ">
                                <thead>
                                    <tr class=" text-lg">
                                        <th class="font-thin text-center px-4 py-2">#</th>
                                        <th class="font-thin text-left px-4 py-2">Ngày mua</th>
                                        <th class="font-thin text-center px-4 py-2 ">Ngày xuất</th>
                                        <th class="font-thin text-center px-4 py-2 ">Người xuất</th>
                                        <th class="font-thin text-center px-4 py-2 ">Đơn vị xuất</th>
                                        <th class="font-thin text-center px-4 py-2 ">Ngày nhận</th>
                                        <th class="font-thin text-center px-4 py-2 ">Hàng hóa</th>
                                        <th class="font-thin text-center px-4 py-2 ">Số lượng</th>
                                        <th class="font-thin text-center px-4 py-2 ">Số tháng khấu hao</th>
                                    </tr>
                                </thead>
                                <tbody id='list_chitiet_dieuchuyen' class="">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <button type="button" onclick="close_modal('form_chitiet_dieuchuyen')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form cập nhật hồ sơ tài sản -->
<div class="relative z-10 hidden" id="form_capnhat_taisan" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white   ">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[green]" id="title_form">

                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_capnhat_taisan')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="relative flex-auto p-4 text-center" id="tenhh_delele" data-te-modal-body-ref>

                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id='mshh_dieuchuyen'>
                    <input hidden id='soct_dieuchuyen'>
                    <button id="btn_duyet" type="button" onclick="update_hososudungtaisan('duyet')" class="inline-flex w-full justify-center items-center rounded-md bg-green-600 px-7 py-2 text-[14px] text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:mt-0 max-w-[100px] hidden">Duyệt</button>
                    <button id="btn_nhan" type="button" onclick="update_hososudungtaisan('nhan')" class="inline-flex w-full justify-center items-center rounded-md bg-green-600 px-7 py-2 text-[14px] text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:mt-0 max-w-[100px] hidden">Nhận</button>
                    <button type="button" onclick="close_modal('form_capnhat_taisan')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="vendor/js/quanlytaisan.js?v=<?= md5_file('vendor/js/quanlytaisan.js') ?>"></script>

<script>
    $(document).ready(function() {
        load_taisan()
        load_danhmuc_phongban()
    });
</script>