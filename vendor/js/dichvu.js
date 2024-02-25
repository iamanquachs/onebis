var all_path_image = [];

function anhdichvu(input) {
  const soluong = $(input)[0].files.length;
  $("#list_img_dichvu").removeClass("hidden");
  for (let i = 0; i < soluong; i++) {
    let id = "id" + Math.floor(1000 + Math.random() * 9000);
    const img_dichvu = "img_dichvu" + Math.floor(1000 + Math.random() * 9000);
    $("#list_img_dichvu").append(`
      <div class='w-[80px] relative' >
      <img id="${img_dichvu}" class="w-[80px] item_img">
      <img onclick="delete_img_addform(this, '${id}')" class='absolute z-[100] top-[-5px] right-[-5px] w-[20px]' src='vendor/img/delete.png'>
      </div>`);
    $("#" + img_dichvu)[0].src = (window.URL ? URL : webkitURL).createObjectURL(
      input.files[i]
    );
    all_path_image.push($(input)[0].files[i]);
    Object.assign($(input)[0].files[i], { id: id });
  }
}
function anh_goidichvu(input) {
  const soluong = $(input)[0].files.length;
  $("#list_img_goidichvu").removeClass("hidden");
  for (let i = 0; i < soluong; i++) {
    let id = "id" + Math.floor(1000 + Math.random() * 9000);
    const img_dichvu = "img_dichvu" + Math.floor(1000 + Math.random() * 9000);
    $("#list_img_goidichvu").append(`
      <div class='w-[80px] relative' >
      <img id="${img_dichvu}" class="w-[80px] item_img">
      <img onclick="delete_img_addform(this, '${id}')" class='absolute z-[100] top-[-5px] right-[-5px] w-[20px]' src='vendor/img/delete.png'>
      </div>`);
    $("#" + img_dichvu)[0].src = (window.URL ? URL : webkitURL).createObjectURL(
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

function videodichvu(input) {
  var media = URL.createObjectURL(input.files[0]);
  var video = document.getElementById("video_path");
  video.src = media;
  video.style.display = "block";
  $("#list_video_dichvu").removeClass("hidden");
}
function video_goidichvu(input) {
  var media = URL.createObjectURL(input.files[0]);
  var video = document.getElementById("video_goidichvu_path");
  video.src = media;
  video.style.display = "block";
  $("#list_video_goidichvu").removeClass("hidden");
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

function load_dichvu() {
  const danhmuc = $("#list_danhmuc_filter option:selected").val();
  const loai = $("#list_loai_filter option:selected").val();
  $.post(
    "ajax/dichvu/load_dichvu.php",
    {
      danhmuc: danhmuc == undefined ? "" : danhmuc,
      loai: loai,
    },
    function (data, textStatus, jqXHR) {
      $("#list_dichvu").html(data);
      $("#error_themdichvu").addClass("hidden");
      hien_pttichluy();
      dichvu_search();
    }
  );
}
function dichvu_search() {
  var input, filter, table, tr, td, i, j, cell;
  input = document.getElementById("search");
  filter = input.value
    .toUpperCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "")
    .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"));
  table = document.getElementById("list_dichvu");
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

function add_goidichvu() {
  var form_data = new FormData();
  var path_video = $("#video_goidichvu_add")[0].files[0];
  const trangthai = $("#trangthai_add").is(":checked");
  const tendichvu = $("#tendichvu_goidichvu_add").val();
  const msdichvu = $("#msdichvu_goidichvu").val();
  const nhom = $("#list_danhmuc_add_goidichvu option:selected").val();

  form_data.append("tendichvu", tendichvu);
  form_data.append("msdichvu", msdichvu);
  form_data.append(
    "sotien",
    $("#sotien_goidichvu_add").val().replaceAll(".", "")
  );
  form_data.append("giavon", 0);
  form_data.append("thoigian", 0);
  form_data.append("pttichluy", 0);
  form_data.append("ptthuchien", 0);
  form_data.append("ngaybaohanh", 0);
  form_data.append("thuesuat", 0);
  form_data.append("trangthai", trangthai == true ? "0" : "1");
  form_data.append("lieutrinh", 2);
  form_data.append("nhom", nhom);
  form_data.append("file_image_length", all_path_image.length);
  for (let i = 0; i < all_path_image.length; i++) {
    form_data.append(`file_image${i}`, all_path_image[i]);
  }
  form_data.append("file_video", path_video);
  form_data.append(
    "mota_dichvu",
    CKEDITOR.instances["mota_goidichvu_add"].getData()
  );
  if (tendichvu != "" && nhom != "") {
    $.ajax({
      type: "POST",
      url: "ajax/dichvu/add_dichvu.php",
      data: form_data,
      contentType: false,
      processData: false,
      headers: {
        "X-CSRF-Token": $("meta[name='csrf-token']").attr("content"),
      },
      success: function (response) {
        close_modal("form_add_goi_dichvu");
        $("#tendichvu_goidichvu_add").val("");
        $("#msdichvu_goidichvu").val("");
        $("#list_danhmuc_add_goidichvu").val("");
        all_path_image = [];
        load_dichvu();
      },
    });
  } else {
    $("#error_goidichvu").removeClass("hidden");
  }
}

function add_dichvu() {
  var form_data = new FormData();
  var path_video = $("#videodichvu_add")[0].files[0];
  const trangthai = $("#trangthai_add").is(":checked");
  const tendichvu = $("#tendichvu_add").val();
  const thoigian = $("#thoigian_add").val();
  const pttichluy = $("#pttichluy_add").val();
  const ptthuchien = $("#ptthuchien_add").val();
  const giavon = $("#giavon_add").val();
  const ngaybaohanh = $("#ngaybaohanh_add").val();
  const thuesuat = $("#thuesuat_add").val();
  const nhom = $("#list_danhmuc_add option:selected").val();
  const lieutrinh = $("#lieutrinh_add").is(":checked");
  const sotien = $("#sotien_add").val().replaceAll(".", "");
  form_data.append("tendichvu", tendichvu);
  form_data.append("msdichv", "");
  form_data.append("sotien", sotien);
  form_data.append("giavon", giavon.replaceAll(".", ""));
  form_data.append("thoigian", thoigian);
  form_data.append("pttichluy", lieutrinh == true ? 0 : pttichluy);
  form_data.append("ptthuchien", ptthuchien);
  form_data.append("ngaybaohanh", ngaybaohanh);
  form_data.append("thuesuat", thuesuat);
  form_data.append("trangthai", trangthai == true ? "0" : "1");
  form_data.append("lieutrinh", lieutrinh == true ? "1" : "0");
  form_data.append("nhom", nhom);
  form_data.append("file_image_length", all_path_image.length);
  for (let i = 0; i < all_path_image.length; i++) {
    form_data.append(`file_image${i}`, all_path_image[i]);
  }
  form_data.append("file_video", path_video);
  form_data.append(
    "mota_dichvu",
    CKEDITOR.instances["mota_dichvu_add"].getData()
  );
  if (tendichvu != "" && thoigian != "" && pttichluy != "" && nhom != "") {
    $.ajax({
      type: "POST",
      url: "ajax/dichvu/add_dichvu.php",
      data: form_data,
      contentType: false,
      processData: false,
      headers: {
        "X-CSRF-Token": $("meta[name='csrf-token']").attr("content"),
      },
      success: function (response) {
        $("#tendichvu_add").val("");
        $("#sotien_add").val("0");
        $("#giavon_add").val("0");
        $("#ngaybaohanh_add").val("0");
        $("#thoigian_add").val("0");
        $("#pttichluy_add").val("0");
        $("#ptthuchien_add").val(0);
        $("#thuesuat_add").val("0");
        $("#list_danhmuc").val("");
        $("#mota_dichvu").val("");
        $("#list_img_dichvu").val("");
        document.getElementById("lieutrinh_add").checked = false;
        all_path_image = [];
        $("#form_add_dichvu").addClass("hidden");
        load_dichvu();
      },
    });
  } else {
    $("#error_themdichvu").removeClass("hidden");
  }
}

function open_add_dichvu() {
  open_modal("form_add_dichvu");
  $("#error_add_danhmuc").addClass("hidden");
}

function open_add_goidichvu() {
  open_modal("form_add_goi_dichvu");
  $("#title_modal").text("Thêm gói dịch vụ");
  $("#btn_edit_goidichvu").addClass("hidden");
  $("#form_hanghoa_goidichvu").addClass("hidden");
  $("#btn_add_goidichvu").removeClass("hidden");
  $("#form_add_anh_goidichvu").removeClass("hidden");
  $("#form_edit_anh_goidichvu").addClass("hidden");
  $("#tendichvu_goidichvu_add").val("");
  $("#msdichvu_goidichvu").val("");
  $("#list_danhmuc_add_goidichvu").val("");
  $("#tenhanghoa_add_goidichvu").val("");
  $(".form_add_lieutrinh").addClass("hidden");
  $("#btn_edit_sotien_phanbo_goidichvu").addClass("hidden");
  $(".icon_add").removeClass("hidden");
  $(".icon_remove").addClass("hidden");
  $("#form_add_chitiet_goidichvu").addClass("hidden");
  $("#form_sotien_goidichvu").removeClass("hidden");
  $("#tendichvu_goidichvu_add").removeClass("hidden");
  $("#form_them_mota").removeClass("hidden");
  $("#form_them_hinhanh_video").removeClass("hidden");
  $("#form_them_trangthai").removeClass("hidden");
  $("#btn_edit_goidichvu").addClass("hidden");
  $("#form_them_danhmuc").removeClass("hidden");
  load_chitiet_goidichvu("");
  load_image_goidichvu("");
  load_video_goidichvu("");
}

function open_edit_goidichvu(
  e,
  msdichvu,
  tendichvu,
  nhom_dichvu,
  sotien,
  trangthai,
  phanbogia,
  lieutrinh
) {
  open_modal("form_add_goi_dichvu");
  $("#title_modal").text("Chỉnh gói dịch vụ " + tendichvu);
  $("#btn_edit_goidichvu").removeClass("hidden");
  $("#form_add_anh_goidichvu").addClass("hidden");
  $("#form_edit_anh_goidichvu").removeClass("hidden");
  $("#form_hanghoa_goidichvu").addClass("hidden");
  $("#btn_add_goidichvu").addClass("hidden");
  $(".form_phanbo_dichvu").removeClass("hidden");
  $("#msdichvu_goidichvu").val(msdichvu);
  $("#tendichvu_goidichvu_add").val(tendichvu);
  $("#sotien_goidichvu").val(sotien);
  $("#sotien_goidichvu_add").val(sotien);
  $("#dongia_add_goidichvu").val(0);
  $("#ptthuchien_add_goidichvu").val(0);
  $("#tenhanghoa_add_goidichvu").val("");
  $("#soluong_add_goidichvu").val(1);
  $("#list_danhmuc_add_goidichvu").val(nhom_dichvu);
  $("#is_lieutrinh").val(lieutrinh);
  $("#form_add_chitiet_goidichvu").removeClass("hidden");
  $("#form_sotien_goidichvu").removeClass("hidden");
  $("#tendichvu_goidichvu_add").removeClass("hidden");
  $("#form_them_mota").removeClass("hidden");
  $("#form_them_hinhanh_video").removeClass("hidden");
  $("#form_them_trangthai").removeClass("hidden");
  $("#btn_edit_goidichvu").removeClass("hidden");
  $("#form_them_danhmuc").removeClass("hidden");
  $("#form_add_chitiet_goidichvu").addClass("hidden");

  CKEDITOR.instances.mota_goidichvu_add.setData(
    $(e).parent().parent().find(".mota_td").text()
  );
  if (trangthai == "0") {
    document.getElementById("trangthai_add_goidichvu").checked = true;
  } else {
    document.getElementById("trangthai_add_goidichvu").checked = false;
  }
  if (phanbogia == "1") {
    document.getElementById("phanbo_giaban_goidichvu").checked = true;
    $("#btn_edit_sotien_phanbo_goidichvu").removeClass("hidden");
    $("#sotien_goidichvu").attr("readonly", false);
    $("#text_phanbogia_goidichvu").text("Phân bổ giá");
  } else {
    document.getElementById("phanbo_giaban_goidichvu").checked = false;
    $("#btn_edit_sotien_phanbo_goidichvu").addClass("hidden");
    $("#sotien_goidichvu").attr("readonly", true);
    $("#text_phanbogia_goidichvu").text("Giá cộng dồn");
  }
  load_chitiet_goidichvu(msdichvu);
  load_image_goidichvu(msdichvu);
  load_video_goidichvu(msdichvu);
}

function open_edit_mota_goidichvu(
  e,
  msdichvu,
  tendichvu,
  nhom_dichvu,
  sotien,
  trangthai,
  phanbogia,
  lieutrinh
) {
  open_modal("form_add_goi_dichvu");
  $("#title_modal").text("Chỉnh gói dịch vụ " + tendichvu);
  $("#btn_edit_goidichvu").removeClass("hidden");
  $("#form_add_anh_goidichvu").addClass("hidden");
  $("#form_edit_anh_goidichvu").removeClass("hidden");
  $("#form_hanghoa_goidichvu").addClass("hidden");
  $("#btn_add_goidichvu").addClass("hidden");
  $(".form_phanbo_dichvu").removeClass("hidden");
  $("#msdichvu_goidichvu").val(msdichvu);
  $("#tendichvu_goidichvu_add").val(tendichvu);
  $("#is_lieutrinh").val(lieutrinh);
  $("#sotien_goidichvu").val(sotien);
  $("#msdichvu_add").val(msdichvu);
  $("#dongia_add_goidichvu").val(0);
  $("#ptthuchien_add_goidichvu").val(0);
  $("#tenhanghoa_add_goidichvu").val("");
  $("#soluong_add_goidichvu").val(1);
  $("#list_danhmuc_add_goidichvu").val(nhom_dichvu);
  $("#form_add_chitiet_goidichvu").removeClass("hidden");
  $("#form_sotien_goidichvu").addClass("hidden");
  $("#tendichvu_goidichvu_add").addClass("hidden");
  $("#form_sotien_goidichvu").addClass("hidden");
  $("#form_them_mota").addClass("hidden");
  $("#form_them_hinhanh_video").addClass("hidden");
  $("#form_them_trangthai").addClass("hidden");
  $("#btn_edit_goidichvu").addClass("hidden");
  $("#form_them_danhmuc").addClass("hidden");
  CKEDITOR.instances.mota_goidichvu_add.setData(
    $(e).parent().parent().find(".mota_td").text()
  );
  if (trangthai == "0") {
    document.getElementById("trangthai_add_goidichvu").checked = true;
  } else {
    document.getElementById("trangthai_add_goidichvu").checked = false;
  }
  if (phanbogia == "1") {
    document.getElementById("phanbo_giaban_goidichvu").checked = true;
    $("#btn_edit_sotien_phanbo_goidichvu").removeClass("hidden");
    $("#sotien_goidichvu").attr("readonly", false);
    $("#text_phanbogia_goidichvu").text("Phân bổ giá");
  } else {
    document.getElementById("phanbo_giaban_goidichvu").checked = false;
    $("#btn_edit_sotien_phanbo_goidichvu").addClass("hidden");
    $("#sotien_goidichvu").attr("readonly", true);
    $("#text_phanbogia_goidichvu").text("Giá cộng dồn");
  }
  load_chitiet_goidichvu(msdichvu);
  load_image_goidichvu(msdichvu);
  load_video_goidichvu(msdichvu);
}

function edit_goidichvu() {
  var form_data = new FormData();
  var path_video = $("#video_goidichvu_add")[0].files[0];
  const trangthai = $("#trangthai_add").is(":checked");
  const tendichvu = $("#tendichvu_goidichvu_add").val();
  const msdichvu = $("#msdichvu_goidichvu").val();
  const nhom = $("#list_danhmuc_add_goidichvu option:selected").val();

  form_data.append("tendichvu", tendichvu);
  form_data.append("msdichvu", msdichvu);
  form_data.append(
    "sotien",
    $("#sotien_goidichvu_add").val().replaceAll(".", "")
  );
  form_data.append("giavon", 0);
  form_data.append("thoigian", 0);
  form_data.append("pttichluy", 0);
  form_data.append("ptthuchien", 0);
  form_data.append("ngaybaohanh", 0);
  form_data.append("thuesuat", 0);
  form_data.append("trangthai", trangthai == true ? "0" : "1");
  form_data.append("lieutrinh", 2);
  form_data.append("nhom", nhom);
  form_data.append("file_image_length", all_path_image.length);
  for (let i = 0; i < all_path_image.length; i++) {
    form_data.append(`file_image${i}`, all_path_image[i]);
  }
  form_data.append("file_video", path_video);
  form_data.append(
    "mota_dichvu",
    CKEDITOR.instances["mota_goidichvu_add"].getData()
  );
  if (tendichvu != "" && nhom != "") {
    $.ajax({
      type: "POST",
      url: "ajax/dichvu/edit_dichvu.php",
      data: form_data,
      contentType: false,
      processData: false,
      headers: {
        "X-CSRF-Token": $("meta[name='csrf-token']").attr("content"),
      },
      success: function (response) {
        all_path_image = [];
        close_modal("form_add_goi_dichvu");
        $("#tendichvu_goidichvu_add").val("");
        $("#msdichvu_goidichvu").val("");
        $("#list_danhmuc_add_goidichvu").val("");
        load_dichvu();
      },
    });
  } else {
    $("#error_goidichvu").removeClass("hidden");
  }
}

function open_edit_dichvu(
  e,
  msdichvu,
  tendichvu,
  thoigian,
  nhom_dichvu,
  sotien,
  lieutrinh,
  trangthai,
  pttichluy,
  ptthuchien,
  thuesuat,
  ngaybaohanh,
  giavon
) {
  open_modal("form_edit_dichvu");
  $(".error_add_danhmuc_edit").addClass("hidden");
  $("#msdichvu_edit").val(msdichvu);
  $("#tendichvu_edit").val(tendichvu);
  CKEDITOR.instances.mota_dichvu_edit.setData(
    $(e).parent().parent().parent().find(".mota_td").text()
  );
  $("#sotien_edit").val(sotien);
  $("#giavon_edit").val(giavon);
  $("#thoigian_edit").val(thoigian);
  $("#ngaybaohanh_edit").val(ngaybaohanh);
  $("#pttichluy_edit").val(pttichluy);
  $("#ptthuchien_edit").val(ptthuchien);
  $("#thuesuat_edit").val(thuesuat);
  $("#list_danhmuc_edit").val(nhom_dichvu);
  if (lieutrinh == "1") {
    document.getElementById("lieutrinh_edit").checked = true;
  } else {
    document.getElementById("lieutrinh_edit").checked = false;
  }
  if (trangthai == "0") {
    document.getElementById("trangthai_edit").checked = true;
  } else {
    document.getElementById("trangthai_edit").checked = false;
  }
  hien_pttichluy_edit();
  load_video(msdichvu);
  load_image(msdichvu);
  ktra_edit_giaban_dichvu(msdichvu);
}

// kiểm tra dịch vụ có mô tả hay k
function ktra_edit_giaban_dichvu(msdichvu) {
  $.post(
    "ajax/dichvu/ktra_edit_giaban_dichvu.php",
    {
      msdichvu: msdichvu,
    },
    function (data, textStatus, jqXHR) {
      $("#sotien_edit").attr("readonly", false);
      if (data[0].trangthai == "khoa") {
        $("#sotien_edit").attr("readonly", true);
      }
    }
  );
}

function hien_pttichluy() {
  const lieutrinh = $("#lieutrinh_add").is(":checked");
  $("#__pttichluy").removeClass("hidden");
  $("#__ptthuchien").removeClass("hidden");

  if (lieutrinh == true) {
    $("#__ngaybaohanh").addClass("hidden");
    $("#__pttichluy").addClass("hidden");
    $("#__ptthuchien").addClass("hidden");
    $("#__giavon").addClass("hidden");
  } else {
    $("#__giavon").removeClass("hidden");
    $("#__ptthuchien").removeClass("hidden");
    $("#__ngaybaohanh").removeClass("hidden");
    $("#__pttichluy").removeClass("hidden");
  }
}
function hien_pttichluy_edit() {
  const lieutrinh = $("#lieutrinh_edit").is(":checked");
  $("#__pttichluy_edit").removeClass("hidden");
  if (lieutrinh == true) {
    $("#__ngaybaohanh_edit").addClass("hidden");
    $("#__pttichluy_edit").addClass("hidden");
    $("#__ptthuchien_edit").addClass("hidden");
    $("#__giavon_edit").addClass("hidden");
  } else {
    $("#__ngaybaohanh_edit").removeClass("hidden");
    $("#__pttichluy_edit").removeClass("hidden");
    $("#__ptthuchien_edit").removeClass("hidden");
    $("#__giavon_edit").removeClass("hidden");
  }
}
function load_image_goidichvu(msdichvu) {
  $("#list_img_goidichvu").html("");
  $.post(
    "ajax/dichvu/image/load_image.php",
    { msdichvu: msdichvu },
    function (data, textStatus, jqXHR) {
      const list_img = data[0].path_image.split("|");
      for (let i = 0; i < list_img.length; i++) {
        if (list_img[i] != "") {
          $("#list_img_goidichvu").append(
            ` <div class='w-[80px] relative' >
        <img src="upload/anhdichvu/${data[0].mshs}/${list_img[i]}" class="w-[80px] item_img">
        <img onclick="delete_image('${msdichvu}','${list_img[i]}', '${data[0].path_image}')" class='absolute z-[100] top-[-5px] right-[-5px] w-[20px]' src='vendor/img/delete.png'>
        </div>`
          );
        }
      }
    }
  );
}

function load_image(msdichvu) {
  $("#list_img_dichvu_edit").html("");
  $.post(
    "ajax/dichvu/image/load_image.php",
    { msdichvu: msdichvu },
    function (data, textStatus, jqXHR) {
      const list_img = data[0].path_image.split("|");
      for (let i = 0; i < list_img.length; i++) {
        if (list_img[i] != "") {
          $("#list_img_dichvu_edit").append(
            ` <div class='w-[80px] relative' >
        <img src="upload/anhdichvu/${data[0].mshs}/${list_img[i]}" class="w-[80px] item_img">
        <img onclick="delete_image('${msdichvu}','${list_img[i]}', '${data[0].path_image}')" class='absolute z-[100] top-[-5px] right-[-5px] w-[20px]' src='vendor/img/delete.png'>
        </div>`
          );
        }
      }
    }
  );
}

function load_video_goidichvu(msdichvu) {
  $.post(
    "ajax/dichvu/video/load_video.php",
    { msdichvu: msdichvu },
    function (data, textStatus, jqXHR) {
      if (msdichvu != "") {
        $("#list_video_goidichvu").html("");

        if (data[0].path_video != "") {
          $("#list_video_goidichvu").removeClass("hidden");
          $("#list_video_goidichvu").html(
            `
          <div class='relative'>
          <video id="video_path_edit" width="320" height="240" src="${
            "upload/videodichvu/" +
            data[0].mshs +
            "/" +
            data[0].path_video +
            "?v=" +
            data[0].lastmodify
          }" controls ></video>
          <img onclick="delete_video('${msdichvu}','${
              data[0].path_video
            }')" class='absolute z-[100] top-[-5px] right-[-5px] w-[20px]' src='vendor/img/delete.png'>
            </div>
          `
          );
        } else {
          $("#list_video_goidichvu").addClass("hidden");
          $("#list_video_goidichvu")
            .html(`<video width="320" id="video_goidichvu_path" height="240" controls autoplay>
              </video>`);
        }
      } else {
        $("#list_video_goidichvu").addClass("hidden");

        $("#list_video_goidichvu")
          .html(`<video width="320" id="video_goidichvu_path" height="240" controls autoplay>
        </video>`);
      }
    }
  );
}

function load_video(msdichvu) {
  $("#list_video_dichvu_edit").html("");
  $.post(
    "ajax/dichvu/video/load_video.php",
    { msdichvu: msdichvu },
    function (data, textStatus, jqXHR) {
      if (data[0].path_video != "") {
        $("#list_video_dichvu_edit").html(
          `
          <div class='relative'>
          <video id="video_path_edit" width="320" height="240" src="${
            "upload/videodichvu/" +
            data[0].mshs +
            "/" +
            data[0].path_video +
            "?v=" +
            data[0].lastmodify
          }" controls ></video>
          <img onclick="delete_video('${msdichvu}','${
            data[0].path_video
          }')" class='absolute z-[100] top-[-5px] right-[-5px] w-[20px]' src='vendor/img/delete.png'>
            </div>
          `
        );
      }
    }
  );
}
function add_image_goidichvu(e) {
  var form_data = new FormData();
  form_data.append("msdichvu", $("#msdichvu_goidichvu").val());
  form_data.append("file_image_length", $(e)[0].files.length);

  for (let i = 0; i < $(e)[0].files.length; i++) {
    form_data.append(`file_image_edit${i}`, $(e)[0].files[i]);
  }
  $.ajax({
    type: "POST",
    url: "ajax/dichvu/image/add_image.php",
    data: form_data,
    contentType: false,
    processData: false,
    headers: {
      "X-CSRF-Token": $("meta[name='csrf-token']").attr("content"),
    },
    success: function (response) {
      load_image_goidichvu(`${$("#msdichvu_goidichvu").val()}`);
    },
  });
}

function add_image(e) {
  var form_data = new FormData();
  form_data.append("msdichvu", $("#msdichvu_edit").val());
  form_data.append("file_image_length", $(e)[0].files.length);

  for (let i = 0; i < $(e)[0].files.length; i++) {
    form_data.append(`file_image_edit${i}`, $(e)[0].files[i]);
  }
  $.ajax({
    type: "POST",
    url: "ajax/dichvu/image/add_image.php",
    data: form_data,
    contentType: false,
    processData: false,
    headers: {
      "X-CSRF-Token": $("meta[name='csrf-token']").attr("content"),
    },
    success: function (response) {
      load_image(`${$("#msdichvu_edit").val()}`);
    },
  });
}
function delete_image(msdichvu, path_image, out_path_image) {
  console.log(msdichvu);
  $.post(
    "ajax/dichvu/image/delete_image.php",
    {
      msdichvu: msdichvu,
      path_image: path_image,
      out_path_image: out_path_image,
    },
    function (data, textStatus, jqXHR) {
      load_image(msdichvu);
      load_image_goidichvu(msdichvu);
    }
  );
}

function delete_video(msdichvu, path_video) {
  $.post(
    "ajax/dichvu/video/delete_video.php",
    {
      msdichvu: msdichvu,
      path_video: path_video,
    },
    function (data, textStatus, jqXHR) {
      load_video(msdichvu);
      load_video_goidichvu(msdichvu);
    }
  );
}

function edit_dichvu() {
  var form_data = new FormData();
  var path_video = $("#videodichvu_edit")[0].files[0];
  const trangthai = $("#trangthai_edit").is(":checked");
  const lieutrinh = $("#lieutrinh_edit").is(":checked");

  form_data.append("msdichvu", $("#msdichvu_edit").val());
  form_data.append("tendichvu", $("#tendichvu_edit").val());
  form_data.append("sotien", $("#sotien_edit").val().replaceAll(".", ""));
  form_data.append("giavon", $("#giavon_edit").val().replaceAll(".", ""));
  form_data.append("thoigian", $("#thoigian_edit").val());
  form_data.append(
    "pttichluy",
    lieutrinh == true ? 0 : $("#pttichluy_edit").val()
  );
  form_data.append("ptthuchien", $("#ptthuchien_edit").val());
  form_data.append("ngaybaohanh", $("#ngaybaohanh_edit").val());
  form_data.append("thuesuat", $("#thuesuat_edit").val());
  form_data.append("trangthai", trangthai == true ? "0" : "1");
  form_data.append("lieutrinh", lieutrinh == true ? "1" : "0");
  form_data.append("nhom", $("#list_danhmuc_edit option:selected").val());
  form_data.append("file_video", path_video);
  form_data.append(
    "mota_dichvu",
    CKEDITOR.instances["mota_dichvu_edit"].getData()
  );
  $.ajax({
    type: "POST",
    url: "ajax/dichvu/edit_dichvu.php",
    data: form_data,
    contentType: false,
    processData: false,
    headers: {
      "X-CSRF-Token": $("meta[name='csrf-token']").attr("content"),
    },
    success: function (response) {
      $("#msdichvu_edit").val("");
      $("#tendichvu_edit").val("");
      $("#sotien_edit").val("");
      $("#giavon_edit").val("");
      $("#thoigian_edit").val("");
      $("#ngaybaohanh_edit").val("0");
      $("#thuesuat").val("");
      $("#pttichluy_edit").val("");
      $("#ptthuchien_edit").val(0);
      $("#list_danhmuc").val("");
      $("#mota_dichvu").val("");
      all_path_image = [];
      $("#form_edit_dichvu").addClass("hidden");
      load_dichvu();
    },
  });
}

function load_danhmuc() {
  $("#list_danhmuc_add_goidichvu").html("");
  $("#list_danhmuc_edit_goidichvu").html("");
  $("#list_danhmuc_add").html("");
  $("#list_danhmuc_edit").html("");
  $(".error_add_danhmuc").addClass("hidden");

  $.post(
    "ajax/danhmuc/load_danhmuc.php",
    {
      phanloai: "dichvu",
    },
    function (data, textStatus, jqXHR) {
      $("#list_danhmuc_add").append(`
        <option value="">Chọn danh mục</option>
        `);
      $("#list_danhmuc_edit_goidichvu").append(`
        <option value="">Chọn danh mục</option>
        `);
      $("#list_danhmuc_add_goidichvu").append(`
        <option value="">Chọn danh mục</option>
        `);
      $("#list_danhmuc_edit").append(`
        <option value="">Chọn danh mục</option>
        `);
      $("#list_danhmuc_filter").append(`
        <option class='text-[#747474]' value="">Chọn danh mục</option>
        `);
      for (let i = 0; i < data.length; i++) {
        $("#list_danhmuc_filter").append(
          `<option class='text-[black]' value="${data[i].msloai}">${data[i].tenloai}</option>`
        );
        $("#list_danhmuc_edit_goidichvu").append(
          `<option class='text-[black]' value="${data[i].msloai}">${data[i].tenloai}</option>`
        );
        $("#list_danhmuc_add").append(
          `<option value="${data[i].msloai}">${data[i].tenloai}</option>`
        );
        $("#list_danhmuc_add_goidichvu").append(
          `<option value="${data[i].msloai}">${data[i].tenloai}</option>`
        );
        $("#list_danhmuc_edit").append(
          `<option value="${data[i].msloai}">${data[i].tenloai}</option>`
        );
      }
    }
  );
}
function add_danhmuc(id_danhmuc) {
  const tendanhmuc = $("#tendanhmuc_add").val();
  if (tendanhmuc != "") {
    $.post(
      "ajax/danhmuc/add_danhmuc.php",
      {
        tendanhmuc: tendanhmuc,
        phanloai: "dichvu",
        tenphanloai: "Dịch vụ",
        id_danhmuc: id_danhmuc,
      },
      function (data, textStatus, jqXHR) {
        $("#icon_remove_danhmuc").addClass("hidden");
        $("#icon_add_danhmuc").removeClass("hidden");
        $("#icon_remove_danhmuc_edit").addClass("hidden");
        $("#icon_add_danhmuc_edit").removeClass("hidden");
        $("#show_danhmuc").addClass("hidden");
        $("#show_danhmuc_edit").addClass("hidden");
        $(".icon_remove").addClass("hidden");
        $(".icon_add").removeClass("hidden");
        $(".__show").addClass("hidden");
        load_danhmuc();
      }
    );
  } else {
    $(".error_add_danhmuc").removeClass("hidden");
  }
}
function add_danhmuc_edit(id_danhmuc) {
  const tendanhmuc = $("#tendanhmuc_edit").val();
  if (tendanhmuc != "") {
    $.post(
      "ajax/danhmuc/add_danhmuc.php",
      {
        tendanhmuc: tendanhmuc,
        phanloai: "dichvu",
        tenphanloai: "Dịch vụ",
        id_danhmuc: id_danhmuc,
      },
      function (data, textStatus, jqXHR) {
        $("#icon_remove_danhmuc").addClass("hidden");
        $("#icon_add_danhmuc").removeClass("hidden");
        $("#icon_remove_danhmuc_edit").addClass("hidden");
        $("#icon_add_danhmuc_edit").removeClass("hidden");
        $("#show_danhmuc").addClass("hidden");
        $("#show_danhmuc_edit").addClass("hidden");
        $(".icon_remove").addClass("hidden");
        $(".icon_add").removeClass("hidden");
        $(".__show").addClass("hidden");
        load_danhmuc();
      }
    );
  } else {
    $(".error_add_danhmuc_edit").removeClass("hidden");
  }
}

function add_danhmuc_goidichvu(e, id_danhmuc) {
  const tendanhmuc = $("#tendanhmuc_add_goidichvu").val();
  if (tendanhmuc != "") {
    $.post(
      "ajax/danhmuc/add_danhmuc.php",
      {
        tendanhmuc: tendanhmuc,
        phanloai: "dichvu",
        tenphanloai: "Dịch vụ",
        id_danhmuc: id_danhmuc,
      },
      function (data, textStatus, jqXHR) {
        $("#icon_remove_danhmuc").addClass("hidden");
        $("#icon_add_danhmuc").removeClass("hidden");
        $("#icon_remove_danhmuc_edit").addClass("hidden");
        $("#icon_add_danhmuc_edit").removeClass("hidden");
        $("#show_danhmuc").addClass("hidden");
        $("#show_danhmuc_edit").addClass("hidden");
        $(".icon_remove").addClass("hidden");
        $(".icon_add").removeClass("hidden");
        $(".__show").addClass("hidden");
        load_danhmuc();
      }
    );
  }
}

function open_delete_dichvu(msdichvu, tendichvu, list_img, list_video) {
  open_modal("form_delete_dichvu");
  $("#tendichvu_delele").html(tendichvu);
  $("#msdichvu_delete").val(msdichvu);
  $("#list_img_delete").val(list_img);
  $("#list_video_delete").val(list_video);
  $("#error_dichvu_delele").html("");

  $.post(
    "ajax/dichvu/ktra_dichvu_truoc_delete.php",
    { msdichvu: msdichvu },
    function (data, textStatus, jqXHR) {
      let list_dichvu = "";
      if (data != "") {
        for (let i = 0; i < data.length; i++) {
          list_dichvu += data[i].tendichvu + ", ";
        }
        $("#error_dichvu_delele").html(
          "Việc xóa <span class='text-[red]'>" +
            tendichvu +
            "</span> có thể ảnh hưởng đến các dịch vụ <span  class='text-[red]'>" +
            list_dichvu +
            "</span>"
        );
      }
    }
  );
}
function delete_dichvu() {
  const msdichvu = $("#msdichvu_delete").val();
  const list_img = $("#list_img_delete").val();
  const list_video = $("#list_video_delete").val();
  $.post(
    "ajax/dichvu/delete_dichvu.php",
    { msdichvu: msdichvu, list_img: list_img, list_video: list_video },
    function (data, textStatus, jqXHR) {
      close_modal("form_delete_dichvu");
      load_dichvu();
    }
  );
}

//todo---------------------------------------------------- Lieu trinh
function show_modal_lieutrinh(
  lieutrinh,
  msdichvu,
  tendichvu,
  solan,
  sotien,
  phanbogia
) {
  $("#is_lieutrinh").val(lieutrinh);
  $("#form_hanghoa").addClass("hidden");
  $("#tenhanghoa_add").val("");
  $("#soluong_add").val("1");
  $("#dongia_add").val("0");
  $("#dinhluong_add").val("0");
  $("#dvt_dinhluong_add").val("0");
  $("#ptthuchien_dichvu_add").val("0");
  $(".form_phanbo_dichvu").removeClass("hidden");

  if (lieutrinh == 1) {
    open_modal("form_lieutrinh");
    $("#kichthuoc_form").removeClass("max-w-3xl");
    $("#kichthuoc_form").addClass("max-w-7xl");
    $("#item_chitiet_lieutrinh").addClass("col-span-6");
    $("#item_chitiet_lieutrinh").removeClass("col-span-12");
    $("#item_chitiet_lieutrinh").addClass("hidden");
    $(".form_phanbo_dichvu").addClass("hidden");
    $(".form_sotien_phanbo_dichvu").addClass("hidden");
    $("#list_form_lieutrinh").removeClass("hidden");
    if (solan > 0) {
      $("#load_solan").html("Sau lần " + solan);
    }
    $("#tendichvu").html("Liệu trình " + tendichvu);
    if (phanbogia == "1") {
      document.getElementById("phanbo_giaban").checked = true;
    } else {
      document.getElementById("phanbo_giaban").checked = false;
    }
    $("#tenlieutrinh").html("HH/DV kèm theo " + tendichvu);
  }
  if (lieutrinh == 0) {
    chitiet_khonglieutrinh(msdichvu, lieutrinh);
    $("#tendichvu").html(`<div>
    <p>HH/DV kèm theo ${tendichvu}</p>
     </div>`);
    $("#sotien_dichvu").val(sotien);
    if (phanbogia == "1") {
      document.getElementById("phanbo_giaban").checked = true;
      $("#btn_edit_sotien_phanbo").removeClass("hidden");
      $("#sotien_dichvu").attr("readonly", false);
      $("#text_phanbogia").text("Phân bổ giá");
      // $("#dongia_add").attr("readonly", true);
    } else {
      document.getElementById("phanbo_giaban").checked = false;
      $("#btn_edit_sotien_phanbo").addClass("hidden");
      $("#sotien_dichvu").attr("readonly", true);
      $("#text_phanbogia").text("Giá cộng dồn");
      $("#dongia_add").attr("readonly", false);
    }
    $(".form_phanbo_dichvu").removeClass("hidden");
    $(".form_sotien_phanbo_dichvu").removeClass("hidden");
    $("#tenlieutrinh").html("Thêm mô tả");
    $("#tenhanghoa_add").val("");
    $("#soluong_add").val("1");
    $("#dongia_add").val("");
    open_modal("form_lieutrinh");
    $("#list_form_lieutrinh").addClass("hidden");
    $("#item_chitiet_lieutrinh").removeClass("hidden");
    $("#item_chitiet_lieutrinh").addClass("col-span-12");
    $("#kichthuoc_form").removeClass("max-w-7xl");
    $("#kichthuoc_form").addClass("max-w-3xl");
  }
}
function chitiet_khonglieutrinh(msdichvu, loai_lieutrinh) {
  $.post(
    "ajax/dichvu/lieutrinh/load_chitiet_lieutrinh.php",
    {
      mslieutrinh: msdichvu,
      loai_lieutrinh: loai_lieutrinh,
      msdichvu: msdichvu,
    },
    function (data, textStatus, jqXHR) {
      $("#chitiet_lieutrinh").html(data);
      $(".form_add_lieutrinh").addClass("hidden");
      $(".icon_remove").addClass("hidden");
      $(".icon_add").removeClass("hidden");
      $("#error_them_chitietlieutrinh").addClass("hidden");
    }
  );
}
function load_lieutrinh(msdichvu) {
  $("#msdichvu_add").val(msdichvu);
  $(".form_add_lieutrinh").addClass("hidden");
  $(".icon_add").removeClass("hidden");
  $(".icon_remove").addClass("hidden");
  $("#tenhanghoa_add").val("");
  $.post(
    "ajax/dichvu/lieutrinh/load_lieutrinh.php",
    { msdichvu: msdichvu },
    function (data, textStatus, jqXHR) {
      $("#list_lieutrinh").html(data);
      $("#error_themlieutrinh").addClass("hidden");
    }
  );
}
function load_thanhtien_dichvu() {
  const msdichvu = $("#msdichvu_add").val();
  $.post(
    "ajax/dichvu/load_thanhtien_dichvu.php",
    { msdichvu: msdichvu },
    function (data, textStatus, jqXHR) {
      const thanhtien = data[0].thanhtien;
      $("#thanhtien_dichvu").val(thanhtien);
      $("#sotien_dichvu").val(
        thanhtien.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
      );
      update_thanhtien_dichvu();
      load_dichvu();
    }
  );
}

function update_thanhtien_dichvu() {
  const msdichvu = $("#msdichvu_add").val();
  const sotien = $("#thanhtien_dichvu").val().replace(/[.]/g, "");
  $.post(
    "ajax/dichvu/update_thanhtien_dichvu.php",
    { msdichvu: msdichvu, sotien: sotien },
    function (data, textStatus, jqXHR) {}
  );
}

function load_thanhtien_goidichvu(msdichvu) {
  $.post(
    "ajax/dichvu/load_thanhtien_dichvu.php",
    { msdichvu: msdichvu },
    function (data, textStatus, jqXHR) {
      $("#sotien_goidichvu").val(
        data[0].thanhtien.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
      );
      update_thanhtien_goidichvu(msdichvu);
    }
  );
}
function update_thanhtien_goidichvu(msdichvu) {
  const sotien = $("#sotien_goidichvu").val().replace(/[.]/g, "");
  $.post(
    "ajax/dichvu/update_thanhtien_dichvu.php",
    { msdichvu: msdichvu, sotien: sotien },
    function (data, textStatus, jqXHR) {
      load_dichvu();
    }
  );
}

function add_lieutrinh() {
  const msdichvu = $("#msdichvu_add").val();
  const tenlieutrinh = $("#tenlieutrinh_add").val();
  const songay = $("#songay_add").val();
  if (tenlieutrinh != "" && songay != "") {
    $.post(
      "ajax/dichvu/lieutrinh/add_lieutrinh.php",
      {
        msdichvu: msdichvu,
        tenlieutrinh: tenlieutrinh,
        songay: songay,
      },
      function (data, textStatus, jqXHR) {
        $("#tenlieutrinh_add").val("");
        $("#songay_add").val("");
        $(".form_add_lieutrinh").addClass("hidden");
        $(".icon_add").removeClass("hidden");
        $(".icon_remove").addClass("hidden");
        load_lieutrinh(msdichvu);
        load_thanhtien_dichvu();
      }
    );
  } else {
    $("#error_themlieutrinh").removeClass("hidden");
  }
}
function open_delete_lieutrinh(mslieutrinh, tenlieutrinh) {
  open_modal("form_delete_lieutrinh");
  $("#tenlieutrinh_delele").html(tenlieutrinh);
  $("#mslieutrinh_delete").val(mslieutrinh);
}

function delete_lieutrinh() {
  const msdichvu = $("#msdichvu_add").val();
  const mslieutrinh = $("#mslieutrinh_delete").val();
  $.post(
    "ajax/dichvu/lieutrinh/delete_lieutrinh.php",
    { msdichvu: msdichvu, mslieutrinh: mslieutrinh },
    function (data, textStatus, jqXHR) {
      load_lieutrinh(msdichvu);
      $("#item_chitiet_lieutrinh").addClass("hidden");
      close_modal("form_delete_lieutrinh");
      load_thanhtien_dichvu();
    }
  );
}

function open_edit_lieutrinh(e) {
  $(e).parent().parent().parent().find(".tenlieutrinh_td ").addClass("hidden");
  $(e)
    .parent()
    .parent()
    .parent()
    .find(".tenlieutrinh_input")
    .removeClass("hidden");
  $(e).parent().parent().parent().find(".songay_td ").addClass("hidden");
  $(e).parent().parent().parent().find(".songay_input").removeClass("hidden");
  $(e).addClass("hidden");
  $(e).parent().find(".btn_edit").removeClass("hidden");
}

function edit_lieutrinh(e, mslieutrinh, msdichvu) {
  const songay = $(e)
    .parent()
    .parent()
    .parent()
    .find(".songay_input input")
    .val();
  const tenlieutrinh = $(e)
    .parent()
    .parent()
    .parent()
    .find(".tenlieutrinh_input input")
    .val();
  $.post(
    "ajax/dichvu/lieutrinh/edit_lieutrinh.php",
    {
      mslieutrinh: mslieutrinh,
      tenlieutrinh: tenlieutrinh,
      songay: songay,
    },
    function (data, textStatus, jqXHR) {
      $(e)
        .parent()
        .parent()
        .parent()
        .find(".tenlieutrinh_td ")
        .removeClass("hidden");
      $(e)
        .parent()
        .parent()
        .parent()
        .find(".tenlieutrinh_input")
        .addClass("hidden");
      $(e).parent().parent().parent().find(".songay_td ").removeClass("hidden");
      $(e).parent().parent().parent().find(".songay_input").addClass("hidden");
      $(e).addClass("hidden");
      $(e).parent().find(".btn_show_edit").removeClass("hidden");
      load_lieutrinh(msdichvu);
    }
  );
}
function open_copy_lieutrinh(msdichvu, mslieutrinh, tenlieutrinh) {
  open_modal("form_copy_lieutrinh");
  $("#title_tenlieutrinh_copy").html(tenlieutrinh);
  $("#mslieutrinh_copy").val(mslieutrinh);
  $("#msdichvu_copy").val(msdichvu);
}

function copy_lieutrinh() {
  const mslieutrinh = $("#mslieutrinh_copy").val();
  const msdichvu = $("#msdichvu_copy").val();
  $.post(
    "ajax/dichvu/lieutrinh/copy_lieutrinh.php",
    { msdichvu: msdichvu, mslieutrinh: mslieutrinh },
    function (data, textStatus, jqXHR) {
      load_lieutrinh(msdichvu);
      close_modal("form_copy_lieutrinh");
    }
  );
}

function find_hanghoa(e, loai) {
  if (typeof timer !== undefined) {
    clearTimeout(this.timer);
  }
  this.timer = setTimeout(a, 500);
  function a() {
    $("#ptthuchien_dichvu_add").val("");
    $("#dongia_add").val("");
    $("#dongia_add_goidichvu").val("");
    $("#ptthuchien_add_goidichvu").val("");
    const tensanpham = $(e)
      .val()
      .toUpperCase()
      .normalize("NFD")
      .replace(/[\u0300-\u036f]/g, "")
      .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"));
    const msdichvu = $("#msdichvu_add").val();
    const lieutrinh = $("#is_lieutrinh").val();
    console.log(lieutrinh);
    let phanbo = "false";
    if (loai == "goidichvu") {
      // phanbo = $("#phanbo_giaban_goidichvu").is(":checked");
    }
    $("#form_hanghoa").addClass("hidden");
    $("#form_hanghoa_goidichvu").addClass("hidden");
    if (tensanpham != "") {
      $.post(
        "ajax/dichvu/lieutrinh/find_hanghoa.php",
        {
          tensanpham: tensanpham,
          loai: loai,
          msdichvu: msdichvu,
          phanbo: phanbo,
          lieutrinh: lieutrinh,
        },
        function (data, textStatus, jqXHR) {
          if (data != "") {
            $("#form_hanghoa").removeClass("hidden");
            $("#list_sanpham").html(data);
            $("#form_hanghoa_goidichvu").removeClass("hidden");
            $("#list_sanpham_goidichvu").html(data);
          }
        }
      );
    }
  }
}
// Kiểm tra dịch vụ có mô tả hay k
function ktra_dichvu_co_mota(msdichvu, loai) {
  $.post(
    "ajax/dichvu/ktra_edit_giaban_dichvu.php",
    { msdichvu: msdichvu },
    function (data, textStatus, jqXHR) {
      $("#dongia_add_goidichvu").attr("readonly", false);
      $("#dongia_add").attr("readonly", false);
      if (data[0].trangthai == "khoa") {
        if (loai == "dichvu") {
          $("#dongia_add").attr("readonly", true);
        }
        if (loai == "goidichvu") {
          // $("#dongia_add_goidichvu").attr("readonly", true);
        }
      }
    }
  );
}

function add_hanghoa(
  mshh,
  tenhh,
  dvt_quydoi,
  dongia,
  loai,
  phanloai,
  ptthuchien
) {
  $(".form_dvt_dinhluong").removeClass("hidden");
  $(".form_dinhluong").removeClass("hidden");
  if (loai == "goidichvu") {
    ktra_dichvu_co_mota(mshh, "goidichvu");
    const phanbo = $("#phanbo_giaban_goidichvu").is(":checked");
    $("#mshh_add_goidichvu").val(mshh);
    $("#tenhanghoa_add_goidichvu").val(tenhh);
    $("#dongia_add_goidichvu").val(dongia);
    $("#dongia_goidichvu_add_tam").val(dongia);

    $("#dvt_quydoi_add_goidichvu").val(dvt_quydoi);
    $("#ptthuchien_add_goidichvu").val(ptthuchien);
    $("#form_hanghoa_goidichvu").addClass("hidden");
    const msdichvu = $("#msdichvu_goidichvu").val();
    $("#soluong_add_goidichvu").val("1");
    $("#soluong_add_goidichvu").attr("readonly", false);
    // $("#dongia_add_goidichvu").attr("readonly", false);

    if (phanloai == 1) {
      $("#soluong_add_goidichvu").attr("readonly", true);
    }
    if (phanbo == true) {
      $.post(
        "ajax/dichvu/lieutrinh/get_sotien_chitiet_dichvu.php",
        { msdichvu: msdichvu, mshh: mshh, loai: "ShowGia" },
        function (data, textStatus, jqXHR) {
          $("#dongia_goidichvu_add_tam ").val(
            data[0].DonGia.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
          );
          $("#dongia_add_goidichvu").val(
            data[0].DonGia.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
          );
          // $("#dongia_add_goidichvu").attr("readonly", true);
        }
      );
    }
  } else {
    const phanbo = $("#phanbo_giaban").is(":checked");
    ktra_dichvu_co_mota(mshh, "dichvu");
    $("#mshh_add").val(mshh);
    $("#tenhanghoa_add").val(tenhh);
    $("#dvt_dinhluong_add").val(dvt_quydoi);
    $("#dongia_add").val(dongia);
    $("#dongia_dichvu_add_tam").val(dongia);
    $("#ptthuchien_dichvu_add").val(ptthuchien);
    $("#form_hanghoa").addClass("hidden");
    $("#soluong_add").val("1");
    $("#soluong_add").attr("readonly", false);
    $("#dongia_add").attr("readonly", false);

    if (phanloai == 1) {
      $(".form_dinhluong").addClass("hidden");
      $(".form_dvt_dinhluong").addClass("hidden");
      $(".form_dvt_dinhluong").addClass("hidden");
      $("#soluong_add").attr("readonly", true);
    }
    const msdichvu = $("#msdichvu_add").val();
    if (phanbo == true) {
      $("#dongia_add").attr("readonly", true);

      $.post(
        "ajax/dichvu/lieutrinh/get_sotien_chitiet_dichvu.php",
        { msdichvu: msdichvu, mshh: mshh, loai: "ShowGia" },
        function (data, textStatus, jqXHR) {
          $("#dongia_dichvu_add_tam").val(
            data[0].DonGia.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
          );
          $("#dongia_add").val(
            data[0].DonGia.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
          );
        }
      );
    }
  }
}

function chitiet_lieutrinh(e, msdichvu, mslieutrinh, tenlieutrinh) {
  $("#mslieutrinh_add").val(mslieutrinh);
  const loai_lieutrinh = $("#is_lieutrinh").val();
  if (loai_lieutrinh == 1) {
    $("#tenlieutrinh").html("HH/DV kèm theo " + tenlieutrinh);
  } else {
    $("#tenlieutrinh").html("Thêm mô tả");
  }
  $(".item_lieutrinh").removeClass("active_item");
  $(e).parent().addClass("active_item");
  $("#item_chitiet_lieutrinh").removeClass("hidden");
  $.post(
    "ajax/dichvu/lieutrinh/load_chitiet_lieutrinh.php",
    {
      mslieutrinh: mslieutrinh,
      loai_lieutrinh: loai_lieutrinh,
      msdichvu: msdichvu,
    },
    function (data, textStatus, jqXHR) {
      $("#chitiet_lieutrinh").html(data);
    }
  );
}

function add_chitiet_lieutrinh() {
  const phanbo = $("#phanbo_giaban").is(":checked");
  const msdichvu = $("#msdichvu_add").val();
  const tendichvu = $("#tendichvu").html();
  const mslieutrinh = $("#mslieutrinh_add").val();
  const loai_lieutrinh = $("#is_lieutrinh").val();
  const mshh = $("#mshh_add").val();
  const tenhh = $("#tenhanghoa_add").val();
  const soluong = $("#soluong_add").val();
  const ptthuchien = $("#ptthuchien_dichvu_add").val();
  const dinhluong = $("#dinhluong_add").val().replaceAll(",", ".");
  const dongia = $("#dongia_add").val().replaceAll(".", "");
  if (mshh != "" && soluong != "" && dongia != "") {
    $.post(
      "ajax/dichvu/lieutrinh/add_chitiet_lieutrinh.php",
      {
        msdichvu: msdichvu,
        mslieutrinh: mslieutrinh,
        mshh: mshh,
        tenhh: tenhh,
        soluong: soluong,
        ptthuchien: ptthuchien,
        loai_lieutrinh: loai_lieutrinh,
        dongia: dongia,
        phanbo: phanbo,
        dinhluong: dinhluong == 0 || dinhluong == "" ? soluong : dinhluong,
      },
      function (data, textStatus, jqXHR) {
        $("#mshh_add").val("");
        $("#tenhanghoa_add").val("");
        $("#soluong_add").val("1");
        $("#ptthuchien_dichvu_add").val("0");
        $("#dongia_add").val("");
        load_lieutrinh(msdichvu, tendichvu);
        if (loai_lieutrinh == "1") {
          $.post(
            "ajax/dichvu/lieutrinh/load_chitiet_lieutrinh.php",
            {
              mslieutrinh: mslieutrinh,
              loai_lieutrinh: loai_lieutrinh,
              msdichvu: msdichvu,
            },
            function (data, textStatus, jqXHR) {
              $("#chitiet_lieutrinh").html(data);
              $("#" + mslieutrinh).addClass("active_item");
              $(".form_add_lieutrinh").addClass("hidden");
              $(".icon_remove").addClass("hidden");
              $(".icon_add").removeClass("hidden");
              $("#error_them_chitietlieutrinh").addClass("hidden");
              load_thanhtien_dichvu(loai_lieutrinh);
            }
          );
        } else {
          chitiet_khonglieutrinh(msdichvu, loai_lieutrinh);
          load_thanhtien_dichvu();
        }
      }
    );
  } else {
    $("#error_them_chitietlieutrinh").removeClass("hidden");
  }
}

function open_delete_chitiet_lieutrinh(
  rowid,
  msdichvu,
  mslieutrinh,
  mshh,
  tenhh
) {
  open_modal("form_delete_chitiet_lieutrinh");
  $("#msdichvu_chitiet_delete").val(msdichvu);
  $("#tenlieutrinh_chitiet_delele").html(tenhh);
  $("#mslieutrinh_chitiet_delete").val(mslieutrinh);
  $("#mshh_chitiet_delete").val(mshh);
  $("#rowid_chitiet_delete").val(rowid);
}

function delete_mota_dichvu(
  rowid,
  msdichvu,
  mslieutrinh,
  mshh,
  sotien,
  phanbo,
  loai_lieutrinh
) {
  $.post(
    "ajax/dichvu/lieutrinh/delete_chitiet_lieutrinh.php",
    {
      rowid: rowid,
      msdichvu: msdichvu,
      mslieutrinh: mslieutrinh,
      mshh: mshh,
      sotien: sotien,
      phanbo: phanbo,
      loai_lieutrinh,
    },
    function (data, textStatus, jqXHR) {
      close_modal("form_delete_chitiet_lieutrinh");
    }
  );
}

async function delete_chitiet_lieutrinh() {
  const msdichvu = $("#msdichvu_chitiet_delete").val();
  const mslieutrinh = $("#mslieutrinh_chitiet_delete").val();
  const mshh = $("#mshh_chitiet_delete").val();
  const loai_lieutrinh = $("#is_lieutrinh").val();
  const rowid = $("#rowid_chitiet_delete").val();
  const phanbo = $("#phanbo_giaban").is(":checked");
  const sotien = $("#thanhtien_dichvu").val();

  if (typeof timer !== undefined) {
    clearTimeout(this.timer);
  }
  //bằng 1 là liệu trình
  if (loai_lieutrinh == "1") {
    if (typeof timer !== undefined) {
      clearTimeout(this.timer);
    }
    let myPromise = new Promise(async function (resolve) {
      delete_mota_dichvu(
        rowid,
        msdichvu,
        mslieutrinh,
        mshh,
        sotien,
        phanbo,
        loai_lieutrinh
      );

      setTimeout(resolve, 1000);
    });
    await myPromise;
    $.post(
      "ajax/dichvu/lieutrinh/load_chitiet_lieutrinh.php",
      {
        mslieutrinh: mslieutrinh,
        loai_lieutrinh: loai_lieutrinh,
        msdichvu: msdichvu,
      },
      function (data, textStatus, jqXHR) {
        $("#chitiet_lieutrinh").html(data);
        load_lieutrinh(msdichvu);

        close_modal("form_delete_chitiet_lieutrinh");
        $("#" + mslieutrinh).addClass("active_item");
      }
    );
    load_thanhtien_dichvu();
  }
  //bằng 0 là dịch vụ không liệu trình
  if (loai_lieutrinh == 0) {
    if (typeof timer !== undefined) {
      clearTimeout(this.timer);
    }
    let myPromise = new Promise(async function (resolve) {
      delete_mota_dichvu(
        rowid,
        msdichvu,
        mslieutrinh,
        mshh,
        sotien,
        phanbo,
        loai_lieutrinh
      );
      setTimeout(resolve, 100);
    });
    chitiet_khonglieutrinh(msdichvu, loai_lieutrinh);
    await myPromise;
    if (phanbo == false) {
      load_thanhtien_dichvu();
    }
  }
  //bằng rỗng thì là gói dịch vụ
  if (loai_lieutrinh == "") {
    if (typeof timer !== undefined) {
      clearTimeout(this.timer);
    }
    const phanbo = $("#phanbo_giaban_goidichvu").is(":checked");
    const sotien = $("#sotien_goidichvu").val();

    let myPromise = new Promise(async function (resolve) {
      delete_mota_dichvu(
        rowid,
        msdichvu,
        mslieutrinh,
        mshh,
        sotien,
        phanbo,
        loai_lieutrinh
      );
      setTimeout(resolve, 1000);
    });
    await myPromise;
    if (phanbo == false) {
      load_thanhtien_goidichvu(msdichvu);
    }
    load_dichvu();
    load_chitiet_goidichvu(msdichvu);
  }
}

function _show_form(e) {
  $("#error_themlieutrinh").addClass("hidden");
  $("#error_them_chitietlieutrinh").addClass("hidden");

  $(e).addClass("hidden");
  $(e).parent().find(".icon_remove").removeClass("hidden");
  $(e).parent().find(".btn_add_lieutrinh").removeClass("hidden");
  $(e).parent().parent().find(".form_add_lieutrinh").removeClass("hidden");
}
function _hidden_form(e) {
  $("#error_themlieutrinh").addClass("hidden");
  $("#error_them_chitietlieutrinh").addClass("hidden");

  $(e).addClass("hidden");
  $(e).parent().find(".icon_add").removeClass("hidden");
  $(e).parent().find(".btn_add_lieutrinh").addClass("hidden");
  $(e).parent().parent().find(".form_add_lieutrinh").addClass("hidden");
}

function add_chitiet_goidichvu() {
  const phanbo = $("#phanbo_giaban_goidichvu").is(":checked");
  const msdichvu = $("#msdichvu_goidichvu").val();
  const mshh = $("#mshh_add_goidichvu").val();
  const tenhh = $("#tenhanghoa_add_goidichvu").val();
  const soluong = $("#soluong_add_goidichvu").val();
  const ptthuchien = $("#ptthuchien_add_goidichvu").val();
  const dongia = $("#dongia_add_goidichvu").val().replaceAll(".", "");
  if (mshh != "" && soluong != "" && dongia != "") {
    $.post(
      "ajax/dichvu/add_chitiet_goidichvu.php",
      {
        msdichvu: msdichvu,
        mshh: mshh,
        tenhh: tenhh,
        soluong: soluong,
        dongia: dongia,
        ptthuchien: ptthuchien,
        phanbo: phanbo,
      },
      function (data, textStatus, jqXHR) {
        $("#msdichvu_goidichvu").val(data);
        $("#mshh_add_goidichvu").val("");
        $("#tenhanghoa_add_goidichvu").val("");
        $("#soluong_add_goidichvu").val("1");
        $("#dongia_add_goidichvu").val("");
        $("#ptthuchien_add_goidichvu").val("");
        $.post(
          "ajax/dichvu/load_thanhtien_dichvu.php",
          { msdichvu: msdichvu },
          function (data, textStatus, jqXHR) {
            $("#sotien_goidichvu").val(
              data[0].thanhtien
                .toString()
                .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
            );
          }
        );
        load_chitiet_goidichvu(data);
        load_thanhtien_goidichvu(msdichvu);
      }
    );
  } else {
    $("#error_them_chitietlieutrinh").removeClass("hidden");
  }
}

function load_sotien_goidichvu(msdichvu) {
  const phanbo = $("#phanbo_giaban_goidichvu").is(":checked");
  if (phanbo == true) {
    $.post(
      "ajax/dichvu/lieutrinh/get_sotien_chitiet_dichvu.php",
      { msdichvu: msdichvu, mshh: "", loai: "Luu" },
      function (data, textStatus, jqXHR) {}
    );
  }
}

async function load_chitiet_goidichvu(msdichvu) {
  let sotien_goidichvu = 0;
  load_sotien_goidichvu(msdichvu);
  $.post(
    "ajax/dichvu/load_chitiet_goidichvu.php",
    { msdichvu: msdichvu },
    function (data, textStatus, jqXHR) {
      $("#chitiet_lieutrinh_goidichvu").html("");
      for (let i = 0; i < data.length; i++) {
        sotien_goidichvu += Number(data[i].dongia);
        $("#chitiet_lieutrinh_goidichvu").append(`
        <tr class="hover:bg-[#ddd] hover:cursor-pointer">
        <td class=" px-4 py-2">${i + 1}</td>
        <td class=" px-4 py-2">${data[i].tenhh}</td>
        <td class=" px-4 py-2 text-end">${data[i].soluong}</td>
        <td class=" px-4 py-2 text-end">${data[i].dongia
          .toString()
          .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")}</td>
          <td class=" px-4 py-2 text-end">${data[i].ptthuchien}</td>
        <td class=" py-2 flex justify-center items-center">
            <button onclick="open_delete_chitiet_lieutrinh('${
              data[i].rowid
            }','${msdichvu}','${data[i].mslieutrinh}','${data[i].mshh}','${
          data[i].tenhh
        }')">
                <img class="w-[20px] text-center" src="vendor/img/delete.png">
            </button>
        </td>
    </tr>
        `);
      }

      $("#chitiet_lieutrinh_goidichvu").append(`
      <tr class="text-[red] font_semi">
      <td colspan='3' class=" px-4 py-2 text-end">Tổng tiền</td>  
      <td class=" px-4 py-2 text-end">${sotien_goidichvu
        .toString()
        .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")}</td>
        </tr>
        `);
    }
  );
}

function open_modal_phanbogia() {
  $("#sotien_phanbogia").text($("#sotien_dichvu").val());
  const phanbo = $("#phanbo_giaban").is(":checked");
  if (phanbo == true) {
    open_modal("form_phanbogia");
  } else {
    const msdichvu = $("#msdichvu_add").val();
    const sotien = $("#sotien_dichvu").val().replace(/[.]/g, "");
    $("#dongia_add").attr("readonly", false);
    $("#sotien_dichvu").attr("readonly", true);
    $("#btn_edit_sotien_phanbo").addClass("hidden");
    $("#text_phanbogia").text("Giá cộng dồn");
    $.post(
      "ajax/dichvu/lieutrinh/change_sotien_dichvu.php",
      {
        msdichvu: msdichvu,
        sotien: sotien,
        phanbogia: 0,
        loai: "phanbo",
      },
      function (data, textStatus, jqXHR) {
        load_dichvu();
      }
    );
  }
}

function tinhtong_dongia(e) {
  const dongia = $("#dongia_dichvu_add_tam").val().replace(/[.]/g, "");
  $("#dongia_add").val(
    (Number($(e).val()) * Number(dongia))
      .toString()
      .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
}

function tinhtong_dongia_goidichvu(e) {
  const dongia = $("#dongia_goidichvu_add_tam").val().replace(/[.]/g, "");
  $("#dongia_add_goidichvu").val(
    (Number($(e).val()) * Number(dongia))
      .toString()
      .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
}

function open_modal_phanbogia_goidichvu() {
  $("#sotien_phanbogia_goidichvu").text($("#sotien_goidichvu").val());
  const phanbo = $("#phanbo_giaban_goidichvu").is(":checked");
  if (phanbo == true) {
    open_modal("form_phanbogia_goidichvu");
  } else {
    const msdichvu = $("#msdichvu_goidichvu").val();
    const sotien = $("#sotien_goidichvu").val().replace(/[.]/g, "");
    // $("#dongia_add_goidichvu").attr("readonly", false);
    $("#sotien_goidichvu").attr("readonly", true);
    $("#btn_edit_sotien_phanbo_goidichvu").addClass("hidden");
    $("#text_phanbogia").text("Giá cộng dồn");
    $.post(
      "ajax/dichvu/lieutrinh/change_sotien_dichvu.php",
      {
        msdichvu: msdichvu,
        sotien: sotien,
        phanbogia: 0,
        loai: "phanbo",
      },
      function (data, textStatus, jqXHR) {
        load_dichvu();
      }
    );
  }
}

function set_phanbo(loai) {
  if (loai == "dichvu") {
    const msdichvu = $("#msdichvu_add").val();
    const sotien = $("#sotien_dichvu").val().replace(/[.]/g, "");
    $("#sotien_dichvu").attr("readonly", false);
    $("#dongia_add").attr("readonly", true);
    $("#btn_edit_sotien_phanbo").removeClass("hidden");
    $("#text_phanbogia").text("Phân bổ giá");
    $.post(
      "ajax/dichvu/lieutrinh/change_sotien_dichvu.php",
      {
        msdichvu: msdichvu,
        sotien: sotien,
        phanbogia: 1,
        loai: "phanbo",
      },
      function (data, textStatus, jqXHR) {
        load_dichvu();
        close_modal("form_phanbogia");
      }
    );
  }
  if (loai == "goidichvu") {
    const msdichvu = $("#msdichvu_goidichvu").val();
    const sotien = $("#sotien_goidichvu").val().replace(/[.]/g, "");
    $("#sotien_goidichvu").attr("readonly", false);
    // $("#dongia_add_goidichvu").attr("readonly", true);
    $("#btn_edit_sotien_phanbo_goidichvu").removeClass("hidden");
    $("#text_phanbogia_goidichvu").text("Phân bổ giá");
    $.post(
      "ajax/dichvu/lieutrinh/change_sotien_dichvu.php",
      {
        msdichvu: msdichvu,
        sotien: sotien,
        phanbogia: 1,
        loai: "phanbo",
      },
      function (data, textStatus, jqXHR) {
        load_dichvu();
        close_modal("form_phanbogia_goidichvu");
      }
    );
  }
}

function huy_phanbo() {
  close_modal("form_phanbogia");
  document.getElementById("phanbo_giaban").checked = false;
}

function huy_phanbo_goidichvu() {
  close_modal("form_phanbogia_goidichvu");
  document.getElementById("phanbo_giaban_goidichvu").checked = false;
}

function change_sotien_dichvu() {
  const msdichvu = $("#msdichvu_add").val();
  const sotien = $("#sotien_dichvu").val().replace(/[.]/g, "");
  const phanbo = $("#phanbo_giaban").is(":checked");

  $.post(
    "ajax/dichvu/lieutrinh/change_sotien_dichvu.php",
    {
      msdichvu: msdichvu,
      sotien: sotien,
      phanbogia: phanbo == true ? 1 : 0,
      loai: "sotien",
    },
    function (data, textStatus, jqXHR) {
      load_dichvu();
      $("#btn_reload_sotien_phanbo").removeClass("hidden");
      $("#btn_edit_sotien_phanbo").addClass("hidden");
      $("#btn_reload_sotien_phanbo").addClass("animate-spin");
      setTimeout(() => {
        $("#btn_reload_sotien_phanbo").addClass("hidden");
        $("#btn_edit_sotien_phanbo").removeClass("hidden");
        $("#btn_reload_sotien_phanbo").removeClass("animate-spin");
      }, 1000);
      if (phanbo == true) {
        $.post(
          "ajax/dichvu/lieutrinh/get_sotien_chitiet_dichvu.php",
          { msdichvu: msdichvu, mshh: "", loai: "Luu" },
          function (data, textStatus, jqXHR) {}
        );
      }
      chitiet_khonglieutrinh(msdichvu, "0");
    }
  );
}
function change_sotien_goidichvu() {
  const msdichvu = $("#msdichvu_goidichvu").val();
  const sotien = $("#sotien_goidichvu").val().replace(/[.]/g, "");
  const phanbo = $("#phanbo_giaban_goidichvu").is(":checked");

  $.post(
    "ajax/dichvu/lieutrinh/change_sotien_dichvu.php",
    {
      msdichvu: msdichvu,
      sotien: sotien,
      phanbogia: phanbo == true ? 1 : 0,
      loai: "sotien",
    },
    function (data, textStatus, jqXHR) {
      load_dichvu();
      setTimeout(() => {
        load_chitiet_goidichvu(msdichvu);
      }, 1000);
      $("#btn_reload_sotien_phanbo_goidichvu").removeClass("hidden");
      $("#btn_edit_sotien_phanbo_goidichvu").addClass("hidden");
      $("#btn_reload_sotien_phanbo_goidichvu").addClass("animate-spin");
      setTimeout(() => {
        $("#btn_reload_sotien_phanbo_goidichvu").addClass("hidden");
        $("#btn_edit_sotien_phanbo_goidichvu").removeClass("hidden");
        $("#btn_reload_sotien_phanbo_goidichvu").removeClass("animate-spin");
      }, 1000);
      if (phanbo == true) {
        $.post(
          "ajax/dichvu/lieutrinh/get_sotien_chitiet_dichvu.php",
          { msdichvu: msdichvu, mshh: "", loai: "Luu" },
          function (data, textStatus, jqXHR) {}
        );
      }
    }
  );
}