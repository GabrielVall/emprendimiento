<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
?>
<div class="container px-6 mx-auto grid">
   <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Unidad
   </h2>
   <div id="form_unidad" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <label class="block text-sm">
         <span class="text-gray-700 dark:text-gray-400">Nombre de la Unidad</span>
         <input type="text" data-id_curso="<?php echo  $_POST['valor']?>" id="nombre_unidad" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
      </label>
      <label class="block mt-4 text-sm">
         <span class="text-gray-700 dark:text-gray-400">Agregar Documento Unidad</span>
         <div class="relative text-gray-500 focus-within:text-purple-600">
            <input type="file" id="documento_unidad" accept=".pdf" class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"/>
         </div>
      </label>
      <br>
      <div style="float:right; margin-right: 5px !important;" class="flex">
         <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" id="agregar_unidad_curso">
            Agregar Unidad al Curso
         </button>
      </div>
   </div>
</div>