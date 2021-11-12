<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$codigo = generateRandomString();
$hashed_password = password_hash(test_input($_POST['pass']), PASSWORD_DEFAULT);
$rpta = $sql->retornarID("CALL sp_insert_usuario('".test_input($_POST['nombre'])."','".test_input($_POST['universidad'])."','".test_input($_POST['correo'])."','".$hashed_password."','".$codigo."',@_ID)");


if ($rpta[0][0] > 0){
$_SESSION['id_usuario_curso'] = $rpta[0][0];
$_SESSION['privilegio'] = 2;
$_SESSION['estado'] = 2;

// Mailer
require '../../../mailer/phpMailer/class.phpmailer.php';
require '../../../mailer/phpMailer/class.smtp.php';
$mail=new PHPMailer();
$mail->CharSet = 'UTF-8';
$codigo_activacion = $codigo;
require '../../../mailer/activacion_mail.php';

$mail->Username   = $correo;
$mail->Password   = $password;

$mail->SetFrom($correo, $nombre);
$mail->Subject    = 'Activa tu cuenta';
$mail->MsgHTML($body);
$mail->AddAddress(test_input($_POST['correo']), test_input($_POST['correo']));
$mail->send();

// Termina Mailer

$response_array['status'] = 'success';
$response_array['header'] = 'Registro completado';
$response_array['msg'] = 'Reedirigiendo...';
}elseif($rpta[0][0] = -1){
$response_array['status'] = 'error';
$response_array['header'] = 'Correo ocupado';
$response_array['msg'] = 'Ya existe un usuario con este correo';
}else{
$response_array['status'] = 'error';
$response_array['header'] = 'Servidor desconectado';
$response_array['msg'] = 'Conexion fallida con el servidor';
}

function test_input($data) {
	return htmlspecialchars($data, ENT_QUOTES);
}
function generateRandomString($length = 5) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
header('Content-type: application/json');
echo json_encode($response_array);