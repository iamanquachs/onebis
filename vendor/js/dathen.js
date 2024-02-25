function load_dathen() {
  const tungay = $("#tungay_input").val();
  const denngay = $("#denngay_input").val();
  $.post(
    "ajax/dathen/load_dathen.php",
    { tungay: tungay, denngay: denngay },
    function (data, textStatus, jqXHR) {
      $("#list_dathen").html(data);
    }
  );
}
function load_quatrinhdieutri(sodienthoai) {
  open_modal("form_noidung_tuvan");
  $("#form_tuvan").addClass("hidden");
  $.post(
    "ajax/nhatky/load_quatrinhdieutri.php",
    { sodienthoai: sodienthoai.replace(/[.]/g, "") },
    function (data, textStatus, jqXHR) {
      $("#chitiet_quatrinhdieutri").html(data);
    }
  );
}
function open_noidung_quatrinhdieutri(mshh, sodienthoai) {
  $("#sodienthoai_tuvan").val(sodienthoai);
  $("#mshh_tuvan").val(mshh);
  $("#form_tuvan").removeClass("hidden");
  $.post(
    "ajax/nhatky/load_noidung_quatrinhdieutri.php",
    { sodienthoai: sodienthoai, mshh: mshh },
    function (data, textStatus, jqXHR) {
      $("#noidung_chitiet_quatrinhdieutri").html(data);
    }
  );
}

function add_noidung(loai) {
  const rowid = $("#rowid_tuvan").val();
  const soct = $("#soct_tuvan").val();
  const sodienthoai = $("#sodienthoai_tuvan").val();
  const mshh = $("#mshh_tuvan").val();
  const noidung = $("#noidung_tuvan").val();
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
        open_noidung_quatrinhdieutri(mshh, sodienthoai);
      }
    );
  }
}

function open_add_ngayhen(rowid, soct, tenkh, ngay) {
  $("#tenkh_ngayhen").html(tenkh);
  $("#soct_ngayhen").val(soct);
  $("#rowid_ngayhen").val(rowid);
  const ngayhen = ngay.split(" ");
  console.log(ngayhen)
  $("#ngayhen_edit").val(ngayhen[0]);
  $("#giohen_edit").val(ngayhen[1]);
  open_modal("form_edit_ngayhen");
}
function edit_ngayhen() {
  const ngayhen = $("#ngayhen_edit").val();
  const giohen = $("#giohen_edit").val();
  const rowid = $("#rowid_ngayhen").val();
  const soct = $("#soct_ngayhen").val();
  $.post(
    "ajax/dathen/edit_ngayhen.php",
    {
      rowid: rowid,
      ngayhen: ngayhen,
      giohen: giohen,
      soct: soct,
    },
    function (data, textStatus, jqXHR) {
      load_dathen();
      close_modal("form_edit_ngayhen");
    }
  );
}
