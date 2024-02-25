<?php
include("../../../includes/config.php");
include("../../../includes/database.php");
include("../../../includes/database_sv.php");
require("../../../modules/nhatkyClass.php");

$db = new nhatky();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$rowid = $_POST['rowid'];
$soct = $_POST['soct'];
$file_image_length = $_POST['file_image_length'];

$path_image = '';

for ($i = 0; $i < $file_image_length; $i++) {
    ${"file_image$i"} = $_FILES["file_image$i"];
    if (${"file_image$i"} != '') {
        $duoi = explode('.', ${"file_image$i"}['name']);
        $duoi = $duoi[(count($duoi) - 1)];
        $path_image = $soct . rand(1000, 9999) . '.' . $duoi;
        $all_path_image .= $path_image . '|';
        move_uploaded_file(${"file_image$i"}['tmp_name'], '../../../upload/anhdieutri/'. $mshs . '/' . $path_image);
    }
}

$db->add_img_nhatky($mshs, $msdv, $rowid, $all_path_image);
