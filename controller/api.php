<?php
$filename = 'api';
$file = $_GET['action'];
switch ($_GET['action']) {
    case "add_dathang_line":
        require_once CONTROLS . "dathang/add_dathang_line.php";
        break;
}
