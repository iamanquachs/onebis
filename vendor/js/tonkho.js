function load_tonkho() {
  const msdv = $("#list_chinhanh option:selected").val();
  const songayhethan = $("#songayhethan").val();
  const vuotdinhmuc = document.getElementById("vuotdinhmuc").checked;
  $.post(
    "ajax/tonkho/load_tonkho.php",
    {
      msdv: msdv == undefined ? "" : msdv,
      songayhethan: songayhethan == "" ? 0 : songayhethan,
      vuotdinhmuc: vuotdinhmuc == true ? "1" : "",
    },
    function (data, textStatus, jqXHR) {
      $("#chitiet_tonkho").html(data);
      $(".img_load_tonkho").addClass("animate-spin");
      setTimeout(() => {
        $(".img_load_tonkho").removeClass("animate-spin");
      }, 1000);
    }
  );
}
function load_chinhanh() {
  $.post("ajax/baocao/load_chinhanh.php", {}, function (data) {
    $("#list_chinhanh").html(data);
  });
}
function tonkho_search() {
  var input, filter, table, tr, td, i, j, cell;
  input = document.getElementById("search");
  filter = input.value
    .toUpperCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "")
    .replace(/[đĐ]/g, (m) => (m === "đ" ? "d" : "D"));
  table = document.getElementById("chitiet_tonkho");
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
