<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();


// Generar Random String
function rstr($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


$rpta = $sql->actualizarDatos("CALL sp_recuperar_cuenta('".$_POST['correo']."','".rstr()."')");
if($rpta){
    $response_array['status'] = 'success';
}else{
    $response_array['status'] = 'error';
    $response_array['header'] = 'Correo incorrecto';
    $response_array['msg'] = 'Este correo no esta asociado a ninguna cuenta.';
}

header('Content-type: application/json');
echo json_encode($response_array);