<?php
include('__include_connect.php');
require("../../modules/banhangClass.php");
require("../../modules/dichvuClass.php");

$db = new banhang();
$db_dichvu = new dichvu();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$phanloai = $_POST['phanloai'];
$sodienthoai = $_POST['sodienthoai'];
$nhom_hh = $phanloai == 'lieutrinh' ? "LT" : '';
$loai = $_POST['loai'];
$search = $_POST['search'];
$list = $db->load_hanghoa_dichvu($mshs, $msdv, $phanloai, $loai, $search, $sodienthoai);
$stt = 1;
foreach ($list as $r) {
    $maso = $r->maso;
?>
    <div class="col-span-1 h-[425px] laptop:h-[370px] mini_laptop:!h-[340px] tablet:h-[330px] phone:h-[320px] w-full  rounded-md text-start  group">
        <div class="item_ngoai relative h-full w-full rounded-xl shadow-xl transition-all duration-500 [transform-style:preserve-3d] ">
            <div class="absolute inset-0">
                <div class="h-full bg-[#fffdfd1b] rounded-md ">
                    <div class="p-2">
                        <input hidden class='maso_item' value='<?= $r->maso ?>'>
                        <div class="w-full " <?= $r->lieutrinh == 1 ? "onclick='lat_item(this)'" : '' ?>>
                            <div>
                                <div id="<?= $r->maso ?>" class="owl-carousel owl-theme ">
                                    <?php
                                    $item_image = explode('|', $r->path_image);
                                    if ($r->path_image != "") {
                                        for ($i = 0; $i < count($item_image); $i++) {
                                            if ($item_image[$i] != '') {
                                    ?>
                                                <div class="item w-full ">
                                                    <div class="w-full  flex justify-center items-center pt-[100%] tablet:pt-[70%] phone:pt-[100%] tablet:h-[170px] h-auto relative" alt="">
                                                        <img class="absolute top-0 left-0  w-full h-full tablet:h-[170px] phone:h-[170px] bg-white" src='upload/anhdichvu/<?= $mshs . '/' . $item_image[$i] ?>'>
                                                    </div>
                                                </div>
                                            <?php
                                            } ?>
                                        <?php
                                        }
                                    } else { ?>
                                        <div class="item w-full ">
                                            <div class="w-full flex justify-center items-center pt-[100%] tablet:pt-[70%] phone:pt-[50%] tablet:h-[170px] phone:h-[170px] h-auto relative" alt="">
                                                <img class="absolute top-0 tablet:h-[170px] phone:h-[170px] left-0 h-full w-full bg-white" src='vendor/img/img_blank.png'>
                                            </div>
                                        </div>
                                    <?php
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <h4 class="text-lg  text-white h-[60px] tablet:h-[53px] phone:h-[55px] mt-2 line-clamp-2"><?= $r->ten ?></h4>
                        <div class="text-[#ffff00] font-medium flex items-center fullscreen:justify-between laptop:justify-between ">
                            <?php
                            if ($r->ptgiam != 0) {
                                echo  '<div class=" flex gap-2 items-center text-[#d7d4d4] tablet:flex-wrap phone:h-[25px] tablet:h-[35px] phone:flex-wrap"><p class="line-through ">' . str_replace(',', '.', number_format($r->giaban)) . '</p>' . '<div class="bg-[#fff2cc] absolute top-0 right-0 0 text-black text-md z-10  rounded-[3px] px-1" >-' . $r->ptgiam . '%</div>'  .
                                    '<p class="text-[#ffff00] font-medium">' . str_replace(',', '.', number_format($r->giathu)) . '</p></div>';
                            } else {
                                echo '<p class="text-[#ffff00] font-medium phone:h-[25px] tablet:h-[35px]">' . str_replace(',', '.', number_format($r->giaban)) . '</p>';
                            } ?>
                            <div class="flex justify-end  tablet:hidden phone:hidden">
                                <button class="bg-[#a86ed4] phone:w-full px-3 py-2 rounded-md text-white" onclick="add_dathang_line('<?= $r->msctkm ?>','<?= $r->ptgiam ?>','<?= $r->maso ?>','<?= $phanloai == 'lieutrinh' ? 1 : 0 ?>','<?= $phanloai == 'hanghoa' ? 'HH' : 'DV' ?>')">Chọn</button>
                            </div>
                        </div>
                        <div class="flex justify-end mt-2 fullscreen:hidden laptop:hidden">
                            <button class="bg-[#a86ed4] phone:w-full tablet:w-full px-3 py-2 rounded-md text-white" onclick="add_dathang_line('<?= $r->msctkm ?>','<?= $r->ptgiam ?>','<?= $r->maso ?>','<?= $phanloai == 'lieutrinh' ? 1 : 0 ?>','<?= $phanloai == 'hanghoa' ? 'HH' : 'DV' ?>')">Chọn</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="absolute inset-0 h-full w-full [transform:rotateY(180deg)] [backface-visibility:hidden] hover:cursor-pointer bg-white rounded-md z-10" onclick="lat_item_revert(this)">
                <div class="flex-col justify-between h-full  overflow-y-scroll">
                    <div class="px-0">
                        <div class="p-2 pr-0">
                            <input hidden class='maso_item' value='<?= $r->maso ?>'>
                            <h4 class="text-lg  text-[#912a83] line-clamp-2">Liệu trình <?= $r->ten ?></h4>
                        </div>
                        <?php if ($phanloai == 'lieutrinh') { ?>
                            <div class="px-2 text-black">
                                <?php
                                $list_lieutrinh = $db->load_lieutrinh($mshs, $msdv, $r->maso);
                                foreach ($list_lieutrinh as $i) {
                                    $list_hanghoa_lieutrinh = $db_dichvu->load_chitiet_lieutrinh_tuvan($mshs, $msdv, $i->mslieutrinh);

                                ?>
                                    <p class="bg-[#fcd7f6] my-1 text-center rounded-t-md" data-item='<?= $i->mslieutrinh ?>'><?= $i->tenlieutrinh ?></p>
                                    <?php foreach ($list_hanghoa_lieutrinh as $f) { ?>
                                        <p class="py-1 font-md">- <?= $f->tenhh ?></p>
                                    <?php
                                    } ?>
                                <?php } ?>
                            </div>
                        <?php
                        } ?>

                    </div>

                </div>

            </div>

            </divd>
        </div>
        <script>
            $('#<?= $r->maso ?>').owlCarousel({
                margin: 10,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
        </script>
    </div>


<?php
}
?>