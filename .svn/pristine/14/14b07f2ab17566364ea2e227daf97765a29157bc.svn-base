function load_phanloai() {
  $("#btn_add").addClass("hidden");

  $.post(
    "ajax/danhmuc/load_phanloai.php",
    {},
    function (data, textStatus, jqXHR) {
      $("#list_phanloai").append(
        ` <option class='text-[#747474]' value="">Chọn phân loại</option>`
      );
      for (let i = 0; i < data.length; i++) {
        if (data[i].phanloai != "chucvu") {
          switch (data[i].phanloai) {
            case "dichvu":
              $("#list_phanloai").append(`
          <option class='text-black' data-danhmuc='NDV' value='${data[i].phanloai}'>${data[i].tenphanloai}</option>
          `);
              break;
            case "hangsx":
              $("#list_phanloai").append(`
            <option class='text-black' data-danhmuc='HSX' value='${data[i].phanloai}'>${data[i].tenphanloai}</option>
            `);
              break;
            case "loai_hh":
              $("#list_phanloai").append(`
              <option class='text-black' data-danhmuc='LHH' value='${data[i].phanloai}'>${data[i].tenphanloai}</option>
              `);
              break;

            case "loaixuat":
              $("#list_phanloai").append(`
                  <option class='text-black' data-danhmuc='NLX' value='${data[i].phanloai}'>${data[i].tenphanloai}</option>
                  `);
              break;
            case "nhacc":
              $("#list_phanloai").append(`
                    <option class='text-black' data-danhmuc='NCC' value='${data[i].phanloai}'>${data[i].tenphanloai}</option>
                    `);
              break;
            case "nhom":
              $("#list_phanloai").append(`
                      <option class='text-black' data-danhmuc='NHH' value='${data[i].phanloai}'>${data[i].tenphanloai}</option>
                      `);
              break;
            case "khoanmuc":
              $("#list_phanloai").append(`
                      <option class='text-black' data-danhmuc='LTC' value='${data[i].phanloai}'>${data[i].tenphanloai}</option>
                      `);
              break;
            case "dvt":
              $("#list_phanloai").append(`
                      <option class='text-black' data-danhmuc='DVT' value='${data[i].phanloai}'>${data[i].tenphanloai}</option>
                      `);
              break;
            case "phongban":
              $("#list_phanloai").append(`
                        <option class='text-black' data-danhmuc='LPB' value='${data[i].phanloai}'>${data[i].tenphanloai}</option>
                        `);
              break;
            case "ycdg":
              $("#list_phanloai").append(`
                        <option class='text-black' data-danhmuc='YCD' value='${data[i].phanloai}'>${data[i].tenphanloai}</option>
                        `);
              break;
            case "ycms":
              $("#list_phanloai").append(`
                        <option class='text-black' data-danhmuc='YCM' value='${data[i].phanloai}'>${data[i].tenphanloai}</option>
                        `);
              break;
            case "ychd":
              $("#list_phanloai").append(`
                        <option class='text-black' data-danhmuc='YCH' value='${data[i].phanloai}'>${data[i].tenphanloai}</option>
                        `);
              break;
            case "XHS":
              $("#list_phanloai").append(`
                          <option class='text-black' data-danhmuc='XHS' value='${data[i].phanloai}'>${data[i].tenphanloai}</option>
                          `);
              break;
              case "ttcrm":
                $("#list_phanloai").append(`
                            <option class='text-black' data-danhmuc='TTC' value='${data[i].phanloai}'>${data[i].tenphanloai}</option>
                            `);
                break;
            default:
              break;
          }
        }
      }
    }
  );
}
function load_danhmuc() {
  const phanloai = $("#list_phanloai option:selected").val();
  const tenphanloai = $("#list_phanloai option:selected").text();

  $(".tenphanloai_btn").html(tenphanloai);
  $("#btn_add").removeClass("hidden");
  $("#dieukien1").addClass("hidden");
  $("#dieukien2").addClass("hidden");
  $(".chucvu").addClass("hidden");

  $("#list_danhmuc").html("");
  if (phanloai == "khoanmuc") {
    $("#btn_add").addClass("hidden");
  }
  $.post(
    "ajax/danhmuc/load_danhmuc.php",
    {
      phanloai: phanloai,
    },
    function (data, textStatus, jqXHR) {
      if (phanloai == "chucvu") {
        $("#dieukien1").removeClass("hidden");
        $("#dieukien").removeClass("hidden");
        $(".chucvu").removeClass("hidden");
      }
      if (phanloai == "loai_nv") {
        $("#dieukien1").removeClass("hidden");
        $(".chucvu").removeClass("hidden");
      }
      let chucvu = "";
      let edit_delete = "";
      for (let i = 0; i < data.length; i++) {
        edit_delete = "";
        if (phanloai == "chucvu") {
          chucvu = `<td class=" px-4 py-2 text-center font-thin">${data[i].dieukien1}</td>
        <td class=" px-4 py-2 text-center font-thin">${data[i].dieukien}</td>
        `;
        }
        if (phanloai == "loai_nv") {
          chucvu = `<td class=" px-4 py-2 text-center font-thin">${data[i].dieukien1}</td>`;
        }
        if (data[i].admin != "1") {
          edit_delete = `<button onclick="open_edit_danhmuc('${data[i].msloai}','${data[i].tenloai}','${data[i].dieukien1}','${data[i].dieukien}')">
              <img src='vendor/img/edit.png'>
          </button>
          <button onclick="open_delete_danhmuc('${data[i].msloai}','${data[i].tenloai}')">
              <img src='vendor/img/delete.png'>
          </button>`;
        }
        $("#list_danhmuc").append(`
        <tr class="active_items item_line border-b border-dashed border-[#ffffff40]" onclick='active_item(this)'>
        <td class=" px-4 py-2 text-center font-thin">${i + 1}</td>
        <td class=" px-4 py-2 text-start font-thin">${data[i].tenloai}</td>
        ${chucvu}
        <td class=" px-4 py-2  gap-3 flex justify-center">
       ${edit_delete}
        </td>
    </tr>
        `);
      }
    }
  );
}

function open_delete_danhmuc(msloai, tenloai) {
  open_modal("form_delete_danhmuc");
  $("#ten_danhmuc_delete").html(tenloai);
  $("#msloai_delete").val(msloai);
}

function delete_danhmuc() {
  const msloai = $("#msloai_delete").val();
  const phanloai = $("#list_phanloai option:selected").val();
  $.post(
    "ajax/danhmuc/delete_danhmuc.php",
    { msloai: msloai, phanloai: phanloai },
    function (data, textStatus, jqXHR) {
      close_modal("form_delete_danhmuc");
      load_danhmuc();
    }
  );
}

function add_danhmuc() {
  const phanloai = $("#list_phanloai option:selected").val();
  const tenphanloai = $("#list_phanloai option:selected").text();
  const id_danhmuc = $("#list_phanloai option:selected").data("danhmuc");
  const tenloai = $("#tenloai_add").val();
  const ptphucap = $("#ptphucap_add").val();
  const dieukien0 = $("#ngaynghi_add").val();
  $.post(
    "ajax/danhmuc/add_danhmuc.php",
    {
      phanloai: phanloai,
      tenphanloai: tenphanloai,
      tendanhmuc: tenloai,
      loai: ptphucap,
      id_danhmuc: id_danhmuc,
      dieukien0: dieukien0,
    },
    function (data, textStatus, jqXHR) {
      close_modal("form_add_danhmuc");
      load_danhmuc();
    }
  );
}

function open_edit_danhmuc(msloai, tenloai, dieukien1, dieukien0) {
  open_modal("form_edit_danhmuc");
  $("#tenloai_edit").val(tenloai);
  $("#ptphucap_edit").val(dieukien1);
  $("#ngaynghi_edit").val(dieukien0);
  $("#msloai_edit").val(msloai);
}
function edit_danhmuc() {
  const phanloai = $("#list_phanloai option:selected").val();
  const tenloai = $("#tenloai_edit").val();
  const msloai = $("#msloai_edit").val();
  const ptphucap = $("#ptphucap_edit").val();
  const dieukien0 = $("#ngaynghi_edit").val();
  $.post(
    "ajax/danhmuc/edit_danhmuc.php",
    {
      phanloai: phanloai,
      msloai: msloai,
      tenloai: tenloai,
      dieukien1: ptphucap,
      dieukien0: dieukien0,
    },
    function (data, textStatus, jqXHR) {
      close_modal("form_edit_danhmuc");
      load_danhmuc();
    }
  );
}
