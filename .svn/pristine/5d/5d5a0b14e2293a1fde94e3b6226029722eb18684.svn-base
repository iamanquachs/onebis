<?php
include("../../../includes/config.php");
include("../../../includes/database.php");
include("../../../includes/database_sv.php");
require("../../../modules/nhatkyClass.php");

$db = new nhatky();
$mshs = $_COOKIE['mshs'];
$rowid = $_POST['rowid'];
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
unlink('../../../upload/anhdieutri/' . $mshs . '/' . $path_image);

$list = $db->edit_image($rowid, $new_path_image);
