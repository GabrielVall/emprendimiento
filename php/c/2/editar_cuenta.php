<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
// $rpta = $sql->actualizarDatos("CALL sp_update_cuenta('".$_SESSION['id_usuario_curso']."','".$_POST['nombre']."')");

// if($rpta){
    // $response_array['status'] = 'success';
    // $response_array['header'] = 'Cambios registrados';
    // $response_array['msg'] = 'Se ha cambiado la información de la cuenta';
// }else{
    $response_array['status'] = 'error';
    // $response_array['header'] = 'Error de conexión';
    $response_array['header'] = 'Esta opción fue desactivada, comuinicate con el soporte para realizar cambios.';
    // $response_array['msg'] = 'Ha ocurrido un error, intenta más tarde...';
// }

header('Content-type: application/json');
echo json_encode($response_array);