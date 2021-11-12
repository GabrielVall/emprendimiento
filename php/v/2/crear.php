<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$row_usuario = $sql->obtenerDatos("CALL sp_select_info_usuario('".$_SESSION['id_usuario_curso']."')");
$row_info = $sql->obtenerDatos("CALL sp_select_verificar_info('".$_SESSION['id_usuario_curso']."')");
?>
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Registro de proyecto.
    </h2>
    <?php
    if($row_info[0][0] == 0){
        include_once "info_adicional.php";
    }else{
        include_once "crear_proyecto.php";
    }
    ?>
</div>