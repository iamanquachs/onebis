//! format số tiền và chặn nhập chữ
function _ChangeFormat(e) {
  var soluong = $(e).val().replace(/[.]/g, "");
  soluong = $(e)
    .val()
    .replace(/[.]/g, "")
    .toString()
    .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
  $(e).val(soluong.replace(/[^0-9\.\,]/g, ""));
}

function open_modal(e) {
  $("#" + e).removeClass("hidden");
}
function close_modal(e) {
  $("#" + e).addClass("hidden");
}

function _show_add(e) {
  $(e).parent().parent().find(".__show").removeClass("hidden");
  $(e).parent().parent().find(".__icon").find(".icon_add").addClass("hidden");
  $(e)
    .parent()
    .parent()
    .find(".__icon")
    .find(".icon_remove")
    .removeClass("hidden");
}
function _hidden_add(e) {
  $(e).parent().parent().find(".__show").addClass("hidden");
  $(e)
    .parent()
    .parent()
    .find(".__icon")
    .find(".icon_add")
    .removeClass("hidden");
  $(e)
    .parent()
    .parent()
    .find(".__icon")
    .find(".icon_remove")
    .addClass("hidden");
}

//todo Logout page
function logout() {
  $.post("controller/logout.php", {}, function (t) {
    location.replace("index.html");
  });
}
//todo Login page
function login() {
  var sodienthoai = $("#sodienthoai").val(),
    matkhau = $("#matkhau").val();
  if (sodienthoai == "" || matkhau == "") {
    $("#title_login").html("Vui lòng nhập số điện thoại và mật khẩu");
    $("#title_login").addClass("text-[yellow]");
  } else {
    $.post(
      "controller/login.php",
      {
        sodienthoai: sodienthoai,
        matkhau: matkhau,
      },
      function (data) {
        if (data[0].logined == 0) {
          $("#title_login").html(data[0].token);
          $("#title_login").addClass("text-[yellow]");
        } else {
          location.replace("index.html");
        }
      }
    );
  }
}

function active_item(e) {
  $(".item_line").removeClass("bg-[#693b85]");
  $(e).addClass("bg-[#693b85]");
}

function load_thamsohethong(e) {
  $.post(
    "ajax/thamsohethong/load_thamsohethong.php",
    {
      msthamso: e,
    },
    function (data, textStatus, jqXHR) {
      if (e == "QLTK") {
        $("#thamso_qltk").val(data[0].giatri);
      }
    }
  );
}

function load_QR_chuyenkhoan() {
  $("#qr-code").empty();
  $("#title_qr_thanhtoan").html("");

  if ($(".nganquy_chuyenkhoan option:selected").val() == "NH") {
    const sotien = $(".sotien_chuyenkhoan").val().replaceAll(".", "");
    $.post(
      "ajax/banhang/load_QR_chuyenkhoan.php",
      {
        sotien: sotien,
        noidung: ($(".tenkh_chuyenkhoan").val() + " chuyen khoan")
          .trim()
          .normalize("NFD")
          .replace(/[\u0300-\u036f]/g, "")
          .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"))
          .toUpperCase(),
      },
      function (data, textStatus, jqXHR) {
        $("#title_qr_thanhtoan").html("Vui lòng quét mã để thanh toán");
        return new QRCode("qr-code", {
          text: data,
          width: 200,
          height: 200,
          colorDark: "#000",
          colorLight: "#ffff",
          correctLevel: QRCode.CorrectLevel.H,
        });
      }
    );
  }
}

function load_QR_chuyenkhoan_giahan(sotien) {
  $("#qr-code").empty();
  $.post(
    "ajax/donvi/load_QR_chuyenkhoan_giahan.php",
    {
      sotien: sotien,
      noidung: ($(".tenkh_chuyenkhoan").val() + " chuyen khoan")
        .trim()
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "")
        .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"))
        .toUpperCase(),
    },
    function (data, textStatus, jqXHR) {
      return new QRCode("qr-code", {
        text: data,
        width: 200,
        height: 200,
        colorDark: "#000",
        colorLight: "#ffff",
        correctLevel: QRCode.CorrectLevel.H,
      });
    }
  );
}

function load_nhatky_giahan() {
  $.post(
    "ajax/donvi/load_nhatky_giahan.php",
    {
      mshs: "",
      msdv: "",
    },
    function (data, textStatus, jqXHR) {
      $(".list_nhatky_giahan").html(data);
    }
  );
}

function open_giahan() {
  open_modal("form_giahan");
  load_ctkm("");
}

function load_ctkm(query) {
  var dieukien = "";
  const sothang = $("#sonam_add_giahan").val();
  if (query != "") {
    dieukien = " WHERE sonam<='" + sothang + "' ORDER BY sonam desc LIMIT 1";
  }

  $.post(
    "ajax/donvi/load_ctkm.php",
    {
      query: dieukien,
    },
    function (data, textStatus, jqXHR) {
      if (dieukien == "") {
        $("#list_ctkm").html("");
        for (let i = 0; i < data.length; i++) {
          $("#list_ctkm").append(`
          <tr class="text-[#000] item_ctkm" onclick='active_ctkm(this)'>
            <td class="font-thin text-center px-4 py-2">${i + 1}</td>
            <td class="font-thin text-left px-4 py-2">${data[i].tenctkm}</td>
            <td class="font-thin text-right px-4 py-2 ">${
              (data[i].giahopdong * data[i].sonam)
                .toString()
                .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") +
              " / " +
              data[i].sonam +
              " năm"
            }</td>
            <td class="font-thin text-center px-4 py-2">${
              data[i].sothangkm
            }</td>
            <td class="font-thin flex justify-center px-4 py-2 "><img class="min-w-[20] max-w-[20px]" src='vendor/img/check24.png' onclick="chon_ctkm('${
              data[i].giahopdong
            }','${data[i].giahopdong * data[i].sonam}', '${data[i].sonam}','${
            data[i].sothangkm
          }')"></td>
          </tr>
          `);
        }
      } else {
        let thanhtien = data[0].giahopdong * $("#sonam_add_giahan").val();
        $("#dongia_add_giahan").val(
          data[0].giahopdong
            .toString()
            .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
        );
        $("#khuyenmai_add_giahan").val(data[0].sothangkm);
        $("#thanhtien_add_giahan").val(
          thanhtien.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
        );
        load_QR_chuyenkhoan_giahan(thanhtien);
      }
    }
  );
}

function active_ctkm(e) {
  $(".item_ctkm").removeClass("bg-[#dc92d6]");
  $(e).addClass("bg-[#dc92d6]");
}

function chon_ctkm(giatrennam, gia, sonam, sothangkm) {
  $("#dongia_add_giahan").val(
    giatrennam.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#sonam_add_giahan").val(sonam);
  $("#khuyenmai_add_giahan").val(sothangkm);
  $("#thanhtien_add_giahan").val(
    gia.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  load_QR_chuyenkhoan_giahan(gia);
}
function giahan_donvi() {
  const sonam = $("#sonam_add_giahan").val();
  const khuyenmai = $("#khuyenmai_add_giahan").val();
  const thanhtien = $("#thanhtien_add_giahan").val().replaceAll(".", "");
  $.post(
    "ajax/donvi/giahan_donvi.php",
    {
      mshs: "",
      msdv: "",
      sonam: sonam,
      khuyenmai: khuyenmai,
      thanhtien: thanhtien,
    },
    function (data, textStatus, jqXHR) {
      close_modal("form_giahan");
    }
  );
}

function add_dathang_header(soct) {
  $.post(
    "ajax/dathang/add_dathang_header.php",
    { soct: soct },
    function (data, dathen, jqXHR) {
      location.href = `Advise/${soct}`;
    }
  );
}

function new_chat(soct) {
  location.href = `ChatAI/${soct}`;
}

function open_menu() {
  $("#form_menu").removeClass("hidden");
}
function hidden_menu() {
  $("#form_menu").addClass("hidden");
}

function doimatkhau() {
  const matkhaucu = $("#matkhaucu").val();
  const matkhaumoi = $("#matkhaumoi").val();
  if (matkhaumoi == "123") {
    $("#doimatkhau_error").text("Hãy đặt mật khẩu dài hơn");
    $("#doimatkhau_error").addClass("text-[red]");
  } else {
    $.post(
      "ajax/nhanvien/doimatkhau.php",
      { matkhaucu: matkhaucu, matkhaumoi: matkhaumoi },
      function (data, textStatus, jqXHR) {
        if (data == "false") {
          $("#doimatkhau_error").text("Mật khẩu cũ không đúng");
          $("#doimatkhau_error").addClass("text-[red]");
        } else {
          $("#doimatkhau_error").text("Đổi mật khẩu thành công");
          $("#doimatkhau_error").addClass("text-[green]");
          setTimeout(() => {
            close_modal("form_doimatkhau");
          }, 1000);
        }
      }
    );
  }
}

function open_xinphepnghi() {
  open_modal("form_xinnghiphep");
  load_lichsu_ngaynghi("list_thang");
  load_lichsu_ngaynghi("list_chitiet");
}

function xinnghiphep() {
  const tungay = $("#tungay_input_nghiphep").val();
  const denngay = $("#denngay_input_nghiphep").val();
  const lydo = $("#lydo").val();
  $("#error_xinphep").addClass("hidden");

  if (lydo != "") {
    $.post(
      "ajax/nhanvien/xinnghiphep.php",
      { tungay: tungay, denngay: denngay, lydo: lydo },
      function (data, textStatus, jqXHR) {
        load_lichsu_ngaynghi("list_chitiet");
        $("#lydo").val("");
      }
    );
  } else {
    $("#error_xinphep").removeClass("hidden");
  }
}
// function load_soluong_donnghi() {
//   $.post(
//     "ajax/nhanvien/load_duyetnghiphep.php",
//     {},
//     function (data, textStatus, jqXHR) {
//       $(".soluong_donnghi").addClass("hidden");

//       if (data.length > 0) {
//         $(".soluong_donnghi").removeClass("hidden");
//         $(".soluong_thongbao").removeClass("hidden");
//       }
//       $(".soluong_donnghi").html(data.length);
//       const sl_donnghi = $(".soluong_crm").text();
//       const sl_crm = data.length;
//       $(".soluong_thongbao").text(Number(sl_donnghi) + Number(sl_crm));
//     }
//   );
// }

// function load_soluong_crm() {
//   $.post(
//     "ajax/crm/load_thongbao_crm.php",
//     {},
//     function (data, textStatus, jqXHR) {
//       $(".soluong_crm").addClass("hidden");

//       if (data[0].sl > 0) {
//         $(".soluong_crm").removeClass("hidden");
//         $(".soluong_thongbao").removeClass("hidden");
//       }
//       $(".soluong_crm").html(data[0].sl);
//       const sl_donnghi = $(".soluong_donnghi").text();
//       const sl_crm = data[0].sl;
//       $(".soluong_thongbao").text(Number(sl_donnghi) + Number(sl_crm));
//     }
//   );
// }

function list_duyetnghiphep() {
  open_modal("form_duyetnghiphep");
  $.post(
    "ajax/nhanvien/load_duyetnghiphep.php",
    {},
    function (data, textStatus, jqXHR) {
      $("#list_nghiphep").html("");
      for (let i = 0; i < data.length; i++) {
        let canhbao = `<td class=" text-center px-4 py-2 ">${data[i].songay}</td>`;
        if (data[i].note == "1") {
          canhbao = `<td class=" px-4 py-2 ">
          <div class=' flex items-center justify-center'>
          <p class='bg-[red] rounded-full w-7 h-7 text-white text-center'>${data[i].songay}</p>
          </div>
          </td>`;
        }
        $("#list_nghiphep").append(`
        <tr class="active_items item_line border-b border-dashed border-[#ffffff40] !text-black hover:!text-white">
        <td class=" text-center px-4 py-2">${i + 1}</td>
        <td class=" text-left px-4 py-2">${data[i].tennv}</td>
        <td class=" text-center px-4 py-2 max-w-[90px]">${
          data[i].tungay + "</br>" + data[i].denngay
        }</td>
        ${canhbao}
        <td class=" text-left px-4 py-2 ">${data[i].lydo}</td>
        <td class=" text-center px-4 py-2 ">${data[i].danghi}</td>
        <td class=" text-center px-4 py-2 ">
            <div class="flex justify-center items-center gap-3 ">
                <button onclick="open_duyet('${data[i].rowid}', '${
          data[i].tennv
        }')">
                    <img class="min-w-[24px] max-w-[24px] max-h-[24px] min-h-[24px]" src="vendor/img/check24.png" title="Duyệt">
                </button>
                <button onclick="open_khongduyet('${data[i].rowid}', '${
          data[i].tennv
        }')">
                    <img class="min-w-[24px] max-w-[24px] max-h-[24px] min-h-[24px]" src="vendor/img/minus.png" title='Từ chối'>
                </button>
            </div>

        </td>
    </tr>
        `);
      }
    }
  );
}

function open_duyet(rowid, tennv) {
  open_modal("form_duyet");
  $("#tennv_duyet").text(tennv);
  $("#rowid_duyet").val(rowid);
  $("#btn_duyet").removeClass("hidden");
  $("#btn_tuchoi").addClass("hidden");
  $("#title_form_duyet").text("Duyệt nghỉ phép");
}
function open_khongduyet(rowid, tennv) {
  open_modal("form_duyet");
  $("#tennv_duyet").text(tennv);
  $("#rowid_duyet").val(rowid);
  $("#btn_duyet").addClass("hidden");
  $("#btn_tuchoi").removeClass("hidden");
  $("#title_form_duyet").text("Từ chối nghỉ phép");
}

function duyet_nghiphep() {
  const rowid = $("#rowid_duyet").val();
  $.post(
    "ajax/nhanvien/duyet_nghiphep.php",
    { rowid: rowid, loai: "duyet" },
    function (data, textStatus, jqXHR) {
      list_duyetnghiphep();
      close_modal("form_duyet");
    }
  );
}

function tuchoi_nghiphep() {
  const rowid = $("#rowid_duyet").val();

  $.post(
    "ajax/nhanvien/duyet_nghiphep.php",
    { rowid: rowid, loai: "tuchoi" },
    function (data, textStatus, jqXHR) {
      list_duyetnghiphep();
      close_modal("form_duyet");
    }
  );
}

function load_lichsu_ngaynghi(loai) {
  const thang = $("#list_lichsu_thangnghi option:selected").val();
  $.post(
    "ajax/nhanvien/load_lichsu_ngaynghi.php",
    { loai: loai, thang: thang == null ? "" : thang },
    function (data, textStatus, jqXHR) {
      if (loai == "list_thang") {
        $("#list_lichsu_thangnghi").html("");
        for (let i = 0; i < data.length; i++) {
          $("#list_lichsu_thangnghi").append(`
          <option value='${data[i].thang}'>${data[i].ngay}</option>
          `);
        }
      }
      if (loai == "list_chitiet") {
        $("#list_lichsu_chitiet").html("");
        for (let i = 0; i < data.length; i++) {
          let btn_xoa = "";
          if (data[i].trangthai == 0) {
            btn_xoa = `<button onclick="delete_nghiphep('${data[i].rowid}')">
  <img class="min-w-[24px] max-w-[24px] max-h-[24px] min-h-[24px]" src="vendor/img/delete.png" title='Từ chối'>
</button>`;
          }
          if (data[i].trangthai == 1) {
            btn_xoa = `<button>
  <img class="min-w-[24px] max-w-[24px] max-h-[24px] min-h-[24px]" src="vendor/img/checked.png" title='Từ chối'>
</button>`;
          }
          if (data[i].trangthai == 2) {
            btn_xoa = `<button>
  <img class="min-w-[24px] max-w-[24px] max-h-[24px] min-h-[24px]" src="vendor/img/minus.png" title='Từ chối'>
</button>`;
          }

          $("#list_lichsu_chitiet").append(`
          <tr>
          <td class=" px-4 py-2 text-center font-thin">${i + 1}</td>
          <td class=" px-4 py-2 text-start font-thin">${data[i].tungay}</td>
          <td class=" px-4 py-2 text-start font-thin">${data[i].denngay}</td>
          <td class=" px-4 py-2 font-thin text-center">${data[i].songay}</td>
          <td class=" px-4 py-2 font-thin text-center">${btn_xoa}</td>
      </tr>
          `);
        }
      }
    }
  );
}

function delete_nghiphep(rowid) {
  $.post(
    "ajax/nhanvien/delete_nghiphep.php",
    { rowid: rowid },
    function (data, textStatus, jqXHR) {
      load_lichsu_ngaynghi("list_chitiet");
    }
  );
}

function load_phanloai_theophanloai() {
  $.post(
    "ajax/danhmuc/load_phanloai_theophanloai.php",
    { phanloai: "'ycdg','ychd','ycms'" },
    function (data, textStatus, jqXHR) {
      for (let i = 0; i < data.length; i++) {
        $("#list_yeucau").append(`
        <div class='col-span-${
          12 / data.length
        } bg-white max-h-[300px] overflow-y-scroll'>
            <table class="min-w-full bg-[#f7e0ff] rounded-md">
                <thead>
                    <tr class="text-[#a30487]">
                        <th class="px-4 py-2 font-thin">${
                          data[i].tenphanloai
                        }</th>
                        <th class="px-4 font-thin py-2 text-center">...</th>
                    </tr>
                </thead>
                <tbody id='${
                  data[i].phanloai
                }' class="divide-y divide-gray-100 dark:divide-gray-200">
                </tbody>
            </table>
        </div>
          `);
        $.post(
          "ajax/danhmuc/load_danhmuc.php",
          { phanloai: data[i].phanloai },
          function (list, textStatus, jqXHR) {
            for (let a = 0; a < list.length; a++) {
              $("#" + data[i].phanloai).append(`
              <tr>
                <td class='px-4 py-2 font-thin '>${list[a].tenloai}</td>
                <td class='px-4 font-thin py-2 flex justify-center items-center'><input type='checkbox' class='w-[20px] h-[20px]'  name='massage' data-massage='${list[a].tenloai}' value='${list[a].msloai}'></td>
                </tr>
                  `);
            }
          }
        );
      }
    }
  );
}

function load_hanghoa_hethan_vuotdinhmuc(loai) {
  const thamso = $("#thamso_tbhh").val();
  $.post(
    "ajax/hanghoa/load_hanghoa_hethan_vuotdinhmuc.php",
    { loai: loai, thamso: thamso },
    function (data, textStatus, jqXHR) {
      if (data != "") {
        $("#form_hanhoa_hethang_vuotdinhmuc").removeClass("hidden");
      }
      if (loai == "hethan") {
        if (data != "") {
          $("#form_hanghoa_hethan").removeClass("hidden");
        }
        for (let i = 0; i < data.length; i++) {
          $("#list_hanghoa_hethan").append(`
        <tr class="text-black border-b border-dashed border-[#ddd]">
          <td class="font-thin text-center px-4 py-2 ">${i + 1}</td>
          <td class="font-thin text-start px-4 py-2 ">${data[i].tenhh}</td>
          <td class="font-thin text-center px-4 py-2 ">${data[i].handung}</td>
      </tr>
        `);
        }
      }
      if (loai == "vuotdinhmuc") {
        if (data != "") {
          $("#form_hanghoa_vuotdinhmuc").removeClass("hidden");
        }
        for (let i = 0; i < data.length; i++) {
          $("#list_hanghoa_vuotdinhmuc").append(`
          <tr class="text-black border-b border-dashed border-[#ddd]">
            <td class="font-thin text-center px-4 py-2 ">${i + 1}</td>
            <td class="font-thin text-start px-4 py-2 ">${data[i].tenhh}</td>
            <td class="font-thin text-center px-4 py-2 ">${
              data[i].tonkho_tt
            }</td>
            <td class="font-thin text-center px-4 py-2 ">${data[i].toncuoi}</td>
        </tr>
          `);
        }
      }
    }
  );
}

function move_to_list_khachhang() {
  location.href = "Customer/Birthday";
}
