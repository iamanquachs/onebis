<main class="bg_main">
    <!--Grid Form-->
    <div class="relative">

        <div class="w-full flex justify-center pt-2 mb-10 phone:mb-4">
            <p class="text-center text-[#d19cd1] text-lg rounded-full bg-[#470441] py-1 px-3">Chúng tôi ứng dụng Trí tuệ nhân tạo (AI) nhằm phục vụ cho công việc kinh doanh của bạn</p>
        </div>
        <div class=" rounded shadow-sm w-full">
            <div class="fullscreen:hidden laptop:hidden tablet:hidden flex items-center justify-between">
                <img onclick="open_nhatky()" src='vendor/img/arrow_to_right.png'>
                <img onclick="open_xuhuong()" src='vendor/img/arrow_to_left.png'>
            </div>
            <div id="modal_nhatky" class="absolute top-0 left-0 h-screen w-full flex hidden fullscreen:hidden laptop:hidden tablet:hidden ">
                <div class="w-[70%] h-screen bg-white z-[102]">

                    <div class="tablet:hidden mt-6 px-4">
                        <div class="flex items-center justify-between border-b border-[#ffffff40] pb-2">

                            <p class=" text-lg font-semi text-black">Nhật ký</p>
                            <?php
                            $soct = 'AI' . date("dmyHis", time()) . rand(1000, 9999);
                            ?>
                            <p onclick="new_chat('<?= $_GET['soct'] ?>','<?= $soct ?>')" class="hover:cursor-pointer text-center  rounded-lg text-lg text-black py-0 px-4 flex items-center gap-3"><img class="min-w-[20px] max-w-[20px]" src="vendor/img/add.png"> Chủ đề mới</p>
                            <div class="flex justify-end">
                                <img onclick="hidden_nhatky()" src='vendor/img/cancel.png'>
                            </div>
                        </div>
                        <ul id="list_lichsu_mobile">

                        </ul>
                    </div>
                </div>
            </div>
            <div id="modal_xuhuong" class="absolute top-0 left-0 h-screen w-full flex flex-row-reverse hidden fullscreen:hidden laptop:hidden tablet:hidden ">
                <div class="w-[70%] h-screen bg-white z-[102]">

                    <div class="tablet:hidden mt-6 px-4 ">
                        <div class="flex justify-between">
                            <div>
                                <img onclick="hidden_xuhuong()" src='vendor/img/cancel.png'>
                            </div>
                            <p class="border-b border-[#ffffff40] pb-2 text-lg font-semi text-black">Xu hướng</p>
                        </div>
                        <div id="list_goiy_mobile" class="flex flex-wrap gap-6 mt-7"></div>
                    </div>


                </div>
            </div>
        </div>

        <div class="fixed left-0 right-0 mt-5 h-full w-full grid grid-cols-12 justify-between  overflow-hidden">
            <div id="form_nhatky" class="col-span-4 laptop:col-span-3 tablet:col-span-1 phone:col-span-1 h-full rounded-lg p-3 py-0 mr-24 laptop:mr-14 tablet:mr-0 tablet:relative phone:mr-0 phone:relative phone:hidden">
                <div id="nhatky" class="tablet:hidden phone:hidden">
                    <div class="flex items-center justify-between border-b border-[#ffffff40] pb-2">
                        <p class=" text-lg font-semi text-white">Nhật ký</p>
                        <?php
                        $soct = 'AI' . date("dmyHis", time()) . rand(1000, 9999);
                        ?>
                        <p onclick="new_chat('<?= $_GET['soct'] ?>','<?= $soct ?>')" class="hover:cursor-pointer text-center  rounded-lg text-lg text-white py-0 px-4 flex items-center gap-3"><img class="min-w-[20px] max-w-[20px]" src="vendor/img/add.png"> Chủ đề mới</p>
                        <input hidden id="tenchude_add">
                    </div>
                    <ul id="list_lichsu">

                    </ul>
                </div>
                <div id="icon_show_nhatky" onclick="show_nhatky(this)" class="fullscreen:hidden laptop:hidden absolute top-[50%] left-0"><img src='vendor/img/arrow_to_right.png'></div>
                <div id="icon_hide_nhatky" onclick="hide_nhatky(this)" class="fullscreen:hidden laptop:hidden absolute top-[50%] right-0 hidden"><img src='vendor/img/arrow_to_left.png'></div>
            </div>
            <div id="form_chat" class="col-span-4 laptop:col-span-6  tablet:col-span-10  phone:col-span-12 z-[99] overflow-scroll max-h-[85%] phone:max-h-[81%] tablet:max-h-[85%]">
                <div id="item_send" class=" text-white text-lg w-full px-5 max-h-[88%] phone:max-h-[81%] tablet:max-h-[85%] overflow-scroll">
                </div>
            </div>
            <div id="form_xuhuong" class="col-span-4 laptop:col-span-3  tablet:col-span-1 phone:col-span-1 phone:hidden h-full p-3 ml-24 laptop:ml-14 tablet:ml-0 phone:ml-0 py-0 tablet:relative phone:mr-0 phone:relative">
                <div id="xuhuong" class="tablet:hidden phone:hidden">
                    <p class="border-b border-[#ffffff40] pb-2 text-lg font-semi text-white">Xu hướng</p>
                    <div id="list_goiy" class="flex flex-wrap gap-6 mt-7"></div>
                </div>
                <div id="icon_show_xuhuong" onclick="show_xuhuong(this)" class="fullscreen:hidden laptop:hidden absolute top-[50%] right-0"><img src='vendor/img/arrow_to_left.png'></div>
                <div id="icon_hide_xuhuong" onclick="hide_xuhuong(this)" class="fullscreen:hidden laptop:hidden absolute top-[50%] left-0 hidden"><img src='vendor/img/arrow_to_right.png'></div>

            </div>
        </div>
        <div class="fixed bottom-0  left-0 right-0  items-center h-[80px] z-[101] ">
            <div class="w-full h-full flex items-center justify-center" style="background: linear-gradient(190deg, rgba(38,2,65,1) 0%, rgba(59,3,54,1) 50%, rgba(0,0,0,1) 100%)  !important;">
                <div class="max-w-[700px] laptop:max-w-[600px] tablet:max-w-[600px] phone:max-w-[360px] w-full ">
                    <div class="relative">
                        <input type="text" name="q" id="value_send" class=" border border-[#ddd] w-full h-12 p-4 rounded-full focus:outline-none text-lg" placeholder="Hôm nay tôi giúp gì được cho bạn?" autocomplete="off">
                        <div class="flex gap-3 absolute top-[10px] right-3">
                            <span class=" rounded-full bg-[red] text-white h-7 w-10 text-center text-lg" id="soluong_tinnhan"></span>
                            <div id="btn_submit">
                                <button onclick="call_chatgpt('<?= $_COOKIE['tendv'] ?>', '<?= $_GET['soct'] ?>')">
                                    <img class="text-teal-400 h-5 w-5  fill-current min-w-[24px] min-h-[24px] rotate-[-90deg]" src='vendor/img/arrow_right.png'>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</main>
<!-- Form loading-->
<div class="relative z-10 hidden" id="loading_icon" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0  bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full  justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative flex justify-center transition-all sm:my-8 sm:w-full max-w-md">
                <img class='w-[100px] bg-white rounded-lg' src='vendor/img/loading.svg'>
            </div>
        </div>
    </div>
</div>
<!-- Form hết số lần -->
<div class="relative z-10 hidden" id="form_soluong" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full  justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[red]'>Thông báo</p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_soluong')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 " data-te-modal-body-ref>
                        <p id="" class="text-center text-lg">Đã dùng hết tài nguyên</p>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">

                    <button type="button" onclick="close_modal('form_soluong')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form xoa -->
<div class="relative z-10 hidden" id="form_delete_chude" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full  justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[red]'>Xóa chủ đề</p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_delete_chude')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 " data-te-modal-body-ref>
                        <p id="tenchude_delete" class="text-center text-lg"></p>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="soct_delete">
                    <button type="button" onclick="delete_chude('<?= $_GET['soct'] ?>')" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-600 px-5 py-2 text-[14px]  text-white shadow-sm  hover:bg-red-500 sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_delete_chude')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var btn_submit = document.querySelector("#value_send");
    btn_submit.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            call_chatgpt('<?= $_COOKIE['tendv'] ?>', '<?= $_GET['soct'] ?>')
        }
    });
    $(document).ready(function() {
        load_lichsu('<?= $_GET['soct'] ?>')
        load_chitiet_lichsu('<?= $_COOKIE['tendv'] ?>', '<?= $_GET['soct'] ?>')
        load_soluong_tinnhan()
        load_goiy('<?= $_COOKIE['tendv'] ?>', '<?= $_GET['soct'] ?>')
    })
</script>
<script type="text/javascript" src="vendor/js/chatgpt.js?v=<?= md5_file('vendor/js/chatgpt.js') ?>"></script>