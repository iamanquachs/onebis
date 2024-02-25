function add_dathang_header(soct) {
  $.post(
    "ajax/dathang/add_dathang_header.php",
    { soct: soct },
    function (data, dathen, jqXHR) {
      location.href = `Advise/${soct}`;
    }
  );
}

function load_hanghoa_dichvu(phanloai, loai, e) {
  const sodienthoai =
    $("#dienthoai_add").val() != "" ? $("#dienthoai_add").val() : "";
  const search = e != "" ? $(e).val() : e;

  $.post(
    "ajax/dathang/load_hanghoa_dichvu.php",
    {
      phanloai: phanloai,
      sodienthoai: sodienthoai,
      loai: loai,
      search: search,
    },
    function (data, textStatus, jqXHR) {
      if (phanloai == "lieutrinh") {
        if (data != "") {
          $("#form_lieutrinh").removeClass("hidden");
          $("#items_lieutrinh").html(data);
        }
      }
      if (phanloai == "dichvu") {
        if (data != "") {
          $("#form_dichvu").removeClass("hidden");
          $("#items_dichvu").html(data);
        }
      }
      if (phanloai == "hanghoa") {
        if (data != "") {
          $("#form_sanpham").removeClass("hidden");
          $("#items_sanpham").html(data);
        }
      }
    }
  );
}

function load_nhom(phanloai) {
  if (phanloai == "lieutrinh") {
    $.post(
      "ajax/banhang/load_tennhom.php",
      { phanloai: "lieutrinh" },
      function (data, textStatus, jqXHR) {
        if (data.length < 1) {
          $("#form_lieutrinh").addClass("hidden");
        }
        $("#danhmuc_lieutrinh").append(`
          <button onclick="load_hanghoa_dichvu('lieutrinh', '',''), active_filter(this)"  class='filter_btn px-2 py-1 border-b text-[#efbff5] focus:outline-none'>Tất cả</button>
          `);
        for (let i = 0; i < data.length; i++) {
          $("#danhmuc_lieutrinh").append(`
            <button onclick="load_hanghoa_dichvu('lieutrinh', '${data[i].msloai}',''), active_filter(this)" class='filter_btn px-2 py-1 text-[#efbff5] focus:outline-none'>${data[i].tenloai}</button>
            `);
        }
      }
    );
  }
  if (phanloai == "dichvu") {
    $.post(
      "ajax/banhang/load_tennhom.php",
      { phanloai: phanloai },
      function (data, textStatus, jqXHR) {
        if (data.length < 1) {
          $("#form_dichvu").addClass("hidden");
        }
        $("#danhmuc_dichvu").append(`
          <button onclick="load_hanghoa_dichvu('${phanloai}', '',''), active_filter(this)" class='filter_btn px-2 py-1 border-b text-[#efbff5] focus:outline-none'>Tất cả</button>
          `);
        for (let i = 0; i < data.length; i++) {
          $("#danhmuc_dichvu").append(`
            <button onclick="load_hanghoa_dichvu('${phanloai}', '${data[i].msloai}',''), active_filter(this)" class='filter_btn px-2 py-1 text-[#efbff5] focus:outline-none'>${data[i].tenloai}</button>
            `);
        }
      }
    );
  }
  if (phanloai == "loai_hh") {
    $.post(
      "ajax/banhang/load_tennhom.php",
      { phanloai: phanloai },
      function (data, textStatus, jqXHR) {
        if (data.length < 1) {
          $("#form_sanpham").addClass("hidden");
        }
        $("#danhmuc_hanghoa").append(`
          <button onclick="load_hanghoa_dichvu('hanghoa', '',''), active_filter(this)" class='filter_btn px-2 py-1 border-b text-[#efbff5] focus:outline-none'>Tất cả</button>
          `);
        for (let i = 0; i < data.length; i++) {
          $("#danhmuc_hanghoa").append(`
            <button onclick="load_hanghoa_dichvu('hanghoa', '${data[i].msloai}',''), active_filter(this)" class='filter_btn px-2 py-1 text-[#efbff5] focus:outline-none'>${data[i].tenloai}</button>
            `);
        }
      }
    );
  }
  if (phanloai == "ycms") {
    $.post(
      "ajax/danhmuc/load_danhmuc.php",
      { phanloai: phanloai },
      function (data, textStatus, jqXHR) {
        $("#list_yeucau_massage").html("");
        for (let i = 0; i < data.length; i++) {
          $("#list_yeucau_massage").append(`
        <tr >
          <td class="px-4 py-2 font-thin ">${data[i].tenloai}</td>
          <td class="px-4 font-thin py-2 flex justify-center items-center"><input type="checkbox" class='w-[20px] h-[20px]'  name="massage"  data-massage='${data[i].tenloai}' value="${data[i].msloai}"></td>
          </tr>
            `);
        }
      }
    );
  }
  if (phanloai == "ychd") {
    $.post(
      "ajax/danhmuc/load_danhmuc.php",
      { phanloai: phanloai },
      function (data, textStatus, jqXHR) {
        $("#list_yeucau_huongdau").html("");
        for (let i = 0; i < data.length; i++) {
          $("#list_yeucau_huongdau").append(`
          <tr class="">
          <td class="px-4 py-2 font-thin ">${data[i].tenloai}</td>
          <td class="px-4 font-thin py-2 flex justify-center items-center"><input class='w-[20px] h-[20px]' type="radio"  name="huongdau"  data-huongdau='${data[i].tenloai}' value='${data[i].msloai}'></td>
          </tr>
            `);
        }
      }
    );
  }
  if (phanloai == "ycdg") {
    $.post(
      "ajax/danhmuc/load_danhmuc.php",
      { phanloai: phanloai },
      function (data, textStatus, jqXHR) {
        $("#list_yeucau_daugoi").html("");
        for (let i = 0; i < data.length; i++) {
          $("#list_yeucau_daugoi").append(`
          <tr class="">
          <td class="px-4 py-2 font-thin ">${data[i].tenloai}</td>
          <td class="px-4 font-thin py-2 flex justify-center items-center"><input class='w-[20px] h-[20px]' type="radio" name="daugoi"  ' data-daugoi='${data[i].tenloai}' value='${data[i].msloai}'></td>
          </tr>
            `);
        }
      }
    );
  }
}

function load_giohang(soct) {
  $("#list_dathang_line").html("");
  $.post(
    "ajax/dathang/load_giohang.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {
      $("#icon_giohang").text(data.length);
      for (let i = 0; i < data.length; i++) {
        let btn_delete = ``;
        if (data[i].dathu == 0) {
          btn_delete = `<button class="hover:cursor-pointer" onclick="delete_dathang_line('${data[i].idchidinh}')">
          <img src="vendor/img/delete16.png">
      </button>`;
        } else {
          btn_delete = `<button class="hover:cursor-pointer" onclick="open_delete_dathu_fail()">
          <img src="vendor/img/delete16.png">
      </button>`;
        }
        $("#list_dathang_line").append(`
        <tr class=" item_line hover:bg-[#693b85]  hover:cursor-pointer hover:text-white ">
        <td class='px-4 py-2 text-center'>${i + 1}</td>
        <td class=' px-4 py-2 flex items-center gap-3'>${data[i].tenhh}
        </td>
        <td class='px-4 py-2 text-center'>${data[i].ptgiam}</td>
        <td class='px-4 py-2 text-end'>${data[i].thanhtien
          .toString()
          .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")}</td>
        <td class='px-4 py-2 text-center'>
        <div class=' flex justify-center items-center gap-3'>
        ${btn_delete}
        </div>
        </td>
    </tr>
        `);
      }
    }
  );
}

function delete_dathang_line(idchidinh) {
  var soct = location.pathname.split("/").splice(-1)[0];
  $.post(
    "ajax/dathang/delete_dathang_line.php",
    { soct: soct, idchidinh: idchidinh },
    function (data, textStatus, jqXHR) {
      load_giohang(soct);
      load_thanhtien();
    }
  );
}

function add_dathang_line(msctkm, ptgiam, mshh, colieutrinh, nhom_hh) {
  const dienthoai = $("#dienthoai_add").val();
  const tenkh = $("#tenkh_add").val();
  const msnguoithan = $("#msnguoithan_add").val();
  const ngaysinh = $("#ngaysinh_add").val();
  const diachi = $("#diachi_add").val();
  const ngayhientai = $("#ngayhientai").text();
  const nhom_kh = $("#nhom_add").val();
  const soct = location.pathname.split("/").splice(-1)[0];
  const bbdc = $("#ID_bbdc").val();
  const bbns = $("#ID_bbns").val();
  let dem = 0;
  if (bbdc == "1" && diachi == "") {
    dem += 1;
  }
  if (bbns == "1" && ngaysinh == "") {
    dem += 1;
  }
  if (dienthoai < 10 || tenkh == "" || dem != 0) {
    open_modal("form_error");
  } else {
    $.post(
      "ajax/dathang/add_dathang_line.php",
      {
        dienthoai: dienthoai,
        soct: soct,
        msnguoithan: msnguoithan,
        colieutrinh: colieutrinh,
        nhom_kh: nhom_kh,
        msctkm: msctkm,
        ptgiam: ptgiam,
        mshh: mshh,
        nhom_hh: nhom_hh,
      },
      function (data, textStatus, jqXHR) {
        load_giohang(soct);
        $("#modal_thongbao").removeClass("hidden");
        setTimeout(() => {
          $("#modal_thongbao").addClass("hidden");
        }, 2000);
      }
    );
  }
}

function load_thanhtien() {
  const soct = location.pathname.split("/").splice(-1)[0];
  const sotienvoucher = $("#list_voucher").val();
  $("#btn_open_modal").removeClass("hidden");
  $("#btn_update_banhang").addClass("hidden");

  if (sotienvoucher != 0) {
    $("#sotien_voucher").val(
      sotienvoucher.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
    );
  }
  $.post(
    "ajax/banhang/load_thanhtien.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {
      const tongtien = data[0].tongtien;
      const tongcongvat =
        tongtien - sotienvoucher > 0 ? tongtien - sotienvoucher : 0;
      $("#tongtien").val(
        tongtien.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
      );
      $("#tongcongvat").val(
        tongcongvat.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
      );
      if (tongcongvat == 0) {
        $("#btn_update_banhang").removeClass("hidden");
        $("#btn_open_modal").addClass("hidden");
      }
    }
  );
}

function load_voucher() {
  const sodienthoai = $("#dienthoai_add").val();
  $.post(
    "ajax/banhang/load_voucher.php",
    { sodienthoai: sodienthoai },
    function (data, textStatus, jqXHR) {
      $("#list_voucher").removeClass("text-[red]");

      $("#list_voucher").html("");
      $("#list_voucher").append(
        `<option value="0" data-msvoucher=''>Chọn Voucher</option>`
      );

      for (let i = 0; i < data.length; i++) {
        $("#list_voucher").append(`
  <option value='${data[i].sotien}' data-msvoucher='${
          data[i].msvoucher
        }' data-tenvoucher='${data[i].tenvoucher}'>${
          data[i].tenvoucher +
          "-" +
          data[i].sotien.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") +
          "-" +
          data[i].handung
        } </option>
  `);
        if (data.length > 0) {
          $("#list_voucher").addClass("text-[red]");
        }
      }
    }
  );
}

function find_khachhang() {
  if (typeof timer !== undefined) {
    clearTimeout(this.timer);
  }
  this.timer = setTimeout(a, 500);
  function a() {
    const value = $("#dienthoai_add").val();
    $("#form_khachhang").addClass("hidden");
    $("#mskh_add").val("");
    $("#nhom_add").val("");
    $("#tenkh_add").val("");
    $("#tennhom_add").val("");
    $("#conno_khachhang").val("");
    $("#ptgiam_load").val(0);
    $("#tenkh_add").attr("readonly", false);
    $("#ngaysinh_add").attr("readonly", false);
    $("#diachi_add").attr("readonly", false);
    $("#nu").prop("disabled", false);
    $("#nam").prop("disabled", false);
    if (value.length > 2) {
      $("#form_khachhang").removeClass("hidden");
      $("#icon_add_nguoithan").addClass("hidden");

      $.post(
        "ajax/banhang/find_khachhang.php",
        { value: value },
        function (data, textStatus, jqXHR) {
          $("#list_khachhang").html("");
          for (let i = 0; i < data.length; i++) {
            $("#list_khachhang").append(`
            <tr class="hover:cursor-pointer hover:bg-[#ddd]" >
            <td class='px-4 py-2  ' onclick="add_khachhang('${
              data[i].mskh
            }', '${data[i].sodienthoai}', '${data[i].tenkh}', '${
              data[i].gioitinh
            }','${data[i].diachi}', '${data[i].ngaysinh}','${
              data[i].ten_nguoithan
            }','${data[i].ms_nguoithan}','add' ,'${
              data[i].nghenghiep
            }')"><div class=' flex justify-center items-center'>${
              data[i].sodienthoai
            } </div></td>
            <td class='px-4 py-2 text-left font_semi whitespace-nowrap' onclick="add_khachhang('${
              data[i].mskh
            }', '${data[i].sodienthoai}', '${data[i].tenkh}', '${
              data[i].gioitinh
            }','${data[i].diachi}', '${data[i].ngaysinh}','${
              data[i].ten_nguoithan
            }','${data[i].ms_nguoithan}','add','${data[i].nghenghiep}')">${
              data[i].tenkh
            }</td>
            <td class='px-4 py-2 '><div class=' flex justify-center items-center'>${
              data[i].ten_nguoithan == 0
                ? `<img onclick="open_add_nguoithan_inform('${data[i].sodienthoai}')" class='w-[20px]' src="vendor/img/add.png">`
                : `<p onclick="add_khachhang('${data[i].mskh}', '${data[i].sodienthoai}', '${data[i].tenkh}', '${data[i].gioitinh}','${data[i].diachi}', '${data[i].ngaysinh}','${data[i].ten_nguoithan}','${data[i].ms_nguoithan}','add','${data[i].nghenghiep}')">${data[i].ten_nguoithan}</p>`
            }
            </div></td>
            <td onclick="add_khachhang('${data[i].mskh}', '${
              data[i].sodienthoai
            }', '${data[i].tenkh}', '${data[i].gioitinh}','${
              data[i].diachi
            }', '${data[i].ngaysinh}','${data[i].ten_nguoithan}','${
              data[i].ms_nguoithan
            }','add','${data[i].nghenghiep}')" class='px-4 py-2 text-center' >${
              data[i].gioitinh
            }</td>
            <td onclick="add_khachhang('${data[i].mskh}', '${
              data[i].sodienthoai
            }', '${data[i].tenkh}', '${data[i].gioitinh}','${
              data[i].diachi
            }', '${data[i].ngaysinh}','${data[i].ten_nguoithan}','${
              data[i].ms_nguoithan
            }','add','${data[i].nghenghiep}')" class='px-4 py-2 text-center'>${
              data[i].tennhom
            }</td>
            <td onclick="add_khachhang('${data[i].mskh}', '${
              data[i].sodienthoai
            }', '${data[i].tenkh}', '${data[i].gioitinh}','${
              data[i].diachi
            }', '${data[i].ngaysinh}','${data[i].ten_nguoithan}','${
              data[i].ms_nguoithan
            }','add','${data[i].nghenghiep}')" class='px-4 py-2 text-center'>${
              data[i].ptgiam
            }</td>
        </tr>
            `);
          }
          if (value.length == 10 && data.length == 1) {
            $("#tenkh_add").attr("readonly", true);
            $("#ngaysinh_add").attr("readonly", true);
            $("#diachi_add").attr("readonly", true);
            $("#dienthoai_add").val(value);
            $("#tenkh_add").val(data[0].tenkh);
            $("#mskh_add").val(data[0].mskh);
            $("#msnguoithan_add").val(data[0].ms_nguoithan);
            $("#ngaysinh_add").val(data[0].ngaysinh);
            $("#diachi_add").val(data[0].diachi);
            $("#sdt_nguoithan").val(value);
            load_ms_nguoithan_new(value);
            $("#nu").prop("disabled", false);
            $("#nam").prop("disabled", false);
            load_voucher();

            if (data[0].gioitinh == "NAM") {
              $("#nam").prop("checked", true);
              $("#nu").prop("disabled", true);
            } else {
              $("#nu").prop("checked", true);
              $("#nam").prop("disabled", true);
            }

            $("#form_khachhang").addClass("hidden");
            $("#icon_add_nguoithan").removeClass("hidden");
            load_hanghoa_dichvu("lieutrinh", "", "");
            load_hanghoa_dichvu("dichvu", "", "");
            load_hanghoa_dichvu("hanghoa", "", "");
            get_conno_khachhang(value);
          }

          if (data == "") {
            $("#form_khachhang").addClass("hidden");
          }
        }
      );
    }
    if (value.length == 10) {
      load_hanghoa_dichvu("lieutrinh", "", "");
      load_hanghoa_dichvu("dichvu", "", "");
      load_hanghoa_dichvu("hanghoa", "", "");
    }
  }
}
function load_danhgia() {
  $("#icon_warning").addClass("hidden");
  const sdt = $("#dienthoai_add").val();
  $.post(
    "ajax/banhang/load_danhgia.php",
    { sdt: sdt, mshh: "1" },
    function (data, textStatus, jqXHR) {
      console.log(data);
      if (sdt.length == 10) {
        if (data.length != 0) {
          $.post(
            "ajax/banhang/load_danhgia.php",
            { sdt: sdt, mshh: "" },
            function (danhgia, textStatus, jqXHR) {
              $("#icon_warning").removeClass("hidden");
              for (let i = 0; i < danhgia.length; i++) {
                var dichvu = "";
                var trangthai = "";
                var item_dichvu = danhgia[i].dichvu.split("|");
                for (let i = 0; i < item_dichvu.length; i++) {
                  dichvu += item_dichvu[i].split("/")[1] + " | ";
                }
                switch (danhgia[i].danhgia) {
                  case "1RKHL":
                    trangthai =
                      "<img src='vendor/img/ratkhonghailong.png' class='w-[24px]'>";
                    break;
                  case "2KHL":
                    trangthai =
                      "<img src='vendor/img/khonghailong.png' class='w-[24px]'>";
                    break;
                  case "3HL":
                    trangthai =
                      "<img src='vendor/img/hailong.png' class='w-[24px]'>";
                    break;
                  default:
                    trangthai =
                      "<img src='vendor/img/rathailong.png' class='w-[24px]'>";
                    break;
                }
                $("#list_danhgia").append(`
                  <tr>
                  <td class=' px-4 py-2 text-center'>${i + 1}</td>
                  <td class=' px-4 py-2 text-center'>${danhgia[i].ngaygio}</td>
                  <td class=' px-4 py-2 text-left'>${dichvu}</td>
                  <td class=' px-4 py-2 text-center'> ${
                    danhgia[i].nhanvien
                  }</td>
                  <td class=' px-4 py-2 '><div class='flex justify-center items-center'>${trangthai}</div></td>
                  </tr>
                  `);
              }
            }
          );
        }
      }
    }
  );
}

function add_khachhang(
  mskh,
  sdt,
  tenkh,
  gioitinh,
  diachi,
  ngaysinh,
  tennguoithan,
  ms_nguoithan
) {
  $("#tenkh_add").attr("readonly", true);
  $("#ngaysinh_add").attr("readonly", true);
  $("#diachi_add").attr("readonly", true);
  $("#dienthoai_add").val(sdt);
  if (tennguoithan == "") {
    $("#tenkh_add").val(tenkh);
  } else {
    $("#tenkh_add").val(tennguoithan);
  }
  $("#mskh_add").val(mskh);
  $("#msnguoithan_add").val(ms_nguoithan);
  $("#ngaysinh_add").val(ngaysinh);
  $("#diachi_add").val(diachi);
  $("#nu").prop("disabled", false);
  $("#nam").prop("disabled", false);
  load_voucher();
  $("#sdt_nguoithan").val(sdt);
  load_ms_nguoithan_new(sdt);

  if (gioitinh == "NAM") {
    $("#nam").prop("checked", true);
    $("#nu").prop("disabled", true);
  } else {
    $("#nu").prop("checked", true);
    $("#nam").prop("disabled", true);
  }
  $("#icon_add_nguoithan").removeClass("hidden");
  $("#form_khachhang").addClass("hidden");
  load_hanghoa_dichvu("lieutrinh", "", "");
  load_hanghoa_dichvu("dichvu", "", "");
  load_hanghoa_dichvu("hanghoa", "", "");
  get_conno_khachhang(sdt);
  load_danhgia();
}
function get_conno_khachhang(dienthoai) {
  $.post(
    "ajax/banhang/get_conno_khachhang.php",
    { dienthoai: dienthoai },
    function (data, textStatus, jqXHR) {
      if (data.length > 0) {
        $("#ptgiam_load").val(data[0].phantramgiam);
        $("#nhom_add").val(data[0].ms_nhom);
        $("#tennhom_add").val(data[0].tennhom_full);
        $("#conno_khachhang").val(
          data[0].text +
            " " +
            data[0].ConNo.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
        );
      }
    }
  );
}

function open_add_nguoithan_inform(sdt) {
  open_modal("form_add_nguoithan");
  $("#sdt_nguoithan").val(sdt);
  $("#loai_add").val("inform");
  load_ms_nguoithan_new(sdt);
}
function open_add_nguoithan_outform() {
  open_modal("form_add_nguoithan");
  $("#loai_add").val("outform");
  $("#hoten_nguoithan").val("");
}

function load_ms_nguoithan_new(sdt) {
  $.post(
    "ajax/khachhang/load_ms_nguoithan_new.php",
    { sodienthoai: sdt },
    function (data, textStatus, jqXHR) {
      var msnguoithan_new = sdt + "_1";
      if (data.length != 0) {
        msnguoithan_new = data[0].ms_nguoithan;
      }
      $("#msnguoithan_new").val(msnguoithan_new);
    }
  );
}

function add_nguoithan() {
  const sodienthoai = $("#sdt_nguoithan").val();
  const ms_nguoithan = $("#msnguoithan_new").val();
  const ten_nguoithan = $("#hoten_nguoithan").val();
  const gioitinh_nguoithan = $("input[name=gioitinhnguoithan]:checked").val();
  const ngaysinh_nguoithan = $("#ngaysinh_nguoithan").val();
  $.post(
    "ajax/khachhang/add_nguoithan.php",
    {
      sodienthoai: sodienthoai,
      ms_nguoithan: ms_nguoithan,
      ten_nguoithan: ten_nguoithan,
      gioitinh_nguoithan: gioitinh_nguoithan,
      ngaysinh_nguoithan: ngaysinh_nguoithan,
    },
    function (data, textStatus, jqXHR) {
      $("#tenkh_add").val(ten_nguoithan);
      $("#msnguoithan_add").val(ms_nguoithan);
      $("#ngaysinh_add").val(ngaysinh_nguoithan);
      $("#nu").prop("disabled", false);
      $("#nam").prop("disabled", false);
      if (gioitinh_nguoithan == "NAM") {
        $("#nam").prop("checked", true);
        $("#nu").prop("disabled", true);
      } else {
        $("#nu").prop("checked", true);
        $("#nam").prop("disabled", true);
      }
      if ($("#loai_add").val() == "inform") {
        find_khachhang();
      }
      close_modal("form_add_nguoithan");
      load_ms_nguoithan_new(sodienthoai);
    }
  );
}

function load_thanhtien() {
  const soct = location.pathname.split("/").splice(-1)[0];
  const sotienvoucher = $("#list_voucher").val();
  $("#btn_open_modal").removeClass("hidden");
  $("#btn_update_banhang").addClass("hidden");
  if (sotienvoucher != 0 || sotienvoucher != "") {
    $("#sotien_voucher").val(
      sotienvoucher.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
    );
  } else {
    $("#sotien_voucher").val(0);
  }
  $.post(
    "ajax/dathang/load_thanhtien.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {
      const tongtien = data[0].tongtien;
      const tongcongvat =
        tongtien - sotienvoucher > 0 ? tongtien - sotienvoucher : 0;
      $("#tongcong_thanhtoan").val(
        tongtien.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
      );
      $("#sotien_thutruoc").val(
        tongcongvat.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
      );
      if (tongcongvat == 0) {
        $("#btn_update_banhang").removeClass("hidden");
        $("#btn_open_modal").addClass("hidden");
      }
    }
  );
}

function tinh_nolai(e) {
  const tongcong = $("#tongcong_thanhtoan").val().replaceAll(".", "");
  const thutruoc = $("#sotien_thutruoc").val().replaceAll(".", "");
  const sotienvoucher = $("#sotien_voucher").val().replaceAll(".", "");

  $("#nolai").val(
    (tongcong - thutruoc - sotienvoucher)
      .toString()
      .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
}

function open_modal_giohang(loaihinh) {
  if (loaihinh == "NK") {
    $("#form_thanhtien").removeClass("col-span-7");
    $("#form_thanhtien").addClass("col-span-12");
    $("#form_yeucau").addClass("hidden");
  }
  load_thanhtien();
  open_modal("form_thutruoc");
}

function update_dathangheader() {
  const tongcong = $("#tongcong_thanhtoan").val().replaceAll(".", "");
  const sotien = $("#sotien_thutruoc").val().replaceAll(".", "");
  const nganquy = $("#nganquy_thutruoc :checked").val();
  const mskh = $("#mskh_add").val();
  const tenkh = $("#tenkh_add").val();
  const ngaysinh = $("#ngaysinh_add").val();
  const diachi = $("#diachi_add").val();
  const nhom = $("#nhom_add").val();
  const msnguoithan = $("#msnguoithan_add").val();
  const ptgiam = $("#ptgiam_load").val();
  const makhoanmuc = $("#ID_thubanhang").val();
  const sodienthoai = $("#dienthoai_add").val().replaceAll(".", "");
  const soct = location.pathname.split("/").splice(-1)[0];
  const msvoucher = $("#list_voucher").find(":selected").data("msvoucher");
  const tenvoucher = $("#list_voucher").find(":selected").data("tenvoucher");
  const sotienvoucher = $("#list_voucher option:selected").val();
  const gioitinh = $("input[name=gioitinh]:checked").val();
  const inskl = $("#thamso_inskl").val();
  const qltk = $("#thamso_qltk").val();

  var maso_massage = [];
  $("#list_yeucau_massage td input:checked").each(function () {
    maso_massage.push($(this).attr("value"));
  });
  var ten_massage = [];
  $("#list_yeucau_massage td input:checked").each(function () {
    ten_massage.push($(this).data("massage"));
  });
  const maso_huongdau = $("input[name=huongdau]:checked").val();
  const ten_huongdau = $("input[name=huongdau]:checked").data("huongdau");
  const maso_daugoi = $("input[name=daugoi]:checked").val();
  const ten_daugoi = $("input[name=daugoi]:checked").data("daugoi");
  if (sodienthoai != "" && tenkh != "") {
    $.post(
      "ajax/dathang/update_dathangheader.php",
      {
        soct: soct,
        mskh: mskh,
        tenkh: tenkh,
        tenkh_khongdau: tenkh
          .trim()
          .normalize("NFD")
          .replace(/[\u0300-\u036f]/g, "")
          .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"))
          .toUpperCase(),
        ngaysinh: ngaysinh,
        diachi: diachi,
        gioitinh: gioitinh,
        sodienthoai: sodienthoai,
        tongcong: tongcong,
        sotien: sotien,
        nganquy: nganquy,
        nhom: nhom,
        ptgiam: ptgiam,
        makhoanmuc: makhoanmuc,
        msvoucher: msvoucher,
        msnguoithan: msnguoithan,
        tenvoucher: tenvoucher,
        sotienvoucher: sotienvoucher,
        maso_massage: maso_massage,
        ten_massage: ten_massage,
        maso_huongdau: maso_huongdau,
        ten_huongdau: ten_huongdau,
        maso_daugoi: maso_daugoi,
        ten_daugoi: ten_daugoi,
        qltk: qltk,
      },
      async function (data, textStatus, jqXHR) {
        if (sotien > 0 && inskl == 1) {
          if (typeof timer !== undefined) {
            clearTimeout(this.timer);
          }
          let myPromise = new Promise(async function (resolve) {
            load_img_qr_chuyenkhoan(soct);
            setTimeout(resolve, 1000);
          });
          await myPromise;
          open_print_banhang(soct, "thutien");
          setTimeout(function time() {
            location.href = `ListSale`;
          }, 1000);
        } else {
          location.href = `ListSale`;
        }
      }
    );
  } else {
    open_modal("form_error");
  }
}

function open_print_banhang(soct, loai) {
  var qr_img = "";
  if (loai == "thutien") {
    qr_img = document
      .getElementById("qr_code_hidden")
      .getElementsByTagName("img")[0].src;
  }
  $.post(
    "ajax/dathang/inphieu_dathang.php",
    { soct: soct, qr_img: qr_img },
    function (data, textStatus, jqXHR) {
      $.print(data);
    }
  );
}

function load_img_qr_chuyenkhoan(soct) {
  $.post(
    "ajax/dathang/load_qr_code_dathang.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {
      new QRCode("qr_code_hidden", {
        text: data[0].qr_code,
        width: 200,
        height: 200,
        colorDark: "#000",
        colorLight: "#ffff",
        correctLevel: QRCode.CorrectLevel.H,
      });
    }
  );
}

function lat_item(e) {
  $(e)
    .parent()
    .parent()
    .parent()
    .parent()
    .addClass("[transform:rotateY(180deg)]");
}

function lat_item_revert(e) {
  $(e).parent().removeClass("[transform:rotateY(180deg)]");
}
