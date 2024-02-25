function load_tinh() {
  $.post(
    "ajax/donvi/load_tinh.php",
    {
      where: "",
      group: "group by tentinh order by tentinh asc",
    },
    function (data, textStatus, jqXHR) {
      $("#list_tinh").html("");
      $("#list_tinh_edit").html("");
      for (let i = 0; i < data.length; i++) {
        $("#list_tinh").append(
          `<option value='${data[i].matinh}'>${data[i].tentinh}</option>`
        );
        $("#list_tinh_edit").append(
          `<option value='${data[i].matinh}'>${data[i].tentinh}</option>`
        );
      }
    }
  );
}

function load_huyen(loai, mahuyen) {
  let tinh = $("#list_tinh option:selected").val();
  if (loai != "add" && mahuyen != "") {
    tinh = loai;
  }
  if (loai == "edit" && mahuyen == "") {
    tinh = $("#list_tinh_edit option:selected").val();
  }
  $.post(
    "ajax/donvi/load_tinh.php",
    {
      where: `where matinh='${tinh}'`,
      group: "group by tenhuyen ",
    },
    function (data, textStatus, jqXHR) {
      $("#list_huyen").html("");
      $("#list_huyen_edit").html("");
      for (let i = 0; i < data.length; i++) {
        $("#list_huyen").append(
          `<option value='${data[i].mahuyen}'>${data[i].tenhuyen}</option>`
        );

        $("#list_huyen_edit").append(
          `<option value='${data[i].mahuyen}'>${data[i].tenhuyen}</option>`
        );
      }
      if (loai != "add" && mahuyen != "") {
        $("#list_huyen_edit").val(mahuyen);
      }
    }
  );
}

function load_xa(loai, maxa) {
  let huyen = $("#list_huyen option:selected").val();
  if (loai != "add" && maxa != "") {
    huyen = loai;
  }
  if (loai == "edit" && maxa == "") {
    huyen = $("#list_huyen_edit option:selected").val();
  }
  $.post(
    "ajax/donvi/load_tinh.php",
    {
      where: `where mahuyen='${huyen}'`,
      group: "group by tenxa ",
    },
    function (data, textStatus, jqXHR) {
      $("#list_xa").html("");
      $("#list_xa_edit").html("");
      for (let i = 0; i < data.length; i++) {
        $("#list_xa").append(
          `<option value='${data[i].maxa}'>${data[i].tenxa}</option>`
        );
        $("#list_xa_edit").append(
          `<option value='${data[i].maxa}'>${data[i].tenxa}</option>`
        );
      }
      if (loai != "add" && maxa != "") {
        $("#list_xa_edit").val(maxa);
      }
    }
  );
}

function load_donvi() {
  const songayhethan = $("#songayhethan").val();
  $.post(
    "ajax/donvi/load_donvi.php",
    { songayhethan: songayhethan },
    function (data, textStatus, jqXHR) {
      $("#list_donvi").html(data);
    }
  );
}
function open_add_hoso_donvi() {
  close_modal("form_add_donvi");
  $("#mshs_add_donvi").val("");
}

function add_donvi() {
  const mshs = $("#mshs_add_donvi").val();
  const tendv = $("#tendv_add").val();
  const sdt = $("#dienthoai_add").val();
  const loaihinh = $("#loaihinh_add option:selected").val();
  const nguoidaidien = $("#nguoidaidien_add").val();
  const sohopdong = $("#sohopdong_add").val();
  const giahopdong = $("#giahopdong_add").val().replace(/[.]/g, "");
  const sothang_km = $("#sothangkm_add").val();
  const donvi_taitro = $("#dvtaitro_add").val();
  const ghichu = $("#ghichu_add").val();
  const diachi = $("#diachi_add").val();
  const sonam = $("#sonam_add").val();
  const sdt_ctv = $("#sdt_ctv_add").val();
  const msxa = $("#list_xa option:selected").val();
  $.post(
    "ajax/donvi/post_donvi.php",
    {
      mshs: mshs,
      tendv: tendv,
      sdt: sdt,
      loaihinh: loaihinh,
      nguoidaidien: nguoidaidien,
      giahopdong: giahopdong,
      sothang_km: sothang_km,
      donvi_taitro: donvi_taitro,
      ghichu: ghichu,
      diachi: diachi,
      msxa: msxa,
      sohopdong: sohopdong,
      sonam: sonam,
      sdt_ctv: sdt_ctv,
      add_or_edit: "1",
      songaygiahan: "",
      dienthoaihotro: "",
    },
    function (data, textStatus, jqXHR) {
      load_donvi();
      close_modal("form_add_donvi");
    }
  );
}

function open_edit_donvi(
  mshs,
  msdv,
  tendv,
  dienthoai,
  loaihinh,
  nguoidaidien,
  diachi,
  msxa,
  dienthoaihotro
) {
  $("#mshs_edit").val(mshs);
  $("#msdv_edit").val(msdv);
  $("#tendv_edit").val(tendv);
  $("#dienthoai_edit").val(dienthoai.replaceAll(".", ""));
  $("#loaihinh_edit").val(loaihinh);
  $("#nguoidaidien_edit").val(nguoidaidien);

  $("#dienthoaihotro_edit").val(dienthoaihotro);
  $("#diachi_edit").val(diachi);
  $.post(
    "ajax/donvi/load_tinh.php",
    {
      where: "where maxa='" + msxa + "'",
      group: "",
    },
    async function (data, textStatus, jqXHR) {
      $("#list_tinh_edit").val(data[0].matinh);
      load_huyen(data[0].matinh, data[0].mahuyen);
      load_xa(data[0].mahuyen, data[0].maxa);
    }
  );
  $("#tendv_edit_title").html(tendv);
  open_modal("form_edit_donvi");
  // load_nhatky_giahan();
}
function donvi_search(e) {
  var input, filter, table, tr, td, i, j, cell;
  input = document.getElementById("search");
  filter = input.value
    .toUpperCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "")
    .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"));
  table = document.getElementById("list_donvi");
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

function edit_donvi() {
  const mshs = $("#mshs_edit").val();
  const msdv = $("#msdv_edit").val();
  const tendv = $("#tendv_edit").val();
  const loaihinh = $("#loaihinh_edit option:selected").val();
  const nguoidaidien = $("#nguoidaidien_edit").val();
  const diachi = $("#diachi_edit").val();
  const sdt_ctv = $("#sdt_ctv_edit").val();
  const dienthoaihotro = $("#dienthoaihotro_edit").val();
  const msxa = $("#list_xa_edit option:selected").val();

  $.post(
    "ajax/donvi/post_donvi.php",
    {
      mshs: mshs,
      msdv: msdv,
      tendv: tendv,
      sdt: "",
      loaihinh: loaihinh,
      nguoidaidien: nguoidaidien,
      giahopdong: "",
      sothang_km: "",
      donvi_taitro: "",
      ghichu: "",
      diachi: diachi,
      msxa: msxa,
      sohopdong: "",
      sonam: "",
      songaygiahan: "",
      dienthoaihotro: dienthoaihotro,
      sdt_ctv: sdt_ctv,
      add_or_edit: "0",
    },
    function (data, textStatus, jqXHR) {
      load_donvi();
      close_modal("form_edit_donvi");
    }
  );
}

function open_form_trangthai(msdv, trangthai, tendv) {
  open_modal("form_edit_trangthai");

  $("#msdv_trangthai_edit").val(msdv);
  $("#tendv_edit_trangthai").html(tendv);
  if (trangthai == 0) {
    $("#list_trangthai").html(`
    <button type="button" onclick="change_trangthai_donvi('${msdv}','1')" class="mt-3 inline-flex w-full justify-center rounded-md bg-orange-400 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[orange]  sm:mt-0 max-w-[100px] sm:w-auto">Khóa</button>
    <button type="button" onclick="change_trangthai_donvi('${msdv}','2')" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px] sm:w-auto">Xóa</button>
    `);
  }
  if (trangthai == 1) {
    $("#list_trangthai").html(`
    <button type="button" onclick="change_trangthai_donvi('${msdv}','0')" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] sm:w-auto">Mở</button>
    <button type="button" onclick="change_trangthai_donvi('${msdv}','2')" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px] sm:w-auto">Xóa</button>
    `);
  }
  if (trangthai == 2) {
    $("#list_trangthai").html(`
    <button type="button" onclick="change_trangthai_donvi('${msdv}','0')" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] sm:w-auto">Mở</button>
    <button type="button" onclick="change_trangthai_donvi('${msdv}','1')" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 px-5 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[red]  sm:mt-0 max-w-[100px] sm:w-auto">Khóa</button>
    `);
  }
}
function change_trangthai_donvi(msdv, loai) {
  $.post(
    "ajax/donvi/set_trangthai.php",
    {
      msdv: msdv,
      trangthai: loai,
    },
    function (data, textStatus, jqXHR) {
      load_donvi();
      close_modal("form_edit_trangthai");
    }
  );
}

function open_add_new_donvi(mshs) {
  open_modal("form_add_donvi");
  $("#mshs_add_donvi").val(mshs);
}

function open_edit_thamso(mshs, msdv, tendv) {
  open_modal("form_edit_thamso");
  load_thamso(mshs, msdv);
  $("#tendv_edit_thamso").html(tendv);
}

function load_thamso(mshs, msdv) {
  $.post(
    "ajax/thamsohethong/load_thamsohethong.php",
    { mshs: mshs, msdv: msdv, msthamso: "" },
    function (data, textStatus, jqXHR) {
      $("#list_thamso").html("");
      for (let i = 0; i < data.length; i++) {
        let img_edit = "";
        let list_bank = "";
        if (data[i].msthamso != "DayExp") {
          img_edit = `<img onclick="show_edit_thamso(this)" src='vendor/img/edit.png'>`;
        }
        if (data[i].msthamso == "BANK_BIN") {
          img_edit = `<img onclick="open_show_list_bank('${data[i].msthamso}','${mshs}','${msdv}')" src='vendor/img/edit.png'>`;
        }
        $("#list_thamso").append(`
        <tr class=" items border-b border-dashed border-[#81808040] hover:bg-[#e1b8fa]" >
        <td class="font-thin text-center px-4 py-2">${i + 1}</td>
        <td class="search_key font-thin text-left px-4 py-2">${
          data[i].tenthamso
        }</td>
        <td class="thamso_old font-thin text-center px-4 py-2">${
          data[i].giatri
        }</td>
        <td class="thamso_edit font-thin text-center px-4 py-2 hidden"><input class='value_edit_thamso' value='${
          data[i].giatri
        }'></td>
        <td class="btn_edit font-thin flex justify-center px-4 py-2">
        ${img_edit}
        </td>
        <td class="btn_save font-thin flex justify-center px-4 py-2 hidden">
        <img onclick="edit_thamso(this,'${
          data[i].msthamso
        }','${mshs}','${msdv}')" src='vendor/img/check24.png'>
        </td>
        </tr>
        `);
      }
    }
  );
}

function open_show_list_bank(msthamso, mshs, msdv) {
  open_modal("form_edit_list_bank");
  load_nganhang();
  $("#msthamso_edit").val(msthamso);
  $("#mshs_edit").val(mshs);
  $("#msdv_edit").val(msdv);
}

function load_nganhang() {
  $.post(
    "ajax/thamsohethong/load_nganhang.php",
    {},
    function (data, textStatus, jqXHR) {
      $("#list_nganhang").html("");
      for (let i = 0; i < data.length; i++) {
        $("#list_nganhang").append(`
      <div onclick="chon_nganhang('${data[i].bin}','${data[i].short_name}')" class='hover:cursor-pointer hover:bg-[#ddd] item_bank grid grid-cols-12 border-b border-[#ddd] gap-5 py-2 items-center'>
          <div class='col-span-2 w-full h-auto'>
          <img src='upload/img_nganhang/${data[i].logo}'>
          </div>
          <div class='col-span-10'>
          <p class='search_key'>${data[i].short_name}</p>
          <p>${data[i].name}</p>
          </div>
      </div>
      `);
      }
    }
  );
}
function find_nganhang() {
  if (typeof timer !== undefined) {
    clearTimeout(this.timer);
  }
  this.timer = setTimeout(a, 500);
  function a() {
    const val_find = $("#find_bank").val();
    if (val_find.length > 2) {
      $("#list_nganhang").removeClass("hidden");
      var input, filter, table, tr, td, i, j, cell;
      filter = val_find
        .toUpperCase()
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "")
        .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"));
      table = document.getElementById("list_nganhang");
      tr = table.getElementsByClassName("item_bank");
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
}

function chon_nganhang(bin, short_name) {
  $("#giatrithamso_edit").val(bin);
  $("#list_nganhang").addClass("hidden");
  $("#find_bank").val(short_name);
}

function show_edit_thamso(e) {
  $(e).parent().parent().find(".thamso_edit").removeClass("hidden");
  $(e).parent().parent().find(".thamso_edit input").addClass("border-b");
  $(e).parent().parent().find(".thamso_old").addClass("hidden");
  $(e).parent().parent().find(".btn_save").removeClass("hidden");
  $(e).parent().parent().find(".btn_edit").addClass("hidden");
}

function edit_thamso_bank() {
  const msthamso = $("#msthamso_edit").val();
  const mshs = $("#mshs_edit").val();
  const msdv = $("#msdv_edit").val();
  const giatri = $("#giatrithamso_edit").val();
  $.post(
    "ajax/thamsohethong/edit_thamsohethong.php",
    { mshs: mshs, msdv: msdv, msthamso: msthamso, giatri: giatri },
    function (data, textStatus, jqXHR) {
      load_thamso(mshs, msdv);
      close_modal("form_edit_list_bank");
    }
  );
}

function edit_thamso(e, msthamso, mshs, msdv) {
  $(e).parent().parent().find(".thamso_edit").addClass("hidden");
  $(e).parent().parent().find(".thamso_edit input").removeClass("border-b");
  $(e).parent().parent().find(".thamso_old").removeClass("hidden");
  $(e).parent().parent().find(".btn_save").addClass("hidden");
  $(e).parent().parent().find(".btn_edit").removeClass("hidden");

  const giatri = $(e).parent().parent().find(".thamso_edit input").val();
  $.post(
    "ajax/thamsohethong/edit_thamsohethong.php",
    { mshs: mshs, msdv: msdv, msthamso: msthamso, giatri: giatri },
    function (data, textStatus, jqXHR) {
      load_thamso(mshs, msdv);
    }
  );
}

function open_giahan(mshs, msdv, tendv) {
  open_modal("form_giahan");
  $("#mshs_dv_giahan").val(mshs);
  $("#msdv_dv_giahan").val(msdv);
  $("#tendv_giahan").html(tendv);
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
        $("#dongia_add_giahan").val(
          data[0].giahopdong
            .toString()
            .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
        );
        $("#khuyenmai_add_giahan").val(data[0].sothangkm);
        $("#thanhtien_add_giahan").val(
          (data[0].giahopdong * $("#sonam_add_giahan").val())
            .toString()
            .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
        );
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
}

function giahan_donvi() {
  const mshs = $("#mshs_dv_giahan").val();
  const msdv = $("#msdv_dv_giahan").val();
  const sonam = $("#sonam_add_giahan").val();
  const khuyenmai = $("#khuyenmai_add_giahan").val();
  const thanhtien = $("#thanhtien_add_giahan").val().replaceAll(".", "");
  $.post(
    "ajax/donvi/giahan_donvi.php",
    {
      mshs: mshs,
      msdv: msdv,
      sonam: sonam,
      khuyenmai: khuyenmai,
      thanhtien: thanhtien,
    },
    function (data, textStatus, jqXHR) {
      close_modal("form_giahan");
    }
  );
}

function load_nhatky_giahan() {
  const mshs = $("#mshs_edit").val();
  const msdv = $("#msdv_edit").val();
  $.post(
    "ajax/donvi/load_nhatky_giahan.php",
    {
      mshs: mshs,
      msdv: msdv,
    },
    function (data, textStatus, jqXHR) {
      $("#list_nhatky_giahan").html(data);
    }
  );
}

function open_xacnhan(mshs, msdv, tendv) {
  open_modal("form_xacnhan_giahan");
  $("#mshs_xacnhan_giahan").val(mshs);
  $("#msdv_xacnhan_giahan").val(msdv);
  $("#tendv_xacnhan_chuyenkhoan").html(tendv);
}

function xacnhan_giahan() {
  const mshs = $("#mshs_xacnhan_giahan").val();
  const msdv = $("#msdv_xacnhan_giahan").val();
  $.post(
    "ajax/donvi/xacnhan_giahan.php",
    {
      mshs: mshs,
      msdv: msdv,
    },
    function (data, textStatus, jqXHR) {
      load_donvi();
      close_modal("form_xacnhan_giahan");
    }
  );
}

function open_login_donvi(mshs, msdv, tendv) {
  open_modal("form_login");
  $("#mshs_login").val(mshs);
  $("#msdv_login").val(msdv);
  $("#tendonvi_login").text(tendv);
}

function login_donvi() {
  const mshs = $("#mshs_login").val();
  const msdv = $("#msdv_login").val();
  $.post(
    "ajax/donvi/login_donvi.php",
    {
      mshs: mshs,
      msdv: msdv,
    },
    function (data) {
      location.replace("index.html");
    }
  );
}
