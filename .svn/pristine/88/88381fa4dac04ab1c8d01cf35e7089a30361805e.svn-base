<?php
include("../../../includes/config.php");
include("../../../includes/database.php");
include("../../../includes/database_sv.php");
require("../../../modules/hanghoaClass.php");

$db = new hanghoa();
$mshs = $_COOKIE['mshs'];

$mshh = $_POST['mshh'];
$file_image_length = $_POST['file_image_length'];
$all_path_image = $db->load_image($mshh)[0]->path_image;

for ($i = 0; $i < $file_image_length; $i++) {
    ${"file_image_edit$i"} = $_FILES["file_image_edit$i"];
    if (${"file_image_edit$i"} != '') {
        $duoi = explode('.', ${"file_image_edit$i"}['name']);
        $duoi = $duoi[(count($duoi) - 1)];
        $path_image = $mshh . rand(1000, 9999) . '.' . $duoi;
        $all_path_image .= $path_image . '|';
        move_uploaded_file(${"file_image_edit$i"}['tmp_name'], '../../../upload/anhhanghoa/' . $mshs . '/' . $path_image);
    }
}
$db->edit_image($mshh, $all_path_image);
