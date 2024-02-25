function load_nhatky() {
  const at_dieutour = $("#AT_dieutour").val();
  $.post(
    "ajax/nhatky/load_nhatky.php",
    { at_dieutour: at_dieutour },
    function (data, textStatus, jqXHR) {
      $("#chitiet_nhatky").html(data);
      $("#img_load_nhanvien").addClass("animate-spin");
      setTimeout(() => {
        $("#img_load_nhanvien").removeClass("animate-spin");
      }, 1000);
    }
  );
}

function open_addnguoithuchien(
  rowid,
  soct,
  ptthuchien,
  mslieutrinh,
  thuchien,
  msmota
) {
  $("#btn_hoantat_dichvu").removeClass("hidden");
  $.post(
    "ajax/nhatky/ktr_nguoithuchien.php",
    {
      rowid: rowid,
      soct: soct,
      ptthuchien: ptthuchien,
    },
    function (data, textStatus, jqXHR) {
      if (data == "400") {
        open_modal("form_delete_nguoithuchien");
        $("#rowid_delete").val(rowid);
        $("#soct_thuchien").val(soct);
        $("#mslieutrinh_hoantat").val(mslieutrinh);
        $("#msmota_hoantat").val(msmota);
      } else {
        open_modal("form_add_nguoithuchien");
        $("#rowid_thuchien_add").val(rowid);
        $("#soct_thuchien_add").val(soct);
        $("#ptthuchien_add").val(ptthuchien);
        $("#mslieutrinh_add").val(mslieutrinh);
        $("#msmota_add").val(msmota);
      }
      if (thuchien == 3) {
        $("#btn_hoantat_dichvu").addClass("hidden");
      }
    }
  );
}

function add_nguoithuchien() {
  const rowid = $("#rowid_thuchien_add").val();
  const soct = $("#soct_thuchien_add").val();
  const mslieutrinh = $("#mslieutrinh_add").val();
  $.post(
    "ajax/nhatky/add_nguoithuchien.php",
    {
      rowid: rowid,
      soct: soct,
      mslieutrinh: mslieutrinh,
    },
    function (data, textStatus, jqXHR) {
      load_nhatky();
      close_modal("form_add_nguoithuchien");
    }
  );
}

function delete_nguoithuchien() {
  const rowid = $("#rowid_delete").val();
  const soct = $("#soct_thuchien").val();
  const mslieutrinh = $("#mslieutrinh_hoantat").val();

  $.post(
    "ajax/nhatky/delete_nguoithuchien.php",
    { soct: soct, rowid: rowid, mslieutrinh: mslieutrinh },
    function (data, textStatus, jqXHR) {
      load_nhatky();
      close_modal("form_delete_nguoithuchien");
    }
  );
}

function hoantat_dichvu() {
  const soct = $("#soct_thuchien").val();
  const rowid = $("#rowid_delete").val();
  const mslieutrinh = $("#mslieutrinh_hoantat").val();
  const msmota = $("#msmota_hoantat").val();
  $.post(
    "ajax/nhatky/hoantat_dichvu.php",
    { soct: soct, rowid: rowid, mslieutrinh: mslieutrinh, msmota, msmota },
    function (data, textStatus, jqXHR) {
      load_nhatky();
      close_modal("form_delete_nguoithuchien");
    }
  );
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

function open_noidung(rowid, soct, mshh, sodienthoai, idchidinh, mslieutrinh) {
  open_modal("form_add_noidung");
  $("#rowid_tuvan").val(rowid);
  $("#soct_tuvan").val(soct);
  $("#sodienthoai_tuvan").val(sodienthoai);
  $("#mshh_tuvan").val(mshh);
  load_noidung("TV", mshh);
  load_noidung("DT", mshh);
  load_chitiet_hanghoa(soct, idchidinh, mslieutrinh);
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

function open_quatrinhdieutri(sodienthoai) {
  open_modal("form_quatrinhdieutri");
  load_quatrinhdieutri(sodienthoai);
  $("#noidung_chitiet_quatrinhdieutri").html("");
}
function load_quatrinhdieutri(sodienthoai) {
  $.post(
    "ajax/nhatky/load_quatrinhdieutri.php",
    { sodienthoai: sodienthoai },
    function (data, textStatus, jqXHR) {
      $("#chitiet_quatrinhdieutri").html(data);
    }
  );
}
function open_noidung_quatrinhdieutri(mshh, sodienthoai) {
  $.post(
    "ajax/nhatky/load_noidung_quatrinhdieutri.php",
    { sodienthoai: sodienthoai, mshh: mshh },
    function (data, textStatus, jqXHR) {
      $("#noidung_chitiet_quatrinhdieutri").html(data);
    }
  );
}
function open_add_donthuoc(
  soct,
  sodienthoai,
  ptgiam,
  msctkm,
  nhom_kh,
  tenkh,
  msnguoithan
) {
  open_modal("form_add_donthuoc");
  $("#soct_donthuoc").val(soct);
  $("#msnguoithan_donthuoc").val(msnguoithan);
  $("#ptgiam_donthuoc").val(ptgiam);
  $("#msctkm_donthuoc").val(msctkm);
  $("#nhom_kh_donthuoc").val(nhom_kh);
  $("#sodienthoai_donthuoc").val(sodienthoai);
  $("#tenkh_add_donthuoc").html(tenkh);
  $("#tenhh_add").val("");
  $("#form_hanghoa").addClass("hidden");
  $.post(
    "ajax/banhang/delete_banhangline_xoatam.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {
      load_donthuoc();
      update_banhangheader_donthuoc(soct);
    }
  );
}
function open_add_dichvu(
  soct,
  sodienthoai,
  ptgiam,
  msctkm,
  nhom_kh,
  ptthuchien,
  tenkh,
  msnguoithan
) {
  open_modal("form_add_dichvu");
  $("#soct_dichvu").val(soct);
  $("#msnguoithan_dichvu").val(msnguoithan);
  $("#ptgiam_dichvu").val(ptgiam);
  $("#msctkm_dichvu").val(msctkm);
  $("#nhom_kh_dichvu").val(nhom_kh);
  $("#sodienthoai_dichvu").val(sodienthoai);
  $("#ptthuchien_dichvu").val(ptthuchien);
  $("#tenkh_add_dichvu").html(tenkh);
  $("#tendichvu_add").val("");
  $("#form_dichvu").addClass("hidden");
  $.post(
    "ajax/banhang/delete_banhangline_xoatam.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {
      load_chitiet_dichvu();
      update_banhangheader_donthuoc(soct);
    }
  );
}

function update_banhangheader_donthuoc(soct) {
  $.post(
    "ajax/nhatky/update_banhangheader_donthuoc.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {}
  );
}

function lay_tonkho_baocao() {
  $.post(
    "ajax/xuatkho/lay_tonkho_baocao.php",
    { loai: "CN" },
    function (data, textStatus, jqXHR) {}
  );
}
function tim_hanghoa(e, loai, vitri) {
  $("#form_hanghoa").addClass("hidden");
  $("#cachdung_add").val("");
  $("#ton_add").val("");
  $("#dvt_add").val("");
  $("#soluong_add").val("1");
  $("#mshh_add").val("");
  $("#dvt_add").val("");
  $("#giaban_add").val("");
  $("#gianhap_add").val("");
  $("#pttichluy_add").val("");
  $("#loai_hh_add").val("");
  $("#songay_bh_add").val("");
  $("#thuesuat_add").val("");
  const tenhh = $(e).val();
  const sodienthoai = $("#sodienthoai").val();
  $("#form_hanghoa").addClass("hidden");
  $("#form_dichvu").addClass("hidden");
  if (typeof timer !== undefined) {
    clearTimeout(this.timer);
  }
  this.timer = setTimeout(a, 500);
  function a() {
    if (tenhh.length > 2) {
      $.post(
        "ajax/nhatky/tim_hanghoa.php",
        { tenhh: tenhh, loai: loai, sodienthoai: sodienthoai, vitri: vitri },
        function (data, textStatus, jqXHR) {
          if (loai == "hanghoa") {
            $("#form_hanghoa").removeClass("hidden");
            $("#list_hanghoa").html(data);
          }
          if (loai == "dichvu") {
            if (vitri == "chidinh") {
              $("#form_dichvu_chidinh").removeClass("hidden");
              $("#list_dichvu_chidinh_items").html(data);
            } else {
              $("#form_dichvu").removeClass("hidden");
              $("#list_dichvu_items").html(data);
            }
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
  giaban,
  gianhap,
  pttichluy,
  loai_hh,
  songay_bh,
  thuesuat,
  ptthuchien,
  msctkm
) {
  $("#mshh_add").val(mshh);
  $("#tenhh_add").val(tenhh);
  $("#dvt_add").val(dvt);
  $("#giaban_add").val(giaban);
  $("#gianhap_add").val(gianhap);
  $("#msctkm_add").val(msctkm);
  $("#pttichluy_add").val(pttichluy);
  $("#loai_hh_add").val(loai_hh);
  $("#songay_bh_add").val(songay_bh);
  $("#thuesuat_add").val(thuesuat);
  $("#ptthuchien_donthuoc").val(ptthuchien);

  $("#form_hanghoa").addClass("hidden");
  ktra_tonkho(mshh);
}

function chon_dichvu(
  tendichvu,
  msctkm,
  ptgiam,
  mshh,
  colieutrinh,
  giaban,
  nhom_hh,
  vitri
) {
  if (vitri == "xutri") {
    $("#ngayhen").removeClass("hidden");

    $("#tendichvu_add").val(tendichvu);
    $("#msctkm_add_dichvu").val(msctkm);
    $("#ptgiam_add_dichvu").val(ptgiam);
    $("#mshh_add_dichvu").val(mshh);
    $("#colieutrinh_add_dichvu").val(colieutrinh);
    $("#dongia_add_dichvu").val(giaban);
    $("#nhom_hh_add_dichvu").val(nhom_hh);
    $("#tiengiam_add_dichvu").val(
      ((giaban.replace(/[.]/g, "") * ptgiam) / 100)
        .toString()
        .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
    );
    $("#form_dichvu").addClass("hidden");
    if (colieutrinh == 1) {
      $("#ngayhen").addClass("hidden");
    }
  } else {
    $("#tendichvu_add_chidinh").val(tendichvu);
    $("#msctkm_add_dichvu_chidinh").val(msctkm);
    $("#ptgiam_add_dichvu_chidinh").val(ptgiam);
    $("#mshh_add_dichvu_chidinh").val(mshh);
    $("#colieutrinh_add_dichvu_chidinh").val(colieutrinh);
    $("#dongia_add_dichvu_chidinh").val(giaban);
    $("#tiengiam_add_dichvu").val(
      ((giaban.replace(/[.]/g, "") * ptgiam) / 100)
        .toString()
        .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
    );
    $("#nhom_hh_add_dichvu_chidinh").val(nhom_hh);
    $("#form_dichvu_chidinh").addClass("hidden");
  }
}

function tinhtiengiam(vitri) {
  if (vitri == "xutri") {
    const dongia = $("#dongia_add_dichvu").val().replaceAll(".", "");
    const ptgiam = $("#ptgiam_add_dichvu").val();

    $("#tiengiam_add_dichvu").val(
      ((dongia * ptgiam) / 100)
        .toString()
        .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
    );
  } else {
    const dongia = $("#dongia_add_dichvu_chidinh").val().replaceAll(".", "");
    const ptgiam = $("#ptgiam_add_dichvu_chidinh").val();

    $("#tiengiam_add_dichvu_chidinh").val(
      ((dongia * ptgiam) / 100)
        .toString()
        .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
    );
  }
}

function add_dichvu() {
  const dienthoai = $("#sodienthoai_dichvu").val();
  const msnguoithan = $("#msnguoithan_dichvu").val();
  const soct = $("#soct_dichvu").val();
  const nhom_kh = $("#nhom_kh_dichvu").val();
  const msctkm = $("#msctkm_add_dichvu").val();
  const ptgiam = $("#ptgiam_add_dichvu").val();
  const mshh = $("#mshh_add_dichvu").val();
  const colieutrinh = $("#colieutrinh_add_dichvu").val();
  const nhom_hh = $("#nhom_hh_add_dichvu").val();
  const at_dieutour = $("#AT_dieutour").val();
  if (mshh != "") {
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
        at_dieutour: at_dieutour,
      },
      function (data, textStatus, jqXHR) {
        $("#tendichvu_add").val("");
        $("#msctkm_add_dichvu").val("");
        $("#ptgiam_add_dichvu").val("");
        $("#mshh_add_dichvu").val("");
        $("#colieutrinh_add_dichvu").val("");
        $("#nhom_hh_add_dichvu").val("");
        load_chitiet_dichvu();
      }
    );
  }
}

function luu_dichvu() {
  const soct = $("#soct_dichvu").val();
  $.post(
    "ajax/nhatky/luu_donthuoc_dichvu.php",
    { soct: soct, nhomhh: "DV" },
    function (data, textStatus, jqXHR) {
      close_modal("form_add_dichvu");
      load_nhatky();
    }
  );
}

function ktra_tonkho(mshh) {
  const thamso_qltk = $("#thamso_qltk").val();
  $.post(
    "ajax/nhatky/ktra_tonkho.php",
    { mshh: mshh, thamso_qltk: thamso_qltk },
    function (data, textStatus, jqXHR) {
      $("#ton_add").val(data);
    }
  );
}

function ktr_soluong() {
  $("#btn_chon_hanghoa").removeClass("hidden");
  const soluong = $("#soluong_add").val();
  const toncuoi = $("#ton_add").val();
  if (thamso_qltk == "1") {
    if (soluong >= toncuoi) {
      $("#error_soluong").html("Số lượng vượt quá tồn kho");
      $("#btn_chon_hanghoa").addClass("hidden");
    }
  }
}
function load_chitiet_dichvu() {
  const soct = $("#soct_dichvu").val();
  const sodienthoai = $("#sodienthoai_dichvu").val();
  $.post(
    "ajax/nhatky/load_dichvu.php",
    { soct: soct, sodienthoai: sodienthoai },
    function (data, idchidinh, jqXHR) {
      $("#list_dichvu").html(data);
    }
  );
}

function add_donthuoc() {
  lay_tonkho_baocao();
  const mshh = $("#mshh_add").val();
  const pttichluy = $("#pttichluy_add").val();
  const loai_hh = $("#loai_hh_add").val();
  const thuesuat = $("#thuesuat_add").val();
  const nhom_hh = "DT";
  const ptthuchien = $("#ptthuchien_donthuoc").val();
  const songay_bh = $("#songay_bh_add").val();
  const thuchien = "1";
  const dathu = "0";
  const tenhh = $("#tenhh_add").val();
  const dvt = $("#dvt_add").val();
  const giaban = $("#giaban_add").val();
  const gianhap = $("#gianhap_add").val();
  const cachdung = $("#cachdung_add").val();
  const soluong = $("#soluong_add").val();
  const soct = $("#soct_donthuoc").val();
  const sodienthoai = $("#sodienthoai_donthuoc").val();
  const ptgiam = $("#ptgiam_donthuoc").val();
  const msctkm = $("#msctkm_add").val();
  const nhom_kh = $("#nhom_kh_donthuoc").val();
  const qltk = $("#thamso_qltk").val();
  const msnguoithan = $("#msnguoithan_donthuoc").val();

  $.post(
    "ajax/nhatky/add_donthuoc.php",
    {
      sodienthoai: sodienthoai,
      msnguoithan: msnguoithan,
      mshh: mshh,
      tenhh: tenhh,
      dvt: dvt,
      giaban: giaban,
      giathu: giaban,
      gianhap: gianhap,
      soluong: soluong,
      soct: soct,
      pttichluy: pttichluy,
      loai_hh: loai_hh,
      thuesuat: thuesuat,
      ptgiam: ptgiam,
      msctkm: msctkm,
      nhom_kh: nhom_kh,
      ptthuchien: ptthuchien,
      songay_bh: songay_bh,
      nhom_hh: nhom_hh,
      thuchien: thuchien,
      dathu: dathu,
      idtuvan: cachdung,
      vitri_rang: "",
      qltk: qltk,
    },
    function (data, textStatus, jqXHR) {
      $("#mshh_add").val("");
      $("#tenhh_add").val("");
      $("#dvt_add").val("");
      $("#giaban_add").val("");
      $("#gianhap_add").val("");
      $("#pttichluy_add").val("");
      $("#loai_hh_add").val("");
      $("#songay_bh_add").val("");
      $("#thuesuat_add").val("");
      $("#ton_add").val("");
      $("#cachdung_add").val("");
      $("#soluong_add").val("");
      load_donthuoc();
    }
  );
}

function load_donthuoc() {
  const soct = $("#soct_donthuoc").val();
  const sodienthoai = $("#sodienthoai_donthuoc").val();
  $.post(
    "ajax/nhatky/load_donthuoc.php",
    { soct: soct, sodienthoai: sodienthoai },
    function (data, idchidinh, jqXHR) {
      $("#list_donthuoc").html(data);
    }
  );
}
function open_delete_donthuoc(tenhh, mshh, idchidinh, soct, rowid) {
  open_modal("form_delete_donthuoc");
  $("#tenhh_delete_donthuoc").html(tenhh);
  $("#mshh_delete_donthuoc").val(mshh);
  $("#idchidinh_delete_donthuoc").val(idchidinh);
  $("#soct_delete_donthuoc").val(soct);
  $("#rowidtc_donthuoc").val(rowid);
}

function open_edit_donthuoc(e, mshh) {
  const thamso_qltk = $("#thamso_qltk").val();
  $.post(
    "ajax/nhatky/ktra_tonkho.php",
    { mshh: mshh, thamso_qltk: thamso_qltk },
    function (data, textStatus, jqXHR) {
      $("#ton_edit").val(data);
    }
  );
  $(e).parent().parent().find(".soluong").addClass("hidden");
  $(e).parent().parent().find(".soluong_edit").removeClass("hidden");
  $(e).parent().parent().find(".cachdung").addClass("hidden");
  $(e).parent().parent().find(".cachdung_edit").removeClass("hidden");
  $(e).parent().find(".btn_luu_donthuoc").removeClass("hidden");
  $(e).parent().find(".btn_edit_donthuoc").addClass("hidden");
}
function edit_donthuoc(e, soct, idchidinh) {
  const soluong = $(e).parent().parent().find(".input_sl_edit").val();
  const cachdung = $(e).parent().parent().find(".input_cachdung_edit").val();
  const toncuoi = $("#ton_edit").val();
  const thamso_qltk = $("#thamso_qltk").val();

  if (thamso_qltk == 1) {
    if (Number(soluong) >= Number(toncuoi)) {
      open_modal("form_info");
      $("#title_info").html("Số lượng vượt tồn kho");
    } else {
      $.post(
        "ajax/nhatky/update_donthuoc.php",
        {
          soct: soct,
          idchidinh: idchidinh,
          soluong: soluong,
          cachdung: cachdung,
        },
        function (data, textStatus, jqXHR) {
          $(e).parent().parent().find(".soluong_edit").addClass("hidden");
          $(e).parent().parent().find(".soluong").removeClass("hidden");
          $(e).parent().parent().find(".cachdung_edit").addClass("hidden");
          $(e).parent().parent().find(".cachdung").removeClass("hidden");
          $(e).parent().find(".btn_edit_donthuoc").removeClass("hidden");
          $(e).parent().find(".btn_luu_donthuoc").addClass("hidden");
          load_donthuoc();
        }
      );
    }
  } else {
    $.post(
      "ajax/nhatky/update_donthuoc.php",
      {
        soct: soct,
        idchidinh: idchidinh,
        soluong: soluong,
        cachdung: cachdung,
      },
      function (data, textStatus, jqXHR) {
        $(e).parent().parent().find(".soluong_edit").addClass("hidden");
        $(e).parent().parent().find(".soluong").removeClass("hidden");
        $(e).parent().parent().find(".cachdung_edit").addClass("hidden");
        $(e).parent().parent().find(".cachdung").removeClass("hidden");
        $(e).parent().find(".btn_edit_donthuoc").removeClass("hidden");
        $(e).parent().find(".btn_luu_donthuoc").addClass("hidden");
        load_donthuoc();
      }
    );
  }
}

function delete_donthuoc() {
  const mshh = $("#mshh_delete_donthuoc").val();
  const idchidinh = $("#idchidinh_delete_donthuoc").val();
  const soct = $("#soct_delete_donthuoc").val();
  const rowidtc = $("#rowidtc_donthuoc").val();
  const qltk = $("#thamso_qltk").val();

  $.post(
    "ajax/nhatky/delete_donthuoc.php",
    {
      soct: soct,
      idchidinh: idchidinh,
      mshh: mshh,
      rowidtc: rowidtc,
      qltk: qltk,
    },
    function (data, textStatus, jqXHR) {
      load_donthuoc();
      load_chitiet_dichvu();
      close_modal("form_delete_donthuoc");
      load_khachhang_dichvu_rang();
    }
  );
}
function open_huy_donthuoc() {
  open_modal("form_huy_donthuoc");
  const tenkh = $("#tenkh_add_donthuoc").text();
  $("#tenkh_huy_donthuoc").html("Hủy đơn thuốc " + tenkh);
  $("#btn_huy_dichvu").addClass("hidden");
  $("#btn_huy_donthuoc").removeClass("hidden");
}
function open_huy_dichvu() {
  open_modal("form_huy_donthuoc");
  const tenkh = $("#tenkh_add_donthuoc").text();
  $("#tenkh_huy_donthuoc").html("Hủy dịch vụ " + tenkh);
  $("#btn_huy_donthuoc").addClass("hidden");
  $("#btn_huy_dichvu").removeClass("hidden");
}

function luu_donthuoc() {
  const qltk = $("#thamso_qltk").val();
  const soct = $("#soct_donthuoc").val();
  $.post(
    "ajax/nhatky/luu_donthuoc_dichvu.php",
    { soct: soct, nhomhh: "DT", qltk: qltk },
    function (data, textStatus, jqXHR) {
      close_modal("form_add_donthuoc");
    }
  );
}

function huy_donthuoc_dichvu(loai) {
  const soct = $("#soct_donthuoc").val();
  $.post(
    "ajax/nhatky/huy_donthuoc.php",
    { soct: soct, loai: loai },
    function (data, textStatus, jqXHR) {
      load_donthuoc();
      load_chitiet_dichvu();
      close_modal("form_huy_donthuoc");
      close_modal("form_add_donthuoc");
      close_modal("form_add_dichvu");
    }
  );
}

//! Dịch vụ răng

function open_add_rang(soct) {
  location.href = `ServiceTooth/${soct}`;
}

function load_khachhang_dichvu_rang() {
  const soct = location.pathname.split("/").splice(-1)[0];
  $.post(
    "ajax/nhatky/load_khachhang_dichvu_rang.php",
    { soct: soct },
    function (data, thanhtien, jqXHR) {
      $("#thongtin_khachhang").html(data[0].khachhang);
      $("#nhom_kh").val(data[0].nhom_kh);
      $("#msnguoithan_dichvu").val(data[0].ms_nguoithan);
      $("#ptgiam").val(data[0].ptgiam);
      $("#sodienthoai").val(data[0].sodienthoai);
      $("#trangthai_donhang").val(data[0].trangthai);
      if (data[0].trangthai > "3") {
        $("#btn_luu_dichvu").addClass("hidden");
        $("#form_xutri_add_dichvu").addClass("hidden");
        $("#btn_chidinh_dichvu").addClass("hidden");
        $("#btn_huy_dichvu_rang").addClass("hidden");
        $("#btn_dong_dichvu_rang").removeClass("hidden");
      }
      load_lichsu_dieutri_rang(data[0].sodienthoai);
    }
  );
}

function load_tongtien() {
  const soct = location.pathname.split("/").splice(-1)[0];
  $.post(
    "ajax/banhang/load_thanhtien.php",
    { soct: soct },
    function (data, thanhtien, jqXHR) {
      $("#tongtien").val(
        data[0].tongtien.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
      );
    }
  );
}

function add_rang_banhangline(e, vitri_rang) {
  const soct = location.pathname.split("/").splice(-1)[0];
  const nhom_kh = $("#nhom_kh").val();
  const ptgiam = $("#ptgiam").val();
  const msctkm = $("#msctkm").val();
  const sodienthoai = $("#sodienthoai").val();
  const trangthai_donhang = $("#trangthai_donhang").val();
  if (trangthai_donhang < 3) {
    $.post(
      "ajax/nhatky/add_rang.php",
      {
        soct: soct,
        vitri_rang: vitri_rang,
        nhom_kh: nhom_kh,
        ptgiam: ptgiam,
        msctkm: msctkm,
        sodienthoai: sodienthoai,
        tenhh: vitri_rang,
        dvt: "Lần",
        giaban: 0,
        giathu: 0,
        gianhap: 0,
        mshh: vitri_rang,
        soluong: 0,
        soct: soct,
        pttichluy: 0,
        loai_hh: "DV",
        thuesuat: 0,
        ptthuchien: 0,
        songay_bh: 0,
        nhom_hh: "RA",
        thuchien: 0,
        dathu: 0,
        idtuvan: "",
        vitri_rang: vitri_rang,
      },
      function (data, textStatus, jqXHR) {
        load_rang_banhangline();
      }
    );
  }
}

function load_rang_banhangline() {
  const soct = location.pathname.split("/").splice(-1)[0];
  const trangthai = $("#trangthai_donhang").val();
  $.post(
    "ajax/nhatky/load_rang_banhangline.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {
      $("#list_khamrang").html("");
      $("#list_check_rang").html("");
      $(".items_rang").removeClass(
        "font_semi  bg-[#3a0336] text-white rounded-full w-full"
      );
      for (let i = 0; i < data.length; i++) {
        let btn_xoa = ` <img class='min-w-[20px] max-w-[20px] min-h-[20px] max-h-[20px] hover:cursor-pointer' onclick="open_delete_rang('${data[i].ms_rang}','${data[i].rowid}')" src='vendor/img/delete.png'>`;
        if (trangthai > 3) {
          btn_xoa = "";
        }
        $("#list_check_rang").append(`
        <div class='flex gap-3 items-center bg-[#7c021e] rounded-md text-white text-lg px-3 py-1'>
        <input type='checkbox' class='item_msrang accent-green-500 text-white w-5 h-5' data-soct='${soct}' data-idchidinh='${data[i].idchidinh}'  value='${data[i].ms_rang}' checked>
        <p>${data[i].ms_rang}</p>
        </div>
        `);
        $("#" + data[i].ms_rang).addClass(
          "font_semi  bg-[#3a0336] text-white rounded-full w-full"
        );
        $("#" + data[i].ms_rang).prop("ondblclick", null);
        $("#list_khamrang").append(`
        <div class="border-b border-[#ffffff40] grid grid-cols-12 justify-between items-center px-3 py-2 text-white mb-2 text-lg gap-7 phone:px-0">
        <div class="col-span-1 phone:col-span-12 laptop:col-span-2">
            <p class="text-white bg-[#3a0336] rounded-full text-center w-full">${
              data[i].ms_rang
            }</p>
        </div>
        <div class="flex-col col-span-9 laptop:col-span-8 phone:col-span-10">
        <div class='flex gap-3 '>
            <p class="whitespace-nowrap text-[#fdccfd]">Chẩn đoán</p>
           <input onfocusout="luu_chandoan_rang(this,'${
             data[i].ms_rang
           }')" class="w-full appearance-none block border-b border-[#ffffff40] px-2 leading-tight focus:outline-none bg-transparent text-[16px]" value='${
          data[i].idtuvan
        }'>
           </div>
        <div class='flex gap-3 mt-5 items-center '>
          <p class="whitespace-nowrap text-[#fdccfd]">Xử trí</p>
          <img class='min-w-[20px] max-w-[20px] min-h-[20px] max-h-[20px] hover:cursor-pointer' onclick="open_add_xutri('${soct}','${
          data[i].ms_rang
        }','${data[i].idchidinh}','${
          data[i].idtuvan
        }')" src="vendor/img/add.png" title="Thêm dịch vụ">
              <p class="text-white max-w-full whitespace-nowrap overflow-hidden">${
                data[i].tenhh
              }</p>
        </div>
        </div>
        <div class="flex gap-3 col-span-2 justify-end">
            <p>${data[i].thanhtien
              .toString()
              .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")}</p>
              <div>
             ${btn_xoa}
              </div>
        </div>
    </div>
        `);
      }
      load_chidinh_dichvu_rang(soct);
      load_dichvu_khongcorang(soct);
    }
  );
}

function load_lichsu_dieutri_rang(sodienthoai) {
  $.post(
    "ajax/nhatky/load_lichsu_dieutri_rang.php",
    { sodienthoai: sodienthoai },
    function (data, textStatus, jqXHR) {
      $("#list_lichsu_khamrang").html("");
      for (let i = 0; i < data.length; i++) {
        if (data[i].ms_rang != "") {
          $("#" + data[i].ms_rang).addClass("text-[red]");
          $("#" + data[i].ms_rang).prop("ondblclick", null);
        }
        $("#list_lichsu_khamrang").append(`
        <tr class="active_items item_line border-b border-dashed border-[#ffffff40] text-[#efbff5]  items" onclick='active_item(this)'>
        <th class=" px-3 py-2 text-center font-thin">${i + 1}</th>
        <th class=" px-3 py-2 text-left font-thin">${data[i].ngay}</th>
        <th class=" px-3 py-2 text-center font-thin">${data[i].ms_rang}</th>
        <th class=" px-3 py-2 text-left font-thin">${data[i].idtuvan}</th>
        <th class=" px-3 py-2 text-left font-thin min-w-[200px]">${
          data[i].tenhh
        }</th>
        <th class=" px-3 py-2 text-right font-thin">${data[i].thanhtien
          .toString()
          .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")}</th>
    </tr>
        `);
      }
    }
  );
}

function open_add_xutri(soct, msrang, idchidinh, chandoan) {
  open_modal("form_add_xutri");
  $("#msrang_add_dichvu").html(msrang);
  $("#idchidinh_dichvu_rang").val(idchidinh);
  $("#soct_dichvu").val(soct);
  $("#chandoan_dichvu").val(chandoan);
  load_chitiet_dichvu_msrang(soct, msrang);
}

function load_chitiet_dichvu_msrang(soct, msrang) {
  $.post(
    "ajax/nhatky/load_chitiet_dichvu_msrang.php",
    { soct: soct, msrang: msrang },
    function (data, textStatus, jqXHR) {
      load_rang_banhangline();
      load_tongtien();

      $("#list_dichvu_chitiet_rang").html(data);
    }
  );
}

function load_chidinh_dichvu_rang(soct) {
  $("#tenhh_add").val("");
  $("#form_dichvu_chidinh").addClass("hidden");
  $.post(
    "ajax/nhatky/load_chidinh_dichvu_rang.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {
      $("#list_chidinh_dichvu").html(data);
    }
  );
}
function load_dichvu_khongcorang(soct) {
  $.post(
    "ajax/nhatky/load_dichvu_khongcorang.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {
      $("#list_khamrang").append(data);
    }
  );
}

function add_chidinh_dichvu() {
  const dienthoai = $("#sodienthoai").val();
  const nhom_kh = $("#nhom_kh").val();
  const msnguoithan = $("#msnguoithan_dichvu").val();
  const msctkm = $("#msctkm_add_dichvu_chidinh").val();
  const ptgiam = $("#ptgiam_add_dichvu_chidinh").val();
  const mshh = $("#mshh_add_dichvu_chidinh").val();
  const colieutrinh = $("#colieutrinh_add_dichvu_chidinh").val();
  const nhom_hh = $("#nhom_hh_add_dichvu_chidinh").val();
  const ngayhen = $("#ngayhen_edit_chidinh").val();
  const giohen = $("#giohen_edit_chidinh").val();
  let list_msrang = document.getElementsByClassName("item_msrang");
  let list_khong_check = 0;
  if (mshh != "") {
    for (let i = 0; i < list_msrang.length; i++) {
      if (list_msrang[i].checked) {
        $.post(
          "ajax/nhatky/add_rang_banhangline.php",
          {
            dienthoai: dienthoai,
            soct: list_msrang[i].getAttribute("data-soct"),
            colieutrinh: colieutrinh,
            msnguoithan: msnguoithan,
            nhom_kh: nhom_kh,
            msctkm: msctkm,
            ptgiam: ptgiam,
            mshh: mshh,
            nhom_hh: nhom_hh,
            idchidinh: list_msrang[i].getAttribute("data-idchidinh"),
            msrang: list_msrang[i].value,
            ngayhen: ngayhen,
            giohen: giohen,
          },
          function (data, textStatus, jqXHR) {
            $("#tendichvu_add_chidinh").val("");
            $("#dongia_add_dichvu_chidinh").val("");
            $("#tiengiam_add_dichvu_chidinh").val("");
            $("#msctkm_add_dichvu_chidinh").val("");
            $("#ptgiam_add_dichvu_chidinh").val("");
            $("#mshh_add_dichvu_chidinh").val("");
            $("#colieutrinh_add_dichvu_chidinh").val("");
            $("#nhom_hh_add_dichvu_chidinh").val("");
            load_rang_banhangline();
            load_tongtien();
            load_chidinh_dichvu_rang(soct);
          }
        );
      } else {
        list_khong_check += 1;
      }
    }
    if (list_msrang.length == list_khong_check) {
      const soct = location.pathname.split("/").splice(-1)[0];
      $.post(
        "ajax/nhatky/add_rang_banhangline.php",
        {
          dienthoai: dienthoai,
          soct: soct,
          colieutrinh: colieutrinh,
          nhom_kh: nhom_kh,
          msctkm: msctkm,
          ptgiam: ptgiam,
          mshh: mshh,
          nhom_hh: nhom_hh,
          idchidinh: "1",
          msrang: "",
          ngayhen: ngayhen,
          giohen: giohen,
        },
        function (data, textStatus, jqXHR) {
          $("#tendichvu_add_chidinh").val("");
          $("#dongia_add_dichvu_chidinh").val("");
          $("#tiengiam_add_dichvu_chidinh").val("");
          $("#msctkm_add_dichvu_chidinh").val("");
          $("#ptgiam_add_dichvu_chidinh").val("");
          $("#mshh_add_dichvu_chidinh").val("");
          $("#colieutrinh_add_dichvu_chidinh").val("");
          $("#nhom_hh_add_dichvu_chidinh").val("");
          load_rang_banhangline();
          load_tongtien();
          load_chidinh_dichvu_rang(soct);
        }
      );
    }
  }
}

function add_xutri() {
  const dienthoai = $("#sodienthoai").val();
  const soct = $("#soct_dichvu").val();
  const nhom_kh = $("#nhom_kh").val();
  const msctkm = $("#msctkm").val();
  const ptgiam = $("#ptgiam_add_dichvu").val();
  const mshh = $("#mshh_add_dichvu").val();
  const colieutrinh = $("#colieutrinh_add_dichvu").val();
  const msnguoithan = $("#msnguoithan_dichvu").val();
  const nhom_hh = $("#nhom_hh_add_dichvu").val();
  const idchidinh = $("#idchidinh_dichvu_rang").val();
  const ngayhen = $("#ngayhen_edit").val();
  const giohen = $("#giohen_edit").val();
  const chandoan = $("#chandoan_dichvu").val();
  const msrang = $("#msrang_add_dichvu").text();
  if (mshh != "") {
    $.post(
      "ajax/nhatky/add_rang_banhangline.php",
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
        idchidinh: idchidinh,
        msrang: msrang,
        ngayhen: ngayhen,
        giohen: giohen,
        chandoan: chandoan,
      },
      function (data, textStatus, jqXHR) {
        $("#tendichvu_add").val("");
        $("#dongia_add_dichvu").val("");
        $("#tiengiam_add_dichvu").val("");
        $("#msctkm_add_dichvu").val("");
        $("#ptgiam_add_dichvu").val("");
        $("#mshh_add_dichvu").val("");
        $("#colieutrinh_add_dichvu").val("");
        $("#nhom_hh_add_dichvu").val("");
        load_chitiet_dichvu_msrang(soct, msrang);
        load_rang_banhangline();
        load_tongtien();
      }
    );
  }
}
function luu_dichvu_rang() {
  const soct = location.pathname.split("/").splice(-1)[0];
  const idtuvan = $("#chandoan_add").val();
  $.post(
    "ajax/nhatky/luu_donthuoc_dichvu.php",
    { soct: soct, nhomhh: "DV", idtuvan: idtuvan },
    function (data, textStatus, jqXHR) {
      location.href = `Journal`;
    }
  );
}
function luu_chandoan_rang(e, ms_rang) {
  const soct = location.pathname.split("/").splice(-1)[0];
  const idtuvan = $(e).val();
  $.post(
    "ajax/nhatky/luu_chandoan_rang.php",
    { soct: soct, idtuvan: idtuvan, ms_rang: ms_rang },
    function (data, textStatus, jqXHR) {
      load_rang_banhangline();
    }
  );
}

function open_huy_dichvu_rang() {
  open_modal("form_huy_dichvu");
  const tenkh = $("#thongtin_khachhang").text().split("•")[0];
  $("#tenkh_huy_dichvu").html("Hủy dịch vụ " + tenkh);
}

function huy_dichvu_rang() {
  const soct = location.pathname.split("/").splice(-1)[0];
  $.post(
    "ajax/nhatky/huy_donthuoc.php",
    { soct: soct, loai: "DV" },
    function (data, textStatus, jqXHR) {
      location.href = `Journal`;
    }
  );
}
function open_delete_rang(msrang, rowid) {
  open_modal("form_delete_rang");
  $("#ten_rang_delete").html(msrang);
  $("#msrang_delete").val(msrang);
  $("#rowid_rang_delete").val(rowid);
}
function delete_rang() {
  const soct = location.pathname.split("/").splice(-1)[0];
  const msrang = $("#msrang_delete").val();
  const rowidtc = $("#rowid_rang_delete").val();

  $.post(
    "ajax/nhatky/delete_rang.php",
    { soct: soct, msrang: msrang, rowidtc: rowidtc },
    function (data, textStatus, jqXHR) {
      $("#" + msrang).removeClass("text-[red]");
      $("#" + msrang).attr(
        "ondblclick",
        "add_rang_banhangline(this,'" + msrang + "')"
      );
      $("#" + msrang).on("click");
      load_rang_banhangline();
      close_modal("form_delete_rang");
    }
  );
}

function open_delete_dichvu_rang(tenhh, mshh, idchidinh, soct, msrang, rowid) {
  open_modal("form_delete_dichvu");
  $("#tenhh_delete_dichvu").html(tenhh);
  $("#mshh_delete_dichvu").val(mshh);
  $("#idchidinh_delete_dichvu").val(idchidinh);
  $("#soct_delete_dichvu").val(soct);
  $("#msrang_delete_dichvu").val(msrang);
  $("#rowid_dichvu").val(rowid);
}
function delete_dichvu_rang() {
  const mshh = $("#mshh_delete_dichvu").val();
  const idchidinh = $("#idchidinh_delete_dichvu").val();
  const soct = $("#soct_delete_dichvu").val();
  const msrang = $("#msrang_delete_dichvu").val();
  const rowidtc = $("#rowid_dichvu").val();
  $.post(
    "ajax/nhatky/delete_donthuoc.php",
    { soct: soct, idchidinh: idchidinh, mshh: mshh, rowidtc: rowidtc },
    function (data, textStatus, jqXHR) {
      load_chitiet_dichvu_msrang(soct, msrang);
      load_rang_banhangline();
      load_tongtien();
      close_modal("form_delete_dichvu");
      load_chidinh_dichvu_rang(soct);
      load_khachhang_dichvu_rang();
    }
  );
}

//! Dịch vụ răng

function open_add_hinhanh(rowid, soct) {
  open_modal("form_add_img");
  $("#rowid_add_img").val(rowid);
  $("#soct_add_img").val(soct);
  load_image(rowid);
}
var all_path_image = [];

function load_image(rowid) {
  $("#list_img_nhatky").html("");
  $.post(
    "ajax/nhatky/image/load_image.php",
    { rowid: rowid },
    function (data, textStatus, jqXHR) {
      const list_img = data[0].img_dieutri.split("|");
      for (let i = 0; i < list_img.length; i++) {
        if (list_img[i] != "") {
          $("#list_img_nhatky").append(
            ` <div class='w-[80px] relative' >
        <img src="upload/anhdieutri/${data[0].mshs}/${list_img[i]}" class="w-[80px] item_img">
        <img onclick="delete_image('${rowid}','${list_img[i]}', '${data[0].img_dieutri}')" class='absolute z-[100] top-[-5px] right-[-5px] w-[20px]' src='vendor/img/delete.png'>
        </div>`
          );
        }
      }
    }
  );
}
function delete_image(rowid, path_image, out_path_image) {
  $.post(
    "ajax/nhatky/image/delete_image.php",
    {
      rowid: rowid,
      path_image: path_image,
      out_path_image: out_path_image,
    },
    function (data, textStatus, jqXHR) {
      load_image(rowid);
    }
  );
}
function anhnhatky(input) {
  const soluong = $(input)[0].files.length;
  $("#list_img_nhatky").removeClass("hidden");
  for (let i = 0; i < soluong; i++) {
    let id = "id" + Math.floor(1000 + Math.random() * 9000);
    const img_nhatky = "img_nhatky" + Math.floor(1000 + Math.random() * 9000);
    $("#list_img_nhatky").append(`
      <div class='w-[80px] relative' >
      <img id="${img_nhatky}" class="w-[80px] item_img">
      <img onclick="delete_img_addform(this, '${id}')" class='absolute z-[100] top-[-5px] right-[-5px] w-[20px]' src='vendor/img/delete.png'>
      </div>`);
    $("#" + img_nhatky)[0].src = (window.URL ? URL : webkitURL).createObjectURL(
      input.files[i]
    );
    all_path_image.push($(input)[0].files[i]);
    Object.assign($(input)[0].files[i], { id: id });
  }
}

function delete_img_addform(e, vitri) {
  $(e).parent().remove();
  var file_img = [];
  for (let i = 0; i < all_path_image.length; i++) {
    if (all_path_image[i]["id"] != vitri) {
      file_img.push(all_path_image[i]);
    }
  }
  all_path_image = file_img;
}

function add_img_nhatky() {
  var form_data = new FormData();
  const rowid = $("#rowid_add_img").val();
  const soct = $("#soct_add_img").val();
  form_data.append("file_image_length", all_path_image.length);
  form_data.append("rowid", rowid);
  form_data.append("soct", soct);
  for (let i = 0; i < all_path_image.length; i++) {
    form_data.append(`file_image${i}`, all_path_image[i]);
  }
  $.ajax({
    type: "POST",
    url: "ajax/nhatky/image/add_image.php",
    data: form_data,
    contentType: false,
    processData: false,
    headers: {
      "X-CSRF-Token": $("meta[name='csrf-token']").attr("content"),
    },
    success: function (response) {
      all_path_image = [];
      close_modal("form_add_img");
      load_image(rowid);
    },
  });
}

function load_chitiet_hanghoa(soct, idchidinh, mslieutrinh) {
  $.post(
    "ajax/banhang/load_chitiet_hanghoa.php",
    {
      soct: soct,
      idchidinh: idchidinh,
      mslieutrinh: mslieutrinh,
      vitri: "nhatky",
    },
    function (data, textStatus, jqXHR) {
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
