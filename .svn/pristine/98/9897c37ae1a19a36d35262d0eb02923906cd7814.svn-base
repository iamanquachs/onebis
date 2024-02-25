var all_path_image = [];

function anhhanghoa(input) {
  const soluong = $(input)[0].files.length;
  $("#list_img_hanghoa").removeClass("hidden");
  for (let i = 0; i < soluong; i++) {
    let id = "id" + Math.floor(1000 + Math.random() * 9000);
    const img_hanghoa = "img_hanghoa" + Math.floor(1000 + Math.random() * 9000);
    $("#list_img_hanghoa").append(`
      <div class='w-[80px] relative' >
      <img id="${img_hanghoa}" class="w-[80px] item_img">
      <img onclick="delete_img_addform(this, '${id}')" class='absolute z-[100] top-[-5px] right-[-5px] w-[20px]' src='vendor/img/delete.png'>
      </div>`);
    $("#" + img_hanghoa)[0].src = (
      window.URL ? URL : webkitURL
    ).createObjectURL(input.files[i]);
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

function videodichvu(input) {
  var media = URL.createObjectURL(input.files[0]);
  var video = document.getElementById("video_path");
  video.src = media;
  video.style.display = "block";
  $("#list_video_dichvu").removeClass("hidden");
}

function delete_img_editform(e, vitri) {
  $(e).parent().remove();
  var file_img = [];
  for (let i = 0; i < all_path_image.length; i++) {
    if (all_path_image[i]["id"] != vitri) {
      file_img.push(all_path_image[i]);
    }
  }
  all_path_image = file_img;
}

function videodichvu_edit(input) {
  $("#list_video_dichvu_edit").html("");
  $("#list_video_dichvu_edit").html(
    `<div class='relative'>
    <video id="video_path_edit" width="320" height="240" src="" controls ></video>
    <img onclick="delete_form_video()" class='absolute z-[100] top-[-5px] right-[-5px] w-[20px]' src='vendor/img/delete.png'>
      </div>`
  );
  var media = URL.createObjectURL(input.files[0]);
  var video = document.getElementById("video_path_edit");
  video.src = media;
  video.style.display = "block";
}
function delete_form_video() {
  $("#list_video_dichvu_edit").html("");
  $("#videodichvu_edit").val("");
}

function load_hanghoa() {
  const nhom = $("#nhom_filter").val();
  const loai = $("#loai_filter").val();
  const hang = $("#hang_filter").val();
  $.post(
    "ajax/hanghoa/load_hanghoa.php",
    {
      nhom: nhom,
      loai: loai,
      hang: hang,
    },
    function (data, textStatus, jqXHR) {
      $("#list_hanghoa").html(data);
    }
  );
}

function search_hanghoa(e) {
  var input, filter, table, tr, td, i, j, cell;
  input = document.getElementById("search");
  filter = input.value
    .toUpperCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "")
    .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"));
  table = document.getElementById("list_hanghoa");
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

function add_hanghoa() {
  var form_data = new FormData();
  $("#error_add_hanghoa").addClass("hidden");

  const trangthai = $("#trangthai_add").is(":checked");
  const tenhh = $("#tenhanghoa_add").val();
  const giaban = $("#giaban_add").val().replace(/[.]/g, "");
  const dvt = $("#list_dvt_add option:selected");
  const dvt_quydoi = $("#list_dvt_nhonhat_add option:selected");
  const loai_hh = $("#list_loaihh_add option:selected").val();
  const nhom = $("#list_nhom_add option:selected").val();
  const hangsx = $("#list_hangsx_add option:selected").val();
  form_data.append("tenhanghoa", tenhh);
  form_data.append("giaban", giaban);
  form_data.append("thuesuat", $("#thuesuat_add").val());
  form_data.append("sothang_khauhao", $("#sothangkhauhao_add").val());
  form_data.append("mavach", $("#mavach_add").val());
  form_data.append("mshhncc", $("#mshhncc_add").val());
  form_data.append("pttichluy", $("#pttichluy_add").val());
  form_data.append("ptthuchien", $("#ptthuchien_add").val());
  form_data.append("trangthai", trangthai == true ? "0" : "1");
  form_data.append("loai_hh", loai_hh);
  form_data.append("nhom", nhom);
  form_data.append("hangsx", hangsx);
  form_data.append("dvt", dvt.text());
  form_data.append(
    "dvt_quydoi",
    dvt_quydoi.val() != "" ? dvt_quydoi.text() : ""
  );
  form_data.append("quycach", $("#quycach_add").val());
  form_data.append(
    "soluong_quydoi",
    $("#soluong_nhonhat_add").val().replace(/[.]/g, "")
  );
  form_data.append("tonkho_tt", $("#tonkho_tt_add").val());
  form_data.append("file_image_length", all_path_image.length);
  for (let i = 0; i < all_path_image.length; i++) {
    form_data.append(`file_image${i}`, all_path_image[i]);
  }
  form_data.append(
    "mota_hanghoa",
    CKEDITOR.instances["mota_hanghoa_add"].getData()
  );
  if (
    tenhh != "" ||
    dvt.val() != "" ||
    loai_hh != "" ||
    nhom != "" ||
    hangsx != "" ||
    giaban != ""
  ) {
    $.ajax({
      type: "POST",
      url: "ajax/hanghoa/add_hanghoa.php",
      data: form_data,
      contentType: false,
      processData: false,
      headers: {
        "X-CSRF-Token": $("meta[name='csrf-token']").attr("content"),
      },
      success: function (response) {
        $("#mavach_add").val("");
        $("#mshhncc_add").val("");
        $("#tenhanghoa_add").val("");
        $("#gianhap_add").val("0");
        $("#giaban_add").val("0");
        $("#thuesuat_add").val("0");
        $("#pttichluy_add").val("0");
        $("#ptthuchien_add").val(0);
        $("#list_loaihh_add").val("");
        $("#list_nhom_add").val("");
        $("#list_hangsx_add").val("");
        $("#list_dvt_add").val("");
        $("#quycach_add").val("");
        $("#tonkho_tt_add").val("");
        $("#mota_hanghoa_add").val("");
        $("#anhhanghoa_add").val("");
        $("#sothangkhauhao_add").val("0");
        $("#list_dvt_nhonhat_add").val("");
        $("#soluong_nhonhat_add").val("0");
        all_path_image = [];
        $("#form_add_hanghoa").addClass("hidden");
        load_hanghoa();
      },
    });
  } else {
    $("#error_add_hanghoa").removeClass("hidden");
  }
}

function open_edit_hanghoa(
  e,
  mshh,
  tenhh,
  loai_hh,
  dvt,
  mshangsx,
  quycach,
  gianhap,
  giaban,
  thuesuat,
  nhom,
  pttichluy,
  ptthuchien,
  path_image,
  trangthai,
  tonkho_tt,
  dvt_quydoi,
  soluong_quydoi,
  mavach,
  mshhncc,
  thoihan_khauhao
) {
  open_modal("form_edit_hanghoa");
  $("#mshh_edit").val(mshh);
  $("#mavach_edit").val(mavach);
  $("#mshhncc_edit").val(mshhncc);
  $("#tenhanghoa_edit").val(tenhh);
  $("#giaban_edit").val(giaban);
  $("#thuesuat_edit").val(thuesuat);
  $("#pttichluy_edit").val(pttichluy);
  $("#ptthuchien_edit").val(ptthuchien);
  $("#sothangkhauhao_edit").val(thoihan_khauhao);
  $("#list_loaihh_edit").val(loai_hh);
  $("#list_nhom_edit").val(nhom);
  $("#list_hangsx_edit").val(mshangsx);
  $("#list_dvt_edit").val(dvt);
  $("#quycach_edit").val(quycach);
  $("#list_dvt_nhonhat_edit").val(dvt_quydoi);
  $("#soluong_nhonhat_edit").val(soluong_quydoi);
  $("#tonkho_tt_edit").val(tonkho_tt);
  CKEDITOR.instances.mota_hanghoa_edit.setData(
    $(e).parent().parent().find(".mota_td").text()
  );
  if (trangthai == "0") {
    document.getElementById("trangthai_edit").checked = true;
  } else {
    document.getElementById("trangthai_edit").checked = false;
  }
  load_image(mshh);
  change_title_soluong_quydoi();
}

function load_image(mshh) {
  $("#list_img_hanghoa_edit").html("");
  $.post(
    "ajax/hanghoa/image/load_image.php",
    { mshh: mshh },
    function (data, textStatus, jqXHR) {
      const list_img = data[0].path_image.split("|");
      for (let i = 0; i < list_img.length; i++) {
        if (list_img[i] != "") {
          $("#list_img_hanghoa_edit").append(
            ` <div class='w-[80px] relative' >
        <img src="upload/anhhanghoa/${data[0].mshs}/${list_img[i]}" class="w-[80px] item_img">
        <img onclick="delete_image('${mshh}','${list_img[i]}', '${data[0].path_image}')" class='absolute z-[100] top-[-5px] right-[-5px] w-[20px]' src='vendor/img/delete.png'>
        </div>`
          );
        }
      }
    }
  );
}

function add_image(e) {
  var form_data = new FormData();
  form_data.append("mshh", $("#mshh_edit").val());
  form_data.append("file_image_length", $(e)[0].files.length);

  for (let i = 0; i < $(e)[0].files.length; i++) {
    form_data.append(`file_image_edit${i}`, $(e)[0].files[i]);
  }
  $.ajax({
    type: "POST",
    url: "ajax/hanghoa/image/add_image.php",
    data: form_data,
    contentType: false,
    processData: false,
    headers: {
      "X-CSRF-Token": $("meta[name='csrf-token']").attr("content"),
    },
    success: function (response) {
      load_image(`${$("#mshh_edit").val()}`);
    },
  });
}
function delete_image(mshh, path_image, out_path_image) {
  $.post(
    "ajax/hanghoa/image/delete_image.php",
    {
      mshh: mshh,
      path_image: path_image,
      out_path_image: out_path_image,
    },
    function (data, textStatus, jqXHR) {
      load_image(mshh);
    }
  );
}

function edit_hanghoa() {
  var form_data = new FormData();
  const trangthai = $("#trangthai_edit").is(":checked");
  const tenhh = $("#tenhanghoa_edit").val();
  const giaban = $("#giaban_edit").val().replace(/[.]/g, "");
  const dvt = $("#list_dvt_edit option:selected");
  const dvt_quydoi = $("#list_dvt_nhonhat_edit option:selected");
  const loai_hh = $("#list_loaihh_edit option:selected").val();
  const nhom = $("#list_nhom_edit option:selected").val();
  const hangsx = $("#list_hangsx_edit option:selected").val();
  $("#error_add_hanghoa").addClass("hidden");

  form_data.append("mshh", $("#mshh_edit").val());
  form_data.append("tenhanghoa", tenhh);
  form_data.append("giaban", giaban);
  form_data.append("thuesuat", $("#thuesuat_edit").val());
  form_data.append("mavach", $("#mavach_edit").val());
  form_data.append("mshhncc", $("#mshhncc_edit").val());
  form_data.append("sothang_khauhao", $("#sothangkhauhao_edit").val());
  form_data.append("pttichluy", $("#pttichluy_edit").val());
  form_data.append("ptthuchien", $("#ptthuchien_edit").val());
  form_data.append("quycach", $("#quycach_edit").val());
  form_data.append(
    "soluong_quydoi",
    $("#soluong_nhonhat_edit").val().replace(/[.]/g, "")
  );
  form_data.append("tonkho_tt", $("#tonkho_tt_edit").val());
  form_data.append("trangthai", trangthai == true ? "0" : "1");
  form_data.append("loai_hh", loai_hh);
  form_data.append("nhom", nhom);
  form_data.append("nhacc", $("#list_ncc_edit option:selected").val());
  form_data.append("hangsx", hangsx);
  form_data.append("dvt", dvt.text());
  form_data.append(
    "dvt_quydoi",
    dvt_quydoi.val() != "" ? dvt_quydoi.text() : ""
  );
  form_data.append(
    "mota_hanghoa",
    CKEDITOR.instances["mota_hanghoa_edit"].getData()
  );
  if (
    tenhh != "" ||
    dvt.val() != "" ||
    loai_hh != "" ||
    nhom != "" ||
    hangsx != "" ||
    giaban != ""
  ) {
    $.ajax({
      type: "POST",
      url: "ajax/hanghoa/edit_hanghoa.php",
      data: form_data,
      contentType: false,
      processData: false,
      headers: {
        "X-CSRF-Token": $("meta[name='csrf-token']").attr("content"),
      },
      success: function (response) {
        $("#mshh_edit").val("");
        $("#tenhanghoa_edit").val("");
        $("#giaban_edit").val("");
        $("#thuesuat_edit").val("");
        $("#pttichluy_edit").val("");
        $("#ptthuchien_edit").val("");
        $("#mavach_edit").val("");
        $("#mshhncc_edit").val("");
        $("#list_loaihh_edit").val("");
        $("#list_nhom_edit").val("");
        $("#list_ncc_edit").val("");
        $("#list_hangsx_edit").val("");
        $("#list_dvt_edit").val("");
        $("#quycach_edit").val("");
        $("#tonkho_tt_edit").val("");
        $("#mota_hanghoa_edit").val("");
        $("#form_edit_hanghoa").addClass("hidden");
        load_hanghoa();
      },
    });
  } else {
    $("#error_add_hanghoa").removeClass("hidden");
  }
}

function load_danhmuc(e, type_list) {
  const item = "#" + type_list;
  let tenmuc = "";
  let filter = "";
  if (e == "loai_hh") {
    tenmuc = "loại hàng hóa";
    filter = "#loai_filter";
  }
  if (e == "nhom") {
    tenmuc = "nhóm";
    filter = "#nhom_filter";
  }
  if (e == "nhacc") {
    tenmuc = "nhà cung cấp";
    filter = "";
  }
  if (e == "hangsx") {
    tenmuc = "hãng";
    filter = "#hang_filter";
  }
  if (e == "dvt") {
    tenmuc = "đơn vị tính";
    filter = "";
  }

  $(item).html("");
  $.post(
    "ajax/danhmuc/load_danhmuc.php",
    {
      phanloai: e,
    },
    function (data, textStatus, jqXHR) {
      $(filter).html("");

      $(item).append(`
        <option value="">Chọn ${tenmuc}</option>
        `);
      $(filter).append(`
        <option class='text-[#747474]' value="">Chọn ${tenmuc}</option>
        `);
      for (let i = 0; i < data.length; i++) {
        if (e != "dvt") {
          $(item).append(
            `<option class='text-black' value="${data[i].msloai}">${data[i].tenloai}</option>`
          );
        } else {
          $(item).append(
            `<option class='text-black' value="${data[i].tenloai}">${data[i].tenloai}</option>`
          );
        }
        $(filter).append(
          `<option class='text-black' value="${data[i].msloai}">${data[i].tenloai}</option>`
        );
      }
    }
  );
}
function add_danhmuc(type, type_list, input, tenphanloai, id_danhmuc) {
  const tendanhmuc = $("#" + input).val();
  if (tendanhmuc != "") {
    $.post(
      "ajax/danhmuc/add_danhmuc.php",
      {
        tendanhmuc: tendanhmuc,
        phanloai: type,
        tenphanloai: tenphanloai,
        loai: "0",
        id_danhmuc: id_danhmuc,
      },
      function (data, textStatus, jqXHR) {
        $(".icon_remove").addClass("hidden");
        $(".icon_add").removeClass("hidden");
        $(".__show").addClass("hidden");
        $("#" + type_list).html("");
        if (type == "dvt") {
          load_danhmuc("dvt", "list_dvt_add");
          load_danhmuc("dvt", "list_dvt_edit");
          load_danhmuc("dvt", "list_dvt_nhonhat_add");
          load_danhmuc("dvt", "list_dvt_nhonhat_edit");
        } else {
          load_danhmuc(type, type_list);
        }
      }
    );
  }
}

function open_delete_hanghoa(mshh, tenhh, list_img) {
  open_modal("form_delete_hanghoa");
  $("#tenhh_delele").html(tenhh);
  $("#mshh_delete").val(mshh);
  $("#list_img_delete").val(list_img);
}
function delete_hanghoa() {
  const mshh = $("#mshh_delete").val();
  const list_img = $("#list_img_delete").val();
  $.post(
    "ajax/hanghoa/delete_hanghoa.php",
    { mshh: mshh, list_img: list_img },
    function (data, textStatus, jqXHR) {
      close_modal("form_delete_hanghoa");
      load_hanghoa();
    }
  );
}

function change_title_soluong_quydoi() {
  const dvt_quydoi_edit = $("#list_dvt_nhonhat_edit option:selected").text();
  const dvt_edit = $("#list_dvt_edit option:selected").text();
  $("#title_soluong_quydoi_edit").text(dvt_quydoi_edit + "/" + dvt_edit);
  const dvt_quydoi_add = $("#list_dvt_nhonhat_add option:selected").text();
  const dvt_add = $("#list_dvt_add option:selected").text();
  $("#title_soluong_quydoi_add").text(dvt_quydoi_add + "/" + dvt_add);
}
