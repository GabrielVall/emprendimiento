<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$preguntas=json_decode($_POST['preguntas']);
$total_preguntas = count($preguntas);
$respuestas = json_decode($_POST['respuestas']);
$total_respuestas = count($respuestas);

$intento = $sql->obtenerDatos("CALL sp_select_intento_examen('".$_POST['id_curso']."','".$_SESSION['id_usuario_curso']."')");


if($total_respuestas == $total_preguntas && $intento[0][0] <= 10){
    for ($i=0; $i < $total_respuestas; $i++) { 
        // echo "CALL sp_insert_respuestas_examen('".$_POST['id_curso']."','".$preguntas[$i]."','".$respuestas[$i]."','".$_SESSION['id_usuario_curso']."','".$intento[0][0]."')";
        $rpta = $sql->retornarID("CALL sp_insert_respuestas_examen('".$_POST['id_curso']."','".$preguntas[$i]."','".$respuestas[$i]."','".$_SESSION['id_usuario_curso']."','".$intento[0][0]."',@_ID)"); 
    }
    // Obtener resultado examen
    $resultado = $sql->obtenerDatos("CALL sp_select_resultado_examen('".$_POST['id_curso']."','".$_SESSION['id_usuario_curso']."','".$intento[0][0]."')");
    $porcentaje = round(($resultado[0]['correctas'] / $total_preguntas) * 100);

    $response_array['status'] = 'success';
    $response_array['aciertos'] = $resultado[0]['correctas'];
    $response_array['porcentaje'] = $porcentaje;
    $response_array['total'] = $total_preguntas;

    if($porcentaje >= 80){
        $completado = $sql->actualizarDatos("CALL sp_insert_curso_completado('".$_POST['id_curso']."','".$_SESSION['id_usuario_curso']."','".$porcentaje."')");
    }


    header('Content-type: application/json');
    echo json_encode($response_array);
}else{
    $response_array['status'] = 'error';
}

// $rpta = $sql->actualizarDatos("CALL sp_insert_respuestas_examen('".$_SESSION['id_usuario_curso']."',)");