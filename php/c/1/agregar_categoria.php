<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$rpta = $sql->retornarID("CALL sp_insert_categoria_curso('".$_POST['nombre_categoria']."',@_ID)");

if($rpta[0][0] > 0){
    $response_array['status'] = 'success';
    $response_array['header'] = 'Registro agregado..';
    $response_array['msg'] = 'Reedirigiendo...';
    $response_array['id_categoria'] = $rpta[0][0];
}else{
    $response_array['status'] = 'error';
    $response_array['header'] = 'Error de conexión';
    $response_array['msg'] = 'Los campos agregados no son validos';
}

header('Content-type: application/json');
echo json_encode($response_array);