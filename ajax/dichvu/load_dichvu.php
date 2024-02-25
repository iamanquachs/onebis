<?php
include('__include_connect.php');
require("../../modules/dichvuClass.php");

$db = new dichvu();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$danhmuc = $_POST['danhmuc'];
$loai = $_POST['loai'];
$list = $db->load_dichvu($mshs, $msdv,  $danhmuc, $loai);

$stt = 1;
foreach ($list as $r) {
    $list_lieutrinh = $db->load_lieutrinh($mshs, $msdv, $r->msdichvu);
    $lieutrinh = $r->lieutrinh ?>
    <tr class="active_items item_line items border-b border-dashed border-[#ffffff40]" onclick='active_item(this)'>
        <td class="px-4 py-2 text-center"><?= $stt++ ?></td>
        <td class="search_key px-4 py-2"><?= $r->tendichvu ?></td>
        <td class="px-4 py-2 text-end"><?= str_replace(',', '.', number_format($r->sotien)) ?></td>
        <td class="px-4 py-2 text-end"><?= str_replace(',', '.', number_format($r->pttichluy)) ?></td>
        <td class="px-4 py-2 text-end"><?= str_replace(',', '.', number_format($r->ptthuchien)) ?></td>
        <td class="px-4 py-2 text-center"><?= $r->thoigian ?></td>
        <td class="px-4 py-2 text-end mota_td" hidden><?= $r->mota ?></td>


        <td class="px-4 py-2 text-center">
            <?php switch ($r->lieutrinh) {
                case '0':
                    echo 'Dịch vụ';
                    break;
                case '1':
                    echo 'Liệu trình';
                    break;
                default:
                    echo 'Gói dịch vụ';
                    break;
            } ?>
        </td>
        <td class="px-4 py-2 text-center"><?= $r->tenloai ?></td>
        <td class="px-4 py-2 text-center">
            <div class="justify-center flex items-center gap-3">
                    <?php switch ($r->lieutrinh) {
                        case '0':
                            ?>
                            <button onclick="load_lieutrinh('<?= $r->msdichvu ?>', '<?= $r->tendichvu ?>', '<?= $r->lieutrinh ?>'), show_modal_lieutrinh('<?= $lieutrinh ?>','<?= $r->msdichvu ?>','<?= $r->tendichvu ?>', <?= 1 ?>,'<?= str_replace(',', '.', number_format($r->sotien)) ?>','<?= $r->phanbogia ?>')" class="max-w-[20px] min-w-[20px] max-h-[20px] min-h-[20px] bg-[#f1afec] rounded-full text-black" title="Đã mô tả"> 
                            <?php 
                            if ($r->comota == 0) { ?>
                                <img  class="max-w-[20px] min-w-[20px]" src="vendor/img/add.png" title="Chưa có mô tả">
                            <?php } else { ?>
                                    <?=$r->comota?>
                                    <?php } ?>
                            </button>
                                <?php
                            break;
                        case '1': ?>
                        <button onclick="load_lieutrinh('<?= $r->msdichvu ?>', '<?= $r->tendichvu ?>', '<?= $r->lieutrinh ?>'), show_modal_lieutrinh('<?= $lieutrinh ?>','<?= $r->msdichvu ?>','<?= $r->tendichvu ?>', <?= 1 ?>,'<?= str_replace(',', '.', number_format($r->sotien)) ?>','<?= $r->phanbogia ?>')" 
                            class="max-w-[20px] min-w-[20px] max-h-[20px] min-h-[20px] bg-[#f1afec] rounded-full text-black" title="Đã mô tả">
                            <?php if($r->comota == 0){?>
                            <img class="max-w-[20px] min-w-[20px]" src="vendor/img/process.png" title="Có liệu trình">
                            <?php
                            }else{ ?>
                            <?=$r->comota?>
                            <?php } ?>
                        </button>
                            
                        <?php
                            break;
                        default: ?>
                               <button onclick="open_edit_mota_goidichvu(this,'<?= $r->msdichvu ?>','<?= $r->tendichvu ?>','<?= $r->nhom_dichvu ?>','<?= str_replace(',', '.', number_format($r->sotien)) ?>','<?= $r->trangthai ?>','<?= $r->phanbogia ?>', '')" 
                            class="max-w-[20px] min-w-[20px] max-h-[20px] min-h-[20px] bg-[#f1afec] rounded-full text-black" title="Đã mô tả">
                            <?php if($r->comota == 0){ ?>
                            <img class="focus:outline-none max-w-[20px] min-w-[20px]"  src="vendor/img/add.png" title="Gói dịch vụ">
                            <?php } else{ ?>
                                <?=$r->comota?>
                            <?php
                            } ?>
                               </button>
                    <?php
                            break;
                    } ?>
            </div>
        </td>
        <td class="px-4 py-2">
            <div class="justify-center flex items-center gap-3">
                <button>
                    <?php if ($r->trangthai == '1') { ?>
                        <img src="vendor/img/lock.png">
                    <?php } else { ?>
                        <img src="vendor/img/checked.png">

                    <?php } ?>
                </button>
            </div>
        </td>

        <td class=" py-2 ">
            <div class="justify-center flex items-center gap-3">
                <?php switch ($r->lieutrinh) {
                    case '2': ?>
                        <button class="focus:outline-none" onclick="open_edit_goidichvu(this,'<?= $r->msdichvu ?>','<?= $r->tendichvu ?>','<?= $r->nhom_dichvu ?>','<?= str_replace(',', '.', number_format($r->sotien)) ?>','<?= $r->trangthai ?>')">
                            <img class="max-w-[20px] min-w-[20px]" src="vendor/img/edit.png">
                        </button>
                    <?php
                        break;
                    default: ?>
                        <button class="focus:outline-none" onclick="open_edit_dichvu(this,'<?= $r->msdichvu ?>','<?= $r->tendichvu ?>','<?= $r->thoigian ?>','<?= $r->nhom_dichvu ?>','<?= str_replace(',', '.', number_format($r->sotien)) ?>','<?= $lieutrinh ?>','<?= $r->trangthai ?>','<?= $r->pttichluy ?>','<?= $r->ptthuchien ?>','<?= $r->thuesuat ?>','<?= $r->songay_bh ?>','<?= str_replace(',', '.', number_format($r->giavon)) ?>')">
                            <img class="max-w-[20px] min-w-[20px]" src="vendor/img/edit.png">
                        </button>
                <?php
                        break;
                } ?>

                <button class="focus:outline-none" onclick="open_delete_dichvu('<?= $r->msdichvu ?>', '<?= $r->tendichvu ?>', '<?= $r->path_image ?>', '<?= $r->path_video ?>')">
                    <img class="max-w-[20px] min-w-[20px]" src="vendor/img/delete.png">
                </button>
            </div>


        </td>
    </tr>
<?php
}
