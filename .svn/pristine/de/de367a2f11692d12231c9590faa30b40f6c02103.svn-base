<main class="bg_main ">

    <div class="flex flex-col">
        <!--Grid Form-->
        <div class="flex flex-1  flex-col md:flex-row lg:flex-row ">
            <div class="mb-2 w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-2 items-center tablet:grid tablet:grid-cols-12 bg-[#ffffff36] rounded-md  phone:grid phone:grid-cols-12 ">
                        <div class="tablet:col-span-12 tablet:text-center whitespace-nowrap phone:col-span-12 phone:text-center flex justify-between items-center tablet:grid tablet:grid-cols-12 phone:grid phone:grid-cols-12 gap-5 phone:gap-3">
                            <p class="text-lg text-[#83ff00]  tablet:col-span-12 tablet:text-center whitespace-nowrap phone:col-span-12 phone:text-center">Hoạt động kinh doanh</p>
                            <div class="flex gap-5   tablet:col-span-12 tablet:justify-between tablet:mt-3  items-end phone:col-span-12 phone:gap-3 phone:justify-between phone:flex-wrap phone:grid phone:grid-cols-12 phone:mt-3">
                                <input type="text" onkeyup="baocao_search(this)" id="search" class="phone:col-span-7 phone:w-full w-[300px] tablet:w-[400px] text-left appearance-none block border-b border-[#f568e3]  px-4 pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-white" placeholder="Tìm số phiếu, người lập" autocomplete="off">
                                <select onchange="load_baocao_hoatdong()" class="phone:col-span-5 phone:w-full mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-[white]" id="list_chinhanh" type="text">
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

                        <div class="flex gap-5  tablet:col-span-12 tablet:justify-between tablet:mt-3 phone:col-span-12 phone:justify-between phone:mt-3  items-center">

                            <div style="display: flex;  border-radius: 5px; background-color: #e4fae9;">
                                <div id="tungay" class="input-group date flex items-center pl-4" data-date-format="dd/mm/yyyy">
                                    <p class="whitespace-nowrap">Từ ngày</p>
                                    <input id="tungay_input" data-date-format="dd/mm/yyyy" class="form-control text-center bg-transparent phone:w-[120px]" type="text" value="<?= date('d/m/Y', strtotime('-7 day', strtotime(date('Y-m-d')))); ?>"> <span class="input-group-addon"></span>
                                </div>
                                <div id="denngay" class="input-group date flex items-center" data-date-format="dd/mm/yyyy">
                                    <p class="whitespace-nowrap">Đến ngày</p>
                                    <input id="denngay_input" data-date-format="dd/mm/yyyy" class="form-control text-center bg-transparent phone:w-[120px]" type="text" value="<?= date('d/m/Y'); ?>"> <span class="input-group-addon"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="curve_chart" class="bg-transparent w-full h-[350px] pt-2 overflow-hidden"></div>

                <div class="grid grid-cols-12 mt-5">
                    <div class="col-span-12 overflow-hidden">
                        <div class="flex justify-end mr-3">
                            <select onchange="chart_baocao_hoatdong_theonam()" class="text-[#83ff00] rounded-sm bg-transparent border-b border-[#f568e3] focus:outline-none pb-2 mb-3 ml-3" id="list_namhoatdong" type="text">
                            </select>
                        </div>
                        <div id="chart_div" class="min-h-[300px]"></div>
                    </div>
                    <div class="col-span-12 overflow-hidden mt-3">

                        <div id="chart_cautruc" class="min-h-[300px]"></div>
                    </div>
                    <div class="py-3 col-span-12  overflow-x-scroll max-h-[500px] overflow-y-scroll ml-2">
                        <table class="min-w-full">
                            <thead>
                                <tr class="text-[#efbff5] text-lg">
                                    <th class=" px-4 py-2 text-center font-thin">#</th>
                                    <th class=" px-4 py-2 text-center font-thin">Ngày</th>
                                    <th class=" px-4 py-2 font-thin text-center">Số phiếu</th>
                                    <th class=" px-4 py-2 font-thin text-center">Người lập</th>
                                    <th class=" px-4 py-2 font-thin  text-right">Doanh thu</th>
                                    <th class=" px-4 py-2 font-thin text-right">Chi phí</th>
                                    <th class=" px-4 py-2 font-thin text-center">MSĐV</th>
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
        await google.charts.load('current', {
            'packages': ['corechart'],
        });
        await load_namhoatdong()
        await load_baocao_hoatdong()
        chart_baocao_hoatdong()
        chart_baocao_hoatdong_theonam()
        chart_baocao_hoatdong_cautruc_chiphi()
    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var dateToday = new Date();
        $("#tungay input, #denngay input").datepicker({
            autoclose: true,
            todayHighlight: true,
        }).on('changeDate', async function() {
            await chart_baocao_hoatdong('<?= $_GET['soct'] ?>')
            load_baocao_hoatdong('<?= $_GET['soct'] ?>')
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