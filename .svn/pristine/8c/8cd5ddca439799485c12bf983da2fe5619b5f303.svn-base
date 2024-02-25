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

<main class="bg_main z-[999] h-screen w-screen absolute top-0 right-0 left-0 !overflow-scroll">
    <div class="flex flex-col">
        <!--Grid Form-->

        <div class="flex flex-1  flex-col md:flex-row lg:flex-row">
            <div class="mb-2 w-full  flex flex-col items-center justify-center">

                <div class="px-2 py-3 w-[60%] phone:w-[100%] tablet:w-[100%] bg-cover  rounded-t-lg" style="background-image: url('vendor/img/<?= $img_bg_top ?>');">
                    <div class="grid grid-cols-12 justify-center mx-48 phone:mx-4 py-12 phone:py-6 tablet:mx-32 laptop:mx-20 items-center">
                        <div class="col-span-5">
                            <?php if ($ld[0]->img_avt  != '') { ?>
                                <div class="rounded-full">
                                    <img class="rounded-full w-[250px] h-[250px] phone:w-[120px] phone:h-[120px]  border-[5px] border-[#ffffff50]" src="upload/landing_page/<?= $ld[0]->mshs . '/' . $ld[0]->img_avt ?>">
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
                        <p class="col-span-12 font_semi text-2xl phone:text-lg w-full text-[#6d0191] text-center pb-8 uppercase"><?= $ld[0]->tendv ?></p>
                        <div class="col-span-12 grid grid-cols-3  gap-10 phone:gap-3">
                            <?php if ($img_donvi[0] != '') { ?>
                                <div class="rounded-full flex justify-center">
                                    <img class="rounded-full w-[200px] h-[200px] phone:w-[120px] phone:h-[120px]" src="upload/landing_page/<?= $ld[0]->mshs . '/' . $img_donvi[0] ?>">
                                </div>
                            <?php } else { ?>
                                <div class="rounded-full  flex justify-center">
                                    <img class="rounded-full w-[200px] h-[200px] phone:w-[120px] phone:h-[120px]" src="vendor/img/<?= $img_middle_0 ?>">
                                </div>
                            <?php } ?>
                            <?php if ($img_donvi[1] != '') { ?>
                                <div class="rounded-full  flex justify-center">
                                    <img class="rounded-full w-[200px] h-[200px] phone:w-[120px] phone:h-[120px]" src="upload/landing_page/<?= $ld[0]->mshs . '/' . $img_donvi[1] ?>">
                                </div>
                            <?php } else { ?>
                                <div class="rounded-full  flex justify-center">
                                    <img class="rounded-full w-[200px] h-[200px] phone:w-[120px] phone:h-[120px]" src="vendor/img/<?= $img_middle_1 ?>">
                                </div>
                            <?php } ?>
                            <?php if ($img_donvi[2] != '') { ?>

                                <div class="rounded-full flex justify-center">
                                    <img class="rounded-full w-[200px] h-[200px] phone:w-[120px] phone:h-[120px]" src="upload/landing_page/<?= $ld[0]->mshs . '/' . $img_donvi[2] ?>">
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
                            <div class=" col-span-4 phone:col-span-12 relative flex items-center rounded-lg shadow-lg bg-[#fefefe] w-full h-[150px] ">
                                <div class="p-2 w-full">
                                    <p class="line-clamp-3 text-center  w-full">
                                        <?= $lydo[0] ?>
                                    </p>
                                </div>
                                <div class="absolute top-[-50px] left-[50%] translate-x-[-50%]">
                                    <img class="w-[80px] h-[80px]  rounded-full bg-white p-2" src='vendor/img/why1.png'>
                                </div>
                            </div>
                            <div class=" col-span-4 phone:col-span-12 relative flex items-center rounded-lg shadow-lg bg-[#fefefe] w-full h-[150px] phone:mt-10">
                                <div class="p-2 w-full ">
                                    <p class="line-clamp-3 w-full text-center  ">
                                        <?= $lydo[1] ?>
                                    </p>
                                </div>
                                <div class="absolute top-[-50px] left-[50%] translate-x-[-50%]">
                                    <img class="w-[80px] h-[80px]  rounded-full bg-white p-2" src='vendor/img/why2.png'>
                                </div>
                            </div>
                            <div class=" col-span-4 phone:col-span-12 relative flex items-center rounded-lg shadow-lg bg-[#fefefe] w-full h-[150px] phone:mt-10">
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
                                <input id="sodienthoai_yeucau" type='text' onkeyup="this.value = this.value.replace(/[^0-9\\,]/g,'')" maxlength="10" class="col-span-10 phone:col-span-8  text-left appearance-none block border-b  border-gray-300 pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-black" autocomplete="off">
                            </div>

                            <div class="grid grid-cols-12 items-center mt-6">
                                <label class="col-span-2 phone:col-span-4  text-lg" for="hoten_yeucau">Họ tên (*)</label>
                                <input id="hoten_yeucau" type='text' class="col-span-10 phone:col-span-8 text-left appearance-none block border-b  border-gray-300 pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-black" autocomplete="off">
                            </div>

                            <div class="grid grid-cols-12 items-center mt-6">
                                <label class="col-span-2 phone:col-span-4  text-lg" for="noidung_yeucau">Nội dung</label>
                                <input id="noidung_yeucau" class="col-span-10 phone:col-span-8 text-left appearance-none block border-b  border-gray-300 pl-0 leading-tight focus:outline-none pb-1 bg-transparent text-[16px] text-black" autocomplete="off">
                            </div>
                            <div class="grid grid-cols-12 items-center mt-6">
                                <div class="col-span-2 pb-5"></div>
                                <div id="list_goiy" class="col-span-10 flex flex-wrap gap-6 w-full">
                                    <?php
                                    $goiy = explode('|', $ld[0]->goiy);
                                    if ($ld[0]->goiy != '') {
                                        for ($i = 0; $i < count($goiy); $i++) { ?>
                                            <p onclick="chon_goiy('<?= $goiy[$i] ?>')" class='border border-[#64646440] rounded-full px-3 py-2 text-black hover:cursor-pointer hover:text-white hover:bg-[#693b85]'><?= $goiy[$i] ?></p>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 mt-6">
                                <div class="col-span-12 flex justify-end items-center">
                                    <p id="error_send_yeucau" class="text-[red] hidden">Chưa nhập đầy đủ thông tin</p>
                                    <button onclick="send_yeucau('<?= $_GET['r'] ?>')" type="button" class="inline-flex w-full items-center justify-center rounded-md bg-[#d73fbd] px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-[#a90285] sm:ml-3  max-w-[100px]">Gửi</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<script type="text/javascript" src="vendor/js/landing_page.js?v=<?= md5_file('vendor/js/landing_page.js') ?>">

</script>