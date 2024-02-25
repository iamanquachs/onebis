function load_header() {
  const trangthai = $("#list_filter_trangthai option:selected").val();
  const nhanvien = $("#list_filter_nhanvien option:selected").val();
  $.post(
    "ajax/crm/load_header.php",
    {
      trangthai: trangthai == null ? "" : trangthai,
      nhanvien: nhanvien == null ? "" : nhanvien,
    },
    function (data, textStatus, jqXHR) {
      $("#list_crm_header").html(data);
      for (let i = 0; i < data.length; i++) {
        var loai = "";
        switch (data[i].loai) {
          case "KHDG":
            loai =
              "<img class='w-[24px] h-[24px]' src='vendor/img/ratkhonghailong.png'>";
            break;
          default:
            loai = "<img class='w-[24px] h-[24px]' src='vendor/img/call.png'>";
            break;
        }
        $("#list_crm_header").append(`
    <tr class="active_items item_line items border-b border-dashed border-[#ffffff40]" onclick="load_filter_chitiet(this,'${
      data[i].dienthoai
    }', '${data[i].soct}')" >

        <td class=" px-4 py-2 text-center font-thin">${i + 1}</td>
        <td class="search_key px-4 py-2 text-center font-thin ">${
          data[i].dienthoai
        }</td>
        <td class="search_key px-4 py-2 text-left font-thin ">${
          data[i].hoten
        }</td>
        <td class=" px-4 py-2 text-center font-thin ">${data[i].id_soct}</td>
        <td class=" px-4 py-2 flex items-center justify-center font-thin ">${loai}</td>
    </tr>`);
      }
    }
  );
}
function load_filter_chitiet(e, sdt, soct) {
  $("#sodienthoai_crm_line").val(sdt);
  active_item(e);
  $.post(
    "ajax/crm/load_filter_chitiet.php",
    { sodienthoai: sdt },
    function (data, textStatus, jqXHR) {
      $("#list_filter_khachhang").html("");

      for (let i = 0; i < data.length; i++) {
        if (soct == data[i].soct) {
          $("#btn_add_chitiet_crm").removeClass("hidden");
          $("#list_filter_khachhang").append(`
            <option class='text-[black]' value="${data[i].soct}" selected>${data[i].noidung}</option>
            `);
        } else {
          $("#list_filter_khachhang").append(`
            <option class='text-[black]' value="${data[i].soct}">${data[i].noidung}</option>
            `);
        }
      }
      load_line(soct);
    }
  );
}

function load_line(soct) {
  let soct_di = "";
  const sodienthoai = $("#sodienthoai_crm_line").val();
  const msdn = $("#msdn_crm").val();
  const filter_soct = $("#list_filter_khachhang option:selected").val();
  $("#btn_add_chitiet_crm").addClass("hidden");
  if (filter_soct != "") {
    $("#btn_add_chitiet_crm").removeClass("hidden");
  }
  if (soct == "") {
    soct_di = filter_soct;
  } else {
    soct_di = soct;
  }
  $.post(
    "ajax/crm/load_line.php",
    {
      soct: soct_di,
      sodienthoai: sodienthoai,
    },
    function (data, textStatus, jqXHR) {
      $("#list_crm_line").html("");
      for (let i = 0; i < data.length; i++) {
        var btn_edit = "";
        if (data[i].phanloai == "NV" && data[i].msdn == msdn) {
          btn_edit = `<img class='min-w-[24px] max-w-[24px] min-h-[24px] max-h-[24px]' onclick="open_edit_chitiet_crm('${
            data[i].rowid
          }','${i + 1}','${data[i].noidung}','${
            data[i].trangthai
          }')" src='vendor/img/edit.png'>`;
        }
        $("#list_crm_line").append(`
              <tr class="active_items item_line border-b border-dashed border-[#ffffff40]" onclick='active_item(this)'>
                  <td class=" px-4 py-2 text-center font-thin">${i + 1}</td>
                  <td class=" px-4 py-2 text-center font-thin ">${
                    data[i].ngayyeucau
                  }</td>
                  <td class=" px-4 py-2 text-left font-thin ">${
                    data[i].hoten
                  }</td>
                  <td class=" px-4 py-2 text-left font-thin ">${
                    data[i].noidung
                  }</td>
                  <td class=" whitespace-nowrap px-4 py-2 text-left font-thin ">${
                    data[i].tenloai
                  }</td>
                  <td class=" px-4 py-2 font-thin ">
                  <div class='flex items-center justify-center gap-3'>
                 ${btn_edit}
                  </div>
                  </td>
              </tr>`);
      }
    }
  );
}

function open_edit_chitiet_crm(rowid, vitri, noidung, trangthai) {
  open_modal("form_edit_chitiet_crm");
  $("#vitri_edit").html(vitri);
  $("#rowid_edit").val(rowid);
  $("#noidung_edit").val(noidung);
  $("#loai_trangthai_edit").val(trangthai);
}

function edit_chitiet_crm() {
  const rowid = $("#rowid_edit").val();
  const soct = $("#list_filter_khachhang option:selected").val();
  const noidung = $("#noidung_edit").val();
  const trangthai = $("#loai_trangthai_edit option:selected").val();
  if (noidung != "" && trangthai != "") {
    $.post(
      "ajax/crm/edit_chitiet_crm.php",
      { rowid: rowid, soct: soct, noidung: noidung, trangthai: trangthai },
      function (data, textStatus, jqXHR) {
        close_modal("form_edit_chitiet_crm");
        load_line(soct);
      }
    );
  } else {
    $("#error_chinhsua").removeClass("hidden");
  }
}

function open_add_chitiet_crm() {
  open_modal("form_add_chitiet_crm");
}

function add_crm_line() {
  const noidung = $("#noidung_add").val();
  const soct = $("#list_filter_khachhang option:selected").val();
  const trangthai = $("#loai_trangthai_add option:selected").val();
  if (noidung != "" && trangthai != "") {
    $.post(
      "ajax/crm/add_crm_line.php",
      {
        noidung: noidung,
        soct: soct,
        trangthai: trangthai,
      },
      function (data, textStatus, jqXHR) {
        close_modal("form_add_chitiet_crm");
        load_line(soct);
        load_header();
      }
    );
  } else {
    $("#error_add").removeClass("hidden");
  }
}
function add_crm_header() {
  const noidung = $("#noidung_add_header").val();
  const dienthoai = $("#dienthoai_add_header").val();
  const hoten = $("#tenkh_add_header").val();
  if (noidung != "" && dienthoai != "") {
    $.post(
      "ajax/crm/add_crm_header.php",
      {
        noidung: noidung,
        dienthoai: dienthoai,
        hoten: hoten,
      },
      function (data, textStatus, jqXHR) {
        close_modal("form_add_header_crm");
        $("#noidung_add_header").val("");
        $("#dienthoai_add_header").val("");
        $("#tenkh_add_header").val("");
        load_header();
      }
    );
  } else {
    $("#error_add").removeClass("hidden");
  }
}

function load_trangthai() {
  $.post(
    "ajax/danhmuc/load_danhmuc.php",
    {
      phanloai: "ttcrm",
    },
    function (data, textStatus, jqXHR) {
      $("#list_filter_trangthai").html("");
      $("#list_filter_trangthai").append(`
      <option class='text-[black]' value="">Trạng thái</option>`);

      $("#loai_trangthai_add").html("");
      $("#loai_trangthai_add").append(`
      <option class='text-[black]' value="">Trạng thái</option>`);

      $("#loai_trangthai_edit").html("");
      $("#loai_trangthai_edit").append(`
      <option class='text-[black]' value="">Trạng thái</option>`);

      for (let i = 0; i < data.length; i++) {
        $("#list_filter_trangthai").append(`
            <option class='text-[black]' value="${data[i].msloai}">${data[i].tenloai}</option>
            `);
        $("#loai_trangthai_add").append(`
            <option class='text-[black]' value="${data[i].msloai}">${data[i].tenloai}</option>
            `);
        $("#loai_trangthai_edit").append(`
            <option class='text-[black]' value="${data[i].msloai}">${data[i].tenloai}</option>
            `);
      }
    }
  );
}
function load_nhanvien() {
  $.post(
    "ajax/thuchi/load_nhanvien.php",
    {},
    function (data, textStatus, jqXHR) {
      $("#list_filter_nhanvien").html("");
      $("#list_filter_nhanvien").append(
        `<option class='text-[black]' value="">Nhân viên</option>`
      );
      for (let i = 0; i < data.length; i++) {
        $("#list_filter_nhanvien").append(`
              <option class='text-[black]' value="${data[i].msdn}">${data[i].hoten}</option>
              `);
      }
    }
  );
}

function crm_search(e) {
  var input, filter, table, tr, td, i, j, cell;
  input = document.getElementById("search");
  filter = input.value
    .toUpperCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "")
    .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"));
  table = document.getElementById("list_crm_header");
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

function get_crm() {
  $.post("ajax/crm/get_crm.php", {}, function (data, textStatus, jqXHR) {
    $("#img_load_crm").addClass("animate-spin");
    setTimeout(() => {
      $("#img_load_crm").removeClass("animate-spin");
    }, 1000);
  });
}

function find_khachhang() {
  const value = $("#dienthoai_add_header").val();
  if (value.length == 10) {
    $.post(
      "ajax/banhang/find_khachhang.php",
      { value: value },
      function (data, textStatus, jqXHR) {
        if (data.length > 0) {
          $("#tenkh_add_header").val(data[0].tenkh);
        }
      }
    );
  }
}
