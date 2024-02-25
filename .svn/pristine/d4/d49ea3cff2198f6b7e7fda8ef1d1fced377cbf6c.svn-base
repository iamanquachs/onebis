<main class="bg_main ">
    <div class="flex flex-col">

        <!--Grid Form-->

        <div class="w-full">
            <div class="mb-3">
                <h2 id="title_dathen" class="text-white text-xl text-center bg-[#bf1818] hidden p-2  rounded-md">ĐẶT HẸN DỊCH VỤ</h2>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 bg-[#ffffff21] rounded-md ">
                    <div class=" rounded-md   shadow-sm w-full">
                        <div class="border-b border-[#a86ed4]  rounded-t-md  px-2 py-3 flex justify-between items-center text-[#83ff00] ">
                            Khách hàng
                        </div>
                        <div class=''>
                            <div class=" w-full gap-10 p-3">
                                <div class="w-full flex gap-16 tablet:gap-5 tablet:flex-wrap phone:gap-4 tablet:grid tablet:grid-cols-12 phone:grid phone:grid-cols-12">
                                    <input hidden id="loai_dathen">
                                    <input hidden id="mskh_add">
                                    <input hidden id="nhom_add">
                                    <input hidden id="ptgiam_load" value="0">
                                    <label class="w-1/6 tablet:col-span-3 tablet:w-full phone:w-full phone:col-span-6 flex gap-4 uppercase tracking-wide text-white text-xs   whitespace-nowrap">
                                        <div class="min-w-[20px] max-w-[20px] phone:hidden">
                                            <img src="vendor/img/call.png">
                                        </div>
                                        <input class="appearance-none phone:w-full  block w-4/5  text-white border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent  text-[16px]" id="dienthoai_add" type="text" readonly>
                                    </label>

                                    <label class="w-2/6 tablet:col-span-3 tablet:w-full phone:w-full phone:col-span-6  flex phone:pl-0 tablet:pl-0 pl-8 gap-4 uppercase tracking-wide text-white text-xs  whitespace-nowrap">
                                        <div class="min-w-[20px] max-w-[20px] phone:hidden">
                                            <img src="vendor/img/user.png">
                                        </div>

                                        <input class="tenkh_chuyenkhoan w-full appearance-none block phone:w-full  text-white border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" id="tenkh_add" type="text" readonly>
                                    </label>
                                    <label class="w-2/6 flex tablet:col-span-3 tablet:w-full phone:w-full phone:col-span-6 phone:pl-0 tablet:pl-0  pl-8 gap-3 uppercase tracking-wide text-white text-xs  whitespace-nowrap">
                                        <div class="min-w-[20px] max-w-[20px] phone:hidden">
                                            <img src="vendor/img/member.png">
                                        </div>
                                        <input class="w-full appearance-none block   text-white border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" id="tennhom_add" type="text" readonly>
                                    </label>
                                    <label class="w-1/6 tablet:col-span-3 tablet:w-full phone:w-full phone:col-span-6  flex phone:pl-0 tablet:pl-0 pl-8 gap-3 uppercase tracking-wide text-white text-xs  whitespace-nowrap">
                                        <div class="min-w-[20px] max-w-[20px] phone:hidden">
                                            <img src="vendor/img/cash.png">
                                        </div>
                                        <input class="w-full appearance-none block   text-white border-b border-[#f568e3]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" id="conno_khachhang" type="text" readonly>
                                    </label>
                                </div>


                                <table id="form_khachhang" class="min-w-1/2 bg-[#f7e2f7] divide-y divide-gray-100 dark:divide-gray-200 hidden">
                                    <thead>
                                        <tr>
                                            <td class=" px-4 py-2">Điện thoại</td>
                                            <td class=" px-4 py-2 text-center">Khách hàng</td>
                                            <td class=" px-4 py-2 text-end">Thành viên</td>
                                            <td class=" px-4 py-2 text-end">% giảm</td>
                                        </tr>
                                    </thead>
                                    <tbody id='list_khachhang' class="divide-y divide-gray-100 dark:divide-gray-200">

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-span-8 phone:col-span-12">
                    <div class="mb-2  bg-[#ffffff21] shadow-sm w-full rounded-md  ">
                        <div class="border-b border-[#a86ed4] px-2  flex justify-between text-[#83ff00]">
                            <div class="flex gap-3 items-center">
                                <h4>
                                    Liệu trình

                                </h4>
                                <div class="col-span-12 input-group relative  flex  items-center w-2/3 px-1">
                                    <input type="text" onkeyup="load_hanghoa_dichvu('lieutrinh', '', this)" id="value_search" class=" bg-transparent relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base   font-medium text-white transition focus:border-b focus:border-white hover:border-b hover:border-white focus:outline-none focus:text-white" placeholder="Tìm kiếm ">
                                </div>
                            </div>
                            <div class="">
                                <button onclick="show_form(this)" class="icon_show hidden focus:outline-none"><img src="vendor/img/ondown.png"></button>
                                <button onclick="hidden_form(this)" class="icon_hidden   focus:outline-none"><img src=" vendor/img/ontop.png"></button>
                            </div>
                        </div>

                        <div class=" __form grid grid-cols-12 w-full gap-3 p-3  rounded-b-lg  ">
                            <div id="danhmuc_lieutrinh" class="col-span-12 input-group relative  flex  items-center w-2/3 px-1 gap-5 ">
                            </div>
                            <div id="items_lieutrinh" class="col-span-12 grid grid-cols-12 w-full gap-3">
                            </div>
                        </div>

                    </div>
                    <div class="mb-2 bg-[#ffffff21] rounded-md shadow-sm w-full mt-[1rem]">
                        <div class="border-b border-[#a86ed4] rounded-t-md  px-2  flex justify-between text-[#83ff00] ">
                            <div class="flex gap-3 items-center">
                                <h4>
                                    Dịch vụ
                                </h4>
                                <div class="col-span-12 input-group relative  flex  items-center w-2/3 px-1">
                                    <input type="text" onkeyup="load_hanghoa_dichvu('dichvu', '', this)" id="value_search" class=" bg-transparent relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base    font-medium text-white transition focus:border-b focus:border-white hover:border-b hover:border-white focus:outline-none focus:text-white" placeholder="Tìm kiếm ">

                                </div>
                            </div>

                            <button onclick="show_form(this)" class="icon_show hidden focus:outline-none"><img src="vendor/img/ondown.png"></button>
                            <button onclick="hidden_form(this)" class="icon_hidden   focus:outline-none"><img src=" vendor/img/ontop.png"></button>
                        </div>
                        <div class=" __form grid grid-cols-12 w-full gap-3 p-3  rounded-b-lg ">

                            <div id="danhmuc_dichvu" class="col-span-12 input-group relative  flex  items-center w-2/3 px-1 gap-5 ">

                            </div>
                            <div id="items_dichvu" class="col-span-12 grid grid-cols-12 w-full gap-3">
                            </div>
                        </div>

                    </div>
                    <div class="mb-2  rounded-md bg-[#ffffff21] shadow-lg w-full mt-[1rem]">

                        <div class="border-b border-[#a86ed4] rounded-t-md px-2 flex justify-between text-[#83ff00]">
                            <div class="flex gap-3 items-center">
                                <h4>
                                    Sản phẩm
                                </h4>
                                <div class="col-span-12 input-group relative  flex  items-center w-2/3 px-1">
                                    <input type="text" onkeyup="load_hanghoa_dichvu('hanghoa', '', this)" id="value_search" class=" bg-transparent relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base   font-medium text-white transition focus:border-b focus:border-white hover:border-b hover:border-white focus:outline-none focus:text-white" placeholder="Tìm kiếm ">

                                </div>
                            </div>

                            <button onclick="show_form(this)" class="icon_show hidden focus:outline-none"><img src="vendor/img/ondown.png"></button>
                            <button onclick="hidden_form(this)" class="icon_hidden   focus:outline-none"><img src=" vendor/img/ontop.png"></button>
                        </div>
                        <div class=" __form grid grid-cols-12 w-full gap-3 p-3  rounded-b-md">
                            <div id='danhmuc_hanghoa' class="col-span-12 input-group relative  flex  items-center w-2/3 px-1 gap-5">
                            </div>
                            <div id="items_sanpham" class="col-span-12 grid grid-cols-12 w-full gap-3">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-span-4 phone:col-span-12">

                    <div class="mb-2 rounded-md   shadow-sm w-full">
                        <div class="bg-[#fcd6ff] rounded-t-md text-lg p-2 flex justify-between items-center text-purple-900 ">
                            Đơn hàng
                            <div class='flex gap-3 items-center text-black'>
                                <div>
                                    <img class="cursor-pointer" onclick="open_modal('form_tuvan')" src='vendor/img/edit.png' title="Thêm ghi chú">
                                </div>
                                <div id="ngaydat" class="input-group date  hidden flex " data-date-format="dd/mm/yyyy">
                                    <p>Ngày</p>
                                    <input id="ngayhientai" data-date-format="dd/mm/yyyy" class="hover:cursor-pointer form-control text-center bg-transparent focus:outline-none w-[150px] border-b border-[#f568e3] justify-end" type="text" value="<?= date('d/m/Y'); ?>"> <span class="input-group-addon"></span>
                                    <input id="giohen_khachdat" class=" form-control text-center border-b min-w-[100px]  bg-transparent  border-[#f568e3]" type="time" value="<?= date('H:i') ?>">

                                </div>
                            </div>
                        </div>
                        <div class='bg-white rounded-b-md overflow-x-scroll'>
                            <table class="min-w-full divide-y divide-gray-100 dark:divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 font-thin text-[#a30487] text-center">#</th>
                                        <th class="px-4 py-2 font-thin text-[#a30487]">Dịch vụ</th>
                                        <th class=" px-4 py-2 text-[#a30487] text-center">%</th>
                                        <th class="hidden px-4 py-2 text-end text-[#a30487]">Đơn giá</th>
                                        <th class="px-4 font-thin py-2 text-end text-[#a30487]">Số tiền</th>
                                        <th class="px-4 font-thin py-2 text-[#a30487] text-center">...</th>
                                    </tr>
                                </thead>
                                <tbody id='list_banhang_line' class="divide-y divide-gray-100 dark:divide-gray-200">

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div id="list_kehoachdieutri" class="mb-2 rounded-md hidden  shadow-sm w-full ">
                        <div class="bg-[#fcd6ff] text-lg rounded-t-md px-2 py-2 flex justify-between items-center text-purple-900 ">
                            Kế hoạch điều trị

                        </div>
                        <div class='bg-white rounded-b-md overflow-x-scroll'>
                            <table class="min-w-full divide-y divide-gray-100 dark:divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 font-thin text-[#a30487] text-center">Lần</th>
                                        <th class="px-4 py-2 font-thin text-[#a30487]">Dịch vụ</th>
                                        <th class="px-4 py-2 font-thin text-[#a30487] text-center">Ngày</th>
                                        <th class="px-4 py-2 font-thin text-[#a30487] whitespace-nowrap">Liệu trình</th>
                                    </tr>
                                </thead>
                                <tbody id='kehoachdieutri' class="divide-y divide-gray-100 dark:divide-gray-200">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mb-2 rounded-md  shadow-sm w-full">
                        <div class="bg-[#fcd6ff] text-lg rounded-t-md  p-2 flex justify-between items-center text-purple-900 ">
                            Chi phí
                        </div>
                        <div class='bg-white p-3 rounded-b-md '>
                            <div class='flex flex-col items-end'>
                                <div class='grid grid-cols-12 gap-4 pb-2 justify-end'>
                                    <div class="col-span-12 flex justify-end">
                                        <p class="col-span-6 text-right ">Tổng cộng</p>
                                        <input id="tongtien" class='col-span-6 w-[120px] tablet:w-[100px] phone:w-[100px] border-b px-2 text-right border-[#ddd]' value='0' readonly>
                                    </div>
                                    <div class="col-span-12 flex justify-end gap-3">
                                        <select id='list_voucher' class="border-b col-span-4 text-right tablet:w-[100px] max-w-[250px]">
                                        </select>
                                        <input id='sotien_voucher' class='col-span-4 w-[120px] phone:w-[100px] tablet:w-[100px]  border-b px-2 text-right border-[#ddd]' value='0' readonly>
                                    </div>
                                    <div class="col-span-12 flex justify-end gap-3 font_semi">
                                        <p class="col-span-6 text-right text-[red] font_semi">Thanh toán</p>
                                        <input id="tongcongvat" class='col-span-6 w-[120px] tablet:w-[100px] phone:w-[100px] border-b px-2 text-right border-[#ddd] text-[red]' value='0' readonly>
                                    </div>
                                    <div class="col-span-12 flex justify-end gap-3 font_semi">
                                        <p class="col-span-6 text-right  font_semi">Đã thu</p>
                                        <input id="dathu_edit" class='col-span-6 w-[120px] tablet:w-[100px] phone:w-[100px] border-b px-2 text-right border-[#ddd] ' value='0' readonly>
                                    </div>
                                    <div class="col-span-12 flex justify-end gap-3 font_semi">
                                        <p class="col-span-6 text-right text-[green] font_semi">Còn lại</p>
                                        <input id="tongcongconlai" class='col-span-6 w-[120px] tablet:w-[100px] phone:w-[100px] border-b px-2 text-right border-[#ddd] text-[green]' value='0' readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='flex justify-end gap-4 mt-5'>
                        <button type="button" id="btn_update_banhang" onclick="open_form_thutruoc_edit()" class="bg-[#a86ed4]  p-2 px-10 rounded-md text-white hidden">Lưu</button>
                        <button id="btn_open_modal" onclick="open_form_thutruoc_edit(), load_banhang_khachhang('')" class=' bg-[#a86ed4]  p-2 px-10 rounded-md text-white'>Lưu</button>
                        <button onclick="open_huy_banhang_edit()" class='bg-white p-2 px-10 rounded-md'>Hủy</button>
                    </div>
                </div>
            </div>
        </div>
        <!--/Grid Form-->
    </div>
</main>
<!-- Form xem liệu trình-->
<div class="relative z-10 hidden" id="form_chitiet_lieutrinh" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-7xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="tendichvu" class='text-black'></p>
                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_chitiet_lieutrinh')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="relative grid grid-cols-12 p-4" id="" data-te-modal-body-ref>
                        <div id="list_form_lieutrinh" class="col-span-7 pr-2 border-r">
                            <div class="p-3">
                                <table class="min-w-full divide-y divide-gray-100 dark:divide-gray-200 ">
                                    <thead>
                                        <tr class="font_semi">
                                            <th class=" px-4 py-2 text-center">Lần</th>
                                            <th class=" px-4 py-2 text-left">Tên liệu trình</th>
                                            <th class=" px-4 py-2 text-center">Ngày thực hiện</th>
                                            <th class=" px-4 py-2 text-end">Số tiền</th>
                                            <th class=" px-4 py-2 text-center">...</th>
                                        </tr>
                                    </thead>
                                    <tbody id='list_lieutrinh' class="divide-y divide-gray-100 dark:divide-gray-200">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="item_chitiet_lieutrinh" class="col-span-5 pl-2 hidden">
                            <h4 class="text-lg  text-green-700">Mô tả <span id="tenlieutrinh"></span></h4>
                            <div class="p-3">
                                <table class="min-w-full divide-y divide-gray-100 dark:divide-gray-200">
                                    <thead>
                                        <tr class="font_semi">
                                            <th class=" px-4 py-2">#</th>
                                            <th class=" px-4 py-2">Hàng hóa/Dịch vụ</th>
                                            <th class=" px-4 py-2 text-center">Số lượng</th>
                                            <th class=" px-4 py-2 text-end">Đơn giá</th>
                                        </tr>
                                    </thead>
                                    <tbody id='chitiet_lieutrinh' class="divide-y divide-gray-100 dark:divide-gray-200">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">

                    <button type="button" onclick="close_modal('form_chitiet_lieutrinh')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- Form tư vấn -->
<div class="relative z-10 hidden" id="form_tuvan" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-3xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[red]'>Nội dung tư vấn</p>
                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_tuvan')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2   flex justify-center" id="" data-te-modal-body-ref>
                        <label class="field_v2 width_100">
                            <textarea row="5" cols="50" style="height:100px" type="text" id="tuvan_add" class="field__input" placeholder="" required></textarea>
                            <script>
                                var editor = CKEDITOR.replace('tuvan_add');
                            </script>
                            <span class="field__label-wrap">
                                <span class="field__label"></span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="id_chidinh_delete">
                    <button type="button" onclick="update_tuvan()" class="inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_tuvan')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form delete bán hàng line -->
<div class="relative z-10 hidden" id="form_delete_banhangline" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[red]'>Đồng ý xóa</p>
                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_delete_banhangline')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2   flex justify-center" id="" data-te-modal-body-ref>
                        <p id="ten_hanghoa_delete" class="text-lg "></p>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="id_chidinh_delete">
                    <button type="button" onclick="delete_banhang('chidinh')" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_delete_banhangline')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form delete chi tiet lieu trinh -->
<div class="relative z-10 hidden" id="form_delete_chitiet_lieutrinh" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[red]'>Đồng ý xóa</p>
                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_delete_chitiet_lieutrinh')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2   flex justify-center" id="" data-te-modal-body-ref>
                        <p id="ten_lieutrinh_delete" class="text-lg "></p>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="mshh_lieutrinh_delete">
                    <input hidden id="soct_lieutrinh_delete">
                    <input hidden id="idchidinh_lieutrinh_delete">
                    <input hidden id="mslieutrinh_cha_delete">
                    <button type="button" onclick="delete_chitiet_lieutrinh(this, 'from_edit')" class=" mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px] text-white shadow-sm t ring-gray-300 hover:bg-[red] sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_delete_chitiet_lieutrinh')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form delete bán hàng line -->
<div class="relative z-10 hidden" id="form_huy_banhang" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[red]'>Hủy đơn hàng hiện tại</p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_huy_banhang')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2   flex justify-center" id="" data-te-modal-body-ref>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="soct_delete">
                    <button type="button" onclick="delete_banhangline_xoatam()" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_huy_banhang')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form giảm giá bán hàng line -->
<div class="relative z-10 hidden" id="form_giamgia_banhang" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:w-full max-w-lg">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-black' id="ten_hanghoa_giamgia"></p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_giamgia_banhang')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2 px-3 leading-10" id="" data-te-modal-body-ref>
                        <div class="grid grid-cols-12 gap-2 items-center">
                            <p class="col-span-3  text-right">Số tiền</p>
                            <input id="sotien_chuagiam" class="col-span-9 border-b  focus:outline-none px-3" readonly>
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center">
                            <p class="col-span-3 text-[red] text-right">% Giảm</p>
                            <input id="ptgiamgia_update" onkeyup="tinh_ptgiamgia()" maxlength="2" value="0" class="col-span-9 border-b ext-[red] focus:outline-none px-3 text-[red]">
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center">
                            <p class="col-span-3 text-[green]  text-right">Còn lại</p>
                            <input id="conlai_update" class="col-span-9 border-b  text-[green] focus:outline-none px-3 font_semi" readonly>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="id_chidinh_giamgia">
                    <input hidden id="soct_giamgia">
                    <button type="button" onclick="update_giamgia()" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_giamgia_banhang')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form thông báo lỗi -->
<div class="relative z-10 hidden" id="form_error" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[red]'>Thông báo</p>
                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_error')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 flex justify-center" data-te-modal-body-ref>
                        <div id='img_thongbao' class="hidden">
                            <img src="vendor/img/success.png">
                        </div>
                        <p id="text_thongbao" class="text-md">Vui lòng nhập thông tin khách hàng</p>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">

                    <button type="button" onclick="close_modal('form_error')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form thanh toán  -->
<div class="relative z-10 hidden" id="form_thutruoc" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-4xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p id="title_thongbao" class='text-[red]'>Thanh toán</p>
                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_thutruoc')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4 grid grid-cols-12 gap-4 max-h-[600px] overflow-scroll" data-te-modal-body-ref>
                        <div class="col-span-5  w-full h-auto flex-col justify-center items-center">
                            <div id="qr-code" class="flex justify-center"></div>
                            <p class="text-center mt-3 text-[red]" id="title_qr_thanhtoan"></p>
                        </div>
                        <div class="col-span-7">
                            <div class="grid grid-cols-12 gap-2">
                                <p class="col-span-3">Tổng cộng</p>
                                <input id="tongcong_thanhtoan" class="col-span-9 border-b  focus:outline-none px-3" readonly>
                            </div>
                            <div class="grid grid-cols-12 gap-2 pt-5">
                                <p class="col-span-3">Đã thu</p>
                                <input id="sotien_dathu" onkeyup="_ChangeFormat(this)" class="col-span-9 border-b focus:outline-none px-3 " readonly>
                            </div>
                            <div class="grid grid-cols-12 gap-2 pt-5">
                                <p class="col-span-3 text-[red]">Thu thêm</p>
                                <input id="sotien_thanhtoan" onkeyup="_ChangeFormat(this), tinh_nolai_edit(this)" onfocusout="load_QR_chuyenkhoan()" class="sotien_chuyenkhoan col-span-9 border-b focus:outline-none px-3 font_semi text-[red]">
                            </div>
                            <div class="grid grid-cols-12 gap-2 mt-5 ">
                                <p class="col-span-3  text-[green]">Còn lại</p>
                                <input id="nolai" class="col-span-9 border-b focus:outline-none  px-3 font_semi text-[green]" readonly>
                            </div>
                            <div class="grid grid-cols-12 gap-2  pt-5">
                                <p class="col-span-3">Ngân quỹ</p>
                                <select id="nganquy_thutruoc" onchange="load_QR_chuyenkhoan()" class="nganquy_chuyenkhoan col-span-9 border-b">
                                    <option value="TM">Tiền mặt</option>
                                    <option value="NH">Ngân hàng</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-span-12 grid grid-cols-12 gap-4 mt-3" id="list_yeucau">

                        </div>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <button type="button" onclick="update_banthangheader_edit()" class="inline-flex w-full justify-center rounded-md bg-[purple] px-5 py-2 text-[14px]  text-white shadow-sm  hover:bg-purple-500 sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_thutruoc')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form chưa thực hiện  -->
<div class="relative z-10 hidden" id="form_dichvu_chuathuchien" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[red]'>Dịch vụ chưa thực hiện</p>
                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_dichvu_chuathuchien')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2   flex justify-center" id="" data-te-modal-body-ref>
                        <table class="min-w-full divide-y divide-gray-100 dark:divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 font-thin text-[#a30487] text-center">#</th>
                                    <th class="px-4 py-2 font-thin text-[#a30487]">Hàng hóa/Dịch vụ</th>
                                    <th class="px-4 font-thin text-[#a30487] py-2 text-center">...</th>
                                </tr>
                            </thead>
                            <tbody id='list_dichvu_chuathuchien' class="divide-y divide-gray-100 dark:divide-gray-200">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <button type="button" onclick="close_modal('form_dichvu_chuathuchien')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px]  text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(async function() {
        await load_voucher()
        await load_banhang_line()
        await load_sotien_voucher();
        load_hanghoa_dichvu('lieutrinh', '', '')
        load_hanghoa_dichvu('dichvu', '', '')
        load_hanghoa_dichvu('hanghoa', '', '')
        load_banhang_khachhang('edit')
        load_thongtin_khachhang()
        load_loai_dathen()
        load_nhom('lieutrinh')
        load_nhom('dichvu')
        load_nhom('loai_hh')
        load_phanloai_theophanloai()

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var dateToday = new Date();
        $("#ngaydat input").datepicker({
            autoclose: true,
            todayHighlight: true,
        })
    });
</script>

<link href="vendor/css/datepicker.css" rel="stylesheet">
<script src="vendor/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="vendor/js/banhang.js?v=<?= md5_file('vendor/js/banhang.js') ?>"></script>