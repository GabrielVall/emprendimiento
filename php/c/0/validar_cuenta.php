<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$rpta = $sql->retornarID("CALL sp_activar_cuenta('".$_SESSION['id_usuario_curso']."','".$_POST['numero']."',@_ID)");

if($rpta[0][0] == 1){
    $response_array['status'] = 'success';
    $_SESSION['estado'] = 1;
    $response_array['header'] = 'Cuenta activada';
    $response_array['msg'] = 'Reedirigiendo...';
}else{
    $response_array['status'] = 'error';
    $response_array['header'] = 'Codigo incorrecto';
    $response_array['msg'] = 'Vuelve a intentarlo';
}

header('Content-type: application/json');
echo json_encode($response_array);