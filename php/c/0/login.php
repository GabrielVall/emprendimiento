<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$password = $_POST['pass'];
$row = $sql->obtenerDatos("CALL sp_select_usuario_login('".test_input($_POST['correo'])."')");
if(isset($row[0]['password'])){
if (password_verify($password, $row[0]['password'])) {
	if($row[0]['estado'] == 1){
		$_SESSION['id_usuario_curso'] = $row[0]['id_usuario'];
		$_SESSION['privilegio'] = $row[0]['privilegio'];
        $_SESSION['estado'] = $row[0]['estado'];
		$response_array['status'] = 'success';
        $response_array['header'] = 'Inicio exitoso';
        $response_array['msg'] = 'Reedirigiendo...';
	}
	else{
		$response_array['status'] = 'error';
        $response_array['header'] = 'Acceso denegado';
		$response_array['msg'] = 'Su usuario se encuentra desactivado';
	}
}
else{
	$response_array['status'] = 'error';
    $response_array['header'] = 'Acceso denegado';
	$response_array['msg'] = 'Usuario o contraseña incorrectos!';
}
}else{
	$response_array['status'] = 'info';
    $response_array['header'] = 'Acceso denegado';
	$response_array['msg'] = 'Correo no registrado';
}
header('Content-type: application/json');
echo json_encode($response_array);

function test_input($data) {
	return htmlspecialchars($data, ENT_QUOTES);
}
?>
