<main class="bg_main">
    <div class="flex flex-col">
        <!--Grid Form-->
        <?php
        $param = $_GET['soct'];
        $songay = '';
        if ($param == 'Birthday') {
            $songay = ktra_qltk($_COOKIE['mshs'], $_COOKIE['msdv'], 'TBSN')[0]->giatri;
        }
        ?>

        <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
            <div class="mb-2 bg-[#ffffff36] rounded shadow-sm w-full">
                <div class="border-b border-[#ffffff40] px-2 py-3 ">
                    <div class="flex justify-between  items-center tablet:grid tablet:grid-cols-12 phone:grid phone:grid-cols-12  ">
                        <div class="flex gap-5 items-center tablet:gap-3  tablet:col-span-12 tablet:grid tablet:grid-cols-12 phone:gap-3  phone:col-span-12 phone:grid phone:grid-cols-12">
                            <p class="text-lg text-[#83ff00] whitespace-nowrap tablet:col-span-12  tablet:text-center phone:col-span-12  phone:text-center">Khách hàng</p>
                            <div class='flex tablet:justify-between tablet:col-span-12 phone:justify-between phone:col-span-12'>
                                <div class="flex justify-center items-center">
                                    <div class=" xl:w-96">
                                        <div class="input-group relative flex gap-7 items-center w-full phone:grid phone:grid-cols-12" autocomplete="off">
                                            <form onsubmit="return false;" class="phone:col-span-6" autocomplete="off">
                                                <input onkeyup="khachhang_search()" id="search" class="w-[300px] tablet:w-[150px] phone:w-full  mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-white" placeholder="Tìm tên, số điện thoại hoặc email" aria-label="Search" aria-describedby="button-addon2" autocomplete="off">
                                            </form>
                                            <select onchange="load_khachhang()" class="phone:col-span-6 w-[300px] tablet:w-[100px] phone:w-full mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-[white]" id="nhom_filter">

                                            </select>
                                            <div class="flex gap-3 items-center text-white tablet:max-w-[200px] phone:col-span-6 phone:max-w-[200px]">
                                                <input onkeyup="load_khachhang()" id="ngaysn_search" class="w-[100px] tablet:w-[70px] phone:w-[70px] mt-1 text-left appearance-none block border-b border-[#f568e3] pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-white" aria-label="Search" placeholder="Số ngày" aria-describedby="button-addon2" autocomplete="off" value="<?= $songay ?>">
                                                <span class=" whitespace-nowrap">ngày đến sinh nhật</span>
                                                <div class="fullscreen:hidden tablet:hidden laptop:hidden">
                                                    <button type="button" onclick="open_add_voucher()" class="bg-[green] border-none px-5 py-2 text-white rounded-md whitespace-nowrap" data-target="#form_add_thu" data-toggle="modal">Tạo Voucher</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fullscreen:hidden phone:hidden laptop:hidden">
                                    <button type="button" onclick="open_add_voucher()" class="bg-[green] border-none px-5 py-2 text-white rounded-md whitespace-nowrap" data-target="#form_add_thu" data-toggle="modal">Tạo Voucher</button>
                                </div>
                            </div>

                        </div>
                        <div class="tablet:hidden phone:hidden">
                            <button type="button" onclick="open_add_voucher()" class="bg-[green] border-none px-5 py-2 text-white rounded-md whitespace-nowrap" data-target="#form_add_thu" data-toggle="modal">Tạo Voucher</button>
                        </div>
                    </div>

                </div>
                <div class="p-3 overflow-scroll max-h-[450px]">
                    <table class="min-w-full ">
                        <thead>
                            <tr class="text-[#efbff5] text-lg">
                                <th class="text-center font-thin px-4 py-2">#</th>
                                <th class="text-center font-thin px-4 py-2 hidden">Mã KH</th>
                                <th class="text-left font-thin px-4 py-2">Tên khách hàng</th>
                                <th class="text-center font-thin px-4 py-2 ">Ngày sinh</th>
                                <th class="text-center font-thin px-4 py-2">SĐT</th>
                                <th class="text-left font-thin px-4 py-2">Địa chỉ</th>
                                <th class="text-right font-thin px-4 py-2 ">Doanh số</th>
                                <th class="text-right font-thin px-4 py-2 ">Còn nợ</th>
                                <th class="text-center font-thin px-4 py-2 ">Nhóm</th>
                                <th class="text-center font-thin px-4 py-2 ">...</th>
                            </tr>
                        </thead>
                        <tbody id='list_khachhang' class="">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mb-2 bg-[#ffffff36] rounded shadow-sm w-full">
                <div class="">
                    <div class="flex justify-between px-3 py-2 items-center tablet:grid tablet:grid-cols-12 phone:grid phone:grid-cols-12 border-b border-[#ffffff40] laptop:grid laptop:grid-cols-12">
                        <div class=" tablet:col-span-12  tablet:grid tablet:grid-cols-12 tablet:gap-2 phone:col-span-12  phone:grid phone:grid-cols-12 phone:gap-2 flex gap-5 laptop:col-span-12 laptop:justify-start items-end">
                            <p class="text-lg text-[#83ff00]  tablet:col-span-12 tablet:text-center phone:col-span-12 phone:text-center whitespace-nowrap">Phân khúc khách hàng</p>
                            <div class="flex gap-5   tablet:col-span-12 tablet:justify-between tablet:mt-3   phone:col-span-12 phone:justify-between phone:mt-3 phone:flex-wrap phone:grid phone:grid-cols-12 items-end">
                                <input type="text" onkeyup="baocao_search(this)" id="search_baocao" class="w-[300px] phone:w-full text-left appearance-none block border-b border-[#f568e3]  px-4 pl-0 leading-tight focus:outline-none pb-2 bg-transparent text-[16px] text-white" placeholder="Tìm tên dịch vụ">

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
                <div class="py-3 overflow-scroll max-h-[450px]">
                    <table class="min-w-full " id="list_baocao_dotuoi">

                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Form chỉnh khách hàng -->
<div class="relative z-10 hidden" id="form_edit_khachhang" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center  text-center items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-2xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-[green]" id="exampleModalLabel">
                            Chỉnh khách hàng
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_edit_khachhang')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div data-te-modal-body-ref class="overflow-y-scroll max-h-[700px] overflow-x-hidden">

                        <div class="relative flex-auto p-4 ">
                            <div class="w-full md:w-full pb-4 flex gap-5">
                                <div class="w-3/3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="tenkhachhang_edit">
                                        Tên khách hàng
                                    </label>
                                    <input class="appearance-none block w-full min-w-[300px]  text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="tenkhachhang_edit" type="text" autocomplete="off">
                                </div>
                            </div>

                            <div class="w-full md:w-full pb-4 flex gap-5">
                                <div id="ngaysinh" class="w-3/3 pb-4">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="ngaysinh_edit">
                                        Ngày sinh
                                    </label>
                                    <input class="appearance-none block w-full min-w-[300px]  text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="ngaysinh_edit" type="text" autocomplete="off">
                                </div>


                            </div>
                            <div class="w-full md:w-full pb-4 flex gap-5">
                                <div class="w-3/3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="diachi_edit">
                                        Địa chỉ
                                    </label>
                                    <input class="appearance-none block w-full  min-w-[300px] text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="diachi_edit" type="text" autocomplete="off">
                                </div>


                            </div>

                        </div>
                    </div>

                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="mskh_edit">
                    <button onclick="edit_khachhang()" type="button" class="inline-flex w-full justify-center rounded-md bg-green-600 px-5 py-2 text-[14px] text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_edit_khachhang')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form add voucher-->
<div class="relative z-10 hidden" id="form_add_voucher" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal !text-[green]" id="exampleModalLabel">
                            Thêm mới voucher
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_voucher')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4  " data-te-modal-body-ref>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Tên voucher</p>
                            <input id="tenvoucher_add" class='col-span-8  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Số tiền</p>
                            <input id="sotien_add" onkeyup="_ChangeFormat(this) " class='col-span-8  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
                        </div>

                        <div id="handung" class="input-group date grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Thời hạn</p>
                            <input id="handung_input" class=" col-span-8 form-control border-b px-2  border-[#ddd] text-start bg-transparent " type="text" data-date-format="dd/mm/yyyy" value="<?= date('d/m/Y', strtotime('+30 day', strtotime(date('Y-m-d')))); ?>"> <span class="input-group-addon"></span>
                        </div>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <button type="button" id='btn_chi' onclick="add_voucher()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_add_voucher')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form history khách hàng-->
<div class="relative z-10 hidden" id="form_history" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-2xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal !text-[green]" id="exampleModalLabel">
                            Nhật ký sử dụng
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_history')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4  " data-te-modal-body-ref>
                        <div class='bg-white rounded-b-md '>
                            <table class="min-w-full divide-y divide-gray-100 dark:divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 font-thin text-[#a30487] text-center">Ngày</th>
                                        <th class="px-4 py-2 font-thin text-[#a30487] tablet:w-[120px] phone:w-[120px]">Dịch vụ</th>
                                        <th class="px-4 font-thin text-[#a30487] py-2 text-start">Nhân viên</th>
                                        <th class="px-4 font-thin text-[#a30487] py-2 text-center">Đánh giá</th>
                                    </tr>
                                </thead>
                                <tbody id='list_lichsu_khachhang' class="divide-y divide-gray-100 dark:divide-gray-200">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <button type="button" onclick="close_modal('form_history')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form add tư vấn điều trị -->
<div class="relative z-10 hidden" id="form_add_noidung" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-4xl">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[red]'>Ghi chú thực hiện</p>
                            <input hidden id="is_lieutrinh">
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_noidung')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2  max-h-[450px] overflow-y-scroll" id="" data-te-modal-body-ref>
                        <div>
                            <h3 class="text-left text-xl text-[#008b2e]">• Ghi chú</h3>
                            <div class="grid grid-cols-12 py-3">
                                <div class="col-span-10">
                                    <input class="w-full appearance-none block    border-b border-[#ddd]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" id="noidung_tuvan" type="text" placeholder="Nội dung tư vấn">
                                </div>
                                <div class="col-span-2 flex justify-center">
                                    <div>
                                        <img onclick="add_noidung('TV')" class="w-[20px]" src="vendor/img/checked.png">
                                    </div>
                                </div>
                            </div>
                            <div class=" max-h-[300px] overflow-y-scroll">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="text-[black] text-lg">
                                            <th class=" px-4 py-2 text-center font_semi">#</th>
                                            <th class=" px-4 py-2 text-left font_semi">Nội dung</th>
                                            <th class=" px-4 py-2 text-left font_semi whitespace-nowrap">Người tư vấn</th>
                                            <th class=" px-4 py-2 text-center font-thin">...</th>
                                        </tr>
                                    </thead>
                                    <tbody id='chitiet_tuvan' class="0 ">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h3 class="text-left text-xl text-[#008b2e]">• Điều trị</h3>
                            <div class="grid grid-cols-12 py-3">
                                <div class="col-span-10">
                                    <input class="w-full appearance-none block    border-b border-[#ddd]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" id="noidung_dieutri" type="text" placeholder="Nội dung điều trị">
                                </div>
                                <div class="col-span-2 flex justify-center ">
                                    <div>
                                        <img onclick="add_noidung('DT')" class="w-[20px]" src="vendor/img/checked.png">
                                    </div>
                                </div>
                            </div>
                            <div class="max-h-[300px] overflow-y-scroll">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="text-[black] text-lg">
                                            <th class=" px-4 py-2 text-center font_semi">#</th>
                                            <th class=" px-4 py-2 text-left font_semi">Nội dung</th>
                                            <th class=" px-4 py-2 text-left font_semi  whitespace-nowrap">Người thao tác</th>
                                            <th class=" px-4 py-2 text-center font-thin">...</th>
                                        </tr>
                                    </thead>
                                    <tbody id='chitiet_dieutri' class="0 ">

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="rowid_tuvan">
                    <input hidden id="soct_tuvan">
                    <input hidden id="sodienthoai_tuvan">
                    <input hidden id="mshh_tuvan">
                    <button type="button" onclick="close_modal('form_add_noidung')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form delete nội dung -->
<div class="relative z-10 hidden" id="form_delete_noidung" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-lg">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                            <p class='text-[red]' id="title_xoa_noidung"></p>
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_delete_noidung')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-2   flex justify-center" id="" data-te-modal-body-ref>
                        <p id="noidung_delete" class="text-lg "></p>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <input hidden id="rowid_noidung_delete">
                    <input hidden id="loai_noidung_delete">
                    <input hidden id="mshh_noidung_delete">

                    <button type="button" onclick="delete_noidung()" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px] ">Đồng ý</button>
                    <button type="button" onclick="close_modal('form_delete_noidung')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var dateToday = new Date();
        $("#ngaysinh input, #handung input").datepicker({
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var dateToday = new Date();
        $("#tungay input, #denngay input").datepicker({
            autoclose: true,
            todayHighlight: true,
        }).on('changeDate', async function() {
            load_baocao_dotuoi()
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
<script>
    $(document).ready(function() {
        load_nhom_kh()
        load_khachhang();
        load_baocao_dotuoi()
    });
</script>
<script type="text/javascript" src="vendor/js/khachhang.js?v=<?= md5_file('vendor/js/khachhang.js') ?>"></script>