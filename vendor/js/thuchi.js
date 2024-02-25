function _ChangeFormat(e) {
  var soluong = $(e).val().replace(/[.]/g, "");
  soluong = $(e)
    .val()
    .replace(/[.]/g, "")
    .toString()
    .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
  $(e).val(soluong.replace(/[^0-9\.\,]/g, ""));
}

function load_thuchi() {
  const valueSearch = $("#_search").val();
  const tungay = $("#tungay_input").val();
  const denngay = $("#denngay_input").val();
  const locloai = $("#trangthai_loc option:selected").val();
  const khoanmuc = $("#khoanmuc_loc option:selected").val();
  $.post(
    "ajax/thuchi/load_thuchi.php",
    {
      valueSearch: valueSearch,
      tungay: tungay,
      denngay: denngay,
      locloai: locloai,
      khoanmuc: khoanmuc,
    },
    function (data) {
      load_tongthuchi(tungay, denngay);
      $("#chitiet_thuchi").html("");
      for (let i = 0; i < data.length; i++) {
        var btn_edit = "";
        var btn_print = "";
        if (data[i].dieukien2 != "") {
          btn_edit = `<button data-target="#form_edit_thu" class='min-w-[20px] max-w-[20px]' data-toggle="modal"><img class='min-w-[20px] max-w-[20px] hidden' src="./vendor/img/edit.png" title='Chỉnh thu chi'></button>
          `;
        } else {
          btn_edit = `<button data-target="#form_edit_thu" onclick="open_edit_thuchi(this, '${data[i].loaichungtu}','${data[i].makhoanmuc}','${data[i].nganquy}')" data-toggle="modal"><img class='min-w-[20px] max-w-[20px]' src="./vendor/img/edit.png"  title='Chỉnh thu chi'></button>
         `;
        }
        if (data[i].socttc != "") {
          btn_print = `<button data-target="#form_edit_thu" onclick="open_print_thuchi('${data[i].socttc}')" data-toggle="modal"><img class='min-w-[20px] max-w-[20px]' src="./vendor/img/print.png" title='In thu chi'></button>
          `;
        } else {
          btn_print = `<button data-target="#form_edit_thu" class='min-w-[20px] max-w-[20px]' data-toggle="modal"><img class='min-w-[20px] max-w-[20px] hidden' src="./vendor/img/print.png" title='In thu chi'></button>
         `;
        }
        $("#chitiet_thuchi").append(`
            <tr class="active_items item_line border-b border-dashed border-[#ffffff40]" onclick='active_item(this)'>
                <td class='px-4 py-2 text-center'>${i + 1}</td>
                <td class="msdv_thuchi" hidden>${data[i].msdv}</td>
                <td class="msdn_thuchi" hidden>${data[i].msdn}</td>
                <td class="nganquy_thuchi" hidden>${data[i].nganquy}</td>
                <td class="khoanmuc_thuchi" hidden>${data[i].makhoanmuc}</td>
                <td class="msnv_thuchi" hidden>${data[i].msnv}</td>
                <td class="soct_thuchi" hidden>${data[i].soct}</td>
                <td class="soct_donhang_thuchi" hidden>${data[i].socttc}</td>
                <td class="lastmodify_thuchi px-4 py-2 text-center">${
                  data[i].lastmodify
                }</td>
                <td class="ngay_thuchi px-4 py-2 text-center hidden">${
                  data[i].ngay
                }</td>
                <td class="sotien_thu px-4 py-2 text-end">${data[
                  i
                ].SoTienThu.toString().replace(
                  /(\d)(?=(\d\d\d)+(?!\d))/g,
                  "$1."
                )}</td>
                  <td class="sotien_chi px-4 py-2 text-end">${data[
                    i
                  ].SoTienChi.toString().replace(
                    /(\d)(?=(\d\d\d)+(?!\d))/g,
                    "$1."
                  )}</td>
                <td class="nd_thuchi px-4 py-2 text-start">${
                  data[i].noidung
                }</td>
               
                <td class="maso_thuchi" hidden>${data[i].mskh}</td>
                <td class='px-4 py-2 text-center hidden'>${data[i].tenkh}</td>
                <td class="px-4 py-2 text-center">${data[i].tenloai}</td>
                <td class='px-4 py-2 text-center hidden'>${data[i].msnv}</td>
                <td class='px-4 py-2 text-left'>${data[i].tennv}</td>
                <td class='px-4 py-2 '>
                <div class='flex justify-center items-center gap-3'>
                ${btn_edit}
                ${btn_print}
                      <button data-target="#form_delete_thuchi" onclick="open_delete_thuchi(this,'${
                        data[i].loaichungtu
                      }')" data-toggle="modal"><img class='min-w-[20px] max-w-[20px]' src="./vendor/img/delete.png" title='Xóa thu chi'></button>
              </div>
                </td>
            </tr>
        `);
      }
    }
  );
}

function open_print_thuchi(soct) {
  $.post(
    "ajax/banhang/inphieu_banhang.php",
    { soct: soct, qr_img: "" },
    function (data, textStatus, jqXHR) {
      $.print(data);
    }
  );
}

function add_khoanmuc(e, loai, id_danhmuc) {
  const tenkhoanmuc = $(e).parent().parent().find("#tendanhmuc_add").val();

  if (tenkhoanmuc != "") {
    $.post(
      "ajax/danhmuc/add_danhmuc.php",
      {
        tendanhmuc: tenkhoanmuc,
        phanloai: "khoanmuc",
        tenphanloai: "Thu chi",
        loai: loai,
        id_danhmuc: id_danhmuc,
      },
      function (data) {
        load_khoanmuc();
      }
    );
  }
}

function load_khoanmuc() {
  $("#khoanmucthu_add").html("");
  $("#khoanmucchi_add").html("");
  $("#khoanmucthu_edit").html("");
  $("#khoanmucchi_edit").html("");
  $("#khoanmuc_loc").html("");
  $.post(
    "ajax/danhmuc/load_danhmuc.php",
    { phanloai: "khoanmuc" },
    function (data) {
      $("#khoanmucthu_add").append(`<option value="">Chọn khoản mục</option>`);
      $("#khoanmucchi_add").append(
        `<option selected value="">Chọn khoản mục</option>`
      );
      $("#khoanmucthu_edit").append(
        `<option selected value="">Chọn khoản mục</option>`
      );
      $("#khoanmucchi_edit").append(
        `<option selected value="">Chọn khoản mục</option>`
      );
      $("#khoanmuc_loc").append(
        `<option selected class='text-[#747474]' value="">Tất cả khoản mục</option>`
      );
      for (let i = 0; i < data.length; i++) {
        const loaikhoanmuc = data[i].dieukien1;
        if (loaikhoanmuc == "THU") {
          if (data[i].dieukien2 != "TBH") {
            $("#khoanmucthu_add").append(
              `<option class='text-black' value='${data[i].msloai}'>${data[i].tenloai}</option>`
            );
            $("#khoanmucthu_edit").append(
              `<option class='text-black' value='${data[i].msloai}'>${data[i].tenloai}</option>`
            );
          }
        }
        if (loaikhoanmuc == "CHI") {
          if (data[i].dieukien2 != "CNCC") {
            $("#khoanmucchi_add").append(
              `<option class='text-black' value='${data[i].msloai}'>${data[i].tenloai}</option>`
            );
            $("#khoanmucchi_edit").append(
              `<option  class='text-black' value='${data[i].msloai}'>${data[i].tenloai}</option>`
            );
          }
        }

        $("#khoanmuc_loc").append(
          `<option class='text-black' value='${data[i].msloai}'>${data[i].tenloai}</option>`
        );
      }
      load_thuchi();
      load_nhanvien();
    }
  );
}
function delete_khoanmuc(e) {
  const msloai = $(e).parent().find(".msloai").text();
  const dieukien2 = $(e).parent().find(".dieukien2").text();
  $.post(
    "ajax/thuchi/delete_khoanmuc.php",
    { msloai: msloai, dieukien2: dieukien2 },
    function (data) {
      load_khoanmuc();
    }
  );
}

function load_nhanvien() {
  $("#nguoinop_add").html("");
  $("#nguoinhan_add").html("");
  $("#nguoinop_edit").html("");
  $("#nguoinhan_edit").html("");
  $.post("ajax/thuchi/load_nhanvien.php", {}, function (data) {
    $("#nguoinop_add").append(`<option value=''>Chọn người nộp</option>`);
    $("#nguoinhan_add").append(`<option value=''>Chọn người nhận</option>`);
    $("#nguoinop_edit").append(`<option value=''>Chọn người nộp</option>`);
    $("#nguoinhan_edit").append(`<option value=''>Chọn người nhận</option>`);
    for (let i = 0; i < data.length; i++) {
      if (data[i].loai_user != 0 && data[i].loai_user != 2) {
        $("#nguoinop_add").append(
          `<option value='${data[i].msdn}'>${data[i].hoten}</option>`
        );
        $("#nguoinhan_add").append(
          `<option value='${data[i].msdn}'>${data[i].hoten}</option>`
        );
        $("#nguoinop_edit").append(
          `<option value='${data[i].msdn}'>${data[i].hoten}</option>`
        );
        $("#nguoinhan_edit").append(
          `<option value='${data[i].msdn}'>${data[i].hoten}</option>`
        );
        $(".__chitiet_nguoinop").append(
          `<tr>
        <td class='msdn'>${data[i].msdn}</td>
        <td>${data[i].hoten}</td>
        <td onclick='delete_nhanvien(this)'><img src='vendor/img/xoa16.png'></td>
        </tr>`
        );
      }
    }
  });
}
function open_add_thu() {
  open_modal("form_add_thuchi");
  $("#loai_phieu").html("thu");
  $("#khoanmuc_thu").removeClass("hidden");
  $("#khoanmuc_chi").addClass("hidden");
  $("#nguoinop_thu").removeClass("hidden");
  $("#nguoinhan_chi").addClass("hidden");
  $("#btn_chi").addClass("hidden");
  $("#btn_thu").removeClass("hidden");
}

function open_add_chi() {
  open_modal("form_add_thuchi");
  $("#loai_phieu").html("chi");
  $("#khoanmuc_thu").addClass("hidden");
  $("#khoanmuc_chi").removeClass("hidden");
  $("#nguoinop_thu").addClass("hidden");
  $("#nguoinhan_chi").removeClass("hidden");
  $("#btn_thu").addClass("hidden");
  $("#btn_chi").removeClass("hidden");
}
function add_thuchi(loai) {
  let khoanmuc = "";
  let maso = "";
  let tenmaso = "";
  let loaichungtu = "";
  if (loai == "thu") {
    khoanmuc = $("#khoanmucthu_add option:selected").val();
    maso = $("#nguoinop_add option:selected").val();
    tenmaso = $("#nguoinop_add option:selected").text();
    loaichungtu = "0";
  }
  if (loai == "chi") {
    khoanmuc = $("#khoanmucchi_add option:selected").val();
    maso = $("#nguoinhan_add option:selected").val();
    tenmaso = $("#nguoinhan_add option:selected").text();
    loaichungtu = "1";
  }
  const sotien = $("#sotien_add").val().replaceAll(".", "");
  const noidung = $("#noidung_add").val();
  const sohd = $("#sohd_add").val();
  const soct = $("#soct_add").val();
  const nganquy = $("#nganquy_add option:selected").val();
  $(".error_add_phieuthu").addClass("hidden");

  if (khoanmuc != "" && sotien != "" && noidung != "" && maso != "") {
    $.post(
      "ajax/thuchi/add_thuchi.php",
      {
        khoanmuc: khoanmuc,
        sotien: sotien,
        noidung: noidung,
        maso: maso,
        sohd: sohd,
        soct: soct,
        tenmaso: tenmaso,
        nganquy: nganquy,
        loaichungtu: loaichungtu,
      },
      function (data) {
        load_thuchi();
        $("#sotien_add").val("");
        $("#soct_add").val("");
        $("#sohd_add").val("");
        $("#tim_nhacc").val("");
        $("#form_chinhacc").addClass("hidden");
        $("#noidung_add").val("");
        close_modal("form_add_thuchi");
      }
    );
  } else {
    $(".error_add_phieuthu").removeClass("hidden");
  }
}

function edit_thuchi(loai) {
  let khoanmuc = "";
  let maso = "";
  let tenmaso = "";
  let loaichungtu = "";
  if (loai == "thu") {
    khoanmuc = $("#khoanmucthu_edit option:selected").val();
    maso = $("#nguoinop_edit option:selected").val();
    tenmaso = $("#nguoinop_edit option:selected").text();
    loaichungtu = 0;
  }
  if (loai == "chi") {
    khoanmuc = $("#khoanmucchi_edit option:selected").val();
    maso = $("#nguoinhan_edit option:selected").val();
    tenmaso = $("#nguoinhan_edit option:selected").text();
    loaichungtu = 1;
  }
  const sotien = $("#sotien_edit").val().replaceAll(".", "");
  const noidung = $("#noidung_edit").val();
  const soct = $("#soct_edit").val();
  const nganquy = $("#nganquy_edit option:selected").val();

  if (khoanmuc != "" && sotien != "" && noidung != "" && maso != "") {
    $.post(
      "ajax/thuchi/edit_thuchi.php",
      {
        soct: soct,
        khoanmuc: khoanmuc,
        sotien: sotien,
        noidung: noidung,
        maso: maso,
        tenmaso: tenmaso,
        nganquy: nganquy,
        loaichungtu: loaichungtu,
      },
      function (data) {
        load_thuchi();
        close_modal("form_edit_thuchi");
      }
    );
  }
}

function open_edit_thuchi(e, loaichungtu, khoanmuc, nganquy) {
  if (khoanmuc == "CMH" || khoanmuc == "TBH") {
    open_modal("form_error");
    $("#text_thongbao").html("Vui lòng xóa rồi thu lại");
  } else {
    if (loaichungtu == "0") {
      $("#loai_phieu_edit").html("thu");
      $("#khoanmucthu_edit").val(
        $(e).parent().parent().parent().find(".khoanmuc_thuchi").text()
      );
      $("#nguoinop_edit").val(
        $(e).parent().parent().parent().find(".msnv_thuchi").text()
      );
      $("#btn_thu_edit").removeClass("hidden");
      $("#btn_chi_edit").addClass("hidden");
      $("#khoanmuc_thu_edit").removeClass("hidden");
      $("#khoanmuc_chi_edit").addClass("hidden");
      $("#nguoinop_thu_edit").removeClass("hidden");
      $("#nguoinhan_chi_edit").addClass("hidden");
      $("#sotien_edit").val(
        $(e).parent().parent().parent().find(".sotien_thu").text()
      );
    }
    if (loaichungtu == "1") {
      $("#loai_phieu_edit").html("chi");
      $("#khoanmucchi_edit").val(
        $(e).parent().parent().parent().find(".khoanmuc_thuchi").text()
      );
      $("#nguoinhan_edit").val(
        $(e).parent().parent().parent().find(".msnv_thuchi").text()
      );
      $("#btn_thu_edit").addClass("hidden");
      $("#btn_chi_edit").removeClass("hidden");
      $("#nguoinop_thu_edit").addClass("hidden");
      $("#nguoinhan_chi_edit").removeClass("hidden");
      $("#khoanmuc_thu_edit").addClass("hidden");
      $("#khoanmuc_chi_edit").removeClass("hidden");
      $("#sotien_edit").val(
        $(e).parent().parent().parent().find(".sotien_chi").text()
      );
    }
    open_modal("form_edit_thuchi");
    $("#soct_edit").val(
      $(e).parent().parent().parent().find(".soct_thuchi").text()
    );
    $("#noidung_edit").val(
      $(e).parent().parent().parent().find(".nd_thuchi").text()
    );
    $("#nganquy_edit").val(nganquy);
  }
}

function open_delete_thuchi(e, loaichungtu) {
  open_modal("form_delete_thuchi");
  $("#soct_delete").val($(e).parent().parent().find(".soct_thuchi").text());
  $("#title_xoathuchi").text($(e).parent().parent().find(".nd_thuchi").text());
  $("#loaithuchi_delete").val(
    $(e).parent().parent().find(".khoanmuc_thuchi").text()
  );
  if (loaichungtu == 1) {
    $("#sotienthuchi_delete").val(
      $(e).parent().parent().find(".sotien_chi").text().replaceAll(".", "")
    );
  } else {
    $("#sotienthuchi_delete").val(
      $(e).parent().parent().find(".sotien_thu").text().replaceAll(".", "")
    );
  }
  $("#soct_dh_thuchi_delete").val(
    $(e).parent().parent().find(".soct_donhang_thuchi").text()
  );
}
function delete_thuchi() {
  const soct = $("#soct_delete").val();
  const sotien = $("#sotienthuchi_delete").val().replaceAll(".", "");
  const socttc = $("#soct_dh_thuchi_delete").val();
  $.post(
    "ajax/thuchi/delete_thuchi.php",
    {
      soct: soct,
      sotien: sotien,
      socttc: socttc,
    },
    function (data) {
      if (data[0].DaXoa == "0") {
        open_modal("form_error");
        $("#text_thongbao").text(data[0].ThongBao);
      }
      close_modal("form_delete_thuchi");
      load_thuchi();
    }
  );
}

function load_tongthuchi(tungay, denngay) {
  $("#tongthuchi").html("");
  $.post(
    "ajax/thuchi/load_tongthuchi.php",
    { tungay: tungay, denngay: denngay },
    function (data, textStatus, jqXHR) {
      $("#tongthuchi").html(data);
    }
  );
}
function ktra_chinhacc() {
  const khoanmuc_chi = $("#khoanmucchi_add").val();
  if (khoanmuc_chi == "CCC") {
    $("#form_chinhacc").removeClass("hidden");
  } else {
    $("#form_chinhacc").addClass("hidden");
  }
}

function tim_nhacungcap(e) {
  if (typeof timer !== undefined) {
    clearTimeout(this.timer);
  }
  this.timer = setTimeout(a, 500);
  function a() {
    $("#list_chuathanhtoan").addClass("hidden");
    $.post(
      "ajax/thuchi/tim_nhacungcap.php",
      { search: $(e).val() },
      function (data, textStatus, jqXHR) {
        $("#list_chuathanhtoan").removeClass("hidden");
        $("#chitiet_thanhtoanncc").html(data);
      }
    );
  }
}

function chon_thanhtoan_ncc(soct, sohd, tenncc, conno) {
  $("#tim_nhacc").val(tenncc);
  $("#sotien_add").val(
    conno.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#sohd_add").val(sohd);
  $("#soct_add").val(soct);
  $("#noidung_add").val("Chi nhà cung cấp | " + tenncc);
  $("#list_chuathanhtoan").addClass("hidden");
}
