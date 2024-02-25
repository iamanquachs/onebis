function load_nhanvien() {
  const search = $("#value_search").val();
  const loai_nv = $("#loainv_filter option:selected").val();
  const chucvu = $("#chucvu_filter option:selected").val();
  const trangthai = $("#trangthai_filter option:selected").val();
  $.post(
    "ajax/nhanvien/load_nhanvien.php",
    {
      search: search,
      loai_nv: loai_nv == undefined ? "" : loai_nv,
      chucvu: chucvu == undefined ? "" : chucvu,
      trangthai: trangthai,
    },
    function (data, textStatus, jqXHR) {
      $("#list_nhanvien").html(data);
    }
  );
}

function ktra_sdt_nhanvien() {
  $(".erorr_sdt_add").addClass("hidden");
  $.post(
    "ajax/nhanvien/ktra_sdt_nhanvien.php",
    {
      sodienthoai: sodienthoai,
    },
    function (data, textStatus, jqXHR) {
      if (data.length > 0) {
        $(".erorr_sdt_add").removeClass("hidden");
      }
    }
  );
}

function add_nhanvien() {
  const trangthai = $("#trangthai_add").is(":checked") == true ? "0" : "1";
  const admin = $("#admin_add").is(":checked") == true ? "1" : "0";
  const tennhanvien = $("#tennhanvien_add").val(),
    sodienthoai = $("#sodienthoai_add").val(),
    matkhau = $("#matkhau_add").val(),
    diachi = $("#diachi_add").val(),
    email = $("#email_add").val(),
    gioitinh = $("#gioitinh_add option:selected").val(),
    cccd = $("#cccd_add").val(),
    ngaysinh = $("#ngaysinh_add").val(),
    luongcoban = $("#luongcoban_add").val().replaceAll(".", ""),
    luongtheogio = $("#luongtheogio_add").val().replaceAll(".", ""),
    loai_nv = $("#list_nhanvien_add option:selected").val(),
    chucvu = $("#list_chucvu_add option:selected").val();
  if (loai_nv != "" && chucvu != "" && tennhanvien != "" && sodienthoai != "") {
    $.post(
      "ajax/nhanvien/ktra_sdt_nhanvien.php",
      {
        sodienthoai: sodienthoai,
      },
      function (data, textStatus, jqXHR) {
        if (data.length > 0) {
        }
      }
    );

    $.post(
      "ajax/nhanvien/add_nhanvien.php",
      {
        trangthai: trangthai,
        admin: admin,
        tennhanvien: tennhanvien,
        sodienthoai: sodienthoai,
        matkhau: matkhau,
        diachi: diachi,
        email: email,
        gioitinh: gioitinh,
        cccd: cccd,
        ngaysinh: ngaysinh,
        luongcoban: luongcoban,
        luongtheogio: luongtheogio,
        loai_nv: loai_nv,
        chucvu: chucvu,
      },
      function (data, textStatus, jqXHR) {
        close_modal("form_add_nhanvien");
        load_nhanvien();
        $("#tennhanvien_add").val("");
        $("#sodienthoai_add").val("");
        $("#matkhau_add").val("");
        $("#diachi_add").val("");
        $("#email_add").val("");
        $("#gioitinh_add").val("");
        $("#cccd_add").val("");
        $("#ngaysinh_add").val("");
        $("#luongcoban_add").val("");
        $("#luongtheogio_add").val("");
        $("#list_nhanvien_add").val("");
        $("#list_chucvu_add").val("");
      }
    );
  } else {
    $("#title_error").html("Thông tin màu đỏ là bắt buộc");
  }
}

function open_edit_nhanvien(
  msdn,
  hoten,
  sodienthoai,
  loai_nv,
  mschucvu,
  gioitinh,
  diachi,
  email,
  ngaysinh,
  luongcoban,
  luongtheogio,
  cccd,
  loai_hd,
  khoa,
  admin
) {
  open_modal("form_edit_nhanvien");
  $("#msdn_edit").val(msdn);
  $("#tennhanvien_edit").val(hoten);
  $("#sodienthoai_edit").val(sodienthoai);
  $("#diachi_edit").val(diachi);
  $("#email_edit").val(email);
  $("#gioitinh_edit").val(gioitinh);
  $("#cccd_edit").val(cccd);
  $("#ngaysinh_edit").val(ngaysinh);
  $("#luongcoban_edit").val(luongcoban);
  $("#luongtheogio_edit").val(luongtheogio);
  $("#list_nhanvien_edit").val(loai_nv);
  $("#list_chucvu_edit").val(mschucvu);
  if (khoa == "0") {
    document.getElementById("trangthai_edit").checked = true;
  } else {
    document.getElementById("trangthai_edit").checked = false;
  }
  if (admin == "1") {
    document.getElementById("admin_edit").checked = true;
  } else {
    document.getElementById("admin_edit").checked = false;
  }
}

function edit_nhanvien() {
  const trangthai = $("#trangthai_edit").is(":checked") == true ? "0" : "1";
  const admin = $("#admin_edit").is(":checked") == true ? "1" : "0";
  const msdn = $("#msdn_edit").val(),
    tennhanvien = $("#tennhanvien_edit").val(),
    sodienthoai = $("#sodienthoai_edit").val(),
    matkhau = $("#matkhau_edit").val(),
    diachi = $("#diachi_edit").val(),
    email = $("#email_edit").val(),
    gioitinh = $("#gioitinh_edit option:selected").val(),
    cccd = $("#cccd_edit").val(),
    ngaysinh = $("#ngaysinh_edit").val(),
    luongcoban = $("#luongcoban_edit").val().replaceAll(".", ""),
    luongtheogio = $("#luongtheogio_edit").val().replaceAll(".", ""),
    loai_nv = $("#list_nhanvien_edit option:selected").val(),
    chucvu = $("#list_chucvu_edit option:selected").val();
  $.post(
    "ajax/nhanvien/edit_nhanvien.php",
    {
      trangthai: trangthai,
      admin: admin,
      msdn: msdn,
      tennhanvien: tennhanvien,
      sodienthoai: sodienthoai,
      matkhau: matkhau,
      diachi: diachi,
      email: email,
      gioitinh: gioitinh,
      cccd: cccd,
      ngaysinh: ngaysinh,
      luongcoban: luongcoban,
      luongtheogio: luongtheogio,
      loai_nv: loai_nv,
      chucvu: chucvu,
    },
    function (data, textStatus, jqXHR) {
      close_modal("form_edit_nhanvien");
      $("#matkhau_edit").val("");
      load_nhanvien();
    }
  );
}

function add_danhmuc(phanloai, input_add, tenphanloai, id_danhmuc) {
  const tenloai = $("#" + input_add).val();
  const ptphucap = 0;
  $.post(
    "ajax/danhmuc/add_danhmuc.php",
    {
      phanloai: phanloai,
      tenphanloai: tenphanloai,
      tendanhmuc: tenloai,
      loai: ptphucap,
      id_danhmuc: id_danhmuc,
    },
    function (data, textStatus, jqXHR) {
      load_danhmuc(phanloai);
      $(".icon_remove").addClass("hidden");
      $(".icon_add").removeClass("hidden");
      $(".__show").addClass("hidden");
    }
  );
}

function load_danhmuc(phanloai) {
  if (phanloai == "loai_nv") {
    $(".list_nhanvien").html("");
    $.post(
      "ajax/danhmuc/load_danhmuc.php",
      { phanloai: phanloai },
      function (data, textStatus, jqXHR) {
        $(".list_nhanvien").append(`
        <option onclick="" value="" class='filter_btn px-2 py-1 border-b focus:outline-none'>Tất cả</option>
        `);
        $("#loainv_filter").append(`
          <option class='text-[#747474]' value="" >Công việc</option>
          `);
        for (let i = 0; i < data.length; i++) {
          $(".list_nhanvien").append(`
          <option onclick="" value="${data[i].msloai}" class='filter_btn px-2 py-1 focus:outline-none'>${data[i].tenloai}</option>
          `);
          $("#loainv_filter").append(`
          <option class='text-[black]' onclick="" value="${data[i].msloai}" class='filter_btn px-2 py-1 focus:outline-none text-black'>${data[i].tenloai}</option>
          `);
        }
      }
    );
  }
  if (phanloai == "chucvu") {
    $(".list_chucvu").html("");
    $.post(
      "ajax/danhmuc/load_danhmuc.php",
      { phanloai: phanloai },
      function (data, textStatus, jqXHR) {
        $(".list_chucvu").append(`
          <option onclick="" value="" class='filter_btn px-2 py-1 border-b focus:outline-none'>Tất cả</option>
          `);
        $("#chucvu_filter").append(`
          <option onclick="" value="" class='filter_btn px-2 py-1 border-b focus:outline-none text-[#747474]'>Tất cả chức vụ</option>
          `);
        for (let i = 0; i < data.length; i++) {
          $(".list_chucvu").append(`
            <option onclick="" value="${data[i].msloai}" class='filter_btn px-2 py-1 focus:outline-none'>${data[i].tenloai}</option>
            `);
          $("#chucvu_filter").append(`
            <option onclick="" value="${data[i].msloai}" class='filter_btn px-2 py-1 focus:outline-none  text-black'>${data[i].tenloai}</option>
            `);
        }
      }
    );
  }
}

function open_delete_nhanvien(msdn, hoten) {
  open_modal("form_delete_nhanvien");
  $("#msdn_delete").val(msdn);
  $("#hoten_delele").text(hoten);
}
function delete_nhanvien(e) {
  const msdn = $(e).parent().find("#msdn_delete").val();
  $.post(
    "ajax/nhanvien/delete_nhanvien.php",
    { msdn: msdn },
    function (data, textStatus, jqXHR) {
      close_modal("form_delete_nhanvien");
      load_nhanvien();
    }
  );
}

function open_modal_capquyen(msdn, tennv) {
  open_modal("form_capquyen_nhanvien");
  $("#tennv_phanquyen").html(tennv);
  $("#msdn_phanquyen").val(msdn);
  load_chucnang();
  load_chucnang_dacap();
}

function load_chucnang() {
  const msdn = $("#msdn_phanquyen").val();
  $.post(
    "ajax/nhanvien/load_chucnang.php",
    { msdn: msdn },
    function (data, textStatus, jqXHR) {
      $("#list_chucnang").html(data);
    }
  );
}
function load_chucnang_dacap() {
  const msdn = $("#msdn_phanquyen").val();

  $.post(
    "ajax/nhanvien/load_chucnang_dacap.php",
    { msdn: msdn },
    function (data, textStatus, jqXHR) {
      $("#list_chucnang_dacap").html(data);
    }
  );
}
function delete_chucnang(manghiepvu) {
  const msdn = $("#msdn_phanquyen").val();
  $.post(
    "ajax/nhanvien/delete_chucnang.php",
    { msdn: msdn, manghiepvu: manghiepvu },
    function (data, textStatus, jqXHR) {
      load_chucnang();
      load_chucnang_dacap();
    }
  );
}
function add_chucnang(rowid) {
  const msdn = $("#msdn_phanquyen").val();
  $.post(
    "ajax/nhanvien/add_chucnang.php",
    {
      rowid,
      msdn,
    },
    function (data, textStatus, jqXHR) {
      load_chucnang();
      load_chucnang_dacap();
    }
  );
}
function phanquyen_search(e) {
  if (typeof timer !== undefined) {
    clearTimeout(this.timer);
  }
  this.timer = setTimeout(a, 500);
  function a() {
    var input, filter, table, tr, td, i, j, cell;
    input = document.getElementById("phanquyen_search");
    filter = input.value
      .toUpperCase()
      .normalize("NFD")
      .replace(/[\u0300-\u036f]/g, "")
      .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"));
    table = document.getElementById("list_chucnang");
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
}

function chucnang_dacap_search(e) {
  if (typeof timer !== undefined) {
    clearTimeout(this.timer);
  }
  this.timer = setTimeout(a, 500);
  function a() {
    var input, filter, table, tr, td, i, j, cell;
    input = document.getElementById("chucnang_search");
    filter = input.value
      .toUpperCase()
      .normalize("NFD")
      .replace(/[\u0300-\u036f]/g, "")
      .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"));
    table = document.getElementById("list_chucnang_dacap");
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
}
