<main class="bg_main">

    <div class="flex flex-col">
        <!--Grid Form-->
        <div class="flex flex-1  flex-col md:flex-row lg:flex-row ">
            <div class="mb-2 w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-2 items-center tablet:grid tablet:grid-cols-12 phone:grid phone:grid-cols-12 bg-[#ffffff36] rounded-md  laptop:grid laptop:grid-cols-12">
                        <div class=" tablet:col-span-12  tablet:grid tablet:grid-cols-12 tablet:gap-2 phone:col-span-12  phone:grid phone:grid-cols-12 phone:gap-2 flex gap-5 laptop:col-span-12 laptop:justify-start">
                            <p class="text-lg text-[#83ff00]  tablet:col-span-12 tablet:text-center phone:col-span-12 phone:text-center whitespace-nowrap">Báo cáo đánh giá</p>
                            <div class="flex gap-5   tablet:col-span-12 tablet:justify-between tablet:mt-3   phone:col-span-12 phone:justify-between phone:mt-3 phone:flex-wrap items-start phone:grid phone:grid-cols-12 ">
                                <input type="text" onkeyup="baocao_search(this)" id="search" class="w-[300px] phone:w-full text-left appearance-none block border-b border-[#f568e3]  px-4 pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-white" placeholder="Tìm số HĐ, tên" autocomplete="off">
                                <select onchange="baocao_hieuqua_nhanvien()" class="phone:col-span-5 phone:w-full mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-[white]" id="list_nguoilap_filter" type="text">

                                </select>
                                <select onchange="baocao_hieuqua_nhanvien()" class="phone:col-span-6 phone:w-full mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-[white]" id="list_danhgia_filter" type="text">
                                    <option selected class='text-black' value=''>Đánh giá</option>
                                    <option class='text-black' value='4RHL'>Rất hài lòng</option>
                                    <option class='text-black' value='3HL'>Hài lòng</option>
                                    <option class='text-black' value='2KHL'>Không hài lòng</option>
                                    <option class='text-black' value='1RKHL'>Rất không hài lòng</option>

                                </select>
                                <select onchange="baocao_hieuqua_nhanvien()" class="phone:col-span-6 phone:w-full mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-[white]" id="list_chinhanh" type="text">
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
                        <div class="flex gap-5 laptop:col-span-12 laptop:justify-end laptop:mt-3 tablet:col-span-12 tablet:justify-end  tablet:mt-3  phone:col-span-12 phone:justify-end  phone:mt-3  items-center">

                            <div style="display: flex;  border-radius: 5px; background-color: #e4fae9;">
                                <div id="tungay" class="input-group date flex items-center pl-4" data-date-format="dd/mm/yyyy">
                                    <p class="whitespace-nowrap">Từ ngày</p>
                                    <input id="tungay_input" data-date-format="dd/mm/yyyy" class=" phone:w-[120px] form-control text-center bg-transparent " type="text" value="<?= date('d/m/Y', strtotime('-7 day', strtotime(date('Y-m-d')))); ?>"> <span class="input-group-addon"></span>
                                </div>
                                <div id="denngay" class="input-group date flex items-center" data-date-format="dd/mm/yyyy">
                                    <p class="whitespace-nowrap">Đến ngày</p>
                                    <input id="denngay_input" data-date-format="dd/mm/yyyy" class="phone:w-[120px] form-control text-center bg-transparent " type="text" value="<?= date('d/m/Y'); ?>"> <span class="input-group-addon"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="chart_div" class="bg-transparent w-full h-[350px] pt-2 overflow-hidden phone:overflow-x-scroll"></div>

                <div class="grid grid-cols-12 mt-5">

                    <div class="py-3 col-span-12  overflow-x-scroll ml-2">
                        <table class="min-w-full">
                            <thead>
                                <tr class="text-[#efbff5] text-lg">
                                    <th class=" px-4 py-2 text-center font-thin">#</th>
                                    <th class=" px-4 py-2 text-center font-thin">Ngày thực hiện</th>
                                    <th class=" px-4 py-2 text-center font-thin">Ngày hoàn thành</th>
                                    <th class=" px-4 py-2 text-center font-thin">Thời gian</th>
                                    <th class=" px-4 py-2 text-left font-thin">Dịch vụ</th>
                                    <th class=" px-4 py-2 text-right font-thin">Lợi nhuận</th>
                                    <th class=" px-4 py-2 font-thin text-left">Khách hàng</th>
                                    <th class=" px-4 py-2 font-thin text-center">Nhân viên</th>
                                    <th class=" px-4 py-2 font-thin  text-center">...</th>
                                </tr>
                            </thead>
                            <tbody id='chitiet_baocao' class="0 ">

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

</main>


<script>
    $(document).ready(async function() {
        await google.charts.load("current", {
            packages: ["corechart"]
        });
        await load_nhanvien()
        baocao_hieuqua_nhanvien()
    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var dateToday = new Date();
        $("#tungay input, #denngay input").datepicker({
            autoclose: true,
            todayHighlight: true,
        }).on('changeDate', async function() {
            baocao_hieuqua_nhanvien()
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