<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$rpta = $sql->actualizarDatos("CALL sp_insert_info_adicional('".$_SESSION['id_usuario_curso']."','".$_POST['curp']."','".$_POST['direccion']."','".$_POST['telefono']."','".$_POST['fax']."','".$_POST['como_enteraste']."')");

if($rpta){
    $response_array['status'] = 'success';
    $response_array['header'] = 'Informacion agregada..';
    $response_array['msg'] = 'Reedirigiendo...';
}else{
    $response_array['status'] = 'error';
    $response_array['header'] = 'Error de conexión';
    $response_array['msg'] = 'Los campos agregados no son validos';
}

header('Content-type: application/json');
echo json_encode($response_array);