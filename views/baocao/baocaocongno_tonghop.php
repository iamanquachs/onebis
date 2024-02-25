<main class="bg_main ">

    <div class="flex flex-col">
        <!--Grid Form-->
        <div class="flex flex-1  flex-col md:flex-row lg:flex-row ">
            <div class="mb-2 w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-2 items-center  tablet:grid tablet:grid-cols-12 laptop:grid laptop:grid-cols-12 laptop:items-end laptop:justify-between laptop:gap-5 phone:grid phone:grid-cols-12 bg-[#ffffff36] rounded-md ">
                        <div class="flex gap-3 items-center laptop:col-span-4 tablet:col-span-12 tablet:justify-center phone:col-span-12 phone:justify-center phone:grid phone:grid-cols-12">
                            <p class="text-lg text-[#83ff00] tablet:col-span-12 tablet:text-center phone:col-span-12 phone:text-center whitespace-nowrap">Tổng hợp công nợ <span id="loaicongno">
                                    <?php
                                    $loai = $_GET['soct'];
                                    if ($loai == 'Receivable') {
                                        echo 'phải thu';
                                    } else {
                                        echo 'phải trả';
                                    }
                                    ?>
                                </span></p>
                            <input type="text" onkeyup="baocao_search(this)" id="search" class=" tablet:col-span-12 tablet:justify-center phone:col-span-12 phone:justify-center w-[300px] phone:w-full text-left appearance-none block border-b border-[#f568e3]  px-4 pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-white" placeholder="Tìm SĐT, tên" autocomplete="off">
                        </div>

                        <div class="flex gap-5 laptop:col-span-3 tablet:col-span-12 tablet:justify-between tablet:mt-3 phone:w-full phone:col-span-12 phone:gap-0 phone:justify-between phone:mt-3   items-end hidden">
                            <?php
                            $loai = $_GET['soct'];
                            if ($loai == 'Receivable') { ?>
                                <select onchange="load_baocao_congno_tonghop('<?= $_GET['soct'] ?>')" class=" mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-[white]" id="list_ncc_filter" type="text">
                                </select>
                            <?php
                            } else { ?>
                                <select onchange="load_baocao_congno_tonghop('<?= $_GET['soct'] ?>')" class=" mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-[white]" id="list_khachhang_filter" type="text">
                                </select>
                            <?php }
                            ?>
                        </div>
                        <div class="flex gap-5 laptop:col-span-8 tablet:col-span-12 tablet:justify-between tablet:mt-3 phone:col-span-12 phone:justify-between phone:mt-3 phone:grid phone:grid-cols-12 laptop:grid laptop:grid-cols-12 laptop:items-end items-center laptop:ml-3">
                            <select onchange="load_baocao_congno_tonghop()" class="laptop:col-span-4 phone:col-span-12 mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-[white]" id="list_chinhanh" type="text">
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
                            <div style="display: flex;  border-radius: 5px; background-color: #e4fae9;" class="phone:col-span-10 laptop:col-span-6 laptop:justify-between">
                                <div id="tungay" class="input-group date flex items-center pl-4" data-date-format="dd/mm/yyyy">
                                    <p class="whitespace-nowrap">Từ ngày</p>
                                    <input id="tungay_input" data-date-format="dd/mm/yyyy" o class="form-control text-center bg-transparent phone:w-[90px] laptop:w-[100px]" type="text" value="<?= date('d/m/Y'); ?>"> <span class="input-group-addon"></span>
                                </div>
                                <div id="denngay" class="input-group date flex items-center" data-date-format="dd/mm/yyyy">
                                    <p class="whitespace-nowrap">Đến ngày</p>
                                    <input id="denngay_input" data-date-format="dd/mm/yyyy" class="form-control text-center bg-transparent phone:w-[90px] laptop:w-[100px]" type="text" value="<?= date('d/m/Y'); ?>"> <span class="input-group-addon"></span>
                                </div>
                            </div>
                            <div class="text-white phone:col-span-2 laptop:col-span-2">
                                <?php
                                $loai = $_GET['soct'];
                                if ($loai == 'Receivable') { ?>
                                    <button class="bg-[orange] px-3 phone:px-1 py-2 rounded-md">
                                        <a href='ReportCreditDetail/Receivable'>Chi tiết</a>
                                    </button>
                                <?php
                                } else { ?>
                                    <button class="bg-[orange] px-3 phone:px-1 py-2 rounded-md">
                                        <a href='ReportCreditDetail/Pay'>Chi tiết</a>
                                    </button>
                                <?php }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="py-3 overflow-x-scroll">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class=" px-4 py-2 text-center font-thin">#</th>
                                <?php
                                $loai = $_GET['soct'];
                                if ($loai == 'Receivable') {
                                    echo '<th class=" px-4 py-2 font-thin text-left">Khách hàng</td>
                                    
                                    ';
                                } else {
                                    echo '<th class=" px-4 py-2 font-thin text-left">Nhà cung cấp</td>
                                        ';
                                }
                                ?>
                                <th class=" px-4 py-2 font-thin text-right">Nợ đầu kỳ</th>
                                <th class=" px-4 py-2 font-thin text-right">Phát sinh</th>
                                <th class=" px-4 py-2 font-thin text-right">Đã thanh toán</th>
                                <th class=" px-4 py-2 font-thin text-right">Nợ trong kỳ</th>
                                <th class=" px-4 py-2 font-thin text-right">Nợ cuối kỳ</th>
                                <th class=" px-4 py-2 font-thin text-center">MSDV</th>
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


<script>
    $(document).ready(async function() {
        load_baocao_congno_tonghop(
            '<?= $_GET['soct'] ?>'
        )



    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var dateToday = new Date();
        $("#tungay input, #denngay input").datepicker({
            autoclose: true,
            todayHighlight: true,
        }).on('changeDate', function() {
            load_baocao_congno_tonghop('<?= $_GET['soct'] ?>')
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