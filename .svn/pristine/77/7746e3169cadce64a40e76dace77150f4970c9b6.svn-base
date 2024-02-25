<?php
include('__include_connect.php');
require("../../modules/baocaoClass.php");

$db = new baocao();
$mshs = $_COOKIE['mshs'];
$msdv = $_POST['msdv'];
$tungay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['tungay'])));
$denngay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['denngay'])));
$stt = 1;
$select = '';
$query = '';
$order = '';
$list = $db->case_baocaodotuoi($mshs, $msdv, 'dotuoi');
?>

<thead>
    <tr class="text-[#efbff5] text-lg">
        <th class="text-center font-thin px-4 py-2">#</th>
        <th class="text-start font-thin px-4 py-2 ">Dịch vụ</th>
        <?php
        foreach ($list as $r) {
            $select .= $r->casew . ',';
            $query .= ",SUM(`" . $r->dotuoi . "`) '$r->dotuoi'";
            $tuoi = explode('-', $r->dotuoi);
            $tuoitu = $tuoi[0];
            $tuoiden = $tuoi[1];
            $order .= ", dotuoi >= $tuoitu  AND dotuoi < $tuoiden";
        ?>
            <th class="text-center font-thin px-4 py-2"><?= $r->dotuoi ?></th>
        <?php
        } ?>
    </tr>
</thead>
<tbody id="body_baocao_phankhuc">
    <?php
    $list_show = $db->when_baocaodotuoi($mshs, $msdv, rtrim($select, ','), $query, $order, $tungay, $denngay);
    foreach ($list_show as $e) {
    ?>
        <tr class="active_items item_line border-b border-dashed border-[#ffffff40] items " onclick='active_item(this)'>
            <td class="text-center font-thin px-4 py-2"><?= $stt++ ?></td>
            <td class="text-start font-thin px-4 py-2 search_key"><?= $e->dichvu ?></td>
            <?php
            foreach ($list as $i) {
                $dotuoi = $i->dotuoi;
            ?>
                <td class="text-center font-thin px-4 py-2"><?= $e->$dotuoi ?></td>
            <?php
            } ?>
        </tr>
    <?php
    } ?>


</tbody>