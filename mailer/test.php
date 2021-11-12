<?php
require 'phpMailer/class.phpmailer.php';
require 'phpMailer/class.smtp.php';
$mail=new PHPMailer();
$mail->CharSet = 'UTF-8';
$codigo_activacion = '4 1 4 6 3';
require 'activacion_mail.php';

$mail->IsSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPSecure = 'tls';
$mail->Port       = 587;
$mail->SMTPDebug  = 1;
$mail->SMTPAuth   = true;
$mail->Username   = $correo;
$mail->Password   = $password;

$mail->SetFrom($correo, $nombre);
$mail->Subject    = $_POST['Activa tu cuenta'];
$mail->MsgHTML($body);
$mail->AddAddress($_POST['correo'], $_POST['correo']);
$mail->send();