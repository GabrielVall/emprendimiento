<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$rpta = $sql->retornarID("CALL sp_insert_curso('".$_POST['nombre_curso']."','".$_POST['descripcion_curso']."',@_ID)");

if($rpta[0][0] > 0){
    $response_array['status'] = 'success';
    $response_array['header'] = 'Registro agregado..';
    $response_array['msg'] = 'Reedirigiendo...';
    $response_array['id_curso'] = $rpta[0][0];
    $categorias=json_decode(stripslashes($_POST['categorias_curso']));
		for ($i=0; $i < count($categorias); $i++) { 
            $rpta2 = $sql->actualizarDatos("CALL sp_insert_curso_categoria('".$rpta[0][0]."','".$categorias[$i]."')");
        }
}else{
    $response_array['status'] = 'error';
    $response_array['header'] = 'Error de conexión';
    $response_array['msg'] = 'Los campos agregados no son validos';
}

header('Content-type: application/json');
echo json_encode($response_array);