function _ChangeFormat(e) {
  var soluong = $(e).val().replace(/[.]/g, "");
  soluong = $(e)
    .val()
    .replace(/[.]/g, "")
    .toString()
    .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
  $(e).val(soluong);
}

function lay_tonkho_baocao() {
  $.post(
    "ajax/xuatkho/lay_tonkho_baocao.php",
    { loai: "CN" },
    function (data, textStatus, jqXHR) {}
  );
}

function add_xuatkho_header(loaixuat) {
  $.post(
    "ajax/xuatkho/add_xuatkho_header.php",
    { loaixuat: loaixuat },
    function (data, textStatus, jqXHR) {
      location.href = `Export/${data}`;
    }
  );
}

function tinh_soluong_tonkho(e) {
  const tonkho = $("#tonkho_add").val().replaceAll(".", "");
  const soluong = $(e).val();
  $("#btn_add_line").removeClass("hidden");
  const thamso_qltk = $("#thamso_qltk").val();
  if (thamso_qltk == 1) {
    if (Number(soluong) > Number(tonkho)) {
      $("#btn_add_line").addClass("hidden");
    }
  }
}

function add_xuatkho_line() {
  lay_tonkho_baocao();
  const soct = location.pathname.split("/").splice(-1)[0];
  let tenhh = $("#tenthuoc_add").val(),
    mshh = $("#mshh_add").val(),
    dvt = $("#dvt_add").val(),
    solo = $("#solo_add").val(),
    soluong = $("#soluong_add").val(),
    pttichluy = $("#pttichluy_add").val(),
    thuesuat = $("#thuesuat_add").val(),
    gianhap = $("#gianhap_add").val().replace(/[.]/g, ""),
    giaban = $("#giaban_add").val().replace(/[.]/g, ""),
    ptgiam = $("#ptgiam_add").val(),
    tonkho = $("#tonkho_add").val().replace(/[.]/g, ""),
    handung = $("#handung_add").val(),
    msctkm = $("#msctkm_add").val(),
    msncc = $("#msncc_add").val(),
    loai_xuat = $("#loaixuat_add option:selected").val();
  if (Number(soluong) > Number(tonkho)) {
    $("#tensp_warning").html(tenhh);
  } else {
    $.post(
      "ajax/xuatkho/add_xuatkho_line.php",
      {
        soct: soct,
        mshh: mshh,
        tenhh: tenhh,
        dvt: dvt,
        solo: solo,
        soluong: soluong,
        pttichluy: pttichluy,
        thuesuat: thuesuat,
        giaban: giaban,
        giagoc: gianhap,
        ptgiam: ptgiam,
        handung: handung,
        msctkm: msctkm,
        msncc: msncc,
        loai_xuat: loai_xuat,
      },
      function (data, textStatus, jqXHR) {
        load_xuatkho_line();
        tinh_tongcong();
        $("#tenthuoc_add").val("");
        $("#dvt_add").val("");
        $("#mshh_add").val("");
        $("#solo_add").val("");
        $("#handung_add").val("");
        $("#gianhap_add").val(0);
        $("#thuesuat_add").val(0);
        $("#soluong_add").val(1);
        $("#pttichluy_add").val(0);
      }
    );
  }
}
function loai_phieuxuat() {
  const soct = location.pathname.split("/").splice(-1)[0];
  $.post(
    "ajax/xuatkho/xuatkho_tinhtong.php",
    {
      soct: soct,
    },
    function (data) {
      $("#loaixuat_add").val(data[0].loaixuat);
    }
  );
}
function tinh_tongcong() {
  const soct = location.pathname.split("/").splice(-1)[0];
  $.post(
    "ajax/xuatkho/xuatkho_tinhtong.php",
    {
      soct: soct,
    },
    function (data) {
      $("#tongcong_add").val(
        data[0].tongtien.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
      );
    }
  );
}

function load_xuatkho_line() {
  const soct = location.pathname.split("/").splice(-1)[0];
  $.post(
    "ajax/xuatkho/load_xuatkho_line.php",
    {
      soct: soct,
    },
    function (data) {
      $("#list_xuatkho_line").html(data);
    }
  );
}

function update_xuatkho_header() {
  const soct = location.pathname.split("/").splice(-1)[0];
  var tongcong = $("#tongcong_add").val().replaceAll(".", ""),
    loaixuat = $("#loaixuat_add option:selected").val();
  if (loaixuat != "") {
    $("#ncc_error").css("display", "none");
    $("#ngayhd_error").css("display", "none");
    $("#sohd_error").css("display", "none");
    $.post(
      "ajax/xuatkho/update_xuatkho_header.php",
      {
        soct: soct,
        loaixuat: loaixuat,
        tongcong: tongcong,
      },
      function (data) {
        open_modal("form_info");
        $("#text_thongbao").html("Xuất kho thành công");
        $("#text_thongbao").addClass("text-[green]");
        location.href = "ListExport";
      }
    );
  } else {
    open_modal("form_info");
    $("#text_thongbao").html("Vui lòng nhập đầy đủ thông tin đơn hàng");
  }
}

function open_modal_delete(soct, rowid, tenhh) {
  open_modal("form_delete");
  $("#soct_delete").val(soct);
  $("#rowid_delete").val(rowid);
  $("#ten_hanghoa_delete").text(tenhh);
}

function delete_xuatkho_line(e) {
  const soct = $("#soct_delete").val();
  const rowid = $("#rowid_delete").val();
  $.post(
    "ajax/xuatkho/delete_xuatkho_line.php",
    {
      soct: soct,
      rowid: rowid,
    },
    function (data) {
      close_modal("form_delete");
      load_xuatkho_line();
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
    const loaixuat = $("#loaixuat_add option:selected").data("dieukien");
    if (loaixuat == "" || loaixuat == undefined) {
      open_modal("form_info");
      $("#text_thongbao").text("Hãy chọn loại xuất");
    } else {
      $.post(
        "ajax/xuatkho/load_hosohanghoa_xuatkho.php",
        {
          tenhh: tenhh,
          loaixuat: loaixuat,
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
}
function chon_hanghoa(
  mshh,
  tenhh,
  dvt,
  solo,
  handung,
  gianhap,
  giaban,
  soluong,
  sohd,
  ngayhd,
  tenncc
) {
  $("#mshh_add").val(mshh);
  $("#tenthuoc_add").val(tenhh);
  $("#dvt_add").val(dvt);
  $("#solo_add").val(solo);
  $("#handung_add").val(handung);
  $("#gianhap_add").val(
    gianhap.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#giaban_add").val(giaban);
  $("#load_hosohanghoa").html("");
  // tinh_gianhapcothue();
  ktra_tonkho(mshh);
  $.post(
    "ajax/xuatkho/get_tonkho.php",
    {
      mshh: mshh,
      solo: solo,
      handung: handung,
    },
    function (hanghoa, tonkho, jqXHR) {
      $("#pttichluy_add").val(
        hanghoa[0] != undefined ? hanghoa[0].pttichluy : 0
      );
      $("#msncc_add").val(hanghoa[0] != undefined ? hanghoa[0].msncc : "");
      $("#thuesuat_add").val(hanghoa[0] != undefined ? hanghoa[0].thuesuat : 0);
      $("#load_hosohanghoa_xuat").addClass("hidden");
    }
  );
}
function ktra_tonkho(mshh) {
  const thamso_qltk = $("#thamso_qltk").val();
  $.post(
    "ajax/nhatky/ktra_tonkho.php",
    { mshh: mshh, thamso_qltk: thamso_qltk },
    function (data, textStatus, jqXHR) {
      $("#tonkho_add").val(data);
    }
  );
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

//!function này load ở phần nhập kho bên ngoài
function load_nhapkho_header() {
  $.post("ajax/nhapkho/load_nhapkho_header.php", {}, function (data) {
    $("#list_nhapkho_header").html(data);
  });
}
//!function này load ở phần nhập kho bên ngoài

function load_chitiet_line(e, soct, title) {
  $(".item_nhapkho_header").removeClass("active_items");
  $("#title_delete_xuatkho").val(title);
  $("#soct_xuatkho").val(soct);
  $.post("ajax/xuatkho/load_chitiet_line.php", { soct: soct }, function (data) {
    $("#list_xuatkho_line").html(data);
  });
}

function open_delete_xuatkho() {
  const soct = $("#soct_xuatkho").val();
  const title = $("#title_delete_xuatkho").val();
  console.log(title);
  $("#soct_delete").val(soct);
  $("#ten_donhang").html(title);
  open_modal("form_delete_xuatkho");
}

function delete_xuatkho() {
  const soct = $("#soct_delete").val();
  $.post("ajax/xuatkho/delete_xuatkho.php", { soct: soct }, function (data) {
    close_modal("form_delete_xuatkho");
    $("#list_xuatkho_line").html("");
    $("#title_delete_xuatkho").val("");
    $("#soct_xuatkho").val("");
    xuatkho_filter();
  });
}

function ___delete_xuatkho_header(e) {
  const soct = $(e).parent().find(".soct_delete").val();
  $.post("ajax/xuatkho/delete_xuatkho.php", { soct: soct }, function (data) {
    $("#item_xuatkho_chua_thanhcong").html("");
    get_xuatkho_chua_update();
    xuatkho_filter();
    close_modal("form_xuatkho_chua_thanhcong");
  });
}

function get_xuatkho_chua_update() {
  $.post(
    "ajax/xuatkho/xuatkho_load_header_chua_update.php",
    {},
    function (data) {
      if (data.length > 0) {
        open_modal("form_xuatkho_chua_thanhcong");
        for (let i = 0; i <= data.length; i++) {
          $("#item_xuatkho_chua_thanhcong").append(`
              <div class="bg-[#ff9900] flex justify-between gap-5 w-full p-2 mt-3 rounded-md">
                  <a  href='EditExport/${data[i].soct}'>
                      Hóa đơn chưa lưu
                  </a>
                  <input hidden class='soct_delete' value='${data[i].soct}' >
                  <span class='hover:cursor-pointer' onclick='___delete_xuatkho_header(this)'>Xóa</span>
              </div>
        `);
        }
      }
    }
  );
}

function xuatkho_filter() {
  const tungay = $("#tungay_input").val().split("/");
  const tungay_add = tungay[2] + "-" + tungay[1] + "-" + tungay[0];
  const denngay = $("#denngay_input").val().split("/");
  const denngay_add = denngay[2] + "-" + denngay[1] + "-" + denngay[0];

  const loaixuat = $("#loaixuat_filter").val();
  $.post(
    "ajax/xuatkho/xuatkho_filter.php",
    { loaixuat: loaixuat, tungay: tungay_add, denngay: denngay_add },
    function (data) {
      $("#list_xuatkho_header").html(data);
    }
  );
}

function huy_xuatkho() {
  const soct = location.pathname.split("/").splice(-1)[0];
  location.href = "ListExport";
  $.post("ajax/xuatkho/huy_xuatkho.php", { soct: soct }, function (data) {});
}

function capnhat_xuatkho(e) {
  const soct = $("#soct_xuatkho").val();
  if (soct != "") {
    location.href = "EditExport/" + soct;
    $.post(
      "ajax/xuatkho/capnhat_xuatkho.php",
      { soct: soct },
      function (data) {}
    );
  }
}

function add_danhmuc(id_danhmuc) {
  const tendanhmuc = $("#tenloaixuat_add").val();
  $.post(
    "ajax/danhmuc/add_danhmuc.php",
    {
      tendanhmuc: tendanhmuc,
      phanloai: "loaixuat",
      tenphanloai: "Loại xuất",
      loai: "0",
      id_danhmuc: id_danhmuc,
    },
    function (data) {
      load_loaixuat();
    }
  );
}

function load_loaixuat() {
  $("#loaixuat_filter").html("");
  $("#loaixuat_add").html("");
  $("#list_loaixuat").html("");
  $.post(
    "ajax/danhmuc/load_danhmuc.php",
    { phanloai: "loaixuat" },
    function (data) {
      $("#loaixuat_filter").append(`
        <option class='text-black' value="">Tất cả loại xuất</option>
        `);
      $("#loaixuat_add").append(`
        <option class='text-black' value="">Tất cả loại xuất</option>
        `);
      for (let i = 0; i < data.length; i++) {
        $("#loaixuat_filter").append(`
         <option class='text-black' value="${data[i].msloai}" data-dieukien='${data[i].dieukien2}'>${data[i].tenloai}</option>
         `);
        $("#loaixuat_add").append(`
         <option class='text-black' value="${data[i].msloai}" data-dieukien='${
          data[i].dieukien2 == "" ? "XBT" : data[i].dieukien2
        }'>${data[i].tenloai}</option>
         `);
        $("#list_loaixuat").append(`
         <tr>
         <td class='px-4 py-2 text-center' scope="row">${i + 1}</td>
         <td class="dvt px-4 py-2 text-start">${data[i].tenloai}</td>
         <td  class='px-4 py-2 flex justify-center' onclick='delete_loaixuat("${
           data[i].msloai
         }")'><img src='vendor/img/delete16.png'></td>
     </tr>
         `);
      }
    }
  );
}

function delete_loaixuat(msloai) {
  $.post(
    "ajax/danhmuc/delete_danhmuc.php",
    { msloai: msloai, phanloai: "loaixuat" },
    function (data) {
      load_loaixuat();
    }
  );
}
