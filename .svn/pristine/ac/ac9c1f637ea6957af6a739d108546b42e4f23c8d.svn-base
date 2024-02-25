<?php
include("../../../includes/config.php");
include("../../../includes/database.php");
include("../../../includes/database_sv.php");
require("../../../modules/hanghoaClass.php");

$db = new hanghoa();
$mshs = $_COOKIE['mshs'];

$mshh = $_POST['mshh'];
$path_image = $_POST['path_image'];
$out_path_image = $_POST['out_path_image'];
$tach_path_image = explode('|', $out_path_image);
$new_path_image = '';
for ($i = 0; $i < count($tach_path_image); $i++) {
    if ($tach_path_image[$i] != '') {
        if ($tach_path_image[$i] != $path_image) {
            $new_path_image .= $tach_path_image[$i] . '|';
        }
    }
}
unlink('../../../upload/anhhanghoa/' . $mshs . '/' . $path_image);

$list = $db->edit_image($mshh, $new_path_image);
