<?php
include("../../../includes/config.php");
include("../../../includes/database.php");
include("../../../includes/database_sv.php");
require("../../../modules/dichvuClass.php");

$db = new dichvu();
$mshs = $_COOKIE['mshs'];
$msdichvu = $_POST['msdichvu'];
$file_image_length = $_POST['file_image_length'];
$all_path_image = $db->load_image($msdichvu)[0]->path_image;

for ($i = 0; $i < $file_image_length; $i++) {
    ${"file_image_edit$i"} = $_FILES["file_image_edit$i"];
    if (${"file_image_edit$i"} != '') {
        $duoi = explode('.', ${"file_image_edit$i"}['name']);
        $duoi = $duoi[(count($duoi) - 1)];
        $path_image = $msdichvu . rand(1000, 9999) . '.' . $duoi;
        $all_path_image .= $path_image . '|';
        move_uploaded_file(${"file_image_edit$i"}['tmp_name'], '../../../upload/anhdichvu/' . $mshs . '/'  . $path_image);
    }
}
$db->edit_image($msdichvu, $all_path_image);
