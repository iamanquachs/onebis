function edit_landing_page() {
  const text_tieude = $("#text_tieude").val();
  const text_lydo1 = $("#text_lydo1").val();
  const text_lydo2 = $("#text_lydo2").val();
  const text_lydo3 = $("#text_lydo3").val();
  const img_avt_cu = $("#img_avt_cu").val();
  const list_img_donvi_cu = $("#list_img_donvi_cu").val();
  const img_avt_edit = $("#anh_avt_edit")[0].files[0];
  const input_edit_img_donvi_1 = $("#input_edit_img_donvi_1")[0].files[0];
  const input_edit_img_donvi_2 = $("#input_edit_img_donvi_2")[0].files[0];
  const input_edit_img_donvi_3 = $("#input_edit_img_donvi_3")[0].files[0];
  var form_data = new FormData();
  form_data.append("text_tieude", text_tieude);
  form_data.append(
    "text_noidung",
    CKEDITOR.instances["text_noidung"].getData()
  );
  form_data.append("text_lydo1", text_lydo1);
  form_data.append("text_lydo2", text_lydo2);
  form_data.append("text_lydo3", text_lydo3);
  form_data.append("anh_avt_edit", img_avt_edit);
  form_data.append("img_avt_cu", img_avt_cu);
  form_data.append("list_img_donvi_cu", list_img_donvi_cu);
  form_data.append("input_edit_img_donvi_1", input_edit_img_donvi_1);
  form_data.append("input_edit_img_donvi_2", input_edit_img_donvi_2);
  form_data.append("input_edit_img_donvi_3", input_edit_img_donvi_3);
  $.ajax({
    type: "POST",
    url: "ajax/landing_page/edit_landing_page.php",
    data: form_data,
    contentType: false,
    processData: false,
    headers: {
      "X-CSRF-Token": $("meta[name='csrf-token']").attr("content"),
    },
    success: function (response) {
      location.href = "ManageLandingPage/Review";
    },
  });
}

function _edit_avt(input) {
  const soluong = $(input)[0].files.length;
  for (let i = 0; i < soluong; i++) {
    $("#img_avt")[0].src = (window.URL ? URL : webkitURL).createObjectURL(
      input.files[i]
    );
  }
}

function _edit_img_donvi(input, vitri) {
  const soluong = $(input)[0].files.length;
  for (let i = 0; i < soluong; i++) {
    $("#anh_donvi_" + vitri)[0].src = (
      window.URL ? URL : webkitURL
    ).createObjectURL(input.files[i]);
  }
}

function send_yeucau(r) {
  const sodienthoai = $("#sodienthoai_yeucau").val();
  const hoten = $("#hoten_yeucau").val();
  const noidung = $("#noidung_yeucau").val();
  const email = $("#thamso_email").val();
  if (sodienthoai != "" && hoten != "") {
    $.post(
      "ajax/landing_page/send_yeucau.php",
      {
        sodienthoai: sodienthoai,
        hoten: hoten,
        noidung: noidung,
        email: email,
        rowid: r,
      },
      function (data, textStatus, jqXHR) {
        open_modal("form_send_yeucau_thanhcong");
        $("#sodienthoai_yeucau").val("");
        $("#hoten_yeucau").val("");
        $("#noidung_yeucau").val("");
      }
    );
  } else {
    $("#error_send_yeucau").removeClass("hidden");
  }
}

function load_goiy() {
  $("#list_goiy").html("");
  $.post(
    "ajax/landing_page/edit_goiy.php",
    { goiy: "", loai: "load" },
    function (data, textStatus, jqXHR) {
      const goiy = data[0].goiy.split("|");

      for (let i = 0; i < goiy.length; i++) {
        if (goiy[i] != "") {
          $("#list_goiy").append(`
       <div class="relative">
       <p onclick="chon_goiy('${goiy[i]}')" class='border border-[#64646440] rounded-full px-3 py-2 text-black hover:cursor-pointer hover:text-white hover:bg-[#693b85]'>${goiy[i]}</p>
       <span onclick="delete_goiy('${data[0].goiy}', '${goiy[i]}')" class=" absolute top-[-10px] right-[-10px]"><img src='vendor/img/delete.png'></span>
   </div>
       `);
        }
      }
      $("#list_goiy").append(`
      <span onclick="open_modal('form_add_goiy')"><img src='vendor/img/add.png'></span>
       `);
    }
  );
}

function chon_goiy(goiy) {
  $("#noidung_yeucau").val(goiy);
}

function ktra_kytu_noidung(e) {
  $(e)
    .parent()
    .parent()
    .find(".soluong_kytu")
    .text($(e).val().length + "/45");
}

function open_phathanh() {
  open_modal("form_phathanh_landing_page");
}

function add_goiy() {
  const goiy = $("#goiy_add").val();
  $.post(
    "ajax/landing_page/edit_goiy.php",
    { goiy: goiy, loai: "add" },
    function (data, textStatus, jqXHR) {
      close_modal("form_add_goiy");
      load_goiy();
      $("#goiy_add").val("");
    }
  );
}

function delete_goiy(goiy_cu, goiy_delete) {
  let list_goiy_cu = goiy_cu.split("|");
  var list_goiy_moi = "";
  for (let i = 0; i < list_goiy_cu.length; i++) {
    if (list_goiy_cu[i] != goiy_delete) {
      list_goiy_moi += list_goiy_cu[i] + "|";
    }
  }
  $.post(
    "ajax/landing_page/edit_goiy.php",
    { goiy: list_goiy_moi, loai: "delete" },
    function (data, textStatus, jqXHR) {
      load_goiy();
    }
  );
}
