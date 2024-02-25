function load_voucher_header() {
  const valueSearch = $("#_search").val();
  const tungay = $("#tungay_input").val();
  const denngay = $("#denngay_input").val();
  const locloai = $("#trangthai_loc option:selected").val();
  const nhom = $("#nhom_filter option:selected").val();
  $.post(
    "ajax/voucher/load_voucher_header.php",
    {
      valueSearch: valueSearch,
      locloai: locloai,
      tungay: tungay,
      denngay: denngay,
      nhom: nhom == undefined ? "" : nhom,
    },
    function (data, textStatus, jqXHR) {
      $("#list_voucher_header").html(data);
    }
  );
}

function open_chitiet_voucher(msvoucher, tenvoucher) {
  $("#msvoucher_load").val(msvoucher);
  $("#tenvoucher_load").html(tenvoucher);
  $("#ten_voucher_add_chitiet").html(tenvoucher);
  $("#btn_add_chitiet_voucher").removeClass("hidden");
  load_voucher();
}

function load_voucher() {
  const valueSearch = $("#_search").val();
  const msvoucher = $("#msvoucher_load").val();
  const tungay = $("#tungay_input").val();
  const denngay = $("#denngay_input").val();
  const locloai = $("#trangthai_loc option:selected").val();
  const nhom = $("#nhom_filter option:selected").val();
  $.post(
    "ajax/voucher/load_voucher.php",
    {
      msvoucher: msvoucher,
      valueSearch: valueSearch,
      locloai: locloai,
      tungay: tungay,
      denngay: denngay,
      nhom: nhom == undefined ? "" : nhom,
    },
    function (data, textStatus, jqXHR) {
      $("#list_voucher_chitiet").html(data);
    }
  );
}
function loai_khachhang() {
  $("#mskh").addClass("hidden");
  $("#tenkh").addClass("hidden");
  $("#form_nhom_kh").addClass("hidden");
  const loaikh = $("#loaikh option:selected").val();
  if (loaikh == "2") {
    $("#mskh").removeClass("hidden");
    $("#tenkh").removeClass("hidden");
  }
  if (loaikh == "1") {
    $("#form_nhom_kh").removeClass("hidden");
  }
}

function loai_khachhang_chitiet() {
  $("#mskh_chitiet").addClass("hidden");
  $("#tenkh_chitiet").addClass("hidden");
  $("#form_nhom_kh_chitiet").addClass("hidden");
  const loaikh = $("#loaikh_chitiet option:selected").val();
  if (loaikh == "2") {
    $("#mskh_chitiet").removeClass("hidden");
    $("#tenkh_chitiet").removeClass("hidden");
  }
  if (loaikh == "1") {
    $("#form_nhom_kh_chitiet").removeClass("hidden");
  }
}

function add_voucher() {
  const loaikh = $("#loaikh option:selected").val();
  const nhomkh = $("#nhom_kh_add option:selected").val();
  const mskh = $("#mskh_add").val();
  const tenkh = $("#tenkh_add").val();
  const tenvoucher = $("#tenvoucher_add").val();
  const sotien = $("#sotien_add").val().replace(/[.]/g, "");
  const handung = $("#handung_input").val();
  $.post(
    "ajax/voucher/add_voucher.php",
    {
      loaikh: loaikh,
      nhomkh: nhomkh,
      mskh: mskh,
      tenkh: tenkh,
      tenvoucher: tenvoucher,
      sotien: sotien,
      handung: handung,
      vitri: "header",
    },
    function (data, textStatus, jqXHR) {
      load_voucher();
      load_voucher_header();
      $("#mskh_add").val("");
      $("#tenkh_add").val("");
      $("#tenvoucher_add").val("");
      $("#sotien_add").val("");
      close_modal("form_add_voucher");
    }
  );
}

function add_voucher_chitiet() {
  const loaikh = $("#loaikh_chitiet option:selected").val();
  const nhomkh = $("#nhom_kh_add_chitiet option:selected").val();
  const mskh = $("#mskh_add_chitiet").val();
  const msvoucher = $("#msvoucher_load").val();
  const tenkh = $("#tenkh_add_chitiet").val();
  const tenvoucher = $("#ten_voucher_add_chitiet").text();
  const sotien = $("#sotien_add_chitiet").val().replace(/[.]/g, "");
  const handung = $("#handung_input_chitiet").val();
  $.post(
    "ajax/voucher/add_voucher.php",
    {
      loaikh: loaikh,
      nhomkh: nhomkh,
      mskh: mskh,
      tenkh: tenkh,
      msvoucher: msvoucher,
      tenvoucher: tenvoucher,
      sotien: sotien,
      handung: handung,
      vitri: "line",
    },
    function (data, textStatus, jqXHR) {
      load_voucher();
      $("#mskh_add_chitiet").val("");
      $("#tenkh_add_chitiet").val("");
      $("#tenvoucher_add_chitiet").val("");
      $("#sotien_add_chitiet").val("");
      close_modal("form_add_voucher_chitiet");
    }
  );
}

function tim_khachhang() {
  if (typeof timer !== undefined) {
    clearTimeout(this.timer);
  }
  this.timer = setTimeout(a, 500);
  function a() {
    const value = $("#mskh_add").val();
    $("#list_khachhang").html("");
    $("#form_khachhang").addClass("hidden");
    $.post(
      "ajax/voucher/load_khachhang.php",
      { value: value },
      function (data, textStatus, jqXHR) {
        $("#form_khachhang").removeClass("hidden");
        for (let i = 0; i < data.length; i++) {
          $("#list_khachhang").append(`
        <tr  onclick="chon_khachhang('${data[i].sodienthoai}','${
            data[i].tenkh
          }')">
        <th class=" px-4 py-2">${i + 1}</th>
        <th class=" px-4 py-2">${data[i].tenkh}</th>
    </tr>
          `);
        }
      }
    );
  }
}
function tim_khachhang_chitiet() {
  if (typeof timer !== undefined) {
    clearTimeout(this.timer);
  }
  this.timer = setTimeout(a, 500);
  function a() {
    const value = $("#mskh_add_chitiet").val();
    $("#list_khachhang_chitiet").html("");
    $("#form_khachhang_chitiet").addClass("hidden");
    $.post(
      "ajax/voucher/load_khachhang.php",
      { value: value },
      function (data, textStatus, jqXHR) {
        $("#form_khachhang_chitiet").removeClass("hidden");
        for (let i = 0; i < data.length; i++) {
          $("#list_khachhang_chitiet").append(`
        <tr  onclick="chon_khachhang_chitiet('${data[i].sodienthoai}','${
            data[i].tenkh
          }')">
        <th class=" px-4 py-2">${i + 1}</th>
        <th class=" px-4 py-2">${data[i].tenkh}</th>
    </tr>
          `);
        }
      }
    );
  }
}
function chon_khachhang_chitiet(sodienthoai, tenkh) {
  $("#mskh_add_chitiet").val(sodienthoai);
  $("#tenkh_add_chitiet").val(tenkh);
  $("#form_khachhang_chitiet").addClass("hidden");
}
function chon_khachhang(sodienthoai, tenkh) {
  $("#mskh_add").val(sodienthoai);
  $("#tenkh_add").val(tenkh);
  $("#form_khachhang").addClass("hidden");
}
function open_delete_voucher(rowid, khachhang) {
  $("#rowid_delete").val(rowid);
  $("#tenvoucher_delete").html(khachhang);
  open_modal("form_delete_voucher");
}

function delete_voucher() {
  const rowid = $("#rowid_delete").val();
  $.post(
    "ajax/voucher/delete_voucher.php",
    {
      rowid: rowid,
    },
    function (data, textStatus, jqXHR) {
      load_voucher();
      close_modal("form_delete_voucher");
    }
  );
}
function load_nhom_kh() {
  $("#nhom_kh_add").html("");

  $.post(
    "ajax/khachhang/load_nhom_kh.php",
    {},
    function (data, textStatus, jqXHR) {
      $("#nhom_filter").append(`
        <option class='text-[#747474]' value="">Tất cả nhóm</option>
        `);
      $("#nhom_kh_add").append(`
        <option class='text-[#747474]' value="">Tất cả nhóm</option>
        `);
      $("#nhom_kh_add_chitiet").append(`
        <option class='text-[#747474]' value="">Tất cả nhóm</option>
        `);
      for (let i = 0; i < data.length; i++) {
        $("#nhom_filter").append(
          `<option class='text-black' value="${data[i].msnhom}">${data[i].tennhom}</option>`
        );
        $("#nhom_kh_add").append(
          `<option class='text-black' value="${data[i].msnhom}">${data[i].tennhom}</option>`
        );
        $("#nhom_kh_add_chitiet").append(
          `<option class='text-black' value="${data[i].msnhom}">${data[i].tennhom}</option>`
        );
      }
    }
  );
}
