function _ChangeFormat(e) {
  var soluong = $(e).val().replace(/[.]/g, "");
  soluong = $(e)
    .val()
    .replace(/[.]/g, "")
    .toString()
    .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
  $(e).val(soluong);
}

function add_nhapkho_header() {
  $.post(
    "ajax/nhapkho/add_nhapkho_header.php",
    {},
    function (data, textStatus, jqXHR) {
      location.href = `Import/${data}`;
    }
  );
}

function add_nhapkho_line() {
  const soct = location.pathname.split("/").splice(-1)[0];
  let tenthuoc = $("#tenthuoc_add").val(),
    mshh = $("#mshh_add").val(),
    dvt = $("#dvt_add").val(),
    solo = $("#solo_add").val(),
    handung = $("#handung_add").val(),
    gianhap = $("#gianhap_add").val().replaceAll(".", ""),
    chietkhau = $("#chietkhau_add").val(),
    gianhapchuathue = $("#gianhapchuathue_add").val(),
    tienchietkhau = $("#tienchietkhau_add").val(),
    tienthue = $("#tienthue_add").val(),
    vat = $("#vat_add").val(),
    soluong = $("#soluong_add").val(),
    ptgiaban = $("#ptgiaban_add").val(),
    giaban = $("#giaban_add").val().replaceAll(".", ""),
    gianhapcothue = $("#gianhapvat_add").val().replaceAll(".", "");
  const select_chietkhau = $("#select_chietkhau option:selected").val();
  if (select_chietkhau == "vndchietkhau") {
    chietkhau = 0;
  } else if (select_chietkhau == "tongchietkhau") {
    chietkhau = 0;
  }
  const thanhtiencothue = parseInt(gianhapcothue) * soluong;
  $.post(
    "ajax/nhapkho/add_nhapkho_line.php",
    {
      soct: soct,
      tenthuoc: tenthuoc,
      mshh: mshh,
      dvt: dvt,
      solo: solo,
      handung: handung,
      gianhap: gianhap,
      chietkhau: chietkhau,
      tienchietkhau: tienchietkhau,
      tienthue: tienthue,
      vat: vat,
      soluong: soluong,
      ptgiaban: ptgiaban,
      giaban: giaban,
      gianhapchuathue: gianhapchuathue,
      gianhapcothue: gianhapcothue,
      thanhtiencothue: thanhtiencothue,
    },
    function (data, textStatus, jqXHR) {
      load_nhapkho_line();
      tinh_tongcong();
      $("#tenthuoc_add").val("");
      $("#dvt_add").val("");
      $("#mshh_add").val("");
      $("#solo_add").val("");
      $("#gianhap_add").val(0);
      $("#chietkhau_add").val(0);
      $("#gianhapchuathue_add").val(0);
      $("#tienthue_add").val(0);
      $("#vat_add").val(5);
      $("#soluong_add").val(1);
      $("#ptgiaban_add").val(0);
      $("#giaban_add").val(0);
      $("#gianhapvat_add").val(0);
    }
  );
}
function tinh_tongcong() {
  const soct = location.pathname.split("/").splice(-1)[0];
  $.post(
    "ajax/nhapkho/nhapkho_tinhtong.php",
    {
      soct: soct,
    },
    function (data) {
      $("#tongcong_add").val(
        data[0].thanhtiencothue.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
      );
    }
  );
}
function tinh_ptgiaban() {
  const ptgiaban = $("#ptgiaban_add").val();
  const gianhapcothue = $("#gianhapvat_add").val().replaceAll(".", "");
  const giaban =
    parseInt(gianhapcothue) + (parseInt(gianhapcothue) * ptgiaban) / 100;
  const replace_giaban = Math.ceil(parseFloat(giaban) / 1000) * 1000;
  $("#giaban_add").val(
    replace_giaban.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
}

function ktra_sotien_thanhtoan(e) {
  const conno = $("#sotien_thanhtoan").val().replaceAll(".", "");
  const sotien = $(e).val().replaceAll(".", "");
  if (sotien > conno) {
    $("#title_thongbao").html("Số tiền quá hạn mức cần thanh toán");
    $(e).val(conno.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
  }
}

function tinh_gianhapcothue() {
  const select_chietkhau = $("#select_chietkhau option:selected").val();
  var gianhap = $("#gianhap_add").val().replaceAll(".", "");
  const ptgiaban = $("#ptgiaban_add").val();
  const soluong = $("#soluong_add").val();
  var chietkhau = $("#chietkhau_add").val().replaceAll(".", "");
  var vat = $("#vat_add").val();

  if (select_chietkhau == "ptchietkhau") {
    const tienchietkhau = gianhap - (gianhap - (gianhap * chietkhau) / 100);
    const tinhchietkhau = gianhap - (gianhap * chietkhau) / 100;
    const tinhvat = tinhchietkhau + (tinhchietkhau * vat) / 100;
    const tienthue = (tinhchietkhau * vat) / 100;
    const giaban = tinhvat + (tinhvat * ptgiaban) / 100;
    const replace_giaban = Math.ceil(parseFloat(giaban) / 1000) * 1000;
    $("#tienthue_add").val(tienthue);
    $("#tienchietkhau_add").val(tienchietkhau);
    $("#gianhapchuathue_add").val(tinhchietkhau);
    $("#gianhapvat_add").val(
      tinhvat.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
    );
    console.log(giaban);
    $("#giaban_add").val(
      replace_giaban.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
    );
  }
}

function load_nhapkho_line() {
  const soct = location.pathname.split("/").splice(-1)[0];
  $.post(
    "ajax/nhapkho/load_nhapkho_line.php",
    {
      soct: soct,
    },
    function (data) {
      $("#chitiet_nhapkho_line").html(data);
    }
  );
}

function update_nhapkho_header() {
  const soct = location.pathname.split("/").splice(-1)[0];
  var tongcong = $("#tongcong_add").val().replaceAll(".", ""),
    sohoadon = $("#sohoadon_add").val(),
    ngayhd = $("#ngayhd_add").val(),
    msncc = $("#nhacc_add").val(),
    tenncc = $("#nhacc_add option:selected").text();
  if (msncc != "" && sohoadon != "" && ngayhd != "") {
    $("#ncc_error").css("display", "none");
    $("#ngayhd_error").css("display", "none");
    $("#sohd_error").css("display", "none");
    $.post(
      "ajax/nhapkho/update_nhapkho_header.php",
      {
        soct: soct,
        sohoadon: sohoadon,
        ngayhd: ngayhd,
        msncc: msncc,
        tenncc: tenncc,
        tongcong: tongcong,
      },
      function (data) {
        open_modal("form_info");
        $("#text_thongbao").html("Nhập kho thành công");
        $("#text_thongbao").addClass("text-[green]");
        setTimeout(function return_nhapkho() {
          location.href = "ListImport";
        }, 1000);
      }
    );
  } else {
    open_modal("form_info");
    $("#text_thongbao").html("Vui lòng nhập đầy đủ thông tin đơn hàng");
  }
}
function nhapkho_load_header_taophieu() {
  const soct = location.pathname.split("/").splice(-1)[0];
  $.post(
    "ajax/nhapkho/nhapkho_load_header_taophieu.php",
    {
      soct: soct,
    },
    function (data) {
      $("#nhacc_add").val(data[0].msncc);
      $("#sohoadon_add").val(data[0].sohd);
      $("#ngayhd_add").val(data[0].ngayhd);
    }
  );
}

function open_nhapkho_delete_line(soct, rowid, tenhh) {
  open_modal("form_delete");
  $("#soct_delete").val(soct);
  $("#rowid_delete").val(rowid);
  $("#ten_hanghoa_delete").text(tenhh);
}

function delete_nhapkho_line(e) {
  const soct = $("#soct_delete").val();
  const rowid = $("#rowid_delete").val();
  $.post(
    "ajax/nhapkho/delete_nhapkho_line.php",
    {
      soct: soct,
      rowid: rowid,
    },
    function (data) {
      close_modal("form_delete");
      load_nhapkho_line();
      tinh_tongcong();
    }
  );
}

function load_hosohanghoa(e) {
  if (typeof timer !== undefined) {
    clearTimeout(this.timer);
  }
  this.timer = setTimeout(a, 500);
  function a() {
    const tenhh = $(e).val();
    $.post(
      "ajax/nhapkho/load_hosohanghoa_nhapkho.php",
      {
        tenhh: tenhh,
      },
      function (data) {
        if (tenhh != "") {
          $("#load_hosohanghoa").html(data);
        } else {
          $("#load_hosohanghoa").html("");
        }
      }
    );
  }
}
function chon_hanghoa(e) {
  $("#tenthuoc_add").val("");
  const mshh = $(e).find(".mshh").text();
  const tenhh = $(e).find(".tenhh").text();
  const gianhap = $(e).find(".gianhap").text();
  const giaban = $(e).find(".giaban").text();
  const thuesuat = $(e).find(".thuesuat").text();
  const dvt = $(e).find(".dvt").text();
  $("#mshh_add").val(mshh);
  $("#dvt_add").val(dvt);
  $("#gianhap_add").val(
    gianhap.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#vat_add").val(thuesuat);
  $("#tenthuoc_add").val(tenhh);
  $("#gianban_add").val(giaban);
  $("#load_hosohanghoa").html("");
  tinh_gianhapcothue();
}

function open_form_edit_line(
  soct,
  mshh,
  tenhh,
  dvt,
  solo,
  handung,
  gianhap,
  chietkhau,
  tienchietkhau,
  vat,
  gianhapvat,
  soluong,
  ptgiaban,
  giaban,
  thanhtien
) {
  open_modal("form_edit");
  $("#soct_edit_line").val(soct);
  $("#mshh_edit_line").val(mshh);
  $("#tenhh_line_edit").val(tenhh);
  $("#dvt_line_edit").val(dvt);
  $("#solo_line_edit").val(solo);
  $("#handung_line_edit").val(handung);
  $("#gianhap_line_edit").val(
    gianhap.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#chietkhau_line_edit").val(chietkhau);
  $("#tienchietkhau_line_edit").val(
    tienchietkhau.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#vat_line_edit").val(vat);
  $("#gianhapvat_line_edit").val(
    gianhapvat.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#soluong_line_edit").val(
    soluong.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#ptgiaban_line_edit").val(ptgiaban);
  $("#giaban_line_edit").val(
    giaban.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#thanhtien_line_edit").val(
    thanhtien.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
}

function tinh_gianhapcothue_edit() {
  var gianhap = $("#gianhap_line_edit").val().replaceAll(".", "");
  var chietkhau = $("#chietkhau_line_edit").val().replaceAll(".", "");
  var vat = $("#vat_line_edit").val();
  var ptgianban = $("#ptgiaban_line_edit").val();
  var soluong = $("#soluong_line_edit").val();

  const tienchietkhau = gianhap - (gianhap - (gianhap * chietkhau) / 100);
  const tinhchietkhau = gianhap - (gianhap * chietkhau) / 100;
  const tinhvat = tinhchietkhau + (tinhchietkhau * vat) / 100;
  const giaban = tinhvat + (tinhvat * ptgianban) / 100;
  var replace_giaban = Math.ceil(parseFloat(giaban) / 1000) * 1000;
  const thanhtien = tinhvat * soluong;
  $("#tienchietkhau_line_edit").val(tienchietkhau);
  $("#gianhapvat_line_edit").val(
    tinhvat.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#giaban_line_edit").val(
    replace_giaban.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#thanhtien_line_edit").val(
    thanhtien.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
}

function edit_nhapkho_line() {
  const soct = $("#soct_edit_line").val();
  const mshh = $("#mshh_edit_line").val();
  const tenhh = $("#tenhh_line_edit").val();
  const dvt = $("#dvt_line_edit").val();
  const solo = $("#solo_line_edit").val();
  const handung = $("#handung_line_edit").val();
  const gianhap = $("#gianhap_line_edit").val().replaceAll(".", "");
  const chietkhau = $("#chietkhau_line_edit").val();
  const tienchietkhau = $("#tienchietkhau_line_edit").val().replaceAll(".", "");
  const vat = $("#vat_line_edit").val();
  const gianhapvat = $("#gianhapvat_line_edit").val().replaceAll(".", "");
  const soluong = $("#soluong_line_edit").val();
  const ptgiaban = $("#ptgiaban_line_edit").val();
  const giaban = $("#giaban_line_edit").val().replaceAll(".", "");
  const thanhtien = $("#thanhtien_line_edit").val().replaceAll(".", "");
  const gianhapchuathue = gianhap - (gianhap * chietkhau) / 100;
  const tienthue = gianhapvat - gianhapchuathue;

  $.post(
    "ajax/nhapkho/edit_nhapkho_line.php",
    {
      soct: soct,
      mshh: mshh,
      tenhh: tenhh,
      dvt: dvt,
      solo: solo,
      handung: handung,
      gianhap: gianhap,
      chietkhau: chietkhau,
      tienchietkhau: tienchietkhau,
      gianhapchuathue: gianhapchuathue,
      vat: vat,
      tienthue: tienthue,
      gianhapvat: gianhapvat,
      soluong: soluong,
      ptgiaban: ptgiaban,
      giaban: giaban,
      thanhtien: thanhtien,
    },
    function (data) {
      load_nhapkho_line();
      tinh_tongcong();
      close_modal("form_edit");
    }
  );
}

//!function này load ở phần nhập kho bên ngoài

function load_chitiet_line(e, soct, title) {
  $(".item_nhapkho_header").removeClass("active_items");
  $(e).parent().addClass("active_items");
  $("#title_delete_nhapkho").val(title);
  $("#soct_nhapkho").val(soct);
  $.post("ajax/nhapkho/load_chitiet_line.php", { soct: soct }, function (data) {
    $("#list_nhapkho_line").html(data);
  });
}
function get_nhapkho_chua_update() {
  $.post(
    "ajax/nhapkho/nhapkho_load_header_chua_update.php",
    {},
    function (data) {
      if (data.length > 0) {
        open_modal("form_nhapkho_chua_thanhcong");
        for (let i = 0; i <= data.length; i++) {
          $("#item_nhapkho_chua_thanhcong").append(`
              <div class="bg-[#ff9900] flex justify-between w-full p-2 rounded-md">
                  <a  href='EditImport/${data[i].soct}'>
                      Hóa đơn chưa nhập
                  </a>
                  <input hidden class='soct_delete' value='${data[i].soct}' >
                  <span class='hover:cursor-pointer' onclick='___delete_nhapkho_header(this)'>Xóa</span>
              </div>
        `);
        }
      }
    }
  );
}
function open_delete_nhapkho() {
  const soct = $("#soct_nhapkho").val();
  if (soct != "") {
    const title = $("#title_delete_nhapkho").val();
    $("#soct_delete").val(soct);
    $("#ten_donhang").html(title);
    open_modal("form_delete_nhapkho");
  } else {
    open_modal("form_error");
  }
}

function delete_nhapkho() {
  const soct = $("#soct_delete").val();
  $.post("ajax/nhapkho/delete_nhapkho.php", { soct: soct }, function (data) {
    close_modal("form_delete_nhapkho");
    $("#list_nhapkho_line").html("");
    $("#title_delete_nhapkho").val("");
    $("#soct_nhapkho").val("");
    nhapkho_filter();
  });
}

function ___delete_nhapkho_header(e) {
  const soct = $(e).parent().find(".soct_delete").val();
  $.post("ajax/nhapkho/delete_nhapkho.php", { soct: soct }, function (data) {
    $("#item_nhapkho_chua_thanhcong").html("");
    get_nhapkho_chua_update();
  });
}

function nhapkho_filter() {
  const tungay = $("#tungay_input").val().split("/");
  const tungay_add = tungay[2] + "-" + tungay[1] + "-" + tungay[0];
  const denngay = $("#denngay_input").val().split("/");
  const denngay_add = denngay[2] + "-" + denngay[1] + "-" + denngay[0];

  const loai = $("#loai_filter").val();
  $.post(
    "ajax/nhapkho/nhapkho_filter.php",
    { loai: loai, tungay: tungay_add, denngay: denngay_add },
    function (data) {
      $("#list_nhapkho_header").html(data);
    }
  );
}

function huy_nhapkho() {
  const soct = location.pathname.split("/").splice(-1)[0];
  location.href = "ListImport";
  $.post("ajax/nhapkho/huy_nhapkho.php", { soct: soct }, function (data) {});
}

function capnhat_nhapkho(e) {
  const soct = $("#soct_nhapkho").val();
  if (soct != "") {
    location.href = "EditImport/" + soct;
    $.post(
      "ajax/nhapkho/capnhat_nhapkho.php",
      { soct: soct },
      function (data) {}
    );
  } else {
    open_modal("form_error");
  }
}

function add_nhacungcap(id_danhmuc) {
  const tendanhmuc = $("#tennhacc_add").val();
  $.post(
    "ajax/danhmuc/add_danhmuc.php",
    {
      tendanhmuc: tendanhmuc,
      phanloai: "nhacc",
      tenphanloai: "Nhà cung cấp",
      loai: "0",
      id_danhmuc: id_danhmuc,
    },
    function (data) {
      load_nhacungcap();
    }
  );
}
function load_nhacungcap() {
  $("#list_nhacungcap").html("");
  $("#nhacc_add").html("");
  $.post(
    "ajax/danhmuc/load_danhmuc.php",
    { phanloai: "nhacc" },
    function (data) {
      $("#nhacc_add").append(`
        <option class='text-black' value="">Chọn nhà cung cấp</option>
        `);
      for (let i = 0; i <= data.length; i++) {
        $("#nhacc_add").append(`
        <option class='text-black' value="${data[i].msloai}">${data[i].tenloai}</option>
        `);
        $("#list_nhacungcap").append(`
          <tr>
                <td class='px-4 py-2 text-center' scope="row">${i + 1}</td>
                <td class="dvt px-4 py-2 text-start">${data[i].tenloai}</td>
                <td  class='px-4 py-2 flex justify-center' onclick='delete_ncc("${
                  data[i].rowid
                }")'><img src='vendor/img/delete16.png'></td>
            </tr>
          `);
      }
    }
  );
}

function delete_ncc(rowid) {
  $.post(
    "ajax/nhapkho/delete_nhacungcap.php",
    { rowid: rowid },
    function (data) {
      load_nhacungcap();
    }
  );
}

function open_post_thuchi(e) {
  open_modal("form_post_thuchi");
  const conno = $(e).parent().find(".conno").text();
  const soct = $(e).parent().find(".soct").text();
  const ten_ncc = $(e).parent().find(".ten_ncc").text();
  const msnccc = $(e).parent().find(".msncc").text();
  const sohd = $(e).parent().find(".sohd").text();
  const dathanhtoan = $(e).parent().find(".dathanhtoan").text();
  $("#sotien_conno").val(conno);
  $("#sotien_thanhtoan").val(conno);
  $("#soct_thanhtoan").val(soct);
  $("#ten_ncc_thanhtoan").val(ten_ncc);
  $("#ms_ncc_thanhtoan").val(msnccc);
  $("#sohd_thanhtoan").val(sohd);
  $("#dathanhtoan_thanhtoan").val(dathanhtoan);
}

function nhapkho_post_thuchi() {
  const maso = $("#ms_ncc_thanhtoan").val();
  const tenmaso = $("#ten_ncc_thanhtoan").val();
  const soct_donhang = $("#soct_thanhtoan").val();
  const sohd = $("#sohd_thanhtoan").val();
  const dathanhtoan = $("#dathanhtoan_thanhtoan").val();
  const makhoanmuc = $("#ID_chinhacungcap").val();
  const sotien = $("#sotien_conno").val().replaceAll(".", "");
  const nganquythu = $("#nganquy_post_thuchi option:selected").val();
  $.post(
    "ajax/nhapkho/nhapkho_post_thuchi.php",
    {
      maso: maso,
      tenmaso: tenmaso,
      soct_donhang: soct_donhang,
      sohd: sohd,
      sotienthu: sotien,
      makhoanmuc: makhoanmuc,
      nganquythu: nganquythu,
      dathanhtoan: dathanhtoan,
    },
    function (data) {
      close_modal("form_post_thuchi");
      nhapkho_filter();
    }
  );
}

function nhapkho_search(e) {
  var input, filter, table, tr, td, i, j, cell;
  input = document.getElementById("search");
  filter = input.value
    .toUpperCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "")
    .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"));
  table = document.getElementById("list_nhapkho_header");
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

function open_print_nhapkho() {
  const soct = $("#soct_nhapkho").val();
  if (soct != "") {
    $.post(
      "ajax/nhapkho/inphieu_nhapkho.php",
      { soct: soct },
      function (data, textStatus, jqXHR) {
        $.print(data);
      }
    );
  } else {
    open_modal("form_error");
  }
}
