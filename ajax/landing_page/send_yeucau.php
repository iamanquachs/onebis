<?php
include('__include_connect.php');
require("../../modules/landingClass.php");
$db = new landing();
$mshs = $_COOKIE['mshs'];
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$sodienthoai = $_POST['sodienthoai'];
$hoten = $_POST['hoten'];
$noidung = $_POST['noidung'];
$email = $_POST['email'];
$rowid = $_POST['rowid'];

$list = $db->send_yeucau($mshs, $msdv, $msdn, $sodienthoai, $hoten, $noidung, $rowid);
$email = $list[0]->email;
if ($email != '') {
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'info.tpsoft@gmail.com';
    $mail->Password = 'vxhasubnzdsbvqkg';
    $mail->setFrom('tpspa@gmail.com', 'ONEBIS');
    $mail->isHTML(true);
    $mail->addReplyTo('tpspa@gmail.com');
    $mail->CharSet = 'UTF-8';
    $mail->addAddress($email);
    $mail->Subject = 'Yêu cầu tư vấn';
    $content = <<<EOF
    <html>
    <body>
    <div style="text-align:center">
    </div>
    <h3>Yêu cầu tư vấn</h3>
    <h3>Khách hàng: $hoten</h3>
    <h3>Nội dung: $noidung</h3>
    </div>
    </body>
    </html>
    EOF;
    $header = "From: tpspa@gmail.com \r\n";
    $header .= "Content-type:text/html; charset=utf-8 \r\n";
    $mail->Body = $content;
    $mail->send();
}
