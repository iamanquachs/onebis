<?php if (isset($_COOKIE['msdv']) != '' && $_COOKIE['msdn'] != '' && $_COOKIE['mshs'] != '') { ?>
    <main class="bg-[#f1fafe] flex-1 overflow-hidden">
        <style>
            #banner_home {
                background-position: 50%;
                background-size: cover;
                height: 300px;
                background-image: url(vendor/img/banner.png);
                position: relative;
            }

            #banner_home_title {
                position: absolute;
                color: #fff;
                z-index: 2;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
        </style>

        <div id="banner_home" class="relative">
            <div id="banner_home_title" class="">
                <p class="text-white text-6xl phone:text-3xl text-center w-full uppercase tracking-[5px] whitespace-nowrap"><?= $_COOKIE['tendv'] ?></p>
                <p class="text-white text-xl mt-5  text-center w-full">onebis © by <a target="_blank" href="https://tpsoftct.vn/">TPSoft</a></p>
            </div>
        </div>
        <div class="flex items-center justify-center my-4 mt-5">
            <div class="max-w-full h-[50px] min-w-[400px] border-b pb-10  border-[#ddd] flex justify-center"><img class="max-w-full h-[50px] pb-3" src="vendor/img/logo_tps.svg" alt=""></div>
        </div>
        <div id="item_home" class="flex w-full justify-center gap-36 my-6 phone:gap-5">
            <?php
            foreach ($load_home as $e) { ?>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        animateNumber(<?= $e->sl ?>, 10, Math.round(Number(<?= $e->sl ?>) / 2), function(number) {
                            const formattedNumber = number.toLocaleString()
                            document.getElementById('<?= $e->color ?>').innerText = formattedNumber
                        })
                    })
                </script>
                <div class=" flex justify-center">
                    <div class="flex-row items-center justify-center">
                        <?php if ($e->loai  == 'Sinh nhật') { ?>
                            <div onclick="move_to_list_khachhang()" class="hover:cursor-pointer h-[160px] w-[160px] phone:w-[100px] phone:h-[100px] bg-[<?= $e->color ?>] rounded-full flex items-center justify-center">
                                <p id="<?= $e->color ?>" class="py-2 text-center text-[35px] text-white">0</p>
                            </div>
                            <p class="text-lg mt-3 text-center"><?= $e->loai ?></p>
                        <?php } else { ?>
                            <div class="h-[160px] w-[160px] phone:w-[100px] phone:h-[100px] bg-[<?= $e->color ?>] rounded-full flex items-center justify-center">
                                <p id="<?= $e->color ?>" class="py-2 text-center text-[35px] text-white">0</p>
                            </div>
                            <p class="text-lg mt-3 text-center"><?= $e->loai ?></p>
                    </div>
                </div>
            <?php } ?>
        <?php
            }
        ?>
        </div>

    </main>
    <?php
    $ktra_hethan = ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'ganhethan');
    $Ktr_QLTK = ktra_qltk($_COOKIE['mshs'], $_COOKIE['msdv'], 'QLTK');

    if (count($ktra_hethan) > 0) {
    ?>
        <!-- Form thông báo gần hết hạn  -->
        <div class="relative z-10 " id="form_thongbao_ganhethan" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full justify-center  text-center items-center sm:p-0">
                    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-3xl">
                        <div class="bg-white">
                            <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                <!--Modal title-->
                                <h5 class="text-xl font-medium leading-normal text-[red]" id="exampleModalLabel">
                                    Thông báo sắp hết hạn sử dụng
                                </h5>
                                <!--Close button-->
                                <button type="button" onclick="close_modal('form_thongbao_ganhethan')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                                    <img src="vendor/img/cancel.png">
                                </button>
                            </div>
                            <!--Modal body-->
                            <div data-te-modal-body-ref class="px-4">
                                <p class="font_semi  px-4 py-2 text-lg">Kính gửi: Quý khách hàng</p>
                                <p class="px-4 py-2 text-center  text-lg leading-8">TPSoft trân trọng thông báo thời hạn sử dụng bản quyền phần mềm của Quý khách sắp hết hạn. Để đảm bảo phần mềm hoạt động liên tục.</p>
                                <p class="py-2 text-center  text-lg">TPSoft rất vinh dự khi được tiếp tục phục vụ quý khách tại nút "Gia hạn" bên dưới.</p>
                                <div>
                                    <table class="min-w-full bg-[#ffdcfc] my-2  rounded-md">
                                        <thead>
                                            <tr class="text-black border-b border-dashed border-[#ddd]">
                                                <th class="font-thin text-center px-4 py-2 ">Kích hoạt</th>
                                                <th class="font-thin text-center px-4 py-2 ">Số năm</th>
                                                <th class="font-thin text-center px-4 py-2 ">Số tháng KM</th>
                                                <th class="font-thin text-center px-4 py-2 ">Hết hạn</th>
                                                <th class="font-thin text-right px-4 py-2 ">Số tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody id='list_nhatky_giahan' class="list_nhatky_giahan">

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                            <button onclick="open_giahan()" type="button" class="inline-flex w-full justify-center items-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 sm:ml-3 max-w-[100px] ">Gia hạn</button>
                            <button type="button" onclick="close_modal('form_thongbao_ganhethan')" class=" inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form gia hạn  -->

    <?php }
    if ($Ktr_QLTK[0]->giatri == 1) {
    ?>
        <!-- Form thông báo gần hết hạn sản phẩm  -->
        <div class="relative z-10 hidden" id="form_hanhoa_hethang_vuotdinhmuc" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full justify-center  text-center items-center sm:p-0">
                    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-3xl">
                        <div class="bg-white">
                            <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                <!--Modal title-->
                                <h5 class="text-xl font-medium leading-normal text-[red]" id="exampleModalLabel">
                                    Chú ý
                                </h5>
                                <!--Close button-->
                                <button type="button" onclick="close_modal('form_hanhoa_hethang_vuotdinhmuc')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                                    <img src="vendor/img/cancel.png">
                                </button>
                            </div>
                            <!--Modal body-->
                            <div data-te-modal-body-ref class="px-4">
                                <div id="form_hanghoa_hethan" class="hidden bg-[#ffa8052b] my-3 rounded-lg">
                                    <p class="ml-3  pt-3 text-center">Hàng hóa sắp hết hạn</p>

                                    <table class="min-w-full  my-2">
                                        <thead>
                                            <tr class="text-black border-b border-dashed border-[#cbcbcb]">
                                                <th class="font_semi text-center px-4 py-2 ">#</th>
                                                <th class="font_semi text-start px-4 py-2 ">Hàng hóa</th>
                                                <th class="font_semi text-center px-4 py-2 ">Hạn dùng</th>
                                            </tr>
                                        </thead>
                                        <tbody id='list_hanghoa_hethan' class="">

                                        </tbody>
                                    </table>
                                </div>
                                <div id="form_hanghoa_vuotdinhmuc" class="hidden bg-[#f7e0ff] rounded-lg">
                                    <p class="ml-3  pt-3  text-center">Hàng hóa vượt định mức tồn tối thiểu</p>
                                    <table class="min-w-full  my-2">
                                        <thead>
                                            <tr class="text-black border-b border-dashed border-[#cbcbcb]">
                                                <th class="font_semi text-center px-4 py-2 ">#</th>
                                                <th class="font_semi text-center px-4 py-2 ">Hàng hóa</th>
                                                <th class="font_semi text-center px-4 py-2 ">Định mức</th>
                                                <th class="font_semi text-center px-4 py-2 ">Tồn kho</th>
                                            </tr>
                                        </thead>
                                        <tbody id='list_hanghoa_vuotdinhmuc' class="">

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">

                            <button type="button" onclick="close_modal('form_hanhoa_hethang_vuotdinhmuc')" class=" inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form gia hạn  -->

    <?php } ?>
    <div class="relative z-10 hidden" id="form_giahan" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full justify-center  text-center items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-2xl">
                    <div class="bg-white">
                        <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                            <!--Modal title-->
                            <h5 class="text-xl font-medium leading-normal text-[green]" id="exampleModalLabel">
                                Gia hạn <span class="mr-4 uppercase" id="tendv_giahan"></span>
                            </h5>
                            <!--Close button-->
                            <button type="button" onclick="close_modal('form_giahan')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                                <img src="vendor/img/cancel.png">
                            </button>
                        </div>
                        <!--Modal body-->
                        <div data-te-modal-body-ref class=" max-h-[700px] overflow-x-hidden">
                            <div class="px-3">
                                <table class="min-w-full bg-[#ffdcfc] mt-2  rounded-md">
                                    <thead>
                                        <tr class="text-black border-b border-dashed border-[#ddd]">
                                            <th class="font-thin text-center px-4 py-2">#</th>
                                            <th class="font-thin text-left px-4 py-2">Chương trình khuyến mãi</th>
                                            <th class="font-thin text-right px-4 py-2 ">Giá/năm</th>
                                            <th class="font-thin text-center px-4 py-2 ">Tặng (tháng)</th>
                                            <th class="font-thin text-center px-4 py-2 ">...</th>
                                        </tr>
                                    </thead>
                                    <tbody id='list_ctkm' class="">

                                    </tbody>
                                </table>
                            </div>
                            <div class="relative p-4">
                                <div class="grid grid-cols-12">
                                    <div class="col-span-5 w-full">
                                        <input hidden class="tenkh_chuyenkhoan" value="<?= $_COOKIE['msdv'] ?>">
                                        <div id="" class="w-full md:w-full px-3 pb-4 ">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="dongia_add_giahan">
                                                Giá/năm
                                            </label>
                                            <input class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight text-lg  focus:outline-none focus:bg-white " id="dongia_add_giahan" type="text" autocomplete="off">
                                        </div>
                                        <div id="" class="w-full md:w-full px-3 pb-4 ">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="sonam_add_giahan">
                                                Số năm gia hạn
                                            </label>
                                            <input onkeyup="load_ctkm('1')" class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight text-lg  focus:outline-none focus:bg-white " id="sonam_add_giahan" type="text" autocomplete="off">
                                        </div>
                                        <div id="" class="w-full md:w-full px-3 pb-4 ">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="khuyenmai_add_giahan">
                                                Tặng (tháng)
                                            </label>
                                            <input class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 text-lg  leading-tight focus:outline-none focus:bg-white " id="khuyenmai_add_giahan" type="text" readonly>
                                        </div>
                                        <div id="" class="w-full md:w-full px-3 pb-4 ">
                                            <label class="sotien_chuyenkhoan block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="thanhtien_add_giahan">
                                                Thành tiền
                                            </label>
                                            <input class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight text-[red] text-lg font_semi  focus:outline-none focus:bg-white " id="thanhtien_add_giahan" type="text" readonly>
                                        </div>
                                    </div>
                                    <div class="col-span-7">
                                        <div class="w-full h-auto mt-5 flex-col justify-center items-center">
                                            <div id="qr-code" class="flex justify-center"></div>
                                            <p class="text-center mt-3 text-[red]" id="title_qr_thanhtoan"></p>
                                        </div>
                                        <div class="mt-5">
                                            <p class='text-[red] text-center'>Quét QR thanh toán để gia hạn ngay</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                        <input id='mshs_dv_giahan' hidden>
                        <input id='msdv_dv_giahan' hidden>
                        <button onclick="giahan_donvi()" type="button" class="inline-flex w-full justify-center items-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 sm:ml-3 max-w-[100px] ">Lưu</button>
                        <button type="button" onclick="close_modal('form_giahan')" class=" inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else {
} ?>
<script>
    $(document).ready(async function() {
        load_nhatky_giahan()
        load_hanghoa_hethan_vuotdinhmuc('hethan')
        load_hanghoa_hethan_vuotdinhmuc('vuotdinhmuc')
    })
</script>
<script>
    function animateNumber(finalNumber, delay, startNumber, callback) {
        let currentNumber = startNumber
        const interval = window.setInterval(updateNumber, delay)

        function updateNumber() {
            if (currentNumber >= finalNumber) {
                clearInterval(interval)
            } else {
                currentNumber++
                callback(currentNumber)
            }
        }
    }
</script>