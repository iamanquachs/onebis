<?php

include('__include_connect.php');
require("../../modules/chatClass.php");

$db = new chat();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$soct =  $_POST['soct'] == '' ? 'AI' . date("dmyHis", time()) . rand(1000, 9999) : $_POST['soct'];
$tenchude =  $_POST['tenchude'] == '' ? 'Tên chủ đề' : $_POST['tenchude'];
$question =  $_POST['question'];
$answer =  str_replace("'", "", $_POST['answer']);

$list = $db->add_tinnhan($mshs, $msdv, $msdn, $soct, $tenchude, $question, $answer);
