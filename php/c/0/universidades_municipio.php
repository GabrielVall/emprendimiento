<?php
  session_start();
  include_once("../../m/SQLConexion.php");
  $sql = new SQLConexion();
  $row_universidades = $sql->obtenerDatos("CALL sp_select_universidades('".$_POST['id_municipio']."')");
  $total_universidades = count($row_universidades);
?>

<span class="text-gray-700 dark:text-gray-400">
<button class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" id="cambiar_municipio">
<i class="fas fa-times"></i> <?php echo $row_universidades[0]['nombre_municipio']; ?>
</button>    
 Universidad</span>
<select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" id="universidad">
<option disabled selected>Selecciona tu universidad</option>
    <?php if($total_universidades > 0){
    for ($i=0; $i < $total_universidades; $i++) {?>
        <option value="<?php echo $row_universidades[$i]['id_universidad']; ?>"><?php echo $row_universidades[$i]['nombre_universidad']; ?></option>
    <?php }
    } ?>
</select>