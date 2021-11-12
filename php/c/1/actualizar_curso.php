<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$rpta = $sql->actualizarDatos("CALL sp_update_curso('".$_POST['nombre_curso']."','".$_POST['descripcion_curso']."','".$_POST['id_curso']."')");

if($rpta){
    $rpta3 = $sql->actualizarDatos("CALL sp_delete_categoria_curso('".$_POST['id_curso']."')");
    if($rpta3) {
        $response_array['status'] = 'success';
        $response_array['header'] = 'Registro agregado..';
        $response_array['msg'] = 'Reedirigiendo...';
        $categorias=json_decode(stripslashes($_POST['categorias_curso']));
		for ($i=0; $i < count($categorias); $i++) { 
            $rpta2 = $sql->actualizarDatos("CALL sp_insert_curso_categoria('".$_POST['id_curso']."','".$categorias[$i]."')");
        }
    }else{
        $response_array['status'] = 'error';
        $response_array['header'] = 'Error de conexión';
        $response_array['msg'] = 'Los campos agregados no son validos';
    }
}else{
    $response_array['status'] = 'error';
    $response_array['header'] = 'Error de conexión';
    $response_array['msg'] = 'Los campos agregados no son validos';
}

header('Content-type: application/json');
echo json_encode($response_array);