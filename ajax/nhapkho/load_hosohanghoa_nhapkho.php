<?php
include('__include_connect.php');
require("../../modules/nhapkhoClass.php");

$db = new NhapKho();
$mshs=$_COOKIE['mshs'];
$msdv=$_COOKIE['msdv'];
$tenhh = $_POST['tenhh'];

$list = $db->load_hosohanghoa_nhapkho($mshs, $msdv,$tenhh);
$stt = 1;
?>
<thead>
    <tr class="py-3">
        <th class="font_semi text-center py-1">#</th>
        <th class="font_semi text-left py-1">Tên hàng hóa</th>
        <th class="font_semi text-left py-1">ĐVT</th>
    </tr>
</thead>
<tbody id='chitiet_hosohanghoa_line'>
    <?php
    foreach ($list as $r) { ?>
        <tr  onclick="chon_hanghoa(this)" class="hover:cursor-pointer hover:bg-[#edb9ec]  border-b border-dashed border-[#c1adc6]">
            <th class="text-center font-thin" ><?= $stt++ ?></th>
            <td class="tenhh py-2"><?= $r->tenhh ?></td>
            <td hidden class='mshh'><?= $r->mshh ?></td>
            <td hidden class='thuesuat'><?= $r->thuesuat ?></td>
            <td hidden class='gianhap'><?= $r->gianhap ?></td>
            <td hidden class='giaban'><?= $r->giaban ?></td>
            <td class="dvt"><?= $r->dvt ?></td>
        </tr>
    <?php
    } ?>
</tbody>