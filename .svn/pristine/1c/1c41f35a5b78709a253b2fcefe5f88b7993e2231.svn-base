<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <base href="https://localhost/onebis/" />
    <?php
    if ($_SERVER['HTTP_HOST'] == 'fpoly.onebis.vn') { ?>
        <!-- <base href="https://fpoly.onebis.vn/" /> -->
    <?php } else { ?>
        <!-- <base href="https://onebis.vn/" /> -->
    <?php } ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>OneBis © TPSoft</title>

    <meta name="description" content="Onebis © TPSoft">
    <meta name="keywords" content="Quản lý Spa, Nail, Thẩm mỹ, Nha khoa" />
    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="Onebis © TPSoft">
    <meta itemprop="description" content="Giải pháp vận hành Spa, Nail, Thẩm mỹ, Nha khoa">
    <meta itemprop="image" content="https://onebis.vn/vendor/img/bg_seo_obv.png">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://onebis.vn/" />
    <meta property="og:site_name" content="https://onebis.vn/" />
    <meta property="og:type" content="website">
    <meta property="og:title" content="Onebis © TPSoft">
    <meta property="og:description" content="Giải pháp vận hành Spa, Nail, Thẩm mỹ, Nha khoa">
    <meta property="og:image" content="https://onebis.vn/vendor/img/bg_seo_obv.png">
    <meta property="og:image:alt" content="onebis-image">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Onebis © TPSoft">
    <meta name="twitter:description" content="Giải pháp vận hành Spa, Nail, Thẩm mỹ, Nha khoa">
    <meta name="twitter:image" content="https://onebis.vn/vendor/img/bg_seo_obv.png">

    <link rel="icon" type="image/png" href="vendor/img/logo_ico.ico" />
    <link rel="stylesheet" type="text/css" href="vendor/css/styles.css">
    <link rel="stylesheet" type="text/css" href="vendor/css/tailwind_element.css">

    <script type="text/javascript" src="vendor/js/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/js/xuly.js?v=<?= md5_file('vendor/js/xuly.js') ?>"></script>
    <script type="text/javascript" src="vendor/js/printJS.js"></script>
    <script type="text/javascript" src="vendor/js/qrcode.min.js?v=<?= md5_file('vendor/js/qrcode.min.js') ?>"></script>
    <script type="text/javascript" src="vendor/js/banhang.js?v=<?= md5_file('vendor/js/banhang.js') ?>"></script>
    <script src="vendor/css/cdn.tailwindcss.com_3.3.3"></script>
    <script src="vendor/ckeditor/ckeditor.js"></script>
    <script src="vendor/js/google_chart.js"></script>
    <script type="text/javascript" src="vendor/js/owl.carousel.min.js"></script>
    <script>
        tailwind.config = {
            mode: "jit",
            content: ["*.{html,php,js}"],
            theme: {
                screens: {
                    phone: {
                        max: "575px"
                    },
                    tablet: {
                        min: "700px",
                        max: "1181px"
                    },
                    mini_laptop: {
                        min: "1182px",
                        max: "1300px"
                    },
                    laptop: {
                        min: "1182px",
                        max: "1478px"
                    },
                    fullscreen: {
                        min: "1479px",
                    },
                },
            },
            plugins: [],
        };
    </script>

    <script src="vendor/js/date_format.js"></script>
    <link href="vendor/css/datepicker.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/css/owl.carousel.min.css">
    <link href="vendor/css/datepicker.css" rel="stylesheet">
    <script src="vendor/js/bootstrap-datepicker.js"></script>
    <style type="text/tailwindcss">
        @tailwind base;
        @tailwind components;
        @tailwind utilities;
        @layer base { 
            @font-face {
            font-family: "OpenSans-Regular";
            src: url("vendor/font/OpenSans-Regular.ttf") format("truetype");
            font-display: swap;
            }
            @font-face {
            font-family: "OpenSans-SemiBold";
            src: url("vendor/font/OpenSans-SemiBold.ttf") format("truetype");
            font-display: swap;
            }
            html,body{
                overflow-x: hidden;
                color: black;
                font-family: "OpenSans-Regular";
                font-size: 14px;
            }
            .login{
              background: url('vendor/img/login-new.jpeg')
            }
            .active_item{
                @apply bg-slate-300
            }
            .dropdown:hover .dropdown-menu {
                display: block;
            }
            .dropdown_right:hover .dropdown_right-menu {
                display: block;
            }
            .active_items{
                @apply text-white hover:bg-[#693b85]  hover:cursor-pointer;
            }

            div #qr-code img{
                @apply rounded-[5px]
            }
            .font_semi{
                font-family: "OpenSans-SemiBold";
            }
            }

            div #qr-code{
                pointer-events:none
            }
            .owl-dots, .owl-nav{
                display: none;
            }
            *::-webkit-scrollbar {
                width: 0px;
                }

                *::-webkit-scrollbar-track {
                background: var(--primary);
                border-radius: 5px;
                }

                *::-webkit-scrollbar-thumb {
                background-color: var(--secondary);
                border-radius: 14px;
                border: 3px solid var(--primary);
            }
            .active_chat{
                @apply bg-[#693b85] rounded-xl 
            }
            .bg_main{
                @apply  flex-1 p-3 overflow-hidden pb-8;
                background: linear-gradient(300deg, rgba(38,2,65,1) 0%, rgba(59,3,54,1) 50%, rgba(0,0,0,1) 100%);
            }
            .text_noidung p{
                @apply !text-lg !leading-8 !text-justify phone:!text-sm
            }
            .active_lichsu{
                @apply bg-green-700
            }
       
    </style>

</head>
<script>
    $(document).ready(async function() {
        load_nhatky_giahan()
        load_soluong_donnghi()
        load_soluong_crm()
    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var dateToday = new Date();
        $("#tungay_nghiphep input, #denngay_nghiphep input").datepicker({
            autoclose: true,
            todayHighlight: true,
        })
        $('#denngay_nghiphep input').datepicker('update', new Date());
    });
</script>


<?php if (isset($_COOKIE['msdv']) != '' && $_COOKIE['msdn'] != '' && $_COOKIE['mshs'] != '') { ?>

    <body>
        <!--Container -->
        <div class="mx-auto bg-grey-400">
            <!--Screen-->
            <div class="min-h-screen flex flex-col tablet:relative">
                <!--Header Section Starts Here-->
                <header class="bg-white ">
                    <div class=" grid grid-cols-12 justify-between items-center ">
                        <div class="p-1 mx-3 inline-flex items-center col-span-3 tablet:col-span-12 tablet:justify-center tablet:relative phone:col-span-12 phone:justify-center phone:relative">
                            <h1 class="text-white p-1">
                                <a href="index.html">
                                    <img src='vendor/img/logo.svg' class="w-[160px]">
                                </a>
                            </h1>
                            <h1 class="text-white p-1 tablet:absolute phone:absolute  left-0 fullscreen:hidden laptop:hidden">
                                <button class="focus:outline-none" onclick="open_menu()">
                                    <img src='vendor/img/menu.png' class="">
                                </button>
                            </h1>
                        </div>



                        <div class="col-span-6 tablet:hidden phone:hidden">
                            <aside id="sidebar" class="col-span-6">
                                <?php
                                $soct = 'DH' . date("dmyHis", time()) . rand(1000, 9999);
                                $soct_chat = 'AI' . date("dmyHis", time()) . rand(1000, 9999);
                                $ktra_admin = ktra_admin($_COOKIE['mshs'], $_COOKIE['msdv'], $_COOKIE['msdn']);
                                if ($ktra_admin[0]->admin != '1') { ?>
                                    <ul id="list_menu" class="list-reset flex flex-row">
                                        <?php
                                        foreach (__menu_1($_COOKIE['mshs'], $_COOKIE['msdv'], $_COOKIE['msdn']) as $lv1) {
                                            $btn_menu = '';
                                            if ($lv1->tenmenu == 'KHO') {
                                                if (ktra_qltk($_COOKIE['mshs'], $_COOKIE['msdv'], 'QLTK')[0]->giatri == 1) {
                                                    $href = '<a href="' . $lv1->manghiepvu . '" class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:bg-[#ebbde8] hover:text-[#8f028f] rounded inline-flex items-center">' . $lv1->tenmenu . '</a>';
                                                }
                                            } else {
                                                $href = '<a href="' . $lv1->manghiepvu . '" class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:bg-[#ebbde8] hover:text-[#8f028f] rounded inline-flex items-center">' . $lv1->tenmenu . '</a>';
                                                if ($lv1->manghiepvu == 'ChatAI') {
                                                    $href = '<a  class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:text-[#8f028f] hover:bg-[#ebbde8] rounded inline-flex items-center">' . $lv1->tenmenu . '</a>';
                                                }
                                            }
                                            if ($lv1->manghiepvu == 'Advise') {
                                                $href = '<a onclick="add_dathang_header(`' . $soct . '`)" class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:bg-[#ebbde8] hover:text-[#8f028f] rounded inline-flex items-center">' . $lv1->tenmenu . '</a>';
                                            }

                                            $list_lv2 = __menu_2($_COOKIE['mshs'], $_COOKIE['msdv'], $_COOKIE['msdn'], $lv1->sttmenu);
                                            if (count($list_lv2) > 0) {
                                                $btn_menu = '<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>';
                                                $href = '<h4 class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:text-[#8f028f] hover:bg-[#ebbde8] rounded inline-flex items-center">' . $lv1->tenmenu . '</h4>';
                                                if ($lv1->tenmenu == 'KHO') {
                                                    if (ktra_qltk($_COOKIE['mshs'], $_COOKIE['msdv'], 'QLTK')[0]->giatri == 1) {

                                                        $href = '<h4 class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:text-[#8f028f] hover:bg-[#ebbde8] rounded inline-flex items-center">' . $lv1->tenmenu . '</h4>';
                                                    }
                                                }
                                            }
                                        ?>
                                            <li class="w-full h-full py-3 px-2 ">
                                                <div class="">
                                                    <div class="dropdown inline-block relative">
                                                        <button class="focus:outline-none flex items-center">
                                                            <?= $href ?>
                                                            <?= $btn_menu ?>
                                                        </button>
                                                        <ul class="dropdown-menu absolute hidden pt-1 shadow-md rounded  z-10 min-w-[174px]">
                                                            <?php
                                                            foreach ($list_lv2 as $lv2) {
                                                                $list_lv3 = __menu_3($_COOKIE['mshs'], $_COOKIE['msdv'], $_COOKIE['msdn'], $lv2->manghiepvu);
                                                                if (count($list_lv3) > 0) { ?>
                                                                    <li class="">
                                                                        <div class="dropdown_right inline-block relative w-full">
                                                                            <button class="  hover:bg-[#ebbde8]  bg-white w-full inline-flex items-center justify-between">
                                                                                <p class="border-b border-[#ddd]  w-full text-left py-2 px-4 block whitespace-no-wrap"><?= $lv2->tennghiepvu ?></p>
                                                                                <svg class="rotate-[-90deg] fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                                                </svg>
                                                                            </button>
                                                                            <ul class="dropdown_right-menu absolute hidden top-0 left-[100%] rounded shadow-md z-10">
                                                                                <?php
                                                                                foreach ($list_lv3 as $lv3) {
                                                                                    if ($lv3->manghiepvu == 'ChatAI') { ?>
                                                                                        <li class=""><a class="border-b border-[#ddd] bg-white hover:bg-[#ebbde8]  hover:cursor-pointer py-2 px-4 block whitespace-no-wrap w-full" onclick="new_chat('<?= $soct_chat ?>')"><?= $lv3->tennghiepvu ?></a>
                                                                                        </li>
                                                                                    <?php } else { ?>
                                                                                        <li class=""><a class="border-b border-[#ddd] bg-white hover:bg-[#ebbde8]  hover:cursor-pointer py-2 px-4 block whitespace-no-wrap w-full" href="<?= $lv3->manghiepvu ?>"><?= $lv3->tennghiepvu ?></a>
                                                                                        </li>
                                                                                    <?php
                                                                                    }
                                                                                    ?>

                                                                                <?php } ?>
                                                                            </ul>
                                                                        </div>

                                                                    </li>
                                                                <?php } else { ?>
                                                                    <li class=""><a class="border-b border-[#ddd] bg-white hover:bg-[#ebbde8]  hover:cursor-pointer py-2 px-4 block whitespace-no-wrap w-full" href="<?= $lv2->manghiepvu ?>"><?= $lv2->tennghiepvu ?></a>
                                                                    </li>
                                                            <?php }
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php }
                                        ?>
                                    </ul>
                                <?php } else { ?>

                                    <ul id="list_menu" class="list-reset flex flex-row">
                                        <?php
                                        foreach (_admin_menu_1($_COOKIE['mshs'], $_COOKIE['msdv'], '', $_COOKIE['loaihinh']) as $lv1) {
                                            $btn_menu = '';
                                            if ($lv1->tenmenu == 'KHO') {
                                                if (ktra_qltk($_COOKIE['mshs'], $_COOKIE['msdv'], 'QLTK')[0]->giatri == 1) {
                                                    $href = '<a href="' . $lv1->manghiepvu . '" class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:text-[#8f028f] hover:bg-[#ffd9ff] rounded inline-flex items-center">' . $lv1->tenmenu . '</a>';
                                                }
                                            } else {
                                                $href = '<a href="' . $lv1->manghiepvu . '" class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:text-[#8f028f] hover:bg-[#ffd9ff] rounded inline-flex items-center">' . $lv1->tenmenu . '</a>';
                                                if ($lv1->manghiepvu == 'ChatAI') {
                                                    $href = '<a  class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:text-[#8f028f] rounded inline-flex items-center">' . $lv1->tenmenu . '</a>';
                                                }
                                            }
                                            if ($lv1->manghiepvu == 'Advise') {
                                                $href = '<a onclick="add_dathang_header(`' . $soct . '`)" class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:text-[#8f028f] hover:bg-[#ffd9ff] rounded inline-flex items-center">' . $lv1->tenmenu . '</a>';
                                            }

                                            $list_lv2 = _admin_menu_2($_COOKIE['mshs'], $_COOKIE['msdv'], '', $lv1->sttmenu);
                                            if (count($list_lv2) > 0) {
                                                $btn_menu .= '<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>';
                                                $href = '<h4 class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:text-[#8f028f] hover:bg-[#ffd9ff] rounded inline-flex items-center">' . $lv1->tenmenu . '</h4>';
                                                if ($lv1->tenmenu == 'KHO') {
                                                    if (ktra_qltk($_COOKIE['mshs'], $_COOKIE['msdv'], 'QLTK')[0]->giatri == 1) {
                                                        $btn_menu = '<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>';
                                                        $href = '<h4 class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:text-[#8f028f] hover:bg-[#ffd9ff] rounded inline-flex items-center">' . $lv1->tenmenu . '</h4>';
                                                    }
                                                }
                                                if ($lv1->tenmenu == 'Chat AI') {
                                                    $btn_menu = '<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>';
                                                    $href = '<h4 onclick="new_chat(`' . $soct_chat . '`)" class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:text-[#8f028f] hover:bg-[#ffd9ff] rounded inline-flex items-center hover:cursor-pointer">' . $lv1->tenmenu . '</h4>';
                                                }
                                            }
                                        ?>
                                            <li class="w-full h-full py-3 px-2 ">
                                                <div class="">
                                                    <div class="dropdown inline-block relative">
                                                        <button class="focus:outline-none flex items-center">
                                                            <?= $href ?>
                                                            <?= $btn_menu ?>
                                                        </button>
                                                        <ul class="dropdown-menu absolute hidden pt-1 shadow-md rounded  z-10 min-w-[174px]">
                                                            <?php
                                                            foreach ($list_lv2 as $lv2) {
                                                                $list_lv3 = _admin_menu_3($_COOKIE['mshs'], $_COOKIE['msdv'], '', $lv2->manghiepvu);
                                                                if (count($list_lv3) > 0) { ?>
                                                                    <li class="">
                                                                        <div class="dropdown_right inline-block relative w-full">
                                                                            <button class="  hover:bg-[#ebbde8]  bg-white w-full inline-flex items-center justify-between">
                                                                                <p class="border-b border-[#ddd]  w-full text-left py-2 px-4 block whitespace-no-wrap"><?= $lv2->tennghiepvu ?></p>
                                                                                <svg class="rotate-[-90deg] fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                                                </svg>
                                                                            </button>
                                                                            <ul class="dropdown_right-menu absolute hidden top-0 left-[100%] rounded shadow-md  z-10">
                                                                                <?php
                                                                                foreach ($list_lv3 as $lv3) {
                                                                                    if ($lv3->manghiepvu == 'ChatAI') { ?>
                                                                                        <li class=""><a class="border-b border-[#ddd] bg-white hover:bg-[#ebbde8]  hover:cursor-pointer py-2 px-4 block whitespace-no-wrap w-full" onclick="new_chat('<?= $soct_chat ?>')"><?= $lv3->tennghiepvu ?></a>
                                                                                        </li>
                                                                                    <?php } else { ?>
                                                                                        <li class=""><a class="border-b border-[#ddd] bg-white hover:bg-[#ebbde8]  hover:cursor-pointer py-2 px-4 block whitespace-no-wrap w-full" href="<?= $lv3->manghiepvu ?>"><?= $lv3->tennghiepvu ?></a>
                                                                                        </li>
                                                                                <?php
                                                                                    }
                                                                                } ?>
                                                                            </ul>
                                                                        </div>

                                                                    </li>

                                                                <?php } else { ?>
                                                                    <li class=""><a class="border-b border-[#ddd] bg-white hover:bg-[#ebbde8]  hover:cursor-pointer py-2 px-4 block whitespace-no-wrap w-full" href="<?= $lv2->manghiepvu ?>"><?= $lv2->tennghiepvu ?></a>
                                                                    </li>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php }
                                        ?>
                                    </ul>
                                <?php } ?>

                            </aside>
                        </div>
                        <div class="p-1 flex flex-row col-span-3 items-center justify-end tablet:hidden phone:hidden">
                            <div class="">
                                <div class="flex gap-3 items-center">
                                    <div class="mr-1 whitespace-nowrap flex gap-3 items-center uppercase">
                                        <!-- ktra_qltk lấy tham số hệ thống -->
                                        <!-- GET_TBH_CMH lấy dmphanloai  -->
                                        <?php
                                        $QLTK = ktra_qltk($_COOKIE['mshs'], $_COOKIE['msdv'], 'QLTK');
                                        $INSKL = ktra_qltk($_COOKIE['mshs'], $_COOKIE['msdv'], 'INSKL');
                                        $TBHH = ktra_qltk($_COOKIE['mshs'], $_COOKIE['msdv'], 'TBHH');
                                        $EMTV = ktra_qltk($_COOKIE['mshs'], $_COOKIE['msdv'], 'EMTV');
                                        $thubanhang = GET_TBH_CMH($_COOKIE['mshs'], $_COOKIE['msdv'], 'TBH');
                                        $chinhacungcap = GET_TBH_CMH($_COOKIE['mshs'], $_COOKIE['msdv'], 'CNCC');
                                        $chiluong = GET_TBH_CMH($_COOKIE['mshs'], $_COOKIE['msdv'], 'CLG');
                                        $thutamung = GET_TBH_CMH($_COOKIE['mshs'], $_COOKIE['msdv'], 'TTU');
                                        $batbuocdiachi = ktra_qltk($_COOKIE['mshs'], $_COOKIE['msdv'], 'BBDC');
                                        $batbuocngaysinh = ktra_qltk($_COOKIE['mshs'], $_COOKIE['msdv'], 'BBNS');
                                        $chatai = ktra_qltk($_COOKIE['mshs'], $_COOKIE['msdv'], 'MAXAI');
                                        $AT_dieutour = ktra_qltk($_COOKIE['mshs'], $_COOKIE['msdv'], 'DTTD');
                                        ?>
                                        <input hidden id="thamso_qltk" value="<?= $QLTK[0]->giatri ?>">
                                        <input hidden id="thamso_inskl" value="<?= $INSKL[0]->giatri ?>">
                                        <input hidden id="thamso_tbhh" value="<?= $TBHH[0]->giatri ?>">
                                        <input hidden id="thamso_email" value="<?= $EMTV[0]->giatri ?>">
                                        <input hidden id="ID_thubanhang" value="<?= $thubanhang[0]->msloai ?>">
                                        <input hidden id="ID_chinhacungcap" value="<?= $chinhacungcap[0]->msloai ?>">
                                        <input hidden id="ID_chiluong" value="<?= $chiluong[0]->msloai ?>">
                                        <input hidden id="ID_thutamung" value="<?= $thutamung[0]->msloai ?>">
                                        <input hidden id="ID_bbdc" value="<?= $batbuocdiachi[0]->giatri ?>">
                                        <input hidden id="ID_bbns" value="<?= $batbuocngaysinh[0]->giatri ?>">
                                        <input hidden id="ID_chatai" value="<?= $chatai[0]->giatri ?>">
                                        <input hidden id="AT_dieutour" value="<?= $AT_dieutour[0]->giatri ?>">

                                        <div class="dropdown inline-block relative">
                                            <button class="font_semi focus:outline-none font_semi py-2 px-1  rounded inline-flex items-center ">
                                                <h4 class="mr-1 whitespace-nowrap"><?php echo $_COOKIE['hoten'] ?></h4>
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                </svg>
                                                <?php
                                                if ($ktra_admin[0]->admin != '1') {

                                                    $phanquyen_donnghi = kiemtra_phanquyen_user($_COOKIE['msdn'], 'DNP')[0]->msdn;
                                                    $phanquyen_crm =  kiemtra_phanquyen_user($_COOKIE['msdn'], 'CRM')[0]->msdn;
                                                    if ($phanquyen_donnghi > 0 ||  $phanquyen_crm > 0) {
                                                ?>
                                                        <div class="soluong_thongbao w-7 h-7 bg-[red] rounded-full flex items-center justify-center text-white hidden"></div>
                                                    <?php }
                                                } else { ?>
                                                    <div class="soluong_thongbao w-7 h-7 bg-[red] rounded-full flex items-center justify-center text-white "></div>
                                                <?php
                                                }
                                                ?>
                                            </button>
                                            <script>
                                                const phanquyen_donnghi = '<?= $phanquyen_donnghi ?>'
                                                const phanquyen_crm = '<?= $phanquyen_crm ?>'
                                                const phanquyen_admin = '<?= $ktra_admin[0]->admin ?>'

                                                function load_soluong_donnghi() {
                                                    $.post(
                                                        "ajax/nhanvien/load_duyetnghiphep.php", {},
                                                        function(data, textStatus, jqXHR) {
                                                            $(".soluong_donnghi").addClass("hidden");

                                                            if (data.length > 0) {
                                                                $(".soluong_donnghi").removeClass("hidden");
                                                                $(".soluong_thongbao").removeClass("hidden");
                                                            }
                                                            $(".soluong_donnghi").html(data.length);
                                                            const sl_donnghi = data.length;
                                                            const sl_crm = $(".soluong_crm").text();
                                                            if (phanquyen_admin != 1) {
                                                                $(".soluong_thongbao").text((phanquyen_donnghi > 0 ? Number(sl_donnghi) : 0) + (phanquyen_crm > 0 ? Number(sl_crm) : 0));
                                                            } else {
                                                                $(".soluong_thongbao").text(Number(sl_crm) + Number(sl_donnghi));
                                                            }
                                                        }
                                                    );
                                                }

                                                function load_soluong_crm() {
                                                    $.post(
                                                        "ajax/crm/load_thongbao_crm.php", {},
                                                        function(data, textStatus, jqXHR) {
                                                            $(".soluong_crm").addClass("hidden");

                                                            if (data[0].sl > 0) {
                                                                $(".soluong_crm").removeClass("hidden");
                                                                $(".soluong_thongbao").removeClass("hidden");
                                                            }
                                                            $(".soluong_crm").html(data[0].sl);
                                                            const sl_donnghi = $(".soluong_donnghi").text();
                                                            const sl_crm = data[0].sl;
                                                            if (phanquyen_admin != 1) {
                                                                $(".soluong_thongbao").text((phanquyen_donnghi > 0 ? Number(sl_donnghi) : 0) + (phanquyen_crm > 0 ? Number(sl_crm) : 0));
                                                            } else {
                                                                $(".soluong_thongbao").text(Number(sl_crm) + Number(sl_donnghi));
                                                            }

                                                        }
                                                    );
                                                }
                                            </script>
                                            <ul class="dropdown-menu absolute  right-[0] hidden pt-1 shadow-md rounded  z-10">
                                                <?php
                                                if ($ktra_admin[0]->admin != 1) {
                                                    if (kiemtra_phanquyen_user($_COOKIE['msdn'], 'DNP')[0]->msdn >= 1) {
                                                ?>
                                                        <li class="">
                                                            <a class="border-b border-[#ddd] bg-white hover:bg-[#ebbde8] hover:cursor-pointer py-2 px-4  whitespace-no-wrap normal-case flex items-center justify-between gap-3" onclick="list_duyetnghiphep()">Duyệt nghỉ phép
                                                                <div class=" soluong_donnghi w-7 h-7 bg-[red] rounded-full flex items-center justify-center text-white hidden"></div>
                                                            </a>
                                                        </li>
                                                    <?php }
                                                } else { ?>
                                                    <li class="">
                                                        <a class="border-b border-[#ddd] bg-white hover:bg-[#ebbde8] hover:cursor-pointer py-2 px-4  whitespace-no-wrap normal-case flex items-center justify-between gap-3" onclick="list_duyetnghiphep()">Duyệt nghỉ phép
                                                            <div class=" soluong_donnghi w-7 h-7 bg-[red] rounded-full flex items-center justify-center text-white "></div>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <?php
                                                if ($ktra_admin[0]->admin != 1) {
                                                    $lv3_crm = __menu_3($_COOKIE['mshs'], $_COOKIE['msdv'], $_COOKIE['msdn'], 'OtherFunction');
                                                    foreach ($lv3_crm as $crm) {
                                                        if ($crm->manghiepvu  == 'CRM') {

                                                ?>
                                                            <li class="">
                                                                <a class="border-b border-[#ddd] bg-white hover:bg-[#ebbde8]  hover:cursor-pointer py-2 px-4  whitespace-no-wrap w-full flex items-center justify-between gap-3" href="<?= $crm->manghiepvu ?>"><?= $crm->tennghiepvu ?>
                                                                    <div class=" soluong_crm w-7 h-7 bg-[red] rounded-full flex items-center justify-center text-white hidden"></div>
                                                                </a>
                                                            </li>
                                                        <?php }
                                                    }
                                                } else {
                                                    $lv3_crm = _admin_menu_3($_COOKIE['mshs'], $_COOKIE['msdv'], '', 'OtherFunction');
                                                    foreach ($lv3_crm as $crm) {
                                                        if ($crm->manghiepvu  == 'CRM') {
                                                        ?>
                                                            <li class="">
                                                                <a class="border-b border-[#ddd] bg-white hover:bg-[#ebbde8]  hover:cursor-pointer py-2 px-4 block whitespace-no-wrap w-full flex items-center justify-between gap-3" href="<?= $crm->manghiepvu ?>"><?= $crm->tennghiepvu ?>
                                                                    <div class=" soluong_crm w-7 h-7 bg-[red] rounded-full flex items-center justify-center text-white hidden"></div>
                                                                </a>
                                                            </li>
                                                <?php
                                                        }
                                                    }
                                                } ?>
                                                <li class=""><a class="border-b border-[#ddd] bg-white hover:bg-[#ebbde8] hover:cursor-pointer py-2 px-4 block whitespace-no-wrap normal-case" onclick="open_xinphepnghi()">Xin nghỉ phép</a>
                                                </li>
                                                <li class=""><a class="border-b border-[#ddd] bg-white hover:bg-[#ebbde8] hover:cursor-pointer py-2 px-4 block whitespace-no-wrap normal-case" onclick="open_modal('form_doimatkhau')">Đổi mật khẩu</a>
                                                </li>

                                            </ul>
                                        </div>

                                    </div>
                                    <div class="">
                                        <a class="py-2 px-4 whitespace-no-wrap" href="Logout">
                                            <div>
                                                <img class="min-w-[24px] max-w-[24px]  mr-3 " src='vendor/img/logout.png'>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                    if ($_COOKIE['msdv'] == 'ONEBIS') {
                                    ?>
                                        <div class="">
                                            <a class=" py-2 px-4 whitespace-no-wrap" href="Agency">
                                                <div>
                                                    <img class="min-w-[24px] max-w-[24px] mr-3" src='vendor/img/logo_tps_s.svg'>
                                                </div>
                                            </a>
                                        </div>
                                    <?php } ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div id="form_menu" class="absolute h-screen w-full flex hidden">
                    <div class="w-[40%] phone:w-[50%] h-screen bg-white z-[101]">
                        <h1 class="text-white  flex justify-center border-b">
                            <a href="index.html" class="p-2">
                                <img src='vendor/img/logo.svg' class="w-[160px]">
                            </a>
                        </h1>

                        <aside id="sidebar" class="col-span-6">
                            <li class="w-full h-full py-3 px-2 list-none">
                                <div class="dropdown inline-block relative">
                                    <button class="font_semi focus:outline-none font_semi py-2 px-4 tablet:px-1  rounded inline-flex items-center ">
                                        <h4 class="mr-1 whitespace-nowrap"><?php echo $_COOKIE['hoten'] ?></h4>
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu absolute  top-0 left-[100%] hidden pt-1 shadow-md rounded  z-10">
                                        <?php
                                        if (kiemtra_phanquyen_user($_COOKIE['msdn'], 'DNP')[0]->msdn >= 1) {
                                        ?>
                                            <li class=""><a class="border-b border-[#ddd] bg-white hover:bg-[#ebbde8] hover:cursor-pointer py-2 px-4 block whitespace-no-wrap" onclick="open_modal('form_duyetnghiphep')">Duyệt nghỉ phép</a>
                                            </li>
                                        <?php } ?>
                                        <li class=""><a class="border-b border-[#ddd] bg-white hover:bg-[#ebbde8] hover:cursor-pointer py-2 px-4 block whitespace-no-wrap" onclick="open_modal('form_xinnghiphep')">Xin nghỉ phép</a>
                                        </li>
                                        <li class=""><a class="border-b border-[#ddd] bg-white hover:bg-[#ebbde8] hover:cursor-pointer py-2 px-4 block whitespace-no-wrap" onclick="open_modal('form_doimatkhau')">Đổi mật khẩu</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <?php
                            $soct = 'DH' . date("dmyHis", time()) . rand(1000, 9999);
                            $ktra_admin = ktra_admin($_COOKIE['mshs'], $_COOKIE['msdv'], $_COOKIE['msdn']);
                            if ($ktra_admin[0]->admin != '1') { ?>
                                <ul id="list_menu" class="list-reset ">
                                    <?php
                                    foreach (__menu_1($_COOKIE['mshs'], $_COOKIE['msdv'], $_COOKIE['msdn']) as $lv1) {
                                        $btn_menu = '';
                                        if ($lv1->tenmenu == 'KHO') {
                                            if (ktra_qltk($_COOKIE['mshs'], $_COOKIE['msdv'], 'QLTK')[0]->giatri == 1) {
                                                $href = '<a href="' . $lv1->manghiepvu . '" class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:text-[#8f028f] rounded inline-flex items-center">' . $lv1->tenmenu . '</a>';
                                            }
                                        } else {
                                            $href = '<a href="' . $lv1->manghiepvu . '" class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:text-[#8f028f] rounded inline-flex items-center">' . $lv1->tenmenu . '</a>';
                                        }
                                        if ($lv1->manghiepvu == 'Advise') {
                                            $href = '<a onclick="add_dathang_header(`' . $soct . '`)" class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:text-[#8f028f] rounded inline-flex items-center">' . $lv1->tenmenu . '</a>';
                                        }


                                        $list_lv2 = __menu_2($_COOKIE['mshs'], $_COOKIE['msdv'], $_COOKIE['msdn'], $lv1->sttmenu);
                                        if (count($list_lv2) > 0) {
                                            $btn_menu = '<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>';
                                            $href = '<h4 class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:text-[#8f028f] rounded inline-flex items-center">' . $lv1->tenmenu . '</h4>';
                                            if ($lv1->tenmenu == 'KHO') {
                                                if (ktra_qltk($_COOKIE['mshs'], $_COOKIE['msdv'], 'QLTK')[0]->giatri == 1) {
                                                    $btn_menu = '<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>';
                                                    $href = '<h4 class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:text-[#8f028f] rounded inline-flex items-center">' . $lv1->tenmenu . '</h4>';
                                                }
                                            }
                                        }
                                    ?>
                                        <li class="w-full h-full py-3 px-2 ">
                                            <div class="">
                                                <div class="dropdown inline-block relative">
                                                    <button class="focus:outline-none flex items-center">
                                                        <?= $href ?>
                                                        <?= $btn_menu ?>
                                                    </button>
                                                    <ul class="dropdown-menu absolute top-0 left-[100%] w-[174px] hidden pt-1 shadow-md rounded  z-10">
                                                        <?php
                                                        foreach ($list_lv2 as $lv2) {
                                                            $list_lv3 = __menu_3($_COOKIE['mshs'], $_COOKIE['msdv'], $_COOKIE['msdn'], $lv2->manghiepvu);
                                                            if (count($list_lv3) > 0) { ?>
                                                                <li class="">
                                                                    <div class="dropdown_right inline-block relative w-full">
                                                                        <button class=" hover:text-[#8f028f] hover:bg-[#ebbde8]  bg-white w-full inline-flex items-center justify-between">
                                                                            <p class="border-b border-[#ddd]  w-full text-left py-2 px-4 block whitespace-no-wrap"><?= $lv2->tennghiepvu ?></p>
                                                                            <svg class="rotate-[-90deg] fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                                            </svg>
                                                                        </button>
                                                                        <ul class="dropdown_right-menu absolute hidden top-0 left-[100%] rounded shadow-md w-[150px] z-10">
                                                                            <?php
                                                                            foreach ($list_lv3 as $lv3) {
                                                                                if ($lv3->manghiepvu == 'ChatAI') { ?>
                                                                                    <li class=""><a class="border-b border-[#ddd] bg-white hover:bg-[#ebbde8]  hover:cursor-pointer py-2 px-4 block whitespace-no-wrap w-full" onclick="new_chat('<?= $soct_chat ?>')"><?= $lv3->tennghiepvu ?></a>
                                                                                    </li>
                                                                                <?php } else { ?>
                                                                                    <li class=""><a class="border-b border-[#ddd] bg-white hover:bg-[#ebbde8]  hover:cursor-pointer py-2 px-4 block whitespace-no-wrap w-full" href="<?= $lv3->manghiepvu ?>"><?= $lv3->tennghiepvu ?></a>
                                                                                    </li>
                                                                            <?php
                                                                                }
                                                                            } ?>
                                                                        </ul>
                                                                    </div>

                                                                </li>
                                                            <?php } else { ?>
                                                                <li class=""><a class="border-b border-[#ddd] bg-white hover:bg-[#ebbde8]  hover:cursor-pointer py-2 px-4 block whitespace-no-wrap w-full" href="<?= $lv2->manghiepvu ?>"><?= $lv2->tennghiepvu ?></a>
                                                                </li>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    <?php }
                                    ?>
                                </ul>
                            <?php } else { ?>

                                <ul id="list_menu" class="list-reset ">
                                    <?php
                                    foreach (_admin_menu_1($_COOKIE['mshs'], $_COOKIE['msdv'], $_COOKIE['msdn'], $_COOKIE['loaihinh']) as $lv1) {
                                        $btn_menu = '';
                                        if ($lv1->tenmenu == 'KHO') {
                                            if (ktra_qltk($_COOKIE['mshs'], $_COOKIE['msdv'], 'QLTK')[0]->giatri == 1) {
                                                $href = '<a href="' . $lv1->manghiepvu . '" class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:text-[#8f028f] rounded inline-flex items-center">' . $lv1->tenmenu . '</a>';
                                            }
                                        } else {
                                            $href = '<a href="' . $lv1->manghiepvu . '" class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:text-[#8f028f] rounded inline-flex items-center">' . $lv1->tenmenu . '</a>';
                                        }
                                        if ($lv1->manghiepvu == 'Advise') {
                                            $href = '<a onclick="add_dathang_header(`' . $soct . '`)" class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:text-[#8f028f] rounded inline-flex items-center">' . $lv1->tenmenu . '</a>';
                                        }
                                        if ($lv1->manghiepvu == 'ChatAI') {
                                            $href = '<a onclick="new_chat(`' . $soct_chat . '`)" class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:text-[#8f028f] rounded inline-flex items-center">' . $lv1->tenmenu . '</a>';
                                        }
                                        $list_lv2 = _admin_menu_2($_COOKIE['mshs'], $_COOKIE['msdv'], $_COOKIE['msdn'], $lv1->sttmenu);
                                        if (count($list_lv2) > 0) {
                                            $btn_menu = '<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>';
                                            $href = '<h4 class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:text-[#8f028f] rounded inline-flex items-center">' . $lv1->tenmenu . '</h4>';
                                            if ($lv1->tenmenu == 'KHO') {
                                                if (ktra_qltk($_COOKIE['mshs'], $_COOKIE['msdv'], 'QLTK')[0]->giatri == 1) {
                                                    $btn_menu = '';
                                                    $href = '<h4 class="mr-1 whitespace-nowrap font_semi py-2 px-4 hover:text-[#8f028f] rounded inline-flex items-center">' . $lv1->tenmenu . '</h4>';
                                                }
                                            }
                                        }
                                    ?>
                                        <li class="w-full h-full py-3 px-2 ">
                                            <div class="">
                                                <div class="dropdown inline-block relative">
                                                    <button class="focus:outline-none flex items-center">
                                                        <?= $href ?>
                                                        <?= $btn_menu ?>
                                                    </button>
                                                    <ul class="dropdown-menu absolute top-0 left-[100%]  hidden pt-1 shadow-md rounded  z-10">
                                                        <?php
                                                        foreach ($list_lv2 as $lv2) {
                                                            $list_lv3 = _admin_menu_3($_COOKIE['mshs'], $_COOKIE['msdv'], $_COOKIE['msdn'], $lv2->manghiepvu);
                                                            if (count($list_lv3) > 0) { ?>
                                                                <li class="">
                                                                    <div class="dropdown_right inline-block relative w-full">
                                                                        <button class=" hover:text-[#8f028f] hover:bg-[#ebbde8]  bg-white w-full inline-flex items-center justify-between">
                                                                            <p class="border-b border-[#ddd]  w-full text-left py-2 px-4 block whitespace-no-wrap"><?= $lv2->tennghiepvu ?></p>
                                                                            <svg class="rotate-[-90deg] fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                                            </svg>
                                                                        </button>
                                                                        <ul class="dropdown_right-menu absolute hidden top-0 left-[100%] rounded shadow-md  z-10">
                                                                            <?php
                                                                            foreach ($list_lv3 as $lv3) {
                                                                                if ($lv3->manghiepvu == 'ChatAI') { ?>
                                                                                    <li class=""><a class="border-b border-[#ddd] bg-white hover:bg-[#ebbde8]  hover:cursor-pointer py-2 px-4 block whitespace-no-wrap w-full" onclick="new_chat('<?= $soct_chat ?>')"><?= $lv3->tennghiepvu ?></a>
                                                                                    </li>
                                                                                <?php } else { ?>
                                                                                    <li class=""><a class="border-b border-[#ddd] bg-white hover:bg-[#ebbde8]  hover:cursor-pointer py-2 px-4 block whitespace-no-wrap w-full" href="<?= $lv3->manghiepvu ?>"><?= $lv3->tennghiepvu ?></a>
                                                                                    </li>
                                                                            <?php
                                                                                }
                                                                            } ?>
                                                                        </ul>
                                                                    </div>

                                                                </li>
                                                            <?php } else { ?>
                                                                <li class=""><a class="border-b border-[#ddd] bg-white hover:bg-[#ebbde8]  hover:cursor-pointer py-2 px-4 block whitespace-no-wrap w-full" href="<?= $lv2->manghiepvu ?>"><?= $lv2->tennghiepvu ?></a>
                                                                </li>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    <?php }
                                    ?>
                                </ul>
                            <?php } ?>
                            <a class=" ml-4 whitespace-nowrap font_semi py-2 px-2 bg-white hover:bg-[#ebbde8]  hover:text-[#8f028f] rounded inline-flex items-center" href="Logout">ĐĂNG XUẤT</a>

                        </aside>
                    </div>
                    <div class="w-[60%] h-screen bg-black/50 z-[100]" onclick="hidden_menu()">
                    </div>
                </div>

                <?php
                $check_password_user = user_check_password($_COOKIE['mshs'], $_COOKIE['msdv'], $_COOKIE['msdn'])[0]->rowid;
                ?>
                <script>
                    let check_password_user = <?= $check_password_user ?>;
                    document.addEventListener('DOMContentLoaded', function() {
                        $('#text_doimatkhau').removeClass('hidden')
                        $('#text_canhbao_doimatkhau').addClass('hidden')
                        if (check_password_user > 0) {
                            open_modal('form_doimatkhau')
                            $('#text_doimatkhau').addClass('hidden')
                            $('#text_canhbao_doimatkhau').removeClass('hidden')
                        }
                    })
                </script>
                <!-- Form đổi mật khẩu -->
                <div class="relative z-10 hidden" id="form_doimatkhau" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                        <div class="flex min-h-full justify-center  text-center items-center sm:p-0">
                            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-3xl">
                                <div class="bg-white">
                                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                        <!--Modal title-->
                                        <h5 class="text-xl font-medium leading-normal text-[red]" id="exampleModalLabel">
                                            <span id="text_doimatkhau">
                                                Đổi mật khẩu
                                            </span>
                                            <span id="text_canhbao_doimatkhau" class="hidden">
                                                Để đảm bảo an toàn vui lòng thay đổi mật khẩu
                                            </span>
                                        </h5>
                                        <!--Close button-->

                                    </div>
                                    <!--Modal body-->
                                    <div data-te-modal-body-ref class="px-4">
                                        <label class="w-full mt-3 grid grid-cols-12 gap-4  uppercase tracking-wide  text-xs items-center justify-start  whitespace-nowrap" id="form_ngaysinh">
                                            <div class="col-span-3 flex items-center">
                                                Mật khẩu cũ
                                            </div>
                                            <div class="col-span-9 input-group date flex items-center">
                                                <input class="w-full appearance-none block    border-b border-[#ddd]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" id="matkhaucu" type="password" autocomplete="off">
                                            </div>
                                        </label>
                                        <label class="w-full grid grid-cols-12 gap-4 mt-3 uppercase tracking-wide text-xs  whitespace-nowrap" id="form_diachi">
                                            <div class="col-span-3 flex items-center">Mật khẩu mới</div>
                                            <div class="col-span-9 input-group date flex items-center">
                                                <input class="w-full appearance-none block    border-b border-[#ddd]  px-4 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" id="matkhaumoi" type="password" autocomplete="off">
                                            </div>
                                        </label>
                                    </div>

                                </div>
                                <div class="bg-gray-50 px-2 py-3 flex justify-end gap-3 mt-3">
                                    <p id="doimatkhau_error"></p>

                                    <button onclick="doimatkhau()" type="button" class="inline-flex w-full justify-center items-center rounded-md bg-green-600 px-2 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 sm:ml-3 max-w-[70px] ">Lưu</button>
                                    <button type="button" onclick="close_modal('form_doimatkhau')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-2 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[70px] ">Hủy</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form xin nghỉ phép -->
                <div class="relative z-10 hidden" id="form_xinnghiphep" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                        <div class="flex min-h-full justify-center  text-center items-center sm:p-0">
                            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-3xl">
                                <div class="bg-white">
                                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                        <!--Modal title-->
                                        <h5 class="text-xl font-medium leading-normal text-[red]" id="exampleModalLabel">
                                            Xin nghỉ phép
                                        </h5>
                                        <!--Close button-->

                                    </div>
                                    <!--Modal body-->
                                    <div data-te-modal-body-ref class="px-4">
                                        <div class="flex justify-end items-center my-2">
                                            <p>Tháng </p>
                                            <select id="list_lichsu_thangnghi" onclick="load_lichsu_ngaynghi('list_chitiet')">

                                            </select>
                                        </div>
                                        <div class="py-3 phone:overflow-x-scroll bg-[#ffe5fd] rounded-lg">
                                            <table class="min-w-full">
                                                <thead>
                                                    <tr class="font_semi">
                                                        <th class=" px-4 py-2 text-center font-thin">#</th>
                                                        <th class=" px-4 py-2 text-start font-thin">Từ ngày</th>
                                                        <th class=" px-4 py-2 text-start font-thin">Đến ngày</th>
                                                        <th class=" px-4 py-2 font-thin text-center">Số ngày</th>
                                                        <th class=" px-4 py-2 font-thin text-center">...</th>
                                                    </tr>
                                                </thead>
                                                <tbody id='list_lichsu_chitiet' class="">

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="donhang_filter_div w-full">
                                            <div id="tungay_nghiphep" class="input-group date text-black grid grid-cols-12 w-full justify-between items-center py-3" data-date-format="dd/mm/yyyy">
                                                <p class="col-span-3  text-[black]">Từ ngày</p>
                                                <input id="tungay_input_nghiphep" data-date-format="dd/mm/yyyy" class="col-span-9  form-control text-start bg-transparent border-b border-[#ddd] " type="text" value="<?= date('d/m/Y') ?>"> <span class="input-group-addon"></span>
                                            </div>

                                            <div id="denngay_nghiphep" class="input-group date text-black grid grid-cols-12 w-full justify-between items-center py-3" data-date-format="dd/mm/yyyy">
                                                <p class="col-span-3  text-[black]">Đến ngày</p>
                                                <input id="denngay_input_nghiphep" data-date-format="dd/mm/yyyy" class="col-span-9 form-control text-start bg-transparent border-b border-[#ddd]" type="text" value="<?= date('d/m/Y') ?>"> <span class="input-group-addon"></span>
                                            </div>

                                        </div>
                                        <label class="w-full grid grid-cols-12 gap-4 mt-3 uppercase tracking-wide whitespace-nowrap" id="form_diachi">
                                            <div class="col-span-3 flex items-center normal-case">Lý do</div>
                                            <div class="col-span-9 input-group date flex items-center">
                                                <input class="w-full appearance-none block    border-b border-[#ddd]  px-2 leading-tight focus:outline-none pb-2 bg-transparent text-[16px]" id="lydo" type="text" autocomplete="off">
                                            </div>
                                        </label>
                                    </div>

                                </div>
                                <div class="bg-gray-50 px-2 py-3 flex justify-end gap-3 mt-3">
                                    <p id="error_xinphep" class="hidden text-[red]">Chưa nhập lý do</p>
                                    <button onclick="xinnghiphep()" type="button" class="inline-flex w-full justify-center items-center rounded-md bg-green-600 px-2 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 sm:ml-3 max-w-[70px] ">Gửi</button>
                                    <button type="button" onclick="close_modal('form_xinnghiphep')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-2 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[70px] ">Hủy</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form list duyệt nghỉ phép -->
                <div class="relative z-10 hidden" id="form_duyetnghiphep" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                        <div class="flex min-h-full justify-center  text-center items-center sm:p-0">
                            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-3xl">
                                <div class="bg-white">
                                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                        <!--Modal title-->
                                        <h5 class="text-xl font-medium leading-normal text-[red]" id="exampleModalLabel">
                                            Duyệt nghỉ phép
                                        </h5>
                                        <!--Close button-->

                                    </div>
                                    <!--Modal body-->
                                    <div data-te-modal-body-ref class="px-4">
                                        <div class="py-3 phone:overflow-x-scroll">
                                            <table class="min-w-full">
                                                <thead>
                                                    <tr class="font_semi">
                                                        <th class=" px-4 py-2 text-center">#</th>
                                                        <th class=" px-4 py-2 text-left">Nhân viên</th>
                                                        <th class=" px-4 py-2 text-center">Thời gian</th>
                                                        <th class=" px-4 py-2 text-center">Số ngày</th>
                                                        <th class=" px-4 py-2 text-left">Lý do</th>
                                                        <th class=" px-4 py-2 text-center">Đã nghỉ</th>
                                                        <th class=" px-4 py-2 text-center">...</th>
                                                    </tr>
                                                </thead>
                                                <tbody id='list_nghiphep' class="text-white text-md">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <div class="bg-gray-50 px-2 py-3 flex justify-end gap-3 mt-3">
                                    <button type="button" onclick="close_modal('form_duyetnghiphep')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-2 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[70px] ">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form duyet nghỉ phép -->
                <div class="relative z-10 hidden" id="form_duyet" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                        <div class="flex min-h-full justify-center  text-center items-center sm:p-0">
                            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-3xl min-w-[300px]">
                                <div class="bg-white">
                                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                        <!--Modal title-->
                                        <h5 class="text-xl font-medium leading-normal text-[red]" id="title_form_duyet">
                                            Duyệt nghỉ phép
                                        </h5>
                                        <!--Close button-->

                                    </div>
                                    <!--Modal body-->
                                    <div data-te-modal-body-ref class="px-4">
                                        <p class="text-center " id="tennv_duyet"></p>
                                    </div>

                                </div>
                                <div class="bg-gray-50 px-2 py-3 flex justify-end gap-3 mt-3">
                                    <input hidden id="rowid_duyet">
                                    <button id="btn_duyet" onclick="duyet_nghiphep()" type="button" class="hidden inline-flex w-full justify-center items-center rounded-md bg-green-600 px-2 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 sm:ml-3 max-w-[70px] ">Duyệt</button>
                                    <button id="btn_tuchoi" onclick="tuchoi_nghiphep()" type="button" class="hidden inline-flex w-full justify-center items-center rounded-md bg-green-600 px-2 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 sm:ml-3 max-w-[70px] ">Từ chối</button>
                                    <button type="button" onclick="close_modal('form_duyet')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-2 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[70px] ">Hủy</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $ktra_hethan = ktra_hethan($_COOKIE['mshs'], $_COOKIE['msdv'], 'hethan');
                if (count($ktra_hethan) > 0) {
                ?>

                    <!-- Form thông báo hết hạn  -->
                    <div class="relative z-10 " id="form_thongbao_hethan" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                            <div class="flex min-h-full justify-center  text-center items-center sm:p-0">
                                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-3xl">
                                    <div class="bg-white">
                                        <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                            <!--Modal title-->
                                            <h5 class="text-xl font-medium leading-normal text-[red]" id="exampleModalLabel">
                                                Thông báo quá hạn thanh toán
                                            </h5>
                                            <!--Close button-->

                                        </div>
                                        <!--Modal body-->
                                        <div data-te-modal-body-ref class="px-4">
                                            <p class="font_semi  px-4 py-2 text-lg">Kính gửi: Quý khách hàng</p>
                                            <p class="py-2 text-center  text-lg leading-8">TPSoft trân trọng thông báo thời hạn bản quyền của Quý khách đã quá hạn sử dụng theo cam kết và rất lấy làm tiếc khi TPSoft buộc lòng phải ngưng cung cấp dịch vụ.</p>
                                            <p class="py-2 text-center  text-lg">TPSoft rất vinh dự khi được tiếp tục phục vụ quý khách tại nút "Gia hạn" bên dưới.</p>
                                            <div>
                                                <table class="min-w-full bg-[#ffdcfc] my-2  rounded-md">
                                                    <thead>
                                                        <tr class="text-black border-b border-dashed border-[#ddd]">
                                                            <th class="font-thin text-center px-4 py-2 ">Ngày kích hoạt</th>
                                                            <th class="font-thin text-center px-4 py-2 ">Số năm</th>
                                                            <th class="font-thin text-center px-4 py-2 ">Số tháng KM</th>
                                                            <th class="font-thin text-center px-4 py-2 ">Ngày hết hạn</th>
                                                            <th class="font-thin text-right px-4 py-2 ">Số tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id='list_nhatky_giahan' class="list_nhatky_giahan">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                                        <button onclick="open_giahan()" type="button" class="inline-flex w-full justify-center items-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 sm:ml-3 max-w-[100px] ">Gia hạn</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Form gia hạn  -->
                    <div class="relative z-10 hidden" id="form_giahan" aria-labelledby="modal-title" data-te-modal-init role="dialog" aria-hidden="true">
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                            <div class="flex min-h-full justify-center  text-center items-center sm:p-0">
                                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-2xl">
                                    <div class="bg-white">
                                        <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                            <!--Modal title-->
                                            <h5 class="text-xl font-medium leading-normal text-[green]" id="exampleModalLabel">
                                                Gia hạn <span class="mr-4 uppercase" id="tendv_giahan"></span>
                                            </h5>
                                            <!--Close button-->
                                            <button type="button" onclick="close_modal('form_giahan')" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                                                <img src="vendor/img/cancel.png">
                                            </button>
                                        </div>
                                        <!--Modal body-->
                                        <div data-te-modal-body-ref class=" max-h-[700px] overflow-x-hidden">
                                            <div class="px-3">
                                                <table class="min-w-full bg-[#ffdcfc] mt-2  rounded-md">
                                                    <thead>
                                                        <tr class="text-black border-b border-dashed border-[#ddd]">
                                                            <th class="font-thin text-center px-4 py-2">#</th>
                                                            <th class="font-thin text-left px-4 py-2">Chương trình khuyến mãi</th>
                                                            <th class="font-thin text-right px-4 py-2 ">Giá/năm</th>
                                                            <th class="font-thin text-center px-4 py-2 ">Tặng (tháng)</th>
                                                            <th class="font-thin text-center px-4 py-2 ">...</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id='list_ctkm' class="">

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="relative p-4">
                                                <div class="grid grid-cols-12">
                                                    <div class="col-span-5 w-full">
                                                        <input hidden class="tenkh_chuyenkhoan" value="<?= $_COOKIE['msdv'] ?>">
                                                        <div id="" class="w-full md:w-full px-3 pb-4 ">
                                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="dongia_add_giahan">
                                                                Giá/năm
                                                            </label>
                                                            <input class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight text-lg  focus:outline-none focus:bg-white " id="dongia_add_giahan" type="text" autocomplete="off">
                                                        </div>
                                                        <div id="" class="w-full md:w-full px-3 pb-4 ">
                                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="sonam_add_giahan">
                                                                Số năm gia hạn
                                                            </label>
                                                            <input onkeyup="load_ctkm('1')" class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight text-lg  focus:outline-none focus:bg-white " id="sonam_add_giahan" type="text" autocomplete="off">
                                                        </div>
                                                        <div id="" class="w-full md:w-full px-3 pb-4 ">
                                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="khuyenmai_add_giahan">
                                                                Tặng (tháng)
                                                            </label>
                                                            <input class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 text-lg  leading-tight focus:outline-none focus:bg-white " id="khuyenmai_add_giahan" type="text" readonly>
                                                        </div>
                                                        <div id="" class="w-full md:w-full px-3 pb-4 ">
                                                            <label class="sotien_chuyenkhoan block uppercase tracking-wide text-gray-700 text-xs font-medium mb-2" for="thanhtien_add_giahan">
                                                                Thành tiền
                                                            </label>
                                                            <input class="appearance-none block w-full  border border-gray-200 rounded py-3 px-4 leading-tight text-[red] text-lg font_semi  focus:outline-none focus:bg-white " id="thanhtien_add_giahan" type="text" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-span-7">
                                                        <div class=" w-full h-auto mt-5 flex-col justify-center items-center">
                                                            <div id="qr-code" class="flex justify-center"></div>
                                                            <p class="text-center mt-3 text-[red]" id="title_qr_thanhtoan"></p>
                                                        </div>
                                                        <div class='mt-5'>
                                                            <p class='text-[red] text-center'>Quét QR thanh toán để gia hạn ngay</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 flex justify-end gap-3">
                                        <input id='mshs_dv_giahan' hidden>
                                        <input id='msdv_dv_giahan' hidden>
                                        <button onclick="giahan_donvi()" type="button" class="inline-flex w-full justify-center items-center rounded-md bg-green-600 px-7 py-2 text-[14px]  text-white shadow-sm hover:bg-green-500 sm:ml-3 max-w-[100px] ">Lưu</button>
                                        <button type="button" onclick="close_modal('form_giahan')" class="inline-flex w-full justify-center rounded-md bg-[#ddd] px-7 py-2 text-[14px] text-gray-900 shadow-sm  hover:bg-gray-300 sm:mt-0 max-w-[100px] ">Hủy</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!--/Header-->
                <div class="flex flex-1">
                    <!--Sidebar-->

                    <!--/Sidebar-->
                <?php } else {
                require('login.php');
            }
