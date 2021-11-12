<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$rpta = $sql->actualizarDatos("CALL sp_update_alumno('".$_POST['usuario']."','".$_POST['nombre']."','".$_POST['correo']."','".$_POST['curp']."','".$_POST['direccion']."','".$_POST['telefono']."','".$_POST['fax']."','".$_POST['universidades']."')");

if($rpta){
    $response_array['status'] = 'success';
    $response_array['header'] = 'Registro Actualizado ...';
    $response_array['msg'] = 'Reedirigiendo...';
}else{
    $response_array['status'] = 'error';
    $response_array['header'] = 'Error de conexión';
    $response_array['msg'] = 'Los campos agregados no son validos';
    $response_array['procedure'] = "CALL sp_update_alumno('".$_POST['usuario']."','".$_POST['nombre']."','".$_POST['correo']."','".$_POST['curp']."','".$_POST['direccion']."','".$_POST['telefono']."','".$_POST['fax']."','".$_POST['universidades']."')";
}

header('Content-type: application/json');
echo json_encode($response_array);