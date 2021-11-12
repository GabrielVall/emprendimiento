<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();

if($_POST['estado']==1){
    $rpta = $sql->actualizarDatos("CALL sp_actualizar_estado_curso(0,'".$_POST['id_curso']."')");
}else{
    $rpta = $sql->actualizarDatos("CALL sp_actualizar_estado_curso(1,'".$_POST['id_curso']."')");
}


if($rpta){
    $response_array['status'] = 'success';
    $response_array['header'] = 'Registro actualizado..';
    $response_array['msg'] = 'Reedirigiendo...';
}else{
    $response_array['status'] = 'error';
    $response_array['header'] = 'Error de conexión';
    $response_array['msg'] = 'Los campos agregados no son validos';
}

header('Content-type: application/json');
echo json_encode($response_array);