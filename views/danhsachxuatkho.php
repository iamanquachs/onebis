<main class="bg_main ">
    <div class="grid grid-cols-12 gap-3">
        <!--Grid Form-->

        <div class="col-span-4 flex flex-1  flex-col phone:col-span-12 tablet:col-span-12 md:flex-row lg:flex-row ">
            <div class="mb-2 bg-[#ffffff36] rounded shadow-sm w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-3 items-center  border-b border-[#a86ed4]">
                        <div class="flex gap-5  items-center ">
                            <p class="text-lg text-[#83ff00]">Danh sách Phiếu xuất</p>

                        </div>
                    </div>
                </div>
                <div class="py-3 overflow-x-scroll">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class=" px-4 py-2 text-center font-thin">#</th>
                                <th class=" px-4 py-2 text-center font-thin">Ngày xuất</th>
                                <th class=" px-4 py-2 text-center font-thin ">Loại xuất</th>
                                <th class=" px-4 py-2  font-thin text-center">Tổng tiền</th>

                            </tr>
                        </thead>
                        <tbody id='list_xuatkho_header' class="text-white">

                        </tbody>
                    </table>
                    <div class="pt-5 px-3">
                        <div class="gap-3 pt-5 grid grid-cols-12 tablet:flex items-end w-full">
                            <select onchange="xuatkho_filter()" id="loaixuat_filter" class="col-span-5 phone:col-span-12 tablet:col-span-12 w-full appearance-none block   text-[#c068ba] border-b border-[#f568e3]  px-2 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]">

                            </select>
                            <div class=" col-span-7 phone:col-span-12 tablet:col-span-12 donhang_filter_div pt-5 w-full" style="display: flex; justify-content: space-between; align-items: center; ">
                                <div id="tungay" class="input-group date text-white" data-date-format="dd/mm/yyyy">
                                    <input id="tungay_input" data-date-format="dd/mm/yyyy" class="form-control text-center bg-transparent border-b border-[#f568e3] " type="text" value="<?= date('d/m/Y', strtotime('-30 day', strtotime(date('Y-m-d')))); ?>"> <span class="input-group-addon"></span>
                                </div>
                                <span class="text-white">Đến</span>
                                <div id="denngay" class="input-group date text-white" data-date-format="dd/mm/yyyy">
                                    <input id="denngay_input" data-date-format="dd/mm/yyyy" class="form-control text-center bg-transparent border-b border-[#f568e3] " type="text" value="<?= date('d/m/Y'); ?>"> <span class="input-group-addon"></span>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-8 phone:col-span-12 tablet:col-span-12">
            <div class="mb-2 bg-[#ffffff36] rounded shadow-sm w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-2 pb-[0.7rem] items-center  border-b border-[#a86ed4]">
                        <div class="flex gap-5  items-center ">
                            <p class="text-lg text-[#83ff00]">Chi tiết xuất</p>
                        </div>
                        <input hidden id="soct_xuatkho">
                        <input hidden id="title_delete_xuatkho">
                        <div class="flex gap-5 ">
                            <button class=" text-white bg-[#9536b2] px-3 py-1 rounded-md" onclick="add_xuatkho_header('')">Tạo phiếu xuất</button>
                            <button class=" text-white bg-[#b33333] px-3 py-1 rounded-md" onclick="capnhat_xuatkho()">Cập nhật</button>
                            <button class=" text-white bg-[red] px-3 py-1 rounded-md" onclick="open_delete_xuatkho()">Xóa phiếu</button>
                        </div>
                    </div>
                </div>
                <div class="py-3 overflow-x-scroll">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class=" px-4 py-2 text-center font-thin">#</th>
                                <th class=" px-4 py-2 text-center font-thin">NPP</th>
                                <th class=" px-4 py-2 text-center font-thin">MSHH</th>
                                <th class=" px-4 py-2 text-center font-thin">Tên hàng hóa</th>
                                <th class=" px-4 py-2 text-center font-thin ">ĐVT</th>
                                <th class=" px-4 py-2 text-center font-thin ">SL</th>
                                <th class=" px-4 py-2 font-thin text-center">% KM</th>
                                <th class=" px-4 py-2 font-thin text-center">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody id='list_xuatkho_line' class="text-white">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</main>

<!-- Form delete nhap kho  -->
<div class="relative z-10 hidden" id="form_delete_xuatkho" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[red]'>Đồng ý xóa</p>
                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_delete_xuatkho')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 " data-te-modal-body-ref>
                        <p id="ten_donhang" class="text-center"></p>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="soct_delete">
                    <button type="button" onclick="delete_xuatkho()" class="mt-3 inline-flex w-full justify-center rounded-md bg-[purple] px-5 py-2 text-[14px]  text-white shadow-sm  hover:bg-purple-500 sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_delete_xuatkho')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form nhập kho chưa thành công-->
<div class="relative z-10 hidden" id="form_xuatkho_chua_thanhcong" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg phone:max-w-xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[red]'>Thông báo</p>
                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_xuatkho_chua_thanhcong')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 flex justify-center" data-te-modal-body-ref>
                        <div id='item_xuatkho_chua_thanhcong' class="w-full">

                        </div>

                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">

                    <button type="button" onclick="close_modal('form_xuatkho_chua_thanhcong')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(async function() {
        await load_loaixuat()
        xuatkho_filter()
        get_xuatkho_chua_update()
    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var dateToday = new Date();
        $("#tungay input, #denngay input").datepicker({
            autoclose: true,
            todayHighlight: true,
        }).on('changeDate', async function() {
            xuatkho_filter()
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
<script type="text/javascript" src="vendor/js/xuatkho.js?v=<?= md5_file('vendor/js/xuatkho.js') ?>"></script>