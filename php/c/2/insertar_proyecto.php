<?php
session_start();
$array_participantes=json_decode($_POST['invitados']);
$array_datos_proyectos=json_decode($_POST['datos_proyectos']);

$nombre_empresa = $array_datos_proyectos[0];
$empresa_nueva = $array_datos_proyectos[1];
$constitucion_legal = $array_datos_proyectos[2];
$rfc = $array_datos_proyectos[3];
$tiempo_desarrollo = $array_datos_proyectos[4];
$descripcion = $array_datos_proyectos[5];
$objetivo = $array_datos_proyectos[6];
// $apoyo = $array_datos_proyectos[7]; //Pa otra tabla
$es_base = $array_datos_proyectos[8];
$razones_base = $array_datos_proyectos[9]; ////
$grado_tec = $array_datos_proyectos[10];
$nivel_inovacion = $array_datos_proyectos[11];
$nivel_intensidad = $array_datos_proyectos[12];
$tiene_instalaciones = $array_datos_proyectos[13];
$instalaciones = $array_datos_proyectos[14];
$tiene_maquinaria = $array_datos_proyectos[15];
$maquinaria = $array_datos_proyectos[16];
$necesidades_mercado = $array_datos_proyectos[17];
$conoce_mercado = $array_datos_proyectos[18];
$caracteristicas_clientes = $array_datos_proyectos[19];
$ambito_empresa = $array_datos_proyectos[20];
$existen_similares = $array_datos_proyectos[21];
$productos_similares = $array_datos_proyectos[22];
$tiene_tramites = $array_datos_proyectos[23];
// $tramites = $array_datos_proyectos[24]; // Pa otra tabla
$estrato_empresa= $array_datos_proyectos[25];
$sector_empresa= $array_datos_proyectos[26];
$emp_c_h= $array_datos_proyectos[27];
$emp_c_m= $array_datos_proyectos[28];
$emp_g_h= $array_datos_proyectos[29];
$emp_g_m= $array_datos_proyectos[30];
// $sectores_impacto = $array_datos_proyectos[31]; // Pa otra tabla
$impacto_ambiental = $array_datos_proyectos[32];
$tiene_comunidad = $array_datos_proyectos[33];
$nombre_comunidad = $array_datos_proyectos[34];

include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$rpta = $sql->retornarID("CALL sp_insert_proyecto('".$_SESSION['id_usuario_curso']."','".$nombre_empresa."','".$empresa_nueva."','".$constitucion_legal."','".$rfc."','".$tiempo_desarrollo."','".$descripcion."','".$objetivo."','".$es_base."','".$razones_base."','".$grado_tec."','".$nivel_inovacion."','".$nivel_intensidad."','".$tiene_instalaciones."','".$instalaciones."','".$tiene_maquinaria."','".$maquinaria."','".$necesidades_mercado."','".$conoce_mercado."','".$caracteristicas_clientes."','".$ambito_empresa."','".$existen_similares."','".$productos_similares."','".$tiene_tramites."','".$estrato_empresa."','".$sector_empresa."','".$emp_c_h."','".$emp_c_m."','".$emp_g_h."','".$emp_g_m."','".$impacto_ambiental."','".$tiene_comunidad."','".$nombre_comunidad."',@_ID)");

if($rpta[0][0] > 0){ 
    // Agrega apoyos requeridos
    $total_apoyo = count($array_datos_proyectos[7]);
    if ($total_apoyo > 0){
        for ($i=0; $i < $total_apoyo; $i++) { 
            $insert_apoyo = $sql->actualizarDatos("CALL sp_insert_apoyo('".$rpta[0][0]."','".$array_datos_proyectos[7][$i]."')");
        }
    }

    // Agrega participantes del proyecto
    $total_part = count($array_participantes);
    if($total_part > 0 ){
        for ($i=0; $i < $total_part; $i++) { 
            $rpta2 = $sql->actualizarDatos("CALL sp_insert_participante('".$rpta[0][0]."','".$array_participantes[$i][0]."','".$array_participantes[$i][3]."')");   
        }
    }

    // Agrega propiedades del proyecto
    $total_tramites = count($array_datos_proyectos[24]);
    if ($total_tramites > 0){
        for ($i=0; $i < $total_tramites; $i++) { 
            $insert_tramites = $sql->actualizarDatos("CALL sp_insert_tramites('".$rpta[0][0]."','".$array_datos_proyectos[24][$i]."')");
        }
    }


    // Agrega sectores del proyecto
    $total_sectores = count($array_datos_proyectos[31]);
    if ($total_sectores > 0){
        for ($i=0; $i < $total_sectores; $i++) { 
            $insert_sectores = $sql->actualizarDatos("CALL sp_insert_sectores_impacto_proyecto('".$rpta[0][0]."','".$array_datos_proyectos[31][$i]."')");
            echo "CALL sp_insert_sectores_impacto_proyecto('".$rpta[0][0]."','".$array_datos_proyectos[31][$i]."')";
        }
    }
}

