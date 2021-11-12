<?php
session_start();
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$row_pregunta_respuestas = $sql->obtenerDatos("CALL sp_select_pregunta_respuesta('".$_POST['valor']."')");
$row_respuestas_pregunta = $sql->obtenerDatos("CALL sp_select_respuestas_preguntas('".$_POST['valor']."')");
$total_row_respuestas_pregunta = count($row_respuestas_pregunta);
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
   <div id="form_pregunta" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <label class="block mt-4 text-sm">
         <span class="text-gray-700 dark:text-gray-400">Pregunta del examen</span>
         <input type="text" value="<?php echo $row_pregunta_respuestas[0]['pregunta']?>" id="pregunta_examen" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
      </label>
      <br>
      <div id="respuestas">
      <?php for($i=0; $i < $total_row_respuestas_pregunta; $i++){ ?>
         <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Respuesta del examen</span>
            <input data-id_respuesta_examen="<?php echo $row_respuestas_pregunta[$i]['id_respuesta_examen']?>" type="text" value="<?php echo $row_respuestas_pregunta[$i]['respuesta']?>" id="respuesta_pregunta_<?php echo $i?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
         </label>
         <div class="mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">La respuesta es:</span>
            <div class="mt-2">
               <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                  <input <?php if($row_respuestas_pregunta[$i]['valor']==0){ echo 'checked';}?> type="radio" id="radio_<?php echo $i?>" name="accountType<?php echo $i?>" value="0" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"/>
                  <span class="ml-2">Incorrecto</span>
               </label>
               <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                  <input <?php if($row_respuestas_pregunta[$i]['valor']==1){ echo 'checked';}?> type="radio" id="radio_<?php echo $i?>" name="accountType<?php echo $i?>" value="1" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"/>
                  <span class="ml-2">Correcto</span>
               </label>
            </div>
         </div>
      <?php } ?>
      </div>
      <br>
      <div style="float:right;" class="flex">
         <button id="actualizar_examen" data-id_examen="<?php echo $row_pregunta_respuestas[0]['id_examen']?>" data-id_pregunta="<?php echo $_POST['valor']?>" data-numero_vueltas="<?php echo $total_row_respuestas_pregunta;?>" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Actualizar Examen
         </button>
      </div>
      <div style="float:right; margin-right: 5px !important;" class="flex">
         <button id="regresar_preguntas" data-id_examen="<?php echo $row_pregunta_respuestas[0]['id_examen']?>" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Regresar
         </button>
      </div>
   </div>
</div>