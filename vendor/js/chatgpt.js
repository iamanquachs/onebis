var listmessages = [];
var soluong = 0;
function call_chatgpt(tendv, soct) {
  let value = $("#value_send").val();
  const value_chatai = $("#ID_chatai").val();
  const tenchude = $("#tenchude_add").val();
  if (value != "") {
    if (soluong < value_chatai) {
      $("#item_send").append(
        `<div class='w-full flex justify-start mb-3'>
    <div class='flex-row justify-start'>
    <p class='font-medium font_semi text-[#d3fbd3] flex gap-3'>${tendv}</p>
    <p class='pl-5 text-justify '>${value}</p>
    </div>
    </div>`
      );
      $("#loading_icon").removeClass("hidden");

      var myHeaders = new Headers();
      myHeaders.append(
        "Authorization",
        "Bearer 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"
      );
      myHeaders.append("Content-Type", "application/json");
      myHeaders.append(
        "Cookie",
        "__cf_bm=jweH.mO6TAxk8yD4.SMYpU46tmVy0WYlxWMViHrOXfc-1704187206-1-AQO1F7bh/DjL4zvgxk9AXa1SX9mclghB4sX0LhUWYEU6SAJusLlaqryN5/w/snQW0Rw03jRygVHpUcI/NhDcwKk=; _cfuvid=Hi2bO1xdvZe0restN1ZJ7OoYeS6dEYymrfYv41dE5jE-1704187206998-0-604800000"
      );

      listmessages.push({
        role: "user",
        content: value,
      });
      var raw = JSON.stringify({
        model: "gpt-3.5-turbo",
        messages: listmessages,

        temperature: 1,
        max_tokens: 3000,
        top_p: 1,
        frequency_penalty: 0,
        presence_penalty: 0,
      });

      var requestOptions = {
        method: "POST",
        headers: myHeaders,
        body: raw,
        redirect: "follow",
      };

      fetch("https://api.openai.com/v1/chat/completions", requestOptions)
        .then((response) =>
          response.text().then((text) => {
            $("#item_send").append(
              `<div class='w-full flex justify-start mb-3'>
            <div class='flex-row w-full justify-start'>
            <p class='font-medium font_semi text-[#ff91ff] flex gap-3'>ONEBIS</p>
            <pre class='w-full pl-5 leading-8 text-justify' style='font-family: "OpenSans-Regular";text-wrap: wrap;'>${
              JSON.parse(text).choices[0].message.content
            }</pre>
            </div>
            </div>`
            );
            listmessages.push({
              role: "assistant",
              content: JSON.parse(text).choices[0].message.content,
            });
            $.post(
              "ajax/chat/add_tinnhan.php",
              {
                question: value,
                answer: JSON.parse(text).choices[0].message.content,
                soct: soct,
                tenchude: tenchude,
              },
              function (data, textStatus, jqXHR) {
                load_soluong_tinnhan();
                if (listmessages.length <= 2) {
                  load_lichsu(soct);
                }
                window.scrollTo(0, document.body.scrollHeight);
              }
            );

            $("#value_send").val("");
            $("#loading_icon").addClass("hidden");
          })
        )
        .then((result) => result)
        .catch((error) => console.log("error", error));
    } else {
      open_modal("form_soluong");
    }
  }
}
function load_soluong_tinnhan() {
  const value_chatai = $("#ID_chatai").val();
  $.post(
    "ajax/chat/load_soluong_tinnhan.php",
    {},
    function (data, textStatus, jqXHR) {
      soluong = Number(data[0].soluong);
      $("#soluong_tinnhan").text(value_chatai - Number(data[0].soluong));
    }
  );
}

function load_lichsu(old_soct) {
  listmessages = [];
  $.post(
    "ajax/chat/load_lichsu.php",
    { old_soct: old_soct },
    function (data, textStatus, jqXHR) {
      $("#list_lichsu").html("");
      $("#list_lichsu_mobile").html("");
      for (let i = 0; i < data.length; i++) {
        $("#list_lichsu")
          .append(`<li id='${data[i].soct}' class="item_lichsu hover:cursor-pointer w-full flex items-center justify-between gap-3 text-md mt-2 text-white px-2 hover:text-[#f9b5f9]">
        <div tabindex="0" class=" w-full grid grid-cols-12 items-center justify-between ">
            <div onclick=" show_chitiet('${data[i].soct}', '${data[i].tenchude}','${old_soct}')" class="col-span-11  flex gap-3 ">
                <span class='col-span-3'>${data[i].ngay}</span>
                <span class="line-clamp-1 col-span-6">
                    <p class="p_tenchude  ">
                        ${data[i].tenchude}
                    </p>
                    <input onfocusout="edit_chude(this,'${data[i].soct}','${old_soct}')" class="input_tenchude hidden w-[200px] bg-transparent border-b border-blue-500  focus:outline" value="${data[i].tenchude}">
                </span>
            </div>
            <button class="col-span-1 flex justify-end group p-2 text-[16px] relative text-white focus:outline-none">
                <img src='vendor/img/triple_dots.png'>
                <ul class="hidden group-focus-within:block list-none absolute  top-[70%] bg-gray-50 w-40 z-10 shadow-lg animate-slideIn">
                    <li onclick="show_edit_chude(this)" class="text-left py-3 px-4 cursor-pointer hover:bg-gray-200 text-black">Chỉnh</li>
                    <li onclick="open_delete_chude('${data[i].soct}','${data[i].tenchude}')" class="text-left py-3 px-4 cursor-pointer hover:bg-gray-200 text-black">Xóa</li>
                </ul>
            </button>
        </div>
    </li>`);
        $("#list_lichsu_mobile")
          .append(`<li id='${data[i].soct}mobile' class="item_lichsu hover:cursor-pointer w-full flex items-center justify-between gap-3 text-md mt-2 text-black  rounded-xl  px-2 hover:text-[#f9b5f9]">
  <div tabindex="0" class=" w-full  flex items-center justify-between ">
      <div onclick="show_chitiet('${data[i].soct}', '${data[i].tenchude}','${old_soct}')" class="flex gap-3 ">
          <span>${data[i].ngay}</span>
          <span class="line-clamp-1">
              <p class="p_tenchude">
                  ${data[i].tenchude}
              </p>
              <input onfocusout="edit_chude(this,'${data[i].soct}','${old_soct}')" class="input_tenchude hidden w-[200px] bg-transparent border-b border-blue-500  focus:outline" value="${data[i].tenchude}">
          </span>
      </div>
      <button class=" group p-2 text-[16px] relative text-white focus:outline-none">
          <img src='vendor/img/triple_dots.png'>
          <ul class="hidden group-focus-within:block list-none absolute  top-[70%] bg-gray-50 w-40 z-10 shadow-lg animate-slideIn">
              <li onclick="show_edit_chude(this)" class="text-left py-3 px-4 cursor-pointer hover:bg-gray-200 text-black">Chỉnh</li>
              <li onclick="open_delete_chude('${data[i].soct}','${data[i].tenchude}')" class="text-left py-3 px-4 cursor-pointer hover:bg-gray-200 text-black">Xóa</li>
          </ul>
      </button>
  </div>
</li>`);
        if (old_soct == data[i].soct) {
          $("#tenchude_add").val(data[i].tenchude);
          $(`#${data[i].soct}`).addClass("active_chat");
          $(`#${data[i].soct}mobile`).addClass("active_chat");
          $(`#${data[i].soct}mobile`).addClass("!text-white");
        }
      }
    }
  );
}
function show_edit_chude(e) {
  $(e).parent().parent().parent().find(".input_tenchude").removeClass("hidden");
  $(e).parent().parent().parent().find(".p_tenchude").addClass("hidden");
  $(e).parent().parent().parent().find(".input_tenchude").focus();
}

function open_delete_chude(soct, tenchude) {
  open_modal("form_delete_chude");
  $("#tenchude_delete").html(tenchude);
  $("#soct_delete").val(soct);
}

function delete_chude(old_soct) {
  const soct = $("#soct_delete").val();
  $.post(
    "ajax/chat/delete_chude.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {
      load_lichsu(old_soct);
      close_modal("form_delete_chude");
      listmessages = [];
      $("#item_send").html("");
    }
  );
}

function edit_chude(e, soct, old_soct) {
  const tenchude = $(e).val();
  $.post(
    "ajax/chat/edit_chude.php",
    { tenchude: tenchude, soct: soct },
    function (data, textStatus, jqXHR) {
      load_lichsu(old_soct);
    }
  );
}

function show_chitiet(soct, tenchude, old_soct) {
  location.href = location.href.replace(old_soct, soct);
}

function new_chat(old_soct, soct) {
  location.href = location.href.replace(old_soct, soct);
}

function load_chitiet_lichsu(tendv, soct) {
  $.post(
    "ajax/chat/load_chitiet_lichsu.php",
    { soct: soct },
    function (data, textStatus, jqXHR) {
      $("#tenchude_add").val(data[0].tenchude);
      listmessages = [];
      for (let i = 0; i < data.length; i++) {
        listmessages.push({
          role: "user",
          content: data[i].question,
        });
        listmessages.push({
          role: "assistant",
          content: data[i].answer,
        });
        $("#item_send").append(
          `<div class='w-full flex justify-start mb-3'>
      <div class='flex-row justify-start'>
      <p class='font-medium font_semi text-[#d3fbd3] flex gap-3'>${tendv}</p>
      <p class='pl-5 text-justify '>${data[i].question}</p>
      </div>
      </div>`
        );
        $("#item_send").append(
          `<div class='w-full flex justify-start mb-3'>
        <div class='flex-row w-full justify-start'>
        <p class='font-medium font_semi text-[#ff91ff] flex gap-3'>ONEBIS</p>
        <pre class='w-full pl-5 leading-8 text-justify' style='font-family: "OpenSans-Regular";text-wrap: wrap;'>${data[i].answer}</pre>
        </div>
        </div>`
        );
      }
    }
  );
}

function load_goiy(tendv, soct) {
  $.post(
    "ajax/danhmuc/load_danhmuc.php",
    { phanloai: "XHS" },
    function (data, textStatus, jqXHR) {
      $("#list_goiy").html("");
      $("#list_goiy_mobile").html("");
      for (let i = 0; i < data.length; i++) {
        $("#list_goiy").append(
          `<p onclick="chon_goiy('${tendv}','${soct}','${data[i].tenloai}')" class='border border-[#ffffff40] rounded-full px-3 py-2 text-white hover:cursor-pointer hover:bg-[#693b85]' >${data[i].tenloai}</p>`
        );
        $("#list_goiy_mobile").append(
          `<p onclick="chon_goiy('${tendv}','${soct}','${data[i].tenloai}')" class='border border-black rounded-full px-3 py-2 text-black hover:cursor-pointer hover:bg-[#693b85]' >${data[i].tenloai}</p>`
        );
      }
    }
  );
}

function chon_goiy(tendv, soct, goiy) {
  $("#value_send").val(goiy);
  setTimeout(() => {
    call_chatgpt(tendv, soct);
  }, 500);
  $("#modal_xuhuong").addClass("hidden");
  $("#modal_nhatky").addClass("hidden");
}

function show_xuhuong(e) {
  $("#xuhuong").removeClass("tablet:hidden");
  $("#nhatky").addClass("tablet:hidden");
  $("#icon_hide_xuhuong").removeClass("hidden");
  $("#icon_show_xuhuong").addClass("hidden");
  $("#form_xuhuong").removeClass("tablet:col-span-1");
  $("#form_xuhuong").addClass("tablet:col-span-4");
  $("#form_chat").addClass("tablet:col-span-7");
  $("#form_chat").removeClass("tablet:col-span-10");
  $("#form_nhatky").removeClass("tablet:col-span-4");
  $("#form_nhatky").addClass("tablet:col-span-1");

  $("#icon_show_nhatky").removeClass("hidden");
  $("#icon_hide_nhatky").addClass("hidden");
}
function hide_xuhuong(e) {
  $("#icon_hide_xuhuong").addClass("hidden");
  $("#icon_show_xuhuong").removeClass("hidden");
  $("#xuhuong").addClass("tablet:hidden");
  $("#form_xuhuong").addClass("tablet:col-span-1");
  $("#form_xuhuong").removeClass("tablet:col-span-4");
  $("#form_chat").removeClass("tablet:col-span-7");
  $("#form_chat").addClass("tablet:col-span-10");
  $("#form_nhatky").removeClass("tablet:col-span-4");
  $("#form_nhatky").addClass("tablet:col-span-1");
}

function show_nhatky(e) {
  $("#icon_hide_nhatky").removeClass("hidden");
  $("#icon_show_nhatky").addClass("hidden");
  $("#nhatky").removeClass("tablet:hidden");
  $("#xuhuong").addClass("tablet:hidden");
  $("#form_nhatky").removeClass("tablet:col-span-1");
  $("#form_nhatky").addClass("tablet:col-span-4");
  $("#form_chat").addClass("tablet:col-span-7");
  $("#form_chat").removeClass("tablet:col-span-10");
  $("#form_xuhuong").removeClass("tablet:col-span-4");
  $("#form_xuhuong").addClass("tablet:col-span-1");

  $("#icon_hide_xuhuong").addClass("hidden");
  $("#icon_show_xuhuong").removeClass("hidden");
}
function hide_nhatky(e) {
  $("#icon_show_nhatky").removeClass("hidden");
  $("#icon_hide_nhatky").addClass("hidden");
  $("#nhatky").addClass("tablet:hidden");
  $("#form_nhatky").addClass("tablet:col-span-1");
  $("#form_nhatky").removeClass("tablet:col-span-4");
  $("#form_chat").removeClass("tablet:col-span-7");
  $("#form_chat").addClass("tablet:col-span-10");
  $("#form_xuhuong").removeClass("tablet:col-span-4");
  $("#form_xuhuong").addClass("tablet:col-span-1");
}

function open_nhatky() {
  $("#modal_nhatky").removeClass("hidden");
}
function hidden_nhatky() {
  $("#modal_nhatky").addClass("hidden");
}
function open_xuhuong() {
  $("#modal_xuhuong").removeClass("hidden");
}
function hidden_xuhuong() {
  $("#modal_xuhuong").addClass("hidden");
}
