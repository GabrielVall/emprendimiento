<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$rpta = $sql->obtenerDatos("CALL sp_select_participante('".$_POST['correo']."','".$_SESSION['id_usuario_curso']."')");

if($rpta){
    $response_array['status'] = 'success';
    $response_array['header'] = 'Usuario encontrado';
    $response_array['msg'] = 'Agregando...';
    $response_array['id'] = $rpta[0]['id_usuario'];
    $response_array['correo'] = $rpta[0]['correo'];
    $response_array['nombre'] = $rpta[0]['nombre'];
}else{
    $response_array['status'] = 'error';
    $response_array['header'] = 'Error';
    $response_array['msg'] = 'Este correo no esta registrado o no ha activado su cuenta';
}

header('Content-type: application/json');
echo json_encode($response_array);