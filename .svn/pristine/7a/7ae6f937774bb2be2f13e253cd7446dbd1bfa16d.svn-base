<main class="bg_main">

    <div class="flex flex-col">
        <!--Grid Form-->
        <div class="flex flex-1  flex-col md:flex-row lg:flex-row ">
            <div class="mb-2 w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-2 items-center tablet:grid tablet:grid-cols-12 phone:grid phone:grid-cols-12  laptop:grid laptop:grid-cols-12 bg-[#ffffff36] rounded-md ">
                        <div class="flex justify-between items-center tablet:grid tablet:grid-cols-12 phone:grid phone:grid-cols-12 phone:col-span-12 phone:text-center tablet:col-span-12 tablet:text-center laptop:col-span-12 laptop:justify-start gap-5 phone:gap-3">
                            <p class="text-lg text-[#83ff00] phone:col-span-12 phone:text-center tablet:col-span-12 tablet:text-center whitespace-nowrap">Bảng lương hiệu quả</p>
                            <div class="flex gap-7 tablet:col-span-12 tablet:justify-between tablet:mt-3 phone:col-span-12 phone:gap-3 phone:justify-between phone:flex-wrap phone:grid phone:grid-cols-12 phone:mt-3 items-end ">
                                <input type="text" onkeyup="baocao_search(this)" id="search" class="w-[300px] phone:col-span-8 phone:w-full text-left appearance-none block border-b border-[#f568e3]  px-4 pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-white" placeholder="Tìm tên NV, SĐT" autocomplete="off">

                                <select onchange="load_baocao_thuchiendichvu()" class="phone:col-span-4 phone:w-full mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-[white]" id="list_chucvu_filter" type="text">
                                </select>
                                <select onchange="load_baocao_thuchiendichvu(), show_btn_lay_dulieu()" class="phone:col-span-6 phone:w-full mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-[white]" id="list_chinhanh">
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
                                <button onclick="get_dulieu()" type="button" id="btn_get_dulieu" class="phone:col-span-6 phone:w-full hidden inline-flex w-full justify-center items-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 sm:ml-3 whitespace-nowrap">Lấy dữ liệu</button>
                            </div>
                        </div>

                        <div class="flex gap-7 tablet:col-span-12 tablet:mt-3  items-center tablet:justify-end phone:col-span-12 phone:mt-3  phone:justify-center laptop:col-span-12 laptop:mt-3 laptop:justify-end">

                            <div style="display: flex;  border-radius: 5px; background-color: #e4fae9;">
                                <div id="tungay" class="input-group date flex items-center pl-4" data-date-format="dd/mm/yyyy">
                                    <p class="whitespace-nowrap">Từ ngày</p>
                                    <input id="tungay_input" data-date-format="dd/mm/yyyy" class="form-control text-center bg-transparent phone:w-[100px]" type="text" value="<?= date('01/m/Y'); ?>"> <span class="input-group-addon"></span>
                                </div>
                                <div id="denngay" class="input-group date flex items-center" data-date-format="dd/mm/yyyy">
                                    <p class="whitespace-nowrap">Đến ngày</p>
                                    <input id="denngay_input" data-date-format="dd/mm/yyyy" class="form-control text-center bg-transparent phone:w-[100px]" type=" text" value="<?= date('t/m/Y'); ?>"> <span class="input-group-addon"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="py-3 tablet:overflow-x-scroll">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class=" px-3 py-2 text-center font-thin">#</th>
                                <th class=" px-3 py-2 font-thin text-left">Nhân viên</th>
                                <th class=" px-3 py-2 font-thin text-center">Thực hiện</th>
                                <th class=" px-3 py-2 font-thin  text-right">Doanh số</th>
                                <th class=" px-3 py-2 font-thin text-right">Hoa hồng</th>
                                <th class=" px-3 py-2 font-thin text-right tablet:min-w-[100px]">Lương CB</th>
                                <th class=" px-3 py-2 font-thin text-right tablet:min-w-[100px]">NC</th>
                                <th class=" px-3 py-2 font-thin text-right tablet:min-w-[100px]">Lương NC</th>
                                <th class=" px-3 py-2 font-thin text-right tablet:min-w-[100px]">Tiền PC</th>
                                <th class=" px-3 py-2 font-thin text-right">Tạm ứng</th>
                                <th class=" px-3 py-2 font-thin text-right">Trừ khác</th>
                                <th class=" px-3 py-2 font-thin text-right">Tổng nhận</th>
                                <th class=" px-3 py-2 font-thin text-center">Chức vụ</th>
                                <th class=" px-3 py-2 font-thin text-center tablet:min-w-[100px]">PC (%)</th>
                                <th class=" px-3 py-2 font-thin text-center">MSĐV</th>
                                <th class=" px-3 py-2 font-thin text-center">Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody id='chitiet_baocao' class="0 ">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</main>
<!-- Form chi tiết thực hiện  -->
<div class="relative z-10 hidden" id="form_chitiet_baocao_thuchien" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-4xl">
                <div class="bg-white   ">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[green]" id="chitiet_tennhanvien_thuchien">

                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_chitiet_baocao_thuchien')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="relative flex-auto p-4 text-center " id="hoten_delele" data-te-modal-body-ref>
                        <div class="py-3 ">
                            <table class="min-w-full">
                                <thead>
                                    <tr class=" text-lg  border-b">
                                        <th class=" px-4 py-2 text-center font-thin">#</th>
                                        <th class=" px-4 py-2 text-center font-thin">Ngày</th>
                                        <th class=" px-4 py-2 font-thin text-left">HH/DV</th>
                                        <th class=" px-4 py-2 font-thin text-center">Thời gian</th>
                                        <th class=" px-4 py-2 font-thin  text-right">Doanh số</th>
                                        <th class=" px-4 py-2 font-thin text-right">Hoa hồng</th>
                                        <th class=" px-4 py-2 font-thin text-center">MSĐV</th>
                                    </tr>
                                </thead>
                                <tbody id='chitiet_baocao_in_form' class="0 ">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">

                    <button type="button" onclick="close_modal('form_chitiet_baocao_thuchien')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form update khoản trừ  -->
<div class="relative z-10 hidden" id="form_update_khoantru" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-xl">
                <div class="bg-white   ">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[green]">
                            Trừ khác <span id="tennv_update"></span>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_update_khoantru')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="px-4 " id="hoten_delele" data-te-modal-body-ref>
                        <div class="flex gap-5 items-center">
                            <label class="text-[red] text-lg whitespace-nowrap" for="sotien_khoantru">Số tiền</label>
                            <input onkeyup="_ChangeFormat(this),this.value = this.value.replace(/[^0-9\.\,]/g,'')" class="w-full appearance-none block border-b border-[#ddd]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] py-2 text-[red] " id="sotien_khoantru" type="text">
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="rowid_update">
                    <button onclick="update_khoantru()" type="button" class="inline-flex w-full justify-center items-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 sm:mt-0 max-w-[100px] ">Lưu</button>

                    <button type="button" onclick="close_modal('form_update_khoantru')" class=" inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Form add thu chi  -->
<div class="relative z-10 hidden" id="form_add_thuchi" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-xl">
                <div class="bg-white   ">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[green]">
                            <span id="loai_thuchi"></span>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_thuchi')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="px-4 " data-te-modal-body-ref>
                        <div id="input_tamung" class="grid grid-cols-12 gap-5 items-center hidden">
                            <label class="col-span-3 text-[red] text-lg whitespace-nowrap" for="sotien_add">Tiền tạm ứng</label>
                            <input onkeyup="_ChangeFormat(this),this.value = this.value.replace(/[^0-9\.\,]/g,'')" class=" col-span-9 w-full appearance-none block border-b border-[#ddd]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] py-2 text-[red] " id="sotien_tamung_add" type="text" value="0" readonly>
                        </div>
                        <div id="input_tienluong" class="grid grid-cols-12  gap-5 items-center">
                            <label class="col-span-3 text-[red] text-lg whitespace-nowrap" for="sotien_add">Tiền lương</label>
                            <input onkeyup="_ChangeFormat(this),this.value = this.value.replace(/[^0-9\.\,]/g,'')" class="col-span-9 w-full appearance-none block border-b border-[#ddd]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] py-2 text-[red] " id="sotien_luong_add" type="text" readonly>
                        </div>
                        <div class="grid grid-cols-12  gap-5 items-center">
                            <label class="col-span-3 text-lg whitespace-nowrap" for="nganquy_thuchi">Ngân quỹ</label>
                            <select id="nganquy_thuchi" class=' col-span-9 appearance-none block w-full border-b border-gray-300 py-2 px-4 leading-tight focus:outline-none focus:bg-white '>
                                <option value="TM">Tiền mặt</option>
                                <option value="NH">Ngân hàng</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="msnv_add">
                    <input hidden id="tennv_add">
                    <input hidden id="loaichungtu_add">
                    <button onclick="add_thuchi_luong()" type="button" class="inline-flex w-full justify-center items-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 sm:mt-0 max-w-[100px] ">Lưu</button>

                    <button type="button" onclick="close_modal('form_add_thuchi')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form add thu chi  -->
<div class="relative z-10 hidden" id="form_phieu_dathuchien" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white   ">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[green]">
                            Phiếu đã chi
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_phieu_dathuchien')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="px-4 text-center" data-te-modal-body-ref>
                        <p class="text-[red] text-lg">Xóa để điều chỉnh <span id='tennv_delete'></span></p>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="sophieuchi">
                    <input hidden id="sophieuthu">
                    <input hidden id="msnv_delete">
                    <button onclick="delete_thuchi_luong()" type="button" class="inline-flex w-full justify-center items-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 sm:mt-0 max-w-[100px] ">Đồng ý</button>

                    <button type="button" onclick="close_modal('form_phieu_dathuchien')" class=" inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(
        async function() {
            await load_chucvu()
            show_btn_lay_dulieu()
            load_baocao_thuchiendichvu()
        })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var dateToday = new Date();
        $("#tungay input, #denngay input").datepicker({
            autoclose: true,
            todayHighlight: true,
        }).on('changeDate', async function() {
            await load_baocao_thuchiendichvu()
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
<script type="text/javascript" src="vendor/js/baocao.js?v=<?= md5_file('vendor/js/baocao.js') ?>"></script>