<style>
  *::-webkit-scrollbar {
    width: 2px !important;
  }

  *::-webkit-scrollbar-track {
    background: #51116a;
    border-radius: 14px;
  }

  *::-webkit-scrollbar-thumb {
    background-color: #905e8c;
    border-radius: 14px;
    border: 3px solid var(--primary);
  }
</style>
<main class="bg_main">

  <div class="flex flex-col">
    <!--Grid Form-->
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row ">
      <div class="mb-2  rounded shadow-sm w-full">
        <div class="">
          <div class="flex justify-between px-3 py-2 items-center  border-b border-[#ffffff40] phone:grid phone:grid-cols-12 phone:gap-3">
            <div class="flex gap-5   items-center phone:col-span-12 phone:justify-center">
              <p class="text-lg text-[#83ff00]">Hẹn khách</p>
            </div>

            <div class="rounded flex justify-between bg-[#fefbffa3] text-lg phone:col-span-12">
              <div id="tungay" class="input-group date flex items-center pl-4" data-date-format="dd/mm/yyyy">
                <p class="whitespace-nowrap">Từ ngày</p>
                <input id="tungay_input" data-date-format="dd/mm/yyyy" onchange="load_dathen()" class="form-control phone:w-[120px] text-center bg-transparent" type="text" value="<?= date('d/m/Y') ?>"> <span class="input-group-addon"></span>
              </div>
              <div id="denngay" class="input-group date flex items-center" data-date-format="dd/mm/yyyy">
                <p class="whitespace-nowrap">Đến ngày</p>

                <input id="denngay_input" data-date-format="dd/mm/yyyy" onchange="load_dathen()" class="form-control phone:w-[120px] text-center bg-transparent " type="text" value="<?= date('d/m/Y', strtotime('+7 day', strtotime(date('Y-m-d')))); ?>"> <span class="input-group-addon"></span>
              </div>
            </div>

          </div>

        </div>
        <div id="list_dathen" class="p-3 flex gap-3  overflow-y-hidden overflow-x-scroll grid-flow-row pb-10 pt-8">

        </div>
      </div>
    </div>
  </div>
</main>
<!-- Form add tư vấn  -->
<div class="relative z-10 hidden" id="form_noidung_tuvan" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
    <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

      <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-6xl">
        <div class="bg-white">
          <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
            <!--Modal title-->
            <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
              <p class='text-[red]'>Tư vấn</p>
              <input hidden id="is_lieutrinh">
            </h5>
            <!--Close button-->
            <button type="button" onclick="close_modal('form_noidung_tuvan')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
              <img src="vendor/img/cancel.png">
            </button>
          </div>
          <!--Modal body-->
          <div class="p-2 overflow-y-scroll max-h-[500px]" id="" data-te-modal-body-ref>
            <div>
              <div>
                <div class="p-4  grid grid-cols-2 justify-center" data-te-modal-body-ref>
                  <div class="w-full col-span-1 phone:col-span-2  border-r phone:border-none phone:overflow-y-scroll phone:max-h-[300px]">
                    <table class="min-w-full">
                      <thead>
                        <tr class="text-[black] text-lg">
                          <th class=" px-4 py-2 text-center font-thin">#</th>
                          <th class=" px-4 py-2 text-left font-thin">Ngày</th>
                          <th class=" px-4 py-2 text-left font-thin">Tên HH/DV</th>

                        </tr>
                      </thead>
                      <tbody id='chitiet_quatrinhdieutri' class="0 ">

                      </tbody>
                    </table>
                  </div>
                  <div class="w-full col-span-1 phone:col-span-2 phone:border-t phone:mt-3 hidden" id='form_tuvan'>
                    <div class="grid grid-cols-12 py-3 px-2">
                      <div class="col-span-10">
                        <input class="w-full appearance-none block    border-b border-[#ddd]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" id="noidung_tuvan" type="text" placeholder="Nội dung tư vấn">
                      </div>
                      <div class="col-span-2 flex justify-center">
                        <div>
                          <img onclick="add_noidung('TV')" class="w-[20px]" src="vendor/img/checked.png">
                        </div>
                      </div>
                    </div>
                    <table class="min-w-full">
                      <thead>
                        <tr class="text-[black] text-lg">
                          <th class=" px-4 py-2 text-center font-thin">#</th>
                          <th class=" px-4 py-2 text-left font-thin">Nội dung</th>
                          <th class=" px-4 py-2 text-center font-thin">Loại</th>
                        </tr>
                      </thead>
                      <tbody id='noidung_chitiet_quatrinhdieutri' class="0 ">

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
          <input hidden id="rowid_tuvan">
          <input hidden id="soct_tuvan">
          <input hidden id="sodienthoai_tuvan">
          <input hidden id="mshh_tuvan">
          <button type="button" onclick="close_modal('form_noidung_tuvan')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- Form edit ngày hẹn  -->
<div class="relative z-10 hidden" id="form_edit_ngayhen" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
    <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

      <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
        <div class="bg-white">
          <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
            <!--Modal title-->
            <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
              <p id="title_thongbao" class='text-[red]'>Ngày hẹn <span id='tenkh_ngayhen'></span></p>
            </h5>
            <!--Close button-->
            <button type="button" onclick="close_modal('form_edit_ngayhen')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
              <img src="vendor/img/cancel.png">
            </button>
          </div>
          <!--Modal body-->
          <div class="p-4 flex justify-center" data-te-modal-body-ref>

            <div id="ngayhen" class="ngayhen_edit input-group date flex" data-date-format="dd/mm/yyyy">
              <input id="ngayhen_edit" class=" form-control text-center border-b border-[#f568e3] " data-date-format="dd/mm/yyyy" type="text"> <span class="input-group-addon"></span>
              <input id="giohen_edit" class=" form-control text-center border-b border-[#f568e3] " type="time">
            </div>
          </div>
        </div>
        <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
          <input hidden id='rowid_ngayhen'>
          <input hidden id="soct_ngayhen">
          <button type="button" onclick="edit_ngayhen()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-600 px-5 py-2 text-[14px]  text-white shadow-sm  hover:bg-green-500 sm:mt-0 max-w-[100px] ">Lưu</button>
          <button type="button" onclick="close_modal('form_edit_ngayhen')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-5 py-2 text-[14px] text-gray-900 shadow-sm hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>

        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(async function() {
    await load_dathen()

  })
</script>
<script type="text/javascript">
  $(document).ready(function() {
    var dateToday = new Date();
    $("#tungay input, #denngay input, #ngayhen #ngayhen_edit").datepicker({
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
<script type="text/javascript" src="vendor/js/dathen.js?v=<?= md5_file('vendor/js/dathen.js') ?>"></script>