<main class="bg_main">
    <div class="flex flex-col">
        <!--Grid Form-->

        <div class="flex flex-1  flex-col md:flex-row lg:flex-row">
            <div class="mb-2 w-full">
                <div class="bg-[#ffffff36] rounded-md  px-2 py-3 ">
                    <div class="flex justify-between  items-center">
                        <div class="flex gap-5  items-center phone:grid phone:grid-cols-12">
                            <p class="text-lg text-[#83ff00] phone:col-span-12 phone:text-center">Tham số hệ thống</p>
                            <div class='flex phone:col-span-12'>
                                <div class="flex justify-center items-center">
                                    <div class=" xl:w-96">
                                        <div class="input-group relative flex gap-7 items-center w-full ">
                                            <input type="text" onkeyup="thamso_search()" id="search" class="w-[300px] mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-white" placeholder="Tìm tên tham số" aria-label="Search" aria-describedby="button-addon2" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="p-3 ">
                    <table class="min-w-full ">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class="font-thin text-center px-4 py-2">#</th>
                                <th class="font-thin text-left px-4 py-2">Tham số</th>
                                <th class="font-thin text-center px-4 py-2 ">Giá trị</th>
                                <th class="font-thin text-center px-4 py-2 ">...</th>
                            </tr>
                        </thead>
                        <tbody id='list_thamso' class="">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Form chỉnh sửa  -->
<div class="relative z-10 hidden" id="form_edit_thamso" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center  text-center items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-2xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[green]" id="exampleModalLabel">
                            Chỉnh <span class="mr-4 lowercase" id="tenthamso_edit"></span>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_edit_thamso')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div data-te-modal-body-ref class=" max-h-[700px] overflow-x-hidden">

                        <div class="relative flex-auto p-4 flex flex-wrap ">
                            <div id="form_list_bank" class="w-full md:w-full px-3 pb-4 hidden">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="find_bank">
                                    Ngân hàng
                                </label>
                                <input onkeyup="find_nganhang()" class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="find_bank" type="text">
                                <div id='list_nganhang' class="max-h-[300px] overflow-y-scroll hidden">

                                </div>
                            </div>
                            <div id="form_bin_bank" class="w-full md:w-full px-3 pb-4 ">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="giatrithamso_edit">
                                    Giá trị
                                </label>
                                <input class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="giatrithamso_edit" type="text">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input id='msthamso_edit' hidden>
                    <button onclick="edit_thamso()" type="button" class="inline-flex w-full justify-center items-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 sm:ml-3  sm:mt-0 max-w-[100px]">Lưu</button>
                    <button type="button" onclick="close_modal('form_edit_thamso')" class=" inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript" src="vendor/js/thamso.js?v=<?= md5_file('vendor/js/thamso.js') ?>"></script>

<script>
    $(document).ready(function() {
        load_thamso()
        load_nganhang()
    });
</script>