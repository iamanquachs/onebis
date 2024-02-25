<?php
$loaihinh = $_COOKIE['loaihinh'];
$img_avatar_top = '';
$img_bg_top = '';
$img_middle_0 = '';
$img_middle_1 = '';
$img_middle_2 = '';
switch ($loaihinh) {
    case 'LD':
        $img_bg_top = 'bg_top_ld.jpg';
        $img_avatar_top = 'img_avatar_top_ld.png';
        $img_middle_0 = 'img_middle_0_ld.png';
        $img_middle_1 = 'img_middle_1_ld.png';
        $img_middle_2 = 'img_middle_2_ld.png';
        break;
    case 'TM':
        $img_bg_top = 'bg_top_tm.jpg';
        $img_avatar_top = 'img_avatar_top_tm.png';
        $img_middle_0 = 'img_middle_0_tm.png';
        $img_middle_1 = 'img_middle_1_tm.png';
        $img_middle_2 = 'img_middle_2_tm.png';
        break;
    default:
        $img_bg_top = 'bg_top_nk.jpg';
        $img_avatar_top = 'img_avatar_top_nk.png';
        $img_middle_0 = 'img_middle_0_nk.png';
        $img_middle_1 = 'img_middle_1_nk.png';
        $img_middle_2 = 'img_middle_2_nk.png';
        break;
}
?>

<?php if ($_GET['soct'] == 'Review') { ?>
    <main class="bg_main z-[999] absolute top-0 right-0 left-0 overflow-scroll">
        <div class="flex flex-col">
            <!--Grid Form-->

            <div class="flex flex-1  flex-col md:flex-row lg:flex-row">
                <div class="mb-2 w-full  flex flex-col items-center justify-center">
                    <div class="flex justify-between py-3 w-full">
                        <a href="index.html">
                            <img src='vendor/img/arrow_to_left.png'>
                        </a>
                        <div class="flex items-center justify-center gap-4">
                            <button onclick="open_phathanh('<?= $_COOKIE['tendv'] ?>')" class="inline-flex whitespace-nowrap w-full items-center justify-center rounded-md bg-[green] px-7 py-2 text-[14px]  text-white shadow-sm  sm:ml-3  max-w-[100px]">
                                Phát hành
                            </button>
                            <a href="ManageLandingPage/Edit" class="inline-flex whitespace-nowrap w-full items-center justify-center rounded-md bg-[#f5ba53] px-7 py-2 text-[14px]  text-black shadow-sm hover:bg-[#face82] sm:ml-3  max-w-[100px]">
                                Chỉnh sửa
                            </a>
                        </div>
                    </div>
                    <div class="px-2 py-3 w-[60%] phone:w-[100%] tablet:w-[100%] bg-cover  rounded-t-lg" style="background-image: url('vendor/img/<?= $img_bg_top ?>');">
                        <div class="grid grid-cols-12 justify-center mx-48 phone:mx-4 py-12 phone:py-6 tablet:mx-32 laptop:mx-20 items-center">
                            <div class="col-span-5">
                                <?php if ($ld[0]->img_avt  != '') { ?>
                                    <div class="rounded-full">
                                        <img class="rounded-full w-[250px] h-[250px] phone:w-[120px] phone:h-[120px]  border-[5px] border-[#ffffff50]" src="upload/landing_page/<?= $_COOKIE['mshs'] . '/' . $ld[0]->img_avt ?>">
                                    </div>
                                <?php } else { ?>
                                    <div class="rounded-full">
                                        <img class="rounded-full w-[250px] h-[250px] phone:w-[120px] phone:h-[120px]  border-[5px] border-[#ffffff50]" src="vendor/img/<?= $img_avatar_top ?>">
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-span-7">
                                <p class="font_semi text-3xl phone:text-lg"><?= $ld[0]->tieude ?></p>
                                <div class="text_noidung mt-5 !text-lg phone:!text-sm !leading-8 !text-justify line-clamp-5 phone:line-clamp-none">
                                    <?= $ld[0]->noidung ?></div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $lydo = explode('|', $ld[0]->lydo);
                    $img_donvi = explode('|', $ld[0]->img_donvi);
                    ?>
                    <div class="px-2 py-3 w-[60%] phone:w-[100%] tablet:w-[100%] bg-cover h-[300px] phone:h-[250px]  bg-white">
                        <div class="grid grid-cols-12 justify-center mx-48 tablet:mx-32  laptop:mx-20  phone:mx-4 py-5 ">
                            <p class="col-span-12 font_semi text-2xl phone:text-lg w-full text-[#6d0191] text-center pb-8 uppercase"><?= $_COOKIE['tendv'] ?></p>
                            <div class="col-span-12 grid grid-cols-3  gap-10 phone:gap-3">
                                <?php if ($img_donvi[0] != '') { ?>
                                    <div class="rounded-full flex justify-center">
                                        <img class="rounded-full w-[200px] h-[200px] phone:w-[120px] phone:h-[120px]" src="upload/landing_page/<?= $_COOKIE['mshs'] . '/' . $img_donvi[0] ?>">
                                    </div>
                                <?php } else { ?>
                                    <div class="rounded-full  flex justify-center">
                                        <img class="rounded-full w-[200px] h-[200px] phone:w-[120px] phone:h-[120px]" src="vendor/img/<?= $img_middle_0 ?>">
                                    </div>
                                <?php } ?>
                                <?php if ($img_donvi[1] != '') { ?>
                                    <div class="rounded-full  flex justify-center">
                                        <img class="rounded-full w-[200px] h-[200px] phone:w-[120px] phone:h-[120px]" src="upload/landing_page/<?= $_COOKIE['mshs'] . '/' . $img_donvi[1] ?>">
                                    </div>
                                <?php } else { ?>
                                    <div class="rounded-full  flex justify-center">
                                        <img class="rounded-full w-[200px] h-[200px] phone:w-[120px] phone:h-[120px]" src="vendor/img/<?= $img_middle_1 ?>">
                                    </div>
                                <?php } ?>
                                <?php if ($img_donvi[2] != '') { ?>

                                    <div class="rounded-full flex justify-center">
                                        <img class="rounded-full w-[200px] h-[200px] phone:w-[120px] phone:h-[120px]" src="upload/landing_page/<?= $_COOKIE['mshs'] . '/' . $img_donvi[2] ?>">
                                    </div>
                                <?php } else { ?>
                                    <div class="rounded-full flex justify-center">
                                        <img class="rounded-full w-[200px] h-[200px] phone:w-[120px] phone:h-[120px]" src="vendor/img/<?= $img_middle_2 ?>">
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="px-2 py-3 w-[60%] phone:w-[100%] tablet:w-[100%] bg-cover h-[300px] phone:h-auto bg-[#efefef]">
                        <div class="grid grid-cols-12 justify-center mx-48 tablet:mx-32  laptop:mx-20 phone:mx-4 py-5 ">
                            <p class="col-span-12 font_semi text-2xl text-[#6d0191] w-full text-center mb-10">Vì sao chọn chúng tôi</p>
                            <div class="col-span-12 grid grid-cols-12 gap-7 mt-10 text-lg font_semi text-center">
                                <div class="col-span-4 phone:col-span-12 relative flex items-center rounded-lg shadow-lg bg-[#fefefe] w-full h-[150px]">
                                    <div class="p-2 w-full">
                                        <p class="line-clamp-3 text-center  w-full">
                                            <?= $lydo[0] ?>
                                        </p>
                                    </div>
                                    <div class="absolute top-[-50px] left-[50%] translate-x-[-50%]">
                                        <img class="w-[80px] h-[80px]  rounded-full bg-white p-2" src='vendor/img/why1.png'>
                                    </div>
                                </div>
                                <div class="col-span-4 phone:col-span-12 relative flex items-center rounded-lg shadow-lg bg-[#fefefe] w-full h-[150px] phone:mt-10">
                                    <div class="p-2 w-full ">
                                        <p class="line-clamp-3 w-full text-center  ">
                                            <?= $lydo[1] ?>
                                        </p>
                                    </div>
                                    <div class="absolute top-[-50px] left-[50%] translate-x-[-50%]">
                                        <img class="w-[80px] h-[80px]  rounded-full bg-white p-2" src='vendor/img/why2.png'>
                                    </div>
                                </div>
                                <div class="col-span-4 phone:col-span-12 relative flex items-center rounded-lg shadow-lg bg-[#fefefe] w-full h-[150px] phone:mt-10">
                                    <div class="p-2 w-full">
                                        <p class="line-clamp-3 w-full text-center ">
                                            <?= $lydo[2] ?>
                                        </p>
                                    </div>
                                    <div class="absolute top-[-50px] left-[50%] translate-x-[-50%]">
                                        <img class="w-[80px] h-[80px] rounded-full bg-white p-2" src='vendor/img/why3.png'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-2 py-3 w-[60%] phone:w-[100%] tablet:w-[100%] bg-cover h-[370px]  phone:h-auto bg-[#ffffff] rounded-b-lg">
                        <div class="grid grid-cols-12 justify-center mx-48 tablet:mx-32  laptop:mx-20 phone:mx-4 py-5 ">
                            <p class="col-span-12 font_semi text-2xl text-[#6d0191] w-full text-center">Yêu cầu tư vấn</p>
                            <div class="col-span-12  mt-6">
                                <div class="grid grid-cols-12  items-center mt-6">
                                    <label class="col-span-2 phone:col-span-4 text-lg" for="sodienthoai_yeucau">Điện thoại (*)</label>
                                    <input id="sodienthoai_yeucau" type='text' class="col-span-10 phone:col-span-8  text-left appearance-none block border-b  border-gray-300 pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-black" autocomplete="off">
                                </div>

                                <div class="grid grid-cols-12 items-center mt-6">
                                    <label class="col-span-2 phone:col-span-4 text-lg" for="hoten_yeucau">Họ tên (*)</label>
                                    <input id="hoten_yeucau" type='text' class="col-span-10 phone:col-span-8  text-left appearance-none block border-b  border-gray-300 pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-black" autocomplete="off">
                                </div>

                                <div class="grid grid-cols-12 items-center mt-6">
                                    <label class="col-span-2 phone:col-span-4 text-lg" for="noidung_yeucau">Nội dung</label>
                                    <input id="noidung_yeucau" class="col-span-10 phone:col-span-8  text-left appearance-none block border-b  border-gray-300 pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-black" autocomplete="off">
                                </div>
                                <div class="grid grid-cols-12 items-center mt-6">
                                    <div class="col-span-2 pb-5"></div>
                                    <div id="" class="col-span-10 flex flex-wrap gap-6 w-full">
                                        <?php
                                        $goiy = explode('|', $ld[0]->goiy);
                                        for ($i = 0; $i < count($goiy); $i++) { ?>
                                            <p onclick="chon_goiy('')" class='border border-[#64646440] rounded-full px-3 py-2 text-black hover:cursor-pointer hover:text-white hover:bg-[#693b85]'><?= $goiy[$i] ?></p>
                                        <?php }
                                        ?>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 mt-6">
                                    <div class="col-span-12 flex justify-end items-center">
                                        <p id="error_send_yeucau" class="text-[red] hidden">Chưa nhập đầy đủ thông tin</p>
                                        <button onclick="send_yeucau()" type="button" class="inline-flex w-full items-center justify-center rounded-md bg-[#d73fbd] px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-[#a90285] sm:ml-3  max-w-[100px]">Gửi</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php } ?>
<?php if ($_GET['soct'] == 'Edit') { ?>
    <main class="bg_main z-[999] absolute top-0 right-0 left-0 overflow-scroll">
        <div class="flex flex-col">
            <!--Grid Form-->

            <div class="flex flex-1  flex-col md:flex-row lg:flex-row">
                <div class="mb-2 w-full  flex flex-col items-center justify-center">
                    <div class="flex justify-between py-3 w-full">
                        <a href="ManageLandingPage/Review">
                            <img src='vendor/img/arrow_to_left.png'>
                        </a>
                        <input hidden id="list_img_donvi_cu" value="<?= $ld[0]->img_donvi ?>">
                        <input hidden id="img_avt_cu" value="<?= $ld[0]->img_avt ?>">
                        <button onclick="edit_landing_page()" class="inline-flex whitespace-nowrap w-full items-center justify-center rounded-md bg-green-500 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-green-600  sm:ml-3  max-w-[100px]">
                            Lưu
                        </button>
                    </div>
                    <div class="px-2 py-3 w-[60%] phone:w-[100%] tablet:w-[100%] bg-cover  rounded-t-lg" style="background-image: url('vendor/img/<?= $img_bg_top ?>');">
                        <div class="grid grid-cols-12 justify-center mx-48 phone:mx-4 py-12 phone:py-6 tablet:mx-32 laptop:mx-20 items-center">
                            <div class="col-span-5">
                                <div class="rounded-full">
                                    <?php if ($ld[0]->img_avt  != '') { ?>
                                        <label for='anh_avt_edit'>
                                            <img id="img_avt" class="rounded-full w-[250px] h-[250px] phone:w-[120px] phone:h-[120px]  border-[5px] border-[#ffffff50]" src="upload/landing_page/<?= $_COOKIE['mshs'] . '/' . $ld[0]->img_avt ?>">
                                        </label>
                                    <?php } else { ?>
                                        <label for='anh_avt_edit'>
                                            <img id="img_avt" class="rounded-full w-[250px] h-[250px] phone:w-[120px] phone:h-[120px]  border-[5px] border-[#ffffff50]" src="vendor/img/avatar_landing.png">
                                        </label>
                                    <?php } ?>
                                    <input type="file" accept="image/*" onchange="_edit_avt(this)" id="anh_avt_edit" hidden />
                                </div>

                            </div>
                            <div class="col-span-7">
                                <input id="text_tieude" class="font_semi text-3xl bg-transparent border-b border-blue-300 phone:text-lg" value="<?= $ld[0]->tieude ?>">
                                <div id="word-count"></div>
                                <textarea class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="text_noidung" name="text_noidung" type="text" maxlength="287"> <?= $ld[0]->noidung ?></textarea>
                                <script>
                                    CKEDITOR.replace('text_noidung', {

                                            toolbarGroups: [{
                                                "name": "basicstyles",
                                                "groups": ["basicstyles"]
                                            }, {
                                                "name": "colors",
                                            }, ],
                                            // Remove the redundant buttons from toolbar groups defined above.
                                            removeButtons: 'Strike,Subscript,Superscript,Anchor,Styles,Specialchar,PasteFromWord',
                                            extraPlugins: 'wordcount',
                                            wordcount: {
                                                "showCharCount": true,
                                                "warnOnLimitOnly": false,
                                                "countSpacesAsChars": true,
                                                "maxCharCount": 287,
                                                "showParagraphs": false,
                                            }
                                        },

                                    );
                                </script>
                            </div>
                        </div>
                    </div>
                    <?php
                    $lydo = explode('|', $ld[0]->lydo);
                    $img_donvi = explode('|', $ld[0]->img_donvi);
                    ?>
                    <div class="px-2 py-3 w-[60%] phone:w-[100%] tablet:w-[100%] bg-cover h-[300px] phone:h-[250px]  bg-white">
                        <div class="grid grid-cols-12 justify-center mx-48 tablet:mx-32  laptop:mx-20  phone:mx-4 py-5 ">
                            <p class="col-span-12 font_semi text-2xl phone:text-lg w-full text-[#6d0191] text-center pb-8 uppercase"><?= $_COOKIE['tendv'] ?></p>
                            <div class="col-span-12 grid grid-cols-3 gap-10 phone:gap-3">
                                <div class="rounded-full">
                                    <?php if ($img_donvi[0] != '') { ?>
                                        <label for='input_edit_img_donvi_1'>
                                            <img id="anh_donvi_1" class="rounded-full w-[200px] h-[200px] phone:w-[120px] phone:h-[120px]" src="upload/landing_page/<?= $_COOKIE['mshs'] . '/' . $img_donvi[0] ?>">
                                        </label>
                                    <?php } else { ?>
                                        <label for='input_edit_img_donvi_1'>
                                            <img id="anh_donvi_1" class="rounded-full w-[200px] h-[200px] phone:w-[120px] phone:h-[120px]" src="vendor/img/item_1.jpg">
                                        </label>
                                    <?php } ?>
                                    <input type="file" accept="image/*" onchange="_edit_img_donvi(this, '1')" id="input_edit_img_donvi_1" hidden />
                                </div>


                                <div class="rounded-full">
                                    <?php if ($img_donvi[1] != '') { ?>
                                        <label for='input_edit_img_donvi_2'>
                                            <img id="anh_donvi_2" class="rounded-full w-[200px] h-[200px] phone:w-[120px] phone:h-[120px]" src="upload/landing_page/<?= $_COOKIE['mshs'] . '/' . $img_donvi[1] ?>">
                                        </label>
                                    <?php } else { ?>
                                        <label for='input_edit_img_donvi_2'>
                                            <img id="anh_donvi_2" class="rounded-full w-[200px] h-[200px] phone:w-[120px] phone:h-[120px]" src="vendor/img/item_2.jpg">
                                        </label>
                                    <?php } ?>
                                    <input type="file" accept="image/*" onchange="_edit_img_donvi(this, '2')" id="input_edit_img_donvi_2" hidden />
                                </div>

                                <div class="rounded-full">
                                    <?php if ($img_donvi[2] != '') { ?>
                                        <label for='input_edit_img_donvi_3'>
                                            <img id="anh_donvi_3" class="rounded-full w-[200px] h-[200px] phone:w-[120px] phone:h-[120px]" src="upload/landing_page/<?= $_COOKIE['mshs'] . '/' . $img_donvi[2] ?>">
                                        </label>
                                    <?php } else { ?>
                                        <label for='input_edit_img_donvi_3'>
                                            <img id="anh_donvi_3" class="rounded-full w-[200px] h-[200px] phone:w-[120px] phone:h-[120px]" src="vendor/img/item_3.jpeg">
                                        </label>

                                    <?php } ?>
                                    <input type="file" accept="image/*" onchange="_edit_img_donvi(this, '3')" id="input_edit_img_donvi_3" hidden />
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="px-2 py-3 w-[60%] phone:w-[100%] tablet:w-[100%] bg-cover h-[300px] phone:h-auto bg-[#efefef]">
                        <div class="grid grid-cols-12 justify-center mx-48 tablet:mx-32  laptop:mx-20 phone:mx-4 py-5 ">
                            <p class="col-span-12 font_semi text-2xl text-[#6d0191] w-full text-center mb-10">Vì sao chọn chúng tôi</p>
                            <div class="col-span-12 grid grid-cols-12 gap-7 mt-10">
                                <div class=" col-span-4 phone:col-span-12 relative flex items-center shadow-lg bg-[#fefefe] w-full h-[150px] phone:mt-10">
                                    <div class="p-3 w-full ">
                                        <textarea id="text_lydo1" onkeyup="ktra_kytu_noidung(this)" class="bg-transparent border border-blue-300 w-full h-[120px] p-2 mt-6" maxlength="45"><?= $lydo[0] ?></textarea>
                                    </div>
                                    <p class="absolute bottom-[10px] right-[30px] soluong_kytu"><?= mb_strlen($lydo[0], 'utf8') ?>/45</p>

                                    <div class="absolute top-[-50px] left-[50%] translate-x-[-50%]">
                                        <img class="w-[80px] h-[80px]  rounded-full bg-white p-2" src='vendor/img/why1.png'>
                                    </div>
                                </div>
                                <div class=" col-span-4 phone:col-span-12 relative flex items-center shadow-lg bg-[#fefefe] w-full h-[150px] phone:mt-10 ">
                                    <div class="p-3 w-full">
                                        <textarea id="text_lydo2" onkeyup="ktra_kytu_noidung(this)" class="bg-transparent border border-blue-300 w-full h-[120px] p-2 mt-6" maxlength="45"><?= $lydo[1] ?></textarea>
                                    </div>
                                    <p class="absolute bottom-[10px] right-[30px] soluong_kytu"><?= mb_strlen($lydo[1], 'utf8') ?>/45</p>

                                    <div class="absolute top-[-50px] left-[50%] translate-x-[-50%]">
                                        <img class="w-[80px] h-[80px]  rounded-full bg-white p-2" src='vendor/img/why2.png'>
                                    </div>
                                </div>
                                <div class=" col-span-4 phone:col-span-12 relative flex items-center shadow-lg bg-[#fefefe] w-full h-[150px] phone:mt-10">
                                    <div class="p-3 w-full">
                                        <textarea id="text_lydo3" onkeyup="ktra_kytu_noidung(this)" class="bg-transparent border border-blue-300 w-full h-[120px] p-2 mt-6" maxlength="45"><?= $lydo[2] ?></textarea>
                                    </div>
                                    <p class="absolute bottom-[10px] right-[30px] soluong_kytu"><?= mb_strlen($lydo[2], 'utf8') ?>/45</p>
                                    <div class="absolute top-[-50px] left-[50%] translate-x-[-50%]">
                                        <img class="w-[80px] h-[80px]  rounded-full bg-white p-2" src='vendor/img/why3.png'>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-2 py-3 w-[60%] phone:w-[100%] tablet:w-[100%] bg-cover h-[370px]  phone:h-auto bg-[#ffffff] rounded-b-lg">
                        <div class="grid grid-cols-12 justify-center mx-48 tablet:mx-32  laptop:mx-20 phone:mx-4 py-5 ">
                            <p class="col-span-12 font_semi text-2xl text-[#6d0191] w-full text-center">Yêu cầu tư vấn</p>
                            <div class="col-span-12  mt-6">
                                <div class="grid grid-cols-12  items-center mt-6">
                                    <label class="col-span-2 phone:col-span-4 text-lg" for="sodienthoai_tuvan">Điện thoại (*)</label>
                                    <input id="sodienthoai_tuvan" type='text' class="col-span-10 phone:col-span-8  text-left appearance-none block border-b  border-gray-300 pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-black" autocomplete="off">
                                </div>

                                <div class="grid grid-cols-12 items-center mt-6">
                                    <label class="col-span-2 phone:col-span-4 text-lg" for="sodienthoai_tuvan">Họ tên (*)</label>
                                    <input id="hoten_tuvan" type='text' class="col-span-10 phone:col-span-8 text-left appearance-none block border-b  border-gray-300 pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-black" autocomplete="off">
                                </div>

                                <div class="grid grid-cols-12 items-center mt-6">
                                    <label class="col-span-2 phone:col-span-4 text-lg" for="sodienthoai_tuvan">Nội dung</label>
                                    <input id="noidung_tuvan" class="col-span-10 phone:col-span-8 text-left appearance-none block border-b  border-gray-300 pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-black" autocomplete="off">
                                </div>
                                <div class="grid grid-cols-12 items-center mt-6">
                                    <div class="col-span-2 pb-5"></div>
                                    <div id="list_goiy" class="col-span-10 flex flex-wrap gap-6 w-full">

                                    </div>
                                </div>
                                <div class="grid grid-cols-12 mt-6">
                                    <div class="col-span-12 flex justify-end">
                                        <button onclick="gui_tuvan()" type="button" class="inline-flex w-full items-center justify-center rounded-md bg-[#d73fbd] px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-[#a90285] sm:ml-3  max-w-[100px]">Gửi</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php } ?>
<!-- Form phát hành-->
<div class="relative z-[1000]  hidden" id="form_phathanh_landing_page" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">

            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal !text-[green]" id="exampleModalLabel">
                            Phát hàng Landing Page
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_phathanh_landing_page')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4  " data-te-modal-body-ref>
                        <?php
                        $href = 'https://onebis.vn/LandingPage/' .  $ld[0]->tendv . '/' .  $ld[0]->rowid;
                        if ($ld[0]->tendv != '') { ?>
                            <div class="flex gap-3 items-center">
                                <p><?= $href  ?></p>

                            </div>
                        <?php
                        } else { ?>
                            <p>Bạn chưa cập nhật Landing Page</p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <button type="button" onclick="navigator.clipboard.writeText('<?= $href  ?>');" class="mt-3 inline-flex w-full justify-center rounded-md bg-[green] px-7 py-2 text-[14px] text-white shadow-sm  hover:bg-green-600 sm:mt-0 max-w-[100px] ">Copy</button>
                    <button type="button" onclick="close_modal('form_phathanh_landing_page')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form add gợi ý-->
<div class="relative z-[1000]  hidden" id="form_add_goiy" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
            <div id="kichthuoc_form" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full max-w-md">
                <div class="bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal !text-[green]" id="exampleModalLabel">
                            Thêm mới gợi ý
                        </h5>
                        <!--Close button-->
                        <button type="button" onclick="close_modal('form_add_goiy')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <img src="vendor/img/cancel.png">
                        </button>
                    </div>
                    <!--Modal body-->
                    <div class="p-4  " data-te-modal-body-ref>
                        <div class="grid grid-cols-12 w-full justify-between items-center py-3">
                            <p class="col-span-4  text-[black]">Gợi ý</p>
                            <input id="goiy_add" class='col-span-8  border-b px-2  border-[#ddd] text-[black]' type="text" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div id='footer_thongbao' class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                    <button type="button" id='btn_chi' onclick="add_goiy()" class="mt-3 inline-flex w-full justify-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm t ring-gray-300 hover:bg-[green]  sm:mt-0 max-w-[100px] ">Lưu</button>
                    <button type="button" onclick="close_modal('form_add_goiy')" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="vendor/js/landing_page.js?v=<?= md5_file('vendor/js/landing_page.js') ?>"></script>

<script>
    $(document).ready(function() {
        load_goiy()
    });
</script>