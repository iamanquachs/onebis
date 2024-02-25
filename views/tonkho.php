<main class="bg_main">

    <div class="flex flex-col">
        <!--Grid Form-->
        <div class="flex flex-1  flex-col md:flex-row lg:flex-row ">
            <div class="mb-2 w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-2 items-center phone:grid phone:grid-cols-12 tablet:grid tablet:grid-cols-12 bg-[#ffffff36] rounded-md ">
                        <div class="flex gap-5 phone:grid phone:grid-cols-12  tablet:grid tablet:grid-cols-12  items-end phone:w-full phone:col-span-12 tablet:w-full tablet:col-span-12">
                            <p class="text-lg text-[#83ff00] phone:w-full phone:col-span-12 tablet:w-full tablet:col-span-12">Tồn kho</p>
                            <form onsubmit="return false;" class="phone:w-full phone:col-span-6 tablet:w-full tablet:col-span-6">
                                <input type="text" onkeyup="tonkho_search()" id="search" class="w-[300px] phone:w-full tablet:w-full text-left appearance-none block border-b border-[#f568e3]  px-4 pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[14px] text-white" placeholder="Tìm MSHH, Tên HH, Số lô" autocomplete="off">
                            </form>
                            <form onsubmit="return false;" class="phone:w-full phone:col-span-6 tablet:w-full tablet:col-span-6 flex text-white">
                                <input type="text" onkeyup="load_tonkho()" id="songayhethan" class="w-[50px] phone:w-full tablet:w-full text-left appearance-none block border-b border-[#f568e3]  px-4 pl-0 leading-tight focus:outline-none bg-transparent text-[14px] text-white" placeholder="Số ngày hết hạn" value="<?= $songayhethan[0]->giatri ?>" autocomplete="off">
                                <span class="pt-2 pl-1">ngày hết hạn</span>
                            </form>

                            <div class="phone:w-full phone:col-span-6 tablet:w-full tablet:col-span-6 flex text-white gap-3">
                                <input type="checkbox" onclick="load_tonkho()" id="vuotdinhmuc" class="w-[15px] accent-red-500">
                                <span>Vượt định mức</span>
                            </div>

                        </div>

                        <div class="flex items-center gap-5 phone:w-full phone:col-span-12 phone:mt-3 phone:justify-center tablet:w-full tablet:col-span-12 tablet:mt-3 tablet:justify-center">
                            <div class="phone:col-span-12">
                                <img onclick="load_tonkho()" id="img_load_tonkho" class="img_load_tonkho w-[24px] hover:cursor-pointer hover:opacity-1" src='vendor/img/wait32.png' title="Làm mới">
                            </div>
                            <select onchange="load_tonkho()" class="phone:col-span-12 mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-[white]" id="list_chinhanh" type="text">
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
                            <div style="display: flex;  border-radius: 5px; background-color: #e4fae9;" class="phone:w-full phone:justify-between  tablet:justify-center">
                                <div id="tungay" class="input-group date flex items-center pl-4" data-date-format="dd/mm/yyyy">
                                    <p class="whitespace-nowrap">Từ ngày</p>
                                    <input id="tungay_input" data-date-format="dd/mm/yyyy" class="form-control text-center bg-transparent phone:w-[100px]" type="text" value="<?= date('d/m/Y'); ?>"> <span class="input-group-addon"></span>
                                </div>
                                <div id="denngay" class="input-group date flex items-center" data-date-format="dd/mm/yyyy">
                                    <p class="whitespace-nowrap">Đến ngày</p>
                                    <input id="denngay_input" data-date-format="dd/mm/yyyy" class="form-control text-center bg-transparent phone:w-[100px]" type="text" value="<?= date('d/m/Y'); ?>"> <span class="input-group-addon"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="py-3 overflow-x-scroll">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class=" px-4 py-2 text-center font-thin">#</th>
                                <th class=" px-4 py-2 text-center font-thin">Hàng hóa</th>
                                <th class=" px-4 py-2 font-thin text-center">ĐVT</th>
                                <th class=" px-4 py-2 font-thin text-center">Số lô</th>
                                <th class=" px-4 py-2 font-thin  text-center">Hạn dùng</th>
                                <th class=" px-4 py-2 font-thin text-right">Giá nhập</th>
                                <th class=" px-4 py-2 font-thin text-right">Tồn đầu</th>
                                <th class=" px-4 py-2 font-thin text-right">GT Tồn đầu</th>
                                <th class=" px-4 py-2 font-thin text-right">Tổng nhập</th>
                                <th class=" px-4 py-2 font-thin text-right">GT Tổng nhập</th>
                                <th class=" px-4 py-2 font-thin text-right">Tổng xuất</th>
                                <th class=" px-4 py-2 font-thin text-right">GT Tổng xuất</th>
                                <th class=" px-4 py-2 font-thin text-right">Tồn cuối</th>
                                <th class=" px-4 py-2 font-thin text-right">GT Tồn cuối</th>
                                <th class=" px-4 py-2 font-thin text-right">Đặt hàng</th>
                                <th class=" px-4 py-2 font-thin text-center">MSĐV</th>
                            </tr>
                        </thead>
                        <tbody id='chitiet_tonkho' class="0 ">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</main>

<script>
    $(document).ready(async function() {
        load_tonkho()
    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var dateToday = new Date();
        $("#tungay input, #denngay input").datepicker({
            autoclose: true,
            todayHighlight: true,
        }).on('changeDate', function() {
            load_tonkho()
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
<script type="text/javascript" src="vendor/js/tonkho.js?v=<?= md5_file('vendor/js/tonkho.js') ?>"></script>