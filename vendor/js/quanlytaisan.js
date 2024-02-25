function load_taisan() {
  const msdv = $("#list_chinhanh option:selected").val();
  $.post(
    "ajax/quanlytaisan/load_taisan.php",
    {
      msdv: msdv,
    },
    function (data, textStatus, jqXHR) {
      $("#list_quanly_taisan").html(data);
    }
  );
}

function load_chitiet_quanly_taisan(mshh, tenhh) {
  $("#title_form_chitiet_dieuchuyen").text("Nhật ký điều chuyển " + tenhh);
  open_modal("form_chitiet_dieuchuyen");
  $.post(
    "ajax/quanlytaisan/load_chitiet_quanly_taisan.php",
    { mshh: mshh },
    function (data, textStatus, jqXHR) {
      $("#list_chitiet_dieuchuyen").html(data);
    }
  );
}

function soluong_chuyengiao(e) {
  const soluong = $(e).val();
  const soluong_toida = $("#soluong_toida").val();
  $("#soluong_chuyengiao").removeClass("text-[red]");
  if (soluong > soluong_toida) {
    $("#soluong_chuyengiao").addClass("text-[red]");
  }
}

function soluong_nhap(e) {
  const soluong = $(e).val();
  const soluong_toida = $("#tonkho").val();
  $("#tonkho_toida").removeClass("text-[red]");
  if (soluong > soluong_toida) {
    $("#tonkho_toida").addClass("text-[red]");
  }
}

function open_tra_taisan(mshh, tenhh, msdonvi, tendv, soluong) {
  open_modal("form_add_quanly_taisan");
  $("#ten_taisan").text(tenhh);
  $("#mshh_sudung").val(mshh);
  $("#tenhh_sudung").val(tenhh);
  $("#msdonvi_sudung").val(msdonvi);
  $("#soluong_toida").val(soluong);
  $("#soluong_chuyengiao").text("(" + soluong + ")");
}

function load_danhmuc_phongban() {
  $("#donvi_nhan_add").html("");
  $.post(
    "ajax/danhmuc/load_danhmuc.php",
    {
      phanloai: "phongban",
    },
    function (data, textStatus, jqXHR) {
      $("#donvi_nhan_sudung").append(`
        <option class='text-[#747474]' value="">Chọn phòng ban</option>
        `);
      $("#donvi_nhan_dieuchuyen").append(`
        <option class='text-[#747474]' value="">Chọn phòng ban</option>
        `);
      for (let i = 0; i < data.length; i++) {
        $("#donvi_nhan_sudung").append(
          `<option class='text-[black]' value="${data[i].msloai}">${data[i].tenloai}</option>`
        );
        $("#donvi_nhan_dieuchuyen").append(
          `<option class='text-[black]' value="${data[i].msloai}">${data[i].tenloai}</option>`
        );
        if (data[i].admin == 1 && data[i].dieukien2 == "QLTS") {
          $("#msdonvi_quanly_add_xsd").val(data[i].msloai);
        }
      }
    }
  );
}

function add_quanly_taisan() {
  const msdonvi_sudung = $("#msdonvi_sudung").val();
  const msdonvi_nhan = $("#donvi_nhan_add option:selected").val();
  const soluong = $("#soluong_add").val();
  const soluong_toida = $("#soluong_toida").val();
  const mshh = $("#mshh_sudung").val();
  const tenhh = $("#tenhh_sudung").val();
  $("#_error").addClass("hidden");
  if (Number(soluong) <= Number(soluong_toida) && msdonvi_nhan != "") {
    $.post(
      "ajax/quanlytaisan/add_chitiet_quanly_taisan.php",
      {
        msdonvi_sudung: msdonvi_sudung,
        msdonvi_nhan: msdonvi_nhan,
        soluong: soluong,
        mshh: mshh,
        tenhh: tenhh,
      },
      function (data, textStatus, jqXHR) {
        close_modal("form_add_quanly_taisan");
        load_taisan();
      }
    );
  } else {
    $("#_error").removeClass("hidden");
  }
}
function xuat_sudung() {
  const msdonvi_nhan = $("#donvi_nhan_sudung option:selected").val();
  const soluong = $("#soluong_xuat_sudung").val();
  const tonkho = $("#tonkho").val();
  const mshh = $("#mshh_add_xsd").val();
  const tenhh = $("#tenhh_add_xsd").val();
  const msdonvi_quanly = $("#msdonvi_quanly_add_xsd").val();
  $("#_error_xsd").addClass("hidden");
  if (Number(soluong) <= Number(tonkho) && msdonvi_nhan != "") {
    $.post(
      "ajax/quanlytaisan/add_xuat_taisan.php",
      {
        msdonvi_quanly: msdonvi_quanly,
        msdonvi_nhan: msdonvi_nhan,
        soluong: soluong,
        mshh: mshh,
        tenhh: tenhh,
        loai: "XSD",
      },
      function (data, textStatus, jqXHR) {
        close_modal("form_xuat_sudung");
        load_taisan();
      }
    );
  } else {
    $("#_error_xsd").removeClass("hidden");
  }
}

function xuat_tra() {
  const msdonvi_nhan = $("#msdonvi_sudung").val();
  const soluong = $("#soluong_add").val();
  const tonkho = $("#soluong_toida").val();
  const mshh = $("#mshh_sudung").val();
  const tenhh = $("#tenhh_sudung").val();
  const msdonvi_quanly = $("#msdonvi_quanly_add_xsd").val();
  $("#_error_xsd").addClass("hidden");
  if (Number(soluong) <= Number(tonkho) && msdonvi_nhan != "") {
    $.post(
      "ajax/quanlytaisan/add_xuat_taisan.php",
      {
        msdonvi_quanly: msdonvi_quanly,
        msdonvi_nhan: msdonvi_nhan,
        soluong: soluong,
        mshh: mshh,
        tenhh: tenhh,
        loai: "XDC",
      },
      function (data, textStatus, jqXHR) {
        close_modal("form_add_quanly_taisan");
        load_taisan();
      }
    );
  } else {
    $("#_error").removeClass("hidden");
  }
}

function open_duyet_dieuchuyen(soct, mshh, tenhh) {
  open_modal("form_capnhat_taisan");
  $("#soct_dieuchuyen").val(soct);
  $("#mshh_dieuchuyen").val(mshh);
  $("#title_form").text("Duyệt điều chuyển " + tenhh);
  $("#btn_duyet").removeClass("hidden");
  $("#btn_nhan").addClass("hidden");
}

function open_nhan_dieuchuyen(soct, mshh, tenhh) {
  open_modal("form_capnhat_taisan");
  $("#soct_dieuchuyen").val(soct);
  $("#mshh_dieuchuyen").val(mshh);
  $("#title_form").text("Nhận điều chuyển " + tenhh);
  $("#btn_duyet").addClass("hidden");
  $("#btn_nhan").removeClass("hidden");
}

function update_hososudungtaisan(loai) {
  const soct = $("#soct_dieuchuyen").val();
  const mshh = $("#mshh_dieuchuyen").val();
  $.post(
    "ajax/quanlytaisan/update_hososudungtaisan.php",
    { soct: soct, mshh: mshh, loai: loai },
    function (data, textStatus, jqXHR) {
      close_modal("form_capnhat_taisan");
      load_taisan();
    }
  );
}

function load_danhmuc_loai_hh() {
  $.post(
    "ajax/danhmuc/load_danhmuc.php",
    { phanloai: "loai_hh" },
    function (data, textStatus, jqXHR) {
      $("#list_loai_hh").append(
        ` <option class='text-[#747474]' value="">Chọn loại hàng hóa</option>`
      );
      for (let i = 0; i < data.length; i++) {
        if (data[i].admin == 1) {
          $("#list_loai_hh").append(`
            <option class='text-black'  value='${data[i].msloai}'>${data[i].tenloai}</option>
            `);
        }
      }
    }
  );
}

function find_hanghoa() {
  if (typeof timer !== undefined) {
    clearTimeout(this.timer);
  }
  this.timer = setTimeout(a, 500);
  function a() {
    $("#form_hanghoa").addClass("hidden");
    const tenhh = $("#tenhh_add_xsd").val();
    $.post(
      "ajax/quanlytaisan/find_hanghoa.php",
      { tenhh: tenhh },
      function (data, textStatus, jqXHR) {
        if (data.length > 0) {
          $("#form_hanghoa").removeClass("hidden");
          $("#list_hanghoa").html(data);
        }
      }
    );
  }
}

function chon_hanghoa(mshh, tenhh, tonkho) {
  $("#mshh_add_xsd").val(mshh);
  $("#tenhh_add_xsd").val(tenhh);
  $("#tonkho").val(tonkho);
  $("#tonkho_toida").text("Tồn kho: " + tonkho);
  $("#form_hanghoa").addClass("hidden");
}

function quanlytaisan_search(e) {
  var input, filter, table, tr, td, i, j, cell;
  input = document.getElementById("search");
  filter = input.value
    .toUpperCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "")
    .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"));
  table = document.getElementById("list_quanly_taisan");
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
