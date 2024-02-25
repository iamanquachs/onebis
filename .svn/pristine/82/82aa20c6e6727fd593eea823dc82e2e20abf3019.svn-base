function load_thamso() {
  $.post(
    "ajax/thamsohethong/load_thamsohethong.php",
    { mshs: "", msdv: "", msthamso: "" },
    function (data, textStatus, jqXHR) {
      $("#list_thamso").html("");
      for (let i = 0; i < data.length; i++) {
        let img_edit = "";
        if (data[i].admin == 0) {
          img_edit = `<img onclick="open_edit_thamso('${data[i].msthamso}','${data[i].tenthamso}','${data[i].giatri}')" src='vendor/img/edit.png'>`;
        }
        $("#list_thamso").append(`
        <tr class="active_items item_line items border-b border-dashed border-[#ffffff40]" onclick='active_item(this)'>
        <td class="font-thin text-center px-4 py-2">${i + 1}</td>
        <td class="search_key font-thin text-left px-4 py-2">${
          data[i].tenthamso
        }</td>
        <td class="font-thin text-center px-4 py-2">${data[i].giatri}</td>
        <td class="font-thin flex justify-center px-4 py-2">
        ${img_edit}
        </td>
        </tr>
        `);
      }
    }
  );
}

function open_edit_thamso(msthamso, tenthamso, giatri) {
  open_modal("form_edit_thamso");
  $("#msthamso_edit").val(msthamso);
  $("#tenthamso_edit").html(tenthamso);
  $("#giatrithamso_edit").val(giatri);
  $("#form_list_bank").addClass("hidden");
  $("#form_bin_bank").removeClass("hidden");

  if (msthamso == "BANK_BIN") {
    $("#form_list_bank").removeClass("hidden");
    $("#form_bin_bank").addClass("hidden");
  }
}

function edit_thamso() {
  const msthamso = $("#msthamso_edit").val();
  const giatri = $("#giatrithamso_edit").val();
  $.post(
    "ajax/thamsohethong/edit_thamsohethong.php",
    {
      msthamso: msthamso,
      giatri: giatri,
    },
    function (data, textStatus, jqXHR) {
      load_thamso();
      close_modal("form_edit_thamso");
    }
  );
}

function thamso_search(e) {
  var input, filter, table, tr, td, i, j, cell;
  input = document.getElementById("search");
  filter = input.value
    .toUpperCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "")
    .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"));
  table = document.getElementById("list_thamso");
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

function load_nganhang() {
  $.post(
    "ajax/thamsohethong/load_nganhang.php",
    {},
    function (data, textStatus, jqXHR) {
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
