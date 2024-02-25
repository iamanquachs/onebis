function load_header() {
  const songayhethan = $("#songayhethan_filter").val();
  const ctkm_tungay = $("#tungay_input").val();
  const ctkm_denngay = $("#denngay_input").val();
  $.post(
    "ajax/khuyenmai/load_header.php",
    {
      songayhethan: songayhethan,
      ctkm_tungay: ctkm_tungay,
      ctkm_denngay: ctkm_denngay,
    },
    function (data, textStatus, jqXHR) {
      $("#list_ctkm_header").html(data);
      $("#chitiet_ctmk_tbody").html("");
    }
  );
}

function load_chitiet_ctkm(msctkm, tenctkm) {
  const songayhethan = $("#songayhethan_filter").val();
  const ctkm_tungay = $("#tungay_input").val();
  const ctkm_denngay = $("#denngay_input").val();

  $.post(
    "ajax/khuyenmai/load_chitiet_ctkm.php",
    {
      msctkm: msctkm,
      songayhethan: songayhethan,
      ctkm_tungay: ctkm_tungay,
      ctkm_denngay: ctkm_denngay,
    },
    function (data, textStatus, jqXHR) {
      $("#list_nhapkho_line").html(data);
      $("#ms_chitiet_ctkm").val(msctkm);
      $("#ten_chitiet_ctkm").val(tenctkm);
      $("#btn_add_chitiet_ctkm").removeClass("hidden");
    }
  );
}

function ctkm_search(e) {
  var input, filter, table, tr, td, i, j, cell;
  input = document.getElementById("tenctkm_search");
  filter = input.value
    .toUpperCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "")
    .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"));
  table = document.getElementById("list_ctkm_header");
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

function ctkm_search_hanghoa_dichvu(e) {
  var input, filter, table, tr, td, i, j, cell;
  input = document.getElementById("search_hanghoa_dichvu");
  filter = input.value
    .toUpperCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "")
    .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"));
  table = document.getElementById("list_nhapkho_line");
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

function open_add_chitiet_ctkm() {
  open_modal("form_add_chitiet_ctkm");
  $("#ten_add_chitiet_ctkm").html($("#ten_chitiet_ctkm").val());
}

function open_delete_form_header(msctkm, tenhh) {
  open_modal("form_delete_ctkm_header");
  $("#tenhh_delete_header").html(tenhh);
  $("#msctkm_delete_header").val(msctkm);
}

function delete_ctkm_header() {
  const msctkm = $("#msctkm_delete_header").val();
  const tenctkm = $("#tenhh_delete_header").text();
  $.post(
    "ajax/khuyenmai/delete_ctkm_header.php",
    { msctkm: msctkm },
    function (data, textStatus, jqXHR) {
      close_modal("form_delete_ctkm_header");
      load_header();
      load_chitiet_ctkm(msctkm, tenctkm);
    }
  );
}

function edit_ctkm_header(khoa, msctkm, tenctkm) {
  $.post(
    "ajax/khuyenmai/edit_ctkm_header.php",
    { msctkm: msctkm, khoa: khoa },
    function (data, textStatus, jqXHR) {
      load_header();
      load_chitiet_ctkm(msctkm, tenctkm);
    }
  );
}

function open_delete_form(rowid, msctkm, tenhh) {
  open_modal("form_delete_ctkm");
  $("#tenhh_delete").html(tenhh);
  $("#rowid_delete").val(rowid);
  $("#msctkm_delete").val(msctkm);
}

function delete_chitiet_ctkm() {
  const rowid = $("#rowid_delete").val();
  const msctkm = $("#msctkm_delete").val();
  const tenctkm = $("#ten_chitiet_ctkm").val();
  $.post(
    "ajax/khuyenmai/delete_chitiet_ctkm.php",
    { rowid: rowid },
    function (data, textStatus, jqXHR) {
      close_modal("form_delete_ctkm");
      load_header();
      load_chitiet_ctkm(msctkm, tenctkm);
    }
  );
}

function edit_chitiet_ctkm(khoa, rowid, msctkm, tenctkm) {
  $.post(
    "ajax/khuyenmai/edit_chitiet_ctkm.php",
    { rowid: rowid, khoa: khoa },
    function (data, textStatus, jqXHR) {
      load_chitiet_ctkm(msctkm, tenctkm);
    }
  );
}

function add_ctkm_header() {
  const tenctkm = $("#ten_header_ctkm_add").val();
  const ptgiam = $("#ptgiam_header_ctkm_add").val();
  const tungay = $("#tungay_header_input").val();
  const denngay = $("#denngay_header_input").val();
  const loai_km = $("#loai_khuyenmai option:selected").val();
  const nhom_hh = $("#list_nhom_hh option:selected").val();
  const mshh = $("#mshh_header_ctkm_add").val();
  const tenhh = $("#tenhh_header_ctkm_add").val();
  if (tenctkm != "") {
    $.post(
      "ajax/khuyenmai/add_ctkm_header.php",
      {
        tenctkm: tenctkm,
        ptgiam: ptgiam,
        loai_km: loai_km,
        tungay: tungay,
        denngay: denngay,
        mshh: mshh,
        tenhh: tenhh,
        nhom_hh: nhom_hh,
      },
      function (data, textStatus, jqXHR) {
        close_modal("form_add_ctkm");
        load_header();
        $("#ten_header_ctkm_add").val("");
        $("#ptgiam_header_ctkm_add").val(0);
        $("#loai_khuyenmai option:selected").val(0);
        $("#list_nhom_hh").val("");
        $("#mshh_header_ctkm_add").val("");
        $("#tenhh_header_ctkm_add").val("");
        $("#tenhh_chitiet_ctkm_add").val("");
        $("#ptgiam_chitiet_ctkm_add").val("");
      }
    );
  }
}

function find_hanghoa(e) {
  if (typeof timer !== undefined) {
    clearTimeout(this.timer);
  }
  this.timer = setTimeout(a, 500);
  function a() {
    const tensanpham = $(e).val();
    $.post(
      "ajax/khuyenmai/find_hanghoa.php",
      { tensanpham: tensanpham },
      function (data, textStatus, jqXHR) {
        if (data.length != 0) {
          $("#form_hanghoa").removeClass("hidden");
          $("#list_sanpham").html(data);
        }
      }
    );
  }
}
function find_hanghoa_header(e) {
  if (typeof timer !== undefined) {
    clearTimeout(this.timer);
  }
  this.timer = setTimeout(a, 500);
  function a() {
    const tensanpham = $(e).val();
    $.post(
      "ajax/khuyenmai/find_hanghoa.php",
      { tensanpham: tensanpham },
      function (data, textStatus, jqXHR) {
        if (data.length != 0) {
          $("#form_hanghoa_header").removeClass("hidden");
          $("#list_sanpham_header").html(data);
        }
      }
    );
  }
}
function add_hanghoa(mshh, tenhh) {
  $("#mshh_chitiet_ctkm_add").val(mshh);
  $("#form_hanghoa").addClass("hidden");
  $("#tenhh_chitiet_ctkm_add").val(tenhh);
  $("#mshh_header_ctkm_add").val(mshh);
  $("#tenhh_header_ctkm_add").val(tenhh);
  $("#form_hanghoa_header").addClass("hidden");
}

function add_chitiet_ctkm() {
  const msctkm = $("#ms_chitiet_ctkm").val();
  const tenctkm = $("#ten_chitiet_ctkm").val();
  const mshh = $("#mshh_chitiet_ctkm_add").val();
  const tenhh = $("#tenhh_chitiet_ctkm_add").val();
  const tungay = $("#tungay_chitiet_input").val();
  const denngay = $("#denngay_chitiet_input").val();
  const ptgiam = $("#ptgiam_chitiet_ctkm_add").val();
  const loai_km = $("#loai_khuyenmai_chitiet option:selected").val();
  const nhom_hh = $("#list_nhom_hh_chitiet option:selected").val();

  if (tenctkm != "") {
    $.post(
      "ajax/khuyenmai/add_chitiet_ctkm.php",
      {
        msctkm: msctkm,
        tenctkm: tenctkm,
        mshh: mshh,
        tenhh: tenhh,
        ptgiam: ptgiam,
        tungay: tungay,
        denngay: denngay,
        loai_km: loai_km,
        nhom_hh: nhom_hh,
      },
      function (data, textStatus, jqXHR) {
        load_chitiet_ctkm(msctkm, tenctkm);
        close_modal("form_add_chitiet_ctkm");
        $("#mshh_chitiet_ctkm_add").val("");
        $("#tenhh_chitiet_ctkm_add").val("");
        $("#ptgiam_chitiet_ctkm_add").val("");
        $("#mshh_header_ctkm_add").val("");
        $("#tenhh_header_ctkm_add").val("");
      }
    );
  }
}

function loai_khuyenmai() {
  const loai_km = $("#loai_khuyenmai option:selected").val();
  $("#form_chon_hanghoa").removeClass("hidden");
  $("#form_chon_nhom_hanghoa").addClass("hidden");
  if (loai_km == 1) {
    $("#form_chon_hanghoa").addClass("hidden");
    $("#form_chon_nhom_hanghoa").addClass("hidden");
  }
  if (loai_km == 2) {
    $("#form_chon_nhom_hanghoa").removeClass("hidden");
    $("#form_chon_hanghoa").addClass("hidden");
  }
}
function loai_khuyenmai_chitiet() {
  const loai_km = $("#loai_khuyenmai_chitiet option:selected").val();
  $("#form_chon_hanghoa_chitiet").removeClass("hidden");
  $("#form_chon_nhom_hanghoa_chitiet").addClass("hidden");

  if (loai_km == 1) {
    $("#form_chon_hanghoa_chitiet").addClass("hidden");
    $("#form_chon_nhom_hanghoa_chitiet").addClass("hidden");
  }
  if (loai_km == 2) {
    $("#form_chon_nhom_hanghoa_chitiet").removeClass("hidden");
    $("#form_chon_hanghoa_chitiet").addClass("hidden");
  }
}

function load_nhom_hh() {
  $.post(
    "ajax/danhmuc/load_danhmuc.php",
    { phanloai: "dichvu" },
    function (data, textStatus, jqXHR) {
      $("#list_nhom_hh").html("");
      $("#list_nhom_hh").append(
        ` <option class='text-black' value="" >Theo nhóm</option>`
      );
      $("#list_nhom_hh_chitiet").html("");
      $("#list_nhom_hh_chitiet").append(
        ` <option class='text-black' value="" >Theo nhóm</option>`
      );
      for (let i = 0; i < data.length; i++) {
        $("#list_nhom_hh").append(
          ` <option class='text-black' value="${data[i].msloai}" >${data[i].tenloai}</option>`
        );
        $("#list_nhom_hh_chitiet").append(
          ` <option class='text-black' value="${data[i].msloai}" >${data[i].tenloai}</option>`
        );
      }
    }
  );
}
