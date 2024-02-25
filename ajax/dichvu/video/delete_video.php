<?php
include("../../../includes/config.php");
include("../../../includes/database.php");
include("../../../includes/database_sv.php");
require("../../../modules/dichvuClass.php");

$db = new dichvu();
$mshs = $_COOKIE['mshs'];

$msdichvu = $_POST['msdichvu'];
$path_video = $_POST['path_video'];
unlink('../../../upload/videodichvu/' . $mshs . '/' . $path_video);
$db->delete_video($msdichvu);
