<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$row_numero_examen = $sql->obtenerDatos("CALL sp_count_numero_examen('".$_POST['id_curso']."')");
if($row_numero_examen[0]['numero_examenes_curso']>0){
    $rpta = $sql->retornarID("CALL sp_insert_pregunta('".$_POST['id_curso']."','".$_POST['pregunta_examen']."',@_ID)");
    if($rpta[0][0] > 0){
        $response_array['status'] = 'success';
        $response_array['header'] = 'Registro agregado..';
        $response_array['msg'] = 'Reedirigiendo...';
        $response_array['id_pregunta'] = $rpta[0][0];
    }else{
        $response_array['status'] = 'error';
        $response_array['header'] = 'Error de conexión';
        $response_array['msg'] = 'Los campos agregados no son validos';
    }
}else{
    $rpta = $sql->retornarID("CALL sp_insert_examen('".$_POST['id_curso']."','".$_POST['pregunta_examen']."',@_ID)");
    if($rpta[0][0] > 0){
        $response_array['status'] = 'success';
        $response_array['header'] = 'Registro agregado..';
        $response_array['msg'] = 'Reedirigiendo...';
        $response_array['id_pregunta'] = $rpta[0][0];
    }else{
        $response_array['status'] = 'error';
        $response_array['header'] = 'Error de conexión';
        $response_array['msg'] = 'Los campos agregados no son validos';
    }
}

header('Content-type: application/json');
echo json_encode($response_array);