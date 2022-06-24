<?php 
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$row_alumno = $sql->obtenerDatos("CALL sp_select_alumno('".$_POST['valor']."')");
$row_municipios = $sql->obtenerDatos("CALL sp_select_municipios()");
$total_row_municipios = count($row_municipios);
?>
<style>
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}

input[type=number] { -moz-appearance:textfield; }
</style>
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Alumno
    </h2>
    <div id="form_alumno_update" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nombre del Alumno</span>
            <input type="text" value="<?php echo $row_alumno[0]['nombre']?>" id="nombre" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Correo del Alumno</span>
            <input type="text" value="<?php echo $row_alumno[0]['correo']?>" id="correo" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">C.U.R.P. del Alumno</span>
            <input type="text" value="<?php echo $row_alumno[0]['curp']?>" id="curp" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Dirección del Alumno</span>
            <input type="text" value="<?php echo $row_alumno[0]['direccion']?>" id="direccion" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Telefono del Alumno</span>
            <input type="number" value="<?php echo $row_alumno[0]['telefono']?>" id="telefono" class="telefono block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Fax del Alumno</span>
            <input type="number" value="<?php echo $row_alumno[0]['fax']?>" id="fax" class="fax block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Municipio del Alumno</span>
            <select id="municipios" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray categorias">
                <option disabled selected>Selecciona el Municipio</option>
                <?php if($total_row_municipios > 0){
                    for ($i=0; $i < $total_row_municipios; $i++) {?>
                <option value="<?php echo $row_municipios[$i]['id_municipio']; ?>"><?php echo $row_municipios[$i]['nombre_municipio']; ?></option>
                    <?php }
                } ?>
            </select>
        </label>
        <label class="block mt-4 text-sm" id="universidad">
        </label>
        <br>
        <div style="float:right;" class="flex">
            <button id="actulizar_alumno" data-id_usuario="<?php echo $_POST['valor']?>" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Actualizar
            </button>
        </div>
        <div style="float:right; margin-right: 5px !important;" class="flex">
            <a href="#alumnos=1" data-id_usuario="<?php echo $_POST['valor']?>" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Regresar
            </a>
        </div>
    </div>
</div>