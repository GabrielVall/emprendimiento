<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$rpta = $sql->obtenerDatos("CALL sp_validar_codigo('".$_POST['correo']."','".$_POST['codigo']."')");
if($rpta[0][0] > 0){
    $response_array['status'] = 'success';
    $_SESSION['id_usuario_curso'] = $rpta[0]['id_usuario'];
    $_SESSION['privilegio'] = $rpta[0]['privilegio'];
    $_SESSION['estado'] = $rpta[0]['estado'];
}else{
    $response_array['status'] = 'error';
    $response_array['header'] = 'Correo incorrecto';
}



header('Content-type: application/json');
echo json_encode($response_array);