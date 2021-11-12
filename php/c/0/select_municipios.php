<?php
  session_start();
  include_once("../../m/SQLConexion.php");
  $sql = new SQLConexion();
  $row_municipios = $sql->obtenerDatos("CALL sp_select_municipios()");
  $total_municipios = count($row_municipios);
?>
<span class="text-gray-700 dark:text-gray-400">Municipio</span>
<select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" id="municipio">
<option disabled selected>Selecciona tu municipio</option>
    <?php if($total_municipios > 0){
    for ($i=0; $i < $total_municipios; $i++) { 
      if($row_municipios[$i]['total_uni'] > 0){ ?>
        <option value="<?php echo $row_municipios[$i]['id_municipio']; ?>"><?php echo $row_municipios[$i]['nombre_municipio']; ?></option>
    <?php } }
    } ?>
</select>