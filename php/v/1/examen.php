<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$row_numero_pregunta_examen = $sql->obtenerDatos("CALL sp_count_numero_pregunta('".$_POST['valor']."')");
$numero_pregunta_actual = $row_numero_pregunta_examen[0]['numero_preguntas_actual'] + 1;
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
      Examen
   </h2>
   <div id="form_examen" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <label class="block mt-4 text-sm">
         <span class="text-gray-700 dark:text-gray-400">Pregunta #<?php echo $numero_pregunta_actual?> del examen</span>
         <input type="text" id="pregunta_examen" data-id_curso="<?php echo $_POST['valor']?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
      </label>
      <label class="block mt-4 text-sm">
         <span class="text-gray-700 dark:text-gray-400">Numero de Respuestas</span>
         <div class="relative">
            <input type="number" id="numero_respuestas" class="numero_respuestas block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"/>
            <button id="agregar_respuestas_pregunta" class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
               Agregar
            </button>
         </div>
      </label>
      <br>
      <div id="respuestas"></div>
      <?php if($numero_pregunta_actual>=10){ ?>
      <div style="float:right;" class="flex">
         <button id="finalizar_examen" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Finalizar Examen
         </button>
      </div>
      <div style="float:right; margin-right: 5px !important;" class="flex">
         <button id="agregar_preguntas_examen" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Agregar pregunta a examen
         </button>
      </div>
      <?php }else{ ?>
      <div style="float:right;" class="flex">
         <button id="agregar_preguntas_examen" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Agregar pregunta a examen
         </button>
      </div>
      <?php } ?>
      
   </div>
</div>