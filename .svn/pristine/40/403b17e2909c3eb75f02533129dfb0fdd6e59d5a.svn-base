function _ChangeFormat(e) {
  var soluong = $(e).val().replace(/[.]/g, "");
  soluong = $(e)
    .val()
    .replace(/[.]/g, "")
    .toString()
    .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
  $(e).val(soluong);
}

function load_member() {
  $.post(
    "ajax/member/load_member.php",
    { loai: "NKH" },
    function (data, textStatus, jqXHR) {
      $("#list_member").html(data);
    }
  );
}
function load_wallet() {
  $.post(
    "ajax/member/load_member.php",
    { loai: "GNT" },
    function (data, textStatus, jqXHR) {
      $("#list_vi").html(data);
    }
  );
}

function add_member(loai) {
  const tennhom = $("#tennhom_add").val();
  const ptgiam = $("#ptgiam_add").val();
  const sotientu = $("#sotientu_add").val().replace(/[.]/g, "");
  const sotienden = $("#sotienden_add").val().replace(/[.]/g, "");
  $.post(
    "ajax/member/add_member.php",
    {
      tennhom: tennhom,
      ptgiam: ptgiam,
      sotientu: sotientu,
      sotienden: sotienden,
      loai: loai,
    },
    function (data, textStatus, jqXHR) {
      close_modal("form_add_member");
      if (loai == "NKH") {
        load_member();
      } else {
        load_wallet();
      }
    }
  );
}
function open_edit_member(msnhom, tennhom, ptgiam, sotientu, sotienden) {
  open_modal("form_edit_member");
  $("#msnhom_edit").val(msnhom);
  $("#tennhom_edit").val(tennhom);
  $("#ptgiam_edit").val(ptgiam);
  $("#sotientu_edit").val(
    sotientu.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
  $("#sotienden_edit").val(
    sotienden.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
  );
}

function edit_member() {
  const msnhom = $("#msnhom_edit").val();
  const tennhom = $("#tennhom_edit").val();
  const ptgiam = $("#ptgiam_edit").val();
  const sotientu = $("#sotientu_edit").val().replace(/[.]/g, "");
  const sotienden = $("#sotienden_edit").val().replace(/[.]/g, "");
  $.post(
    "ajax/member/edit_member.php",
    {
      msnhom: msnhom,
      tennhom: tennhom,
      ptgiam: ptgiam,
      sotientu: sotientu,
      sotienden: sotienden,
    },
    function (data, textStatus, jqXHR) {
      close_modal("form_edit_member");
      load_member();
    }
  );
}

function open_delete_member(msnhom, tennhom) {
  $("#msnhom_delete").val(msnhom);
  $("#tennhom_delete").html(tennhom);
  open_modal("form_delete_member");
}

function delete_member() {
  const msnhom = $("#msnhom_delete").val();
  $.post(
    "ajax/member/delete_member.php",
    { msnhom: msnhom },
    function (data, textStatus, jqXHR) {
      close_modal("form_delete_member");
      load_member();
    }
  );
}

function load_phankhuc() {
  $.post(
    "ajax/member/load_phankhuc.php",
    {},
    function (data, textStatus, jqXHR) {
      $("#list_phankhuc").html(data);
      for (let i = 0; i < data.length; i++) {
        $("#list_phankhuc").append(`
        <tr class="active_items item_line items border-b border-dashed border-[#ffffff40]" onclick='active_item(this)'>
        <th class=" px-4 py-2 text-center font-thin">${i + 1}</th>
        <th class=" px-4 py-2 text-center font-thin">${data[i].dieukien1}</th>
        <th class=" px-4 py-2 text-center font-thin ">${data[i].dieukien2}</th>
        <th class=" px-4 py-2 font-thin ">
            <div class="flex gap-3 items-center justify-center">
                <button onclick="open_edit_phankhuc('${data[i].rowid}','${
          data[i].dieukien1
        }','${data[i].dieukien2}')">
                    <img class="min-w-[20px] max-w-[20px]" src='vendor/img/edit.png'>
                </button>
                <button onclick="open_delete_phankhuc('${data[i].rowid}','${
          data[i].dieukien1
        }','${data[i].dieukien2}')">
                    <img class="min-w-[20px] max-w-[20px]" src='vendor/img/delete.png'>
                </button>
            </div>
        </th>
    </tr>
        `);
      }
    }
  );
}

function add_phankhuc() {
  const tuoitu = $("#tuoitu_add").val().replace(/[.]/g, "");
  const tuoiden = $("#tuoiden_add").val().replace(/[.]/g, "");
  $.post(
    "ajax/member/add_phankhuc.php",
    {
      tuoitu: tuoitu,
      tuoiden: tuoiden,
    },
    function (data, textStatus, jqXHR) {
      close_modal("form_add_phankhuc");
      $("#tuoitu_add").val("");
      $("#tuoiden_add").val("");
      load_phankhuc();
    }
  );
}

function open_edit_phankhuc(rowid, dieukien1, dieukien2) {
  $("#tuoitu_edit").val(dieukien1);
  $("#tuoiden_edit").val(dieukien2);
  $("#rowid_phankhuc_edit").val(rowid);
  open_modal("form_edit_phankhuc");
}
function edit_phankhuc() {
  const tuoitu = $("#tuoitu_edit").val().replace(/[.]/g, "");
  const tuoiden = $("#tuoiden_edit").val().replace(/[.]/g, "");
  const rowid = $("#rowid_phankhuc_edit").val();

  $.post(
    "ajax/member/edit_phankhuc.php",
    {
      rowid: rowid,
      tuoitu: tuoitu,
      tuoiden: tuoiden,
    },
    function (data, textStatus, jqXHR) {
      close_modal("form_edit_phankhuc");
      $("#tuoitu_edit").val("");
      $("#rowid_phankhuc_edit").val("");
      $("#tuoiden_edit").val("");
      load_phankhuc();
    }
  );
}
function open_delete_phankhuc(msnhom, dieukien1, dieukien2) {
  $("#rowid_delete").val(msnhom);
  $("#tenphankhuc_delete").html("Tuổi từ " + dieukien1 + " dến " + dieukien2);
  open_modal("form_delete_phankhuc");
}

function delete_member() {
  const rowid = $("#rowid_delete").val();
  $.post(
    "ajax/member/delete_phankhuc.php",
    { rowid: rowid },
    function (data, textStatus, jqXHR) {
      close_modal("form_delete_phankhuc");
      load_phankhuc();
    }
  );
}
