<?php 
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$row_universidades = $sql->obtenerDatos("CALL sp_select_universidades_admin('".$_POST['municipios']."')");
$total_row_universidades = count($row_universidades);
?>
<span class="text-gray-700 dark:text-gray-400">Universidad del Alumno</span>
<select id="universidades" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray categorias">
    <option value="">Selecciona la Universidad</option>
    <?php if($total_row_universidades > 0){
        for ($i=0; $i < $total_row_universidades; $i++) {?>
    <option value="<?php echo $row_universidades[$i]['id_universidad']; ?>"><?php echo $row_universidades[$i]['nombre_universidad']; ?></option>
        <?php }
    } ?>
</select>