function load_homnay_henkhach() {
  $(".load_homnay_henkhach").addClass("animate-spin");
  setTimeout(() => {
    $(".load_homnay_henkhach").removeClass("animate-spin");
  }, 1000);
  load_benhnhan();
  load_henkhach();
  load_khachdat();
}

function load_benhnhan() {
  const valueSearch = $("#value_search").val();
  $(".homnay").addClass("hidden");
  if (typeof timer !== undefined) {
    clearTimeout(this.timer);
  }
  this.timer = setTimeout(a, 500);
  function a() {
    $.post(
      "ajax/tiepnhan/load_benhnhan.php",
      { valueSearch: valueSearch },
      function (data, textStatus, jqXHR) {
        $(".btn_themmoi").addClass("hidden");
        if (valueSearch != "") {
          $(".homnay").removeClass("hidden");
        }
        $("#list_tiepnhan").html(data);
        if (data == "" && valueSearch != "") {
          $(".btn_themmoi").removeClass("hidden");
        }
      }
    );
  }
}
function load_henkhach() {
  $.post(
    "ajax/tiepnhan/load_henkhach.php",
    {},
    function (data, textStatus, jqXHR) {
      $("#list_henkhach").html(data);
    }
  );
}
function load_khachdat() {
  $.post(
    "ajax/tiepnhan/load_khachdat.php",
    {},
    function (data, textStatus, jqXHR) {
      $("#list_khachdat").html(data);
    }
  );
}

function open_themmoi_khachhang() {
  const value = $("#value_search").val();
  const khachhang = /^\d+$/.test(value);
  $("#tenkh_add").val("");
  $("#dienthoai_add").val("");
  if (khachhang == true) {
    $("#dienthoai_add").val(value);
  }
  open_modal("form_add_benhnhan");
}

function open_modal_thutien(soct, tongtien, dathanhtoan, mskh, tenkh) {
  $("#soct_thuchi").val(soct);
  $("#mskh_thanhtoan").val(mskh.replaceAll(".", ""));
  $("#sdt_thanhtoan").val(mskh.replaceAll(".", ""));
  $("#tenkh_thanhtoan").html(tenkh);
  $("#tongcong_thanhtoan").val(
    tongtien.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#sotien_dathu").val(
    dathanhtoan.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#sotien_thanhtoan").val(
    (tongtien - dathanhtoan)
      .toString()
      .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#nganquy_thutruoc").val("TM");
  $("#qr-code").empty();
  $("#qr_code_hidden").empty();
  $("#title_qr_thanhtoan").html("");

  open_modal("form_thutien");
}

function thutien_donhang() {
  const tongcong = $("#tongcong_thanhtoan").val().replaceAll(".", "");
  const sotien_dathu = $("#sotien_dathu").val().replaceAll(".", "");
  const sotien = $("#sotien_thanhtoan").val().replaceAll(".", "");
  const nganquy = $("#nganquy_thutruoc :checked").val();
  const soct = $("#soct_thuchi").val();
  const mskh = $("#mskh_thanhtoan").val();
  const tenkh = $("#tenkh_thanhtoan").html();
  const makhoanmuc = $("#ID_thubanhang").val();
  const inskl = $("#thamso_inskl").val();

  $.post(
    "ajax/banhang/thutien_donhang.php",
    {
      soct: soct,
      mskh: mskh,
      tenkh: tenkh,
      tenkh_khongdau: tenkh
        .trim()
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "")
        .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"))
        .toUpperCase(),
      tongcong: tongcong,
      sotien_dathu: sotien_dathu,
      sotien: sotien,
      nganquy: nganquy,
      makhoanmuc: makhoanmuc,
    },
    async function (data, textStatus, jqXHR) {
      if (sotien > 0 && inskl == 1) {
        if (typeof timer !== undefined) {
          clearTimeout(this.timer);
        }
        let myPromise = new Promise(async function (resolve) {
          load_img_qr_chuyenkhoan(soct);
          setTimeout(resolve, 1000);
        });
        await myPromise;
        open_print_banhang(soct, "thutien");
      }
      close_modal("form_thutien");
      load_homnay_henkhach();
    }
  );
}

function load_img_qr_chuyenkhoan(soct) {
  $.post(
    "ajax/banhang/load_qr_code_banhang.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {
      new QRCode("qr_code_hidden", {
        text: data[0].qr_code,
        width: 200,
        height: 200,
        colorDark: "#000",
        colorLight: "#ffff",
        correctLevel: QRCode.CorrectLevel.H,
      });
    }
  );
}

function find_khachhang() {
  if (typeof timer !== undefined) {
    clearTimeout(this.timer);
  }
  this.timer = setTimeout(a, 500);
  function a() {
    const value = $("#dienthoai_add").val();
    $("#btn_luu_khachhang").removeClass("hidden");
    $("#btn_chon_khachhang").addClass("hidden");
    $("#form_khachhang").addClass("hidden");
    $("#mskh_add").val("");
    $("#nhom_add").val("");
    $("#tenkh_add").val("");
    $("#tennhom_add").val("");
    $("#conno_khachhang").val("");
    $("#ptgiam_load").val(0);
    if (value.length > 2) {
      $("#form_khachhang").removeClass("hidden");
      $("#icon_add_nguoithan").addClass("hidden");

      $.post(
        "ajax/banhang/find_khachhang.php",
        { value: value },
        function (data, textStatus, jqXHR) {
          $("#list_khachhang").html("");
          for (let i = 0; i < data.length; i++) {
            $("#list_khachhang").append(`
              <tr class="hover:cursor-pointer hover:bg-[#ddd]" >
              <td class='px-4 py-2  ' onclick="add_khachhang('${
                data[i].mskh
              }', '${data[i].sodienthoai}', '${data[i].tenkh}', '${
              data[i].gioitinh
            }','${data[i].diachi}', '${data[i].ngaysinh}','${
              data[i].ten_nguoithan
            }','${data[i].ms_nguoithan}','add' ,'${
              data[i].nghenghiep
            }')"><div class=' flex justify-center items-center'>${
              data[i].sodienthoai
            } </div></td>
              <td class='px-4 py-2 text-left font_semi whitespace-nowrap' onclick="add_khachhang('${
                data[i].mskh
              }', '${data[i].sodienthoai}', '${data[i].tenkh}', '${
              data[i].gioitinh
            }','${data[i].diachi}', '${data[i].ngaysinh}','${
              data[i].ten_nguoithan
            }','${data[i].ms_nguoithan}','add','${data[i].nghenghiep}')">${
              data[i].tenkh
            }</td>
              <td class='px-4 py-2 '><div class=' flex justify-center items-center'>${
                data[i].ten_nguoithan == 0
                  ? `<img onclick="open_add_nguoithan_inform('${data[i].sodienthoai}')" class='w-[20px]' src="vendor/img/add.png">`
                  : `<p onclick="add_khachhang('${data[i].mskh}', '${data[i].sodienthoai}', '${data[i].tenkh}', '${data[i].gioitinh}','${data[i].diachi}', '${data[i].ngaysinh}','${data[i].ten_nguoithan}','${data[i].ms_nguoithan}','add','${data[i].nghenghiep}')">${data[i].ten_nguoithan}</p>`
              }
              </div></td>
              <td onclick="add_khachhang('${data[i].mskh}', '${
              data[i].sodienthoai
            }', '${data[i].tenkh}', '${data[i].gioitinh}','${
              data[i].diachi
            }', '${data[i].ngaysinh}','${data[i].ten_nguoithan}','${
              data[i].ms_nguoithan
            }','add','${data[i].nghenghiep}')" class='px-4 py-2 text-center' >${
              data[i].gioitinh
            }</td>
              <td onclick="add_khachhang('${data[i].mskh}', '${
              data[i].sodienthoai
            }', '${data[i].tenkh}', '${data[i].gioitinh}','${
              data[i].diachi
            }', '${data[i].ngaysinh}','${data[i].ten_nguoithan}','${
              data[i].ms_nguoithan
            }','add','${data[i].nghenghiep}')" class='px-4 py-2 text-center'>${
              data[i].tennhom
            }</td>
              <td onclick="add_khachhang('${data[i].mskh}', '${
              data[i].sodienthoai
            }', '${data[i].tenkh}', '${data[i].gioitinh}','${
              data[i].diachi
            }', '${data[i].ngaysinh}','${data[i].ten_nguoithan}','${
              data[i].ms_nguoithan
            }','add','${data[i].nghenghiep}')" class='px-4 py-2 text-center'>${
              data[i].ptgiam
            }</td>
          </tr>
              `);
          }
          if (value.length == 10 && data.length == 1) {
            $("#tenkh_add").attr("readonly", true);
            $("#ngaysinh_add").attr("readonly", true);
            $("#diachi_add").attr("readonly", true);
            $("#dienthoai_add").val(value);
            $("#tenkh_add").val(data[0].tenkh);
            $("#mskh_add").val(data[0].mskh);
            $("#msnguoithan_add").val(data[0].ms_nguoithan);
            $("#ngaysinh_add").val(data[0].ngaysinh);
            $("#diachi_add").val(data[0].diachi);
            $("#nghenghiep_add").val(data[0].nghenghiep);
            $("#sdt_nguoithan").val(value);
            load_ms_nguoithan_new(value);
            $("#nu").prop("disabled", false);
            $("#nam").prop("disabled", false);

            if (data[0].gioitinh == "NAM") {
              $("#nam").prop("checked", true);
            } else {
              $("#nu").prop("checked", true);
            }

            $("#form_khachhang").addClass("hidden");
            $("#icon_add_nguoithan").removeClass("hidden");
            $("#btn_luu_khachhang").addClass("hidden");
            $("#btn_chon_khachhang").removeClass("hidden");
          }

          if (data == "") {
            $("#form_khachhang").addClass("hidden");
          }
        }
      );
    }
  }
}
function find_khachhang_khachdat() {
  if (typeof timer !== undefined) {
    clearTimeout(this.timer);
  }
  this.timer = setTimeout(a, 500);
  function a() {
    const value = $("#dienthoai_add_khachdat").val();
    $("#form_khachhang_khachdat").addClass("hidden");
    $("#mskh_add_khachdat").val("");
    $("#nhom_add_khachdat").val("");
    $("#tenkh_add_khachdat").val("");
    $("#tennhom_add_khachdat").val("");
    $("#conno_khachhang_khachdat").val("");
    $("#ptgiam_load_khachdat").val(0);
    if (value.length > 2) {
      $("#form_khachhang_khachdat").removeClass("hidden");
      $("#icon_add_nguoithan_khachdat").addClass("hidden");

      $.post(
        "ajax/banhang/find_khachhang.php",
        { value: value },
        function (data, textStatus, jqXHR) {
          $("#list_khachhang_khachdat").html("");
          for (let i = 0; i < data.length; i++) {
            $("#list_khachhang_khachdat").append(`
              <tr class="hover:cursor-pointer hover:bg-[#ddd]" >
              <td class='px-4 py-2  ' onclick="add_khachhang_khachdat('${
                data[i].mskh
              }', '${data[i].sodienthoai}', '${data[i].tenkh}', '${
              data[i].gioitinh
            }','${data[i].diachi}', '${data[i].ngaysinh}','${
              data[i].ten_nguoithan
            }','${data[i].ms_nguoithan}','add' ,'${
              data[i].nghenghiep
            }')"><div class=' flex justify-center items-center'>${
              data[i].sodienthoai
            } </div></td>
              <td class='px-4 py-2 text-left font_semi whitespace-nowrap' onclick="add_khachhang_khachdat('${
                data[i].mskh
              }', '${data[i].sodienthoai}', '${data[i].tenkh}', '${
              data[i].gioitinh
            }','${data[i].diachi}', '${data[i].ngaysinh}','${
              data[i].ten_nguoithan
            }','${data[i].ms_nguoithan}','add','${data[i].nghenghiep}')">${
              data[i].tenkh
            }</td>
              <td class='px-4 py-2 '><div class=' flex justify-center items-center'>${
                data[i].ten_nguoithan == 0
                  ? `<img onclick="open_add_nguoithan_inform('${data[i].sodienthoai}')" class='w-[20px]' src="vendor/img/add.png">`
                  : `<p onclick="add_khachhang_khachdat('${data[i].mskh}', '${data[i].sodienthoai}', '${data[i].tenkh}', '${data[i].gioitinh}','${data[i].diachi}', '${data[i].ngaysinh}','${data[i].ten_nguoithan}','${data[i].ms_nguoithan}','add','${data[i].nghenghiep}')">${data[i].ten_nguoithan}</p>`
              }
              </div></td>
              <td onclick="add_khachhang_khachdat('${data[i].mskh}', '${
              data[i].sodienthoai
            }', '${data[i].tenkh}', '${data[i].gioitinh}','${
              data[i].diachi
            }', '${data[i].ngaysinh}','${data[i].ten_nguoithan}','${
              data[i].ms_nguoithan
            }','add','${data[i].nghenghiep}')" class='px-4 py-2 text-center' >${
              data[i].gioitinh
            }</td>
              <td onclick="add_khachhang_khachdat('${data[i].mskh}', '${
              data[i].sodienthoai
            }', '${data[i].tenkh}', '${data[i].gioitinh}','${
              data[i].diachi
            }', '${data[i].ngaysinh}','${data[i].ten_nguoithan}','${
              data[i].ms_nguoithan
            }','add','${data[i].nghenghiep}')" class='px-4 py-2 text-center'>${
              data[i].tennhom
            }</td>
              <td onclick="add_khachhang_khachdat('${data[i].mskh}', '${
              data[i].sodienthoai
            }', '${data[i].tenkh}', '${data[i].gioitinh}','${
              data[i].diachi
            }', '${data[i].ngaysinh}','${data[i].ten_nguoithan}','${
              data[i].ms_nguoithan
            }','add','${data[i].nghenghiep}')" class='px-4 py-2 text-center'>${
              data[i].ptgiam
            }</td>
          </tr>
              `);
          }
          if (value.length == 10 && data.length == 1) {
            $("#tenkh_add_khachdat").attr("readonly", true);
            $("#ngaysinh_add_khachdat").attr("readonly", true);
            $("#diachi_add_khachdat").attr("readonly", true);
            $("#dienthoai_add_khachdat").val(value);
            $("#tenkh_add_khachdat").val(data[0].tenkh);
            $("#mskh_add_khachdat").val(data[0].mskh);
            $("#msnguoithan_add_khachdat").val(data[0].ms_nguoithan);
            $("#ngaysinh_add_khachdat").val(data[0].ngaysinh);
            $("#diachi_add_khachdat").val(data[0].diachi);
            $("#nghenghiep_add_khachdat").val(data[0].nghenghiep);
            $("#sdt_nguoithan_khachdat").val(value);
            load_ms_nguoithan_new(value);
            $("#nu_khachdat").prop("disabled", false);
            $("#nam_khachdat").prop("disabled", false);

            if (data[0].gioitinh == "NAM") {
              $("#nam_khachdat").prop("checked", true);
            } else {
              $("#nu_khachdat").prop("checked", true);
            }

            $("#form_khachhang_khachdat").addClass("hidden");
            $("#icon_add_nguoithan_khachdat").removeClass("hidden");
          }

          if (data == "") {
            $("#form_khachhang_khachdat").addClass("hidden");
          }
        }
      );
    }
  }
}

function add_khachhang(
  mskh,
  sdt,
  tenkh,
  gioitinh,
  diachi,
  ngaysinh,
  tennguoithan,
  ms_nguoithan,
  loai,
  nghenghiep
) {
  $("#dienthoai_add").val(sdt);
  if (tennguoithan == "") {
    $("#tenkh_add").val(tenkh);
  } else {
    $("#tenkh_add").val(tennguoithan);
  }
  $("#mskh_add").val(mskh);
  $("#msnguoithan_add").val(ms_nguoithan);
  $("#ngaysinh_add").val(ngaysinh);
  $("#diachi_add").val(diachi);
  $("#nghenghiep_add").val(nghenghiep);
  $("#nu").prop("disabled", false);
  $("#nam").prop("disabled", false);
  $("#sdt_nguoithan").val(sdt);
  load_ms_nguoithan_new(sdt);

  if (gioitinh == "NAM") {
    $("#nam").prop("checked", true);
  } else {
    $("#nu").prop("checked", true);
  }
  $("#icon_add_nguoithan").removeClass("hidden");
  $("#form_khachhang").addClass("hidden");
  $("#btn_luu_khachhang").addClass("hidden");
  $("#btn_chon_khachhang").removeClass("hidden");
}

function add_khachhang_khachdat(
  mskh,
  sdt,
  tenkh,
  gioitinh,
  diachi,
  ngaysinh,
  tennguoithan,
  ms_nguoithan,
  loai,
  nghenghiep
) {
  $("#dienthoai_add_khachdat").val(sdt);
  if (tennguoithan == "") {
    $("#tenkh_add_khachdat").val(tenkh);
  } else {
    $("#tenkh_add_khachdat").val(tennguoithan);
  }
  $("#mskh_add_khachdat").val(mskh);
  $("#msnguoithan_add_khachdat").val(ms_nguoithan);
  $("#ngaysinh_add_khachdat").val(ngaysinh);
  $("#diachi_add_khachdat").val(diachi);
  $("#nu_khachdat").prop("disabled", false);
  $("#nam_khachdat").prop("disabled", false);
  $("#sdt_nguoithan_khachdat").val(sdt);
  load_ms_nguoithan_new(sdt);

  if (gioitinh == "NAM") {
    $("#nam_khachdat").prop("checked", true);
  } else {
    $("#nu_khachdat").prop("checked", true);
  }
  $("#icon_add_nguoithan_khachdat").removeClass("hidden");
  $("#form_khachhang_khachdat").addClass("hidden");
}
function open_benhnhan() {
  open_modal("form_add_benhnhan");
  $("#mskh_add").val("");
  $("#tenkh_add").val("");
  $("#ngaysinh_add").val("");
  $("#diachi_add").val("");
  $("#dienthoai_add").val("");
  $("#nghenghiep_add").val("");
  $("#form_khachhang").addClass("hidden");
}

function open_khachdat() {
  open_modal("form_add_khachdat");
  $("#mskh_add_khachdat").val("");
  $("#tenkh_add_khachdat").val("");
  $("#ngaysinh_add_khachdat").val("");
  $("#diachi_add_khachdat").val("");
  $("#dienthoai_add_khachdat").val("");
  $("#ghichu_add_khachdat").val("");
  $("#form_khachhang_khachdat").addClass("hidden");
}

function add_khachdat() {
  $("#error_add_benhnhan").addClass("hidden");
  const mskh = $("#mskh_add_khachdat").val();
  const tenkh = $("#tenkh_add_khachdat").val();
  const ngaysinh = $("#ngaysinh_add_khachdat").val();
  const diachi = $("#diachi_add_khachdat").val();
  const sodienthoai = $("#dienthoai_add_khachdat").val().replaceAll(".", "");
  const gioitinh = $("input[name=gioitinh_khachdat]:checked").val();
  const ngaydat = $("#ngay_khachdat").val();
  const giodat = $("#giohen_khachdat").val();
  const ghichu = $("#ghichu_add_khachdat").val();
  const msnguoithan = $("#msnguoithan_add_khachdat").val();

  if (sodienthoai != "" && tenkh != "" && giodat != "") {
    $.post(
      "ajax/tiepnhan/add_khachdat.php",
      {
        mskh: mskh,
        tenkh: tenkh,
        ngaysinh: ngaysinh == "" ? "0000-00-00" : ngaysinh,
        diachi: diachi,
        gioitinh: gioitinh,
        sodienthoai: sodienthoai,
        ghichu: ghichu,
        ngaydat: ngaydat,
        giodat: giodat,
        msnguoithan: msnguoithan,
      },
      async function (data, textStatus, jqXHR) {
        close_modal("form_add_khachdat");
        $("#mskh_add_khachdat").val("");
        $("#tenkh_add_khachdat").val("");
        $("#ngaysinh_add_khachdat").val("");
        $("#diachi_add_khachdat").val("");
        $("#dienthoai_add_khachdat").val("");
        $("#ghichu_add_khachdat").val("");
        $("#tenkh_add").val("");
        $("#msnguoithan_add").val("");
        $("#ngaysinh_add").val("");
        $("input[name=gioitinh_khachdat]:checked").val("NỮ");
        load_khachdat();
      }
    );
  } else {
    $("#error_add_benhnhan_khachdat").removeClass("hidden");
  }
}

function chon_benhnhan() {
  const ms_nguoithan = $("#msnguoithan_add").val();
  let sodienthoai = $("#dienthoai_add").val();
  if (ms_nguoithan != "1") {
    sodienthoai = ms_nguoithan;
  }
  $("#value_search").val(sodienthoai);
  load_benhnhan();
  close_modal("form_add_benhnhan");
  $("#btn_luu_khachhang").removeClass("hidden");
  $("#btn_chon_khachhang").addClass("hidden");
}

function add_benhnhan() {
  $("#error_add_benhnhan").addClass("hidden");
  const mskh = $("#mskh_add").val();
  const tenkh = $("#tenkh_add").val();
  const ngaysinh = $("#ngaysinh_add").val();
  const diachi = $("#diachi_add").val();
  const sodienthoai = $("#dienthoai_add").val().replaceAll(".", "");
  const gioitinh = $("input[name=gioitinh]:checked").val();
  const nghenghiep = $("#nghenghiep_add").val();

  if (sodienthoai != "" && tenkh != "") {
    $.post(
      "ajax/tiepnhan/add_benhnhan.php",
      {
        mskh: mskh,
        tenkh: tenkh,
        ngaysinh: ngaysinh == "" ? "0000-00-00" : ngaysinh,
        diachi: diachi,
        gioitinh: gioitinh,
        sodienthoai: sodienthoai,
        nghenghiep: nghenghiep,
        loai: "add",
      },
      async function (data, textStatus, jqXHR) {
        close_modal("form_add_benhnhan");
        $("#mskh_add").val("");
        $("#tenkh_add").val("");
        $("#ngaysinh_add").val("");
        $("#diachi_add").val("");
        $("#dienthoai_add").val("");
        $("#tenkh_add_khachdat").val("");
        $("#msnguoithan_add_khachdat").val("");
        $("#ngaysinh_add_khachdat").val("");
        $("input[name=gioitinh]:checked").val("NỮ");
        $("#nghenghiep_add").val("");
        load_homnay_henkhach();
        $("#value_search").val(sodienthoai);
        load_benhnhan();
      }
    );
  } else {
    $("#error_add_benhnhan").removeClass("hidden");
  }
}

function open_add_donkham(
  mskh,
  tenkh,
  sodienthoai,
  diachi,
  gioitinh,
  msnguoithan
) {
  open_modal("form_add_khambenh");
  $("#tenkhachhang_dangky").html(tenkh + "|" + gioitinh + "|" + diachi);
  $("#mskh_add_khambenh").val(mskh);
  $("#sodienthoai_add_khambenh").val(sodienthoai);
  $("#tenkh_add_khambenh").val(tenkh);
  $("#msnguoithan_add_khambenh").val(msnguoithan);
}
function open_tiepnhan_benhnhan(soct, tenkh, sodienthoai) {
  open_modal("form_tiepnhan_benhnhan");
  $("#tenbn_benhnhan_tiepnhan").html(tenkh);
  $("#sodienthoai_benhnhan_tiepnhan").val(sodienthoai);
  $("#soct_benhnhan_tiepnhan").val(soct);
}

function open_tiepnhan_khachdat(soct, tenkh, sodienthoai, ngaysinh, diachi) {
  open_modal("form_tiepnhan_khachdat");
  $("#sodienthoai_khachdat_tiepnhan").val(sodienthoai);
  $("#soct_khachdat_tiepnhan").val(soct);
  $("#ngaysinh_add_khachdat_tiepnhan").val(ngaysinh);
  $("#diachi_add_khachdat_tiepnhan").val(diachi);
  $("#tenbn_khachdat_tiepnhan").html(tenkh);
  const batbuoc_diachi = $("#ID_bbdc").val();
  const batbuoc_ngaysinh = $("#ID_bbns").val();
  if (batbuoc_diachi == "1") {
    $("#diachi_tiepnhan_khachdat").removeClass("hidden");
  }
  if (batbuoc_ngaysinh == "1") {
    $("#ngaysinh_tiepnhan_khachdat").removeClass("hidden");
  }
}
function tiepnhan_khachdat() {
  const sodienthoai = $("#sodienthoai_khachdat_tiepnhan").val();
  const soct = $("#soct_khachdat_tiepnhan").val();
  const batbuoc_diachi = $("#ID_bbdc").val();
  const batbuoc_ngaysinh = $("#ID_bbns").val();
  const ngaysinh = $("#ngaysinh_add_khachdat_tiepnhan").val();
  const diachi = $("#diachi_add_khachdat_tiepnhan").val();
  let dem = 0;
  if (batbuoc_diachi == "1" && diachi == "") {
    dem += 1;
  }
  if (batbuoc_ngaysinh == "1" && ngaysinh == "") {
    dem += 1;
  }
  if (dem == 0) {
    $.post(
      "ajax/tiepnhan/update_banhang_header_trangthai_khachdat.php",
      { sodienthoai: sodienthoai, soct: soct },
      function (data, textStatus, jqXHR) {
        $("#value_search").val("");
        close_modal("form_tiepnhan_khachdat");
        load_homnay_henkhach();
      }
    );
  }
}

function tiepnhan_benhnhan() {
  const sodienthoai = $("#sodienthoai_benhnhan_tiepnhan").val();
  const soct = $("#soct_benhnhan_tiepnhan").val();
  $.post(
    "ajax/tiepnhan/update_banhang_header_trangthai.php",
    { sodienthoai: sodienthoai, soct: soct },
    function (data, textStatus, jqXHR) {
      close_modal("form_tiepnhan_benhnhan");
      load_henkhach();
    }
  );
}

function open_delete_khachdat(soct, tenkh, sodienthoai) {
  open_modal("form_huykham");
  $("#tenbn_huykham").html(tenkh);
  $("#sodienthoai_huykham").val(sodienthoai);
  $("#soct_huykham").val(soct);
}

function dangky_khambenh() {
  const mskh = $("#mskh_add_khambenh").val();
  const sodienthoai = $("#sodienthoai_add_khambenh").val();
  const tenkh = $("#tenkh_add_khambenh").val();
  const msnguoithan = $("#msnguoithan_add_khambenh").val();
  $.post(
    "ajax/tiepnhan/add_banhang_header.php",
    {
      mskh: mskh,
      tenkh: tenkh,
      sodienthoai: sodienthoai,
      msnguoithan: msnguoithan,
    },
    function (data, textStatus, jqXHR) {
      close_modal("form_add_khambenh");
      $("#value_search").val("");
      load_benhnhan();
    }
  );
}

function open_edit_benhnhan() {
  open_modal("form_edit_benhnhan");
  close_modal("form_chucnang");
}

function edit_benhnhan() {
  const mskh = $("#mskh_edit").val();
  const sodienthoai = $("#dienthoai_edit").val();
  const tenkh = $("#tenkh_edit").val();
  const diachi = $("#diachi_edit").val();
  const ngaysinh = $("#ngaysinh_edit").val();
  const nghenghiep = $("#nghenghiep_edit").val();
  const gioitinh = $("input[name=gioitinh_edit]:checked").val();

  $.post(
    "ajax/tiepnhan/add_benhnhan.php",
    {
      mskh: mskh,
      sodienthoai: sodienthoai,
      tenkh: tenkh,
      diachi: diachi,
      ngaysinh: ngaysinh,
      nghenghiep: nghenghiep,
      gioitinh: gioitinh,
      loai: "edit",
    },
    function (data, textStatus, jqXHR) {
      close_modal("form_edit_benhnhan");
      $("#mskh_edit").val("");
      $("#dienthoai_edit").val("");
      $("#ngaysinh_edit").val("");
      $("#diachi_edit").val("");
      $("#nghenghiep_edit").val("");
      load_benhnhan();
    }
  );
}

function open_lichsu(sodienthoai, tenkh) {
  open_modal("form_lichsu_khambenh");
  $("#tenbn_khambenh").text(tenkh);
  $.post(
    "ajax/tiepnhan/load_lichsu.php",
    {
      sodienthoai: sodienthoai,
    },
    function (data, textStatus, jqXHR) {
      $("#list_lichsu_khambenh").html(data);
    }
  );
}

function open_chucnang(
  sdt,
  soct,
  tenkh,
  trangthai,
  mskh,
  diachi,
  gioitinh,
  nghenghiep,
  ngaysinh
) {
  $("#tenbn_chucnang").html(tenkh);
  $("#sodienthoai_chucnang").val(sdt);
  $("#soct_chucnang").val(soct);
  $("#mskh_edit").val(mskh);
  $("#dienthoai_edit").val(sdt);
  $("#ngaysinh_edit").val(ngaysinh);
  $("#diachi_edit").val(diachi);
  $("#nghenghiep_edit").val(nghenghiep);
  $("#tenkh_edit").val(tenkh);
  if (gioitinh == "NAM") {
    $("#nam_edit").prop("checked", true);
  } else {
    $("#nu_edit").prop("checked", true);
  }
  open_modal("form_chucnang");
  $("#btn_huykham").removeClass("hidden");
  if (trangthai > 1) {
    $("#btn_huykham").addClass("hidden");
  }
}

function open_huykham() {
  close_modal("form_chucnang");
  open_modal("form_huykham");
  $("#tenbn_huykham").html($("#tenbn_chucnang").text());
  $("#sodienthoai_huykham").val($("#sodienthoai_chucnang").val());
  $("#soct_huykham").val($("#soct_chucnang").val());
}

function huykham_benhnhan() {
  const sdt = $("#sodienthoai_huykham").val();
  const soct = $("#soct_huykham").val();
  $.post(
    "ajax/tiepnhan/huy_khambenh.php",
    { sodienthoai: sdt, soct: soct },
    function (data, textStatus, jqXHR) {
      close_modal("form_huykham");
      load_benhnhan();
      load_khachdat();
    }
  );
}

function open_edit_khachdat(e) {
  $(e).parent().parent().parent().find(".td_thoigian").addClass("hidden");
  $(e).parent().parent().parent().find(".input_thoigian").removeClass("hidden");
  $(e).parent().parent().parent().find(".td_tuvan").addClass("hidden");
  $(e).parent().parent().parent().find(".input_tuvan").removeClass("hidden");
  $(e).parent().find(".btn_edit").addClass("hidden");
  $(e).parent().find(".btn_save").removeClass("hidden");
}

function edit_khachdat(e, soct, sodienthoai) {
  $(e).parent().parent().parent().find(".td_thoigian").removeClass("hidden");
  $(e).parent().parent().parent().find(".input_thoigian").addClass("hidden");
  $(e).parent().parent().parent().find(".td_tuvan").removeClass("hidden");
  $(e).parent().parent().parent().find(".input_tuvan").addClass("hidden");
  $(e).parent().find(".btn_edit").removeClass("hidden");
  $(e).parent().find(".btn_save").addClass("hidden");
  const tuvan = $(e)
    .parent()
    .parent()
    .parent()
    .find(".input_tuvan input")
    .val();
  const thoigian = $(e).parent().parent().parent().find(".gio_edit").val();
  const ngaydat = $(e).parent().parent().parent().find(".ngaydat_edit").val();
  $.post(
    "ajax/tiepnhan/edit_khachdat.php",
    {
      soct: soct,
      sodienthoai: sodienthoai,
      tuvan: tuvan,
      thoigian: thoigian,
      ngaydat: ngaydat,
    },
    function (data, textStatus, jqXHR) {
      load_khachdat();
    }
  );
}

function open_form_dichvu_dachidinh(sdt, soct, tenkh, msnguoithan) {
  $("#tenkh_dachidinh").html(tenkh);
  $("#tenkh_chidinh_dichvu").html(tenkh);
  $("#msnguoithan_chidinh_dichvu").val(msnguoithan);
  $("#soct_dachidinh").val(soct);
  $("#sdt_dachidinh").val(sdt);
  open_modal("form_dichvu_dachidinh");
  delete_tam_banhang_line(soct);
  load_dichvu_dachidinh(soct);
  load_khachhang_dichvu_rang(soct);
  load_chidinh_dichvu_rang(soct);
}

function open_form_add_donthuoc(sdt, soct, tenkh, nhom_kh) {
  $("#tenkh_add_donthuoc").html(tenkh);
  $("#soct_donthuoc").val(soct);
  $("#sodienthoai_donthuoc").val(sdt);
  $("#nhom_kh_donthuoc").val(nhom_kh);
  open_modal("form_add_donthuoc");
  load_donthuoc();
}
function open_chidinh_dichvu() {
  open_modal("form_chidinh_dichvu");
  const soct = $("#soct_dachidinh").val();
  $(".item_msrang").parent().removeClass("bg-[#b6ffae] px-2 ");
  $(".item_msrang").prop("checked", false);
  load_khachhang_dichvu_rang(soct);
  load_chidinh_dichvu_rang(soct);
  delete_tam_banhang_line(soct);
}
function load_dichvu_dachidinh(soct) {
  $.post(
    "ajax/tiepnhan/load_dichvu_dachidinh.php",
    { soct: soct },
    function (data, thanhtien, jqXHR) {
      $("#list_dichvu_dachidinh").html(data);
    }
  );
}

function load_khachhang_dichvu_rang(soct) {
  $.post(
    "ajax/tiepnhan/load_khachhang_dichvu_rang.php",
    { soct: soct },
    function (data, thanhtien, jqXHR) {
      $("#nhom_kh_dachidinh").val(data[0].nhom_kh);
      $("#ptgiam_dachidinh").val(data[0].ptgiam);
      $("#trangthai_donhang").val(data[0].trangthai);
    }
  );
}

function tim_hanghoa(e, loai, vitri) {
  $("#form_dichvu_chidinh").addClass("hidden");
  const tenhh = $(e).val();
  const sodienthoai = $("#sdt_dachidinh").val();
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
            $("#form_dichvu_chidinh").removeClass("hidden");
            $("#list_dichvu_chidinh_items").html(data);
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
  ptthuchien
) {
  $("#mshh_add").val(mshh);
  $("#tenhh_add").val(tenhh);
  $("#dvt_add").val(dvt);
  $("#giaban_add").val(giaban);
  $("#gianhap_add").val(gianhap);
  $("#pttichluy_add").val(pttichluy);
  $("#loai_hh_add").val(loai_hh);
  $("#songay_bh_add").val(songay_bh);
  $("#thuesuat_add").val(thuesuat);
  $("#ptthuchien_donthuoc").val(ptthuchien);
  $("#soluong_add").val(1);
  $("#form_hanghoa").addClass("hidden");
  ktra_tonkho(mshh);
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
function lay_tonkho_baocao() {
  $.post(
    "ajax/xuatkho/lay_tonkho_baocao.php",
    { loai: "CN" },
    function (data, textStatus, jqXHR) {}
  );
}

function open_delete_donthuoc(tenhh, mshh, idchidinh, soct) {
  open_modal("form_delete_donthuoc");
  $("#tenhh_delete_donthuoc").html(tenhh);
  $("#mshh_delete_donthuoc").val(mshh);
  $("#idchidinh_delete_donthuoc").val(idchidinh);
  $("#soct_delete_donthuoc").val(soct);
}

function delete_donthuoc() {
  const mshh = $("#mshh_delete_donthuoc").val();
  const idchidinh = $("#idchidinh_delete_donthuoc").val();
  const soct = $("#soct_delete_donthuoc").val();
  $.post(
    "ajax/nhatky/delete_donthuoc.php",
    { soct: soct, idchidinh: idchidinh, mshh: mshh },
    function (data, textStatus, jqXHR) {
      load_donthuoc();
      close_modal("form_delete_donthuoc");
    }
  );
}

function open_edit_donthuoc(e, mshh) {
  const thamso_qltk = $("#thamso_qltk").val();
  console.log(thamso_qltk);
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
  const msctkm = $("#msctkm_donthuoc").val();
  const nhom_kh = $("#nhom_kh_donthuoc").val();

  $.post(
    "ajax/nhatky/add_donthuoc.php",
    {
      sodienthoai: sodienthoai,
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
  $("#tendichvu_add_chidinh").val(tendichvu);
  $("#msctkm_add_dichvu_chidinh").val(msctkm);
  $("#ptgiam_add_dichvu_chidinh").val(ptgiam);
  $("#mshh_add_dichvu_chidinh").val(mshh);
  $("#colieutrinh_add_dichvu_chidinh").val(colieutrinh);
  $("#dongia_add_dichvu_chidinh").val(giaban);
  $("#tiengiam_add_dichvu_chidinh").val(
    ((giaban.replace(/[.]/g, "") * ptgiam) / 100)
      .toString()
      .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#nhom_hh_add_dichvu_chidinh").val(nhom_hh);
  $("#form_dichvu_chidinh").addClass("hidden");
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

function check_tatca(e) {
  const check_tatca = $(e).is(":checked");
  if (check_tatca == true) {
    $(".item_msrang").prop("checked", true);
  } else {
    $(".item_msrang").prop("checked", false);
  }
}

function check_rang(e, ms_rang) {
  const check_rang = $("#" + ms_rang).is(":checked");
  if (check_rang == true) {
    $(e).addClass("bg-[#b6ffae] px-2  ");
  } else {
    $(e).removeClass("bg-[#b6ffae] px-2  ");
  }
}

function delete_tam_banhang_line(soct) {
  $.post(
    "ajax/tiepnhan/delete_tam_banhang_line.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {}
  );
}

function load_chidinh_dichvu_rang() {
  $("#tenhh_add").val("");
  $("#form_dichvu_chidinh").addClass("hidden");
  const soct = $("#soct_dachidinh").val();
  $(".item_msrang").parent().removeClass("!text-[red]");

  $.post(
    "ajax/tiepnhan/load_chidinh_dichvu_rang.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {
      let tongthanhtien = 0;
      $("#list_chidinh_dichvu").html("");
      for (let i = 0; i < data.length; i++) {
        tongthanhtien += Number(data[i].thanhtien);
        if (data[i].ms_rang != "") {
          $("." + data[i].ms_rang).addClass("!text-[red]");
        }
        $("#list_chidinh_dichvu").append(`
        <tr class="text-[black]  hover:bg-[#ddd] border-b border-dashed border-[#ddd]">
        <td class=" px-4  py-3 text-center font-thin">${i + 1}</th>
        <td class=" px-4  py-3 text-left font-thin">${data[i].tenhh}</td>
        <td class=" px-4  py-3 text-right font-thin">${data[i].giaban
          .toString()
          .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")}</td>
        <td class=" px-4  py-3 text-right font-thin">${data[i].ptgiam}</td>
        <td class=" px-4  py-3 text-right font-thin">${(
          (data[i].giaban * data[i].ptgiam) /
          100
        )
          .toString()
          .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")}</td>
        <td class=" px-4  py-3 text-right font-thin">${data[i].thanhtien
          .toString()
          .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")}</td>
        <td class=" px-4  py-3 text-center font-thin">${data[i].ms_rang}</td>
        <td class=" px-4  py-3 flex justify-center font-thin">
            <div>
                <img class="w-[20px] h-[20px] hover:cursor-pointer" onclick="open_delete_dichvu_rang('${
                  data[i].tenhh
                }', '${data[i].mshh}', '${data[i].idchidinh}', '${
          data[i].soct
        }', '${data[i].ms_rang}', '${
          data[i].rowid
        }')" src='vendor/img/delete.png'>
            </div>
        </td>
    </tr>
        `);
      }
      $("#list_chidinh_dichvu").append(`<tr class="text-[red]">
      <td colspan="5" class=" px-4 py-3 text-end font_semi">Tổng cộng</th>
      <td class=" px-4 py-3 text-right font_semi">${tongthanhtien
        .toString()
        .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")}</td>
  
  </tr>`);
    }
  );
}

function add_chidinh_dichvu() {
  const dienthoai = $("#sdt_dachidinh").val();
  const nhom_kh = $("#nhom_kh_dachidinh").val();
  const msctkm = $("#msctkm_add_dichvu_chidinh").val();
  const ptgiam = $("#ptgiam_add_dichvu_chidinh").val();
  const mshh = $("#mshh_add_dichvu_chidinh").val();
  const msnguoithan = $("#msnguoithan_chidinh_dichvu").val();
  const colieutrinh = $("#colieutrinh_add_dichvu_chidinh").val();
  const nhom_hh = $("#nhom_hh_add_dichvu_chidinh").val();
  const ngayhen = $("#ngayhen_edit_chidinh").val();
  const giohen = $("#giohen_edit_chidinh").val();
  const soct = $("#soct_dachidinh").val();
  let list_msrang = document.getElementsByClassName("item_msrang");
  let list_khong_check = 0;
  if (mshh != "") {
    for (let i = 0; i < list_msrang.length; i++) {
      if (list_msrang[i].checked) {
        $.post(
          "ajax/tiepnhan/add_rang_banhangline.php",
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
            load_chidinh_dichvu_rang(soct);
            load_dichvu_dachidinh(soct);
          }
        );
      } else {
        list_khong_check += 1;
      }
    }
    if (list_msrang.length == list_khong_check) {
      $.post(
        "ajax/tiepnhan/add_rang_banhangline.php",
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
          load_chidinh_dichvu_rang(soct);
          load_dichvu_dachidinh(soct);
        }
      );
    }
  }
}

function open_add_nugoithuchien_dichvu_rang(
  rowid,
  tenhh,
  mshh,
  idchidinh,
  soct,
  msrang,
  mslieutrinh
) {
  open_modal("form_add_nguoithuchien");
  $("#tenhh_add_nguoithuchien").html(tenhh);
  $("#mshh_add_nguoithuchien").val(mshh);
  $("#idchidinh_add_nguoithuchien").val(idchidinh);
  $("#soct_add_nguoithuchien").val(soct);
  $("#msrang_add_nguoithuchien").val(msrang);
  $("#rowid_add_nguoithuchien").val(rowid);
  load_nhanvien_in_banhang(soct, mslieutrinh, rowid);
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
function luu_dichvu_rang() {
  const soct = $("#soct_dachidinh").val();
  $.post(
    "ajax/tiepnhan/luu_dichvu_rang.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {
      close_modal("form_chidinh_dichvu");
      load_khachhang_dichvu_rang(soct);
      load_dichvu_dachidinh(soct);
      load_chidinh_dichvu_rang(soct);
      load_homnay_henkhach();
    }
  );
}

function capnhat_trangthai_banhang_header(soct) {
  $.post(
    "ajax/tiepnhan/capnhat_trangthai_banhang_header.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {}
  );
}
function delete_dichvu_rang() {
  const mshh = $("#mshh_delete_dichvu").val();
  const idchidinh = $("#idchidinh_delete_dichvu").val();
  const soct = $("#soct_dachidinh").val();
  const rowidtc = $("#rowid_dichvu").val();
  $.post(
    "ajax/nhatky/delete_donthuoc.php",
    { soct: soct, idchidinh: idchidinh, mshh: mshh, rowidtc: rowidtc },
    function (data, textStatus, jqXHR) {
      load_khachhang_dichvu_rang(soct);
      load_dichvu_dachidinh(soct);
      load_chidinh_dichvu_rang(soct);
      load_homnay_henkhach();
      capnhat_trangthai_banhang_header(soct);
      close_modal("form_delete_dichvu");
    }
  );
}

function load_nhanvien_in_banhang(soct, mslieutrinh, rowid) {
  $.post(
    "ajax/tiepnhan/load_nhanvien_thuchien.php",
    { rowid: rowid },
    function (list, textStatus, jqXHR) {
      $.post(
        "ajax/banhang/load_nhanvien_in_banhang.php",
        {},
        function (data, textStatus, jqXHR) {
          $("#list_nhanvien_in_modal").html("");
          var soluong_nv_cho = 0;
          var active = "";
          for (let i = 0; i < data.length; i++) {
            for (let j = 0; j < list.length; j++) {
              if (list[j].rowidtc == data[i].rowidtc) {
                active = "text-[red]";
              } else {
                active = "";
              }
            }
            var img_trangthai = "";
            switch (data[i].ban) {
              case "1":
                img_trangthai = "<img src='vendor/img/wait.png'>";
                break;

              default:
                soluong_nv_cho += 1;
                img_trangthai = "<img src='vendor/img/check24.png'>";
                break;
            }
            $("#list_nhanvien_in_modal").append(`
          <tr class="hover:bg-[#f4ddfb] ${active} items_nhanvien hover:cursor-pointer  border-b border-dashed border-[#a7a5a540]" onclick="chon_nhanvien(this,'${
              data[i].msnv
            }', '${soct}','${mslieutrinh}', '${data[i].ban}')">
          <td class='px-3 py-2 text-center'>${i + 1}</td>
          <td class=' px-3 py-2  max-w-[30px] text-left whitespace-nowrap'>${
            data[i].tennv
          } </td>
          <td class=' px-3 py-2 text-center'>${data[i].vao} </td>
          <td class=' px-3 py-2 text-center'>${data[i].tg}</td>
          <td class=' px-3 py-2 text-left'>${data[i].tenhh}</td>
          <td class=' px-3 py-2 flex justify-center items-center'>
            ${img_trangthai}
          </td>
      </tr>
          `);
          }
        }
      );
    }
  );
}
function chon_nhanvien(e, msnv, soct, mslieutrinh, ban) {
  $("#trangthai_add_nguoithuchien").val(ban);
  $("#ten_add_nguoithuchien").val("");
  $(".items_nhanvien").removeClass("bg-[#f4ddfb]");
  $(e).addClass("bg-[#f4ddfb]");
  $("#msnv_add_nguoithuchien").val(msnv);
  $("#soct_add_nguoithuchien").val(soct);
  $("#mslieutrinh_add_nguoithuchien").val(mslieutrinh);
}

function add_nguoithuchien() {
  const rowid = $("#rowid_add_nguoithuchien").val();
  const soct = $("#soct_add_nguoithuchien").val();
  const mslieutrinh = $("#mslieutrinh_add_nguoithuchien").val();
  const msnv = $("#msnv_add_nguoithuchien").val();
  const trangthai = $("#trangthai_add_nguoithuchien").val();
  $.post(
    "ajax/tiepnhan/add_nguoithuchien.php",
    {
      rowid: rowid,
      soct: soct,
      msnv: msnv,
      mslieutrinh: mslieutrinh,
    },
    function (data, textStatus, jqXHR) {
      load_dichvu_dachidinh(soct);
      load_henkhach();
      close_modal("form_add_nguoithuchien");
    }
  );
}

function open_xoa_nguoithuchien(tennv, rowid, msnv, mslieutrinh) {
  open_modal("form_delete_nguoithuchien");
  $("#rowid_delete").val(rowid);
  $("#tennv_delete").html(tennv);
  $("#msnv_delete").val(msnv);
  $("#mslieutrinh_delete").val(mslieutrinh);
}
function delete_nguoithuchien() {
  const rowid = $("#rowid_delete").val();
  const soct = $("#soct_dachidinh").val();
  const msnv = $("#msnv_delete").val();
  const mslieutrinh = $("#mslieutrinh_delete").val();

  $.post(
    "ajax/tiepnhan/delete_nguoithuchien.php",
    { rowid: rowid, msnv: msnv, soct: soct, mslieutrinh: mslieutrinh },
    function (data, textStatus, jqXHR) {
      load_dichvu_dachidinh(soct);
      load_henkhach();
      close_modal("form_delete_nguoithuchien");
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

function huy_donthuoc_dichvu(loai) {
  const soct = $("#soct_donthuoc").val();
  $.post(
    "ajax/nhatky/huy_donthuoc.php",
    { soct: soct, loai: loai },
    function (data, textStatus, jqXHR) {
      load_donthuoc();
      close_modal("form_huy_donthuoc");
      close_modal("form_add_donthuoc");
    }
  );
}
function luu_donthuoc() {
  const soct = $("#soct_donthuoc").val();
  const qltk = $("#thamso_qltk").val();

  $.post(
    "ajax/nhatky/luu_donthuoc_dichvu.php",
    { soct: soct, nhomhh: "DT", qltk: qltk },
    function (data, textStatus, jqXHR) {
      close_modal("form_add_donthuoc");
      load_henkhach();
      load_benhnhan();
    }
  );
}

async function huy_chidinh_dichvu() {
  const soct = $("#soct_dachidinh").val();
  close_modal("form_chidinh_dichvu");
  close_modal("form_huy_chidinh_dichvu");
  if (typeof timer !== undefined) {
    clearTimeout(this.timer);
  }
  let myPromise = new Promise(async function (resolve) {
    delete_tam_banhang_line(soct);
    load_khachhang_dichvu_rang(soct);
    load_chidinh_dichvu_rang(soct);
    setTimeout(resolve, 500);
  });
  await myPromise;

  load_dichvu_dachidinh(soct);
}

function open_add_nguoithan_inform(sdt) {
  open_modal("form_add_nguoithan");
  $("#sdt_nguoithan").val(sdt);
  $("#loai_add").val("inform");
  load_ms_nguoithan_new(sdt);
}
function add_nguoithan() {
  const sodienthoai = $("#sdt_nguoithan").val();
  const ms_nguoithan = $("#msnguoithan_new").val();
  const ten_nguoithan = $("#hoten_nguoithan").val();
  const gioitinh_nguoithan = $("input[name=gioitinhnguoithan]:checked").val();
  const ngaysinh_nguoithan = $("#ngaysinh_nguoithan").val();
  $("#error_add_nguoithan").addClass("hidden");
  if (ngaysinh_nguoithan != "" || ten_nguoithan != "") {
    $.post(
      "ajax/khachhang/add_nguoithan.php",
      {
        sodienthoai: sodienthoai,
        ms_nguoithan: ms_nguoithan,
        ten_nguoithan: ten_nguoithan,
        gioitinh_nguoithan: gioitinh_nguoithan,
        ngaysinh_nguoithan: ngaysinh_nguoithan,
      },
      function (data, textStatus, jqXHR) {
        $("#tenkh_add").val(ten_nguoithan);
        $("#tenkh_add_khachdat").val(ten_nguoithan);
        $("#msnguoithan_add").val(ms_nguoithan);
        $("#msnguoithan_add_khachdat").val(ms_nguoithan);
        $("#ngaysinh_add").val(ngaysinh_nguoithan);
        $("#ngaysinh_add_khachdat").val(ngaysinh_nguoithan);
        $("#nu_nguoithan").prop("disabled", false);
        $("#nam_nguoithan").prop("disabled", false);
        $("#hoten_nguoithan").val("");
        if (gioitinh_nguoithan == "NAM") {
          $("#nam_nguoithan").prop("checked", true);
          $("#nu_nguoithan").prop("disabled", true);
        } else {
          $("#nu_nguoithan").prop("checked", true);
          $("#nam_nguoithan").prop("disabled", true);
        }
        find_khachhang();
        find_khachhang_khachdat();

        $.post(
          "ajax/banhang/find_khachhang.php",
          { value: sodienthoai },
          function (data, textStatus, jqXHR) {
            $("#list_khachhang").html("");
            for (let i = 0; i < data.length; i++) {
              $("#list_khachhang").append(`
                <tr class="hover:cursor-pointer hover:bg-[#ddd]" >
                <td class='px-4 py-2  ' onclick="add_khachhang('${
                  data[i].mskh
                }', '${data[i].sodienthoai}', '${data[i].tenkh}', '${
                data[i].gioitinh
              }','${data[i].diachi}', '${data[i].ngaysinh}','${
                data[i].ten_nguoithan
              }','${data[i].ms_nguoithan}','add' ,'${
                data[i].nghenghiep
              }')"><div class=' flex justify-center items-center'>${
                data[i].sodienthoai
              } </div></td>
                <td class='px-4 py-2 text-left font_semi whitespace-nowrap' onclick="add_khachhang('${
                  data[i].mskh
                }', '${data[i].sodienthoai}', '${data[i].tenkh}', '${
                data[i].gioitinh
              }','${data[i].diachi}', '${data[i].ngaysinh}','${
                data[i].ten_nguoithan
              }','${data[i].ms_nguoithan}','add','${data[i].nghenghiep}')">${
                data[i].tenkh
              }</td>
                <td class='px-4 py-2 '><div class=' flex justify-center items-center'>${
                  data[i].ten_nguoithan == 0
                    ? `<img onclick="open_add_nguoithan_inform('${data[i].sodienthoai}')" class='w-[20px]' src="vendor/img/add.png">`
                    : data[i].ten_nguoithan
                }
                </div></td>
                <td class='px-4 py-2 text-center' >${data[i].gioitinh}</td>
                <td class='px-4 py-2 text-center'>${data[i].tennhom}</td>
                <td class='px-4 py-2 text-center'>${data[i].ptgiam}</td>
            </tr>
                `);
              $("#list_khachhang_khachdat").append(`
                <tr class="hover:cursor-pointer hover:bg-[#ddd]" >
                <td class='px-4 py-2  ' onclick="add_khachhang('${
                  data[i].mskh
                }', '${data[i].sodienthoai}', '${data[i].tenkh}', '${
                data[i].gioitinh
              }','${data[i].diachi}', '${data[i].ngaysinh}','${
                data[i].ten_nguoithan
              }','${data[i].ms_nguoithan}','add' ,'${
                data[i].nghenghiep
              }')"><div class=' flex justify-center items-center'>${
                data[i].sodienthoai
              } </div></td>
                <td class='px-4 py-2 text-left font_semi whitespace-nowrap' onclick="add_khachhang('${
                  data[i].mskh
                }', '${data[i].sodienthoai}', '${data[i].tenkh}', '${
                data[i].gioitinh
              }','${data[i].diachi}', '${data[i].ngaysinh}','${
                data[i].ten_nguoithan
              }','${data[i].ms_nguoithan}','add','${data[i].nghenghiep}')">${
                data[i].tenkh
              }</td>
                <td class='px-4 py-2 '><div class=' flex justify-center items-center'>${
                  data[i].ten_nguoithan == 0
                    ? `<img onclick="open_add_nguoithan_inform('${data[i].sodienthoai}')" class='w-[20px]' src="vendor/img/add.png">`
                    : data[i].ten_nguoithan
                }
                </div></td>
                <td class='px-4 py-2 text-center' >${data[i].gioitinh}</td>
                <td class='px-4 py-2 text-center'>${data[i].tennhom}</td>
                <td class='px-4 py-2 text-center'>${data[i].ptgiam}</td>
            </tr>
                `);
            }
          }
        );
        close_modal("form_add_nguoithan");
        load_ms_nguoithan_new(sodienthoai);
      }
    );
  } else {
    $("#error_add_nguoithan").removeClass("hidden");
  }
}

function load_ms_nguoithan_new(sdt) {
  $.post(
    "ajax/khachhang/load_ms_nguoithan_new.php",
    { sodienthoai: sdt },
    function (data, textStatus, jqXHR) {
      var msnguoithan_new = sdt + "_1";
      if (data.length != 0) {
        msnguoithan_new = data[0].ms_nguoithan;
      }
      $("#msnguoithan_new").val(msnguoithan_new);
    }
  );
}
