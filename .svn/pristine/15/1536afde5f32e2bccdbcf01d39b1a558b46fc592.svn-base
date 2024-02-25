<main class="bg_main">

    <div class="flex flex-col">
        <!--Grid Form-->
        <div class="flex flex-1  flex-col md:flex-row lg:flex-row ">
            <div class="mb-2 w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-2 items-center bg-[#ffffff36] rounded-md ">

                        <div>
                            <select id="list_phanloai" onchange="load_danhmuc()" class="text-[#83ff00] text-lg bg-transparent border-b border-[#f568e3] focus:outline-none pb-2">

                            </select>
                        </div>
                        <div class="flex gap-5 items-center">
                            <button type="button" id="btn_add" onclick="open_modal('form_add_danhmuc')" class="bg-[#008d3f] border-none px-5 py-2 text-white rounded-md">Thêm <span class='tenphanloai_btn lowercase'></span> </button>
                        </div>
                    </div>

                </div>
                <div class=" py-3 ">
                    <table class=" min-w-full">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class=" px-4 py-2 text-center font-thin">#</th>
                                <th class=" px-4 py-2 text-start font-thin">Tên <span class='tenphanloai_btn lowercase'></span></th>
                                <th id="dieukien1" class=" px-4 py-2 text-center font-thin hidden">% Phụ cấp</th>
                                <th id="dieukien" class=" px-4 py-2 text-center font-thin hidden">Số ngày được nghỉ</th>
                                <th class=" px-4 py-2 font-thin text-center">...</th>
                            </tr>
                        </thead>
                        <tbody id='list_danhmuc' class="0 ">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Form add danh muc-->
<div class="relative z-10 hidden" id="form_add_danhmuc" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal !text-[green]" id="exampleModalLabel">
                            Thêm mới <span class='tenphanloai_btn lowercase'></span>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_danhmuc')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4  " data-te-modal-body-ref>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3 ">
                            <p class="col-span-12  text-[black] font_semi">Tên <span class='tenphanloai_btn lowercase'></span></p>
                            <div class="col-span-12 mt-2 mx-4">
                                <input id="tenloai_add" class='w-full border-b px-2 border-[#ddd] text-[black] focus:outline-none text-lg' type="text" autocomplete="off">

                            </div>
                        </div>
                        <div id="" class="chucvu grid grid-cols-12 w-full justify-between items-center py-3 ">
                            <p class="col-span-12  text-[black] font_semi">% Phụ cấp <span class='tenphanloai_btn lowercase'></span></p>
                            <div class="col-span-12 mt-2  mx-4">
                                <input id="ptphucap_add" onkeyup="this.value = this.value.replace(/[^0-9\\,]/g,'')" class='w-full border-b px-2  border-[#ddd] text-[black] focus:outline-none  text-lg ' type="text" value="0" autocomplete="off">

                            </div>
                        </div>
                        <div id="" class="chucvu grid grid-cols-12 w-full justify-between items-center py-3 ">
                            <p class="col-span-12  text-[black] font_semi">Số ngày được nghỉ theo <span class='tenphanloai_btn lowercase'></span></p>
                            <div class="col-span-12 mt-2  mx-4">
                                <input id="ngaynghi_add" onkeyup="this.value = this.value.replace(/[^0-9\\,]/g,'')" class='w-full border-b px-2  border-[#ddd] text-[black] focus:outline-none  text-lg ' type="text" value="0" autocomplete="off">

                            </div>
                        </div>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <button type="button" id='btn_chi' onclick="add_danhmuc()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_add_danhmuc')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form delete danh muc-->
<div class="relative z-10 hidden" id="form_delete_danhmuc" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
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
                        <button type="button" onclick="close_modal('form_delete_danhmuc')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2   flex justify-center" id="" data-te-modal-body-ref>
                        <p id="ten_danhmuc_delete" class="text-lg "></p>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="msloai_delete">
                    <button type="button" onclick="delete_danhmuc()" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_delete_danhmuc')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form edit danh muc-->
<div class="relative z-10 hidden" id="form_edit_danhmuc" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal !text-[green]" id="exampleModalLabel">
                            Chỉnh sửa <span class='tenphanloai_btn lowercase'></span> </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_edit_danhmuc')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4" data-te-modal-body-ref>
                        <div id="mskh" class="grid grid-cols-12 w-full justify-between items-center py-3 ">
                            <p class="col-span-12  text-[black] font_semi">Tên <span class='tenphanloai_btn lowercase'></span></p>
                            <div class="col-span-12 mt-2  mx-4">
                                <input id="tenloai_edit" class='w-full border-b px-2  border-[#ddd] text-[black] focus:outline-none text-lg' type="text" autocomplete="off">

                            </div>
                        </div>
                        <div id="" class="chucvu grid grid-cols-12 w-full justify-between items-center py-3 ">
                            <p class="col-span-12  text-[black]  font_semi">% Phụ cấp <span class='tenphanloai_btn lowercase'></span></p>
                            <div class="col-span-12 mt-2  mx-4">
                                <input id="ptphucap_edit" onkeyup="this.value = this.value.replace(/[^0-9\\,]/g,'')" class='w-full border-b px-2  border-[#ddd] text-[black] focus:outline-none  text-lg' type="text" value="0" autocomplete="off">

                            </div>
                        </div>
                        <div id="" class="chucvu grid grid-cols-12 w-full justify-between items-center py-3 ">
                            <p class="col-span-12  text-[black]  font_semi">Số ngày được nghỉ theo  <span class='tenphanloai_btn lowercase'></span></p>
                            <div class="col-span-12 mt-2  mx-4">
                                <input id="ngaynghi_edit" onkeyup="this.value = this.value.replace(/[^0-9\\,]/g,'')" class='w-full border-b px-2  border-[#ddd] text-[black] focus:outline-none  text-lg' type="text" value="0" autocomplete="off">

                            </div>
                        </div>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="msloai_edit">
                    <button type="button" id='btn_chi_edit' onclick="edit_danhmuc()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_edit_danhmuc')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(async function() {
        const loai = location.pathname.split("/").splice(-1)[0];
        if (loai == 'Duty') {
            $("#list_phanloai").html(`
                <option class='text-black' data-danhmuc='NCV' value='chucvu'>Chức vụ</option>
                `);
            load_danhmuc()
        } else if (loai == 'TypeEmployee') {
            $("#list_phanloai").html(`
                <option class='text-black' data-danhmuc='LNV' value='loai_nv'>Công việc</option>
                `);
            $('#dieukien1').text('% thực hiện')
            load_danhmuc()
        } else {
            load_phanloai()

        }
    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var dateToday = new Date();
        $("#tungay input, #denngay input, #handung input").datepicker({
            autoclose: true,
            todayHighlight: true,
        });
        $('#tungay input').datepicker('update', new Date());
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
<script type="text/javascript" src="vendor/js/danhmuc.js?v=<?= md5_file('vendor/js/danhmuc.js') ?>"></script>