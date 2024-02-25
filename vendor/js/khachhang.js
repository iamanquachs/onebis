function load_khachhang() {
  const ngaysn = $("#ngaysn_search").val();
  const nhom = $("#nhom_filter option:selected").val();
  $.post(
    "ajax/khachhang/load_khachhang.php",
    { ngaysn: ngaysn, nhom: nhom == undefined ? "" : nhom },
    function (data, textStatus, jqXHR) {
      $("#list_khachhang").html(data);
    }
  );
}

function load_baocao_dotuoi() {
  const tungay = $("#tungay_input").val();
  const denngay = $("#denngay_input").val();
  const msdv = $("#list_chinhanh option:selected").val();
  $.post(
    "ajax/baocao/baocaodotuoi.php",
    {
      msdv: msdv == undefined ? "" : msdv,
      tungay: tungay,
      denngay: denngay,
    },
    async function (data, textStatus, jqXHR) {
      $("#list_baocao_dotuoi").html(data);
    }
  );
}

function load_nhom_kh() {
  $.post(
    "ajax/khachhang/load_nhom_kh.php",
    {},
    function (data, textStatus, jqXHR) {
      $("#nhom_filter").append(`
        <option class='text-[#747474]' value="">Chọn nhóm</option>
        `);
      for (let i = 0; i < data.length; i++) {
        $("#nhom_filter").append(
          `<option class='text-[black]' value="${data[i].msnhom}">${data[i].tennhom}</option>`
        );
      }
    }
  );
}

function open_edit_khachhang(
  mskh,
  tenkh,
  ngaysinh,
  sodienthoai,
  email,
  gioitinh,
  diachi
) {
  open_modal("form_edit_khachhang");
  $("#mskh_edit").val(mskh);
  $("#tenkhachhang_edit").val(tenkh);
  $("#diachi_edit").val(diachi);
  $("#ngaysinh_edit").val(ngaysinh);
}

function edit_khachhang() {
  const mskh = $("#mskh_edit").val();
  const tenkh = $("#tenkhachhang_edit").val();
  const diachi = $("#diachi_edit").val();
  const ngaysinh = $("#ngaysinh_edit").val();
  $.post(
    "ajax/khachhang/edit_khachhang.php",
    {
      mskh: mskh,
      tenkh: tenkh,
      diachi: diachi,
      ngaysinh: ngaysinh,
    },
    function (data, textStatus, jqXHR) {
      close_modal("form_edit_khachhang");
      load_khachhang();
    }
  );
}

function khachhang_search(e) {
  var input, filter, table, tr, td, i, j, cell;
  input = document.getElementById("search");
  filter = input.value
    .toUpperCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "")
    .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"));
  table = document.getElementById("list_khachhang");
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

function open_add_voucher() {
  open_modal("form_add_voucher");
}

function add_voucher() {
  const search = $("#search").val();
  const ngaysn = $("#ngaysn_search").val();
  const nhom = $("#nhom_filter option:selected").val();
  const tenvoucher = $("#tenvoucher_add").val();
  const sotien = $("#sotien_add").val().replace(/[.]/g, "");
  const handung = $("#handung_input").val();
  $.post(
    "ajax/khachhang/add_voucher.php",
    {
      tenvoucher: tenvoucher,
      sotien: sotien,
      handung: handung,
      search: search,
      ngaysn: ngaysn,
      nhom: nhom == undefined ? "" : nhom,
    },
    function (data, textStatus, jqXHR) {
      $("#tenvoucher_add").val("");
      $("#sotien_add").val("");
      close_modal("form_add_voucher");
    }
  );
}

function baocao_search(e) {
  var input, filter, table, tr, td, i, j, cell;
  input = document.getElementById("search_baocao");
  filter = input.value
    .toUpperCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "")
    .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"));
  table = document.getElementById("body_baocao_phankhuc");
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

function open_show_lichsu_khachhang(tenkh, sodienthoai) {
  $("#tenkhachhang_lichsu").html(tenkh);
  $.post(
    "ajax/banhang/load_lichsu_khachhang.php",
    {
      sodienthoai: sodienthoai,
    },
    function (data, textStatus, jqXHR) {
      $("#list_lichsu_khachhang").html(data);
      open_modal("form_history");
    }
  );
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
