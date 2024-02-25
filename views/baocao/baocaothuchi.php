<main class="bg_main ">

    <div class="flex flex-col">
        <!--Grid Form-->
        <div class="flex flex-1  flex-col md:flex-row lg:flex-row ">
            <div class="mb-2 w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-2 items-center tablet:grid tablet:grid-cols-12 phone:grid phone:grid-cols-12 laptop:grid laptop:grid-cols-12 bg-[#ffffff36] rounded-md ">
                        <p class="text-lg text-[#83ff00] tablet:col-span-12 tablet:text-center phone:col-span-12 phone:text-center whitespace-nowrap laptop:col-span-2">Báo cáo thu chi</p>
                        <div class="flex gap-7 tablet:col-span-12 tablet:justify-between tablet:mt-3 phone:col-span-12 phone:gap-3 phone:justify-between phone:flex-wrap phone:grid phone:grid-cols-12 phone:mt-3  items-end laptop:col-span-10 laptop:grid laptop:grid-cols-12">
                            <input type="text" onkeyup="baocao_search(this)" id="search" class="w-[300px] laptop:col-span-5 laptop:w-full phone:col-span-8 phone:w-full text-left appearance-none block border-b border-[#f568e3]  px-4 pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-white" placeholder="Tìm người lập, ND, khoản, tên người Nộp/Nhận" autocomplete="off">
                            <select onchange="load_baocao_thuchi()" class="laptop:col-span-2 laptop:w-full phone:col-span-4 phone:w-full mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-[white]" id="list_nguoilap_filter" type="text">

                            </select>
                            <select onchange="load_baocao_thuchi()" class="laptop:col-span-2 laptop:w-full phone:col-span-6 phone:w-full mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-[white]" id="list_khoanmuc_filter" type="text">

                            </select>
                            <select onchange="load_baocao_thuchi()" class=" laptop:col-span-3 laptop:w-full phone:col-span-6 phone:w-full mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-[white]" id="list_chinhanh" type="text">
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
                        <div class="flex gap-7 tablet:col-span-12 tablet:justify-between tablet:mt-3 phone:col-span-12 phone:justify-between laptop:col-span-12 laptop:mt-3 laptop:justify-end phone:mt-3 items-center">

                            <div style="display: flex;  border-radius: 5px; background-color: #e4fae9;">

                                <div id="tungay" class="input-group date flex items-center pl-4" data-date-format="dd/mm/yyyy">
                                    <p class="whitespace-nowrap">Từ ngày</p>
                                    <input id="tungay_input" data-date-format="dd/mm/yyyy" onchange="load_baocao_thuchi()" class="phone:w-[120px] form-control text-center bg-transparent " type="text" value="<?= date('d/m/Y'); ?>"> <span class="input-group-addon"></span>
                                </div>
                                <div id="denngay" class="input-group date flex items-center" data-date-format="dd/mm/yyyy">
                                    <p class="whitespace-nowrap">Đến ngày</p>
                                    <input id="denngay_input" data-date-format="dd/mm/yyyy" onchange="load_baocao_thuchi()" class="phone:w-[120px] form-control text-center bg-transparent " type="text" value="<?= date('d/m/Y'); ?>"> <span class="input-group-addon"></span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="py-3 overflow-x-scroll">
                    <table class="min-w-full ">
                        <thead>
                            <tr class="text-[#efbff5] text-lg ">
                                <th class=" px-4 py-2 text-center font-thin">#</th>
                                <th class=" px-4 py-2 text-left font-thin">Ngày</th>
                                <th class=" px-4 py-2 font-thin text-left">Số CT</th>
                                <th class=" px-4 py-2 font-thin text-left">Người lập</th>
                                <th class=" px-4 py-2 font-thin  text-left">Nội dung</th>
                                <th class=" px-4 py-2 font-thin text-left">Khoản mục</th>
                                <th class=" px-4 py-2 font-thin text-left">Người (nộp/nhận)</th>
                                <th class=" px-4 py-2 font-thin text-center">Thu</th>
                                <th class=" px-4 py-2 font-thin text-center">Chi</th>
                                <th class=" px-4 py-2 font-thin text-center">Tồn</th>
                                <th class=" px-4 py-2 font-thin text-center">MSĐV</th>
                            </tr>
                        </thead>
                        <tbody id='chitiet_baocao' class="">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</main>


<script>
    $(document).ready(async function() {
        await load_khoanmuc()
        await load_nhanvien()
        load_baocao_thuchi()

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
<script type="text/javascript" src="vendor/js/baocao.js?v=<?= md5_file('vendor/js/baocao.js') ?>"></script>