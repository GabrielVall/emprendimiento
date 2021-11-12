<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$rpta = $sql->retornarID("CALL sp_insert_unidad('".$_POST['nombre_unidad']."','".$_POST['id_curso']."',@_ID)");

if($rpta[0][0] > 0){
    $response_array['status'] = 'success';
    $response_array['header'] = 'Registro agregado..';
    $response_array['msg'] = 'Reedirigiendo...';
    $response_array['id_unidad'] = $rpta[0][0];
}else{
    $response_array['status'] = 'error';
    $response_array['header'] = 'Error de conexión';
    $response_array['msg'] = 'Los campos agregados no son validos';
    $response_array['procedure'] = "CALL sp_insert_unidad('".$_POST['id_curso']."','".$_POST['nombre_unidad']."',@_ID)";
}

header('Content-type: application/json');
echo json_encode($response_array);