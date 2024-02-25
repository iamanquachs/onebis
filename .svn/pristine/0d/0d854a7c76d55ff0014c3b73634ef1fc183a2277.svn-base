<main class="bg_main">

    <div class="flex flex-col">
        <!--Grid Form-->
        <div class="flex flex-1  flex-col md:flex-row lg:flex-row ">
            <div class="mb-2 bg-[#ffffff36] rounded shadow-sm w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-2 items-center phone:grid phone:grid-cols-12 tablet:grid tablet:grid-cols-12 laptop:grid laptop:grid-cols-12 border-b border-[#ffffff40]">
                        <div class="flex justify-between items-center phone:grid phone:grid-cols-12 tablet:grid tablet:grid-cols-12 phone:col-span-12 phone:text-center tablet:col-span-12 tablet:text-center laptop:col-span-12 laptop:justify-start gap-5 phone:gap-3">
                            <p class="text-lg text-[#83ff00] phone:col-span-12 phone:text-center tablet:col-span-12 tablet:text-center whitespace-nowrap">Báo cáo lãi gộp hàng hóa, dịch vụ</p>
                            <div class="flex gap-7  tablet:col-span-12 tablet:justify-between tablet:mt-3  items-end phone:col-span-12 phone:gap-3 phone:justify-between phone:flex-wrap phone:grid phone:grid-cols-12 phone:mt-3">
                                <input type="text" onkeyup="baocao_search(this), baocao_search_chuacodoanhthu(this)" id="search" class=" phone:col-span-8 phone:w-full w-[300px] text-left appearance-none block border-b border-[#f568e3]  px-4 pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-white" placeholder="Tìm tên HH/DV" autocomplete="off">
                                <select onchange="load_baocao_hanghoa_dichvu()" class="phone:col-span-4 phone:w-full mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-[white]" id="loai_filter" type="text">
                                    <option selected class='text-[#747474]' value="">Sắp xếp</option>
                                    <option class='text-black' value="doanhthu">Doanh thu</option>
                                    <option class='text-black' value="sl">Số lượng</option>
                                    <option class='text-black' value="laigop">Lãi gộp</option>
                                </select>
                                <select onchange="load_baocao_hanghoa_dichvu()" class="phone:col-span-6 phone:w-full mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-[white]" id="loai_baocao" type="text">
                                    <option selected class='text-black' value="HHDV">Theo hàng hóa</option>
                                    <option class='text-black' value="KHHH">Theo khách hàng</option>

                                </select>
                                <select onchange="load_baocao_hanghoa_dichvu()" class="phone:col-span-6 phone:w-full mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-[white]" id="list_chinhanh" type="text">
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
                        <div class="flex gap-7  laptop:col-span-12 laptop:justify-end laptop:mt-3 tablet:col-span-12 tablet:justify-between tablet:mt-3 items-center phone:col-span-12 phone:justify-between phone:mt-3">

                            <div style="display: flex;  border-radius: 5px; background-color: #e4fae9;">

                                <div id="tungay" class="input-group date flex items-center pl-4" data-date-format="dd/mm/yyyy">
                                    <p class="whitespace-nowrap">Từ ngày</p>
                                    <input id="tungay_input" data-date-format="dd/mm/yyyy" class="form-control text-center bg-transparent w-[120px]" type="text" value="<?= date('d/m/Y'); ?>"> <span class="input-group-addon"></span>
                                </div>
                                <div id="denngay" class="input-group date flex items-center" data-date-format="dd/mm/yyyy">
                                    <p class="whitespace-nowrap">Đến ngày</p>

                                    <input id="denngay_input" data-date-format="dd/mm/yyyy" class="form-control text-center bg-transparent w-[120px]" type="text" value="<?= date('d/m/Y'); ?>"> <span class="input-group-addon"></span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="py-3 overflow-scroll max-h-[600px]">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class=" px-4 py-2 text-center font-thin">#</th>
                                <th class=" px-4 py-2 text-left font-thin">Tên HH</th>
                                <th class=" px-4 py-2 font-thin text-right">Giá nhập</th>
                                <th class=" px-4 py-2 font-thin text-center">Số lượng</th>
                                <th class=" px-4 py-2 font-thin  text-right">Doanh thu</th>
                                <th class=" px-4 py-2 font-thin text-right">Lãi gộp</th>
                                <th class=" px-4 py-2 font-thin text-left" id="tenloai_baocao">Khách hàng</th>
                                <th class=" px-4 py-2 font-thin text-center">Độ tuổi</th>
                                <th class=" px-4 py-2 font-thin text-center">MSĐV</th>
                            </tr>
                        </thead>
                        <tbody id='chitiet_baocao' class="0 ">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mb-2 bg-[#ffffff36] rounded shadow-sm w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-2 items-center phone:grid phone:grid-cols-12 tablet:grid tablet:grid-cols-12 laptop:grid laptop:grid-cols-12 border-b border-[#ffffff40]">
                        <div class="w-full flex justify-between items-center phone:grid phone:grid-cols-12 tablet:grid tablet:grid-cols-12 phone:col-span-12 phone:text-center tablet:col-span-12 tablet:text-center laptop:col-span-12 laptop:justify-between gap-5 phone:gap-3">
                            <p class="text-lg text-[#83ff00] phone:col-span-8 phone:text-start tablet:col-span-8 tablet:text-start">Báo cáo hàng hóa, dịch vụ chưa có doanh thu</p>
                            <button type="button" onclick="open_add_ctkm()" class="bg-[green] phone:col-span-4 tablet:col-span-4 border-none px-5 py-2 text-white rounded-md ">Tạo CTKM</button>
                        </div>
                    </div>

                </div>
                <div class="py-3 overflow-scroll max-h-[600px]">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class=" px-4 py-2 text-center font-thin">#</th>
                                <th class=" px-4 py-2 font-thin text-left">Dịch vụ</th>
                                <th class=" px-4 py-2 font-thin text-center">MSĐV</th>
                            </tr>
                        </thead>
                        <tbody id='chitiet_baocao_chuacodoanhthu' class="0 ">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</main>
<!-- Form add voucher-->
<div class="relative z-10 hidden" id="form_add_ctkm" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal !text-[green]" id="exampleModalLabel">
                            Thêm mới CTKM
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_ctkm')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4  " data-te-modal-body-ref>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Tên CTKM</p>
                            <input id="ten_ctkm_add" class='col-span-8  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">% Giảm</p>
                            <input id="ptgiam_ctkm_add" onkeyup="_ChangeFormat(this) " class='col-span-8  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
                        </div>

                        <div id="handung_tungay" class="input-group date grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Từ ngày</p>
                            <input id="handung_tungay_input" class=" col-span-8 form-control border-b px-2  border-[#ddd] text-start bg-transparent " type="text" data-date-format="dd/mm/yyyy" value="<?= date('d/m/Y', strtotime('+30 day', strtotime(date('Y-m-d')))); ?>"> <span class="input-group-addon"></span>
                        </div>
                        <div id="handung_denngay" class="input-group date grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Đến ngày</p>
                            <input id="handung_denngay_input" class=" col-span-8 form-control border-b px-2  border-[#ddd] text-start bg-transparent " type="text" data-date-format="dd/mm/yyyy" value="<?= date('d/m/Y', strtotime('+30 day', strtotime(date('Y-m-d')))); ?>"> <span class="input-group-addon"></span>
                        </div>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <button type="button" id='btn_chi' onclick="add_ctkm()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_add_ctkm')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(async function() {
        load_baocao_hanghoa_dichvu()

    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var dateToday = new Date();
        $("#tungay input, #denngay input,#handung_tungay input, #handung_denngay input").datepicker({
            autoclose: true,
            todayHighlight: true,
        }).on('changeDate', function() {
            load_baocao_hanghoa_dichvu()
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
<script type="text/javascript" src="vendor/js/baocao.js?v=<?= md5_file('vendor/js/baocao.js') ?>"></script>