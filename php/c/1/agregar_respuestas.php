<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$rpta = $sql->actualizarDatos("CALL sp_insert_respuesta_pregunta('".$_POST['id_pregunta']."','".$_POST['respuesta']."','".$_POST['correcta_falsa']."')");

if($rpta){
    $response_array['status'] = 'success';
    $response_array['header'] = "respuestas agregadas";
    $response_array['msg'] = 'Reedirigiendo...';
}else{
    $response_array['status'] = 'error';
    $response_array['header'] = 'Error de conexión';
    $response_array['msg'] = 'Los campos agregados no son validos';
}

header('Content-type: application/json');
echo json_encode($response_array);