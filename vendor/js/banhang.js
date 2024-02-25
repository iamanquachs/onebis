function show_form(e) {
  $(e).parent().find(".icon_hidden").removeClass("hidden");
  $(e).parent().find(".icon_show").addClass("hidden");
  $(e).parent().parent().find(".__form").removeClass("hidden");
}

function hidden_form(e) {
  $(e).parent().find(".icon_show").removeClass("hidden");
  $(e).parent().find(".icon_hidden").addClass("hidden");
  $(e).parent().parent().find(".__form").addClass("hidden");
}

function search_banhang(e) {
  const search_key = $(e).val();
  if (search_key.length > 1) {
    load_banhang_header_khachdat(search_key);
    load_banhang_header_henkhach(search_key);
  }
  if (search_key == "") {
    load_banhang_header_khachdat("");
    load_banhang_header_henkhach("");
  }
}

function banhang_search(e) {
  var input, filter, table, tr, td, i, j, cell;
  input = document.getElementById("value_search");
  filter = input.value
    .toUpperCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "")
    .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"));
  table = document.getElementById("list_banhang_header_henkhach");
  tr = table.getElementsByClassName("items");
  for (i = 0; i < tr.length; i++) {
    // Hide the row initially.
    tr[i].style.display = "none";
    td = tr[i].getElementsByClassName("search_key");
    for (var j = 0; j < td.length; j++) {
      cell = tr[i].getElementsByClassName("search_key")[j];
      if (cell) {
        if (
          cell.innerHTML
            .toUpperCase()
            .normalize("NFD")
            .replace(/[\u0300-\u036f]/g, "")
            .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"))
            .indexOf(filter) > -1
        ) {
          tr[i].style.display = "";
          break;
        }
      }
    }
  }
}

function add_banhang_header(e) {
  $.post(
    "ajax/banhang/add_banhang_header.php",
    { dathen: e },
    function (data, dathen, jqXHR) {
      location.href = `Sale/${data}`;
      $("#loai_dathen").val(dathen);
    }
  );
}
//todo Chỗ này load đặt hẹn và tư vấn
function load_loai_dathen() {
  const soct = location.pathname.split("/").splice(-1)[0];
  $.post(
    "ajax/banhang/load_loai_dathen.php",
    { soct: soct },
    function (data, dathen, jqXHR) {
      $("#loai_dathen").val(data[0].dathen);
      if (data[0].dathen == 1) {
        $("#title_dathen").removeClass("hidden");
        $("#ngaydat").removeClass("hidden");
      }
      CKEDITOR.instances["tuvan_add"].setData(data[0].tuvan);
    }
  );
}
function open_delete_banhang_header(soct, tenkh) {
  $("#ten_khachhang_delete").html(tenkh);
  $("#soct_delete").val(soct);
  open_modal("form_delete_banhangline");
}
function open_huy_banhang() {
  if ($("#tongtien").val() != 0) {
    $("#soct_delete").val(location.pathname.split("/").splice(-1)[0]);
    open_modal("form_huy_banhang");
  } else {
    huy_banhang();
  }
}

async function huy_banhang() {
  await delete_banhang("NO");
  location.href = `ListSale`;
}

function delete_banhang(loai) {
  var idchidinh = "";
  var soct = "";
  if (loai == "chidinh") {
    soct = location.pathname.split("/").splice(-1)[0];
    idchidinh = $("#id_chidinh_delete").val();
  } else {
    soct = $("#soct_delete").val();
    idchidinh = loai;
  }
  $.post(
    "ajax/banhang/delete_banhangheader.php",
    { soct: soct, idchidinh: idchidinh },
    function (data, textStatus, jqXHR) {
      close_modal("form_delete_banhangline");
      if (loai == "chidinh") {
        load_banhang_line();
        load_banhang_khachhang("");
      } else {
        load_banhang_header_henkhach("");
      }
    }
  );
}

function update_banthangheader() {
  const tongcong = $("#tongtien").val().replaceAll(".", "");
  const sotien = $("#sotien_thutruoc").val().replaceAll(".", "");
  const nganquy = $("#nganquy_thutruoc :checked").val();
  const mskh = $("#mskh_add").val();
  const tenkh = $("#tenkh_add").val();
  const ngaysinh = $("#ngaysinh_add").val();
  const diachi = $("#diachi_add").val();
  const nhom = $("#nhom_add").val();
  const makhoanmuc = $("#ID_thubanhang").val();
  const sodienthoai = $("#dienthoai_add").val().replaceAll(".", "");
  const soct = location.pathname.split("/").splice(-1)[0];
  const msvoucher = $("#list_voucher").find(":selected").data("msvoucher");
  const tenvoucher = $("#list_voucher").find(":selected").data("tenvoucher");
  const sotienvoucher = $("#list_voucher option:selected").val();
  const gioitinh = $("input[name=gioitinh]:checked").val();
  const inskl = $("#thamso_inskl").val();
  const qltk = $("#thamso_qltk").val();
  const ngaydat = $("#ngayhientai").val();
  const giodat = $("#giohen_khachdat").val();
  const ms_nguoithan = $("#msnguoithan_add").val();
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
      "ajax/banhang/update_banhangheader.php",
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
        ngaysinh: ngaysinh == "" ? "0000-00-00" : ngaysinh,
        diachi: diachi,
        gioitinh: gioitinh,
        sodienthoai: sodienthoai,
        tongcong: tongcong,
        sotien: sotien,
        nganquy: nganquy,
        nhom: nhom,
        makhoanmuc: makhoanmuc,
        msvoucher: msvoucher,
        tenvoucher: tenvoucher,
        sotienvoucher: sotienvoucher,
        ngaydat: ngaydat,
        giodat: giodat,
        maso_massage: maso_massage,
        ten_massage: ten_massage,
        maso_huongdau: maso_huongdau,
        ten_huongdau: ten_huongdau,
        maso_daugoi: maso_daugoi,
        ten_daugoi: ten_daugoi,
        ms_nguoithan: ms_nguoithan,
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
          }, 2000);
        } else {
          location.href = `ListSale`;
        }
      }
    );
  } else {
    open_modal("form_error");
  }
}

function load_banhang_header_khachdat(search_key) {
  $.post(
    "ajax/banhang/load_banhang_header_khachdat.php",
    { search_key: search_key },
    function (data, textStatus, jqXHR) {
      $("#list_banhang_header_khachdat").html(data);
    }
  );
}
function load_banhang_header_henkhach(search_key) {
  $.post(
    "ajax/banhang/load_banhang_header_henkhach.php",
    { search_key: search_key },
    function (data, textStatus, jqXHR) {
      $("#list_banhang_header_henkhach").html(data);
    }
  );
}
function load_list_henkhach_va_nhanvien() {
  load_nhanvien_in_banhang();
  load_banhang_header_henkhach("");
  list_banhang_header_khachdat("");
  load_trangthai_donhang();
}

function load_nhanvien_in_banhang() {
  $.post(
    "ajax/banhang/load_nhanvien_in_banhang.php",
    {},
    function (data, textStatus, jqXHR) {
      $("#list_nhanvien").html("");
      $("#list_nhanvien_in_modal").html("");
      var soluong_nv_cho = 0;

      for (let i = 0; i < data.length; i++) {
        var img_trangthai = "";
        switch (data[i].ban) {
          case "1":
            img_trangthai = "<img src='vendor/img/wait.png'>";
            break;

          default:
            soluong_nv_cho += 1;
            img_trangthai = "<img src='vendor/img/check24.png'>";
            break;
        }
        $("#list_nhanvien").append(`
        <tr class="active_items item_line border-b border-dashed border-[#ffffff40]" onclick='active_item(this)'>
        <td class='px-3 py-2 text-center'>${i + 1}</td>
        <td class=' px-3 py-2  max-w-[30px] text-left whitespace-nowrap tablet:whitespace-normal phone:whitespace-normal phone:min-w-[100px]'>${
          data[i].tennv
        } </td>
        <td class=' px-3 py-2 text-center'>${data[i].vao} </td>
        <td class=' px-3 py-2 text-center'>${data[i].tg}</td>
        <td class=' px-3 py-2 text-left'>${data[i].tenhh}</td>
        <td class=' px-3 py-2 flex justify-center items-center'>
          ${img_trangthai}
        </td>
    </tr>
        `);
        $("#list_nhanvien_in_modal").append(`
        <tr class="hover:bg-[#f4ddfb] items_nhanvien hover:cursor-pointer  border-b border-dashed border-[#a7a5a540]" onclick="chon_nhanvien(this,'${
          data[i].msnv
        }')">
        <td class='px-3 py-2 text-center'>${i + 1}</td>
        <td class=' px-3 py-2  max-w-[30px] text-left whitespace-nowrap'>${
          data[i].tennv
        } </td>
        <td class=' px-3 py-2 text-center'>${data[i].vao} </td>
        <td class=' px-3 py-2 text-center'>${data[i].tg}</td>
        <td class=' px-3 py-2 text-left'>${data[i].tenhh}</td>
        <td class=' px-3 py-2 flex justify-center items-center'>
          ${img_trangthai}
        </td>
    </tr>
        `);
      }
      $("#soluong_nv_cho").text(soluong_nv_cho);
      $(".img_load_nhanvien").addClass("animate-spin");
      setTimeout(() => {
        $(".img_load_nhanvien").removeClass("animate-spin");
      }, 1000);
    }
  );
}

function load_lichsu_khachang_theo_rowid() {
  const rowid = $("#rowid_add_nguoithuchien").val();
  $.post(
    "ajax/banhang/load_lichsu_khachang_theo_rowid.php",
    { rowid: rowid },
    function (data, textStatus, jqXHR) {
      $("#list_dichvu_dadung").html(data);
    }
  );
}

function add_nguoithuchien() {
  const rowid = $("#rowid_add_nguoithuchien").val();
  const tennv = $("#ten_add_nguoithuchien").val();
  $.post(
    "ajax/banhang/add_nguoithuchien.php",
    { rowid: rowid, tennv: tennv },
    function (data, textStatus, jqXHR) {
      close_modal("form_add_nguoithuchien");
    }
  );
}

function chon_nhanvien(e, tennv) {
  $("#ten_add_nguoithuchien").val("");
  $(".items_nhanvien").removeClass("bg-[#f4ddfb]");
  $(e).addClass("bg-[#f4ddfb]");
  $("#ten_add_nguoithuchien").val(tennv);
}

function open_add_nguoithuchien(rowid) {
  $("#rowid_add_nguoithuchien").val(rowid);
  load_lichsu_khachang_theo_rowid();
  load_nhanvien_yeucau(rowid);
  open_modal("form_add_nguoithuchien");
}
function load_nhanvien_yeucau(rowid) {
  $.post(
    "ajax/banhang/load_nhanvien_yeucau.php",
    { rowid: rowid },
    function (data, textStatus, jqXHR) {
      const ms_nguoithuchien = data[0].ms_nguoithuchien;
      $.post(
        "ajax/banhang/load_nhanvien_in_banhang.php",
        {},
        function (data, textStatus, jqXHR) {
          $("#list_nhanvien_in_modal").html("");
          for (let i = 0; i < data.length; i++) {
            var active = "";
            if (ms_nguoithuchien == data[i].msnv) {
              active = "text-[red]";
            }
            var img_trangthai = "";
            switch (data[i].ban) {
              case "1":
                img_trangthai = "<img src='vendor/img/wait.png'>";
                break;

              default:
                img_trangthai = "<img src='vendor/img/check24.png'>";
                break;
            }
            $("#list_nhanvien_in_modal").append(`
            <tr class="hover:bg-[#f4ddfb] ${active} items_nhanvien hover:cursor-pointer  border-b border-dashed border-[#a7a5a540]" onclick="chon_nhanvien(this,'${
              data[i].msnv
            }')">
            <td class='px-3 py-2 text-center'>${i + 1}</td>
            <td class=' px-3 py-2  max-w-[30px] text-left whitespace-nowrap'>${
              data[i].tennv
            } </td>
            <td class=' px-3 py-2 text-center'>${data[i].vao} </td>
            <td class=' px-3 py-2 text-center'>${data[i].tg}</td>
            <td class=' px-3 py-2 text-left'>${data[i].tenhh}</td>
            <td class=' px-3 py-2 flex justify-center items-center'>
              ${img_trangthai}
            </td>
        </tr>
            `);
          }
        }
      );
    }
  );
}

function open_update_banhangline_ngaythuchien(soct, tenkh, loai) {
  open_modal("form_update_ngaythuchien");
  $("#soct_update").val(soct);
  $("#tenkh_update").html(tenkh);
  $("#loai_update").val(loai);
  $("#form_ngaysinh_update").addClass("hidden");
  $("#form_diachi_update").addClass("hidden");
}

function update_banhangline_ngaythuchien() {
  const soct = $("#soct_update").val();
  const loai = $("#loai_update").val();
  const ngaysinh = $("#ngaysinh_add").val();
  const diachi = $("#diachi_add").val();
  const sodienthoai = $("#sodienthoai_update").val();
  const bbdc = $("#ID_bbdc").val();
  const bbns = $("#ID_bbns").val();
  const at_dieutour = $("#AT_dieutour").val();
  if (loai == "khachdat") {
    let dem = 0;
    if (bbdc == "1" && diachi == "") {
      dem += 1;
    }
    if (bbns == "1" && ngaysinh == "") {
      dem += 1;
    }
    if (dem != 0) {
      $("#dathen_error").removeClass("hidden");
    } else {
      $.post(
        "ajax/banhang/update_banhangline_ngaythuchien.php",
        {
          soct: soct,
          sodienthoai: sodienthoai,
          ngaysinh: ngaysinh,
          diachi: diachi,
          loai: loai,
          at_dieutour: at_dieutour,
        },
        function (data, textStatus, jqXHR) {
          load_banhang_header_henkhach("");
          load_banhang_header_khachdat("");
          load_trangthai_donhang();
          close_modal("form_update_ngaythuchien");
        }
      );
    }
  } else {
    $.post(
      "ajax/banhang/update_banhangline_ngaythuchien.php",
      {
        soct: soct,
        sodienthoai: sodienthoai,
        ngaysinh: ngaysinh,
        diachi: diachi,
        loai: loai,
        at_dieutour: at_dieutour,
      },
      function (data, textStatus, jqXHR) {
        load_banhang_header_henkhach("");
        load_banhang_header_khachdat("");
        load_trangthai_donhang();
        close_modal("form_update_ngaythuchien");
      }
    );
  }
}

function load_hanghoa_dichvu(phanloai, loai, e) {
  const sodienthoai =
    $("#dienthoai_add").val() != "" ? $("#dienthoai_add").val() : "";
  const search =
    e != ""
      ? $(e)
          .val()
          .toUpperCase()
          .normalize("NFD")
          .replace(/[\u0300-\u036f]/g, "")
          .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"))
      : e;
  $.post(
    "ajax/banhang/load_hanghoa_dichvu.php",
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
function active_filter(e) {
  $(e).parent().find(".filter_btn").removeClass("border-b");
  $(e).addClass("border-b");
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
}

function load_danmuc_yeucau(phanloai) {
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
          <td class="px-4 font-thin py-2 flex justify-center items-center"><input type="checkbox" class='w-[20px] h-[20px]' onclick="edit_noidung_yeucau(this, 'MS')"  name="massage" data-massage='${data[i].tenloai}' value="${data[i].msloai}"></td>
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
          <td class="px-4 font-thin py-2 flex justify-center items-center"><input class='w-[20px] h-[20px]' type="radio" name="huongdau" onclick="edit_noidung_yeucau(this, 'HD')" data-huongdau='${data[i].tenloai}' value='${data[i].msloai}'></td>
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
          <td class="px-4 font-thin py-2 flex justify-center items-center"><input class='w-[20px] h-[20px]' type="radio" name="daugoi" onclick="edit_noidung_yeucau(this, 'DA')" data-daugoi='${data[i].tenloai}' value='${data[i].msloai}'></td>
          </tr>
            `);
        }
      }
    );
  }
}

function load_banhang_line() {
  const soct = location.pathname.split("/").splice(-1)[0];
  $.post(
    "ajax/banhang/load_banhang_line.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {
      $("#list_banhang_line").html(data);
      load_thanhtien();
      load_kehoachdieutri();
    }
  );
}

function add_banhang_line(msctkm, ptgiam, mshh, colieutrinh, nhom_hh) {
  const dienthoai = $("#dienthoai_add").val();
  const msnguoithan = $("#msnguoithan_add").val();
  const tenkh = $("#tenkh_add").val();
  const ngaysinh = $("#ngaysinh_add").val();
  const diachi = $("#diachi_add").val();
  const ngayhientai = $("#ngayhientai").val();
  const soct = location.pathname.split("/").splice(-1)[0];
  const nhom_kh = $("#nhom_add").val();
  const loai_donhang = $("#loai_dathen").val();
  const bbdc = $("#ID_bbdc").val();
  const bbns = $("#ID_bbns").val();

  if (loai_donhang == 1) {
    if (dienthoai < 10 || tenkh == "") {
      open_modal("form_error");
    } else {
      $.post(
        "ajax/banhang/add_banhang_line.php",
        {
          dienthoai: dienthoai,
          msnguoithan: msnguoithan,
          soct: soct,
          colieutrinh: colieutrinh,
          nhom_kh: nhom_kh,
          msctkm: msctkm,
          ptgiam: ptgiam,
          mshh: mshh,
          nhom_hh: nhom_hh,
        },
        function (data, textStatus, jqXHR) {
          load_banhang_line();
          load_banhang_khachhang("");
        }
      );
    }
  } else {
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
        "ajax/banhang/add_banhang_line.php",
        {
          dienthoai: dienthoai,
          soct: soct,
          colieutrinh: colieutrinh,
          msnguoithan: msnguoithan,
          nhom_kh: nhom_kh,
          msctkm: msctkm,
          ptgiam: ptgiam,
          mshh: mshh,
          nhom_hh: nhom_hh,
        },
        function (data, textStatus, jqXHR) {
          load_banhang_line();
          load_banhang_khachhang("");
        }
      );
    }
  }
}

function open_delete_banhang_line(tenhanghoa, idchidinh) {
  $("#ten_hanghoa_delete").html(tenhanghoa);
  $("#id_chidinh_delete").val(idchidinh);
  open_modal("form_delete_banhangline");
}

function open_giamgia_banhang_line(
  tenhanghoa,
  idchidinh,
  sotien,
  soct,
  ptgiam
) {
  $("#ten_hanghoa_giamgia").html(tenhanghoa);
  $("#id_chidinh_giamgia").val(idchidinh);
  $("#ptgiamgia_update").val(ptgiam);
  $("#phantramgiam").val(ptgiam);
  $("#soct_giamgia").val(soct);
  $("#sotien_chuagiam").val(
    sotien.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  open_modal("form_giamgia_banhang");
  $("#loaigiam").val("ptgiam");
  tinh_ptgiamgia();
}

function tinh_ptgiamgia() {
  const loaigiam = $("#loaigiam option:selected").val();

  document.getElementById("ptgiamgia_update").maxLength = "100";
  if (loaigiam == "ptgiam") {
    const ptgiamgia = $("#ptgiamgia_update").val();
    document.getElementById("ptgiamgia_update").maxLength = "2";
    $("#phantramgiam").val(ptgiamgia);
    const sotien = $("#sotien_chuagiam").val().replace(/[.]/g, "");
    const conlai = sotien - (sotien * ptgiamgia) / 100;
    $("#conlai_update").val(
      Math.round(conlai)
        .toString()
        .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
    );
  } else {
    const ptgiamgia = $("#ptgiamgia_update").val().replace(/[.]/g, "");
    const sotien = $("#sotien_chuagiam").val().replace(/[.]/g, "");
    let phantram = (ptgiamgia / sotien) * 100;
    $("#phantramgiam").val(phantram);
    const conlai = sotien - (sotien * phantram) / 100;
    $("#conlai_update").val(
      Math.round(conlai)
        .toString()
        .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
    );
  }
}

function change_loaigiam() {
  const loaigiam = $("#loaigiam option:selected").val();
  const sotien = $("#sotien_chuagiam").val().replace(/[.]/g, "");
  const ptgiamgia = $("#phantramgiam").val();

  if (loaigiam == "ptgiam") {
    $("#ptgiamgia_update").val(ptgiamgia);
  } else {
    const conlai = sotien - (sotien * ptgiamgia) / 100;
    const tiengiam = sotien - conlai;
    $("#ptgiamgia_update").val(
      tiengiam.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
    );
  }
}
function update_giamgia() {
  const soct = $("#soct_giamgia").val();
  const idchidinh = $("#id_chidinh_giamgia").val();
  const ptgiam = $("#phantramgiam").val();
  $.post(
    "ajax/banhang/update_banhangline_giamgia.php",
    { soct: soct, idchidinh: idchidinh, ptgiam: ptgiam },
    function (data, textStatus, jqXHR) {
      load_banhang_line();
      close_modal("form_giamgia_banhang");
      load_banhang_khachhang("");
    }
  );
}

function delete_banhang_line() {
  const soct = location.pathname.split("/").splice(-1)[0];
  const idchidinh = $("#id_chidinh_delete").val();

  $.post(
    "ajax/banhang/delete_banhang_line.php",
    { soct: soct, idchidinh: idchidinh },
    function (data, textStatus, jqXHR) {
      close_modal("form_delete_banhangline");
      load_banhang_line();
    }
  );
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
  } else {
    $("#sotien_voucher").val(0);
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

function load_thanhtien_edit() {
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
        (tongtien - sotienvoucher > 0 ? tongtien - sotienvoucher : 0)
          .toString()
          .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
      );
      if (tongcongvat == 0) {
        $("#btn_update_banhang").removeClass("hidden");
        $("#btn_open_modal").addClass("hidden");
      }
      load_banhang_khachhang("");
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

function load_kehoachdieutri() {
  const soct = location.pathname.split("/").splice(-1)[0];
  $("#kehoachdieutri").html("");
  $("#list_kehoachdieutri").addClass("hidden");
  $.post(
    "ajax/banhang/load_kehoachdieutri.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {
      let mslieutrinh_ss = "";
      for (let i = 0; i < data.length; i++) {
        let mslieutrinh = data[i].mslieutrinh;
        var tenhh_html = "";
        if (mslieutrinh_ss != mslieutrinh) {
          mslieutrinh_ss = mslieutrinh;
          tenhh_html = `<td class='px-4 py-2 tablet:min-w-[150px]'>${data[i].dichvu}</td>`;
        } else {
          $("#tr_" + mslieutrinh)
            .find("td:eq(1)")
            .attr("rowspan", i + 1);
        }
        $("#kehoachdieutri").append(`<tr id="tr_${mslieutrinh}">
        <td class='px-4 py-2 text-center '>${i + 1}</td>
        ${tenhh_html}
        <td class='px-4 py-2 text-center'>${data[i].ngayhen}</td>
        <td class='px-4 py-2 text-start'>${data[i].tenlieutrinh}</td>
     </tr>`);
      }

      if (data != "") {
        $("#list_kehoachdieutri").removeClass("hidden");
      }
    }
  );
}
function open_modal_chitiet_lieutrinh(
  soct,
  idchidinh,
  mslieutrinh,
  tenlieutrinh
) {
  open_modal("form_chitiet_lieutrinh");
  $("#item_chitiet_lieutrinh").addClass("hidden");

  $("#tendichvu").html("Liệu trình " + tenlieutrinh);
  $.post(
    "ajax/banhang/load_chitiet_hanghoa_lieutrinh.php",
    { soct: soct, idchidinh: idchidinh, mslieutrinh: mslieutrinh },
    function (data, textStatus, jqXHR) {
      $("#list_lieutrinh").html(data);
    }
  );
}

function open_edit_chitiet_lieutrinh(e) {
  const hidden_ngayhen = $(e).parent().parent().find(".ngayhen");
  const show_ngayhen_edit = $(e).parent().parent().find(".ngayhen_edit");
  const hidden_tenhanghoa = $(e).parent().parent().find(".tenhanghoa");
  const show_tenhanghoa_edit = $(e).parent().parent().find(".tenhanghoa_edit");
  const btn_save = $(e).parent().find(".__btn_save");
  hidden_ngayhen.addClass("hidden");
  show_ngayhen_edit.removeClass("hidden");
  hidden_tenhanghoa.addClass("hidden");
  show_tenhanghoa_edit.removeClass("hidden");
  btn_save.removeClass("hidden");
  $(e).addClass("hidden");
}

function edit_chitiet_lieutrinh(e, soct, idchidinh, mshh, mslieutrinh) {
  const tenhh = $(e).parent().parent().find(".input_tenhh_edit").val();
  const ngayhen = $(e).parent().parent().find(".input_ngayhen_edit").val();
  const giohen = $(e).parent().parent().find(".input_giohen_edit").val();
  $.post(
    "ajax/banhang/edit_chitiet_lieutrinh.php",
    {
      soct: soct,
      idchidinh: idchidinh,
      mshh: mshh,
      tenhh: tenhh,
      ngayhen: ngayhen,
      giohen: giohen,
    },
    function (data, textStatus, jqXHR) {
      $.post(
        "ajax/banhang/load_chitiet_hanghoa_lieutrinh.php",
        { soct: soct, idchidinh: idchidinh, mslieutrinh: mslieutrinh },
        function (data, textStatus, jqXHR) {
          $("#list_lieutrinh").html(data);
          load_banhang_line();
        }
      );
    }
  );
}

function open_delete_chitiet_lieutrinh(
  soct,
  idchidinh,
  tenhh,
  mshh,
  mslieutrinh
) {
  open_modal("form_delete_chitiet_lieutrinh");
  $("#ten_lieutrinh_delete").html(tenhh);
  $("#soct_lieutrinh_delete").val(soct);
  $("#idchidinh_lieutrinh_delete").val(idchidinh);
  $("#mshh_lieutrinh_delete").val(mshh);
  $("#mslieutrinh_cha_delete").val(mslieutrinh);
}

function open_delete_dathu_fail() {
  open_modal("form_error");
  $("#text_thongbao").html("Phiếu đã thu hoặc đã thực hiện");
}

function delete_chitiet_lieutrinh(e, loai) {
  const soct = $(e).parent().find("#soct_lieutrinh_delete").val();
  const idchidinh = $(e).parent().find("#idchidinh_lieutrinh_delete").val();
  const mshh = $(e).parent().find("#mshh_lieutrinh_delete").val();
  const mslieutrinh = $(e).parent().find("#mslieutrinh_cha_delete").val();
  $.post(
    "ajax/banhang/delete_chitiet_lieutrinh.php",
    { soct: soct, idchidinh: idchidinh, mshh: mshh },
    function (data, textStatus, jqXHR) {
      $.post(
        "ajax/banhang/load_chitiet_hanghoa_lieutrinh.php",
        { soct: soct, idchidinh: idchidinh, mslieutrinh: mslieutrinh },
        function (data, textStatus, jqXHR) {
          $("#item_chitiet_lieutrinh").addClass("hidden");
          $("#list_lieutrinh").html(data);
          close_modal("form_delete_chitiet_lieutrinh");
          if (loai == "from_edit") {
            load_banhang_khachhang("");
          } else {
            load_banhang_line();
          }
        }
      );
    }
  );
}

function load_chitiet_mota_dichvu_lieutrinh(
  e,
  soct,
  idchidinh,
  mslieutrinh,
  tenlieutrinh
) {
  $(".item_lieutrinh").removeClass("active_item");
  $(e).addClass("active_item");
  $("#tenlieutrinh").html(tenlieutrinh);
  $("#item_chitiet_lieutrinh").removeClass("hidden");
  $.post(
    "ajax/banhang/load_chitiet_mota_dichvu_lieutrinh.php",
    { soct: soct, idchidinh: idchidinh, mslieutrinh: mslieutrinh },
    function (data, textStatus, jqXHR) {
      $("#chitiet_lieutrinh").html(data);
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
            load_lichsu_khachhang();
          }

          if (data == "") {
            $("#form_khachhang").addClass("hidden");
            load_hanghoa_dichvu("lieutrinh", "", "");
            load_hanghoa_dichvu("dichvu", "", "");
            load_hanghoa_dichvu("hanghoa", "", "");
          }
        }
      );
    }
    if (value.length == 10) {
      load_hanghoa_dichvu("lieutrinh", "", "");
      load_hanghoa_dichvu("dichvu", "", "");
      load_hanghoa_dichvu("hanghoa", "", "");
    }
    if (value.length == 0) {
      load_hanghoa_dichvu("lieutrinh", "", "");
      load_hanghoa_dichvu("dichvu", "", "");
      load_hanghoa_dichvu("hanghoa", "", "");
    }
  }
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
  $("#error_add_nguoithan").addClass("hidden");

  if (ten_nguoithan != "" || ten_nguoithan != "") {
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
  } else {
    $("#error_add_nguoithan").removeClass("hidden");
  }
}

function add_khachhang(
  mskh,
  sdt,
  tenkh,
  gioitinh,
  diachi,
  ngaysinh,
  tennguoithan,
  ms_nguoithan,
  loai
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
  $("#sdt_nguoithan").val(sdt);
  load_voucher();
  load_ms_nguoithan_new(sdt);
  load_lichsu_khachhang();
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

function move_lieutrinh(msdichvu, mslieutrinh, thutu, loai) {
  $.post(
    "ajax/dichvu/lieutrinh/move_lieutrinh.php",
    { msdichvu: msdichvu, mslieutrinh: mslieutrinh, thutu: thutu, loai: loai },
    function (data, textStatus, jqXHR) {
      $.post(
        "ajax//dichvu/lieutrinh/load_lieutrinh.php",
        { msdichvu: msdichvu },
        function (data, textStatus, jqXHR) {
          $("#list_lieutrinh").html(data);
        }
      );
    }
  );
}
function open_form_thutruoc() {
  const dienthoai = $("#dienthoai_add").val();
  const tenkh = $("#tenkh_add").val();
  if (dienthoai.length == 10 && tenkh != "") {
    open_modal("form_thutruoc");
    const tongtien = $("#tongtien").val();
    const tongcongvat = $("#tongcongvat").val();
    $("#tongcong_thanhtoan").val(
      tongtien.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
    );
    $("#sotien_thutruoc").val(
      tongcongvat.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
    );
    $("#nolai").val(0);
    $("#nganquy_thutruoc").val("TM");
    $("#qr-code").empty();
  } else {
    open_modal("form_error");
  }
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

function open_edit_banhang(soct) {
  $.post(
    "ajax/banhang/delete_banhangline_xoatam.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {
      location.href = `SaleEdit/${soct}`;
    }
  );
}

async function load_banhang_khachhang(vitri) {
  const soct = location.pathname.split("/").splice(-1)[0];
  $("#btn_open_modal").removeClass("hidden");
  var tongcong = 0;
  var sotienvoucher = 0;
  var sotienthanhtoan = 0;
  $.post(
    "ajax/banhang/load_khachhang_edit.php",
    { soct: soct },
    async function (data, textStatus, jqXHR) {
      const dathanhtoan = data[0].dathanhtoan;
      if (vitri == "edit") {
        $("#ngayhientai").val(data[0].ngayhen);
        $("#giohen_khachdat").val(data[0].giohen);
      }
      $.post(
        "ajax/banhang/load_thanhtien.php",
        { soct: soct },
        function (data, textStatus, jqXHR) {
          tongcong = data[0].tongtien;
          $("#tongtien").val(
            tongcong.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
          );
          $.post(
            "ajax/banhang/load_sotien_voucher.php",
            { soct: soct },
            function (data, textStatus, jqXHR) {
              sotienvoucher = data == "" ? 0 : data[0].giathu;
              sotienthanhtoan = dathanhtoan - sotienvoucher;
              const tongcongconlai = tongcong - sotienthanhtoan - sotienvoucher;
              $("#tongcongvat").val(
                (tongcong - sotienvoucher)
                  .toString()
                  .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
              );
              $("#dathu_edit").val(
                dathanhtoan
                  .toString()
                  .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
              );
              $("#tongcongconlai").val(
                tongcongconlai
                  .toString()
                  .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
              );
            }
          );
        }
      );
    }
  );
}

async function load_thongtin_khachhang() {
  const soct = location.pathname.split("/").splice(-1)[0];
  $.post(
    "ajax/banhang/load_khachhang_edit.php",
    { soct: soct },
    async function (data, textStatus, jqXHR) {
      $.post(
        "ajax/banhang/load_chitiet_khachhang_edit.php",
        { value: data[0].sodienthoai },
        function (data, textStatus, jqXHR) {
          add_khachhang(
            `${data[0].mskh}`,
            `${data[0].sodienthoai}`,
            `${data[0].tenkh}`,
            `${data[0].nhom_kh}`,
            `${data[0].ptgiam}`,
            `${data[0].tennhom}  ( ${data[0].ptgiam}%)`,
            `${data[0].ten_nguoithan}`,
            `${data[0].ms_nguoithan}`,
            "edit"
          );
        }
      );
    }
  );
}

function load_sotien_voucher() {
  const soct = location.pathname.split("/").splice(-1)[0];

  $.post(
    "ajax/banhang/load_sotien_voucher.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {
      if (data != "") {
        $("#sotien_voucher").val(
          data[0].giathu.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
        );
        $("#list_voucher").html(
          `<option value='${data[0].giathu}' data-msvoucher='${data[0].mshh}'>${data[0].tenhh}</option>`
        );
      }
    }
  );
}

function tinh_nolai_edit(e) {
  const tongcong = $("#tongcong_thanhtoan").val().replaceAll(".", "");
  const dathu = $("#sotien_dathu").val().replaceAll(".", "");
  const thutruoc = $(e).val().replaceAll(".", "");
  const sotienvoucher = $("#sotien_voucher").val();

  $("#nolai").val(
    (tongcong - dathu - thutruoc - sotienvoucher)
      .toString()
      .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
}

function load_noidung_da_yeucau() {
  const sodienthoai = $("#dienthoai_add").val();
  $.post(
    "ajax/banhang/load_noidung_da_yeucau.php",
    { sodienthoai: sodienthoai },
    function (list, textStatus, jqXHR) {
      const allMassage = $("input[name='massage']");
      const allHuongdau = $("input[name='huongdau']");
      const allDaugoi = $("input[name='daugoi']");
      for (let a = 0; a < allMassage.length; a++) {
        for (let r = 0; r < list.length; r++) {
          if (list[r].loai == "MS") {
            if (allMassage[a].value == list[r].mshh) {
              allMassage[a].checked = true;
            }
          }
        }
      }
      for (let a = 0; a < allHuongdau.length; a++) {
        for (let r = 0; r < list.length; r++) {
          if (list[r].loai == "HD") {
            if (allHuongdau[a].value == list[r].mshh) {
              allHuongdau[a].checked = true;
            }
          }
        }
      }
      for (let a = 0; a < allDaugoi.length; a++) {
        for (let r = 0; r < list.length; r++) {
          if (list[r].loai == "DA") {
            if (allDaugoi[a].value == list[r].mshh) {
              allDaugoi[a].checked = true;
            }
          }
        }
      }
    }
  );
}

function edit_noidung_yeucau(e, loai) {
  const soct = location.pathname.split("/").splice(-1)[0];
  const sodienthoai = $("#dienthoai_add").val();
  const yeucau = $(e).is(":checked");
  const maso = $(e).val();
  let ten = "";
  if (loai == "MS") {
    ten = $(e).data("massage");
  }
  if (loai == "HD") {
    ten = $(e).data("huongdau");
  }
  if (loai == "DA") {
    ten = $(e).data("daugoi");
  }
  $.post(
    "ajax/banhang/edit_noidung_yeucau.php",
    {
      soct: soct,
      sodienthoai: sodienthoai,
      maso: maso,
      ten: ten,
      yeucau: yeucau,
      loai: loai,
    },
    function (data, textStatus, jqXHR) {
      load_noidung_da_yeucau();
    }
  );
}

function open_form_thutruoc_edit() {
  load_noidung_da_yeucau();
  open_modal("form_thutruoc");
  const tongcongvat = $("#tongtien").val().replaceAll(".", "");
  const dathu = $("#dathu_edit").val().replaceAll(".", "");
  const tongcongconlai = $("#tongcongconlai").val().replaceAll(".", "");
  const sotienvoucher = $("#sotien_voucher").val();
  $("#tongcong_thanhtoan").val(
    tongcongvat.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#sotien_thanhtoan").val(
    tongcongconlai.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#sotien_dathu").val(
    dathu.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#nolai").val(0);
}

function update_banthangheader_edit() {
  const tongcong = $("#tongtien").val().replaceAll(".", "");
  const sotien = $("#sotien_thanhtoan").val().replaceAll(".", "");
  const nganquy = $("#nganquy_thutruoc :checked").val();
  const mskh = $("#mskh_add").val();
  const tenkh = $("#tenkh_add").val();
  const sodienthoai = $("#dienthoai_add").val();
  const nhom = $("#nhom_add").val();
  const soct = location.pathname.split("/").splice(-1)[0];
  const msvoucher = $("#list_voucher").find(":selected").data("msvoucher");
  const tenvoucher = $("#list_voucher").find(":selected").data("tenvoucher");
  const sotienvoucher = $("#list_voucher option:selected").val();
  const inskl = $("#thamso_inskl").val();
  const ngaydat = $("#ngayhientai").val();
  const qltk = $("#thamso_qltk").val();

  if (sodienthoai != "" && tenkh != "") {
    $.post(
      "ajax/banhang/update_banhangheader.php",
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
        sodienthoai: sodienthoai,
        tongcong: tongcong,
        sotien: sotien,
        nganquy: nganquy,
        nhom: nhom,
        msvoucher: msvoucher,
        tenvoucher: tenvoucher,
        sotienvoucher: sotienvoucher,
        ngaydat: ngaydat,
        qltk: qltk,
      },
      function (data, textStatus, jqXHR) {
        if (sotien > 0 && inskl == 1) {
          $.post(
            "ajax/banhang/inphieu_banhang.php",
            { soct: soct, qr_img: "" },
            function (data, textStatus, jqXHR) {
              $.print(data);
            }
          );
          setTimeout(function time() {
            location.href = `ListSale`;
          }, 1000);
        } else {
          location.href = `ListSale`;
        }
      }
    );
  } else {
    alert("Chưa nhập thông tin khách hàng");
  }
}

function open_huy_banhang_edit() {
  open_modal("form_huy_banhang");
}

function delete_banhangline_xoatam() {
  const soct = location.pathname.split("/").splice(-1)[0];

  $.post(
    "ajax/banhang/delete_banhangline_xoatam.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {
      location.href = `ListSale`;
    }
  );
}

function open_chitiet_banhang_header(e, soct) {
  open_modal("form_show_chitiet_banhang");
  $.post(
    "ajax/banhang/load_chitiet_banhang_header.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {
      $("#list_hanghoa").html(data);
      $("#item_chitiet_hanghoa").addClass("hidden");
    }
  );
}

function load_chitiet_hanghoa(soct, idchidinh, mslieutrinh, tenlieutrinh) {
  $.post(
    "ajax/banhang/load_chitiet_hanghoa.php",
    {
      soct: soct,
      idchidinh: idchidinh,
      mslieutrinh: mslieutrinh,
      vitri: "banhang",
    },
    function (data, textStatus, jqXHR) {
      $("#tenhanghoa").html(tenlieutrinh);
      $("#item_chitiet_hanghoa").removeClass("hidden");
      $("#chitiet_hanghoa").html(data);
    }
  );
}

function show_chitiet_lieutrinh(e, mshh) {
  $(e).parent().find(".icon_hidden").removeClass("hidden");
  $(e).parent().find(".icon_show").addClass("hidden");
  $("." + mshh).addClass("hidden");
}

function hidden_chitiet_lieutrinh(e, mshh) {
  $(e).parent().find(".icon_hidden").addClass("hidden");
  $(e).parent().find(".icon_show").removeClass("hidden");
  $("." + mshh).removeClass("hidden");
}

function open_modal_thutien(soct, tongtien, dathanhtoan, mskh, tenkh) {
  $("#soct_thuchi").val(soct);
  $("#mskh_thanhtoan").val(mskh.replaceAll(".", ""));
  $("#tenkh_thanhtoan").html(tenkh);
  $("#tongcong_thanhtoan").val(
    tongtien.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#sotien_dathu").val(
    dathanhtoan.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#sotien_thanhtoan").val(
    (tongtien - dathanhtoan)
      .toString()
      .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#nganquy_thutruoc").val("TM");
  $("#qr-code").empty();
  $("#qr_code_hidden").empty();

  open_modal("form_thutien");
}

function thutien_donhang() {
  const tongcong = $("#tongcong_thanhtoan").val().replaceAll(".", "");
  const sotien_dathu = $("#sotien_dathu").val().replaceAll(".", "");
  const sotien = $("#sotien_thanhtoan").val().replaceAll(".", "");
  const nganquy = $("#nganquy_thutruoc :checked").val();
  const soct = $("#soct_thuchi").val();
  const mskh = $("#mskh_thanhtoan").val();
  const tenkh = $("#tenkh_thanhtoan").html();
  const makhoanmuc = $("#ID_thubanhang").val();
  const inskl = $("#thamso_inskl").val();

  $.post(
    "ajax/banhang/thutien_donhang.php",
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
      tongcong: tongcong,
      sotien_dathu: sotien_dathu,
      sotien: sotien,
      nganquy: nganquy,
      makhoanmuc: makhoanmuc,
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
      }
      close_modal("form_thutien");
      load_banhang_header_henkhach("");
    }
  );
}

function update_tuvan() {
  const soct = location.pathname.split("/").splice(-1)[0];
  const tuvan = CKEDITOR.instances["tuvan_add"].getData();
  $.post(
    "ajax/banhang/update_tuvan.php",
    { soct: soct, tuvan: tuvan },
    function (data, textStatus, jqXHR) {
      load_loai_dathen();
      close_modal("form_tuvan");
    }
  );
}

function open_add_chiso_sinhhieu(
  soct,
  mach,
  nhietdo,
  huyetap,
  nhiptho,
  chieucao,
  cannang
) {
  open_modal("form_chisosinhhieu");
  $("#soct_chisosinhhieu").val(soct);
  $("#mach_chisosinhhieu").val(mach);
  $("#nhietdo_chisosinhhieu").val(nhietdo);
  $("#huyetap_chisosinhhieu").val(huyetap);
  $("#nhiptho_chisosinhhieu").val(nhiptho);
  $("#chieucao_chisosinhhieu").val(chieucao);
  $("#cannang_chisosinhhieu").val(cannang);
}
function update_chisosinhhieu() {
  const soct = $("#soct_chisosinhhieu").val();
  const mach = $("#mach_chisosinhhieu").val();
  const nhietdo = $("#nhietdo_chisosinhhieu").val();
  const huyetap = $("#huyetap_chisosinhhieu").val();
  const nhiptho = $("#nhiptho_chisosinhhieu").val();
  const chieucao = $("#chieucao_chisosinhhieu").val();
  const cannang = $("#cannang_chisosinhhieu").val();
  $.post(
    "ajax/banhang/update_chisosinhhieu.php",
    {
      soct: soct,
      mach: mach,
      nhietdo: nhietdo,
      huyetap: huyetap,
      nhiptho: nhiptho,
      chieucao: chieucao,
      cannang: cannang,
    },
    function (data, textStatus, jqXHR) {
      load_banhang_header_henkhach("");
      close_modal("form_chisosinhhieu");
    }
  );
}
function load_trangthai_donhang() {
  $.post(
    "ajax/banhang/load_trangthai_donhang.php",
    {},
    function (data, textStatus, jqXHR) {
      $("#sl_chuatiepnhan").html(data[0].ChuaDen);
      $("#sl_chothuchien").html(data[0].ChoThucHien);
      $("#sl_dangthuchien").html(data[0].DangThucHien);
      $("#sl_dathuchien").html(data[0].DaThucHien);
    }
  );
}

function open_khachhang_danhgia(e, soct, sdt, nhanvien, dichvu) {
  open_modal("form_khachhang_danhgia");
  $("#btn_sent_danhgia").addClass("hidden");
  $("#soct_danhgia").val(soct);
  $("#sdt_danhgia").val(sdt);
  $("#nhanvien_danhgia").val(nhanvien);
  $("#dichvu_danhgia").val(dichvu);
}
function chon_danhgia(e, danhgia) {
  $(".danhgia_cl").removeClass("text-[red]");
  $(e).addClass("text-[red]");
  $("#trangthai_danhgia").val(danhgia);
  $("#btn_sent_danhgia").removeClass("hidden");
}
function post_danhgia() {
  const soct = $("#soct_danhgia").val();
  const sdt = $("#sdt_danhgia").val();
  const nhanvien = $("#nhanvien_danhgia").val();
  const dichvu = $("#dichvu_danhgia").val();
  const danhgia = $("#trangthai_danhgia").val();
  $.post(
    "ajax/banhang/post_danhgia.php",
    {
      soct: soct,
      sdt: sdt,
      nhanvien: nhanvien,
      dichvu: dichvu,
      danhgia: danhgia,
    },
    function (data, textStatus, jqXHR) {
      close_modal("form_khachhang_danhgia");
    }
  );
}

function load_img_qr_chuyenkhoan(soct) {
  $.post(
    "ajax/banhang/load_qr_code_banhang.php",
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

function open_print_banhang(soct, loai) {
  var qr_img = "";
  if (loai == "thutien") {
    qr_img = document
      .getElementById("qr_code_hidden")
      .getElementsByTagName("img")[0].src;
  }
  $.post(
    "ajax/banhang/inphieu_banhang.php",
    { soct: soct, qr_img: qr_img },
    function (data, textStatus, jqXHR) {
      $.print(data);
    }
  );
}

function load_danhgia() {
  $("#icon_warning").addClass("hidden");
  const sdt = $("#dienthoai_add").val();
  $.post(
    "ajax/banhang/load_danhgia.php",
    { sdt: sdt, mshh: "1" },
    function (data, textStatus, jqXHR) {
      if (sdt.length == 10) {
        if (data.length != 0) {
          $.post(
            "ajax/banhang/load_danhgia.php",
            { sdt: sdt, mshh: "" },
            function (danhgia, textStatus, jqXHR) {
              $("#icon_warning").removeClass("hidden");
              $("#list_danhgia").html("");
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

function open_xacnhan_donhang(
  soct,
  tenkh,
  sodienthoai,
  ngaysinh,
  diachi,
  loai
) {
  open_modal("form_update_ngaythuchien");
  const bbdc = $("#ID_bbdc").val();
  const bbns = $("#ID_bbns").val();
  $("#soct_update").val(soct);
  $("#loai_update").val(loai);
  $("#sodienthoai_update").val(sodienthoai);
  if (ngaysinh == "00/00/0000") {
    $("#ngaysinh_add").val("");
  } else {
    $("#ngaysinh_add").val(ngaysinh);
  }
  $("#diachi_add").val(diachi);
  $("#tenkh_update").html(tenkh);
  $("#dathen_error").addClass("hidden");

  if (bbdc == "1") {
    $("#form_diachi_update").removeClass("hidden");
  }
  if (bbns == "1") {
    $("#form_ngaysinh_update").removeClass("hidden");
  }
}

function check_ngaythuchien(rowid, sodienthoai, thuchien) {
  $.post(
    "ajax/banhang/check_ngaythuchien.php",
    { rowid: rowid, thuchien: thuchien },
    function (data, textStatus, jqXHR) {}
  );
}

function find_khachhang_khachdat() {
  if (typeof timer !== undefined) {
    clearTimeout(this.timer);
  }
  this.timer = setTimeout(a, 500);
  function a() {
    const value = $("#dienthoai_add_khachdat").val();
    $("#form_khachhang_khachdat").addClass("hidden");
    $("#mskh_add_khachdat").val("");
    $("#nhom_add_khachdat").val("");
    $("#tenkh_add_khachdat").val("");
    $("#tennhom_add_khachdat").val("");
    $("#conno_khachhang_khachdat").val("");
    $("#ptgiam_load_khachdat").val(0);
    if (value.length > 2) {
      $("#form_khachhang_khachdat").removeClass("hidden");
      $("#icon_add_nguoithan_khachdat").addClass("hidden");

      $.post(
        "ajax/banhang/find_khachhang.php",
        { value: value },
        function (data, textStatus, jqXHR) {
          $("#list_khachhang_khachdat").html("");
          for (let i = 0; i < data.length; i++) {
            $("#list_khachhang_khachdat").append(`
              <tr class="hover:cursor-pointer hover:bg-[#ddd]" >
              <td class='px-4 py-2  ' onclick="add_khachhang_khachdat('${
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
              <td class='px-4 py-2 text-left font_semi whitespace-nowrap' onclick="add_khachhang_khachdat('${
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
                  : `<p onclick="add_khachhang_khachdat('${data[i].mskh}', '${data[i].sodienthoai}', '${data[i].tenkh}', '${data[i].gioitinh}','${data[i].diachi}', '${data[i].ngaysinh}','${data[i].ten_nguoithan}','${data[i].ms_nguoithan}','add','${data[i].nghenghiep}')">${data[i].ten_nguoithan}</p>`
              }
              </div></td>
              <td onclick="add_khachhang_khachdat('${data[i].mskh}', '${
              data[i].sodienthoai
            }', '${data[i].tenkh}', '${data[i].gioitinh}','${
              data[i].diachi
            }', '${data[i].ngaysinh}','${data[i].ten_nguoithan}','${
              data[i].ms_nguoithan
            }','add','${data[i].nghenghiep}')" class='px-4 py-2 text-center' >${
              data[i].gioitinh
            }</td>
              <td onclick="add_khachhang_khachdat('${data[i].mskh}', '${
              data[i].sodienthoai
            }', '${data[i].tenkh}', '${data[i].gioitinh}','${
              data[i].diachi
            }', '${data[i].ngaysinh}','${data[i].ten_nguoithan}','${
              data[i].ms_nguoithan
            }','add','${data[i].nghenghiep}')" class='px-4 py-2 text-center'>${
              data[i].tennhom
            }</td>
              <td onclick="add_khachhang_khachdat('${data[i].mskh}', '${
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
            $("#tenkh_add_khachdat").attr("readonly", true);
            $("#ngaysinh_add_khachdat").attr("readonly", true);
            $("#diachi_add_khachdat").attr("readonly", true);
            $("#dienthoai_add_khachdat").val(value);
            $("#tenkh_add_khachdat").val(data[0].tenkh);
            $("#mskh_add_khachdat").val(data[0].mskh);
            $("#msnguoithan_add_khachdat").val(data[0].ms_nguoithan);
            $("#ngaysinh_add_khachdat").val(data[0].ngaysinh);
            $("#diachi_add_khachdat").val(data[0].diachi);
            $("#nghenghiep_add_khachdat").val(data[0].nghenghiep);
            $("#sdt_nguoithan_khachdat").val(value);
            load_ms_nguoithan_new(value);
            $("#nu_khachdat").prop("disabled", false);
            $("#nam_khachdat").prop("disabled", false);

            if (data[0].gioitinh == "NAM") {
              $("#nam_khachdat").prop("checked", true);
            } else {
              $("#nu_khachdat").prop("checked", true);
            }

            $("#form_khachhang_khachdat").addClass("hidden");
            $("#icon_add_nguoithan_khachdat").removeClass("hidden");
          }

          if (data == "") {
            $("#form_khachhang_khachdat").addClass("hidden");
          }
        }
      );
    }
  }
}

function add_khachhang_khachdat(
  mskh,
  sdt,
  tenkh,
  gioitinh,
  diachi,
  ngaysinh,
  tennguoithan,
  ms_nguoithan,
  loai,
  nghenghiep
) {
  $("#dienthoai_add_khachdat").val(sdt);
  if (tennguoithan == "") {
    $("#tenkh_add_khachdat").val(tenkh);
  } else {
    $("#tenkh_add_khachdat").val(tennguoithan);
  }
  $("#mskh_add_khachdat").val(mskh);
  $("#msnguoithan_add_khachdat").val(ms_nguoithan);
  $("#ngaysinh_add_khachdat").val(ngaysinh);
  $("#diachi_add_khachdat").val(diachi);
  $("#nu_khachdat").prop("disabled", false);
  $("#nam_khachdat").prop("disabled", false);
  $("#sdt_nguoithan_khachdat").val(sdt);
  load_ms_nguoithan_new(sdt);

  if (gioitinh == "NAM") {
    $("#nam_khachdat").prop("checked", true);
  } else {
    $("#nu_khachdat").prop("checked", true);
  }
  $("#icon_add_nguoithan_khachdat").removeClass("hidden");
  $("#form_khachhang_khachdat").addClass("hidden");
}

function add_khachdat() {
  $("#error_add_benhnhan").addClass("hidden");
  const mskh = $("#mskh_add_khachdat").val();
  const tenkh = $("#tenkh_add_khachdat").val();
  const ngaysinh = $("#ngaysinh_add_khachdat").val();
  const diachi = $("#diachi_add_khachdat").val();
  const sodienthoai = $("#dienthoai_add_khachdat").val().replaceAll(".", "");
  const gioitinh = $("input[name=gioitinh_khachdat]:checked").val();
  const ngaydat = $("#ngay_khachdat").val();
  const giodat = $("#giohen_khachdat").val();
  const ghichu = $("#ghichu_add_khachdat").val();
  const msnguoithan = $("#msnguoithan_add_khachdat").val();

  if (sodienthoai != "" && tenkh != "" && giodat != "") {
    $.post(
      "ajax/tiepnhan/add_khachdat.php",
      {
        mskh: mskh,
        tenkh: tenkh,
        ngaysinh: ngaysinh == "" ? "0000-00-00" : ngaysinh,
        diachi: diachi,
        gioitinh: gioitinh,
        sodienthoai: sodienthoai,
        ghichu: ghichu,
        ngaydat: ngaydat,
        giodat: giodat,
        msnguoithan: msnguoithan,
      },
      async function (data, textStatus, jqXHR) {
        close_modal("form_add_khachdat");
        $("#mskh_add_khachdat").val("");
        $("#tenkh_add_khachdat").val("");
        $("#ngaysinh_add_khachdat").val("");
        $("#diachi_add_khachdat").val("");
        $("#dienthoai_add_khachdat").val("");
        $("#ghichu_add_khachdat").val("");
        $("#tenkh_add").val("");
        $("#msnguoithan_add").val("");
        $("#ngaysinh_add").val("");
        $("input[name=gioitinh_khachdat]:checked").val("NỮ");
        load_banhang_header_khachdat("");
      }
    );
  } else {
    $("#error_add_benhnhan_khachdat").removeClass("hidden");
  }
}

function load_lichsu_khachhang() {
  const sodienthoai = $("#dienthoai_add").val();
  $.post(
    "ajax/banhang/load_lichsu_khachhang.php",
    {
      sodienthoai: sodienthoai,
    },
    function (data, textStatus, jqXHR) {
      $("#list_lichsu_khachhang").html(data);
    }
  );
}

function open_update_ngayhen_dichvu_chuathuchien(
  rowid,
  soct,
  tendv,
  mslieutrinh,
  tenlieutrinh
) {
  open_modal("form_dichvu_chuathuchien");
  $("#tendichvu_thuchien").html(tendv);
  $("#lieutrinh_thuchien").html(tenlieutrinh);
  $.post(
    "ajax/banhang/ktr_dichvu_co_cunglieutrinh.php",
    { soct: soct, mslieutrinh: mslieutrinh },
    function (data, textStatus, jqXHR) {
      $("#dichvu_thuchien").html("");
      for (let i = 0; i < data.length; i++) {
        $("#dichvu_thuchien").append(`
        <button onclick="chon_hanghoa_thuchien(this,'${data[i].rowid}')" class='text-white px-3 py-2 m-1 rounded-md bg-green-500 focus:outline-none'>
        <input hidden value='${data[i].rowid}'>
          ${data[i].tenhh}
        </div>
        `);
      }
    }
  );
}

function chon_hanghoa_thuchien(e, rowid) {
  const hasClass = $(e).hasClass("active_lichsu");
  let rowid_in_id = $("#rowid_dichvu_update").val();
  $("#error_lichsu").addClass("hidden");

  if (hasClass == true) {
    $(e).removeClass("active_lichsu");
    $("#rowid_dichvu_update").val(rowid_in_id.replaceAll(rowid + "|", ""));
  } else {
    $(e).addClass("active_lichsu");
    $("#rowid_dichvu_update").val(rowid_in_id + rowid + "|");
  }
}

function update_ngayhen_dichvu_chuathuchien() {
  const rowid = $("#rowid_dichvu_update").val();
  if (rowid != "") {
    $.post(
      "ajax/banhang/update_ngayhen_dichvu_chuathuchien.php",
      { rowid: rowid },
      function (data, textStatus, jqXHR) {
        close_modal("form_dichvu_chuathuchien");
        setTimeout(function time() {
          location.href = `ListSale`;
        }, 1000);
      }
    );
  } else {
    $("#error_lichsu").removeClass("hidden");
  }
}

function open_noidung(rowid, soct, mshh, sodienthoai) {
  open_modal("form_add_noidung");
  $("#rowid_tuvan").val(rowid);
  $("#soct_tuvan").val(soct);
  $("#sodienthoai_tuvan").val(sodienthoai);
  $("#mshh_tuvan").val(mshh);
  load_noidung("TV", mshh);
  load_noidung("DT", mshh);
}
function load_noidung(loai, mshh) {
  const rowid = $("#rowid_tuvan").val();
  const sodienthoai = $("#sodienthoai_tuvan").val();
  $.post(
    "ajax/nhatky/load_noidung.php",
    { rowid: rowid, sodienthoai: sodienthoai, loai: loai, mshh: mshh },
    function (data, textStatus, jqXHR) {
      if (loai == "TV") {
        $("#chitiet_tuvan").html(data);
      }
      if (loai == "DT") {
        $("#chitiet_dieutri").html(data);
      }
    }
  );
}

function add_noidung(loai) {
  const rowid = $("#rowid_tuvan").val();
  const soct = $("#soct_tuvan").val();
  const sodienthoai = $("#sodienthoai_tuvan").val();
  const mshh = $("#mshh_tuvan").val();
  let noidung = "";
  if (loai == "TV") {
    noidung = $("#noidung_tuvan").val();
  }
  if (loai == "DT") {
    noidung = $("#noidung_dieutri").val();
  }
  if (noidung != "") {
    $.post(
      "ajax/nhatky/add_noidung.php",
      {
        rowid: rowid,
        sodienthoai: sodienthoai,
        soct: soct,
        noidung: noidung,
        loai: loai,
        mshh: mshh,
      },
      function (data, textStatus, jqXHR) {
        $("#noidung_tuvan").val("");
        $("#noidung_dieutri").val("");
        load_noidung(loai, mshh);
      }
    );
  }
}

function open_edit_noidung(e) {
  $(e).parent().parent().parent().find(".noidung_td").addClass("hidden");
  $(e).parent().parent().parent().find(".noidung_edit").removeClass("hidden");
  $(e).parent().parent().parent().find(".noidung_edit textarea").focus();
  $(e).parent().find(".btn_success").removeClass("hidden");
  $(e).parent().find(".btn_edit").addClass("hidden");
}

function edit_noidung(e, rowid, loai, mshh) {
  const noidung = $(e)
    .parent()
    .parent()
    .parent()
    .find(".noidung_edit textarea")
    .val();
  $.post(
    "ajax/nhatky/edit_noidung.php",
    { noidung: noidung, rowid: rowid },
    function (data, textStatus, jqXHR) {
      $(e).parent().find(".btn_success").addClass("hidden");
      $(e).parent().find(".btn_edit").removeClass("hidden");
      load_noidung(loai, mshh);
    }
  );
}

function open_delete_noidung(rowid, loai, noidung, mshh) {
  open_modal("form_delete_noidung");
  $("#rowid_noidung_delete").val(rowid);
  $("#loai_noidung_delete").val(loai);
  $("#mshh_noidung_delete").val(mshh);
  if (loai == "TV") {
    $("#title_xoa_noidung").html("Xóa tư vấn");
  }
  if (loai == "DT") {
    $("#title_xoa_noidung").html("Xóa điều trị");
  }
  $("#noidung_delete").html(noidung);
}

function delete_noidung() {
  const rowid = $("#rowid_noidung_delete").val();
  const loai = $("#loai_noidung_delete").val();
  const mshh = $("#mshh_noidung_delete").val();
  $.post(
    "ajax/nhatky/delete_noidung.php",
    { rowid: rowid },
    function (data, textStatus, jqXHR) {
      close_modal("form_delete_noidung");
      load_noidung(loai, mshh);
    }
  );
}
